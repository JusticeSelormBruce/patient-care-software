<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\HospitalDetails;
use App\LabRequest;
use App\LabResult;
use App\Note;
use App\Prescription;
use App\Product;
use App\Roles;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function Dashboard()
    {
        $data = HospitalDetails::get()->first();
        return view('Admin.dashboard', compact('data'));
    }

    public function RolesIndex()
    {
        $roles = Roles::all();
        return view('Admin.roles.index', compact('roles'));
    }

    public function SaveRole(Request $request)
    {

        $data = $request->all();
        Roles::create($data);
        return back();
    }

    public function DeleteRole(Request $request)
    {
        $id = $request->id;
        Roles::whereId($id)->delete();
        return back();
    }

    public function UpdateRolesDetails(Request $request)
    {
        $data = $this->ValidateUpdateRolesDetails();
        DB::table('roles')->where('id', $request->id)->update($data);
        return back();


    }


    public function RegisterUser(Request $request)
    {
        $data = $this->validateUserDetails() + ['password' => Hash::make('password')];
        User::create($data);
        return back();

    }

    public function ListAllUsers()
    {
        $users = DB::table('users')->get()->all();
        return view('Admin.UserAccount.list', compact('users'));
    }

    public function ResetPasswordIndex()
    {
        return view('Admin.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $userId = $request->id;
        $defaultPassword = Hash::make('password');
        DB::table('users')->where('id', $userId)->update(['password' => $defaultPassword]);
        return back();
    }

    public function Settings_index()
    {
        $data = HospitalDetails::get()->first();
        return view('setting.index', compact('data'));
    }


    public function storeOrganizationDetails(Request $request)
    {
        $data = $this->ValidateDetails();
        $result = HospitalDetails::create($data);
        $this->storeImage($result);
        return back();

    }

    public function PrescriptionList()
    {
        $listfortoday = Prescription::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get()->all();
        $allPrescriptions = Prescription::all();
        return view('prescription.index', compact('listfortoday', 'allPrescriptions'));
    }

    public function addPrescription()
    {
        $patientID = Session::get('patient_id');
        $allAvailableDrugs = Product::where('number','>=',1)->get()->all();
        $prescription = Prescription::whereDate('created_at', Carbon::today())->get()->where('patient_id', $patientID)->all();
        return view('prescription.create', compact('prescription','allAvailableDrugs'));
    }

    public function storePrescription(Request $request)
    {

        $data = $request->all() + ['doctor_id' => Auth::user()->id];
        $value = $data['patient_id'];
        $patient_id = (int)$value;
        Session::put('patient_id', $patient_id);
        Prescription::create($data);
        return redirect('add-prescription');
    }

    public function PreviewPrescriptionToSubmit()
    {
        $data = Session::get('prescription');
        $doctor = DB::table('users')->where('id', Auth::user()->id)->get()->first();
        $patient = DB::table('patients')->where('id', $data['patient_id'])->get()->first();
        return view('prescription.promt', compact('result', 'doctor', 'patient', 'data'));
    }

    public function finalPrescriptionPreview()
    {
        $patientID = Session::get('patient_id');
        $prescription = Prescription::whereDate('created_at', Carbon::today())->get()->where('patient_id', $patientID)->all();
        Session::flush();
        return view('prescription.print', compact('prescription'));
    }

    public function NotesIndex()
    {
        $notes = DB::table('notes')->where('user_id', Auth::user()->id)->first();
        return view('notes.index', compact('notes'));
    }

    public function SaveNotes()
    {

        $notes = $this->validateRequest();
        Note::create($notes + ['user_id' => Auth::user()->id]);
        return back();
    }

    public function UpdateMyNotes()
    {
        $note = $this->validateRequest();
        DB::table('notes')->where('user_id', Auth::user()->id)->update($note + ['user_id' => Auth::user()->id]);
        return back();
    }

    public function AppointmentDashboard()
    {
        $Appointments = Appointment::whereDate('date', Carbon::today())->where('user_id', Auth::user()->id)->get();
        return view('Appointment.board', compact('Appointments'));
    }

    public function addNewAppointment()
    {
        $time = date("h:i");
        return view('Appointment.new', compact('time'));
    }

    public function saveMyAppointment(Request $request)
    {
        $data = $this->ValidateMyAppointmentDetails() + array('user_id' => Auth::user()->id);
        Appointment::create($data);
        return back()->with('msg', 'Appointment scheduled successfully');
    }

    public function markAppointmentCompleted(Request $request)
    {
        Appointment::whereDate('date', Carbon::today())->where('patientid', $request->patientid)->where('attended_to', 0)->update(['attended_to' => 1]);
        return back();
    }

    public function DoctorsDashboard()
    {
        $Appointments = Appointment::whereDate('date', Carbon::today())->where('user_id', Auth::user()->id)->get();
        $lab_request = LabRequest::where('docters_id', Auth::user()->id)->get()->all();
        if ($lab_request == null) {
            $labResults = null;
        } else {
            $labResults = LabResult::where('request_id', $lab_request[0]->id)->get()->all();
        }
        return view('Admin.doctors_dashboard', compact('Appointments', 'labResults'));
    }

    public function LabResults()
    {
        $lab_request = LabRequest::where('docters_id', Auth::user()->id)->get()->all();
        if ($lab_request == null) {
            $labResults = null;
        } else {
            $labResults = LabResult::where('request_id', $lab_request[0]->id)->get()->all();
        }
        return view('Admin.lab_results', compact('labResults', 'lab_request'));
    }

    function ValidateUpdateRolesDetails()
    {

        return request()->validate([
            'id' => "required",
            'name' => "required",
            'description' => ""
        ]);
    }

    public
    function validateUserDetails()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
        ]);


    }

    public
    function ValidateDetails()
    {
        return tap(
            request()->validate(
                [
                    "name" => "required",
                    "location" => "",
                    "address" => "",
                    "email" => "",
                    "phone" => "",
                    "description" => ''
                ]
            ),
            function () {
                if (request()->hasFile('logo')) {
                    request()->validate(
                        [
                            'logo' => 'file|image'
                        ]
                    );
                }
            }
        );
    }

    public
    function storeImage($avatar)
    {

        if (request()->has('logo')) {
            $avatar->update(
                [
                    'logo' => request()->logo->store('avatars', 'public')
                ]

            );
        }
    }

    public
    function ValidatePrescriptionDetails()
    {
        return request()->validate([
            "name" => "required",
            "strength" => "",
            "dosage" => "required",
            "note" => "",
            "patient_id" => "required",
            "allegies" => "",
            "doctor_id" => 'required'

        ]);
    }

    public
    function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }

    public
    function ValidateMyAppointmentDetails()
    {
        return request()->validate
        ([
            "appointment_date" => "required",
            "start" => "required",
            "end" => "required",
            "max" => "required|numeric"
        ]);
    }
}

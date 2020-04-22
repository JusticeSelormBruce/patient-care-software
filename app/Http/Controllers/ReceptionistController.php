<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use App\PatientVisits;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class ReceptionistController extends Controller
{

    public function visitIndex()
    {
        $todaysVisits = PatientVisits::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get()->all();
        $Visits = PatientVisits::all();
        return view('Patient.PatientVists.list', compact('todaysVisits', 'Visits'));
    }

    public function Dashboard()
    {
        return view('pharmacy.dashboard');
    }

    public function create()
    {
        return view('Patient.add');
    }

    public function store()
    {
        $patientid = 'ID' . '' . rand(3456789543, 9898988979);
        $data = $this->validateApplicantDetails() + ['suffix' => 'null', 'user_id' => Auth::user()->id, 'patientid' => $patientid];
        $details = $this->validateUserDetails($data);
        $result = Patient::create($data);
        $this->storeImage($result);
        User::create($details);
        return back()->with('success', 'Patient Registered successfully ');
    }

    public function searchPatient()
    {
        return view('Patient.PatientVists.search');
    }

    public function getPatientId(Request $request)
    {
        $value = $request->id;
        $patient = DB::table('patients')->where('patientid', $value)->get()->first();
        if (!$patient == null) {

            return view('Patient.PatientVists.add', compact('patient'));
        } else {
            return back()->with('msg', 'No marching result found');
        }
    }


    public function storePatientVisitsDetails(Request $request)
    {
        $data = $request->all() + array('user_id' => Auth::user()->id);
        PatientVisits::create($data);
        return redirect('visit')->with('msg1', 'Details Submitted Successfully');
    }


    public function checkAppointmentIndex()
    {
        $Appointments = Appointment::whereDate('date', Carbon::today())->get();
        return view('Appointment.availability',compact('Appointments'));
    }


    public function FingerPrintVerifyIndex()
    {
        return view('verify');
    }
    public function validateApplicantDetails()
    {
        return tap(
            request()->validate(
                [
                    "title" => "",
                    "lname" => "",
                    "fname" => "",
                    "mname" => "",
                    "sex" => "",
                    "dob" => "",
                    "email" => "",
                    "homephone" => "",
                    "cellphone" => "",
                    "fax" => "",
                    "homeadd" => "",
                    "post_address" => "",
                    "region" => "",
                    "city" => "",
                    "ssnit" => "",
                    "place_of_birth" => "",
                    "hometown" => "",
                    "disability" => "",
                    "religion" => "",
                    "denomination" => "",
                    "marital_status" => "",
                    "no_children" => "",
                    "country" => "",
                    "nationality" => "",
                    "langSpoken" => ""
                ]
            ),
            function () {
                if (request()->hasFile('image')) {
                    request()->validate(
                        [
                            'image' => 'file|image|max:10000'
                        ]
                    );
                }
            }
        );
    }

    public function storeImage($file)
    {

        if (request()->has('image')) {
            $file->update(
                [
                    'image' => request()->image->store('patients', 'public')
                ]

            );
        }
    }

    function validateUserDetails($data)
    {
        return array(
            'name' => $data['lname'] . ' ' . $data['fname'] . ' ' . $data['mname'],
            'phone' => $data['cellphone'],
            'email' => $data['patientid'],
            'address' => $data['homeadd'],
            'dob' => $data['dob'],
            'gender' => $data['sex'],
            'department_id' => 0,
            'role_id' => 11,
            'password' => Hash::make($data['cellphone'])
        );


    }

}

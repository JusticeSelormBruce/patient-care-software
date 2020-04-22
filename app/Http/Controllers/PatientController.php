<?php

namespace App\Http\Controllers;

use App\HospitalDetails;
use App\LabRequest;
use App\LabResult;
use App\Patient;
use App\PatientVisits;
use App\Prescription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{

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
        $data = $this->validateApplicantDetails() + ['suffix' => 'null'];
        $result = Patient::create($data);
        $this->storeImage($result);
        return back()->with('success', 'Patient Registered successfully ');
    }

    public function PatientDashboard()
    {
        $data = Patient::where('patientid', Auth::user()->email)->first();
        $patient = Patient::where('patientid', Auth::user()->email)->first();
        $visits = PatientVisits::where('patientid', Auth::user()->email)->get()->all();
        $prescriptions = Prescription::where('patient_id', $patient->id)->get()->all();
        $lab_request = LabRequest::where('patient_id', $patient->id)->get()->all();
        if ($lab_request == null) {
            $labResults = null;
        } else {
            $labResults = LabResult::where('request_id', $lab_request[0]->id)->get()->all();
        }
        $info = HospitalDetails::get()->first();
        $users = User::where('role_id', 2)->get()->all();
        $time = date("h:i");
        $myAppointments = \App\Appointment::where('patientid', Auth::user()->email)->get()->all();
        return view('Patient.dashboard.dashboard', compact('data', 'visits', 'prescriptions', 'labResults', 'info', 'users', 'time', 'myAppointments'));
    }


    public function MakeAppointment(Request $request)
    {
        $data = $request->all() + ['patientid' => Auth::user()->email];
        \App\Appointment::create($data);
        return back()->with('msg', 'Appointment Made  Successfully');
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
}

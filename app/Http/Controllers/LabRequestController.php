<?php

namespace App\Http\Controllers;

use App\LabRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LabRequestController extends Controller
{
    public function create()
    {
        return view('lab_request.create');
    }

    public function incomingPatientRequest(Request $request)
    {
        $data = $request->all() + ['docters_id' => Auth::user()->id];
        Session::put('current_request', $data);
        return redirect('lab-request-list');
    }

    public function previewLabRequest()
    {
        $labrequest = Session::get('current_request');
        $doctor = DB::table('users')->where('id', $labrequest['docters_id'])->get()->first();
        $patient = DB::table('patients')->where('id', $labrequest['patient_id'])->get()->first();
        $department = DB::table('departments')->where('id', $labrequest['department_id'])->get()->first();
        $description = $labrequest['description'];
        $lab_request = ['docters_id' => $doctor->id, 'patient_id' => $patient->id, 'department_id' => $department->id, 'description' => $description];
        Session::put('data', $lab_request);
        return view('lab_request.prompt', compact('description', 'doctor', 'patient', 'department'));
    }

    public function confirmSubmissionOfLabRequest(Request $request)
    {
        $state = $request->status;
        if ($state == "1") {
            $data = Session::get('data');
            LabRequest::create($data);
            return redirect('request-list')->with('msg', 'Lab request submitted successfully ');
        } else {

        }
    }

    public function getLabRequest()
    {

        $lab_request = DB::table('lab_requests'
        )->orderBy('id', 'desc')
            ->where('docters_id', Auth::user()->id)->get()->all();
        return view('lab_request.index', compact('lab_request'));
    }
}

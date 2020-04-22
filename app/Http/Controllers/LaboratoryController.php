<?php

namespace App\Http\Controllers;

use App\LabRequest;
use App\LabResult;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaboratoryController extends Controller
{
    public function dashboard()
    {
        $TodaysLabRequestTotal = LabRequest::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->where('status', 0)->count();
        $completedRequest = LabRequest::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->where('status', 1)->count();
        $Total = LabRequest::whereDate('created_at', Carbon::today())->count();
        return view('laboratory.dashboard', compact('TodaysLabRequestTotal', 'completedRequest', 'Total'));
    }

    public function TodaysLabRequest()
    {
        $TodaysLabRequest = LabRequest::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->where('status', 0)->get()->all();
        return view('laboratory.todays_request.index', compact('TodaysLabRequest'));
    }

    public function LabRequestFormIndex(Request $request)
    {
        $id = $request->id;
        $data = LabRequest::whereId($id)->first();
        $doctor = DB::table('users')->where('id', $data['docters_id'])->get()->first();
        $patient = DB::table('patients')->where('id', $data['patient_id'])->get()->first();
        $dept = DB::table('departments')->where('id', $data['department_id'])->get()->first();
        return view('laboratory.form', compact('data', 'doctor', 'patient', 'dept'));
    }


    public function Completed()
    {
        $completed = LabRequest::whereDate('created_at', Carbon::today())->where('status', 1)->get()->all();
        $allCompleted =DB::table('lab_requests')->where('status',1)->get()->all();
        return view('laboratory.todays_request.list', compact('completed','allCompleted'));
    }

    public function storeLabResult(Request $request)
    {
        $result = $request->all() + array('technician_id' => Auth::user()->id);
        DB::table('lab_requests')->where('id', $request->request_id)->update(['status' => 1]);
        LabResult::create($result);
        return back()->with('msg', 'Lab result submitted Successfully');


    }
}

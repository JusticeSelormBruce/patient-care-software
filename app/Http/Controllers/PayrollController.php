<?php

namespace App\Http\Controllers;

use App\Deductions;
use App\HospitalDetails;
use App\Overtime;
use App\OvertimeAmount;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{


    public function dashboard()
    {
        return view('payroll.reports.dashboard');
    }

    public function OvertimeSettings()
    {
        $overtimesDetails = OvertimeAmount::all();
        return view('payroll.settings.index', compact('overtimesDetails'));
    }

    public function saveOvertimeDetails()
    {
        $data = $this->ValidateOvertimeDetails();
        OvertimeAmount::create($data);
        return redirect()->route('overtime.settings')->with('success', 'Details Saved Successfully');
    }

    public function updateOvertimeDetails(Request $request)
    {
        $data = $this->ValidateOvertimeDetails();
        OvertimeAmount::whereId($request->id)->update($data);
        return back();
    }


    public function overtime()
    {
        $data = DB::table('overtimes')->orderByDesc('id')->get()->all();
        return view('payroll.overtime.index', compact('data'));
    }

    public function CreditOvertimersAccount(Request $request)
    {
        $data = $this->ValidateCreditOvertimeUser();
        $getOvertimerAmount = OvertimeAmount::where('hours', $data['hours'])->first();
        if ($getOvertimerAmount == null) {
            return back()->with('msg', 'working hours not part of the overtime table, contact administrator of payroll to enter working hours');
        } else {

            $amount = $getOvertimerAmount['amount'];
            Overtime::create(['user_id' => $data['user_id'], 'amount' => $amount]);
            return back()->with('success', ' Overtime credited for User');
        }
    }

    public function indexOfDeduction()
    {
        $data = DB::table('deductions')->orderByDesc('id')->get()->all();
        return view('payroll.deduction.index', compact('data'));
    }


    public function deductions(Request $request)
    {
        $data = $this->ValidateDeductionDetails();
        Deductions::create($data);
        return back()->with('success', ' Deduction request submitted ');

    }

    public function paymentDashboard()
    {
        $data = Payment::all();
        return view('payroll.payment.index', compact('data'));
    }


    public function creditUserAccount(Request $request)
    {
        $data = $this->ValidateCreditUserAccount();
        $result = DB::table('deductions')->where('user_id', $data['user_id'])->where('status', 0)->sum('amount');
        $amount_paid = $data['amount'];
        $overtime = DB::table('overtimes')->where('user_id', $data['user_id'])->where('status', 0)->sum('amount');
        $final_amount = (int)$amount_paid - $result;
        $value = array('user_id' => $data['user_id'], 'amount' => $final_amount + $overtime, 'status' => 'Paid', 'deduction' => $result,'overtime'=>$overtime);
        Payment::create($value);
        DB::table('deductions')->where('user_id', $data['user_id'])->where('status', 0)->update(['status' => 1]);
        DB::table('overtimes')->where('user_id', $data['user_id'])->where('status', 0)->update(['status' => 1]);
        return back()->with('success', ' Account Credited Successfully');

    }

    public function gePayrollReport(Request $request)
    {
        $date = $request->date;
        $result = Payment::whereBetween('created_at', [$request->date, Carbon::now()])->orderBy('id', 'desc')->get()->all();
        $result1 = Payment::whereBetween('created_at', [$request->date, Carbon::now()])->orderBy('id', 'desc')->get();

        if ($result == null) {
            return back()->with('msg', 'no marching result for selected date');
        } else {
            $data = HospitalDetails::get()->first();
            return view('payroll.reports.result', compact('result', 'date', 'data','result1'));
        }
    }

    public function ValidateOvertimeDetails()
    {
        return request()->validate([
            'hours' => "required|numeric|max:24",
            'amount' => "required|numeric"
        ]);
    }

    public function ValidateCreditOvertimeUser()
    {
        return request()->validate([
            'hours' => "required|numeric",
            'user_id' => "required|numeric"
        ]);
    }

    public function ValidateDeductionDetails()
    {
        return request()->validate([
            'user_id' => "required|numeric|",
            'amount' => "required|numeric",
            'reason' => "required|string"
        ]);
    }

    public function ValidateCreditUserAccount()
    {
        return request()->validate([
            'amount' => "required|numeric",
            'user_id' => "required|numeric"
        ]);
    }

}

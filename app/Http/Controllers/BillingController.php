<?php

namespace App\Http\Controllers;

use App\HospitalDetails;
use App\Invoice;
use App\Product;
use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex;

class BillingController extends Controller
{

    public function dashboard()
    {
        $invoices = Invoice::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get()->all();
        return view('billing.dashboard', compact('invoices'));
    }

    public function ViewInvoice(Request $request)
    {
        $refid = $request->invoice_id;
        $items = Product::all();
        $data = HospitalDetails::get()->first();
        $bills = Sales::whereDate('created_at', Carbon::today())->where('reference_id', $refid)->get()->all();
        $amount = DB::table('sales')->where('reference_id', $refid)->get();
        return view('billing.preview', compact('bills', 'data', 'items', 'amount', 'refid'));
    }

    public function ConfirmBill(Request $request)
    {

        Invoice::where('refid', $request->ref_id)->update(['status' => 1]);
        return redirect('cash/billing');
    }

    public function ReportDashboard()
    {
        return view('billing.report.dashboard');
    }

    public function getReport(Request $request)
    {
        $date = $request->date;
        $result = Sales::whereBetween('created_at', [$request->date, Carbon::now()])->orderBy('id', 'desc')->get()->all();
        $result1 = Sales::whereBetween('created_at', [$request->date, Carbon::now()])->orderBy('id', 'desc')->get();

        if ($result == null) {
            return back()->with('msg', 'no marching result for selected date');
        } else {
            $data = HospitalDetails::get()->first();
            return view('billing.report.result', compact('result', 'date', 'data','result1'));
        }


    }
}

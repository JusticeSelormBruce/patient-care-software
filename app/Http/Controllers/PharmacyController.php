<?php

namespace App\Http\Controllers;

use App\HospitalDetails;
use App\Product;
use App\Returns;
use App\Sales;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class PharmacyController extends Controller
{
    public function Dashboard()
    {
        return view('pharmacy.dashboard');
    }


    public function salesForm()
    {
        $status = Session::get('check');
        if ($status == null) {
            $referenceid = rand(1000000000, 9988776655);
            $items = Product::all();
            $product = Session::get('item');
            Session::put('refID', $referenceid);
            $prescription = null;
            return view('pharmacy.sales.salesindex', compact('items', 'referenceid', 'product', 'prescription'));
        } else {
            $referenceid = Session::get('refID');
            $items = Product::all();
            $product = Session::get('item');
            $prescription = DB::table('sales')->where('reference_id', $referenceid)->get()->all();
            $amount = DB::table('sales')->where('reference_id', $referenceid)->get();
            return view('pharmacy.sales.salesindex', compact('items', 'referenceid', 'product', 'prescription', 'amount'));
        }


    }

    public function SalesIndex()
    {

        $sales = Sales::all();
        $todaysales = Sales::whereDate('created_at', Carbon::today())->get();
        return view('pharmacy.sales.index', compact('sales', 'todaysales'));

    }

    public function getProductPrice(Request $request)
    {
        $id = $request->id;
        $currentProduct = DB::table('products')->where('id', $id)->get()->first();
        Session::put('item', $currentProduct);
        return redirect('sales-form');
    }

    public function SaveSales(Request $request)
    {
        $item = Session::get('item');
        $referenceid = Session::get('refID');
        $data = $request->all() + ['items_id' => $item->id, 'tellers_id' => Auth::user()->id, 'reference_id' => $referenceid];
        $total = DB::table('products')->where('id', $item->id)->get()->first();
        $quantity = $request->quantity;
        $value = (int)$quantity;

        if (($total->number - $value) <= 0) {
            return redirect('sales-form')->with('message', 'Item out of stock');

        } else {
            Session::put('check', 0);
            $remains = $total->number - $value;
            DB::table('products')->where('id', $item->id)->update(['number' => $remains]);
            Session::put('item', null);
            Session::put('check', 1);
            Sales::create($data);
            return back();
        }


    }

    public function invoicePreview()
    {

        $data = HospitalDetails::get()->first();
        $refID = Session::get('refID');
        $files = DB::table('sales')->where('reference_id', $refID)->get()->all();
        $amount = DB::table('sales')->where('reference_id', $refID)->get();
        Invoice::create(['refid' => $refID]);
        $referenceid = rand(1000000000, 9988776655);
        Session::put('refID', $referenceid);
        return view('setting.print', compact('files', 'data','amount'));
    }

    public function dropItem(Request $request)
    {

        $id = $request->id;
        DB::table('sales')->where('id', $id)->delete();
        return redirect('sales-form');

    }


    public function returnsIndex()
    {

        return view('pharmacy.returns.index');
    }


    public function checkRefID(Request $request)
    {
        $redID = $request->refid;
        $result = DB::table('invoices')->where('refid', $redID)->get()->first();
        if ($result === null) {
            return redirect('returns')->with('message', 'No records found marching ' . " \t\t\t" . $redID);
        } else {
            Session::put('result', $result);
            return redirect('returns-details')->with('success', 'record found');
        }
    }

    public function returnDetails()
    {

        return view('pharmacy.returns.details');
    }

    public function savereturns(Request $request)
    {

        $invoice = Session::get('result');
        $data =[ 'reason'=>$request->reason,'invoice_id' => $invoice->id, 'teller_id' => Auth::user()->id];
        Returns::create($data);
        return redirect('returns')->with('success', 'Saved Successfully');
    }
}

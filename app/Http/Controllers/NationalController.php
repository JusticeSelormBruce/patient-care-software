<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NationalController extends Controller
{
    public function AddNational()
    {
        return view('Nationality.add_national');
    }

    public function SaveNational(Request $request)
    {
        $data = $request->all();
        Nationality::create($data);
        return back();
    }

    public function NationalList()
    {
        $nationals = Nationality::all();
        return view('Nationality.national_list', compact('nationals'));
    }

    public function updateNationalDetails(Request $request)
    {
        DB::table('nationalities')->where('id', $request->id)->update(['name' => $request->name, 'description' => $request->description]);
        return back();
    }

    public function DeleteNationality(Request $request)
    {

        DB::table('nationalities')->where('id', $request->id)->delete();
        return back();
    }
}

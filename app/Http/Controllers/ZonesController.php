<?php

namespace App\Http\Controllers;

use App\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZonesController extends Controller
{

    public function AddZones()
    {
        return view('Zones.add_zones');
    }

    public function SaveZone(Request $request)
    {
        $data = $request->all();
        Zones::create($data);
        return back();
    }

    public function ZoneList()
    {
        $zones = Zones::all();
        return view('Zones.zone_list', compact('zones'));
    }

    public function updateZoneDetails(Request $request)
    {
        DB::table('zones')->where('id', $request->id)->update(['name' => $request->name, 'description' => $request->description]);
        return back();
    }

    public function DeleteZone(Request $request)
    {

        DB::table('zones')->where('id', $request->id)->delete();
        return back();
    }
}

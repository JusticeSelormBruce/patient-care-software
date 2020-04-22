<?php

namespace App\Http\Controllers;

use App\Region;
use App\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionsController extends Controller
{
    public function AddRegions()
    {
        return view('Regions.add_regions');
    }

    public function SaveRegions(Request $request)
    {
        $data = $request->all();
        Region::create($data);
        return back();
    }

    public function RegionList()
    {
        $regions = Region::all();
        return view('Regions.regions_list', compact('regions'));
    }

    public function updateRegionsDetails(Request $request)
    {
        DB::table('regions')->where('id', $request->id)->update(['name' => $request->name, 'description' => $request->description]);
        return back();
    }

    public function DeleteRegion(Request $request)
    {

        DB::table('regions')->where('id', $request->id)->delete();
        return back();
    }
}

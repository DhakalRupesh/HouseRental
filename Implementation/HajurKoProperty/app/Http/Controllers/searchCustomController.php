<?php

namespace App\Http\Controllers;

use Auth;
use App\Properties;
use App\Facilities;
use App\Rooms;
use App\Proptypes;
use App\Bookings;
use App\Images;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class searchCustomController extends Controller
{
    public function filterfiltered(Request $request)
    {
        $location = $request->loc;
        $proType = $request->proType;
        $proPrice = $request->proPrice;

            $cusSearch = DB::table('properties')
            ->join('proptypes','proptypes.id','=', 'properties.propType_id')
            ->join('Facilities','Properties.id','=', 'Facilities.propID')
            ->join('Rooms','Properties.id','=', 'Rooms.propID') 
            ->where('propLocation','like','%'.$location.'%')
            // ->orWhere('propertyType','like','%'.$proType.'%')
            ->orWhere('totPrice',$proPrice)
            ->get();

            $pt = new Proptypes();
            // $pt = $pt->get();

        return view('search.customSearch', compact(['cusSearch','pt',]));
    }
}

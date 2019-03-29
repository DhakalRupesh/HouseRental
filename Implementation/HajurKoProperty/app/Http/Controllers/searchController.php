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

class searchController extends Controller
{
    public function filterNunfiltered(Request $request)
    {
        $searchData = $request->searchData;

        if(!$searchData == ""){
            $quickSrch = DB::table('properties')
            ->join('Facilities','Properties.id','=', 'Facilities.propID')
            ->join('Rooms','Properties.id','=', 'Rooms.propID') 
            ->where('propLocation','like','%'.$searchData.'%')
            ->orWhere('totPrice','like','%'.$searchData.'%')
            ->get();
            
            $pt = new Proptypes();
            $pt = $pt->get();
    
            return view('search.quick', compact(['quickSrch','pt',]));
 
        }else{
            return redirect()->back()->with('fail', 'Empty fields!!');
        }
    }
}

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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class listingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function getSelProp()
    {
       
    }

    public function listProp(Request $request)
    {
        if(Auth::check()){
            $list = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->where('user_id', '!=', Auth::User()->id)
            ->where('approval', '=', 'approved')
            ->paginate('6');

            $pt = new Proptypes();
            $pt = $pt->get();
 
            return view('propView.listings', compact(['list','pt']));
        }
        else{
            $list = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->where('approval', '=', 'approved')
            ->paginate('6');

            $pt = new Proptypes();
            $pt = $pt->get();

            return view('propView.listings', compact(['list','pt']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

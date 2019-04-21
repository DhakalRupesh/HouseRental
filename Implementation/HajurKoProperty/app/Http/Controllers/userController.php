<?php

namespace App\Http\Controllers;

use Auth;
use App\Properties;
use App\Facilities;
use App\Rooms;
use App\Proptypes;
use App\Bookings;
use App\Images;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class userController extends Controller
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

    public function profileIndex($id)
    {
        $usr = User::find($id);
        if (!$usr) {
            return redirect()->back();
        }
        return view('Profile.profile', [
            'User' =>  $usr
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
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
        $usr = User::find($id);
     
        
        $usr->fullname = $request->fullname;
        $usr->district = $request->district;
        $usr->city = $request->city;
        $usr->address = $request->address;
        $usr->mobNo = $request->mobilenumber;

        $usr->save();
        return redirect()->back()->with('message', 'profile updated successfully');

    }

    public function welcomeProp()
    {
        if(Auth::check()){
            $welprop = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->where('user_id', '!=' ,Auth::User()->id)
            ->where('approval', '=', 'approved')
            ->orderBy('properties.created_at','desc')            
            ->limit('6')
            ->get();

            $pt = new Proptypes();
            $pt = $pt->get();

            return view('welcome', compact(['welprop','pt',]));

        }
        else{
            $welprop = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->where('approval', '=', 'approved')
            ->orderBy('properties.created_at','desc')
            ->limit('6')
            ->get();
            
            $pt = new Proptypes();
            $pt = $pt->get();

            return view('welcome', compact(['welprop','pt']));
        }
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

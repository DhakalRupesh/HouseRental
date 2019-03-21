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

    public function welcomeProp()
    {
        if(Auth::check()){
            $usrProp = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->where('user_id', '!=' ,Auth::User()->id)
            ->limit('6')
            ->get();

            return view('welcome')->with('welprop',$usrProp);
        }
        else{
            $usrProp = DB::table('properties')
            ->join('facilities','properties.id','=','facilities.propID')
            ->join('rooms','properties.id','=','rooms.propID')
            ->limit('6')
            ->get();

            return view('welcome')->with('welprop',$usrProp);
        }
    }

    public function detailProp($id)
    {   
        $detail = DB::table('properties')
        ->join('facilities','properties.id','=','facilities.propID')
        ->join('rooms','properties.id','=','rooms.propID')->where('properties.id',$id)
        ->get();

        //owner detail 
        $usrDetail = DB::table('users')
        ->join('properties','users.id', '=', 'properties.user_id')
        ->where('properties.id',$id)
        ->get();

        return View('propView.detailview', compact(['detail','usrDetail']));
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
        // return redirect()->to('profile/{id}')->with('success','profile updated successfully');
        return redirect()->back()->with('message', 'profile updated successfully');

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

    public function propOwner($id)
    {
      
    }    

    public function bookProp($id)
    {
        if(Auth::check()){
            $propBook = new Bookings();

            $date = date("Y-m-d");
            // $time = strtotime("now");
            $usID = Auth::user()->id;
            $prID = $id;

            $propBook->bookedDate = $date; 
            // $propBook->bookedTime = $time; 
            $propBook->user_id = $usID; 
            $propBook->propID = $prID; 

            $propBook->save();
            return redirect()->back()->with('success', 'Property added to booked list');
        }else{
            return redirect('login')->with('success', 'Login to continue');
        }
    }
}

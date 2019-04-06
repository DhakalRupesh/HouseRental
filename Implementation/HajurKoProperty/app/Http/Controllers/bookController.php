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

class bookController extends Controller
{
    public function bookProp($id)
    {
        if(Auth::check()){
            $usID = Auth::user()->id;
            $book=Bookings::where('propID',$id)->where('user_id',$usID)->get();
            $propBook = new Bookings();
            $prID = $id;
            $propBook->user_id = $usID; 
            $propBook->propID = $prID; 
            $propBook->status = 'booked';
        
            $propBook->save();
            return redirect()->back()->with('success', 'Property added to booked list');
        }else{
            return redirect('login')->with('success', 'Login to continue');
        }
    }

     public function getBooked()
    {
        // booked prop by user
        $bookedProp = DB::table('bookings')
        ->join('properties','bookings.propID', '=', 'properties.id')
        ->join('users', 'users.id', '=', 'properties.user_id')
        // ->join('bookings',)
        ->join('facilities','properties.id','=','facilities.propID')
        ->join('rooms','properties.id','=','rooms.propID')
        ->where('bookings.user_id', '=', Auth::user()->id)
        ->where('bookings.status', '=', 'booked')
        ->get();

        return view('propView.bookedProp')->with('bookedProp',$bookedProp);
    }
    
    public function getuserbooked()
    {
        // booked by other user
        $otherBooked = DB::table('users')
        ->join('bookings', 'bookings.user_id', '=', 'users.id')
        ->join('properties', 'properties.id', '=', 'bookings.propID')
        ->where('properties.user_id',Auth::User()->id)
        ->get();

        // dd($otherBooked);
        return view('propView.otherBooked')->with('otherBooked',$otherBooked);    
    }

    public function delBooking($id)
    {
        // $propType = Bookings::find($id)->where('propID',$id);
        $propID = $id;
        $propType = DB::table('Bookings')->select('id')->where('propID', '=',$propID);
        $propType->delete();
        // dd($propID);
        return redirect()->back()->with('success', 'Property Deleted Syccessfully!!');
    }

}

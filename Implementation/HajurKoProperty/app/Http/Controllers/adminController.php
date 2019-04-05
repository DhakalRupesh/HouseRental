<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Proptypes;
use App\Properties;
use App\Facilities;
use App\Rooms;
use App\Bookings;
use App\Images;
use App\User;
use Auth;

class adminController extends Controller
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

    public function addPropType(Request $request)
    {
        $propType = new Proptypes(); 
        $propType->propertyType = $request->propType;
        $propType->save();

        return redirect()->back()->with('success', 'Property type added');
    }

    public function requestedProp()
    {
        $propApproval = DB::table('users')
        ->join('properties', 'users.id', '=', 'properties.user_id')
        ->join('Facilities','Properties.id','=', 'Facilities.propID')
        ->join('Rooms','Properties.id','=', 'Rooms.propID')
        ->where('approval', '=', 'unapproved')
        ->get();

        return view('adminJob.propertyVA')->with('propApproval',$propApproval);
    }

    public function reqAccept($id)
    {
        $propApprovalAccept = Properties::find($id);

        $propApprovalAccept->approval = 'approved';
        $propApprovalAccept->save();
        return redirect()->back()->with('success', 'Listing request accepted');
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

    public function reqAdmin(Request $request, $id)
    {
        $usr = User::find($id);
        $usr->arequest = "requested";
        $usr->save();

        return redirect()->back()->with('success', 'your request has been send to admin');
    }

    public function listRequests()
    {
        $getUsr = DB::table('users')->where('arequest', '=', 'requested')->get();

        return view('adminJob.adminAdd')->with('getUsr',$getUsr);
    }

    public function acceptAdmin($id)
    {
        $adminAccept = User::find($id);

        $adminAccept->arequest = 'accepted';
        $adminAccept->uType = '1';

        $adminAccept->save();
        return redirect()->back()->with('success', 'Admin request accepted');

    }

    public function rejectAdmin($id)
    {
        $adminAccept = User::find($id);

        $adminAccept->arequest = 'rejected';

        $adminAccept->save();
        return redirect()->back()->with('success', 'Admin request accepted');
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

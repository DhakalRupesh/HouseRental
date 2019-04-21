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
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class usrcrudController extends Controller
{
    protected $image_dir = "uploads/files";
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

    public function uploadfile($file,$dir)
    {
        $file_extension=$file->getClientOriginalExtension();
        $file_name=md5(time()). '.' . $file_extension;
        $file->move($dir,$file_name);
        return $file_name;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'location' => 'required|max:150',
            
        ]);

        $prop = new Properties();
        $prop->propFor = $request->propFor;  
        $prop->propDistrict = $request->district;
        $prop->propLocation = $request->location; 
        $prop->propSize = $request->size; 
        $prop->suitableFor = $request->suitable; 
        $prop->waterP = $request->watPrice; 
        $prop->electricP = $request->electricP; 
        $prop->totPrice = $request->propPrice; 
        $prop->description = $request->description; 

        if(request()->hasFile('image')){
            $file_name=$this-> uploadfile(request()->file('image'),$this->image_dir);
            $prop->image=$file_name;
        }

        $prop->propType_id = $request->propType;
        $prop->user_id = $request->uid;
            
        $propSave = $prop->save();
        if(!$propSave){
            return redirect()->to('addProp')->with('Message','Error adding new property');
        }else{
            $pid = DB::table('properties')->max('id');
            // dd($pid);
        }

        $faci = new Facilities();
        $faci->bikeP = $request->bikeP;
        $faci->carP = $request->carP;
        $faci->waterB = $request->waterB;
        $faci->waterD = $request->waterD;
        $faci->propID = $pid;
        $faci->save();

        $room = new Rooms();
        $room->kitchen = $request->kitchen;   
        $room->bedRoom = $request->bedRoom;   
        $room->livingRoom = $request->livingRoom;   
        $room->tBathroom = $request->tBathroom;
        $room->totRooms = $request->totRoom;        
        $room->propID = $pid;
        $room->save();

        return redirect('addProp')->with('success', 'Property Listed successfully');
    }

    public function getPropType()
    {
        $pt = new Proptypes();
        $pt = $pt->get();
        return view('propcrud.addProp',[
            'pt'=>$pt
        ]);
    }



    public function displayProp()
    {
        $usrProp = DB::table('properties')
        ->join('facilities','properties.id','=','facilities.propID')
        ->join('rooms','properties.id','=','rooms.propID')
        ->where('user_id',Auth::User()->id)
        ->get();

        return view('propcrud.editProp')->with('data',$usrProp);
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

        $prop=Proptypes::join('Properties','Proptypes.id', '=', 'Properties.propType_id')
        ->join('Facilities','Properties.id','=', 'Facilities.propID')
        ->join('Rooms','Properties.id','=', 'Rooms.propID')
        ->where('Properties.id',$id)
        ->get();

        $pt = new Proptypes();
        $pt = $pt->get();

        return view('propcrud.uandv', compact(['prop','pt']));
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
        $this->validate(request(),[
            'location' => 'required|max:150',
            
        ]);
        
        $prop = Properties::find($id);
        // $prop = DB::table('properties')->where('id',$id)->get(); 
        $prop->propType_id = $request->propType;
        $prop->propFor = $request->propFor;  
        $prop->propDistrict = $request->district;
        $prop->propLocation = $request->location; 
        $prop->propSize = $request->size; 
        $prop->suitableFor = $request->suitable; 
        $prop->waterP = $request->watPrice; 
        $prop->electricP = $request->electricP; 
        $prop->totPrice = $request->propPrice; 
        $prop->description = $request->description;

        if ($request->hasFile('image')) {
          if ($prop->image && app('files')->exists($this->image_dir . '/' . $prop->image)) {
            app('files')->delete($this->image_dir . '/' . $prop->image);
          }
          $file_name = $this->uploadFile($request->file('image'), $this->image_dir);
          $prop->image = $file_name;
        } 
        $prop->save();
        
        $faci = Facilities::find($id)->where('propID',$id)->first();
        $faci->bikeP = $request->bikeP;
        $faci->carP = $request->carP;
        $faci->waterB = $request->waterB;
        $faci->waterD = $request->waterD;
        $faci->propID = $id;
        $faci->save();

        $room = Rooms::find($id)->where('propID',$id)->first();
        $room->kitchen = $request->kitchen;   
        $room->bedRoom = $request->bedRoom;   
        $room->livingRoom = $request->livingRoom;   
        $room->tBathroom = $request->tBathroom;
        $room->totRooms = $request->totRoom;        
        $room->propID = $id;
        $room->save();



        return redirect()->back()->with('success', 'Property Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propdel = Properties::find($id);
        if ($propdel->image && app('files')->exists($this->image_dir . '/' . $propdel->image)) 
        {
            app('files')->delete($this->image_dir . '/' . $propdel->image);
        }
        $propdel->delete();
        return redirect()->back()->with('success', 'Property Deleted Syccessfully!!');
    }
}

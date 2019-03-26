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

class usrcrudController extends Controller
{
    protected $file_dir = "uploads/files";
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

    public function fileUpload($file, $dir)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = md5(time()) . '.' . $file_extension;
        $file->move($dir, $file_name);
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
        
        // do image via array
        $img = new Images();
        if (request()->hasFile('img1')) {
            $file_name = $this->fileUpload(request()->file('img1'), $this->file_dir);
            $img->img1 = $file_name;
            $img->propID = $pid;
        }  
        
        if (request()->hasFile('img2')) {
            $file_name = $this->fileUpload(request()->file('img2'), $this->file_dir);
            $img->img2 = $file_name;
            $img->propID = $pid;
        } 
    
        if (request()->hasFile('img3')) {
            $file_name = $this->fileUpload(request()->file('img3'), $this->file_dir);
            $img->img3 = $file_name;
            $img->propID = $pid;
        }  
   
        if (request()->hasFile('img4')) {
            $file_name = $this->fileUpload(request()->file('img4'), $this->file_dir);
            $img->img4 = $file_name;
            $img->propID = $pid;
        }    
          
        $img->save();

        return redirect()->back()->with('success', 'Property Listed successfully');
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
        ->join('rooms','properties.id','=','rooms.propID')->where('user_id',Auth::User()->id)
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
        // $propedit =DB::table('proptypes')
        // ->join('properties','proptypes.id', '=', 'properties.propType_id')
        // ->join('facilities','properties.id','=', 'facilities.propID')
        // ->join('rooms',     'properties.id','=', 'rooms.propID')
        // ->join('images',    'properties.id','=', 'images.propID')->where('properties.id',$id)
        // ->get();

        // return view('propcrud.uandv', ['prop' => $propedit]);

        $prop=Proptypes::join('Properties','Proptypes.id', '=', 'Properties.propType_id')
        ->join('Facilities','Properties.id','=', 'Facilities.propID')
        ->join('Rooms','Properties.id','=', 'Rooms.propID')
        ->where('Properties.id',$id)
        ->get();

        $pt = new Proptypes();
        $pt = $pt->get();

        return view('propcrud.uandv', compact(['prop','pt']));
        // ->join('Images',    'Properties.id','=', 'Images.propID')
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
        $propdel->delete();
        return redirect()->back()->with('success', 'Property Deleted Syccessfully!!');
    }
}

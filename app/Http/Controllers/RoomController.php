<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
   public function index(){
        return Room::where('status','approved')->with('images','user')->get();
    }

    public function show($id){
        return Room::with('images','user')->findOrFail($id);
    }

    public function store(Request $request){
        $data = $request->validate([
            'title'=>'required',
            'description'=>'nullable',
            'price'=>'required|numeric',
            'address'=>'required'
        ]);
        $data['user_id'] = auth()->id();
        $room = Room::create($data);
        return response()->json($room);
    }

    public function destroy($id){
        $room = Room::findOrFail($id);
        if($room->user_id != auth()->id()){
            return response()->json(['message'=>'Unauthorized'],403);
        }
        $room->delete();
        return response()->json(['message'=>'Room deleted']);
    }
   
}

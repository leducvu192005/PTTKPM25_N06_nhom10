<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    public function allRooms(){
        return Room::with('user','images')->get();
    }

    public function approve($id){
        $room = Room::findOrFail($id);
        $room->status = 'approved';
        $room->save();
        return response()->json(['message'=>'Room approved']);
    }

    public function reject($id){
        $room = Room::findOrFail($id);
        $room->status = 'rejected';
        $room->save();
        return response()->json(['message'=>'Room rejected']);
    }

    public function destroy($id){
        $room = Room::findOrFail($id);
        $room->delete();
        return response()->json(['message'=>'Room deleted']);
    }
}

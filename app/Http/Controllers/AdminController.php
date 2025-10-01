<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class AdminController extends Controller
{
    public function allRooms(){
 $rooms = Room::with('user','images')->get();
    return view('admin.rooms.index', compact('rooms'));
    }
public function index()
{
    $rooms = Room::with('user','images')->get();
    return view('admin.rooms.index', compact('rooms'));
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

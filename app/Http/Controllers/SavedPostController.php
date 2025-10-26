<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedPost;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class SavedPostController extends Controller
{
    // Lưu tin
    public function store($roomId)
    {
        $user = Auth::user();

        // Kiểm tra đã lưu chưa
        $exists = SavedPost::where('user_id', $user->id)
            ->where('room_id', $roomId)
            ->exists();

        if ($exists) {
            return back()->with('info', 'Bạn đã lưu tin này rồi.');
        }

        SavedPost::create([
            'user_id' => $user->id,
            'room_id' => $roomId,
        ]);

        return back()->with('success', 'Đã lưu tin thành công!');
    }

    // Xóa tin đã lưu
  
public function destroy($id)
{
    $saved = SavedPost::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $saved->delete();

    return back()->with('success', 'Đã bỏ lưu tin.');
}

    // Trang tin đã lưu
    public function index()
    {
        $saved = SavedPost::where('user_id', Auth::id())
            ->with('room')
            ->latest()
            ->get();

        return view('saved.index', compact('saved'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Room;

class RoomController extends Controller
{
    public function index() {
        return view('rooms.index', [
            'rooms' => Room::whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })->get(),
        ]);
    }

    public function show(Room $room) {
        return view('rooms.show', [
            'chats' => Chat::where('room_id', $room->id)->get(),
            'roomName' => $room->name ?? $room->users->first(fn ($user) => $user->id != auth()->id())->name,
        ]);
    }
}

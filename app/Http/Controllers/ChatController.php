<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Events\NewChat;

class ChatController extends Controller
{
    public function store(Request $request) {
        $payload = [
            'user_id' => auth()->id(),
            'room_id' => $request->roomId,
            'body' => $request->body,
        ];

        $newChat = Chat::create($payload);

        NewChat::dispatch(
            $newChat->user_id, $newChat->user->name, $newChat->room_id, $newChat->body, $newChat->created_at
        );

        return response()->json([
            'data' => $payload,
        ]);
    }
}

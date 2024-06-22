<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use Illuminate\Support\Facades\Redis;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        return MessageResource::collection(
            Message::where('sender_id',auth('api')->id())
            ->where('reciver_id',$request->reciver_id)
            ->orWhere('sender_id',$request->reciver_id)
            ->where('reciver_id',auth('api')->id())
            ->get()
        );
    }

    public function store(MessageRequest $request)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'reciver_id' => $request->reciver_id,
            'msg' => $request->message,
        ]);

        Redis::publish('chat',json_encode([
            'event' => 'sendMessage',
            'data' => new MessageResource($message),
        ]));

        return new MessageResource($message);
    }
}

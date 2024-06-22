<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'sender'        => new UserResource($this->sender),
            'reciver'       => new UserResource($this->reciver),
            'message'       => $this->msg,
            'is_sender'     => auth()->id() === $this->sender_id ? true : false,
        ];
    }
}

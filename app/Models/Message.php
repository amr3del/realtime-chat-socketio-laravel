<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'reciver_id',
        'group_id',
        'msg',
    ];

    public function sender() : BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function reciver() : BelongsTo
    {
        return $this->belongsTo(User::class, 'reciver_id');
    }

    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}

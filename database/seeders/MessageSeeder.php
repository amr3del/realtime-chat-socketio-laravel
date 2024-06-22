<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::create([
            'sender_id' => 1,
            'reciver_id' => 2,
            'msg' => 'Hello, how are you?',
        ]);

        Message::create([
            'sender_id' => 2,
            'reciver_id' => 1,
            'msg' => 'I am fine, thank you.',
        ]);
    }
}

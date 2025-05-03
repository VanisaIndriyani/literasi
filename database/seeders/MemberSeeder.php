<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    public function run()
    {
        Member::create([
            'member_id' => 'MEM001',
            'name' => 'Test Member',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
    }
}
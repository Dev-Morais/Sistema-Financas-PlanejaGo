<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@mail.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('12345678'), 
            'data_nascimento'   => '1990-05-15',
            'log_data_inclusao' => Carbon::now()->toDateString(),
            'remember_token'    => Str::random(10),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

    }
}

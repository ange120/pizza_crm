<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    public $data = [
        [
            "name" => "adminTest",
            "email" => "admin@admin",
            "password" => "12345trewq",
            'role' => 'admin'
        ],
        [
            "name" => "driverTest",
            "email" => "driver@driver",
            "password" => "12345",
            'role' => 'driver'
        ],
    ];

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($this->data as $datum) {
            $user = User::create([
                'name' => $datum['name'],
                'email' => $datum['email'],
                'password' => Hash::make($datum['password']),
            ]);
            $user->assignRole( $datum['role']);
        }

    }
}

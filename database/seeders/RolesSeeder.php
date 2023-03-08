<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class RolesSeeder extends Seeder
{
    public $data = [
        [
            'id'=> 1,
            "name" => "admin",
            "guard_name" => "web",
        ],
        [
            'id'=> 2,
            'name' => 'driver',
            "guard_name" => "web",
        ],
        [
            'id'=> 3,
            'name' => 'user',
            "guard_name" => "web",
        ],
    ];

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        foreach ($this->data as $datum) {
            DB::table('roles')::create([
                'id' => $datum['id'],
                'name' => $datum['name'],
                'guard_name' => $datum['guard_name'],
            ]);
        }

    }
}

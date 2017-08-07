<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('roles')->insert([

            'role' =>'admin',
            'permission' => '["create","delete","update","view"]',
            "created_at" => new Carbon(),
            "updated_at" => new Carbon(),
        ]);
        DB::table('roles')->insert([
            'role' =>'Common',
            'permission' => '["view"]',
            "created_at" => new Carbon(),
            "updated_at" => new Carbon(),
        ]);
    }
}

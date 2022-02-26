<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),                
            'role'     => 1,
        ]);
        DB::table('rate')->insert([
            'rate'          => 110,
            'inspection'    => 300,
            'insurance'     => 100,
        ]);
        
        $country= config('config.country');
        foreach($country as $row){
            DB::table('ports')->insert([
                'country' => $row,
            ]); 
        }
    }
}

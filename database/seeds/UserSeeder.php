<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate();

        App\User::create([
            'username'=>'vidya997',
            'password'=>bcrypt('123456'),
            'status'=>1
        ]);

        
        App\User::create([
            'username'=>'test',
            'password'=>bcrypt('123456'),
            'status'=>1
        ]);
        
    }
}

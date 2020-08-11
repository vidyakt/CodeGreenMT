<?php

use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\UserDetail::truncate();

        App\UserDetail::create([
            'user_id'=>1,
            'name'=>'vidya',
            'email'=>'vidyaktvidya@gmail.com',
            'dob'=>'1997-11-25',
            'city'=>'Palakkad'
            
        ]);

        
        App\UserDetail::create([
            'user_id'=>2,
            'name'=>'testname',
            'email'=>'test@gmail.com',
            'dob'=>'1997-11-25',
            'city'=>'testcity'
            
        ]);
        
    }
}

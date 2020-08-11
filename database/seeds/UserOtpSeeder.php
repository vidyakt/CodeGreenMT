<?php

use Illuminate\Database\Seeder;

class UserOtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\UserOtp::truncate();
    }
}

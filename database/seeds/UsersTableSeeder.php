<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '中岡　美貴',
            'nickname' => 'みき',
            'birthday' => '1998-08-15',
            'gender' => 2,
            'tel'=>'09012345678',
            'email' =>'miki@icloud.com',
            'password' => Hash::make('miki815'),
            'role' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

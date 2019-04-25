<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'name' => "山田花子",
          'email' => "yamada@hanako",
          'password' => "yamadahanako",
          'image_name' => "default_user.jpg"
        ];

        DB::table('users')->insert($param);

        $param = [
          'name' => "田中一郎",
          'email' => "tanaka@ichiro",
          'password' => "tanakaichiro",
          'image_name' => "default_user.jpg"
        ];

        DB::table('users')->insert($param);

        $param = [
          'name' => "鈴木歩",
          'email' => "suzuki@ayumu",
          'password' => "suzukiayumu",
          'image_name' => "default_user.jpg"
        ];

        DB::table('users')->insert($param);


    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
          'content' => 'Laravelの勉強中！',
        ];

        DB::table('posts')->insert($param);

        $param = [
          'content' => '投稿一覧ページ作成中！'
        ];

        DB::table('posts')->insert($param);

        $param = [
          'content' => '楽しくLaravel頑張ろう！！'
        ];

        DB::table('posts')->insert($param);

    }
}

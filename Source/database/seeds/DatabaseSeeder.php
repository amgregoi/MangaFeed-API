<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('User')->insert([
            'name' => 'John Smith',
            'email' => 'jsmith@gmail.com'
        ]);

        DB::table('User')->insert([
            'name' => 'Amy Palmer',
            'email' => 'palmer101@gmail.com'
        ]);

        DB::table('Manga')->insert([
            'url' => 'http://www.funmanga.com/Boku-no-Hero-Academia',
            'image' => 'http://www.funmanga.com/uploads/chapters/cover/tbn/01_26_198x0.jpg'
        ]);

        DB::table('Manga')->insert([
            'url' => 'http://www.funmanga.com/black-clover',
            'image' => 'http://www.funmanga.com/uploads/chapters/cover/tbn/01_27_198x0.jpg'
        ]);

        DB::table('Manga')->insert([
            'url' => 'http://www.funmanga.com/one-piece1',
            'image' => 'http://www.funmanga.com/uploads/chapters/cover/tbn/01_8_198x0.jpg'
        ]);

        DB::table('Follow')->insert([
            'userId' => 1,
            'mangaId' =>1,
            'followType' =>1
        ]);

        DB::table('Follow')->insert([
            'userId' => 1,
            'mangaId' =>3,
            'followType' =>2
        ]);

        DB::table('Follow')->insert([
            'userId' => 2,
            'mangaId' =>2,
            'followType' =>3
        ]);
    }
}

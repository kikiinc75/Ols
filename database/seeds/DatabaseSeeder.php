<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CategorieSeeder::class);
        // $this->call(ProductSeeder::class);

        // insert user admin
        DB::table('users')->insert([
            [
                'name' => 'wahyu iqbal efriansyah',
                'email' => 'wahyuiqbal91@gmail.com',
                'level' => 'admin',
                'password' => bcrypt('admin123'),
                'api_token' => str_random(80)
            ], [
                'name' => 'Syeila',
                'email' => 'srruthbys@gmail.com',
                'level' => 'customer',
                'password' => bcrypt('customer123'),
                'api_token' => str_random(80)
            ],
            [
                'name' => 'Ruth',
                'email' => 'ruthbys@gmail.com',
                'level' => 'customer',
                'password' => bcrypt('123456789'),
                'api_token' => str_random(80)
            ]
        ]);
        // insert table list template
        DB::table('templates')->insert([
            [
                'name' => 'template 2',
                'folder' => 'template2',
                'selected' => '0'
            ], [
                'name' => 'template sela',
                'folder' => 'template_sela',
                'selected' => '1'
            ]
        ]);

        DB::table('pages')->insert([
            [
                'judul' => 'About Us',
                'content' => 'ini adalah halaman content'
            ],
            [
                'judul' => 'Contact Us',
                'content' => 'ini adalah halaman about us'
            ],
            [
                'judul' => 'How To',
                'content' => 'cara belanja disini'
            ]
        ]);
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Book;
use App\Author;

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
        Book::create([
            'user_id'=> 1,
            'author_id'=>1,
            'title'=> 'Harry Potter',
            'cover'=> 'http://bookriotcom.c.presscdn.com/wp-content/uploads/2014/08/HP_pb_new_1.jpg'
        ]);

        Book::create([
            'user_id'=> 1,
            'author_id'=>1,
            'title'=> 'Kamasutra',
            'cover'=> 'https://img1.od-cdn.com/ImageType-400/3363-1/AB1/79E/D3/%7BAB179ED3-D42C-4135-9102-875ABA350C0E%7DImg400.jpg'
        ]);

        Book::create([
            'user_id'=> 1,
            'author_id'=>1,
            'title'=> 'THUG kitchen',
        ]);

        Author::create([
            'name'=> 'Testing Author',
            'year_of_birth'=> '1972',
        ]);

        User::create([
            'name'=>'Matej',
            'email'=>'matpolak@seznam.cz',
            'password'=> '$2y$10$ApgqGBJE9dnxIyqa/Csb0.UntecIvpr08K78KvMEN497F25wde1D2'
        ]);
    }
}

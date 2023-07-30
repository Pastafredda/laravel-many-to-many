<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Models\Book;


class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology :: factory() -> count(10)->create();

        foreach ($technologies as $technology){
            $books = Book::inRandomOrder()->limit(rand(1,5))->get();

            $technology -> books() ->attach($books);
        }
    }


}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Type;
use App\Models\Technology;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = Book :: factory() -> count(10) -> make();

        foreach($books as $book){
            $type = Type :: inRandomOrder() -> first();

            $book -> type_id = $type -> id;
            $book -> save();

        }
    }
}

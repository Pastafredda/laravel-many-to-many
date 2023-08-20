<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Type;
use App\Models\Technology;

class LogController extends Controller
{
    public function show($id){

        $book = Book :: FindOrFail($id);
        return view ("log.show", compact('book'));
    }

    public function create(){
        $types = Type :: all();
        $technologies = Technology :: all();


        return view('log.create', compact("types", "technologies"));
    }

    public function store(Request $request){
        $data= $request ->all();

        $book  = Book :: create($data);
        $book-> technologies() -> attach(($data['technology']));

        return redirect()-> route('log.show', $book -> id);
    }

    public function edit($id){
        $book = Book :: FindOrFail($id);
        $types = Type :: all();
        $technologies = Technology :: all();

        return view ("log.edit", compact('book', "types", "technologies"));
    }

    public function update(Request $request, $id){
        $data= $request ->all();
        // dd($data);
        $book = Book :: FindOrFail($id);
        $book -> update($data);
        if (array_key_exists('technology', $data)) {
            $book-> technologies() -> sync(($data['technology']));
        } else {
            $book->technologies()->detach();
        }

        return redirect()-> route('log.show', $book -> id);
    }

    public function delete($id){
        $book = Book :: FindOrFail($id);
        $book->technologies()->detach();
        $book ->delete();
        return redirect()-> route('guest.index');
    }
}

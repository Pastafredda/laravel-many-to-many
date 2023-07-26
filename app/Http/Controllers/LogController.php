<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Type;

class LogController extends Controller
{
    public function show($id){

        $book = Book :: FindOrFail($id);
        return view ("log.show", compact('book'));
    }

    public function create(){
        $types = Type :: all();

        return view('log.create', compact("types"));
    }

    public function store(Request $request){
        $data= $request ->all();

        $book  = Book :: create($data);
        return redirect()-> route('log.show', $book -> id);
    }
}

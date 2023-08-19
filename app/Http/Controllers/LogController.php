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
        $request->validate([
            'is_available' => 'required|in:si,no',
            // Altre regole di validazione se necessario
        ]);

        // Crea una nuova istanza del modello Product
        $product = new Product();

        // Imposta il valore dell'opzione di disponibilità nel modello in base a ciò che è stato selezionato nel modulo
        $product->is_available = $request->input('is_available');

        // Salva il modello nel database
        $product->save();
        return redirect()-> route('log.show', $book -> id);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class GuestController extends Controller
{
    public function index(){
        $books = Book :: all();
        return view("guest.index", compact('books'));
    }
}

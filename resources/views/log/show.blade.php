@extends('layouts.app')

@section('content')
    <ul>

        <li> autore:{{ $book->author }}</li>
        <li>prezzo:{{ $book->price }}</li>
        <li>trama:{{ $book->plot }}</li>
        <li>editore:{{ $book->editor }}</li>
        <li>genere:{{ $book->type->name }}</li>
        <li>disponibilità:{{ $book->is_available ? 'si' : 'no' }} </li>

    </ul>
@endsection

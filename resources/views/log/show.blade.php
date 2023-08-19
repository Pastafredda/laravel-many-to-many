@extends('layouts.app')

@section('content')
    <ul class="list-unstyled">

        <li>autore: {{ $book->author }}</li>
        <li>prezzo: {{ $book->price }}</li>
        <li>trama: {{ $book->plot }}</li>
        <li>editore: {{ $book->editor }}</li>
        <li>genere: {{ $book->type->name }}</li>
        <li>disponibilità: {{ $book->is_available ? 'si' : 'no' }} </li>
    </ul>

    <h4>materiale utilizzato: {{ count($book->technologies) }}</h4>
    <ul class="list-unstyled">
        @foreach ($book->technologies as $technology)
            <li>{{ $technology->name }}</li>
        @endforeach
    </ul>
@endsection

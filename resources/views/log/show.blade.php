@extends('layouts.app')

@section('content')
    <a href="{{ route('log.edit', $book->id) }}">Modifica libro</a>
    <div>
        @if ($book->main_picture)
            <img src="{{ asset('storage/' . $book->main_picture) }}" width="200px" alt="">
        @else
            Immagine non disponibile
        @endif
    </div>
    <ul class="list-unstyled">
        <li>titolo: <b>{{ $book->title }}</b></li>
        <li>autore: {{ $book->author }}</li>
        <li>prezzo: {{ $book->price }}</li>
        <li>trama: {{ $book->plot }}</li>
        <li>editore: {{ $book->editor }}</li>
        <li>genere: {{ $book->type->name }}</li>
        <li>disponibilità: {{ $book->is_available }} </li>
    </ul>

    <h4>materiale utilizzato: {{ count($book->technologies) }}</h4>
    <ul class="list-unstyled">
        @foreach ($book->technologies as $technology)
            <li>{{ $technology->name }}</li>
        @endforeach
    </ul>
    <form class="d-inline" method="POST" action="{{ route('delete', $book->id) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-primary " type="submit" value="DELETE">
    </form>

    <form class="d-inline" method="POST" action="{{ route('picture-delete', $book->id) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-primary " type="submit" value="DELETE PICTURE">
    </form>
@endsection

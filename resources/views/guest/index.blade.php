@extends('layouts.app')

@section('content')
    <h1>libri</h1>
    <div class="my-4">
        <a class="text-decoration-none text-dark" href="{{ route('log.create') }}">Inserisci un nuovo libro +</a>
    </div>
    <ul>
        @foreach ($books as $book)
            <li class="list-unstyled">
                <a href="{{ route('log.show', $book->id) }}">{{ $book->title }}</a>

            </li>
        @endforeach
    </ul>
@endsection

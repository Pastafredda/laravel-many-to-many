@extends('layouts.app')

@section('content')
    <h1>inserisci un nuovo libro</h1>
    <form action="{{ route('log.store') }}" method="POST">

        @csrf
        @method('POST')
        <label for="code">Codice</label>
        <br>
        <input type="text" name="code" id="code">
        <br>
        <label for="title">Titolo</label>
        <br>
        <input type="text" name="title" id="title">
        <br>
        <label for="author">Autore</label>
        <br>
        <input type="text" name="author" id="author">
        <br>
        <label for="price">Prezzo</label>
        <br>
        <input type="text" name="price" id="price">
        <br>
        <label for="plot">Trama</label>
        <br>
        <input type="text" name="plot" id="plot">
        <br>
        <label for="editor">Editore</label>
        <br>
        <input type="text" name="editor" id="editor">
        <br>
        {{-- <label for="is_available">Disponibilità</label>
        <br>
        <input type="text" name="is_available" id="is_available">
        <br> --}}
        <label for="type_id"></label>

        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <input class="my-3" type="submit" value="Inserisci">


    </form>
@endsection

{{--
code
title
author
price
plot
editor
is_available --}}

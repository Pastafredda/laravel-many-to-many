@extends('layouts.app')

@section('content')
    <h1>inserisci un nuovo libro</h1>
    <form action="{{ route('log.update', $book->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div>
            @if ($book->main_picture)
                <img src="{{ asset('storage/' . $book->main_picture) }}" width="200px" alt="">
            @else
                Immagine non disponibile
            @endif
        </div>
        <label for="main_picture"></label>
        <br>
        <input type="file" name="main_picture" id="main_picture">
        <br>
        <label for="code">Codice</label>
        <br>
        <input type="text" name="code" id="code" value="{{ $book->code }}">
        <br>
        <label for="title">Titolo</label>
        <br>
        <input type="text" name="title" id="title" value="{{ $book->title }}">
        <br>
        <label for="author">Autore</label>
        <br>
        <input type="text" name="author" id="author" value="{{ $book->author }}">
        <br>
        <label for="price">Prezzo</label>
        <br>
        <input type="text" name="price" id="price" value="{{ $book->price }}">
        <br>
        <label for="plot">Trama</label>
        <br>
        <input type="text" name="plot" id="plot" value="{{ $book->plot }}">
        <br>
        <label for="editor">Editore</label>
        <br>
        <input type="text" name="editor" id="editor" value="{{ $book->editor }}">
        <br>
        <label for="is_available">Disponibilità</label>
        <br>
        <input type="radio" name="is_available" id="is_available_yes" value="si"
            @if ($book->is_available == 'si') checked @endif required>
        <label for="is_available_yes">Si</label>

        <input type="radio" name="is_available" id="is_available_no" value="no"
            @if ($book->is_available == 'no') checked @endif required>

        <label for="is_available_no">No</label>
        <br>
        <label for="type_id"></label>

        <label for="type_id"></label>
        <div>
            <h3>seleziona il genere</h3>
        </div>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" @selected($book->type->id === $type->id)>

                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        <br>
        <br>
        <div>
            <h3>seleziona il materiale</h3>
        </div>
        <ul class="list-unstyled">
            @foreach ($technologies as $technology)
                <li>
                    <input name="technology[]" value="{{ $technology->id }}" type="checkbox"
                        id="technology-{{ $technology->id }}"
                        @foreach ($book->technologies as $bookTechnology)
                        @checked($technology -> id === $bookTechnology -> id) @endforeach>
                    <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                </li>
            @endforeach
        </ul>
        <div>

            <input class="my-3" type="submit" value="Inserisci">
        </div>


    </form>
@endsection

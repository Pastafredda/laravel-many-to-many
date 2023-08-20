<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $img_path = Storage:: put('uploads',$data['main_picture']);
        $data['main_picture'] =$img_path;
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

        if (array_key_exists('technology', $data)) {
            $book-> technologies() -> sync(($data['technology']));
        } else {
            $book->technologies()->detach();
        }

        if(!array_key_exists('main_picture', $data)){
            $data['main_picture'] = $book -> main_picture;
        }else{
            if($book -> main_picture){
                $oldImgPath =$book -> main_picture;
                Storage::delete($oldImgPath);
            }
            $data['main_picture'] = Storage::put('uploads',$data['main_picture']);
        }
        $book -> update($data);
        return redirect()-> route('log.show', $book -> id);
    }

    public function delete($id){
        $book = Book :: FindOrFail($id);
        $book->technologies()->detach();
        $book ->delete();
        return redirect()-> route('guest.index');
    }

    public function deletePicture($id){
        $book = Book :: FindOrFail($id);
        if($book -> main_picture){
            $oldImgPath =$book -> main_picture;
            Storage::delete($oldImgPath);
        }
        $book -> main_picture = null;
        $book->save();
        return redirect()-> route('log.show', $book -> id);
    }
}

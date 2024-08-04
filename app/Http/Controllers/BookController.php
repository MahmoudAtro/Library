<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use File;
use Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('content.books.index' , [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Categorie::all();
        return view('content.books.create-book' , ['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Book $book)
    {
        $request->validate([
            'title' => 'required|min:3|max:20',
            'author' => 'required',
            // 'des' => 'required|min:5|max:40',
            // 'body' => 'required|min:10|max:60',
            'categorie' => 'required',
            'date' => 'required',
            'img'=> 'required',
            'file' => 'required'
        ]);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->des = $request->des;
        $book->body = $request->body;
        $book->categorie = $request->categorie;
        $book->date = $request->date;
        $image = null;
        if($request->hasFile('img')){
            $image = time(). '.' . $request->img->extension();
            $request->img->move(public_path('images'), $image);
            $book->img = $image;
        } 

        $filename = null;
        if($request->hasFile('file')){
            $filename = time(). '.' . $request->file->extension();
            $request->file->move(public_path('files') , $filename);
            $book->pdf = $filename;
        }
        $book->save();
        return to_route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return  view("content.books.show" , ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $cat = Categorie::all();
        return view('content.books.updatebook' , ['book' => $book, 'cat' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book  $book)
    {
        $request->validate([
            'title' => 'required|max:20',
            'author' => 'required',
            'date' => 'required|date',
            // 'des' => 'min:5|max:40',
            // 'body' => 'min:10|max:60',
        ]);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'date' => $request->date,
            'des' => $request->des,
            'body' => $request->body,
            'categorie' => $request->categorie
        ]);
        $filename = null;
        if($request->hasFile('file')){
            $filename = time(). '.' . $request->file->extension();
            $request->file->move(public_path('files') , $filename);
            $book->pdf = $filename;
        }
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book  $book)
    {
        $book->delete();
        return redirect()->back()->with('success' , 'book  deleted successfully!');
    }
}

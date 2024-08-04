<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use File;
use Response;


class Categories extends Controller
{
    public function firstcat() {
        // return "this is categorie page";
        $books = Book::where('categorie', 'روايات')->get();
        return view("content.books.index" , [
            'books' => $books,
        ]);

    }

    public function secondcat() {
        // return "this is categorie page";
        $books = Book::where('categorie', 'دينية')->get();
        return view("content.books.index" , [
            'books' => $books,
        ]);

    }

    public function managerbook(Book $book)
        {
            Gate::authorize("view",Auth::user());
            $books = Book::all();
            return view('content.books.bookmanager' , [
                'books'=>$books,
            ]);
        }

    public function readbook(Book $book)
    {
        $book = Book::findOrfail(request()->id);
        return response()->file(public_path('files/'.$book->pdf) ,['content-type'=>'application/pdf']);

    }

    public function uploadpdf(Book $book)
    {
        $book = Book::findOrfail(request()->id);
        return response()->download(public_path('files/'.$book->pdf));
    }
   
}

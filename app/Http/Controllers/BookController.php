<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Book as Book;
use \App\Http\Resources\Book as BookResource;
use \App\Http\Resources\Books as BookResourceCollection;

class BookController extends Controller
{
    public function cetak($judul)
    {
        return $judul;
    }

    public function index()
    {
        // $books = DB::select('SELECT * FROM books');
        // return $books;
        // $books = Book::where('status', 'PUBLISH')->orderBy('title', 'asc')->limit(10)->get();
        $books = new BookResourceCollection(Book::paginate());
        return $books;
    }

    public function view($id)
    {
        // $book = DB::select('SELECT * FROM books WHERE id = :id', ['id' => $id]);
        // return $book;
        // $book = Book::findOrFail($id);
        $book = new BookResource(Book::find($id));
        return $book;
    }
}

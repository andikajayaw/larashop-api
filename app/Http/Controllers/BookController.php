<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Book as Book;
use \App\Http\Resources\Books as BooksResourceCollection;
use \App\Http\Resources\Book as BookResourceCollection;

class BookController extends Controller
{
    public function top($count)
    {
        $criteria = Book::select('*')->orderBy('views', 'DESC')->limit($count)->get();
        return new BooksResourceCollection($criteria);
    }

    public function index()
    {
        $criteria = Book::paginate(6);
        return new BooksResourceCollection($criteria);
    }

    public function slug($slug)
    {
        $criteria = Book::where('slug', $slug)->first();
        $criteria->views = $criteria->views + 1;
        $criteria->save();
        return new BookResourceCollection($criteria);
    }

    public function search($keyword)
    {
        $criteria = Book::select('*')
        ->where('title', 'LIKE', "%{$keyword}%")
        ->orderBy('views', 'DESC')
        ->get();
        return new BooksResourceCollection($criteria);
    }
}

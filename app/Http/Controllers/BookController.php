<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Models\Book as Book;
use \App\Http\Resources\Books as BookResourceCollection;

class BookController extends Controller
{
    public function top($count)
    {
        $criteria = Book::select('*')->orderBy('views', 'DESC')->limit($count)->get();
        return new BookResourceCollection($criteria);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use Storage;

class BooksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $books = $user->books()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'books' => $books,
            ];
        }
        
        return view('welcome', $data);
    }
}

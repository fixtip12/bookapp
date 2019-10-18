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

    public function create()
    {
        $book = new Book;

        return view('books.create', [
            'book' => $book,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:10',
            'impression' => 'required|max:191',
            'image_path' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);

        $book = new Book;

        //s3アップロード開始
        $image = $request->file('image_path');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $book->image_path = Storage::disk('s3')->url($path);

        $request->user()->books()->create([
            'title' => $request->title,
            'impression' => $request->impression,
            'image_path' => $request->image_path,
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $book= Book::find($id);

        return view('books.edit', [
            'book' => $book,
        ]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', [
            'book' => $book,
        ]);
    }
}

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
            $books = $user->books()->orderBy('created_at', 'desc')->paginate(2);

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
            'title' => 'required|max:191',
            'impression' => 'required|max:191',
            'image_path' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);

        $book = new Book;
        $book->title = $request->title;
        $book->impression = $request->impression;
        $book->user_id = auth()->id();

        //s3アップロード開始
        $image = $request->file('image_path');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $book->image_path = Storage::disk('s3')->url($path);
        $book->save();


        return redirect('/');
    }

    public function edit($id)
    {
        $book = Book::find($id);

        if (\Auth::id() === $book->user_id) {
            return view('books.edit', [
                'book' => $book,
            ]);
        }

        return redirect('/');
    }


    public function show($id)
    {
        $book = Book::find($id);

        if (\Auth::id() === $book->user_id) {
            return view('books.show', [
                'book' => $book,
            ]);
        }

        return redirect('/');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'impression' => 'required|max:191',
            'image_path' => 'required|file|mimes:jpg,jpeg,png,gif'
        ]);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->impression = $request->impression;
        $book->user_id = auth()->id();

        //s3アップロード開始
        $image = $request->file('image_path');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        // アップロードした画像のフルパスを取得
        $book->image_path = Storage::disk('s3')->url($path);
        $book->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (\Auth::id() === $book->user_id) {
            $book->delete();
        }

        return redirect('/');
    }
}

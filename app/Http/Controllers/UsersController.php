<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Book;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $books = $user->books()->orderBy('created_at', 'desc')->paginate(2);

        $data = [
            'user' => $user,
            'books' => $books,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}
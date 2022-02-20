<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $groupActiveUsers = User::where("group_status", "1")->count();
        $books = Book::count();
        $bookReads = Book::sum("read");

        return view("admin.index", compact("users", "groupActiveUsers", "books", "bookReads"));
    }

    public function visitorIndex(User $user)
    {
        return view("admin.visitors");
    }
}

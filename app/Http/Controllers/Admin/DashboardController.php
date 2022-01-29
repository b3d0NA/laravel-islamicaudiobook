<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $users = User::count();
        $groupActiveUsers = User::where("group_status", "1")->count();
        $books = Book::count();
        $bookReads = Book::sum("read");

        return view("admin.index", compact("users", "groupActiveUsers", "books", "bookReads"));
    }
}
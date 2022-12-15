<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()){
            return redirect()->route('admin.home');
        }
        return view('home');
    }

    public function indexAdmin()
    {
        $users_count = User::where('role', 'user')->count();
        $bikes_count = Bike::count();
        $books_count = Book::count();
        $pending_bookings_count = Book::where('status', 'pending')->count();
        $books = Book::with('user', 'bike')->orderBy('id', 'desc')->take(5)->get();
        return view('admins.dashboard', compact('users_count', 'bikes_count', 'books_count', 'pending_bookings_count','books'));
    }
}

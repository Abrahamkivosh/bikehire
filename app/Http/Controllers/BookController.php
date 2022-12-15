<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admins.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    public function bookApprove(Book $book)
    {
        $book->status = 'approved';
        $book->save();
        Session::flash('success', 'Booking Approved');
        return redirect()->back()->with('success', 'Booking Approved');
    }
    public function bookReject(Book $book)
    {
        $book->status = 'rejected';
        $book->save();
        Session::flash('success', 'Booking Rejected');
        return redirect()->back()->with('success', 'Booking Rejected');
    }
    public function bookCancel(Book $book)
    {
        $book->status = 'cancelled';
        $book->save();
        Session::flash('success', 'Booking Cancelled');
        return redirect()->back()->with('success', 'Booking Cancelled');
    }
    public function bookComplete(Book $book)
    {
        $book->status = 'completed';
        $book->save();
        Session::flash('success', 'Booking Completed');
        return redirect()->back()->with('success', 'Booking Completed');
    }

}

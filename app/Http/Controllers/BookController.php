<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateBookRequest;

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
    public function store(Request $request)
    {
        // array of data to be inserted [ [key => value], [key => value] ]
        $dataArray = $request->all();
        foreach ($dataArray as $key => $value) {
            $book = new Book();
            $book->book_number = Str::uuid();
            $book->user_id = $value['user_id'];
            $book->bike_id = $value['id'];
            $book->quantity = $value['quantity'];
            $book->start_date = null;
            $book->end_date = null;
            $book->price_per_hour = $value['price_per_hour'];
            $book->total_hours = null;
            $book->total = null;
            $book->status = 'pending';
            $book->save();
        }

        
        // $data['total_hours'] = $data['end_date']->diffInHours($data['start_date']);

        // $data['total'] = $data['total_hours'] * $data['price_per_hour'];
        // foreach ($data as $key => $value) {
        //     Log::info( $value);
          
            
        // }

        return response()->json(['success' => 'Booked successfully']);

       
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
    
    public function bikeBookings(){
        $user = auth()->user();
        $books = $user->bookings;
        return view('users.bookings', compact('books'));
    }

    protected function generateBookNumber()
    {
        $bookNumber = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the book number exists already
        if ($this->bookNumberExists($bookNumber)) {
            return $this->generateBookNumber();
        }

        // otherwise, it's valid and can be used
        return $bookNumber;
    }

}

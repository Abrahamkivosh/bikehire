@extends('layouts.clients.app')
@section('title', 'User Bookings')
@section('content')
    <!-- HOME -->
    @include('users.partials.topNav')

    <main>


        <section>
            <div class="container">
                <div class="row">
                    @include('users.customerNavBar')

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <h2>Bookings <small>Customer Bikes Bokkings</small></h2>
                        </div>
                    </div>

                    <div class="co-md-12">

                        <div class="my-table">

                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Book Number</th>
                                        <th>Bike</th>
                                        <th>Price per hour</th>
                                        <th>Quantity</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Book Number</th>
                                        <th>Bike</th>
                                        <th>Price per hour</th>
                                        <th>Quantity</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->bike->name }}</td>
                                        <td>{{ $book->bike->price_per_hour }}</td>
                                        <td>{{ $book->quantity }}</td>
                                        <td>{{ $book->start_date }}</td>
                                        <td>{{ $book->end_date }}</td>
                                        <td>{{ $book->total }}</td>
                                        <td>{{ $book->status }}</td>
                                       
                                    </tr>
                                 
                                   
                                    @endforeach
                                   
                                </tbody>
                            </table>


                          
                        </div>
                        
                    </div>

                   


                </div>
            </div>
        </section>
        
        @include("users.partials.testimonies")
    </main>

    <!-- CONTACT -->
   @include('users.partials.contactUs')
@endsection

@extends('layouts.clients.app')
@section('title', 'User Dashboard')
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
                            <h2>Dashboard <small>Customer Dashboard</small></h2>
                        </div>
                    </div>

                    <div class="co-md-12">
                        <div class="row">
                            <div class="card col-md-6 ">
                                <img class="card-img-top" src="holder.js/100x180/" alt="">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $user->name }}</h4>
                                    <p class="card-text">Email : {{ $user->email }}</p>
                                    <p class="card-text">Phone : {{ $user->phone }}</p>
                                    <p class="card-text">Address : {{ $user->address }}</p>
                                    <p class="card-text">City : {{ $user->city }}</p>
                                    <p class="card-text">Country : {{ $user->country }}</p>
                                    <p class="card-text">National ID : {{ $user->name }}</p>

                                    <div>
                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit User Profile</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                   


                </div>
            </div>
        </section>
       
       @include('users.partials.testimonies')
    </main>

    <!-- CONTACT -->
        @include('users.partials.contactUs')
@endsection

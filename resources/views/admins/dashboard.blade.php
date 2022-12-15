@extends("layouts.adminApp")
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Comment - table -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CLIENTS</h5>
                    <div class="d-flex no-block align-items-center m-t-20">
                        <div class="display-6"><i class="icon-people text-info"></i></div>
                        <div class="ml-auto">
                            <h1>{{ $users_count }}</h1></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bikes</h5>
                    <div class="d-flex no-block align-items-center m-t-20">
                        <div class="display-6"><i class="icon-folder text-purple"></i></div>
                        <div class="ml-auto">
                            <h1>{{ $bikes_count }}</h1></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Bookings</h5>
                    <div class="d-flex no-block align-items-center m-t-20">
                        <div class="display-6"><i class="icon-folder-alt text-danger"></i></div>
                        <div class="ml-auto">
                            <h1>{{ $books_count }}</h1></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Bookings</h5>
                    <div class="d-flex no-block align-items-center m-t-20">
                        <div class="display-6"><i class="ti-wallet text-success"></i></div>
                        <div class="ml-auto">
                            <h1>{{ $pending_bookings_count }}</h1></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- ============================================================== -->
    <!-- End Comment - chats -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->
 
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Todo, chat, notification -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">BOOKINGS STATUS</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>User</th>
                                <th>Bike</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($books as $book)
                            <tr>
                                <td><a href="{{ route('books.show',$book) }}" class="link text text-info "> {{ $book->book_number }} </a></td>
                                <td> {{ $book->user->name }}</td>
                                <td>{{ $book->bike->name }}</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i>  {{ $book->start_date }} </span></td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i>  {{ $book->end_date }} </span></td>
                                <td> <i class="fa fa-adjust" aria-hidden="true"></i> {{ $book->quantity }} </td>
                                <td> <i class="fa fa-money" aria-hidden="true"></i> {{ $book->total }} </td>
                                <td class="text-center">
                                   
                                    @switch($book->status)
                                        @case('pending')
                                        <div class="label label-table label-info">pending</div>
                                            @break
                                        @case('approved')
                                        <div class="label label-table label-cyan">Approved</div>
                                            @break

                                            @case('rejected')
                                        <div class="label label-table label-danger">Rejected</div>
                                            @break
                                            @case('canceled')
                                        <div style="background-color: #321; font-weight: 900; " class="label label-table ">Canceled</div>
                                            @break
                                            @case('completed')
                                            <div class="label label-table label-success">completed</div>
                                                @break



                                        @default
                                            
                                    @endswitch

                                </td>
                            </tr>
                                
                            @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    @include('includes.rightsidebar')
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection
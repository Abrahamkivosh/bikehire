@extends("layouts.adminApp")
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Books </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">books</li>
                </ol>
                            </div>
        </div>
    </div>

  
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Todo, chat, notification -->
    <!-- ============================================================== -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-between">
                        <div>Bikes</div>
                        
                    </h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Book Number</th>
                                    <th>User</th>
                                    <th>Bike</th>
                                    <th>Price per hour</th>
                                    <th>Quantity</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Book Number</th>
                                    <th>User</th>
                                    <th>Bike</th>
                                    <th>Price per hour</th>
                                    <th>Quantity</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->user->name }}</td>
                                    <td>{{ $book->bike->name }}</td>
                                    <td>{{ $book->bike->price_per_hour }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->start_date }}</td>
                                    <td>{{ $book->end_date }}</td>
                                    <td>{{ $book->total }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td>
                                        {{--  drop down   --}}
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Actions
                                            </button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{ route('books.edit', $book->id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('books.show', $book->id) }}">View</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item bg-success " href="{{ route('books.approve', $book->id) }}">Approve</a>
                                                <a class="dropdown-item bg-danger " href="{{ route('books.reject', $book->id) }}">Reject</a>
                                                <a class="dropdown-item bg-dark" href="{{ route('books.cancel', $book->id) }}">Cancel</a>
                                                <a class="dropdown-item bg-success " href="{{ route('books.complete', $book->id) }}">Complete</a>

                                                <div class="dropdown-divider"></div>
                                              <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
                                            </form>
                                            </div>
                                          </div>
                                        {{--  end drop down   --}}

                                        

                                      
                                    </td>
                                </tr>
                             
                               
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
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
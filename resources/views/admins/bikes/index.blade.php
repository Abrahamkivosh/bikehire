@extends("layouts.adminApp")
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Bikes </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Bikes</li>
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
                        <div>
                            <a class="btn btn-info" href="{{ route('bikes.create')}}">Create New <i class="fa fa-black-tie" aria-hidden="true"></i></a>
                        </div>
                    </h4>
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Price per hour</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Description</th>
                                    <th>Price per hour</th>
                                    <th>Quantity</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($bikes as $bike)
                                <tr>
                                    <td>{{ $bike->name }}</td>
                                    <td>{{ $bike->brand->name }}</td>
                                    <td>{{ Str::of($bike->description )->limit(60) }}</td>
                                    <td>KSH {{ number_format($bike->price_per_hour, 2)  }}</td>
                                    <td>{{ $bike->quantity }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('bikes.edit',$bike->id) }}">Edit</a>
                                        <form action="{{ route('bikes.destroy',$bike->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
@extends('layouts.adminApp')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Brands </h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                        <li class="breadcrumb-item active"> Create brands</li>
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
                            <div>Bike Edit</div>
                            <div>
                                <a class="btn btn-info" href="{{ route('brands.index') }}">Back</a>
                            </div>
                        </h4>
                        <div class="">
                            <form action="{{ route('brands.update',$brand) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" name="name" id=""
                                  class="form-control @error('name') is-invalid @enderror"
                                  value="{{ $brand->name }}"
                                   placeholder="name" >

                                   @error('name')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror

                                  
                                </div>
                                <div class="form-group">
                                  <label for="description">Description</label>
                                  <textarea  class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ $brand->description }}</textarea>
                                  @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-info">Update</button>
                            </form>

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

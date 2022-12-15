@extends('layouts.adminApp')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
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
                                <a class="btn btn-info" href="{{ route('bikes.index') }}">Back</a>
                            </div>
                        </h4>
                        <div class="">

                            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                            <form class="row" action="{{ route('bikes.store') }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <div class="col-md-4" >
                                    <div class="form-group ">
                                  <label for="brand_id">Select Brand</label>
                                  <select class="form-control select2 @error('brand_id') is-invalid @enderror" name="brand_id" id="select2">
                                    <option disabled selected >Select brand name</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        
                                    @endforeach
                                    
                                  </select>
                                </div>
                                </div>
                                

                                <div class="form-group col-md-4 ">
                                  <label for="name">Name</label>
                                  <input type="text" name="name" id="name"
                                  class="form-control @error('name') is-invalid @enderror"
                                   placeholder="name" >

                                   @error('name')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="">Image</label>
                                    <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                     placeholder="image" >
  
                                     @error('image')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="price_per_hour">Price Per Hour</label>
                                    <input type="text" name="price_per_hour" id="price_per_hour"
                                    class="form-control @error('price_per_hour') is-invalid @enderror"
                                     placeholder="price_per_hour" >
  
                                     @error('price_per_hour')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                  </div>


                                  <div class="form-group col-md-4">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" id="color"
                                    class="form-control @error('color') is-invalid @enderror"
                                     placeholder="color" >
  
                                     @error('color')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                  </div>

                                  <div class="form-group col-md-4">
                                    <label for="quantity">quantity</label>
                                    <input type="text" name="quantity" id="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                     placeholder="quantity" >
  
                                     @error('quantity')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                                  </div>






                                <div class="form-group col-md-12">
                                  <label for="description">Description</label>
                                  <textarea  class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
                                  @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-info">Submit</button>
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

@extends('layouts.clients.app')
@section('title', 'Home')
@section('content')
<!-- HOME -->


<main>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header h3 text-info">{{ __('Register') }}</div>
        
                        <div class="card-body d-flex justify-content-center ">
                            <form method="POST" class="row" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group col-md-4 ">
                                    <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                  <input type="text" name="name" id="name" 
                                  class="form-control @error('name') is-invalid @enderror"
                                  placeholder="name">
                                  @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>
                                  <input type="text" name="email" id="email" 
                                  class="form-control @error('email') is-invalid @enderror"
                                  placeholder="email">
                                  @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="national_id" class="col-form-label text-md-end">{{ __('NAtional Id') }}</label>
                                  <input type="text" name="national_id" id="national_id" 
                                  class="form-control @error('national_id') is-invalid @enderror"
                                  placeholder="national_id">
                                  @error('national_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="phone" class="col-form-label text-md-end">{{ __('Phone Number') }}</label>
                                  <input type="text" name="phone" id="phone" 
                                  class="form-control @error('phone') is-invalid @enderror"
                                  placeholder="Phone Number">
                                  @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>


                                <div class="form-group col-md-4 ">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                  <input type="password" name="password" id="password" 
                                  class="form-control @error('password') is-invalid @enderror"
                                  placeholder="password">
                                  @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group col-md-4 ">
                                    <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                  <input type="password" name="password_confirmation" id="password_confirmation" 
                                  class="form-control @error('password_confirmation') is-invalid @enderror"
                                  placeholder="password">
                                  @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
        
                                
        
                                
        
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
        
                                     
                                    </div>
                                    <div class="">
                                        <a class="text text-info h3" href="{{ route('login') }}">Already Have account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</main>

<!-- CONTACT -->
<section id="contact">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-12">
                    <form id="contact-form" role="form" action="" method="post">
                         <div class="section-title">
                              <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                         </div>

                         <div class="col-md-12 col-sm-12">
                              <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
               
                              <input type="email" class="form-control" placeholder="Enter email address" name="email" required>

                              <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                         </div>

                         <div class="col-md-4 col-sm-12">
                              <input type="submit" class="form-control" name="send message" value="Send Message">
                         </div>

                    </form>
               </div>

               <div class="col-md-6 col-sm-12">
                    <div class="contact-image">
                         <img src="clients/images/contact-1-600x400.jpg" class="img-responsive" alt="Smiling Two Girls">
                    </div>
               </div>

          </div>
     </div>
</section> 
@endsection
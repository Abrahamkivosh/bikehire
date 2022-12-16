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
                        <div class="card-header h3 text-info">{{ __('Login') }}</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
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

                                <div class="form-group">
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
        
                                
        
                                
        
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <a href="{{ route('register') }}">Create new account</a>
                                        
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
@extends('layouts.clients.app')
@section('title', 'Home')
@section('content')
<!-- HOME -->
@include("users.partials.topNav")
<main>
    

     <section>
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title text-center">
                              <h2>Move with Convinence  
                                   <small>
                                        Our fleet of bikes  are available for rent at affordable prices.
                                         </small></h2>
                         </div>
                    </div>
                    
                    @foreach ($bikes as $bike)
                    <div class="col-md-4 col-sm-6">
                         <div class="team-thumb">
                              <div class="team-image">
                                   <a href="{{ route('bike.show',$bike) }}">
                                   <img src="{{ $bike->image }}" class="img-responsive" alt="">
                                   </a>
                              </div>
                              <div class="team-info">
                                   <h3>{{ $bike->brand->name }}</h3>

                                   <p class="lead"><small>from</small> <strong>KSH {{ $bike->price_per_hour }} </strong> <small>per hour</small></p>

                                   <p>
                                        Color {{ $bike->color }} <br>
                                       
                                   </p>
                                   <span>{{ $bike->description }}</span>
                              </div>
                             
                              <div class="team-thumb-actions">
                                  
                                   <form action="{{ route('cart.add',$bike) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="bike_id" value="{{ $bike->id }}">
                                        <button type="submit"  class="section-btn btn btn-primary btn-block">Book Now</button>
                                   </form>

                              </div>
                         </div>
                    </div>
                         
                    @endforeach
                    

                   

               </div>
          </div>
     </section>
     <section>
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title text-center">
                              <h2>Latest Blog posts <small>Lorem ipsum dolor sit amet.</small></h2>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="courses-image">
                                        <img src="clients/images/blog-1-720x480.jpg" class="img-responsive" alt="">
                                   </div>
                                   <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h3>
                              </div>

                              <div class="courses-info">
                                   <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="courses-image">
                                        <img src="clients/images/blog-2-720x480.jpg" class="img-responsive" alt="">
                                   </div>
                                   <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="blog-post-details.html">Tempora molestiae, iste, consequatur unde sint praesentium!</a></h3>
                              </div>

                              <div class="courses-info">
                                   <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="courses-image">
                                        <img src="clients/images/blog-3-720x480.jpg" class="img-responsive" alt="">
                                   </div>
                                   <div class="courses-date">
                                        <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                        <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                        <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="blog-post-details.html">A voluptas ratione, error provident distinctio, eaque id officia?</a></h3>
                              </div>

                              <div class="courses-info">
                                   <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <section id="testimonial">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title text-center">
                              <h2>Testimonials <small>from around the world</small></h2>
                         </div>

                         <div class="owl-carousel owl-theme owl-client">
                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <img src="clients/images/tst-image-1-200x216.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="tst-author">
                                             <h4>Jackson</h4>
                                             <span>Shopify Developer</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam voluptas, facilis adipisci dolorem exercitationem nemo aut error impedit repudiandae iusto.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <img src="clients/images/tst-image-2-200x216.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="tst-author">
                                             <h4>Camila</h4>
                                             <span>Marketing Manager</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente error, unde eos laborum consequatur officiis perferendis vel debitis, dolore, ipsum quibusdam culpa quisquam, reiciendis aspernatur.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <img src="clients/images/tst-image-3-200x216.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="tst-author">
                                             <h4>Barbie</h4>
                                             <span>Art Director</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit laborum minima autem, reprehenderit mollitia amet id, beatae quo sequi culpa assumenda neque a quisquam, magni.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="tst-image">
                                             <img src="clients/images/tst-image-4-200x216.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="tst-author">
                                             <h4>Andrio</h4>
                                             <span>Web Developer</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore natus culpa laudantium sit dolores quidem at nulla, iure atque laborum! Odit tempora, enim aliquid at modi illum ducimus explicabo soluta.</p>
                                        <div class="tst-rating">
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                             <i class="fa fa-star"></i>
                                        </div>
                                   </div>
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
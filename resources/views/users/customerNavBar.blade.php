<div class="col-md-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId">
     <li class="nav-item">
         <a href="{{ route('customer.home') }}" class="nav-link active">Dasboard</a>
     </li>
     
     <li class="nav-item">
         <a href="{{ route('bikes.bookings') }}" class="nav-link">Bookings</a>
     </li>
     <li class="nav-item">
         <a href="{{ route('user.edit',auth()->user()) }}" class="nav-link disabled">Edit Profile</a>
     </li>

     <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
     </li>

    </ul>
    
    
 
 </div>
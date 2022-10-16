
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">H-Shopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

  
    <form action="{{url('search')}}" method="post" class="input-group w-25 mx-5 ">
          @csrf
  <input type="text" class="form-control b-34 " name="name" placeholder="type to search" >
 
  <button type="submit" class="input-group-text" >Search</button>

</form>




      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        
        @if(Auth::id() && Session::get('counts')['cartcount']!=NULL )
        <li class="nav-item">
          <a class="nav-link cart-count" href="{{url('show-cart')}}">Cart<span class="cart-count-color fw-3">
           
          ({{Session::get('counts')['cartcount']->count()}})
         
          </span> <i class="fa fa-shopping-cart"></i></a>
        </li>
        
        
      @else
        <li class="nav-item">
          <a class="nav-link cart-count" href="{{url('show-cart')}}">Cart<i class="fa fa-shopping-cart"></i></a>
</li>
@endif
       
@if(Auth::id() && Session::get('counts')['wishlistcount'] )
        <li class="nav-item">
          <a class="nav-link" href="{{url('show-wishlist')}}">Wishlist <span class="cart-count-color fw-3">({{Session::get('counts')['wishlistcount']->count()}})</span> <i class="fa fa-heart"></i></a>
        </li>
      
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{url('show-wishlist')}}">Wishlist  <i class="fa fa-heart"></i></a>
        </li>
        @endif

       
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('show-order')}}">Order</a>
        </li>



        


        @guest
            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
             @endif

                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                 @endif
                        @else


         <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('register') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('myprofile') }}
                                    </a>

                                    



                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest

                         
      </ul>

    </div>



        









  </div>
</nav>
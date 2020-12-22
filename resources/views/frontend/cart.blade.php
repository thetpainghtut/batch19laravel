@extends('master')
@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{ asset('blog_assets/img/home-bg.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Shopping Cart</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <button class="btn btn-info checkoutbtn">Checkout</button>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/cart.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      
      $('.checkoutbtn').click(function () {
        // body...
        let ls = localStorage.getItem('cart');
        let notes = 'This is notes';
        $.post("{{route('orders.store')}}",{ls:ls,notes:notes},function (response) {
          console.log(response)
        })
      })
    })
  </script>
@endsection
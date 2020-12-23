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
      <div class="col-md-12">
        <div class="form-group">
          <textarea class="form-control notes"></textarea>
        </div>
        @guest
          <button class="btn btn-info">Login To Checkout</button>
        @else
          <button class="btn btn-info checkoutbtn">Checkout</button>
        @endguest
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Successful Modal!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <a href="{{route('homepage')}}" class="btn btn-primary">OK</a>
        </div>
      </div>
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
        let lsArr = JSON.parse(ls);
        let total = lsArr.reduce((acc, row) => acc + (row.price*row.qty), 0);
        // console.log(total);
        let notes = $('.notes').val();
        $.post("{{route('orders.store')}}",{ls:ls,notes:notes,total:total},function (response) {
          // console.log(response)
          localStorage.clear();
          $('#exampleModal').modal('show');
        })
      })
    })
  </script>
@endsection
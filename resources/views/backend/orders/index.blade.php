@extends('backend_master')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Orders</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h4 class="d-inline-block">Orders List</h4>

            <div class="table-responsive mt-3">
              <table class="table table-bordered" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Order No</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($orders as $order)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->orderno}}</td>
                    <td>{{number_format($order->total)}}</td>
                    <td>{{$order->orderdate}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>
                      <a href="{{route('orders.show',$order->id)}}" class="btn btn-success btn-sm">Detail</a>
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
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection
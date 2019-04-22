
@extends('backend.layout')

@section('title', ' | All Order')

@push('styles')
  <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
@endpush

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-large"></i> All Orders</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y - g:i A', time()) }} </a></li>
    </ul>
  </div>


<br>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table display nowrap" style="width:100%;" id="order-table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Customer</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Order Date</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach($orders as $key=>$order)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->is_paid }}</td>
                  <td>{{ $order->is_completed }}</td>
                  <td>{{ date('M j, Y', time($order->created_at)) }}</td>
                  <td>{{ date('M j, Y', time($order->updated_at)) }}</td>
                  <td class="text-center">
                  <a class="btn btn-sm btn-success" href="{{route('admin.order.show', $order->id)}}"> 
                    <i class="fa fa-eye"></i>
                  </a>

                  <a class="btn btn-sm btn-danger"
                   href=""> 
                   <i class="fa fa-trash"></i>
                 </a>

                   <form action="" method="post" style="display: none;">
                     @csrf
                     @method('DELETE')
                   </form>
                </td>
                </tr>
            @endforeach            
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>


@endsection

@push('scripts')
    <script src="{{asset('js/parsley.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">

    $('#order-table').DataTable({
      "scrollX" : true
    });

  </script>
@endpush
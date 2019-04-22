@extends('frontend.layout')

@section('title', ' | My Account')


@section('content')

    <div class="single_product">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Account Information</h5>
                    <h5>Default Address</h5>
                </div>
                <div class="col-md-8">
                      <table class="table table-hovered">
                        <thead>
                          <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Code</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($orders as $key=>$order)
                            <tr>
                              <td>{{ $key +1 }}</td>
                              @foreach($order->carts as $cart)

                                <td>{{ $cart->product->title }}</td>
                                <td>{{ $cart->product->sku }}</td>

                              @endforeach
                              <td>{{ $order->is_paid }}</td>
                              <td>{{ $order->is_completed }}</td>
                              <td>{{ date('M j, Y', time($order->created_at)) }}</td>
                              <td>{{ date('M j, Y', time($order->updated_at)) }}</td>
                            
                            </tr>
                        @endforeach            
                          
                        </tbody>
                      </table>
                </div>
  </div>
        </div>
    </div>
</section>

@endsection

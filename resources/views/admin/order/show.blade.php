
@extends('backend.layout')

@section('title', ' | Single Products')

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-shopping-bag"></i> Order Details</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12 pb-4">

        <a class="btn btn-primary" href="{{route('admin.order.index')}}" ><i class="fa fa-fw fa-lg fa-chevron-circle-left"></i>Back </a>

    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <h4>Items Ordered</h4>

          @php 
            $total_price = 0;
          @endphp
            <table class="table">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach($order->carts as $cart)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $cart->product->title }}</td>
                  <td>{{ $cart->product->sku }}</td>
                  <td>
                    <img src="{{ asset('frontend/product-images/'.$cart->product->image) }}" width="100">
                  </td>
                  <td>{{ 'TK '.$cart->product->price }}</td>
                  <td>
                    <input type="number" value="{{ $cart->product_quantity }}" class="form-control" style="width: 70px;">
                  </td>
                  <td>
                    @php 
                      $total_price += $cart->product_quantity * $cart->product->price;
                    @endphp
                    {{ $cart->product_quantity * $cart->product->price }}
                  </td>
                  <td>
                    <a class="btn btn-sm btn-danger"
                              onclick="event.preventDefault();
                              document.getElementById('delete-form.{{$cart->id}}').submit();" 
                               href="{{ route('admin.order.show', $order->id) }}"> 
                               <i class="fa fa-trash"></i>
                             </a>

                         <form id="delete-form.{{$cart->id}}" action="{{ route('carts.delete',$cart->id) }}" method="post" style="display: none;">
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

  <div class="row">
    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
          <h4>Customer Information</h4>
          <hr style="border-top: 1px solid #C82933;">

          <p>Name: {{$order->name}}</p>
          <p>Phone: {{$order->phone_no}}</p>
          <p>Email: {{$order->email}}</p>
          <p>Address: {{$order->shipping_address}}</p>

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
          <h4>Payment Information</h4>
          <hr style="border-top: 1px solid #C82933;">

          <p>Payment Type: {{$order->payment_type}}</p>
          <p>Transaction Id: {{$order->transaction_id}}</p>
          <p>Payment Status: {{$order->is_paid}}</p>

        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="tile">
        <div class="tile-body">
          <h4>Order Total</h4>
          <hr style="border-top: 1px solid #C82933;">
          
          <p>Subtotal: {{ $total_price }}</p>
          <p>Shipping Cost: Tk 50</p>
          <p>Grand Total: {{ $total_price + 50 }}</p>

        </div>
      </div>
    </div>
  </div>

</main>


@endsection

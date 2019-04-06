
@extends('backend.layout')

@section('title', ' | All Products')

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-shopping-bag"></i> All Products</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <a class="btn btn-primary" href="{{route('admin.product.create')}}" ><i class="fa fa-fw fa-lg fa-plus-circle"></i>Add New Product </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Price</th>
                <th>SKU</th>
                <th>Stock</th>
                <th>User</th>
                <th>Upload Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($products as $key => $product)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price. ' Tk' }}</td>
                <td>{{ strtoupper($product->sku) }}</td>
                <td>{{ $product->is_stock == 1 ? 'Yes' : 'No' }}</td>
                <td>{{ $product->user->name }}</td>
                <td>{{ date('M j, Y H:i', time($product->created_at)) }}</td>
                <td class="text-center">
                  <a class="btn btn-sm btn-success" href="{{route('admin.product.show', $product->id )}}"> 
                    <i class="fa fa-eye"></i>
                  </a>

                  <a class="btn btn-sm btn-primary" href="{{route('admin.product.edit', $product->id)}}"> 
                    <i class="fa fa-pencil-square-o"></i>
                  </a>

                  <a class="btn btn-sm btn-danger"
                  onclick="event.preventDefault();
                  document.getElementById('delete-form').submit();" 
                   href="{{route('admin.product.index')}}"> 
                   <i class="fa fa-trash"></i>
                 </a>

                   <form id="delete-form" action="{{route('admin.product.destroy', $product->id)}}" method="post" style="display: none;">
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
    <script type="text/javascript" src="{{asset('backend/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('backend/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">

    $('#sampleTable').DataTable();

  </script>
@endpush
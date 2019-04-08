
@extends('backend.layout')

@section('title', ' | All Categories')

@push('styles')
  <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
@endpush

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-large"></i> All Categories</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>

<div class="tile">
  <form class="row" action="{{route('admin.category.store')}}"  method="post" enctype="multipart/form-data" data-parsley-validate>
    @csrf

    <div class="form-group col-md-5">
      <label class="control-label">Category Name</label>
      <input class="form-control" name="name" type="text" placeholder="Category Name" required>
    </div>
    <div class="form-group col-md-3">
      <label class="control-label">Category Image</label>
      <input class="form-control" type="file" name="image" placeholder="Category Image" required>
    </div>

        <div class="form-group col-md-3">
      <label class="control-label">test </label>
      <input class="form-control" type="number" data-parsley-min="1" required>
    </div>

    <div class="form-group col-md-2 align-self-end">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-fw fa-lg fa-check-circle"></i>Add Category</button>
    </div>
  </form>
</div>
<br>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="categories-table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            
            @foreach($categories as $key => $cat);
            
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->image }}</td>
                <td>{{ date('M j, Y', time($cat->created_at)) }}</td>
                <td class="text-center">
                  <a class="btn btn-sm btn-primary" href="{{route('admin.category.edit', $cat->id)}}"> 
                    <i class="fa fa-pencil-square-o"></i>
                  </a>

                  <a class="btn btn-sm btn-danger"
                  onclick="event.preventDefault();
                  document.getElementById('category-form{{$cat->id}}').submit(); " 
                   href="{{route('admin.category.index')}}"> 
                   <i class="fa fa-trash"></i>
                 </a>
                 <form id="category-form{{$cat->id}}" action="{{route('admin.category.destroy', $cat->id)}}" method="post" style="display: none;">
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

    $('#categories-table').DataTable();

  </script>
@endpush
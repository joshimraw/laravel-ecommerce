
@extends('backend.layout')

@section('title', ' | All Tags')

@section('content')

 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-tags fa-lg"></i> All Tags</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>

<div class="tile">
  <form class="row" action="{{route('admin.tag.store')}}" method="post">
    @csrf

    <div class="form-group col-md-5">
      <label class="control-label">Tag Name</label>
      <input class="form-control" name="name" type="text" placeholder="Tag Name">
    </div>

    <div class="form-group col-md-2 align-self-end">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-fw fa-lg fa-check-circle"></i>Add Tag</button>
    </div>
  </form>
</div>
<br>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="tags-table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
          
            @foreach($tags as $key => $tag)

              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ date('M j, Y', time($tag->name)) }}</td>
                <td class="text-center">
                  <a onclick="event.preventDefault();
                              document.getElementById('tag-form{{$tag->id}}').submit(); "     
                  href="{{route('admin.tag.index')}}" class="btn btn-sm btn-danger">
                  <span class="fa fa-trash"></span>
                    
                  </a>
                  <form id="tag-form{{$tag->id}}" action="{{route('admin.tag.destroy', $tag->id)}}" method="post" style="display: none;">
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

    $('#tags-table').DataTable();

  </script>
@endpush
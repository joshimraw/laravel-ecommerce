
@extends('backend.layout')

@section('title', ' | Singe Categories')

@section('content')


 <main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-large"></i>{{ $category->name }}</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="#">{{ Auth::user()->name }} </a></li>
      <li class="breadcrumb-item"><a href="#">{{ date('M j, Y H:i', time()) }} </a></li>
    </ul>
  </div>

<div class="tile">
  <form class="row" action="{{route('admin.category.update', $category->id )}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT');

    <div class="form-group col-md-5">
      <label class="control-label">Category Name</label>
      <input class="form-control" name="name" value="{{$category->name}}" type="text" placeholder="Category Name">
    </div>
    <div class="form-group col-md-3">
      <label class="control-label">Category Image</label>
      <input class="form-control" type="file" name="image" placeholder="Category Image">
    </div>
    <div class="form-group col-md-2 align-self-end">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-fw fa-lg fa-check-circle"></i>Add Category</button>
    </div>
  </form>
</div>
</main>


@endsection

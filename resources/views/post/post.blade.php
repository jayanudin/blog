@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-4">

                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        
                    </div>
                </div>

                <div class="card-body">
                    <h4 class="card-title">Article Post</h4>
                    <a href="{{ url('post/create') }}" class="btn btn-info m-t-40">Add Article</a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Slug</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $key => $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td><img src="{{ $data->image }}" width="100"></td>
                                        <td>{{ substr($data->content, 0, 100) }} ...</td>
                                        <td>{{ $data->slug }}</td>
                                        <td>{{ $data->category->title }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('post.destroy', ['id' => $data->id]) }}" class="btn btn-danger delete">Delete</a>
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
@endsection
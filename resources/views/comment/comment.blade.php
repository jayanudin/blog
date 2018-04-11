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

                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        
                    </div>
                </div>

                <div class="card-body">
                    <h4 class="card-title">Comment List</h4>
                    {{-- <a href="{{ url('comment/create') }}" class="btn btn-info m-t-40">Add Comment</a> --}}
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Article Title</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Content Comment</th>
                                    <th>Status Approved</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comment as $key => $data)
                                    <tr>
                                        <td>{{$data->post->title}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{$data->content}}</td>
                                        <td>
                                            @if ($data->approved > 0)
                                                <p>Approved</p>
                                            @else
                                                <p>Not Approved</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('comment.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('comment.destroy', ['id' => $data->id]) }}" class="btn btn-danger delete">Delete</a>
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
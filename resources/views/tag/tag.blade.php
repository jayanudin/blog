@extends('layouts.app')


@section('content')

    <div class="row page-titles" style="background: transparent; box-shadow: none;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Tag</h3> 
        </div>
        <div class="col-md-7 align-self-center">
           {{ Breadcrumbs::render('tag', $tag) }}
        </div>
    </div>

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
                    <h4 class="card-title">Tag Post</h4>
                    <a href="{{ url('tag/create') }}" class="btn btn-info m-t-40">Add Tag</a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tag Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tag as $key => $data)
                                    <tr>
                                        <td>{{$data->name}}</td>
                                        <td>
                                            {{-- <a href="{{ route('tag.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('tag.destroy', ['id' => $data->id]) }}" class="btn btn-danger delete">Delete</a> --}}
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
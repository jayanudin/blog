@extends('layouts.app')


@section('content')

    <div class="row page-titles" style="background: transparent; box-shadow: none;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Category</h3> 
        </div>
        <div class="col-md-7 align-self-center">
           {{ Breadcrumbs::render('category', $category) }}
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
                    <h4 class="card-title">Article Post</h4>
                    <a href="{{ url('category/create') }}" class="btn btn-info m-t-40">Add Cetegory</a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $key => $data)
                                    <tr>
                                        <td>{{$data->title}}</td>
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $data->id]) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ route('category.destroy', ['id' => $data->id]) }}" class="btn btn-danger delete">Delete</a>
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
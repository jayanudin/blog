@extends('layouts.app')


@section('content')

     <div class="row page-titles" style="background: transparent; box-shadow: none;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Create Category</h3> 
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Cetegory Form</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('category.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label>Category</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
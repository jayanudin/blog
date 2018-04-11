@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Tag Form</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('tag.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Tag</label>
                                <input type="text" name="name" class="form-control" placeholder="Title">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
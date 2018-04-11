@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Cetegory Form</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" class="form-control" value="{{ $category->title }}" name="title" placeholder="Title">
                            </div>
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
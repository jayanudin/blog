@extends('layouts.app')


@section('content')

    

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Article Form</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <textarea class="textarea_editor form-control" name="content" rows="15" placeholder="Enter text ..." style="height:300px"></textarea>
                                <small class="text-danger">{{ $errors->first('content') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug">
                                <small class="text-danger">{{ $errors->first('slug') }}</small>
                            </div>
                            <div class="form-group">
                                <label class="form-group">Tag</label>
                                <select id="tags" name="tags[]" multiple placeholder="Pick a tool..."></select>
                            </div>  
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">-- choose category --</option>
                                    @foreach ($categories as $list)
                                        <option value="{{ $list['id'] }}"> {{ $list['title'] }}</option>
                                    @endforeach
                                </select>
                                <small class="text-danger">{{ $errors->first('category_id') }}</small>
                            </div>
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
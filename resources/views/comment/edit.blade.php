@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Comment Form</h4>

                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('comment.update', ['id' => $comment->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>name</label>
                                <input type="text" class="form-control" value="{{ $comment->name }}" name="name" placeholder="Title">
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $comment->email }}" name="email" placeholder="Email">
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label>Content</label>
                                 <textarea class="textarea_editor form-control" name="content" rows="15" placeholder="Enter text ..." style="height:300px">{{$comment->content}}</textarea>
                                 <small class="text-danger">{{ $errors->first('content') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('approved') ? ' has-error' : '' }}">
                                <label>Approved Comment</label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label><input type="radio" class="form-control radio" name="approved" value="1" {{ ($comment->approved == "1")? "checked" : "" }}>Approved</label>
                                    </div>
                                    <div class="col-lg-3">
                                        <label><input type="radio" class="form-control radio" name="approved" value="0" {{ ($comment->approved == "0")? "checked" : "" }}>Not Approved</label>
                                    </div>
                                </div>
                                <small class="text-danger">{{ $errors->first('approved') }}</small>
                            </div>
                            <button type="submit" class="btn btn-info m-b-10 m-l-5">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
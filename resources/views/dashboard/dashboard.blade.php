@extends('layouts.app')


@section('content')
    <div class="row page-titles" style="background: transparent; box-shadow: none;">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> 
        </div>
        <div class="col-md-7 align-self-center">
           {{ Breadcrumbs::render('dashboard') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$article}}</h2>
                        <p class="m-b-0">Total Article</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$category}}</h2>
                        <p class="m-b-0">Total Category</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$tag}}</h2>
                        <p class="m-b-0">Total Tag</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-30">
                <div class="media">
                    <div class="media-left meida media-middle">
                        <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                    </div>
                    <div class="media-body media-text-right">
                        <h2>{{$comment}}</h2>
                        <p class="m-b-0">Total Comment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
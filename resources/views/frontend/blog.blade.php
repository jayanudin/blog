@extends('frontend.layouts.app')

<!-- Page Header -->
<header class="masthead" style="background-image: url('{{ asset('frontend/img/home-bg.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                @if($post)
    
                    @foreach($post as $key => $data)
                        <div class="post-preview">
                            <a href="{{ url('detail/' . $data->slug) }}">
                                <h2 class="post-title">{{ $data->title }}</h2>
                                <h3 class="post-subtitle">
                                  {{ $data->category->title }}
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                            <a href="#">{{ $data->user->name }}</a> on {{ $data->created_at }}</p>
                        </div>

                        <hr>
                    @endforeach

                @else
                    <h3>No Post</h3>
                @endif

                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
                </div>

              </div>
        </div>
    </div>

    

@endsection

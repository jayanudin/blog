@extends('frontend.layouts.app')

@if ($post)
    <header class="masthead" style="background-image: url('{{ url($post->image) }}')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-12 mx-auto">
                  <div class="site-heading">
                      <h1>{{ $post->title }}</h1>
                      <span class="subheading">{{ $post->category->title }}</span>

                  </div>
              </div>
          </div>
      </div>
    </header>
@endif


@section('content')
    <!-- Page Header -->
    
    @if ($post)
        <article>
            <div class="container">
                <div class="row">
                  <div class="col-lg-8 mx-auto" style="margin-bottom: 50px;">
                    {!!html_entity_decode($post->content)!!}
                  </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-lg-8 mx-auto">

                        @foreach ($post->tags as $tag)
                            <span class="btn btn-info">{{ $tag->name }}</span>
                        @endforeach
                    
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 mx-auto">
                    <div class="list-comments">
                            <ul>
                                @foreach($post->comments as $comment)
                                    @if ($comment->approved > 0 )
                                        <li>
                                            <span><small>Posted By : {{ $comment->email }}</small></span>
                                            <p style="margin: 0;"><small>Posted On : {{ date('d-M-Y', strtotime($comment->created_at ))}}</small></p>
                                            <p>{{ $comment->content }}</p>
                                        </li>
                                    @else
                                        
                                    @endif
                                    
                                @endforeach
                                
                            </ul>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        <form action="{{ route('comment.postComment') }}" method="POST" style="margin-top: 30px;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" rows="7" name="content" required placeholder="Comments"></textarea>
                            </div>

                            <input type="hidden" name="post_id" value="{{ $post->id }}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                          
                        </form>
                  </div>
                </div>
            </div>
        </article>
    @endif

@endsection
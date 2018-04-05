@extends('frontend.layouts.app')


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

@section('content')
    <!-- Page Header -->
  

    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            
            {!!html_entity_decode($post->content)!!}
            
          </div>
        </div>
      </div>
    </article>

@endsection
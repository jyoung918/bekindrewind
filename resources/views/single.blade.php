@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <article @php(post_class())>
      <header class="mb-4">
        <h1 class="entry-title">{!! get_the_title() !!}</h1>
        @include('components.read-time', ['content' => get_the_content()])
      </header>

      <div class="entry-content">
        {!! get_the_content() !!}
      </div>
    </article>
  @endwhile
@endsection

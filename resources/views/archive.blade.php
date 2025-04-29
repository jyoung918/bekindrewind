@extends('layouts.app')

@section('content')
  <header class="page-header">
    <h1 class="page-title">
      {!! get_the_archive_title() !!}
    </h1>

    @if(get_the_archive_description())
      <div class="archive-description">
        {!! get_the_archive_description() !!}
      </div>
    @endif
  </header>

  @if(have_posts())
    <div class="archive-posts">
      @while(have_posts()) @php(the_post())
        <article @php(post_class())>
          <header class="entry-header">
            <h2 class="entry-title">
              <a href="{{ get_permalink() }}">
                {!! get_the_title() !!}
              </a>
            </h2>
          </header>

          <div class="entry-excerpt">
            {!! get_the_excerpt() !!}
          </div>
        </article>
      @endwhile
    </div>

    <div class="archive-pagination">
      {!! get_the_posts_navigation() !!}
    </div>
  @else
    <div class="no-posts-found">
      <p>No posts found.</p>
    </div>
  @endif
@endsection

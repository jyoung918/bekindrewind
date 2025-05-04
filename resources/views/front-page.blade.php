@extends('layouts.app')

@section('content')

<section class="home-feed">
  
  @php
    $sticky_posts = get_option('sticky_posts');
  @endphp

  @if (!empty($sticky_posts))
    @php
      $pinned_query = new WP_Query([
        'post_type'           => 'post',
        'post__in'            => $sticky_posts,
        'ignore_sticky_posts' => true,
        'posts_per_page'      => 1,
        'orderby'             => 'date',
        'order'               => 'DESC',
      ]);
    @endphp

    @if ($pinned_query->have_posts())
      @while ($pinned_query->have_posts())
        @php $pinned_query->the_post(); @endphp

        @include('components.post-pinned', ['post' => get_post()])
      @endwhile
      @php wp_reset_postdata(); @endphp
    @endif
  @endif

</section>

@endsection
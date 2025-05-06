@extends('layouts.app')

@section('content')

<section class="home-feed">

  @php
    $sticky_posts = get_option('sticky_posts');
  @endphp

  @if (!empty($sticky_posts))
    @php
      $pinned = new WP_Query([
        'post_type'           => 'post',
        'post__in'            => $sticky_posts,
        'ignore_sticky_posts' => true,
        'posts_per_page'      => 1,
        'orderby'             => 'date',
        'order'               => 'DESC',
      ]);
    @endphp

    @if ($pinned->have_posts())
    <section class="home-feed__pinned">
        @while ($pinned->have_posts())
          @php $pinned->the_post(); @endphp
          @include('components.post-pinned', ['post' => get_post()])
        @endwhile
        @php wp_reset_postdata(); @endphp
    </section>
    @endif
  @endif

  



  @php
  $trending_query = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'meta_key'       => 'mtp_view_count',
    'orderby'        => 'meta_value_num',
    'order'          => 'DESC',
    'no_found_rows'  => true, // optimization
  ]);
@endphp

@if ($trending_query->have_posts())
  <section class="home-feed__trending">
    <h2 class="section-title">Top Trending Posts</h2>
    <div class="trending-posts">
      @while ($trending_query->have_posts())
        @php $trending_query->the_post(); @endphp
        @include('components.post-trending', ['post' => get_post()])
      @endwhile
    </div>
    @php wp_reset_postdata(); @endphp
  </section>
@else
  <section class="home-feed__trending">
    <h2 class="section-title">Top Trending Posts</h2>
    <p>No trending posts found.</p>
  </section>
@endif







@php
  $latest_posts = new WP_Query([
    'post_type'      => 'post',
    'posts_per_page' => -1, // Return all posts
    'orderby'        => 'date',
    'order'          => 'DESC',
    'no_found_rows'  => true, // Performance boost if pagination is not needed
  ]);
@endphp

@if ($latest_posts->have_posts())
  <section class="home-feed__latest">
    <h2 class="section-title">Latest Posts</h2>
    <div class="latest-posts">
      @while ($latest_posts->have_posts())
        @php $latest_posts->the_post(); @endphp
        @include('components.post-latest', ['post' => get_post()])
      @endwhile
    </div>
    @php wp_reset_postdata(); @endphp
  </section>
@else
  <section class="home-feed__latest">
    <h2 class="section-title">Latest Posts</h2>
    <p>No posts found.</p>
  </section>
@endif









</section>


@endsection

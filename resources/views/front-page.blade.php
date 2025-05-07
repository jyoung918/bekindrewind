@extends('layouts.app')

@section('content')

<!-- <p class="font-xs">Hello World</p>
<p class="font-sm">Hello World</p>
<p class="font-base">Hello World</p>
<p class="font-md">Hello World</p>
<p class="font-lg">Hello World</p>
<p class="font-xl">Hello World</p>
<p class="font-2xl">Hello World</p>
<p class="font-3xl">Hello World</p>
<p class="font-4xl">Hello World</p>
<p class="font-5xl">Hello World</p>
<p class="font-6xl">Hello World</p> -->

<section class="container">

  <section class="home-feed">

    {{-- Pinned Post --}}
    @php
      $sticky_posts = get_option('sticky_posts');
      $pinned_query = !empty($sticky_posts)
        ? new WP_Query([
            'post_type'           => 'post',
            'post__in'            => $sticky_posts,
            'ignore_sticky_posts' => true,
            'posts_per_page'      => 1,
            'orderby'             => 'date',
            'order'               => 'DESC',
          ])
        : null;
    @endphp

    @if ($pinned_query && $pinned_query->have_posts())
      <section class="home-feed__pinned">
        @while ($pinned_query->have_posts()) @php $pinned_query->the_post(); @endphp
          @include('components.post-pinned', ['post' => get_post()])
        @endwhile
        @php wp_reset_postdata(); @endphp
      </section>
    @endif


    {{-- Trending Posts --}}
    @php
      $trending_query = new WP_Query([
        'post_type'           => 'post',
        'posts_per_page'      => 4,
        'meta_key'            => 'mtp_view_count',
        'orderby'             => 'meta_value_num',
        'order'               => 'DESC',
        'meta_query'          => [[
          'key'     => 'mtp_view_count',
          'value'   => 0,
          'compare' => '>',
          'type'    => 'NUMERIC',
        ]],
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
      ]);
    @endphp

    <section class="home-feed__trending">
      @include('components.section-header', ['heading' => 'Trending', 'class' => 'pink'])
      @if ($trending_query->have_posts())
        <div class="trending-posts">
          @while ($trending_query->have_posts()) @php $trending_query->the_post(); @endphp
            @include('components.post-card-md', ['post' => get_post()])
          @endwhile
        </div>
        @php wp_reset_postdata(); @endphp
      @else
        <p>No trending posts found.</p>
      @endif
    </section>


    {{-- Latest Posts --}}
    @php
      $latest_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 8,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'ignore_sticky_posts' => true, 
        'no_found_rows'  => true,
      ]);
    @endphp

    <section class="home-feed__latest">
      @include('components.section-header', ['heading' => 'Latest', 'class' => 'pink'])
      @if ($latest_query->have_posts())
        <div class="latest-posts">
          @while ($latest_query->have_posts()) @php $latest_query->the_post(); @endphp
            @include('components.post-card-sm', ['post' => get_post()])
          @endwhile
        </div>
        @php wp_reset_postdata(); @endphp
      @else
        <p>No posts found.</p>
      @endif
    </section>

  </section>

</section>

@endsection

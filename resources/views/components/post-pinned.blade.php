@props(['post'])

<article class="post post--pinned">
  {{-- Featured Media: Video or Image --}}
  @php
    $video_url = get_field('featured_video', $post->ID);
  @endphp

  @if ($video_url)
    @include('components.featured-video', ['url' => $video_url])
  @elseif (has_post_thumbnail($post->ID))
    <a href="{{ get_permalink($post->ID) }}" class="post--pinned__image-link">
      {!! get_the_post_thumbnail($post->ID, 'full', ['class' => 'post--pinned__image']) !!}
    </a>
  @endif

  <div class="post--pinned__content">
    {{-- Categories --}}
    @php $categories = get_the_category($post->ID); @endphp
    @if ($categories)
      <div class="post--pinned__categories">
        @foreach ($categories as $category)
          @include('components.category')
        @endforeach
      </div>
    @endif

    <div class="post--pinned__title-excerpt">

      {{-- Title --}}
      <h2 class="post--pinned__title">
        <a href="{{ get_permalink($post->ID) }}">
          {{ get_the_title($post->ID) }}
        </a>
      </h2>

      {{-- Excerpt --}}
      <p class="post--pinned__excerpt">
        {{ get_the_excerpt($post->ID) }}
      </p>

    </div>

    {{-- Author --}}
    <span class="post--pinned__author">
      By {{ get_the_author_meta('display_name', $post->post_author) }}
    </span>
  </div>
</article>

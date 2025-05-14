@props(['post', 'size' => 'sm'])

@php
  $baseClass = "post-card__{$size}";
@endphp

<article class="post-card {{ $baseClass }}">
  @if (has_post_thumbnail($post->ID))
    <a href="{{ get_permalink($post->ID) }}" class="{{ $baseClass }}__image-link">
      {!! get_the_post_thumbnail($post->ID, 'full', ['class' => "{$baseClass}__image"]) !!}
    </a>
  @endif

  <div class="{{ $baseClass }}__meta">
    <a href="{{ get_permalink($post->ID) }}">
      <h2>{!! get_the_title($post->ID) !!}</h2>
    </a>

    <div class="{{ $baseClass }}__meta__footer">
      <span>
        <a href="{{ get_author_posts_url($post->post_author) }}">
          By {{ get_the_author_meta('display_name', $post->post_author) }}
        </a>
      </span>
      @include('components.post-date', ['date' => $post->post_date])
    </div>
  </div>
</article>

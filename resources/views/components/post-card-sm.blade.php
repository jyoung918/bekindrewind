@props(['post'])

<article class="post-card-sm">
  @if (has_post_thumbnail($post->ID))
    <a href="{{ get_permalink($post->ID) }}" class="post-card-sm__image-link">
      {!! get_the_post_thumbnail($post->ID, 'full', ['class' => 'post-card-sm__image']) !!}
    </a>
  @endif

  <div class="post-card-sm__meta">
    <a href="{{ get_permalink($post->ID) }}">
      <h2>{!! get_the_title($post->ID) !!}</h2>
    </a>

    <div class="post-card-sm__meta__footer">
      <span>By {{ get_the_author_meta('display_name', $post->post_author) }}</span>
      @include('components.post-date', ['date' => $post->post_date])
    </div>
  </div>

</article>
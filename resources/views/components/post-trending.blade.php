@props(['post'])

<article class="post post--trending">
  <a href="{{ get_permalink($post->ID) }}">
    <h3>{!! get_the_title($post->ID) !!}</h3>
  </a>
</article>
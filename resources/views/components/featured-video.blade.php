@props(['url'])

@php
  $id = get_youtube_id($url);
@endphp

@if ($id)
  <div class="featured-video">
    <iframe
      src="https://www.youtube.com/embed/{{ $id }}?autoplay=1&mute=1&loop=1&playlist={{ $id }}&controls=0&modestbranding=1&rel=0"
      title="YouTube video"
      frameborder="0"
      allow="autoplay; encrypted-media"
      allowfullscreen
      loading="lazy">
    </iframe>
  </div>
@endif

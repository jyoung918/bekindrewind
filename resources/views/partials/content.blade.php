<article @php(post_class())>
  <header>
    <h2 class="entry-title">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>

    
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>

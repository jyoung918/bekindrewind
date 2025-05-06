@props(['content', 'wpm' => 200])

@php
  $wordCount = str_word_count(strip_tags($content));
  $minutes = max(1, ceil($wordCount / $wpm));
@endphp

<span class="read-time">{{ $minutes }} {{ Str::plural('minute', $minutes) }} read</span>

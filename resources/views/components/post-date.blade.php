@props(['date'])

@php
  use Illuminate\Support\Str;

  $postDate = new DateTimeImmutable($date);
  $now = new DateTimeImmutable(current_time('mysql'));

  $interval = $now->diff($postDate);
  $diffInMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
@endphp

<time datetime="{{ $postDate->format(DateTime::ATOM) }}">
  @if ($diffInMinutes < 1)
    Just now
  @elseif ($diffInMinutes < 60)
    {{ $diffInMinutes }} {{ Str::plural('minute', $diffInMinutes) }} ago
  @elseif ($diffInMinutes < 1440)
    {{ floor($diffInMinutes / 60) }} {{ Str::plural('hour', floor($diffInMinutes / 60)) }} ago
  @elseif ($diffInMinutes < 10080)
    {{ floor($diffInMinutes / 1440) }} {{ Str::plural('day', floor($diffInMinutes / 1440)) }} ago
  @else
    {{ $postDate->format('M j, Y') }}
  @endif
</time>

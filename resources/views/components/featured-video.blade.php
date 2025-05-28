@props(['url'])

@php
  $id = get_youtube_id($url);
@endphp

@if ($id)
  <div class="video-container" id="video-container">
    <div class="video-overlay"></div>
    <div id="ytplayer"></div>
  </div>
@endif

<script src="https://www.youtube.com/iframe_api"></script>
<script>
  let player;

  function onYouTubeIframeAPIReady() {
    const container = document.getElementById("video-container");
    const overlay = container.querySelector(".video-overlay");

    player = new YT.Player('ytplayer', {
      videoId: '{{ $id }}',
      playerVars: {
        autoplay: 1,
        mute: 1,
        loop: 1,
        playlist: '{{ $id }}',
        controls: 1,
        rel: 0,
      },
      events: {
        onReady: (event) => {
          overlay.classList.remove('overlay-hidden');
          setTimeout(() => {
            overlay.classList.add('overlay-hidden');
          }, 3000);
        },
        onStateChange: (event) => {
          if (event.data === YT.PlayerState.PLAYING) {
            // Check loop reentry
            const checkTiming = () => {
              const duration = player.getDuration();
              const currentTime = player.getCurrentTime();

              // Fade in 3 seconds before end
              if (duration - currentTime <= 3) {
                overlay.classList.remove('overlay-hidden');
              }

              // After loop restart (first 3 seconds)
              if (currentTime < 3) {
                overlay.classList.remove('overlay-hidden');
                setTimeout(() => {
                  overlay.classList.add('overlay-hidden');
                }, 3000);
              }

              requestAnimationFrame(checkTiming);
            };

            requestAnimationFrame(checkTiming);
          }
        }
      }
    });
  }
</script>
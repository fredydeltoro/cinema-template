jQuery(document).ready(function($){
  var player
  var id = $("#id-video").text()
  $(".button-close").click(function () {
    $("iframe").replaceWith("<div id='player'></div>")
    $(".reproductor").fadeOut("slow")
    

  });

  $(".fa-play").click(function () {
    $(".reproductor").fadeIn("slow").css("display","flex").css('align-items', 'center')
    player = new YT.Player('player', {
          videoId: id,
          events: {
            'onReady': onPlayerReady
          }
        })
  })
})


function onPlayerReady(event) {
  event.target.playVideo()
}
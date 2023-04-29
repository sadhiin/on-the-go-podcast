<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css">
<script src="https://cdn.plyr.io/3.6.2/plyr.js"></script>


<?php
function myPlayer($file_path)
{
    echo '<audio id="player" controls>';
    echo "<source src='" . $file_path . "type='audio/mp3'>";
    echo "</audio>";
    //<!-- Add Play and Pause buttons -->
    echo "<button id='playButton'>Play</button>";
    echo "<button id='pauseButton'>Pause</button>";
}

?>
<script>
    const player = new Plyr('#player');

    // Get the play and pause buttons
    const playButton = document.getElementById("playButton");
    const pauseButton = document.getElementById("pauseButton");

    // Add event listeners to the buttons
    playButton.addEventListener("click", function() {
        player.play();
    });

    pauseButton.addEventListener("click", function() {
        player.pause();
    });
</script>
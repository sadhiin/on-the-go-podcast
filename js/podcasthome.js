const player1 = new Plyr("#player1");
const player2 = new Plyr("#player2");
const player3 = new Plyr("#player3");
const player4 = new Plyr("#player4");
const player5 = new Plyr("#player5");
const player6 = new Plyr("#player6");

// Get the play and pause buttons
const playButton1 = document.getElementById("playButton1");
const pauseButton1 = document.getElementById("pauseButton1");

const playButton2 = document.getElementById("playButton2");
const pauseButton2 = document.getElementById("pauseButton2");

const playButton3 = document.getElementById("playButton3");
const pauseButton3 = document.getElementById("pauseButton3");

const playButton4 = document.getElementById("playButton4");
const pauseButton4 = document.getElementById("pauseButton4");

const playButton5 = document.getElementById("playButton5");
const pauseButton5 = document.getElementById("pauseButton5");

const playButton6 = document.getElementById("playButton6");
const pauseButton6 = document.getElementById("pauseButton6");

// Add event listeners to the buttons
playButton1.addEventListener("click", function () {
    player1.play();
});
pauseButton1.addEventListener("click", function () {
    player1.pause();
});

playButton2.addEventListener("click", function () {
    player2.play();
});
pauseButton2.addEventListener("click", function () {
    player2.pause();
});

playButton3.addEventListener("click", function () {
    player3.play();
});
pauseButton3.addEventListener("click", function () {
    player3.pause();
});

playButton4.addEventListener("click", function () {
    player4.play();
});
pauseButton4.addEventListener("click", function () {
    player4.pause();
});

playButton5.addEventListener("click", function () {
    player5.play();
});
pauseButton5.addEventListener("click", function () {
    player5.pause();
});

playButton6.addEventListener("click", function () {
    player6.play();
});
pauseButton6.addEventListener("click", function () {
    player6.pause();
});

function trackHistory(elem, serv, audio_id) {
    let audioPlayer = document.getElementById(elem);
    console.log("Current time: ", audioPlayer.currentTime);

    if (audioPlayer.currentTime === 0) {
        console.log("Type: ", typeof audioPlayer.currentTime);
        ajaxCallStoreHistory(audio_id);
    } else {
        // audioPlayer.removeEventListener("play", audio_id);
        console.log("previously played so not storing in the history");
    }
}

function ajaxCallStoreHistory(audio_id) {
    const xhr = new XMLHttpRequest();

    xhr.open(
        "GET",
        "./includes/update_user_history.php?audio_id=" + audio_id,
        true
    );
    console.log("request send to server");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    console.log("Request heder");
    xhr.send();
    console.log("SENDED...");
}

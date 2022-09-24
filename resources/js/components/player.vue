<template>
    <!-- <iframe src="https://player.vimeo.com/video/76979871?h=8272103f6e" width="640" height="360" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe> -->
    <div>
        <div
            :data-vimeo-id="19231868"
            data-vimeo-width="640"
            id="handstick"
        ></div>
        <div
            data-vimeo-url="https://player.vimeo.com/video/76979871?h=8272103f6e"
            id="playertwo"
        ></div>
    </div>
    <!-- <script src="https://player.vimeo.com/api/player.js"></script> -->
</template>
<script>
import Swal from "sweetalert2/dist/sweetalert2.js";
import Player from "@vimeo/player";
import axios from "axios";
export default {
    props: ["defualt_lesson", "next_url"],
    data() {
        return {
            next_url_pro: this.next_url,
            lesson: JSON.parse(this.defualt_lesson),
            videoID: "750034368",
            height: 500,
            options: {
                muted: true,
                autoplay: true,
            },
            playerReady: false,
        };
    },
    mounted() {
        this.MouteThePlayers();
    },
    methods: {
        onReady() {
            this.playerReady = true;
            console.log("test 1");
        },
        play() {
            this.$refs.player.play();
        },
        pause() {
            this.$refs.player.pause();
        },
        handelEnd() {
             console.log('The Vedio Is End');
             Swal.fire("Good job!", "You Are Lesson", "success");
                axios.get("/complete-lesson/" + this.lesson.id)
                .then((res) => console.log(res))
                .catch((err) => console.log(err));
                setTimeout(() => {
                   if(this.next_url_pro) document.location = this.next_url_pro;
                }, 2000);
             },
        MouteThePlayers() {
            // const options = {
            //     id: 59777392,
            //     width: 640,
            //     loop: true
            // };

            const player = new Player("handstick", {
                // id: 19231868,
                width: 800,
            });

            player.on("play", function () {
                console.log("played the video!");
            });

            player.on("ended", this.handelEnd);

            player.on("end", function () {
                alert("played the video!");
            });
        },
    },
};
</script>

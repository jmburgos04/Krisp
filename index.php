<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
 height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon"
        href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXodc_7lD1W5yY1gi4yRUt5kcT-prPaIpwFQ&usqp=CAU">
    <title>Iruna Online</title>

    <style>
        html {
            border: 0;
            margin: 0;
        }

        body {
            width: 100%;
            background-image: url(https://pbs.twimg.com/media/Fh1ZuD8agAAWIC-?format=jpg&name=large);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            border: 0;
            margin: 0;
        }

        .element {
                border-right: none;
            }


        .header-container {
            display: flex;
        }

        .header-img {
            display: flex;
            width: auto;
            height: auto;
            padding: 1%;
            margin: auto;
        }

        .header-text {
            margin: auto;
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            font-size: 550%;
            text-align: center;
            color: white;
            text-shadow: 2px 8px black;
        }

        .video-container {
            display: flex;
            padding: 2%;
            width: 560px;
            margin: auto;
            height: 315px;
            transition: transform .5s;
        }

        .video-container:hover {
            transform: scale(1.1);
        }

        .irunaStoryandJourney {
            width: 100%;
            margin-top: 3%;
            margin-bottom: 3%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .storyContentAlign {
            width: 48%;
            height: inherit;
            display: flex;
            flex-direction: column;
        }

        .journeyAlign {
            width: 48%;
            height: inherit;
            display: flex;
            flex-direction: column;
        }

        .storyText {
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            width: 80%;
            height: auto;
            margin-top: 1%;
            margin: auto;
            border-style: solid;
            border-color: white;
            justify-content: center;
            color: white;
            background-color: rgba(0, 0, 0, .5);
            font-size: 300%
        }

        .storyContent {
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            width: 80%;
            height: 100%;
            margin: auto;
            border-style: solid;
            border-color: white;
            justify-content: center;
            color: white;
            background-color: rgba(0, 0, 0, .5);
            font-size: 200%;
            text-align: center;
        }

        .journeyText {
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            width: 80%;
            height: auto;
            margin-top: 1%;
            margin: auto;
            border-style: solid;
            border-color: white;
            justify-content: center;
            color: white;
            background-color: rgba(0, 0, 0, .5);
            font-size: 300%
        }

        .journeyContent {
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            width: 80%;
            height: 100%;
            margin: auto;
            border-style: solid;
            border-color: white;
            justify-content: center;
            align-items: center;
            color: white;
            background-color: rgba(0, 0, 0, .5);
            font-size: 200%;
            text-align: center;
        }

        .irunaClasses {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .irunaMainText {
            display: flex;
            padding: 1%;
            font-family: 'Passion One', cursive;
            width: 90%;
            height: auto;
            margin-top: 1%;
            margin: auto;
            border-style: solid;
            border-color: white;
            justify-content: center;
            color: white;
            background-color: rgba(0, 0, 0, .5);
            font-size: 300%
        }

        .irunaClassesBox {
            padding: 2%;
            display: flex;
            margin: auto;
            height: auto;
            width: 88%;
            background-color: rgba(0, 0, 0, .5);
            border-style: solid;
            border-color: white;
            color: white;
            flex-direction: row;
            font-family: 'Passion One', cursive;
            font-size: 300%;
            text-align: center;
            align-items: center;
        }

        .irunaClassText {
            margin-left: 5%;
        }

        .irunaSlideshow {
            display: flex;
            flex-direction: column;
            margin: auto;
            width: auto;
            height: auto;
            font-family: 'Passion One', cursive;
            color: white;
            font-size: 200%;
            text-align: center;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        .footer-container {
            display: flex;
            width: auto;
            height: 5%;
        }

        .footer-img {
            display: flex;
            width: auto;
            height: auto;
            margin: auto;
        }

        .footer-text {
            margin: auto;
            display: flex;
            flex-direction: column;
            padding: 1%;
            font-family: 'Passion One', cursive;
            font-size: 550%;
            text-align: center;
            color: white;
            text-shadow: 2px 8px black;
        }

        .irunFooterLogo {
            display: flex;
        }

        .irunaDownloadText {
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        .irunaShop {
            width: auto;
            height: auto;
            flex-direction: column;
        }

        #irunaAppleStore,
        #irunaGoogleStore {
            height: 10%;
            width: 20%;
            transition: transform .5s;
        }

        #irunaGoogleStore:hover {
            transform: scale(1.1);
        }

        #irunaAppleStore:hover {
            transform: scale(1.1);
        }

        .parallax {
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: initial;
            background-clip: content-box;
            /*<img src="https://static.apkdone.me/wp-content/uploads/2020/06/RPG-IRUNA-Online-poster.jpg">*/
        }

        .irunaBlocks {
            height: auto;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: initial;
            background-clip: content-box;
        }

        .footer {
            display: flex;
            height: 50px;
            width: auto;
        }

        /*font-family: 'Passion One', cursive;*/


        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }


        @import url('https://fonts.googleapis.com/css2?family=Passion+One:wght@700&display=swap');

            @media (max-width: 720px) {
                .element {
                border-right: none;
            }

            html {
            border: 0;
            margin: 0;
            }

            #irunaLogo {
                width: 390px;
            }

            #irunaFooterLogo {
                width: 390px;
            }

            .header-img {
                width: 390px;

            }

            .footer-img {
                width: 390px;
            }

            .header-container {
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                margin: auto;
            }

            .header-text {
                margin: auto;
                display: flex;
                font-family: 'Passion One', cursive;
                font-size: 300%;
                text-align: center;
                color: white;
                text-shadow: 2px 8px black;
                margin-bottom: 5%;
            }

            .storyContentAlign {
                width: auto;
                margin-bottom: 3%;
            }

            .journeyAlign {
                width: auto;
            }

            .video-container {
                display: flex;
                padding: 2%;
                width: auto;
                margin: auto;
                height: 315px;
                margin-bottom: 5%;
            }

            .video-container:hover {
            transform: scale(1.0);
        }

            .irunaStoryandJourney {
                width: 100%;
                margin-top: 3%;
                margin-bottom: 3%;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
            }

            .irunaClasses {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .irunaClassImg {
                width: 60%;
            }

            .irunaClassesBox {
                display: flex;
                margin: auto;
                height: auto;
                width: 88%;
                background-color: rgba(0, 0, 0, .5);
                border-style: solid;
                border-color: white;
                color: white;
                flex-direction: row;
                font-family: 'Passion One', cursive;
                font-size: 150%;
                text-align: center;
                align-items: center;
                flex-direction: column;
            }

            .irunaClassText {
                margin-left: 0;
            }

            .footer-container {
                display: flex;
                width: auto;
                height: 5%;
                flex-direction: column;
            }

            .footer-text {
                margin: auto;
                display: flex;
                flex-direction: column;
                font-family: 'Passion One', cursive;
                font-size: 300%;
                text-align: center;
                color: white;
                text-shadow: 2px 8px black;
            }

            .irunaDownloadText {
                display: flex;
                flex-direction: column;
                margin: auto;
            }

            #irunaAppleStore,
            #irunaGoogleStore {
                height: 10%;
                width: 40%;
                transition: transform .5s;
            }

            .irunaVideo {
                width: 390px;
            }

        }

        @media (max-width: 390px) {
            .element {
                border-right: none;
            }

            body {
                border: 0;
                margin: 0;
            }

            #irunaLogo {
                width: 390px;
            }

            #irunaFooterLogo {
                width: 390px;
            }

            .header-img {
                width: 390px;
            }

            .footer-img {
                width: 390px;
            }

            .header-container {
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;
                margin: auto;
            }

            .header-text {
                margin: auto;
                display: flex;
                padding: 1%;
                font-family: 'Passion One', cursive;
                font-size: 300%;
                text-align: center;
                color: white;
                text-shadow: 2px 8px black;
                margin-bottom: 5%;
            }

            .storyContentAlign {
                width: auto;
                margin-bottom: 3%;
            }

            .journeyAlign {
                width: auto;
            }

            .video-container {
                display: flex;
                padding: 2%;
                width: auto;
                margin: auto;
                height: 315px;
                margin-bottom: 5%;
            }

            .video-container:hover {
            transform: scale(1.0);
        }

            .irunaStoryandJourney {
                width: 100%;
                margin-top: 3%;
                margin-bottom: 3%;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
            }

            .irunaClasses {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .irunaClassImg {
                width: 60%;
            }

            .irunaClassesBox {
                padding: 2%;
                display: flex;
                margin: auto;
                height: auto;
                width: 88%;
                background-color: rgba(0, 0, 0, .5);
                border-style: solid;
                border-color: white;
                color: white;
                flex-direction: row;
                font-family: 'Passion One', cursive;
                font-size: 150%;
                text-align: center;
                align-items: center;
                flex-direction: column;
            }

            .irunaClassText {
                margin-left: 0;
            }

            .footer-container {
                display: flex;
                width: auto;
                height: 5%;
                flex-direction: column;
            }

            .footer-text {
                margin: auto;
                display: flex;
                flex-direction: column;
                padding: 1%;
                font-family: 'Passion One', cursive;
                font-size: 300%;
                text-align: center;
                color: white;
                text-shadow: 2px 8px black;
            }

            .irunaDownloadText {
                display: flex;
                flex-direction: column;
                margin: auto;
            }

            #irunaAppleStore,
            #irunaGoogleStore {
                height: 10%;
                width: 40%;
                transition: transform .5s;
            }

            .irunaVideo {
                width: 390px;
            }

        }
    </style>
</head>

<body>

    <div class="header-container">
        <div class="header-img">
            <img src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/iruna_logo.png" id="irunaLogo" />
        </div>
        <div class="header-text">
            <strong>Full-scale MMORPG played by over 8 million players!</strong>
        </div>
    </div>
    <div class="video-container">
        <iframe width="120%" height="100%" src="https://www.youtube.com/embed/EMRrsiVW9ao?autoplay=1&loop=1"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen class="irunaVideo"></iframe>
    </div>
    <div class="irunaStoryandJourney">
        <div class="storyContentAlign">
            <div class="storyText">STORY</div>
            <div class="storyContent">Long ago, the fantasy world of Iruna was created by the 12 gods of Iruna. Since
                the long conflict of gods, the four groups Hume, Diel, Cule, and Elf are now fighting for their country.
                Your journey begins.</div>
        </div>
        <div class="journeyAlign">
            <div class="journeyText">JOURNEY</div>
            <div class="journeyContent">Venture into the world of Iruna by walking through the region of Parul,
                Mithurna, Darkan, Ganaji, and the Slebinian Empire</div>
        </div>
    </div>
    <div class="irunaBlocks"
        style="background-image: url(https://img.freepik.com/free-photo/old-paper-texture-background_1232-1932.jpg?w=1380&t=st=1671169986~exp=1671170586~hmac=6f0885eb1d0ad1786464f9290af8e30bd4c6b47c53ae02a4b70c1dda4c4fa88d);">
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="parallax"
        style="background-image: url(https://pm1.narvii.com/7144/336a5965ad04a94e712d554cd7efea7ff3dbf81ar1-1920-1100v2_hq.jpg);">
        <div class="irunaClasses">
            <div class="irunaMainText">DIVERSITY</div>
            <div class="irunaClassesBox">
                <img src="http://iruna-online.com/img/new_img/img_graph_02.jpg" class="irunaClassImg" />
                <p class="irunaClassText">Iruna Online lets you choose and define who you are! Start from being an
                    Adventurer and as you progress you can choose which job you can get that can define your fate!
                    Select from the 16 available jobs that will let you unlock your potential and give you more power to
                    save the world! </p>
            </div>
        </div>
    </div>

    <div class="irunaBlocks"
        style="background-image: url(https://img.freepik.com/free-photo/old-paper-texture-background_1232-1932.jpg?w=1380&t=st=1671169986~exp=1671170586~hmac=6f0885eb1d0ad1786464f9290af8e30bd4c6b47c53ae02a4b70c1dda4c4fa88d);">
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="parallax"
        style="background-image: url(https://pm1.narvii.com/6700/144fe6a6a0a7df5db42abc87687baab9ab052837_hq.jpg);">
        <div class="irunaSlideshow">
            <div class="irunaSlideshowText">In-Game Screenshots</div>
            <div class="slideshow-container">

                <div class="mySlides fade">
                    <div class="numbertext">1 / 7</div>
                    <img src="https://img.tapimg.net/market/images/9b1050f1acb99b766e948145f8ebd7a5.jpg?imageView2/2/h/1080/w/9999/q/80/format/jpg/interlace/1/ignore-error/1"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 7</div>
                    <img src="https://img.tapimg.net/market/images/1e7277b12d5598ba8862db1093e2a655.jpg?imageView2/2/h/1080/w/9999/q/80/format/jpg/interlace/1/ignore-error/1"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 7</div>
                    <img src="https://img.tapimg.net/market/images/6923c7937eabb476771e73dae96dd610.jpg?imageView2/2/h/1080/w/9999/q/80/format/jpg/interlace/1/ignore-error/1"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 7</div>
                    <img src="https://asobimo.com/corporate_us/wp-content/uploads/2017/07/20170711_EN-7.png"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">5 / 7</div>
                    <img src="https://asobimo.com/corporate_us/wp-content/uploads/2017/07/20170711_EN-2.png"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">6 / 7</div>
                    <img src="https://asobimo.com/corporate_us/wp-content/uploads/2017/07/20170711_EN-1.png"
                        style="width:100%">
                    <div class="text"></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">7 / 7</div>
                    <img src="https://pbs.twimg.com/media/FjWw4xzaYAEyRT4?format=jpg&name=large" style="width:100%">
                    <div class="text"></div>
                </div>

            </div>

            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>
    <div class="parallax"></div>
    <div class="irunaBlocks"
        style="background-image: url(https://img.freepik.com/free-photo/old-paper-texture-background_1232-1932.jpg?w=1380&t=st=1671169986~exp=1671170586~hmac=6f0885eb1d0ad1786464f9290af8e30bd4c6b47c53ae02a4b70c1dda4c4fa88d);">
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="footer-container">
        <div class="footer-text">
            <p class="irunaDownloadText">Only available on!</p>
            <div class="irunaShop">
                <a href="https://apps.apple.com/us/app/rpg-iruna-online-mmorpg/id669929173"><img src="https://logos-download.com/wp-content/uploads/2016/06/Download_on_the_App_Store_logo-700x207.png"
                    id="irunaAppleStore"></a>
                <a href="https://play.google.com/store/apps/details?id=com.asobimo.iruna_en&hl=en&gl=US"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/2560px-Google_Play_Store_badge_EN.svg.png"
                    id="irunaGoogleStore"></a>
            </div>
        </div>
        <div class="footer-img">
            <img src="https://asobimo.com/corporate_us/wp-content/uploads/2017/06/iruna_logo.png"
                id="irunaFooterLogo" />
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000);
        }
    </script>

</body>

</html>
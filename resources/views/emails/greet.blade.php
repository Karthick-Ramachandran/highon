<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOBS ON HIGH</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

        @font-face {
            font-family: 'bebas_neueregular';
            src: url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_regular-webfont.eot");
            src: url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_regular-webfont.woff2") format("woff2"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_regular-webfont.woff") format("woff"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_regular-webfont.ttf") format("truetype"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_regular-webfont.svg#bebas_neueregular") format("svg");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'bebas_neuebold';
            src: url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_bold-webfont.eot");
            src: url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_bold-webfont.woff2") format("woff2"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_bold-webfont.woff") format("woff"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_bold-webfont.ttf") format("truetype"), url("https://dl.dropboxusercontent.com/u/81135676/bebasneue_bold-webfont.svg#bebas_neuebold") format("svg");
            font-weight: normal;
            font-style: normal;
        }

        body,
        html {
            display: block;
            padding: 0;
            margin: 0;
            width: 100%;
            position: relative;
            height: 100%;
        }

        body {
            font-family: "bebas_neuebold", "Arial", sans-serif;
        }

        section {
            position: relative;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, #FBB600, #DA5900);
        }

        #beerCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
        }

        .coming_content {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            width: 70%;
            margin: 0 auto;
            color: white;
            text-align: center;
            z-index: 101;
        }

        .coming_content h1 {
            font-size: 5.625em;
            margin: 0;
            letter-spacing: 2px;
            text-align: center;
            color: white;
        }

        .coming_content .separator_container {
            width: 100%;
            display: block;
            text-align: center;
            position: relative;
            margin: 12px 0;
        }

        .coming_content .separator_container:before,
        .coming_content .separator_container:after {
            display: table;
            content: "";
        }

        .coming_content .separator_container:after {
            clear: both;
        }

        .coming_content .separator {
            color: white;
            margin: 0 auto 1em;
            width: 11em;
        }

        .coming_content .line_separator svg {
            width: 30px;
            height: 20px;
        }

        .coming_content .line_separator:before,
        .coming_content .line_separator:after {
            display: block;
            width: 40%;
            content: " ";
            margin-top: 14px;
            border: 1px solid white;
        }

        .coming_content .line_separator:before {
            float: left;
        }

        .coming_content .line_separator:after {
            float: right;
        }

        .coming_content h3 {
            font-family: "Montserrat", sans-serif;
            letter-spacing: 2px;
            line-height: 2;
            font-size: 1em;
            font-weight: 400;
            text-align: center;
            margin: 0;
        }

        .coming_content h3 a {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <section>
        <canvas id='beerCanvas'></canvas>
        <div class="coming_content">
            <h1>{{ $details['title']  }}</h1>
            <h3> {{ $details['body'] }}.</h3>
        </div>
    </section>


    <script>
        var canvas = document.getElementById('beerCanvas');
        var ctx = canvas.getContext('2d');
        var particles = [];
        var particleCount = 280;

        for (var i = 0; i < particleCount; i++) {
            particles.push(new particle());
        }

        function particle() {
            this.x = Math.random() * canvas.width;
            this.y = canvas.height + Math.random() * 300;
            this.speed = 1 + Math.random();
            this.radius = Math.random() * 3;
            this.opacity = (Math.random() * 100) / 1000;
        }

        function loop() {
            requestAnimationFrame(loop);
            draw();
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.globalCompositeOperation = 'lighter';
            for (var i = 0; i < particles.length; i++) {
                var p = particles[i];
                ctx.beginPath();
                ctx.fillStyle = 'rgba(255,255,255,' + p.opacity + ')';
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2, false);
                ctx.fill();
                p.y -= p.speed;
                if (p.y <= -10)
                    particles[i] = new particle();
            }
        }
        loop();
    </script>
</body>

</html>

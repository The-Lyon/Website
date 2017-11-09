<!DOCTYPE html>
<?php
$var = file_get_contents('nouns.txt'); 
$result = explode(',',$var); 
$noun = $result[array_rand($result)];
?>
<html>

<head>
    <title>Does Not Compute!</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <style>
        html,
        body {
            height:400vh;
            overflow: hidden;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: black;
            display: table;
            font-weight: 100;
            font-family: 'Raleway', sans-serif;
        }

        .container {
            text-align: center;
            display: block;
            vertical-align: middle;
        }

        .content {
            margin-top: 30vh;
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            font-weight: 200;
            margin-bottom: 40px;
        }

        p {
            font-size: 25px;
            font-weight: 200;
        }

        .btn {
            border: none;
            outline: none;
            padding: 10px;
            background-color: #276bf7;
            color: white;
            transition-duration: .3s;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, .2);
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #1352d3;
            transition-duration: .3s;
            box-shadow: 0px 0px 14px rgba(0, 0, 0, .3);
        }

        .ooomb {
            text-align: center;
            width: 100vw;
            position: absolute;
            top: 100vh;
        }
        
        .slide {
            width: 100%;
            max-width: 300px;
        }
        
        .row {
            margin-bottom: 20px;
            margin-top: 20px;
        }
        
        @media only screen and (max-device-width: 720px) {
            .slide {
                max-width: 90%;
            }
        }


    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title">Aw shucks! Error 404</div>
            <p>Something went wrong. Give it another shot in a bit.</p>
            <a href="/">
                <br/>
                <br/>
                <button class="btn">Back to The Lyon</button>
                </a>
        </div>
    </div>
    <div class="ooomb">
        <br/>
        <h2>Good Job. You found the secret section!</h2>
        <button style="width:100%">Scroll Anchor</button>
        <div class="container">
            <div style="text-align: center;" class="row">
                <div class="col-lg-10 col-lg-offset-1 col-sm-12">
                    <img src="img/Slides/slide-1.jpg" class="slide">
                    <p style="margin-top:20px; margin-bottom:20px;">"Would you like some
                        <?php echo($noun); ?> hurty juice?"</p>
                </div>
            </div>
            <button style="width:100%">Scroll Anchor</button>
            <div style="text-align: center;" class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <img src="img/Slides/slide-2.jpg" class="slide">
                    <p style="margin-top:20px; margin-bottom:20px;">"Ok."</p>
                </div>
            </div>
            <button style="width:100%">Scroll Anchor</button>
            <div style="text-align: center;" class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <img src="img/Slides/slide-3.jpg" class="slide">
                    <p style="margin-top:20px; margin-bottom:20px;">*gulp*</p>
                </div>
            </div>
            <button style="width:100%">Scroll Anchor</button>
            <div style="text-align: center;" class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <img src="img/Slides/slide-2.jpg" class="slide">
                    <p style="margin-top:20px; margin-bottom:20px;">"Oof ouch owie my
                        <?php echo($noun);?>."</p>
                </div>
            </div>
            <div style="text-align: center;" class="row">
                <button onClick="window.location.reload();">Another One.</button>
                <a href="/">
                    <p>Back to The Lyon</p>
                </a>
            </div>
        </div>
    </div>
</body>

</html>

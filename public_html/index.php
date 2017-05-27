<!DOCTYPE html>
<html lang="en">

<head>

    <!--=========================================== WEBPAGE METADATA ====================================-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JSON-to-Q</title>
    <!-- Favicons
    ================================================== -->
    <link rel="manifest" href="assets/img/favicon/manifest.json">


    <!--=========================================== CSS FILES ===========================================-->
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- Custom Fonts -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/less/main.css">

</head>

<body>

<!--=========================================== MAIN FILES ==========================================-->
<?php
$page = "index-page";
$hasGmap = true;
?>

<div class="row mainContainer">

    <div class="col-sm-10 qContainer">

        <div class="row title">
            <h1>json-to-Q</h1>
        </div>

        <div class="row">

            <!-- Description of the JSON dataset -->
            <div class="row">
                <div id="description"></div>
            </div>

            <!-- The controls for the q cards -->
            <div class="row questionButtons">
                <ul class="list-inline">
                    <li>
                        <button class="btn" id="qButton" onclick="qFxn()">question</button>
                    </li>
                    <li>
                        <button class="btn" id="aButton" onclick="aFxn()">answer</button>
                    </li>
                    <li>
                        <button class="btn" id="correct"><i class="fa fa-check"></i></button>
                    </li>
                    <li>
                        <button class="btn" id="wrong"><i class="fa fa-close"></i></button>
                    </li>
                    <li>
                        <button class="btn" id="undo">undo</button>
                    </li>
                    <li>
                        <button class="btn promptButton" disabled>
                            <div id="prompt">you can't proceed until you've answered.</div>
                        </button>

                    </li>
                </ul>
            </div>

            <!-- The question and answer boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="textBox" id="question"></div>
                </div>
                <div class="col-md-6">
                    <div class="textBox" id="answer"></div>
                </div>
            </div>

            <!-- The controls for the wrong questions -->
            <div class="row">
                <ul class="list-inline">
                    <li>
                        <button class="btn" id="show">show incorrect questions</button>
                    </li>
                </ul>
            </div>

            <!-- The wrong question and answer boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div class="textBox" id="wrongScroll" ></div>
                </div>
                <div class="col-md-6">
                    <div class="textBox" id="wrongScrollAnswer"></div>
                </div>
            </div>

            <!-- Metrics about performance -->
            <div class="row">
                <ul class="list-inline">
                    <li>
                        <div>Correct: <span id='c'>0</span></div>
                    </li>
                    <li>
                        <div>Incorrect: <span id='i'>0</span></div>
                    </li>
                    <li>
                        <div>Percent: <span id='p'>0</span></div>
                    </li>
                    <li>
                        <div>HOTSTREAK: <span id='hs'>0</span></div>
                    </li>
                    <li>
                        <div>Number of questions answered: <span id='nq'>0</span></div>
                    </li>
                    <li>
                        <div>Total number of questions: <span id='n'>0</span></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-2 sidePanel">

        <div class="row">
            Welcome,<br><br>
            This page enables you to quickly make Q-cards from information contained in a JSON file.<br><br>
            There is specific format require by the question and answer to be in:
        </div>

        <div class="row">
            <br>{<br>
            <span class="t1">"description": "The title of the Q card set",<br></span>
            <span class="t1">"questions": [ {<br></span>
            <span class="t2">"question": "The first question",<br></span>
            <span class="t2">"answer": "Answer",<br></span>
            <span class="t2">"note": "optional note"<br></span>
            <span class="t1">}, {<br></span>
            <span class="t2">"question": "The next question",<br></span>
            <span class="t2">"answer": "Answer",<br></span>
            <span class="t2">"note": "optional note"<br></span>
            <span class="t1">} ]<br></span>
            }<br><br>
        </div>

        <div class="row">
            You can upload your file below:<br>

            <div class="icons">
                <label for="fileToUpload">
                    <i class="fa fa-3x fa-arrow-circle-up"></i>
                </label>
                <input class="hidden" type="file" onchange="uploadFile()" name="fileToUpload" id="fileToUpload">

                <br><br>
                Or you can choose to learn about various programming languages and compilers by clicking below:<br>
                <i class="fa fa-3x fa-play-circle" id="defaultData"></i>
            </div>
        </div>

    </div>

</div>







<!--=========================================== JS SCRIPTS ==========================================-->
<!-- jQuery -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Plugin JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

<!-- Custom JavaScript -->
<script src="assets/js/main.js" type="text/javascript"></script>


</body>
</html>

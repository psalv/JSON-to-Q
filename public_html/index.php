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

<div class="row">

    <div class="col-sm-10">

        <div class="row title">
            <h1>json-to-Q</h1>
        </div>

        <div class="row">

            <!-- Description of the JSON dataset -->
            <div class="row">
                <div id="description"></div>
            </div>

            <!-- The controls for the q cards -->
            <div class="row">
                <ul class="list-inline">
                    <li>
                        <button id="qButton" onclick="qFxn()">question:</button>
                    </li>
                    <li>
                        <button id="aButton" onclick="aFxn()">answer:</button>
                    </li>
                    <li>
                        <button id="correct">CORRRECT</button>
                    </li>
                    <li>
                        <button id="wrong">INCORRECT</button>
                    </li>
                    <li>
                        <button id="undo">UNDO</button>
                    </li>
                </ul>
                <div id="prompt" style="color: red; display: none">You can't proceed until you've answered.<br></div>
            </div>

            <!-- The question and answer boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div id="question" style="width: 300px; height: 200px; border: solid black 1px"></div>
                </div>
                <div class="col-md-6">
                    <div id="answer" style="width: 300px; height: 200px; border: solid black 1px"></div>
                </div>
            </div>

            <!-- The controls for the wrong questions -->
            <div class="row">
                <ul class="list-inline">
                    <li>
                        <button id="show">Show incorrect questions.</button>
                    </li>
                </ul>
            </div>

            <!-- The wrong question and answer boxes -->
            <div class="row">
                <div class="col-md-6">
                    <div id="wrongScroll" style="overflow-y: scroll; width: 600px; height: 200px; border: solid black 1px"></div>
                </div>
                <div class="col-md-6">
                    <div id="wrongScrollAnswer" style="overflow-y: scroll; width: 600px; height: 200px; border: solid black 1px"></div>
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

    <div class="col-sm-2">
        <!-- this will be the side description bar -->
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

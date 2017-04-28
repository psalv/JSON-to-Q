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

</head>

<body>

<!--=========================================== MAIN FILES ==========================================-->
<?php
$page = "index-page";
$hasGmap = true;
?>

<div id="description"></div>

<button id="qButton" onclick="qFxn()">question:</button>
<div id="question" style="width: 600px; height: 200px; border: solid black 1px"></div>
<button id="aButton" onclick="aFxn()">answer:</button>
<div id="answer" style="width: 600px; height: 200px; border: solid black 1px"></div>

<button id="correct">CORRRECT</button>
<button id="wrong">INCORRECT</button>
<button id="undo">UNDO</button>
<div>Correct: <span id='c'>0</span></div>
<div>Incorrect: <span id='i'>0</span></div>
<div>Percent: <span id='p'>0</span></div>
<div>HOTSTREAK: <span id='hs'>0</span></div>
<div>Number of questions answered: <span id='nq'>0</span></div>
<div>Total number of questions: <span id='n'>0</span></div>
<div id="prompt" style="color: red; display: none">You can't proceed until you've answered.<br></div>

<br>
<button id="show">Show incorrect questions.</button>
<div id="wrongScroll" style="overflow-y: scroll; width: 600px; height: 200px; border: solid black 1px"></div>
<div id="wrongScrollAnswer" style="overflow-y: scroll; width: 600px; height: 200px; border: solid black 1px"></div>


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

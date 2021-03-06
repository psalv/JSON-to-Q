


// ------------------------------- Initialization and global variable declaration. -------------------------------------

var defaultDataSet = "assets/questions/examdatabase.json";
var newDataSet;

var examdatabase;
var questionsSize;

// Booleans to determine if we have answered a question yet, and if we have selected the first question yet.
var answer;
var first;
var prompt;

// A variable that holds the currently selected answer for a question displayed on the screen.
var ans;

// The current question number
var currentQuestion;

// A list of incorrect questions
var incorrectQuestions;

var streak;
var temp_streak;
var started = false;

// Global variables to keep track of write/wrong.
var right;
var wrong;

// Keep track of the previously chosen question to display the answer for (so we can change it's colour back).
var previous;

function initQ(dataSet) {

    started = true;
    answer = false;
    first = true;
    prompt = false;
    ans = null;
    currentQuestion = null;
    incorrectQuestions = [];
    streak = 0;

    right = 0;
    wrong = 0;
    previous = null;

    $.ajax({
        url: dataSet,
        type: "GET",
        dataType: 'text',
        complete: function (response, status) {
            if(status === 'error'){
                document.getElementById('description').innerHTML = '<b>Error loading questions.';
            }
            else{
                try {
                    examdatabase = JSON.parse(response.responseText);
                    document.getElementById('prompt2').style.display = "none";
                } catch (e){
                    console.log("caught");
                    document.getElementById('prompt2').style.display = "inline";
                    return;
                }

                // Displaying the description.
                document.getElementById('description').innerHTML = '<b>'+examdatabase.description;

                //Determining how many questions there are.
                questionsSize = 0;
                while (examdatabase.questions[questionsSize++] != null){}

                // Accounting for the null as well as the extra incrementation.
                questionsSize -= 2;

                document.getElementById('n').innerHTML = String(questionsSize);
            }
        }
    });
}






// ------------------------------- Loading question/answer. ------------------------------------------------------------

function qFxn(){

    if(!started){
        return;
    }

    // The question button only works when when we have either determined the
    // correctness of our answer, or are on the first question.
    if(answer || first) {

        // We only update the prompt display if it is currently showing.
        if (prompt){
            document.getElementById('prompt').style.display = "none";
            prompt = false;
        }

        // Resetting all variables associated with the state of question/answered.
        first = false;
        answer = false;
        ans = null;

        // Picks out a random question from the list.
        currentQuestion = Math.floor(Math.random() * questionsSize);

        // Clears the answer and displays the question.
        document.getElementById('answer').innerHTML = "";
        document.getElementById('question').innerHTML = examdatabase.questions[currentQuestion].question;
    }

    // If we try to get a new question before answering the one we are on, we need to show this prompt.
    else {
        prompt = true;
        document.getElementById('prompt').style.display = "inline";
    }
}

function buildAnswer(question){
    var ans = examdatabase.questions[question].answer;

    // Deal with the case with multiple answers, builds a string to return.
    if(ans.constructor == Array){
        var anss = "";
        for(var i = 0; i < ans.length; i++){
            anss += ans[i] + "<br><br>";
        }
        return anss;
    }
    else{
        return ans;
    }
}

// Loads and displays the answer to the current question.
function aFxn(){
    if (currentQuestion != null){
        document.getElementById('answer').innerHTML = buildAnswer(currentQuestion);
    }
}

// ------------------------------- Tracking correct. -------------------------------------------------------------------

// The value incremented depends on whether or not correct is selected.
document.getElementById('correct').addEventListener('click', function () {
    increment('c');
});

document.getElementById('wrong').addEventListener('click', function () {
    increment('i');
});

function increment(type){

    if(!started){
        return;
    }

    // We do not want to be able to answer before we have chosen a question,
    // or if we have already answered the question.
    if (!answer && !first) {

        // Make it so we know what the last answer was.
        ans = type;

        // A boolean so we know when we have answer the question.
        answer = true;

        // Changing the appropriate html ids to display the new values.
        if(type == 'c'){
            document.getElementById(type).innerHTML = String(++right);
            streak++;
        }
        else{
            temp_streak = streak;
            streak = 0;
            incorrect();
            document.getElementById(type).innerHTML = String(++wrong);
        }


        document.getElementById('hs').innerHTML = String(streak);
        document.getElementById('p').innerHTML = String((right/(wrong+right)).toFixed(2));
        document.getElementById('nq').innerHTML = String((wrong+right));
    }
}


// Pushes the question number to our list of incorrect questions.
function incorrect(){
    incorrectQuestions.push(currentQuestion);
}

// The undo button.
document.getElementById('undo').addEventListener('click', function () {

    // When ans is null, it means that the question has not been set as correct or incorrect yet.
    if(ans != null) {

        // We decrement the appropriate field and display it to the screen.
        if (ans == 'c') {
            streak--;
            document.getElementById(ans).innerHTML = String(--right);
        }
        else {
            streak = temp_streak;
            document.getElementById(ans).innerHTML = String(--wrong);

            // If the answer was not incorrect, then we do not require it in our list of incorrect questions.
            incorrectQuestions.pop();
        }

        document.getElementById('hs').innerHTML = String(streak);
        document.getElementById('p').innerHTML = (wrong + right == 0) ? 0 : String((right/(wrong+right)).toFixed(2));
        document.getElementById('nq').innerHTML = String((wrong+right));

        // We reset the parameters that are changed when we answer a question.
        ans = null;
        answer = false;
    }
});

// ------------------------------- Displaying incorrect questions/answers. ---------------------------------------------

// Bind an event to the show button to build the questions that have been marked as incorrect.
document.getElementById('show').addEventListener('click', function () {

    // Since we build a new list of questions, we clear the answer.
    document.getElementById('wrongScrollAnswer').innerHTML = "";

    // Build all of the questions into a string.
    var buildQuestions = "";
    for(var i = 0; i < incorrectQuestions.length; i++){
        var j = incorrectQuestions[i];

        // Data-num stores the question number (so that we can build the answer later).
        buildQuestions += "<div data-num='" + j + "' class='inQuestion'>"
            + examdatabase.questions[j].question + "</div><br>";
    }

    // We display the information.
    document.getElementById('wrongScroll').innerHTML = buildQuestions;

    // Since we have an entirely new set of html tags, we need to bind events to each member of the new class.
    bindQuestionActions();

});

function bindQuestionActions(){

    // We get an array containing all elements with the class 'inQuestion'.
    var classes = document.getElementsByClassName('inQuestion');
    for(var i = 0; i < classes.length; i++){

        // A click event is bound to each element.
        classes[i].addEventListener('click', function () {

            // Set the color of the previously chosen question as black (deselect the question)
            if(previous != null){
                previous.style.color = 'white';
            }

            // Set the currently selected question to be red and store it in the previous variable.
            this.style.color = 'red';
            previous = this;

            // Build the answers and display them.
            document.getElementById('wrongScrollAnswer').innerHTML = buildAnswer(this.getAttribute('data-num'));
        });
    }
}


// ------------------------------- Loading datasets --------------------------------------------------------------------

document.getElementById('defaultData').addEventListener('click', function () {
    reinitFields();
    initQ(defaultDataSet);

});


function uploadFile() {
    var file = document.getElementById('fileToUpload').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function () {
        newDataSet = reader.result;
        reinitFields();
        initQ(newDataSet);
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}

function reinitFields() {
    document.getElementById('c').innerHTML = "0";
    document.getElementById('i').innerHTML = "0";
    document.getElementById('p').innerHTML = "0";
    document.getElementById('hs').innerHTML = "0";
    document.getElementById('nq').innerHTML = "0";
    document.getElementById('question').innerHTML = "";
    document.getElementById('answer').innerHTML = "";
    document.getElementById('wrongScroll').innerHTML = "";
    document.getElementById('wrongScrollAnswer').innerHTML = "";
}


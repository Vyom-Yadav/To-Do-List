<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/inProgress.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Add card button -->
<button class="add-button" onclick="showAdderOnClick()"><i class="fas fa-plus"></i></button>
<br>
<!-- Add card button end -->

<!-- Card to be added begin -->
<form action="" method="get">
    <div class="card">
        <label>
            <input type="text" class="heading" placeholder="Title of the task..." name="heading">
        </label>
        <label for="addnInfo">
            <input type="text" class="additional-information" placeholder="Additional Information..." name="addnInfo"
                   id="addnInfo">
        </label>
        <label>
            <input type="date" class="due-date-input" placeholder="Due Date..." name="dueDate">
        </label>
        <label>
            <input type="range" min="1" max="100" value="50" class="slider" id="myRange" name="range">
        </label>
        <p class="percentage-done">Value: <span id="demo"></span></p>
        <br>
        <button onclick="newElement()" class="okBtn">Add</button>
    </div>
</form>
<!-- Card to be added end -->

<!-- List of cards -->
<ul id="task-list">
</ul>
<!-- List of cards ended -->
<script src="../Javascript/inProgressAdder.js" type="text/javascript"></script>
</body>
</html>

<?php
include("../PHP/config.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET" and !empty($_SESSION['login_user'])) {
    $username = $_SESSION['login_user'];
    $heading = mysqli_real_escape_string($db, $_GET['heading']);
    $addnInfo = mysqli_real_escape_string($db, $_GET['addnInfo']);
    $date = mysqli_real_escape_string($db, $_GET['dueDate']);
    $percentageDone = mysqli_real_escape_string($db, $_GET['range']);

    if (!empty($heading)) {
        $query = "INSERT INTO inProgress(username, heading, addnInfo, date, percentageDone) VALUES('$username','$heading','$addnInfo','$date','$percentageDone')";
        mysqli_query($db, $query);
    }

}

// Default Loading
if (!empty($_SESSION['login_user'])) {
    $length = 0;
    $username = $_SESSION['login_user'];
    $query_2 = "SELECT * FROM inProgress WHERE username = '$username'";
    $result = mysqli_query($db, $query_2);
    $row = array();
    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $row[] = $line;
        $length++;
    }
    while ($length >= 0) {
        $printed_heading = $row[$length]['heading'];
        $printed_info = $row[$length]['addnInfo'];
        $printed_date = $row[$length]['date'];
        $perDone = $row[$length]['percentageDone'];
        $id = $row[$length]['id'];
        echo
        "<script>
            function newElement(heading, addnInfo, date, id) {
            let headingToBeAdded = document.createTextNode(heading);
            let infoToBeAdded = document.createTextNode(addnInfo);
            let dateToBeAdded = document.createTextNode(date);  
            let li = document.createElement('li');
            let deleteForm = document.createElement('form');
            let hiddenId = document.createElement('input');
            hiddenId.type = 'hidden';
            hiddenId.name = 'id';
            hiddenId.id = 'id';
            let deleteButton = document.createElement('button');
            let innerIButton = document.createElement('i');
            deleteButton.type='submit';
            deleteButton.className = 'edit-button';
            innerIButton.className = 'fas fa-trash-alt';
            innerIButton.style.color = '#fe7b71';
            deleteButton.appendChild(innerIButton);
            deleteForm.appendChild(deleteButton);
            deleteForm.appendChild(hiddenId);
            deleteForm.action = '../PHP/deleteEntryFromInProgress.php';
            deleteForm.id = 'delete-form';
            deleteForm.method = 'get';
            li.appendChild(deleteForm);
            li.appendChild(headingToBeAdded);
            li.appendChild(document.createElement('br'));
            li.appendChild(infoToBeAdded);
            li.appendChild(document.createElement('br'));
            li.appendChild(dateToBeAdded);
            let displaySlider = document.createElement('div');
            displaySlider.id = 'myProgress';
            let displaySliderTwo = document.createElement('div');
            displaySliderTwo.id = 'myBar-'+k;
            displaySlider.appendChild(displaySliderTwo);
            displaySlider.style.width = '216px';
            displaySlider.style.backgroundColor = 'grey';
            displaySliderTwo.style.width = '1%';
            displaySliderTwo.style.height = '30px';
            displaySliderTwo.style.backgroundColor = '#fe7b71';
            li.appendChild(document.createElement('br'));
            li.appendChild(document.createTextNode('Progress'));
            li.appendChild(document.createElement('br'));
            li.append(displaySlider);
            if (heading === '') {}
            else {
            document.getElementById('task-list').appendChild(li);
            move('$perDone');
            k++;
            }
            document.querySelector('.card').style.display = 'none';
            deleteButton.addEventListener('click', function () {
            document.getElementById('id').value = id;
            console.log(document.getElementById('id').value);
            document.getElementById('delete-form').submit();
            document.getElementById('task-list').removeChild(li);
            });
           
        }
            newElement('$printed_heading', '$printed_info', '$printed_date', '$id');
            
            function move(perDone) {
            let i = 1;
            let elem = document.getElementById('myBar-'+k);
            let width = 1;
            let id = setInterval(frame, 10);
        
            function frame() {
                if (width >= perDone) {
                    clearInterval(id);
                    i = 0;
                } else {
                    width++;
                    elem.style.width = width + '%';
                }
        
            }
        }
                   
            </script>";
        $length--;
    }
}
?>
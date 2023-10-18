<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Project Manager">
    <meta name="author" content="Team SignIn">
    <title> Admin | Project Manager </title>
    <link rel="icon" href="http://localhost/new-task/assets/images/images21.jpg" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="http://localhost/new-task/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/new-task/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="http://localhost/new-task/assets/css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet"
        href="http://localhost/new-task/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="http://localhost/new-task/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="http://localhost/new-task/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="http://localhost/new-task/assets/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<style>
body {
    font-family: 'Poppins', sans-serif;
}

.popup-container {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
}

.task-form-popup {
    position: absolute;
    width: 450px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.task-board {
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

.task-column {
    flex: 1;
    padding: 10px;
    background-color: #f4f4f4;
}

.task-list {
    list-style: none;
    padding: 0;
    min-height: 300px;
}

.task-list li {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 5px;
    margin-bottom: 5px;
}

.delete {
    width: 15px;
    float: right;
    margin-left: 5px;
}

.close {
    position: absolute;
    width: 14px;
    float: right;
    top: 10px;
    right: 10px;
}

.addTaskButton {
    width: 30px;
    position: relative;
    top: -5px;
    right: -1px;
}

span {
    font-size: 13px;
    margin-bottom: 4px;
}

.btn {
    margin-top: 7px;
    background: #1C8BEE;
    border: none;
    border-radius: 4px;
    padding: 3px 10px;
    color: white;
    padding: 1px 15px;
    margin-bottom: 6px;
}

.ad-select {
    padding: 5px;
    margin-top: -13px;
}

.selected-options-container {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
}

.selected-option {
    display: flex;
    align-items: center;
    background-color: #E3E6E9;
    padding: 5px;
    border-radius: 4px;
    margin-right: 5px;
}

.selected-option-close {
    cursor: pointer;
    margin-left: 5px;
}

.mult-select-tag {

    display: flex;
    width: 100%;
    flex-direction: column;
    align-items: center;
    position: relative;
    --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
    --tw-shadow-color: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
    --border-color: rgb(218, 221, 224);
    font-family: Verdana, sans-serif;
}

.mult-select-tag .wrapper {
    width: 100%;
}

.mult-select-tag .body {
    margin-top: 2px;
    display: flex;
    border: 1px solid var(--border-color);
    background: whitesmoke;
    min-height: 2.15rem;
    width: 100%;
    min-width: 14rem;

}

.mult-select-tag .input-container {
    display: flex;
    flex-wrap: wrap;
    flex: 1 1 auto;
    padding: 0.1rem;
}

.mult-select-tag .input-body {
    display: flex;
    width: 100%;
}

.mult-select-tag .input {
    flex: 1;
    background: transparent;
    border-radius: 0.25rem;
    padding: 0.45rem;
    margin: 10px;
    color: #2d3748;
    outline: 0;
    border: 1px solid var(--border-color);
}

.mult-select-tag .btn-container {
    color: #e2eBf0;
    padding: 0.5rem;
    display: flex;
}

.mult-select-tag .btn-container svg {
    margin-left: 9px;
    width: 15px;
}

.mult-select-tag button {
    cursor: pointer;
    width: 100%;
    color: #718096;
    outline: 0;
    height: 100%;
    border: none;
    padding: 0;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
    text-transform: none;
}

.mult-select-tag button:first-child {
    width: 1rem;
    height: 90%;
}


.mult-select-tag .drawer {
    position: absolute;
    background: white;
    max-height: 15rem;
    z-index: 40;
    top: 98%;
    width: 100%;
    overflow-y: scroll;
    border: 1px solid var(--border-color);
    border-radius: 0.25rem;
}

.mult-select-tag ul {
    list-style-type: none;
    padding: 0.5rem;
    margin: 0;
}

.mult-select-tag ul li {
    padding: 0.5rem;
    border-radius: 0.25rem;
    cursor: pointer;
}

.mult-select-tag ul li:hover {
    background: rgb(243 244 246);
}

.mult-select-tag .item-container {
    display: flex;
    justify-content: center;
    align-items: center;
    color: #2c7a7b;
    padding: 0.2rem 0.4rem;
    margin: 0.2rem;
    font-weight: 500;
    border: 1px solid #81e6d9;
    background: #e6fffa;
    border-radius: 9999px;
}

.mult-select-tag .item-label {
    max-width: 100%;
    line-height: 1;
    font-size: 0.75rem;
    font-weight: 400;
    flex: 0 1 auto;
    color: #2c7a7b;
}

.mult-select-tag .item-close-container {
    display: flex;
    flex: 1 1 auto;
    flex-direction: row-reverse;
}

.mult-select-tag .item-close-svg {
    width: 1rem;
    margin-left: 0.5rem;
    height: 1rem;
    cursor: pointer;
    border-radius: 9999px;
    display: block;
}

.hidden {
    display: none;
}

.mult-select-tag .shadow {
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.mult-select-tag .rounded {
    border-radius: .375rem;
}

.inp {
    margin-top: 10px 0 4px 0;
    outline: none;
    border: none;
    width: 100%;
    background: whitesmoke;
    border: 1px solid gainsboro;
    color: grey;
    border-radius: 7px;
    margin-top: 3px;
}

.inp::placeholder {
    padding-left: 8px;

}

.task-column form {
    display: none;
}

.projectlbl {
    font-size: 12px;
}

.verifiedbutton {
    width: 30px;
    position: relative;
    top: -5px;
    right: -1px;

}

.date {
    float: right;
    color: darkgrey;
    font-size: 10px;
}

.red-due-date {
    color: red;
    float: right;
}
</style>



<body>

    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="navbar-inner">
                <div class="sidenav-header">
                    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                        aria-hidden="true" id="iconSidenav"></i>
                    <a class="navbar-brand m-0" href="">
                        <img style="max-height: 100px;"
                            src="https://www.teamsignin.com/projectmanager/assets/images/logo-e8194769a61d05606daee46118a9ead2.png"
                            class="navbar-brand-img h-100">

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">


                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url().'task' ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Task Out</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url().'my-task' ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">My Task</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="<?=base_url().'/task-in' ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Task In</span>
                            </a>
                        </li>

                    </ul>


                </div>
            </div>
        </div>
    </nav>





    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>


                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder"
                                            src="http://localhost/new-task/assets/img/theme/team-1.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>

                                <div class="dropdown-divider"></div>
                                <a href="t#" class="dropdown-item">
                                    <i class="ni ni-circle-08"></i>
                                    <span>View Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-planet"></i>
                                    <span>Change Password</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
       </nav>
        <!-- Header -->
        <!-- Header -->

        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Task list</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row" id="alert">

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Task In</h3>
                                </div>
                                <div class="col text-right">
                                    <form method="get">
                                        <input style="outline: none;" type="text" placeholder="search" name="search">
                                        <button type="submit" style="margin-top: -4px;padding: 5px;width: 30px;"
                                            class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <div class="task-board">
                                <?php
                                    if(!empty($result_message) )
                                    {
                                        echo($result_message);
                                    }
                                    else
                                    {   ?>
                                          <div class="task-column" id="todo-column">
                                            <div style="display: flex;">
                                                <h3>Task</h3>
                                            </div>
                                            <ul class="task-list" id="todo-list" ondragover="dragOver(event)"
                                                ondrop="drop_todo(event)">
                                                <?php foreach ($task as $value) {
                                                        $currentDate = date('Y-m-d');

                                                        // Check if the due date is less than the current date
                                                        $isDueDatePassed = ($value['due_date'] < $currentDate);
                                                        $formattedDueDate = date('d-M-Y', strtotime($value['due_date']));
                                                        
                                                        // Add a CSS class conditionally based on the due date
                                                        $dueDateClass = $isDueDatePassed ? 'red-due-date' : '';
                                                  ?>

                                                <li id="task_<?php echo $value['id']; ?>" draggable="true"
                                                    ondragstart="dragStart(event)">
                                                    <div>
                                                        <?php echo "<span>" . $value['project_title'] . " - " .$value['assignedby'] . "<span class='date " . $dueDateClass . "'>" . $formattedDueDate . "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                                    </div>

                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>

                                        <div class="task-column" id="inprogress-column">
                                            <div style="display: flex;">
                                                <h3>In Progress</h3>
                                            </div>
                                            <ul class="task-list" id="inprogress-list" ondragover="dragOver(event)"
                                                ondrop="drop_progress(event)">
                                                <?php foreach ($progress as $value) { 
                                                        $currentDate = date('Y-m-d');

                                                        $formattedDueDate = date('d-M-Y', strtotime($value['due_date']));
                                                                  
                                                        // Check if the due date is less than the current date
                                                        $isDueDatePassed = ($value['due_date'] < $currentDate);

                                                        // Add a CSS class conditionally based on the due date
                                                        $dueDateClass = $isDueDatePassed ? 'red-due-date' : '';
                                                ?>
                                                                              <li id="task_<?php echo $value['id']; ?>" draggable="true"
                                                    ondragstart="dragStart(event)">
                                                    <div>
                                                        <?php echo "<span>" . $value['project_title'] . " - ".$value['assignedby']  . "<span class='date " . $dueDateClass . "'>" .$formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>

                                        <div class="task-column" id="completed-column">
                                            <div style="display: flex;">
                                                <h3>Completed</h3>
                                            </div>
                                            <ul class="task-list" id="completed-list" ondragover="dragOver(event)"
                                                ondrop="drop_completed(event)">
                                                <?php foreach ($completed as $value) { 
                                                    $currentDate = date('Y-m-d');

                                                    // Check if the due date is less than the current date
                                                    $isDueDatePassed = ($value['due_date'] < $currentDate);
                                                    $formattedDueDate = date('d-M-Y', strtotime($value['due_date']));
                                                    // Add a CSS class conditionally based on the due date
                                                    $dueDateClass = $isDueDatePassed ? 'red-due-date' : '';
                                                  ?>
                                                  <li id="task_<?php echo $value['id']; ?>" draggable="true"
                                                      ondragstart="dragStart(event)">

                                                      <div>
                                                          <?php echo "<span>" . $value['project_title'] . " - ".$value['assignedby']  . "<span class='date " . $dueDateClass . "'>" .$formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                                      </div>
                                                  </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="task-column" id="verified-column">
                                            <div style="display: flex;">
                                                <h3>Verified</h3>
                                                <img class="verifiedbutton showbtn"
                                                    src="https://t3.ftcdn.net/jpg/01/57/86/44/240_F_157864480_TFm1nQsUI1o8VLKg6SK6yV9P6tsK4TXN.jpg"
                                                    alt="">

                                            </div>

                                            <ul class="task-list" id="verified-list">
                                                <?php foreach ($verified as $value)
                                                 { 
                                                        $currentDate = date('Y-m-d');

                                                        // Check if the due date is less than the current date
                                                        $isDueDatePassed = ($value['due_date'] < $currentDate);
                                                        $formattedDueDate = date('d-M-Y', strtotime($value['due_date']));
                                                        // Add a CSS class conditionally based on the due date
                                                        $dueDateClass = $isDueDatePassed ? 'red-due-date' : '';
                                                      ?>
                                                      <li id="task_<?php echo $value['id']; ?>">
                                                          <div>
                                                              <?php echo "<span>" . $value['project_title'] . " - ".$value['assignedby']  . "<span class='date " . $dueDateClass . "'>" . $formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                                          </div>

                                                      </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <?php }?>
                          </div>


                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="footer pt-0">
                    <div class="row align-items-center justify-content-lg-between">

                    </div>
                </footer>
            </div>
      </div>
        <!-- Argon Scripts -->
        <!-- Core -->
        <style type="text/css">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button 
        {
            -webkit-appearance: none;
            margin: 0;
        }
        </style>
        <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/js-cookie/js.cookie.js"></script>
        <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <!-- Optional JS -->
        <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- Argon JS -->
        <script src="assets/js/argon.js?v=1.2.0"></script>
        <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/vendor/select2/dist/js/select2.min.js"></script>




        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>

<script>
document.querySelectorAll(".editTaskButton").forEach(button => {
    button.addEventListener("click", function() {
        document.getElementById("editContainer").style.display = "block";
    });
});

document.querySelectorAll(".editTaskClose").forEach(closeButton => {
    closeButton.addEventListener("click", function() {
        document.getElementById("editContainer").style.display = "none";
        // resetSelect()
    });
});
</script>
<script>
function dragStart(event) {
    event.dataTransfer.setData("text/plain", event.target.id);
}

function dragOver(event) {
    event.preventDefault();
}

function drop_todo(event) {
    event.preventDefault();

    const draggedTaskId = event.dataTransfer.getData("text/plain");
    const taskElement = document.getElementById(draggedTaskId);
    const assignedList = document.getElementById("todo-list");

    if (taskElement && assignedList) {
        const boundingClientRect = assignedList.getBoundingClientRect();
        const mouseY = event.clientY;

        // Determine the position within the list (top, bottom, or in between)
        const dropPosition = mouseY < boundingClientRect.top + boundingClientRect.height / 3 ? "top" :
            mouseY > boundingClientRect.bottom - boundingClientRect.height / 3 ? "bottom" :
            "middle";

        // Insert the dragged task element at the appropriate position
        if (dropPosition === "top") {
            assignedList.insertBefore(taskElement, assignedList.firstChild);
        } else if (dropPosition === "bottom") {
            assignedList.appendChild(taskElement);
        } else {
            // Determine where to insert the task element in the middle of the list
            const taskElements = assignedList.querySelectorAll("li");
            let insertIndex = 0;

            for (let i = 0; i < taskElements.length; i++) {
                const rect = taskElements[i].getBoundingClientRect();
                if (mouseY < rect.top + rect.height / 2) {
                    insertIndex = i;
                    break;
                }
            }

            assignedList.insertBefore(taskElement, taskElements[insertIndex]);
        }

        const taskId = draggedTaskId.split("_")[1];

        updateTaskStatus(taskId, 0);
    }
}

function drop_progress(event) {
    event.preventDefault();

    const draggedTaskId = event.dataTransfer.getData("text/plain");
    const taskElement = document.getElementById(draggedTaskId);
    const assignedList = document.getElementById("inprogress-list");

    if (taskElement && assignedList) {
        const boundingClientRect = assignedList.getBoundingClientRect();
        const mouseY = event.clientY;

        // Determine the position within the list (top, bottom, or in between)
        const dropPosition = mouseY < boundingClientRect.top + boundingClientRect.height / 3 ? "top" :
            mouseY > boundingClientRect.bottom - boundingClientRect.height / 3 ? "bottom" :
            "middle";

        // Insert the dragged task element at the appropriate position
        if (dropPosition === "top") {
            assignedList.insertBefore(taskElement, assignedList.firstChild);
        } else if (dropPosition === "bottom") {
            assignedList.appendChild(taskElement);
        } else {
            // Determine where to insert the task element in the middle of the list
            const taskElements = assignedList.querySelectorAll("li");
            let insertIndex = 0;

            for (let i = 0; i < taskElements.length; i++) {
                const rect = taskElements[i].getBoundingClientRect();
                if (mouseY < rect.top + rect.height / 2) {
                    insertIndex = i;
                    break;
                }
            }

            assignedList.insertBefore(taskElement, taskElements[insertIndex]);
        }

        const taskId = draggedTaskId.split("_")[1];

        updateTaskStatus(taskId, 1);
    }
}

function drop_completed(event)
 {
    event.preventDefault();

    const draggedTaskId = event.dataTransfer.getData("text/plain");
    const taskElement = document.getElementById(draggedTaskId);
    const assignedList = document.getElementById("completed-list");

    if (taskElement && assignedList) {
        const boundingClientRect = assignedList.getBoundingClientRect();
        const mouseY = event.clientY;

        // Determine the position within the list (top, bottom, or in between)
        const dropPosition = mouseY < boundingClientRect.top + boundingClientRect.height / 3 ? "top" :
            mouseY > boundingClientRect.bottom - boundingClientRect.height / 3 ? "bottom" :
            "middle";

        // Insert the dragged task element at the appropriate position
        if (dropPosition === "top") {
            assignedList.insertBefore(taskElement, assignedList.firstChild);
        } else if (dropPosition === "bottom") {
            assignedList.appendChild(taskElement);
        } else {
            // Determine where to insert the task element in the middle of the list
            const taskElements = assignedList.querySelectorAll("li");
            let insertIndex = 0;

            for (let i = 0; i < taskElements.length; i++) {
                const rect = taskElements[i].getBoundingClientRect();
                if (mouseY < rect.top + rect.height / 2) {
                    insertIndex = i;
                    break;
                }
            }

            assignedList.insertBefore(taskElement, taskElements[insertIndex]);
        }

        const taskId = draggedTaskId.split("_")[1];

        updateTaskStatus(taskId, 2);
    }
}

function updateTaskStatus(taskId, status) 
{
    const xhr = new XMLHttpRequest();
    const url = "<?php echo base_url('updateTaskStatus'); ?>";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    xhr.send("task_id=" + taskId + "&status=" + status);
}
</script>
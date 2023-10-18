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

.date {
    float: right;
    color: darkgrey;
    font-size: 10px;
}

.delete {
    margin-top: -14px;
    width: 15px;
    float: right;
    margin-left: 5px;
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
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-4 col-md-8">
                            <div class="card card-stats">
                                <!-- Card body -->

                            </div>
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
                                    <h3 class="mb-0">Task Out</h3>
                                </div>
                                <div class="col text-right">
                                    <form method="get">
                                        <input style="outline: none;" type="text" placeholder="search" name="search">
                                        <button  style="margin-top: -4px;padding: 5px;width: 30px;"
                                            class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- <div style="margin-left: 24px; margin-top: 5px;">
                <label for="">ADD TASK</label>
                <img id="addTaskButton" src="https://img.icons8.com/?size=512&id=24717&format=png" alt="">
            </div>   -->

                            <div id="editContainer" class="popup-container">
                                <!-- <img class="editTaskClose close" src="http://cdn.onlinewebfonts.com/svg/img_342859.png" alt=""> -->
                                <div id="taskFormPopup" class="task-form-popup">
                                    <img class="editTaskClose close"
                                        src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-close-512.png"
                                        alt="">
                                    <form id="editTaskForm" method="post">
                                        <div style="display: flex; flex-direction: column; gap: 10px;">
                                            <label for="project_title">Select Project:</label>
                                            <select aria-label="Default select example" id="projectSelect"
                                                class="ad-select" name="project_id">
                                                <!-- Project options will be added here -->
                                            </select>
                                            <label style="margin-bottom: 0;" for="project_title">Assign:</label>
                                            <select aria-label="Default select example" id="edit-employee-select"
                                                class="ad-select" name="emp_id[]" multiple>
                                                <!-- Employee options will be added here -->
                                            </select>
                                        </div>
                                        <div style="display: flex; flex-direction: column; gap: 10px;">
                                            <label style="margin-top: 4px;" for="task_title">Task Title:</label>
                                            <input style="margin-top: -8px;" id="taskTitleInput" type="text"
                                                name="task_title">
                                            <label class="projectlbl" for="due_date">Due Date</label>
                                            <input type="date" class="ad-select inp" name="due_date" id="due_date">

                                        </div>
                                        <button class="btn" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>

                            <div class="task-board">
                                <?php
                                if(!empty($result_message) )
                                {
                                    echo($result_message);
                                }
                                else
                                {
                                
                                    ?>
                                    <div class="task-column" id="todo-column">
                                        <div style="display: flex;">
                                            <h3>Task</h3>
                                            <img class="addTaskButton showbtn"
                                                src="https://cdn.iconscout.com/icon/free/png-256/free-add-plus-3114469-2598247.png"
                                                alt="">
                                        </div>
                                        <form id="task-Form" method="post">
                                            <input type="hidden" name="status" value="0">
                                            <label class="projectlbl" for="project_title">Select Project</label>
                                            <select aria-label="Default select example" class="ad-select inp"
                                                name="project_id" id="projectSelect1">
                                                <?php foreach ($project as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['project_title'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <label class="projectlbl">Select Team Member</label>
                                            <select aria-label="Default select example" class="ad-select" name="emp_id[]"
                                                multiple id="employeeSelect">
                                                <?php foreach ($employees as $value) { ?>
                                                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <label class="projectlbl" for="project_title">Task Title</label>
                                            <input style="padding-top: 11px;" class="inp" type="text"
                                                name="task_title" /><br>
                                            <label class="projectlbl" for="due_date">Due Date</label>
                                            <input type="date" class="ad-select inp" name="due_date" id="due_date">
                                            <button class="btn btn-default">Add</button>
                                        </form>
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
                                                    <?php echo "<span>" . $value['project_title'] . " - " . $value['related_employee'].  "<span class='date " . $dueDateClass . "'>" .$formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                                </div>
                                                <img class="delete" src="https://cdn.onlinewebfonts.com/svg/img_304350.png"
                                                    onclick="delete_row(<?=$value['id']?>)" alt="">
                                                <a href="#" onclick="editTaskOnClick(<?=$value['id']?>)"><img
                                                        src="http://freevector.co/wp-content/uploads/2012/01/61456-pencil-edit-button.png"
                                                        class="editTaskButton delete" alt=""></a>

                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>

                                <div class="task-column" id="inprogress-column">
                                    <div style="display: flex;">
                                        <h3>In Progress</h3>
                                        <img class="addTaskButton showbtn"
                                            src="https://cdn.iconscout.com/icon/free/png-256/free-add-plus-3114469-2598247.png"
                                            alt="">
                                    </div>
                                    <form id="inprogress-Form" method="post">
                                        <input type="hidden" name="status" value="1">
                                        <label class="projectlbl" for="project_title">Select Project</label>
                                        <select aria-label="Default select example" class="ad-select inp"
                                            name="project_id" id="projectSelect2">
                                            <?php foreach ($project as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['project_title'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="projectlbl">Select Team Member</label>
                                        <select aria-label="Default select example" class="ad-select" name="emp_id[]"
                                            multiple id="employeeSelect2">
                                            <?php foreach ($employees as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="projectlbl" for="project_title">Task Title</label>
                                        <input style="padding-top: 11px;" class="inp" type="text"
                                            name="task_title" /><br>
                                        <label class="projectlbl" for="due_date">Due Date</label>
                                        <input type="date" class="ad-select inp" name="due_date" id="due_date">
                                        <button class="btn btn-default">Add</button>
                                    </form>
                                    <ul class="task-list" id="inprogress-list" ondragover="dragOver(event)"
                                        ondrop="drop_progress(event)">
                                        <?php foreach ($progress as $value) { 
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
                                                <?php echo "<span>" . $value['project_title'] . " - " . $value['related_employee'] . "<span class='date " . $dueDateClass . "'>" .$formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                            </div>
                                            <img class="delete" src="https://cdn.onlinewebfonts.com/svg/img_304350.png"
                                                onclick="delete_row(<?=$value['id']?>)" alt="">
                                            <a href="#" onclick="editTaskOnClick(<?=$value['id']?>)"><img
                                                    src="http://freevector.co/wp-content/uploads/2012/01/61456-pencil-edit-button.png"
                                                    class="editTaskButton delete" alt=""></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class="task-column" id="completed-column">
                                    <div style="display: flex;">
                                        <h3>Completed</h3>
                                        <img class="addTaskButton showbtn"
                                            src="https://cdn.iconscout.com/icon/free/png-256/free-add-plus-3114469-2598247.png"
                                            alt="">
                                    </div>
                                    <form id="completed-Form" method="post">
                                        <input type="hidden" name="status" value="2">
                                        <label class="projectlbl" for="project_title">Select Project</label>
                                        <select aria-label="Default select example" class="ad-select inp"
                                            name="project_id" id="projectSelect3">
                                            <!-- <option>-Select Project-</option> -->
                                            <?php foreach ($project as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['project_title'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="projectlbl">Select Team Member</label>
                                        <select aria-label="Default select example" class="ad-select" name="emp_id[]"
                                            multiple id="employeeSelect3">
                                            <?php foreach ($employees as $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label class="projectlbl" for="project_title">Task Title</label>
                                        <input style="padding-top: 11px;" class="inp" type="text"
                                            name="task_title" /><br>
                                        <label class="projectlbl" for="due_date">Due Date</label>
                                        <input type="date" class="ad-select inp" name="due_date" id="due_date">
                                        <button class="btn btn-default">Add</button>
                                    </form>
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
                                                <?php echo "<span>" . $value['project_title'] . " - " . $value['related_employee'] . "<span class='date " . $dueDateClass . "'>" .$formattedDueDate. "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                            </div>

                                            <img class="delete" src="https://cdn.onlinewebfonts.com/svg/img_304350.png"
                                                onclick="delete_row(<?=$value['id']?>)" alt="">
                                            <a href="#" onclick="editTaskOnClick(<?=$value['id']?>)"><img
                                                    src="http://freevector.co/wp-content/uploads/2012/01/61456-pencil-edit-button.png"
                                                    class="editTaskButton delete" alt=""></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class="task-column" id="verified-column">
                                    <div style="display: flex;">
                                        <h3>Verified</h3>
                                    </div>

                                    <ul class="task-list" id="verified-list" ondragover="dragOver(event)"
                                        ondrop="drop_verified(event)">
                                        <?php foreach ($verified as $value) { 
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
                                                <?php echo "<span>" . $value['project_title'] . " - " . $value['related_employee'] . "<span class='date " . $dueDateClass . "'>" .$formattedDueDate . "</span>" . "</span>" . "<br/>" . "<b>" . $value['task_title'] . "</b>"; ?>
                                            </div>
                                            <img class="delete" src="https://cdn.onlinewebfonts.com/svg/img_304350.png"
                                                onclick="delete_row(<?=$value['id']?>)" alt="">
                                            <a href="#" onclick="editTaskOnClick(<?=$value['id']?>)"><img
                                                    src="http://freevector.co/wp-content/uploads/2012/01/61456-pencil-edit-button.png"
                                                    class="editTaskButton delete" alt=""></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <?php } ?>
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
        input[type=number]::-webkit-outer-spin-button {
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
// document.getElementById("addTaskButton").addEventListener("click", function () {
//     document.getElementById("popupContainer").style.display = "block";
//     resetSelect()

// });

// document.getElementById("addTaskClose").addEventListener("click", function () {
//     document.getElementById("popupContainer").style.display = "none";
//     // resetSelect()
// });

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

function drop_completed(event) {
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

function drop_verified(event) {
    event.preventDefault();

    const draggedTaskId = event.dataTransfer.getData("text/plain");
    const taskElement = document.getElementById(draggedTaskId);
    const assignedList = document.getElementById("verified-list");

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

        updateTaskStatus(taskId, 3);
    }
}

function updateTaskStatus(taskId, status) {
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

<script>
/****************************************
 *       Basic Table                   *
 **************************************/
// $("#zero_config").DataTable();
</script>
<script>
function delete_row(id) {
    var result = confirm("Want to delete this?");
    if (result) {
        $.ajax({
            url: "<?= base_url() ?>delete",
            type: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#task_' + id).remove();
                $('.task_' + id).remove();
                $('#task2_' + id).remove();

            }
        });
    }
}


function edit(id) {
    console.log(id);
    $.ajax({
        url: "<?= base_url() ?>edit",
        type: 'POST',
        data: {
            id: id
        },
        dataType: 'json',
        success: function(data) {
            // Clear and populate project select
            $('#projectSelect').empty();
            $('#projectSelect').append($('<option>').text('select'));

            $.each(data.project1, function(index, project) {
                $('#projectSelect').append($('<option>').text(project.project_title).attr('value',
                    project.id));
            });

            $('#projectSelect').val(data.task.project_id);

            // Clear and populate employee select
            var editEmployeeSelect = $('#edit-employee-select');
            editEmployeeSelect.empty();

            const associatedEmployeeNames = data.task.related_employee.split(',');

            // Iterate through the available employees and select the associated employees
            $.each(data.employees, function(index, employee) {
                const option = $('<option>').text(employee.name).attr('value', employee.id);

                // Check if the employee's name is in the associated employee names array, if yes, select them
                if (associatedEmployeeNames.includes(employee.name)) {
                    option.prop('selected', true);
                }

                editEmployeeSelect.append(option);
            });

            // Set task title input
            $('#taskTitleInput').val(data.task.task_title);
            $('#due_date').val(data.task.due_date);


            // Hide the existing MultiSelectTag
            editEmployeeSelect.siblings('.mult-select-tag').remove();

            // Initialize the MultiSelectTag
            new MultiSelectTag('edit-employee-select', {
                shadow: true, // Customize as needed
                rounded: true, // Customize as needed
                placeholder: 'Search...', // Customize as needed
                onChange: function(selectedValues) {
                    // Handle selected values change here if needed
                }
            });

            // Set edit form action
            $('#editTaskForm').attr('action', '<?= base_url("updatetask/") ?>' + data.task.id);
            $('#editTaskForm').show();
        },
        error: function() {
            alert("An error occurred while fetching task data");
        }
    });
}




function editTaskOnClick(taskId) {
    edit(taskId);
}


new MultiSelectTag('employeeSelect')
new MultiSelectTag('employeeSelect2')
new MultiSelectTag('employeeSelect3')

new MultiSelectTag('projectSelect1')
new MultiSelectTag('projectSelect2')
new MultiSelectTag('projectSelect3')

function MultiSelectTag(el, customs = {
    shadow: false,
    rounded: true
}) {
    var element = null
    var options = null
    var customSelectContainer = null
    var wrapper = null
    var btnContainer = null
    var body = null
    var inputContainer = null
    var inputBody = null
    var input = null
    var button = null
    var drawer = null
    var ul = null
    var domParser = new DOMParser()
    init()

    function init() {
        element = document.getElementById(el)
        createElements()
        initOptions()
        enableItemSelection()
        setValues(false)

        button.addEventListener('click', () => {
            if (drawer.classList.contains('hidden')) {
                initOptions()
                enableItemSelection()
                drawer.classList.remove('hidden')
                input.focus()
            }
        })

        input.addEventListener('keyup', (e) => {
            initOptions(e.target.value)
            enableItemSelection()
        })

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && inputContainer.childElementCount > 1) {
                const child = body.children[inputContainer.childElementCount - 2].firstChild
                const option = options.find((op) => op.value == child.dataset.value)
                option.selected = false
                removeTag(child.dataset.value)
                setValues()
            }

        })

        window.addEventListener('click', (e) => {
            if (!customSelectContainer.contains(e.target)) {
                drawer.classList.add('hidden')
            }
        });

    }

    function createElements() {
        // Create custom elements
        options = getOptions();
        element.classList.add('hidden')

        // .multi-select-tag
        customSelectContainer = document.createElement('div')
        customSelectContainer.classList.add('mult-select-tag')

        // .container
        wrapper = document.createElement('div')
        wrapper.classList.add('wrapper')

        // body
        body = document.createElement('div')
        body.classList.add('body')
        if (customs.shadow) {
            body.classList.add('shadow')
        }
        if (customs.rounded) {
            body.classList.add('rounded')
        }

        // .input-container
        inputContainer = document.createElement('div')
        inputContainer.classList.add('input-container')

        // input
        input = document.createElement('input')
        input.classList.add('input')
        input.placeholder = `${customs.placeholder || 'Search...'}`

        inputBody = document.createElement('inputBody')
        inputBody.classList.add('input-body')
        inputBody.append(input)

        body.append(inputContainer)

        // .btn-container
        btnContainer = document.createElement('div')
        btnContainer.classList.add('btn-container')

        // button
        button = document.createElement('button')
        button.type = 'button'
        btnContainer.append(button)

        const icon = domParser.parseFromString(`<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 21 6 15"></polyline></svg>`, 'image/svg+xml').documentElement
        button.append(icon)


        body.append(btnContainer)
        wrapper.append(body)

        drawer = document.createElement('div');
        drawer.classList.add(...['drawer', 'hidden'])
        if (customs.shadow) {
            drawer.classList.add('shadow')
        }
        if (customs.rounded) {
            drawer.classList.add('rounded')
        }
        drawer.append(inputBody)
        ul = document.createElement('ul');

        drawer.appendChild(ul)

        customSelectContainer.appendChild(wrapper)
        customSelectContainer.appendChild(drawer)

        // Place TailwindTagSelection after the element
        if (element.nextSibling) {
            element.parentNode.insertBefore(customSelectContainer, element.nextSibling)
        } else {
            element.parentNode.appendChild(customSelectContainer);
        }
    }

    function initOptions(val = null) {
        ul.innerHTML = ''
        for (var option of options) {
            if (option.selected) {
                !isTagSelected(option.value) && createTag(option)
            } else {
                const li = document.createElement('li')
                li.innerHTML = option.label
                li.dataset.value = option.value

                // For search
                if (val && option.label.toLowerCase().startsWith(val.toLowerCase())) {
                    ul.appendChild(li)
                } else if (!val) {
                    ul.appendChild(li)
                }
            }
        }
    }

    function createTag(option) {
        // Create and show selected item as tag
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('item-container');
        const itemLabel = document.createElement('div');
        itemLabel.classList.add('item-label');
        itemLabel.innerHTML = option.label
        itemLabel.dataset.value = option.value
        const itemClose = new DOMParser().parseFromString(`<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>`, 'image/svg+xml').documentElement

        itemClose.addEventListener('click', (e) => {
            const unselectOption = options.find((op) => op.value == option.value)
            unselectOption.selected = false
            removeTag(option.value)
            initOptions()
            setValues()
        })

        itemDiv.appendChild(itemLabel)
        itemDiv.appendChild(itemClose)
        inputContainer.append(itemDiv)
    }

    function enableItemSelection() {
        // Add click listener to the list items
        for (var li of ul.children) {
            li.addEventListener('click', (e) => {
                options.find((o) => o.value == e.target.dataset.value).selected = true
                input.value = null
                initOptions()
                setValues()
                input.focus()
            })
        }
    }

    function isTagSelected(val) {
        // If the item is already selected
        for (var child of inputContainer.children) {
            if (!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
                return true
            }
        }
        return false
    }

    function removeTag(val) {
        // Remove selected item
        for (var child of inputContainer.children) {
            if (!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
                inputContainer.removeChild(child)
            }
        }
    }

    function setValues(fireEvent = true) {
        // Update element final values
        selected_values = []
        for (var i = 0; i < options.length; i++) {
            element.options[i].selected = options[i].selected
            if (options[i].selected) {
                selected_values.push({
                    label: options[i].label,
                    value: options[i].value
                })
            }
        }
        if (fireEvent && customs.hasOwnProperty('onChange')) {
            customs.onChange(selected_values)
        }
    }

    function getOptions() {
        // Map element options
        return [...element.options].map((op) => {
            return {
                value: op.value,
                label: op.label,
                selected: op.selected,
            }
        })
    }
}


$(document).ready(function() {
    // Your existing code for form toggling and other actions
    $('.addTaskButton').click(function() {
        var projectSelect = $('[id^="projectSelect"]');
        projectSelect.each(function() {
            $(this).next().find('.item-container > svg').each(function() {
                this.dispatchEvent(new Event('click'));
            });
        });

        // Find the form within the same task column
        var form = $(this).closest('.task-column').find('form');

        // Toggle the form's visibility
        form.toggle(500);
    });

    // Handle form submission using AJAX for the Task form
    $('#task-Form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        handleFormSubmit($(this));
    });

    // Handle form submission using AJAX for the In Progress form
    $('#inprogress-Form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        handleFormSubmit($(this));
    });

    // Handle form submission using AJAX for the Completed form
    $('#completed-Form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        handleFormSubmit($(this));
    });

    function handleFormSubmit(form) {
        var formData = form.serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>/task", // URL to the CodeIgniter controller method
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Handle the response from the server
                if (response.success) {
                    // Create a new task item based on the form data
                    var employeeNames = {
                        <?php foreach ($employees as $value) { ?>
                        <?= $value['id'] ?>: '<?= $value['name'] ?>',
                        <?php } ?>
                    };

                    // When creating the new task item, get the employee names based on their IDs
                    var empIds = form.find('[name="emp_id[]"]').val();
                    var employeeNamesString = empIds.map(function(id) {
                        return employeeNames[id];
                    }).join(', ');
                    var projectNames = {
                        <?php foreach ($project as $value) { ?>
                        <?= $value['id'] ?>: '<?= $value['project_title'] ?>',
                        <?php } ?>
                    };
                    var selectedProjectId = form.find('[name="project_id"]').val();
                    var projectNm = projectNames[selectedProjectId];

                    var taskDeleteElement = document.createElement('img');
                    taskDeleteElement.className = 'delete';
                    taskDeleteElement.src = 'https://cdn.onlinewebfonts.com/svg/img_304350.png';
                    taskDeleteElement.alt = '';

                    taskDeleteElement.addEventListener('click', function(event) {
                        event.stopPropagation(); // Prevent the click event from propagating
                        delete_row(response.task.id);
                    });

                    var editTaskElement = document.createElement('a');
                    editTaskElement.href = '#';

                    var editImageElement = document.createElement('img');
                    editImageElement.src =
                        'http://freevector.co/wp-content/uploads/2012/01/61456-pencil-edit-button.png';
                    editImageElement.className = 'editTaskButton delete';
                    editImageElement.alt = '';

                    editTaskElement.appendChild(editImageElement);

                    var newTaskItem = document.createElement('li');
                    newTaskItem.id = `task2_${response.task.id}`;

                    var d_date = response.task.due_date;
                    var currentDate = new Date();
                    var dueDate = new Date(d_date);

                    currentDate.setHours(0, 0, 0, 0);
                    dueDate.setHours(0, 0, 0, 0);
                    var isDueDatePassed = dueDate < currentDate;

                    var dueDateClass = isDueDatePassed ? 'red-due-date' : '';
                    newTaskItem.innerHTML = '<span>' + projectNm + ' - ' + employeeNamesString +
                        '<span class="date ' + dueDateClass + '">' + d_date +
                        '</span></span><br/>' +
                        '<b>' + response.task.task_title + '</b>'
                    newTaskItem.appendChild(taskDeleteElement);
                    newTaskItem.appendChild(editTaskElement);

                    newTaskItem.addEventListener('click', function() {
                        document.getElementById("editContainer").style.display = "block";
                        editTaskOnClick(response.task.id);
                    });

                    // Append the new task item to the appropriate section based on status
                    var status = form.find('[name="status"]').val();
                    if (status === '0') {
                        $('#todo-list').prepend(
                            newTaskItem); // Use .prepend() to add the task to the top of the list
                    } else if (status === '1') {
                        $('#inprogress-list').prepend(
                            newTaskItem); // Use .prepend() to add the task to the top of the list
                    } else if (status === '2') {
                        $('#completed-list').prepend(
                            newTaskItem); // Use .prepend() to add the task to the top of the list
                    }

                    // Hide the form after adding the task
                    form.hide(500);
                    form.trigger('reset');

                    var employeeSelect = form.find('[id^="employeeSelect"]');
                    employeeSelect.next().find('.item-container > svg').each(function() {
                        this.dispatchEvent(new Event('click'));
                    });
                    location.reload();
                } else {
                    // Handle errors or display messages
                    console.log('Error: Task not added');
                }
            },
            error: function() {
                console.log('Error: AJAX request failed');
            }
        });
    }
});
</script>
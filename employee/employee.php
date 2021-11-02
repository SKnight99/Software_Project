<?php
$additionalReferences = '<link rel="stylesheet" href="css/modal.css">';
include "header.php";

if (isset($_POST["add_new_employee"])) {
    if($_POST["gender"] == 0)  $_POST["gender"] = "M";
    else if($_POST["gender"] == 1)  $_POST["gender"] = "F";

    if($_POST["position"] == 0) $_POST["position"] = "Employee";
    else if($_POST["position"] == 1) $_POST["position"] = "Employer";

    tep_query("
    INSERT INTO employees (
        firstName, lastName, gender, address, dob, username, pwd, position
    )
    VALUES (
        '" . $_POST["firstName"] . "', '" . $_POST["lastName"] . "', '" . $_POST["gender"] . "', '" . $_POST["address"] . "', '" . $_POST["dob"] . "', '" . $_POST["username"] . "', '" . md5($_POST["pwd"]) . "', '" . $_POST["position"] . "'
    )
    ");
    echo redirect("employee.php?add_new_employee=success");
}
?>


<a href="#add" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
<a href="#del" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Delete Employee</span></a>
<a href="#modify" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Modify Employee</span></a>

<!-- Add Employee Modal -->
<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div style="display: flex; flex-direction: column;">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstName" required>
                            <span class="errMsg nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <br>
                            <select name="gender" required>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pwd" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <br>
                            <select name="position" required>
                                <option value="0">Employee</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-default" name="add_new_employee" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Employee Modal -->
<div id="del" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <b class="get_email"></b>?</p>
                    <input type="hidden" id="customer_id_d" class="get_id">
                    <input type="hidden" id="customer_email_d" class="get_email">
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="go_del()" value="Delete">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modify Employee Modal -->
<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="display: flex; flex-direction: column;">
                <div class="modal-header">
                    <h4 class="modal-title">Modify Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="firstName" required>
                        <span class="errMsg nameErr"></span>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="lastName" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br>
                        <select id="gender" required>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" id="dob" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="pwd" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <br>
                        <select id="position" required>
                            <option value="0">Employee</option>
                            <option value="1">Manager</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-default" onclick="go_add_user()" value="Add">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
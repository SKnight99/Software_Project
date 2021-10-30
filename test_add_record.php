<?php
$additionalReferences = '<link rel="stylesheet" href="css/modal.css">';
include "header.php";
?>


<a href="#add" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
<a href="#del" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Delete Employee</span></a>
<a href="#modify" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Modify Employee</span></a>

<!-- Add Employee Modal -->
<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="display: flex; flex-direction: column;">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Employee</h4>
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

<!-- Delete Employee Modal -->


<!-- Modify Employee Modal -->


<?php include "footer.php"; ?>
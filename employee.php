<?php
$pageTitle = "Employee";
$additionalReferences = '
<link rel="stylesheet" href="css/modal.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
';
include "header.php";

if (isset($_POST["add_new_employee"])) {
    if ($_POST["gender"] == 0)  $_POST["gender"] = "M";
    else if ($_POST["gender"] == 1)  $_POST["gender"] = "F";

    if ($_POST["position"] == 0) $_POST["position"] = "Employee";
    else if ($_POST["position"] == 1) $_POST["position"] = "Manager";

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

if (isset($_POST["del_employee"])) {
    tep_query("DELETE FROM employees WHERE id = '" . $_POST["id"] . "'");
    echo redirect("employee.php?del_employee=success");
}

if (isset($_POST["modify_employee"])) {
    if ($_POST["gender"] == 0)  $_POST["gender"] = "M";
    else if ($_POST["gender"] == 1)  $_POST["gender"] = "F";

    if ($_POST["position"] == 0) $_POST["position"] = "Employee";
    else if ($_POST["position"] == 1) $_POST["position"] = "Manager";

    tep_query("UPDATE employees SET 
    firstName = '" . $_POST["firstName"] . "',
    lastName = '" . $_POST["lastName"] . "',
    gender = '" . $_POST["gender"] . "',
    address= '" . $_POST["address"] . "',
    dob = '" . $_POST["dob"] . "',
    position = '" . $_POST["position"] . "'
    WHERE id = '" . $_POST["id"] . "'
    ");
    echo redirect("employee.php?modify_employee=success");
}
?>

<div id="content__header">
    <span class="title">
        Employee Management
    </span>
    <button class="btn btn-info" style="margin-right: 55px;"><a href="#add" class="text-light" data-toggle="modal"><span>Add Employee</span></a></button>
</div>

<div id="content">


    <table class="table">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Address</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Position</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cnt = 0;
            $qryRow = tep_query("SELECT * FROM employees ORDER BY id DESC");
            while ($infoRow = tep_fetch_object($qryRow)) {
                $cnt++;
                $id = $infoRow->id;
                $firstName = $infoRow->firstName;
                $lastName = $infoRow->lastName;
                $gender = $infoRow->gender;
                $address = $infoRow->address;
                $dob = $infoRow->dob;
                $position = $infoRow->position;

                echo '
                <tr>
                <td scope="rol">' . $firstName . '</td>
                <td>' . $lastName . '</td>
                <td>' . $gender . '</td>
                <td>' . $address . '</td>
                <td>' . $dob . '</td>
                <td>' . $position . '</td>

                <td>
                <button class="btn btn-info">
                <a href="#modify" class="text-light get_edit" data-toggle="modal"
                data-id="' . $id . '"
                data-firstName="' . $firstName . '"
                data-lastName="' . $lastName . '"
                data-gender="' . $gender . '"
                data-address="' . $address . '"
                data-dob="' . $dob . '"
                data-position="' . $position . '"
                >
                <i class="material-icons" data-toggle="tooltip" title="Edit"></i>
                Edit
                </a>
                </button>

                <button class="btn btn-danger">
                <a href="#del" class="text-light get_del" data-toggle="modal"
                data-id="' . $id . '"
                >
                <i class="material-icons" data-toggle="tooltip" title="Delete"></i>
                Delete
                </a>
                </button>

                </td>
                
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>

</div>

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
                            <label>Position</label>
                            <br>
                            <select name="position" required>
                                <option value="0">Employee</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="add_new_employee" value="Add">
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
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this record?</p>
                        <input type="hidden" class="get_id" name="id">

                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="del_employee" value="Delete">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modify Employee Modal -->
<div id="modify" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div style="display: flex; flex-direction: column;">
                    <div class="modal-header">
                        <h4 class="modal-title">Modify Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="get_id" name="id">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control get_firstName" name="firstName" required>
                            <span class="errMsg nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control get_lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <br>
                            <select name="gender" class="get_gender" required>
                                <option value="">--- Select ---</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control get_address" name="address" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control get_dob" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <br>
                            <select name="position" class="get_position" required>
                                <option value="">--- Select ---</option>
                                <option value="0">Employee</option>
                                <option value="1">Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="modify_employee" value="Modify">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '.get_edit', function(e) {
            var get_id = $(this).attr("data-id");
            var get_firstName = $(this).attr("data-firstName");
            var get_lastName = $(this).attr("data-lastName");
            var get_gender = $(this).attr("data-gender");
            var get_address = $(this).attr("data-address");
            var get_dob = $(this).attr("data-dob");
            var get_position = $(this).attr("data-position");

            if (get_gender == 'M') get_gender = 0;
            else if (get_gender == 'F') get_gender = 1;

            if (get_position == "Employee") get_position = 0;
            else if (get_position == "Manager") get_position = 1;

            $(".get_id").val(get_id);
            $(".get_firstName").val(get_firstName);
            $(".get_lastName").val(get_lastName);
            $(".get_gender").val(get_gender);
            $(".get_address").val(get_address);
            $(".get_dob").val(get_dob);
            $(".get_position").val(get_position);

        });
    });

    $(document).ready(function() {
        $(document).on('click', '.get_del', function(e) {
            var get_id = $(this).attr("data-id");
            $(".get_id").val(get_id);
        });
    });
</script>

<?php include "footer.php"; ?>
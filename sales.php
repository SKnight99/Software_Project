<?php
$pageTitle = "Sales Management";
$additionalReferences = '
<link rel="stylesheet" href="css/modal.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
';
include "header.php";

if (isset($_POST["add_new_sales"])) {
    $infoRow = tep_fetch_object(tep_query("SELECT * FROM product WHERE ProductID = '" . $_POST["productName"] . "'"));
    $totalSales = $_POST["quantity"] * $infoRow->Price;

    tep_query("
    INSERT INTO sales (
        ProductName, InvoiceNo, InvoiceDate, Quantity, TotalSales
    )
    VALUES (
        '" . $_POST["productName"] . "', '" . $_POST["invoiceNo"] . "', '" . $_POST["invoiceDate"] . "', '" . $_POST["quantity"] . "', '" . $totalSales . "'
    )
    ");

    tep_query("
    UPDATE product
    SET Quantity = Quantity - '" . $_POST["quantity"] . "'
    WHERE ProductID = '" . $_POST["productName"] . "'
    ");
    echo redirect("sales.php?add_new_sales=success");
}

if (isset($_POST["del_sales"])) {
    tep_query("DELETE FROM sales WHERE SalesID = '" . $_POST["id"] . "'");
    echo redirect("sales.php?del_sales=success");
}

if (isset($_POST["modify_sales"])) {
    tep_query("UPDATE sales SET 
    ProductName = '" . $_POST["productName"] . "',
    InvoiceDate = '" . $_POST["invoiceDate"] . "',
    InvoiceNo = '" . $_POST["invoiceNo"] . "',
    Quantity = '" . $_POST["quantity"] . "'
    WHERE id = '" . $_POST["id"] . "'
    ");
    echo redirect("sales.php?modify_sales=success");
}
?>

<div id="content__header">
    <span class="title">
        Sales Management
    </span>
    <button class="btn btn-info" style="margin-right: 55px;"><a href="#add" class="text-light" data-toggle="modal"><span>Add Sales</span></a></button>
</div>

<div id="content">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Invoice Date</th>
                <th scope="col">Invoice Number</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Sales</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cnt = 0;
            $qryRow = tep_query("SELECT * FROM sales ORDER BY salesID DESC");
            while ($infoRow = tep_fetch_object($qryRow)) {
                $cnt++;
                $id = $infoRow->SalesID;
                $productName = $infoRow->ProductName;
                $invoiceDate = $infoRow->InvoiceDate;
                $invoiceNo = $infoRow->InvoiceNo;
                $quantity = $infoRow->Quantity;
                $totalSales = $infoRow->TotalSales;

                $product = tep_fetch_object(tep_query("SELECT * FROM product WHERE ProductID = '" . $productName . "'"));
                $productName = $product->ProductName;

                echo '
                <tr>
                <td scope="rol">' . $id . '</td>
                <td>' . $productName . '</td>
                <td>' . $invoiceDate . '</td>
                <td>' . $invoiceNo . '</td>
                <td>' . $quantity . '</td>
                <td>' . $totalSales . '</td>

                <td>
                <button class="btn btn-info">
                <a href="#modify" class="text-light get_edit" data-toggle="modal"
                data-id="' . $id . '"
                data-productName="' . $productName . '"
                data-invoiceDate="' . $invoiceDate . '"
                data-invoiceNo="' . $invoiceNo . '"
                data-quantity="' . $quantity . '"
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

<!-- Add Sales Modal -->
<div id="add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div style="display: flex; flex-direction: column;">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Sales</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <br>
                            <select name="productName" required>
                                <?php
                                $qryRow = tep_query("SELECT * FROM product ORDER BY ProductName");
                                while ($infoRow = tep_fetch_object($qryRow)) {
                                    echo '
                                    <option value=' . $infoRow->ProductID . '>' . $infoRow->ProductName . '</option>
                                    ';
                                }
                                ?>
                            </select>
                            <span class="errMsg nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Invoice Number</label>
                            <input type="text" class="form-control" name="invoiceNo" required>
                        </div>
                        <div class="form-group">
                            <label>Invoice Date</label>
                            <input type="date" class="form-control" name="invoiceDate" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="quantity" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="add_new_sales" value="Add">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Sales Modal -->
<div id="del" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Sales</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this record?</p>
                        <input type="hidden" class="get_id" name="id">

                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="del_sales" value="Delete">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modify Sales Modal -->
<div id="modify" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div style="display: flex; flex-direction: column;">
                    <div class="modal-header">
                        <h4 class="modal-title">Modify Sales</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="get_id" name="id">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control get_productName" name="productName" required>
                            <span class="errMsg nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label>Invoice Date</label>
                            <input type="date" class="form-control get_invoiceDate" name="invoiceDate" required>
                        </div>
                        <div class="form-group">
                            <label>Invoice Number</label>
                            <input type="text" class="form-control get_invoiceNo" name="invoiceNo" required>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control get_quantity" name="quantity" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-success" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" name="modify_sales" value="Modify">
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
            var get_productName = $(this).attr("data-productName");
            var get_invoiceDate = $(this).attr("data-invoiceDate");
            var get_invoiceNo = $(this).attr("data-invoiceNo");
            var get_quantity = $(this).attr("data-quantity");
            var get_totalSales = $(this).attr("data-totalSales");

            $(".get_id").val(get_id);
            $(".get_productName").val(get_productName);
            $(".get_invoiceDate").val(get_invoiceDate);
            $(".get_invoiceNo").val(get_invoiceNo);
            $(".get_quantity").val(get_quantity);
            $(".get_totalSales").val(get_totalSales);
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
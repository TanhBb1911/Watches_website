<script>
    function addcat() {
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        f = document.addbrand

        if (format.test(f.txtID.value)) {
            alert("Category ID invalid, please enter again");
            return false;
        }
        if (f.txtID.value == "" || f.txtName.value == "" || f.txtDes.value == "") {
            alert("Enter fileds with marks(*), please");
            return false;
        }
        if (format.test(f.txtName.value)) {
            alert("Category name can't contain special character, please enter again");
            f.txtName.focus();
            return false;
        }
        return true;
    }
</script>
<?php
include_once("connection.php");
if (isset($_POST["btnAdd"])) {
    $id = $_POST["txtID"];
    $name = $_POST["txtName"];
    $des = $_POST["txtDes"];
    $err = "";
    if ($id == "") {
        $err .= "<li> Enter Brand ID, Please</li>";
    }
    if ($name == "") {
        $err .= "<li> Enter Brand Name, Please</li>";
    }
    if ($err != "") {
        echo "<ul>$err</ul>";
    } else {
        $sq = "SELECT * FROM category WHERE Cat_ID='$id' or Cat_Name='$name'";
        $result = mysqli_query($conn, $sq);
        if (mysqli_num_rows($result) == 0) {
            mysqli_query($conn, "INSERT INTO category (Cat_ID, Cat_Name, Cat_Des) VALUE ('$id','$name','$des')");
            echo "<script>alert('Add successfully')</script>";
            echo '<meta http-equiv= "refresh" content="0;URL=?page=management"/>';
        } else {
            echo "<li> Duplicate Brand ID or Name</li>";
        }
    }
}
?>

<div class="container">
    <h2>Adding Category</h2>
    <form id="addbrand" name="addbrand" method="post" action="" class="form-horizontal" role="form" onsubmit="return addcat()">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Category ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
            </div>
        </div>

        <div class="form-group">
            <label for="txtMoTa" class="col-sm-2 control-label">Description(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"]) ? ($_POST["txtDes"]) : ""; ?>'>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='add_category.php'" />

            </div>
        </div>
    </form>
</div>
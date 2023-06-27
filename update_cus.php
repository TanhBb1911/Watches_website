
<?php
//Get custmer information
include_once("connection.php");
$query = "SELECT CusName, Address, email, telephone FROM customer
        WHERE Username='" . $_SESSION["us"] . "'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$us = $_SESSION["us"];
$email = $row["email"];
$fullname = $row["CusName"];
$address = $row["Address"];
$telephone  = $row["telephone"];

//Update information when the user presses the "Update" button
if (isset($_POST['btnUpdate'])) {
    $crupass = $_POST["txtcurpas"];
    $passnew = $_POST["txtPass1"];
    $repass = $_POST['txtPass2'];
    $name = $_POST["txtFullname"];
    $phone = $_POST["txtTel"];
    $address = $_POST["txtAddress"];

    if ($crupass != "") {
        if ($passnew == "" || $repass == "") {
            echo "<script>alert('New password and confirm passwrod can not be blank!')</script>";
        } elseif ($passnew == $repass) {
            $sql = "SELECT Password FROM customer WHERE Username = '" . $_SESSION["us"] . "'";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $rows = mysqli_fetch_array($res, MYSQLI_ASSOC);
            $oldpass = $rows["Password"];
            $tempPass = md5($crupass);

            if ($oldpass == $tempPass) {
                $pa = md5($passnew);
                $sq = "UPDATE customer
                SET Password = '$pa',
                    Cusname = '$name',
                    telephone= '$phone',
                    Address = '$address'
                WHERE Username ='" . $_SESSION['us'] . "'";
                mysqli_query($conn, $sq) or die(mysqli_error($conn));
                echo "<script>alert('Updating successfully!')</script>";

                echo '<meta http-equiv="refresh" content="5;URL=index.php"';
            } else {
                echo "<script>alert('Current password incorrect!')</script>";
            }
        } else {
            echo "<script>alert('New password and confirm password is incorrect!')</script>";
        }
    } else {
        $sq = "UPDATE customer
                    SET Cusname = '$name',
                        Address = '$address'telephone = '$phone',
            WHERE Username ='" . $_SESSION['us'] . "'";
        mysqli_query($conn, $sq) or die(mysqli_error($conn));
        echo "<script>alert('Updating successfully!')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"';
    }
}
?>
<div class="container">

    <h2>Update Profile</h2>

    <form id="cusin" name="cusin" method="POST" action="" class="form-horizontal" role="form" onsubmit="return Check()">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Username(*): </label>
            <div class="col-sm-10">
                <label class="form-control" style="font-weight:400"><?php echo $_SESSION['us'] ?></label>
            </div>
        </div>

        <div class="form-group">
            <label for="lbpass1" class="col-sm-2 control-label">Old Password(*): </label>
            <div class="col-sm-10">
                <input type="password" name="txtcurpas" id="txtcurpas" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="lbpass1" class="col-sm-2 control-label">Password(*): </label>
            <div class="col-sm-10">
                <input type="password" name="txtPass1" id="txtPass1" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="lbpass2" class="col-sm-2 control-label">Confirm Password(*): </label>
            <div class="col-sm-10">
                <input type="password" name="txtPass2" id="txtPass2" class="form-control" />
            </div>
        </div>

        <div class="form-group">
            <label for="lblHoten" class="col-sm-2 control-label">Full name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtFullname" id="txtFullname" value="<?php echo $fullname; ?>" class="form-control" placeholder="Enter Fullname, please" />
            </div>
        </div>
        <div class="form-group">
            <label for="lblEmail" class="col-sm-2 control-label">Email(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $email; ?>" class="form-control" placeholder="Enter Email, please" />
            </div>
        </div>
        <div class="form-group">
            <label for="lblDiaChi" class="col-sm-2 control-label">Address(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $address ?>" class="form-control" placeholder="Enter Address, please" />
            </div>
        </div>

        <div class="form-group">
            <label for="lblDienThoai" class="col-sm-2 control-label">Telephone(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtTel" id="txtTel" value="<?php echo $telephone ?>" class="form-control" placeholder="Enter Telephone, please" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" />

            </div>
        </div>
    </form>
</div>
\
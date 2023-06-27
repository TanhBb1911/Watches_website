<?php
if (isset($_SESSION['us']) == false) {
    echo "<script>alert('You must be LOG-IN')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
} else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
        echo "<script>alert('You are not administrator')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=Index.php"/>';
    } else {

?>
        <script>
            function deleteConfirm() {
                if (confirm("Are you sure to delete!")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        <?php
        include_once("connection.php");
        if (isset($_GET["function"]) == "del") {
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                mysqli_query($conn, "DELETE FROM category WHERE Cat_ID='$id'");
                
            }
        }
        ?>

        <form name="frm" method="post" action="">
            <div class="container">
                <h1 class="text-center"> Brands Management</h1>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <h2>Management</h2>
                            <div class="list-group list-group-flush">
                                <a href="?page=management" class="list-group-item list-group-item-action py-2">CATEGORY</a>
                                <a href="?page=managementpro" class="list-group-item list-group-item-action py-2">PRODUCT</a>
                            </div>
                            <hr class="d-sm-none">

                        </div>
                        <div class="col-sm-9">
                            <p>
                                <img src="Image/add.png" alt="Add new" width="16" height="16" border="0" />
                                <a href="?page=addcategory"> Add</a>
                            </p>
                            <table id="tablecategory" class="table table-striped table-bordered" width="100">
                                <thead>
                                    <tr>
                                        <th><strong>No.</strong></th>
                                        <th><strong>Brands</strong></th>
                                        <th><strong>Description</strong></th>
                                        <th><strong>Edit</strong></th>
                                        <th><strong>Delete</strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include_once("connection.php");
                                    $No = 1;
                                    $result = mysqli_query($conn, "SELECT * FROM category");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $No; ?></td>
                                            <td><?php echo $row["Cat_Name"]; ?></td>
                                            <td><?php echo $row["Cat_Des"]; ?></td>
                                            <td style='text-align:center'>
                                                <a href="?page=updatecategory&&id=<?php echo $row["Cat_ID"]; ?>">
                                                    <img src="Image/edit.png" border='0'></a>
                                            </td>
                                            <td style='text-align:center'>
                                                <a href="?page=management&&function=del&&id=<?php echo $row["Cat_ID"]; ?>" onclick="return deleteConfirm()">
                                                    <img src='Image/delete.png' border='0' /></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $No++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </form>
<?php }
} ?>
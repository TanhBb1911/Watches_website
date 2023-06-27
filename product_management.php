<?php
if (isset($_SESSION['us']) == false) {
    echo "<script>alert('You must be LOG-IN')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
} else {
    if (isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
        echo "<script>alert('You are not administrator')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
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
                $sq = "SELECT Pro_image FROM product WHERE Product_ID='$id'";
                $res = mysqli_query($conn, $sq);
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $filePic = $row['Pro_image'];
                unlink("Image/" . $filePic);
                mysqli_query($conn, "DELETE FROM product WHERE Product_ID='$id'");
            }
        } else {
            '<meta http-equiv="refresh" content="0;URL=?page=managementpro"/>';
        }
        ?>


        <div class="container">
            <h1 class="text-center"> Products Management</h1>
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
                            <a href="?page=addproduct"> Add</a>
                        </p>
                        <form name="frm" method="post" action="">
                            <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><strong>No.</strong></th>
                                        <th><strong>Product ID</strong></th>
                                        <th><strong>Product Name</strong></th>
                                        <th><strong>Price</strong></th>
                                        <th><strong>Quantity</strong></th>
                                        <th><strong>Category ID</strong></th>
                                        <th><strong>Image</strong></th>
                                        <th><strong>Edit</strong></th>
                                        <th><strong>Delete</strong></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include_once("connection.php");
                                    $No = 1;
                                    $result = mysqli_query($conn, "SELECT * FROM product p, category c WHERE p.Cat_ID = c.Cat_ID");
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $No; ?></td>
                                            <td><?php echo $row["Product_ID"]; ?></td>
                                            <td><?php echo $row["Product_Name"]; ?></td>
                                            <td><?php echo $row["Price"]; ?></td>
                                            <td><?php echo $row["Pro_qty"]; ?></td>
                                            <td><?php echo $row["Cat_Name"]; ?></td>
                                            <td>
                                                <img src="Image/<?php echo $row["Pro_image"]; ?>" border=0 height="50" width="50" alt="">
                                            </td>

                                            <td style='text-align:center'> <a href="?page=updateproduct&&id=<?php echo $row['Product_ID']; ?>">
                                                    <img src='Image/edit.png' border='0' /></a></td>
                                            <td style='text-align:center'>
                                                <a href="?page=managementpro&&function=del&&id=<?php echo $row["Product_ID"]; ?>" onclick="return deleteConfirm()">
                                                    <img src='Image/delete.png' border='0' /></a>
                                            </td>
                                        </tr>

                                    <?php
                                        $No++;
                                    }
                                    ?>
                                </tbody>

                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>
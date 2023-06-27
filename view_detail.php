<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<?php
include_once("connection.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sq = "SELECT * FROM product WHERE Product_ID='$id'";
    $res = mysqli_query($conn, $sq);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC)

?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-6 py-5">
                <div class="white-box text-center">
                    <img src="Image/<?php echo $row['Pro_image'] ?>" width="320" height="500" style="border-radius: 15px;">
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-6 text-center">
                <h2 class="box-title mt-5 class=" mb-3 id="home"><span> WACTH DESCRIPTION</span> </h2>
                <div class="white-box text-center">
                    <h4>Name: &nbsp;<?php echo $row['Product_Name'] ?></h4>
                    <h4>Price:&nbsp;<?php echo $row['Price'] ?></h4>
                </div>
                <div class="white-box text-center">
                    <?php echo $row['DetailDesc'] ?>
                </div>
                <div>
                    <form action="?page=cart" method="POST">
                        <input type="hidden" name="Qty" value="1">
                        <input class="btn btn-primary btn-rounded" type="submit" name=" AddCart" value="Add To Cart">
                        <input type="hidden" name="ProName" value="<?php echo $row['Product_Name'] ?>">
                        <input type="hidden" name="Short" value="<?php echo $row['SmallDesc'] ?>">
                        <input type="hidden" name="Price" value="<?php echo $row['Price'] ?>">
                        <input type="hidden" name="Img" value="<?php echo $row['Pro_image'] ?>">
                    </form>

                    <br>
                    <form method="POST">
                        <button type="submit" name="btnBuyNow" class="btn btn-primary btn-rounded">Buy Now</button>
                    </form>
                    <?php
                        if(isset($_POST['btnBuyNow']))
                        {
                            echo "<script>alert('Buying successfully!')</script>";
                        }
                    ?>
                </div>
                <div class="pt-5">
                    <h6 class="mb-0"><a href="?page=content" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                </div>

            <?php
        }
            ?>
            </div>
        </div>
    </div>
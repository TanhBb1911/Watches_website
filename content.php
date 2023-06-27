<form name="frm" method="post" action="">
  <div class="container">
    <h1 class="text-center"></h1>
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-2">
          <h2>Type</h2>
          <div class="list-group list-group-flush">
            <a href="?page=content" class="list-group-item list-group-item-action py-2">All</a>
            <a href="?page=search&&gender=Men" class="list-group-item list-group-item-action py-2">Men</a>
            <a href="?page=search&&gender=Women" class="list-group-item list-group-item-action py-2">Women</a>
          </div>
          <h2>Brands</h2>
          <div class="list-group list-group-flush">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM category ");
            if (!$result) {
              echo "$err";
            }
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            ?>
              <a href="?page=search&&id=<?php echo $row['Cat_ID'] ?>" class="list-group-item list-group-item-action py-2"><?php echo $row['Cat_Name'] ?></a>
            <?php } ?>
          </div>
          <hr class="d-sm-none">
        </div>
        <div class="col-sm-10">
          <div class="row">
            <?php
            include_once("connection.php");
            $result = mysqli_query($conn, "SELECT Product_ID, Cat_Name, Product_Name, Price,  SmallDesc, Pro_image 
            FROM category c, product p WHERE c.Cat_ID = p.Cat_ID");
            if (!$result) {
              echo "$err";
            }
            $no = 1;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              if ($no <= 21) {
            ?>
                <div class="col-sm-4 mt-5">
                  <div class='container-fluid'>
                    <div class="col-sm-3 mb-5">
                      <div class="card mx-5 mt-1 " style="border-radius: 25px;">
                        <img src="Image/<?php echo $row['Pro_image'] ?>" width="250px" height="350px" style="border-radius: 25px;">
                        <div class="card-body text-center mx-auto">
                          <div class='cvp'>
                            <h4 class="card-title font-weight-bold"><?php echo $row['Product_Name'] ?></h4>
                            <p class="card-text"><?php echo $row['Price'] ?>$</p>
                            <a href="?page=viewdetail&&id=<?php echo $row['Product_ID']; ?>" class="btn details px-auto">view details</a><br />
                            <form action="?page=cart" method="POST">
                              <input type="hidden" name="Qty" value="1">
                              <input class="btn cart px-auto" type="submit" name="AddCart" value="Add To Cart">
                              <input type="hidden" name="ProName" value="<?php echo $row['Product_Name'] ?>">
                              <input type="hidden" name="CateName" value="<?php echo $row['Cat_Name'] ?>">
                              <input type="hidden" name="Short" value="<?php echo $row['SmallDesc'] ?>">
                              <input type="hidden" name="Price" value="<?php echo $row['Price'] ?>">
                              <input type="hidden" name="Img" value="<?php echo $row['Pro_image'] ?>">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
                $no++;
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
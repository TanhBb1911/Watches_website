<div class="container-fluid">
  <header>
    <!-- Background image -->
    <div class="p-5 text-center bg-image" style="
      background-image: url(Image/home.jpg);
      height: 800px; background-size: 100% 130%;">
      <div class="mask mt-5 m-5 p-5" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class=" mt-5 d-flex justify-content-center align-items-center h-100">
          <div class="text-white">
            <h2 class="mb-3">WELLCOME TO</h2>
            <h1 class="mb-3" id="home"><span>BB CENTER</span></h1>
            <h4 class="mb-3">Jewellery isn't really my thing, but I've always got my eye on people's watches.</h4>
            <a class="btn btn-outline-light btn-lg" href="?page=content" role="button">SHOP NOW</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>

  <br>

  <!--Brands-->
  <section id="brand" class="container-fluid">
    <div class="row">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/brand1.png" alt="brand1">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra2.png" alt="brand2">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra3.png" alt="brand3">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra4.png" alt="brand4">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra5.png" alt="brand5">
      <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra6.png" alt="brand6">
    </div>
  </section>
  <br>
  <!--NEW-->
  <section id="new" class="container-fluid w-100 ">
    <div class="row p-0 m-0">
      <div class="one col-lg-4 col-md-12 col-12 p-0">
        <img class="img-fluid" src="Image/new1.jpg" alt="">
        <div class="details">
          <h3>New Product</h3>
          <a href="?page=content"><button class="text-uppercase"> Shop Now</button></a>
        </div>
      </div>
      <div class="one col-lg-4 col-md-12 col-12 p-0">
        <img class="img-fluid" src="Image/new2.png " alt="">
        <div class="details">
          <h3>Trending</h3>
          <a href="?page=content"><button class="text-uppercase"> Shop Now</button></a>
        </div>
      </div>
      <div class="one col-lg-4 col-md-12 col-12 p-0">
        <img class="img-fluid" src="Image/new3.png" alt="">
        <div class="details">
          <h3>Best Saller</h3>
          <a href="?page=content"><button class="text-uppercase"> Shop Now</button></a>
        </div>
      </div>
    </div>
  </section>

  <!--Poppular products-->
  <section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
      <h5>The Limited Edition Watch</h5>
      <hr>
      <p><b>Here you can check out our new products with fair price on Bb Center</b></p>
    </div>
    <div class="row mx-auto container-fluid">
      <?php
      include_once("connection.php");
      $result = mysqli_query($conn, "SELECT Product_ID, Product_Name, Cat_Name, Price, Pro_image 
            FROM category c, product p WHERE c.Cat_ID = p.Cat_ID");
      if (!$result) {
        echo "$err";
      }
      $no = 1;
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($no <= 4) {
      ?>
          <div class="product text-center col-lg-3 col-md-4 col-12">
            <img class="img-fluid mb-3" src="Image/<?php echo $row['Pro_image'] ?>" height="450" width="300">
            <div class="star">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <b>
              <h8 class="p-name"><?php echo $row['Product_Name'] ?>
            </b></h8><br>
            <h7 class="p-price"><?php echo $row['Price'] ?>$</h7><br>
            <div>
              <a href="?page=viewdetail&&id=<?php echo $row['Product_ID'] ?>"> <button class="buy-btn">View Details</button></a>
            </div>

          </div>
      <?php
          $no++;
        }
      }
      ?>
    </div>
  </section>



  <!--Boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  </body>
</div>
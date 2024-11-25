<?php 
include("header.php");
if (isset($_GET['u_id'])) {
    $p_id = $_GET['u_id'];

    $select = "SELECT p.id, p.Product_name, p.Product_price, p.Product_img, p.Product_description, p.Product_stock, p.Product_flavour, p.Catagory_id, c.Catagory_name
               FROM `products` p
               INNER JOIN `catagory` c ON p.Catagory_id = c.Catagory_id
               WHERE p.id = '$p_id'";

    $query = mysqli_query($connect, $select);
    $fetch = mysqli_fetch_assoc($query);
}
?>

<div class="container py-5 rounded-5">
    <div class="row justify-content-center bg-white shadow-lg rounded-5">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-4 mb-md-0">
            <div class="card border-0 rounded">
                <img src="../Admin/product_images/<?php echo $fetch['Product_img'] ?>" alt="Product Image" class="mx-auto card-img-top rounded-0 img-fluid" style="max-width: 60%; height: auto;" />
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card border-0 rounded p-4">
                <div class="card-body">
                  
                    <h1 class="card-title display-4 text-dark font-weight-bold"><?php echo $fetch['Product_name'] ?></h1>
                  
                    <h5 class="text-muted"><?php echo $fetch['Catagory_name'] ?></h5>
                   
                    <p class="card-text text-muted mt-3"><?php echo $fetch['Product_description'] ?></p>

                    <p style="color: rgb(255,196,63)" class="h3 mt-3">Rs <?php echo $fetch['Product_price'] ?></p>
                  
                    <p class="text-success mt-3"><strong>In Stock: </strong><?php echo $fetch['Product_stock'] ?> items</p>
                   
                    <a style="background-color: rgb(255,196,63); color: white " href="#" class="btn btn-danger btn-lg mt-4 ">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include("footer.php");
?>

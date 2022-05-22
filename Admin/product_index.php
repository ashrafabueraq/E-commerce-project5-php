
<?php
include "security.php";

include "include/connect.php";
include "include/navbar.php";

$satement = $conn->prepare('SELECT * FROM `product` ORDER BY product_id DESC');
$satement->execute();
$products = $satement->fetchAll(PDO::FETCH_ASSOC);

?>



<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add product Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <div class="form-group">
              <label for="product_name" >
                  product Name
                  <input type="text" name="product_name" class="form-control" placeholder = "Product name">
              </label>
          </div>
          <div class="form-group">
              <label for="product_name" >
                  product price
                  <input type="text" name="product_price" class="form-control" placeholder = "Product Price">
              </label>
          </div>
          <div class="form-group">

                  <input type="file" class="form-control-file" id="customFile" name="image">

          </div>
          <div class="form-group">
                    <?php
                        $sql = "SELECT * FROM `subcategory`";

                        $sta = $conn->prepare($sql);
                        $sta->execute();
                        $publish = $sta->fetchAll();

                        ?>

                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> Subcategory</label>
                            </div>
                            <select name="subcategoryid" class="custom-select" id="subcategoryid">
                                <option selected value="no">Choose...</option>
                                    <?php foreach ($publish as $value): ?>
                                <option value="<?php echo $value['subcategory_id']; ?>"><?php echo $value['subcategory_name']; ?></option>
                                    <?php endforeach?>

                            </select>
                          </div>


                </div>
          <div class="form-group">
              <label for="Discription">
                 Discription
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_des" ></textarea>
              </label>
          </div>

      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal" href="register.php">Cancel</a>
        <button type="submit" class="btn btn-primary" name="add_product">add</button>
      </div>
    </form>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Product List</h5>
        <button type ="button" class="btn btn-primary"  data-toggle="modal" data-target="#addadminprofile">
                Add Product
            </button >
    </div>
    <div class="card-body">
           <?php
if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
    echo "<div class='alert alert-primary' role='alert'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo "<div class='alert alert-warning' role='alert'>" . $_SESSION['status'] . "</div>";
    unset($_SESSION['status']);
}
?>
        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Discription</th>
                        <th>Sub-category id</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $i => $product): ?>

                                <tr>
                                    <th ><?php echo $i + 1; ?></th>
                                    <td><?php echo "<img src=" . $product["product_img"] . " width=100px height=100px>" ?></td>
                                    <td><?php echo $product["product_name"] ?></td>
                                    <td><?php echo $product["product_des"] ?></td>
                                    <td><?php echo $product["product_price"] ?></td>
                                    <td><?php echo $product["sub_category_id"] ?></td>
                                    <td>

                                        <form action="product_update.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="edit_id" value="<?php echo $product['product_id']; ?>">
                                            <button type="submit" class="btn btn-success" name="edit_product">Edit</button>
                                        </form>
                                    </td>
                                    <td>

                                      <form action="product_delete.php" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="id" value="<?php echo $product['product_id'] ?>">
                                      <button type="submit" name="delete_product" class="btn btn-danger" >Delete</button>
                                       </td>
                                       </form>


                                </tr>
                    <?php endforeach;?>

                </tbody>
            </table>
        </div>
</div>

</div>

</div>
</div>
<?php
include "include/footer.php";
include "include/scripts.php";

?>
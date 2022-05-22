<?php
include "security.php";

include_once "include/connect.php";
include_once "include/navbar.php";
$id = $_POST['edit_id'];

if (isset($_POST['edit_product'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `product` WHERE `product_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);

}
?>

<div class="container-fluid">
  <div class="card shadow mb-9">
    <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Edit product</h5>

    </div>
<div class="card-body">

          <div class="modal-body">
    <form action="code.php?id=<?php echo $_POST["edit_id"] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                <div class="form-group">
                    <label for="product_name" >
                        Product Name
                        <input type="text" name="product_name" class="form-control" placeholder = "product name" value="<?php echo $info['product_name'] ?>">
                    </label>
                </div>
                <div class="form-group">
                    <label for="product_name" >
                        Product Price
                        <input type="text" name="product_price" class="form-control" placeholder = "product price" value="<?php echo $info['product_price'] ?>">
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
                                <label class="input-group-text" for="inputGroupSelect01"> subcategory</label>
                            </div>
                            <select class="custom-select" name="subcategoryid">
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
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="product_des" ><?php echo $info['product_des'] ?></textarea>
                    </label>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal" href="subcat_index.php">Cancel</a>
                <button type="submit" class="btn btn-success" name="edit_product">update</button>
     </form>


                        </div>
                    </div>
                </div>
</div>

<?php
include_once "include/scripts.php";
include_once "include/footer.php";

?>
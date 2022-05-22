<?php
include "security.php";

include_once "include/connect.php";
include_once "include/navbar.php";
$id = $_POST['edit_id'];

if (isset($_POST['edit_subcat'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `subcategory` WHERE `subcategory_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);

}
?>

<div class="container-fluid">
  <div class="card shadow mb-9">
    <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Edit Sub-category</h5>

    </div>
<div class="card-body">

          <div class="modal-body">
    <form action="code.php?id=<?php echo $_POST["edit_id"] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                <div class="form-group">
                    <label for="subcategory_name" >
                        subcategory Name
                        <input type="text" name="subcategory_name" class="form-control" placeholder = "Subcategory name" value="<?php echo $info['subcategory_name'] ?>">
                    </label>
                </div>
                <div class="form-group">

                        <input type="file" class="form-control-file" id="customFile" name="image">

                </div>
                <div class="form-group">

                       <?php
                        $sql = "SELECT * FROM `category`";

                        $sta = $conn->prepare($sql);
                        $sta->execute();
                        $publish = $sta->fetchAll();

                        ?>

                         <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> category</label>
                            </div>
                            <select class="custom-select" name="categoryid">
                                <option selected value="no">Choose...</option>
                                    <?php foreach ($publish as $value): ?>
                                <option value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
                                    <?php endforeach?>

                            </select>
                          </div>


                </div>
                <div class="form-group">
                    <label for="Discription">
                        Discription
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subcategory_des" >
                            <?php echo $info['subcategory_des'] ?>
                        </textarea>
                    </label>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal" href="subcat_index.php">Cancel</a>
                <button type="submit" class="btn btn-success" name="edit_subcategory">update</button>
     </form>


                        </div>
                    </div>
                </div>
</div>

<?php
include_once "include/scripts.php";
include_once "include/footer.php";

?>
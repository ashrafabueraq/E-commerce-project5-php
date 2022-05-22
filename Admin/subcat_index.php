
<?php
include "security.php";

include "include/connect.php";
include "include/navbar.php";

$satement = $conn->prepare('SELECT * FROM `subcategory` ORDER BY subcategory_id DESC');
$satement->execute();
$sub_categories = $satement->fetchAll(PDO::FETCH_ASSOC);

?>



<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sub-category Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

          <div class="form-group">
              <label for="category_name" >
                  Sub-Category Name
                  <input type="text" name="subcategory_name" class="form-control" placeholder = "Subcategory name">
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
                            <select name="categoryid" class="custom-select" id="categoryid">
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
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subcategory_des" ></textarea>
              </label>
          </div>

      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal" href="subcat_index.php">Cancel</a>
        <button type="submit" class="btn btn-primary" name="add_subcategory">add</button>
      </div>
    </form>
   </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-9">
                        <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Sub-categories</h5>
        <button type ="button" class="btn btn-primary"  data-toggle="modal" data-target="#addadminprofile">
                Add Sub-category
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
                        <th>name</th>
                        <th>image</th>
                        <th>Discription</th>
                        <th>category id</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sub_categories as $i => $sub_category): ?>

                                <tr>
                                    <th ><?php echo $i + 1; ?></th>
                                    <td><?php echo "<img src=" . $sub_category["subcategory_img"] . " width=100px height=100px>" ?></td>
                                    <td><?php echo $sub_category["subcategory_name"] ?></td>
                                    <td><?php echo $sub_category["subcategory_des"] ?></td>
                                    <td><?php echo $sub_category["category_id"] ?></td>
                                    <td>

                                        <form action="subcat_update.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="edit_id" value="<?php echo $sub_category['subcategory_id']; ?>">
                                            <button type="submit" class="btn btn-success" name="edit_subcat">Edit</button>
                                        </form>
                                    </td>
                                    <td>

                                      <form action="subcat_delete.php" method="post" enctype="multipart/form-data">
                                      <input type="hidden" name="id" value="<?php echo $sub_category['subcategory_id'] ?>">
                                      <button type="submit" name="delete_subcat" class="btn btn-danger" >Delete</button>
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
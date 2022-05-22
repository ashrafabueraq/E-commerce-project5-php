<?php
include "security.php";

include_once "include/connect.php";
include_once "include/navbar.php";
$id = $_POST['edit_id'];

if (isset($_POST['edit_cat'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM `category` WHERE `category_id`= $id";
    $statement = $conn->prepare($query);
    $statement->execute();
    $info = $statement->fetch(PDO::FETCH_ASSOC);


}
?>

<div class="container-fluid">
  <div class="card shadow mb-9">
    <div class="card-header py-3">
        <h5 class="mg-0 font-weight-bold text-primary">Edit Admin profile</h5>

    </div>
<div class="card-body">

          <div class="modal-body">
    <form action="code.php?id=<?php echo $_POST["edit_id"] ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                <div class="form-group">
                    <label for="category_name" >
                        Category Name
                        <input type="text" name="cat_name" class="form-control" placeholder = "Category name" vaue="<?php echo  $info[category_name] ?>">
                    </label>
                </div>
                <div class="form-group">

                        <input type="file" class="form-control-file" id="customFile" name="image">

                </div>
                <div class="form-group">
                    <label for="Discription">
                        Discription
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cat_desc" vaue="<?php echo  $info[category_des]?>"></textarea>
                    </label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="edit_category">update</button>
     </form>


                        </div>
                    </div>
                </div>
</div>

<?php
include_once "include/scripts.php";
include_once "include/footer.php";

?>
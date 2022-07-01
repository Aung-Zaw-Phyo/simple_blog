<?php
    include_once "views/doc1.php";
    require_once 'actions/mySession.php';
    require_once 'actions/dbSym.php';

    if (checkSession('is_admin')) {
        if(!checkSession('is_admin')){
            return header('Location: index.php');
        }
    }else{
        return header('Location: index.php');
    }

    if(isset($_POST['submit'])){
        $categories = getCategory($_POST['id']);
    }
    
?>

    <div class="container my-5">
        <h3 class="text-center mb-3">Create Edit Form</h3>
        <div class="row g-3">
            <div class="col-2">
                <div class="list-group">
                    <a href="admin.php" class="list-group-item list-group-item-action">All Posts</a>
                    <a href="admin_create_post.php" class="list-group-item list-group-item-action">Create Post</a>
                    <a href="admin_all_categories.php" class="list-group-item list-group-item-action">All Categories</a>
                    <a href="admin_create_category.php" class="list-group-item list-group-item-action">Create Category</a>
                </div>
            </div>
            <div class="col-10 col-md-8 mx-auto">
                <div class="card p-3">
                    <?php foreach($categories as $category){ ?>
                    <form action="actions/category_edit.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $category['id'];?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $category['name'];?>" id="name" placeholder="Enter category name" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include_once "views/doc2.php";
?>
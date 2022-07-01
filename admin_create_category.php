<?php
    include_once "views/doc1.php";
    require_once 'actions/mySession.php';
    if (checkSession('is_admin')) {
        if(!checkSession('is_admin')){
            return header('Location: index.php');
        }
    }else{
        return header('Location: index.php');
    }
    
?>

    <div class="container my-5">
        <h3 class="text-center mb-3">Create Category Form</h3>
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
                    <form action="actions/category.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name"  required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include_once "views/doc2.php";
?>
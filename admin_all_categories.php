<?php
    include_once "views/doc1.php";
    require_once 'actions/mySession.php';
    require_once 'actions/category.php';

    if (checkSession('is_admin')) {
        if(!checkSession('is_admin')){
            return header('Location: index.php');
        }
    }else{
        return header('Location: index.php');
    }

    $categories = getCategories();
    
?>

    <div class="container my-5">
        <h3 class="text-center mb-3">All Categories</h3>
        <div class="row g-3">
            <div class="col-2">
                <div class="list-group">
                    <a href="admin.php" class="list-group-item list-group-item-action">All Posts</a>
                    <a href="admin_create_post.php" class="list-group-item list-group-item-action">Create Post</a>
                    <a href="admin_all_categories.php" class="list-group-item list-group-item-action">All Categories</a>
                    <a href="admin_create_category.php" class="list-group-item list-group-item-action">Create Category</a>
                </div>
            </div>
            <div class="col-8 mx-auto p-3">
                <div class="card p-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col" rowspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($categories as $category){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $category['id']; ?></th>
                                    <td><?php echo $category['name']; ?></td>
                                    <td class="d-flex">
                                        <form action="category_edit.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                            <button class="btn btn-sm btn-warning me-2" type="submit" name="submit">Edit</button>
                                        </form>
                                        <form action="actions/category_delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                            <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
    include_once "views/doc2.php";
?>
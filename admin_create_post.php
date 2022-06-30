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
    

    
?>

    <div class="container my-5">
        <h3 class="text-center mb-3">Create Post Form</h3>
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
                    <form action="actions/post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea name="body" class="form-control" placeholder="Enter content" id="body" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="normal">normal</option>
                                <option value="special">special</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" class="form-control" id="category">
                                <?php foreach($categories as $category){ ?>
                                    <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
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
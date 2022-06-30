<?php
require_once 'views/doc1.php';
require_once 'actions/dbSym.php';
$id = $_GET['id'];

if($id>0){
    $post = getPost($id);
    if(!mysqli_num_rows($post) > 0){
        return header('location: admin.php');
    }
}else{
    return header('location: admin.php');
}

$posts = getPost($id);

?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php foreach($posts as $post){ ?>
            <div>
                <div class="h4 text-center"><?php echo $post['title']; ?></div>
                <div class="text-secondary text-center">Publish at : <?php echo $post['created_at']; ?></div>
                <?php if($post['thumbnail']){ ?>
                <div class="my-3">
                    <img class="img-thumbnail d-block mx-auto" max-width="400px" src="assets/uploads/<?php echo $post['thumbnail']; ?>" alt="">
                </div>
                <?php } ?>
                <div class="text-center my-3">
                    <?php echo $post['body']; ?>
                </div>
                <div class="">
                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-link">Back</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
require_once 'views/doc2.php';
?>
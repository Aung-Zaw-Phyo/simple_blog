<?php
    include_once 'views/doc1.php';
    include_once 'views/hero.php';

    $posts = '';
    if (checkSession('username')) {
        $posts = getPostsFil('special');
    }else{
        $posts = getPostsFil('normal');
    }
    
?>
    <div class="container py-5">
        <h2 class="text-center mb-4">Latest News</h2>
        <div class="row g-3">
            <?php foreach($posts as $post){ ?>
            <div class="col-md-4">
                <div class="card bg-light p-3 text-center">
                    <h4><?php echo $post['title'] ?></h4>
                    <div class="my-2">
                    <?php echo substr($post['body'], 0, 200) ?>
                    </div>
                    <div class="text-end"><a href="post_detail.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-link">Detail</a></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

<?php
    include_once "views/doc2.php";
?>

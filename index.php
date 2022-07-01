<?php
    include_once 'views/doc1.php';
    include_once 'views/hero.php';

    $posts = '';
    $start = 0;
    $count = 0;
    if(isset($_GET['start'])){
        $start = $_GET['start'];
    }
    if (checkSession('username')) {
        $posts = getPostsFil('special', $start);
        $count = getPostsCount('special');
    }else{
        $posts = getPostsFil('normal', $start);
        $count = getPostsCount('normal');
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
    <div class="container d-flex justify-content-center">
        <nav class="" aria-label="...">
            <ul class="pagination">
                <?php 
                $t = 0;
                for($i = 0; $i < $count; $i += 6){
                    $t++;
                ?>
                <li class="page-item <?php echo $start==$i?'active':''; ?>" ><a class="page-link" href="index.php?start=<?php echo $i; ?>"><?php echo $t; ?></a></li>
                <?php  
                } 
                ?>
            </ul>
        </nav>
    </div>
<?php
    include_once "views/doc2.php";
?>

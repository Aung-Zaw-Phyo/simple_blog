<?php
    include_once "views/doc1.php";
    require_once 'actions/mySession.php';

    if (checkSession('username')) {
        return header('Location: index.php');
    }
        
?>

    <?php
        if (checkSession('message')) {
    ?>
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <div class="container">
            <strong> <?php echo getSession('message') ?> </strong> 
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
            <?php session_destroy() ?>
            </button>
        </div>    
    </div>
    <?php
        }
    ?>

    <div class="container py-5">
    <h2 class="text-center mb-4">Register Form</h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card p-3 bg-light">
                    <form action="actions/post_register.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Your name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name ">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Your username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username ">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Your email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email ">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Your password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password ">
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
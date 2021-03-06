<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css">
    <title>Blog</title>
</head>
<body>

    <?php
        session_start();
        require_once 'actions/mySession.php';
        require_once 'actions/dbSym.php';

        $categories = getCategories();
    ?>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">PopNEWS</a>
            <?php if(checkSession('is_admin')){ ?>
                <a class="" href="admin.php">Admin Panel</a>
            <?php } ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Posts 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach($categories as $category){ ?>
                            <li><a class="dropdown-item" href="blog.php?category=<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                            if ( checkSession('username') ) {
                                echo getSession('username');
                            } else {
                                echo 'Member';
                            }
                            
                        ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                            if ( checkSession('username') ) {
                                echo "<li><a class='dropdown-item' href='actions/logout.php'>Logout</a></li>";
                            } else {
                                echo "<li><a class='dropdown-item' href='register.php'>Register</a></li>
                                <li><a class='dropdown-item' href='login.php'>Login</a></li>";
                            }
                            
                        ?>
                        
                        
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="p-4"></div>
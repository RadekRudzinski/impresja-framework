 <?php

    use impresja\impresja\Application;

    ?>

 <!DOCTYPE html>
 <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='pl' lang='pl'>

 <head>
     <meta charset='utf-8' />
     <meta name='robots' content='ALL' />
     <meta name='viewport' content='width=device-width, initial-scale=1.0' />
     <meta name="msapplication-TileColor" content="#da532c">
     <meta name="theme-color" content="#ffffff">
     <link rel='shortcut icon' href='/images/favicon/favicon.ico' />
     <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">
     <link rel="manifest" href="/images/favicon/site.webmanifest">
     <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <title><?= $this->title ?></title>
 </head>

 <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="/">Home</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/contact">Contact</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/about">About</a>
                 </li>
             </ul>
             <?php if (Application::isGuest()) : ?>
                 <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                         <a class="nav-link" href="/login">Login</a>
                     </li>
                     <li class="nav-item active">
                         <a class="nav-link" href="/register">Register</a>
                     </li>
                 </ul>
             <?php else : ?>
                 <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                         <a class="nav-link" href="/profile">
                             Profile
                         </a>
                     </li>
                     <li class="nav-item active">
                         <a class="nav-link" href="/logout">
                             Welcome <?php echo Application::$app->user->getDisplayName() ?> (Logout)
                         </a>
                     </li>
                 </ul>
             <?php endif; ?>
         </div>
     </nav>

     <div class="container">

         <?php if (Application::$app->session->getFlash('success')) : ?>
             <div class="alert alert-success">
                 <?php echo Application::$app->session->getFlash('success'); ?>
             </div>
         <?php endif;
            if (Application::isGuest()) {
                echo '<div class="alert alert-warning">NIEZALOGOWANY <a href="/login">Login</a></div>';
            } else {
                echo '<div class="alert alert-success">ZALOGOWANY ' . Application::$app->user->getDisplayName() . ' <a href="/logout">Wyloguj</a></div>';
            }
            ?>


         {{content}}

     </div>


 </body>

 </html>
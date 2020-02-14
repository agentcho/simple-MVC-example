<!DOCTYPE html>
<html>
    <head>
        <title>Тест | MVC </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="/assets/style.css" rel="stylesheet" type="text/css">
        <script src="/assets/jquery/jquery-3.4.1.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="/application/js/common.js"></script>
        <script src="/node_modules/vue/dist/vue.js"></script>
    </head>
   
<section class="page-section page-header">
    
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div class="mobile-menu">
                 <div class="hidden-md hidden-lg hidden-xl">
                    <div class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/index.php?route=login/index">Вход</a>
                      <a class="dropdown-item" href="/index.php?route=page&id=1">Страница</a>
                      <a class="dropdown-item" href="/index.php?route=about">О нас</a>
                    </div>
                </div>
            </div>
            
        </div>
       
        <div class="desktop-menu">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="/index.php?route=about">О нас <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/index.php?route=page&id=1">Страница</a>
                </li>
                <li class="nav-item">
                  <?php if(isset($_SESSION['groupid']) && !empty($_SESSION['groupid'])){ ?>
                    <a class="nav-link" href="/index.php?route=login/logout">Выход</a>    
                  <?php } else { ?>
                    <a class="nav-link" href="/index.php?route=login/index">Вход</a>
                  <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
    
</section>

        
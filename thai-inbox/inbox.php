<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/d77bd3435b.js" crossorigin="anonymous"></script>
<!--        <link rel="stylesheet" href="../css/style_template.css"/>-->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <script src="js/handler.js"></script>
    </head>
    <body>
<!--        <header>-->
<!--            <a href="#"><img src="../images/php-knights-logo.png" alt="site logo made of a knights helmet"-->
<!--                    width="200" /></a>-->
<!--            -->
<!--        </header>-->
        <?php require_once('../home_page/header.php'); ?>
        <main>
           
            <div class="container">
                <div class="d-none d-md-block">
                    <a href="#">Profile</a> > <a href="#">Mail</a>
                </div>
                <h1 class="text-center">Mail</h1>
                <div class="row">
                    <div class="col-12 col-sm-4" id="inbox_control_bar">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="inbox_compose.php">
                                        Compose
                                    </a>
                                </li>
                                <li class="list-group-item" id="inbox">
                                    Inbox
                                </li>
                                <li class="list-group-item" id="sent">Sent</li>
                            </ul>
                        </div>
                        
                    </div>

                    <div class="col-12 col-sm-8 d-flex flex-column" id="list_messages_tools">
                        <div class="bd-highlight d-flex flex-column" id="tools">
                            <!-- <div class="collapse" id="navbarToggleExternalContent">
                              <div class="bg-dark p-4">
                                <h4 class="text-white">Collapsed content</h4>
                                <span class="text-muted">Toggleable via the navbar brand.</span>
                              </div>
                            </div> -->
                            <div class="bd-highlight d-flex flex-row d-sm-none">
                                <nav class="navbar navbar-light bg-light p-0">
                                    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                      <span class="navbar-toggler-icon"></span>
                                    </button> -->
                                    <button id="btn-back-to-mobile-inbox-control-bar" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#inbox_control_bar" aria-controls="inbox_control_bar" aria-expanded="false" aria-label="Toggle navigation">
                                      <span class="navbar-toggler-icon"></span>
                                    </button>
                                </nav>
                                <div class="flex-grow-1 text-center ">
                                    <h2>Inbox</h2>
                                </div>
                                <div class="d-block d-block d-md-none" style="font-size: 36px; color: crimson;">
                                    <a href="inbox_compose.php"><i class="fas fa-edit"></i></a>
                                </div>
                            </div>
                            <div class="d-flex flex-row bd-highlight">
                                <div class="bd-highlight m-1" style="font-size: 32px;">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                                <form class="bd-highlight flex-fill">
                                    <div class="input-group my-2 d-flex flex-row">
                                        <div class="input-group-prepend d-flex flex-fill">
                                            <label class="input-group-text bd-highlight" for="searchtxt">
                                                <i class="fas fa-search"></i>
                                            </label>
                                            <input type="text" class="form-control bd-highlight flex-fill" id="searchtxt">
                                        </div>
                                        <!-- <button type="button" class="btn btn-secondary">search</button> -->
                                    </div>
                                </form>
                                
                            </div>

                        </div>
                        
                        <ul id="list_messages" class="bd-highlight d-flex flex-column mb-3 list-group">
                                <li class="py-2 bd-highlight list-group-item">
                                            <div class="d-flex flex-row bd-highlight align-items-center">
                                                <div class="p-2 bd-highlight">
                                                    <input type="checkbox">
                                                </div>
<!--                                                <div class="p-2 flex-grow-1 bd-highlight position-relative">-->
                                                    <div class="d-flex flex-column flex-md-row bd-highlight align-items-center flex-grow-1">
                                                        <div class="p-md-2 bd-highlight">Jordan Henderson</div>
                                                        <div class="p-md-2 flex-grow-1 bd-highlight text-truncate">The title of message</div>
                                                        <a href="message_content.php" class="p-0 stretched-link bd-highlight "></a>
                                                        <div class="p-md-2 bd-highlight text-right">27 Jun</div>
<!--                                                    </div>-->
                                                </div>
                                            </div>
                                </li>
                            <li class="py-2 bd-highlight list-group-item">
                                <div class="d-flex flex-row bd-highlight align-items-center">
                                    <div class="p-2 bd-highlight">
                                        <input type="checkbox">
                                    </div>
                                    <!--                                                <div class="p-2 flex-grow-1 bd-highlight position-relative">-->
                                    <div class="d-flex flex-column flex-md-row bd-highlight align-items-center flex-grow-1">
                                        <div class="p-md-2 bd-highlight">Jordan Henderson</div>
                                        <div class="p-md-2 flex-grow-1 bd-highlight text-truncate">The title of message</div>
                                        <a href="message_content.php" class="p-0 stretched-link bd-highlight "></a>
                                        <div class="p-md-2 bd-highlight text-right">27 Jun</div>
                                        <!--                                                    </div>-->
                                    </div>
                                </div>
                            </li>
                                
                                
                            <!-- </div> -->
                            
                        </ul>
                        
                    </div>
                    <!--
                    <div class="col-6">
                        content of a particular message
                    </div>
                    -->
                </div>
            </div>
              
        </main>
<?php require_once('../home_page/footer.php'); ?>
<!--        <footer>-->
<!--            <p>this is the footer</p>-->
<!--            <a href="#">Sitemap</a>-->
<!--            <a href="#">Policy</a>-->
<!--          </footer>-->
    </body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Knights Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/42ed6d485e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/advice_page.css" /> <!--Style Sheet that it links too-->
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<header>
    <img src="./images/php-knights-logo.png" alt="site logo made of a knights helmet" width="200" />
    <nav id="menu">
      <ul>
        <!--*Navigation elements-->
        <li><a href="#">Profile | </a></li>
        <li><a href="#">Search| </a></li>
        <li><a href="#">Subscribe| </a></li>
        <li><a href="#">Advice| </a></li>
        <li><a href="#">Newsletter| </a></li>
        <li><a href="#">Search| </a></li>
        <li><a href="#">Sign In| </a></li>
        <li><a href="#">User Wall </a></li>
      </ul>
    </nav>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-8 left-side-sidebar">
            <div class="row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Having Some Problems? Need Some Advice?</h3>
                    <p class="body-text-3x">Check out the posts below!</p>
                    <div class="small-search-wrap">
                        <div class="search-form">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" value="Search Bar" placeholder="Search something here" maxlength="100" class="form-control" name="name" id="name">
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="invisible small">
                </div>
                <div class="col-md-12">
                    <div class="v-heading-v2">
                        <h4 class="v-search-result-count">*Please note these are regular people not doctors*</h4>
                    </div>
                </div>
            </div>

            <div class="clearfix mt-40">
                <ul class="xsearch-items">
                    <li class="search-item">
                        <div class="search-item-img">
                            <a href="#">
                                <img src="images/estevan.jpg" width="70" height="70">
                            </a>
                        </div>
                        <div class="search-item-content">
                            <h3 class="search-item-caption">Hey My First Post</a></h3>

                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <li class="time">November 10, 2017‎</li>
                                    <!--<li><a href="#">0 Comments</a></li> Not Sure if you want a comment count-->
                                    <li class="pl-0">Subject: my new post</a></li>
                                </ul>
                            </div>
                            <div class="content"><!--Made a class if you want to edit the messages. *Note its not in use*-->
                                Hey guys this is my first post. I'm not sure if we should change that only the admin can make a post, or should we allow login users to make a post as well.
                            </div>
                        </div>
                    </li>

                    <li class="search-item">
                        <div class="search-item-img">
                            <a href="#">
                                <img itemprop="image" src="images/estevan.jpg" width="70" height="70">
                            </a>
                        </div>
                        <div class="search-item-content">
                            <h3 class="search-item-caption"><a href="#">My Second Post</a></h3>
                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <li class="time">October 10, 2017‎</li>
                                </ul>
                            </div>
                            <div class="content">
                                This is what it looks like with links included. Should I leave the links for future detail page, or should we just take out the links to use.
                            </div>
                        </div>
                    </li>

                    <li class="search-item">
                        <div class="search-item-img">
                            <a href="#">
                                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" width="70" height="70">
                            </a>
                        </div>
                        <div class="search-item-content">
                            <h3 class="search-item-caption"><a href="#">5 questions you must ask at the start of every project</a></h3>
                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <li class="time">April 15, 2017‎</li>
                                </ul>
                            </div>
                            <div class="content">
                                1. Why am here?
                                2. Who are you people?
                                3. What am I even doing here?
                                4. Wait what do you mean this is due in a week?
                                5. Can I leave? You know what I'm just gonna go.
                            </div>
                        </div>
                    </li>
                    <!--Here is a section of a post-->
                    <li class="search-item">
                        <div class="search-item-img">
                            <a href="#">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" width="70" height="70">
                            </a>
                        </div>
                        <div class="search-item-content">
                            <h3 class="search-item-caption"><a href="#">Each Section of these post is in a li class</a></h3>
                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <li class="time">March 22, 2017‎</li>
                                </ul>
                            </div>

                            <div class="content">
                                I left comments in the code. Check around for css comments as well as html comments for what is considered a post and where it starts/end.
                            </div>
                        </div>
                    </li>
                    <!--This is where it ends-->
                </ul>
            </div>
        </div>
    </div>
</div>
<footer id="copyRight">
    <!--*need to figure out what we are going to include in the footer-->
    <a href="#">Sitemap |</a>
    <a href="#">Policy</a>
    <p class="copyRightLogo"><i class="far fa-copyright"></i> this is the footer</p>
</footer>
</body>
</html>
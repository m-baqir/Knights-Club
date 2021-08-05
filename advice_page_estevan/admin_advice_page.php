<?php
// here we can list through the advice store in the db

?>

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
    <!--Style Sheet that it links too-->
    <link rel="stylesheet" href="./css/advice_page.css" /> 
    <!--Additional CSS for header and footer-->
    <link rel="stylesheet" href="../css/style_template.css" />
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<?php require_once('../home_page/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 left-side-sidebar">
            <div id="loginLocation">
                <p class="loginNotice">Signed in as: Estevan Cordero</p>
                <button class="generalButton">LOG OUT</button>
            </div>
            <div class="row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Having Some Problems? Need Some Advice?</h3>
                    <p class="body-text-3x">Check out the posts below!</p>
                    <div class="small-search-wrap">
                        <div class="search-form">
                            <form action="./insert_advice_form.php" method="post">
                                <div class="form-group">
                                    <input type="text" value="Search Bar" placeholder="Search something here" maxlength="100" class="form-control" name="name" id="name">
                                </div>
                                <input type="submit" class="generalButton" value="Add A Post"/>
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

                    <!--For the foreach loop it will contain  -->
                    <!--JUST ONE FOREACH LOOP IS NEEDED FOR ONE LIST POST-->
                    <!--sIMILAR TO WHAT WAS DONE IN THE LIST FOR CARS-->
                    <li class="search-item">
                        <div class="search-item-img">
                            <!--Here is the image for the profile-->
                            <a href="#">
                                <img src="images/estevan.jpg" width="70" height="70">
                            </a>
                        </div>
                        <div class="search-item-content">
                            <!--Subject Line-->
                            <h3 class="search-item-caption">Hey My First Post</a></h3>

                            <div class="search-item-meta mb-15">
                                <ul class="list-inline">
                                    <!--Date Line -->
                                    <li class="time">November 10, 2017‎</li>
                                </ul>
                            </div>
                            <!--Content of the post -->
                            <div class="content"><!--Made a class if you want to edit the messages. *Note its not in use*-->
                                Hey guys this is my first post. I'm not sure if we should change that only the admin can make a post, or should we allow login users to make a post as well.
                            </div>
                        </div>
                    </li>
                    <!-- End of a post -->

                    <!--Example of a post without the image on it-->
                    <li class="search-item">
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
<?php require_once('../home_page/footer.php'); ?>
<!--
<footer id="copyRight">
    *need to figure out what we are going to include in the footer
    <a href="#">Sitemap |</a>
    <a href="#">Policy</a>
    <p class="copyRightLogo"><i class="far fa-copyright"></i> this is the footer</p>
</footer>
-->
</body>
</html>
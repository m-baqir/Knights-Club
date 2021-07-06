<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with contact information - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/index_styles.css" rel="stylesheet">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- NEED WORK TO FIT IN TO CODE
    <header>
        <img src="./images/php-knights-logo.png" alt="site logo made of a knights helmet" width="200" />
        <nav id="menu">
          <ul>
            *Navigation elements
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
    </header>-->
<div class="container">


<div class="page-inner no-page-title">
    <!-- start page main wrapper -->
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-5 col-xl-3">
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">User Profile</h4>
                    </div>
                    <div class="card-body user-profile-card mb-3">
                        <img src="images/estevan.jpg" class="user-profile-image rounded-circle" alt="" />
                        <h4 class="text-center h6 mt-2">Estevan Cordero</h4>
                        <p class="text-center small">Web Devloper</p>
                        <button class="btn btn-theme btn-sm">Follow</button>
                        <button class="btn btn-theme btn-sm">Message</button>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">Hobbies and Interest</h4>
                    </div>
                    <div class="card-body mb-3">
                        <a href="#" class="label label-success mb-2">Coding</a>
                        <a href="#" class="label label-success mb-2">Taking care of my pets</a>
                        <a href="#" class="label label-success mb-2">Video Games</a>
                        <a href="#" class="label label-success mb-2">Bootstrap</a>
                        <a href="#" class="label label-success mb-2">Reading</a>
                        <a href="#" class="label label-success mb-2">Taking Walks</a>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">About</h4>
                    </div>
                    <div class="card-body mb-3">
                        <p class="mb-0">Hello, my name is estevan and I am 28 years old. I enjoy coding, eating, and hoping to finish this website with my group members</p>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">Contact Information</h4>
                    </div>
                    <!--GRABS INFORMATION FROM USER PROFILE PAGE-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                    <tr>
                                        <th scope="row">Email:</th>
                                        <td>addyour@emailhere</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone:</th>
                                        <td>(+44) 123 456 789</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address:</th>
                                        <td>74 Guild Street 542B, Great North Town MT.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-6">
                <!-- THIS IS WHERE THE POST BOX IS 
                <div class="card card-white grid-margin">
                    <div class="card-body">
                        <div class="post">
                            <textarea class="form-control" placeholder="Post" rows="4"></textarea>
                            <div class="post-options">
                                <a href="#"><i class="fa fa-camera"></i></a>
                                <a href="#"><i class="fas fa-video"></i></a>
                                <a href="#"><i class="fa fa-music"></i></a>
                                <button class="btn btn-outline-primary float-right">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="profile-timeline">
                    <ul class="list-unstyled">
                        <li class="timeline-item">
                            <div class="card card-white grid-margin">
                                <div class="card-body">
                                    <!--THIS IS WHERE THE USER WALL WILL BEGIN-->
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>Vikash smith <span>Joined the Knights Club</span></p>
                                        <small>3 hours ago</small>
                                    </div>
                                    <br />
                                    <div class="timeline-item-header">
                                        <img src="images/estevan.jpg" alt="" />
                                        <p>Estevan Cordero <span>Joined the Knights Club</span></p>
                                        <small>1 hours ago</small>
                                    </div>
                                    <br />
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>Mohammad Baqir <span>Joined the Knights Club</span></p>
                                        <small>9 hours ago</small>
                                    </div>
                                    <br />
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>Ahmed Hagar <span>Joined the Knights Club</span></p>
                                        <small>5 days ago</small>
                                    </div>
                                    <!-- THIS IS ADDITIONAL STUFF THAT WAS COMMENTED OUT
                                    <div class="timeline-item-post">
                                        <p>Elavita veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                                        <div class="timeline-options">
                                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (15)</a>
                                            <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                                            <a href="#"><i class="fa fa-share"></i> Share (6)</a>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Jamara Karle <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Xullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Lois Anderson <small>3 hours ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Coluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div> -->
                                </div>
                            </div>
                        </li>
                        <!--THIS IS WHERE WE WILL INCLUDED A USER WALL FOR ONLY TOP 5 RECENT POST-->
                        <li class="timeline-item">
                            <div class="card card-white grid-margin">
                                <div class="card-body">
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>Veema Walkeror <span>uploaded a photo</span></p>
                                        <small>7 hours ago</small>
                                    </div>
                                    <div class="timeline-item-post">
                                        <p>totam rem aperiam, eaque ipsa quae ab illo inventore</p>
                                        <img src="img/post-img01.jpg" alt="" />
                                        <div class="timeline-options">
                                            <a href="#"><i class="fa fa-thumbs-up"></i> Like (22)</a>
                                            <a href="#"><i class="fa fa-comment"></i> Comment (7)</a>
                                            <a href="#"><i class="fa fa-share"></i> Share (9)</a>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Memila moriya <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Explicabo Nemo enim ipsam voluptatem quia voluptas.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--THIS IS WHERE IT ENDS-->
                        <li class="timeline-item">
                            <div class="card card-white grid-margin">
                                <div class="card-body">
                                    <div class="timeline-item-header">
                                        <img src="images/php-knights-logo.png" alt="" />
                                        <p>ATTRACTION SECTION</p>
                                    </div>
                                    <div class="timeline-item-post">
                                        <p>totam rem aperiam, eaque ipsa quae ab illo inventore</p>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Memila moriya <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Explicabo Nemo enim ipsam voluptatem quia voluptas.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-12 col-xl-3">
                <!-- COMMENTED OUT SUGGESSTION BOX
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Suggestions</h4>
                    </div>
                    <div class="card-body">
                        <div class="team">
                            <div class="team-member">
                                <div class="online on"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                            <div class="team-member">
                                <div class="online on"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                            <div class="team-member">
                                <div class="online off"></div>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">ADMIN UPDATES</h4>
                    </div>
                    <div class="card-body">
                        <p>Hey Everyone, welcome to our website hope you enjoy your stay!</p>
                    </div>
                </div>
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Getting Started</h4>
                    </div>
                    <div class="card-body">
                        <h5>Links</h5>
                        <p> <a href="#">Advice</a>  </p>
                        <p> <a href="#">Contact</a>  </p>
                        <p> <a href="#">News</a>  </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- end page main wrapper -->
    <div class="page-footer">
        <p>Copyright © 2020 Evince All rights reserved.</p>
    </div>
</div>
</div>

<script type="text/javascript">

</script>
</body>
</html>
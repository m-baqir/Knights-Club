<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Knight's Club</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/42ed6d485e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">
  <!--Style Sheet that it links too-->
  <link rel="stylesheet" href="./css/user_profile.css" /> 
  <link rel="stylesheet" href="../css/style_template.css" />
</head>
<body>
<?php require_once('../home_page/header.php'); ?>
<div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="images/estevan.jpg" alt="profile" class="img-lg rounded-circle mb-3">
                    <div class="mb-3">
                      <h3>Estevan Cordero</h3>
                      <div class="d-flex align-items-center justify-content-center">
                        <h5 class="mb-0 mr-2 text-muted">Canada</h5>
                        <div class="br-wrapper br-theme-css-stars"><select id="profile-rating" name="rating" autocomplete="off" style="display: none;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a></div></div>
                      </div>
                    </div>
                    <p class="w-75 mx-auto mb-3">Single, and sad owner of more then hundreds of videos games </p>
                  </div>
                  <div class="border-bottom py-4">
                    <p>Hobbies and Interest</p>
                    <div>
                      <label class="badge badge-outline-dark">Video Games</label>
                      <label class="badge badge-outline-dark">Coding</label>
                      <label class="badge badge-outline-dark">Working on this f**king profile</label>
                    </div>                                                               
                  </div>
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        Status
                      </span>
                      <span class="float-right text-muted">
                        Active
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Phone
                      </span>
                      <span class="float-right text-muted">
                        006 3435 22
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Mail
                      </span>
                      <span class="float-right text-muted">
                        estevan@testmail.com
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Facebook
                      </span>
                      <span class="float-right text-muted">
                        <a href="#" class="facebook-link">Estevan Cordero</a>
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Twitter
                      </span>
                      <span class="float-right text-muted">
                        <a href="#" class="twitter-link">@estevancordero</a>
                      </span>
                    </p>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="mt-4 py-2 border-top border-bottom">
                    <ul class="nav profile-navbar">
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="mdi mdi-account-outline"></i>
                          Info
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#">
                          <i class="mdi mdi-newspaper"></i>
                          Post
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          <i class="mdi mdi-calendar"></i>
                          Gallery
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="profile-feed">
                    <div class="d-flex align-items-start profile-feed-item">
                      <img src="images/estevan.jpg" alt="profile" class="img-sm rounded-circle">
                      <div class="ml-4">
                        <h6>
                          Estevan Cordero
                          <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                        </h6>
                        <p>
                          Why was I given this job. Oh boy, I hope my team like this.
                          Btw should we inlcuded images with text post, or would that be to much work.
                        </p>
                        <p class="small text-muted mt-2 mb-0">
                          <span>
                            <i class="mdi mdi-star mr-1"></i>4
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-comment mr-1"></i>11
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-reply"></i>
                          </span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-start profile-feed-item">
                      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-sm rounded-circle">
                      <div class="ml-4">
                        <h6>
                          Willie Stanley
                          <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                        </h6>
                        <img src="images/estevan.jpg" alt="sample" class="rounded mw-100">                            
                        <p class="small text-muted mt-2 mb-0">
                          <span>
                            <i class="mdi mdi-star mr-1"></i>4
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-comment mr-1"></i>11
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-reply"></i>
                          </span>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex align-items-start profile-feed-item">
                      <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="profile" class="img-sm rounded-circle">
                      <div class="ml-4">
                        <h6>
                          Dylan Silva
                          <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                        </h6>
                        <p>
                          This guy is the best of the field, and works great with any one hire him now. 
                        </p>
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="sample" class="rounded mw-100">                                                        
                        <p class="small text-muted mt-2 mb-0">
                          <span>
                            <i class="mdi mdi-star mr-1"></i>4
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-comment mr-1"></i>11
                          </span>
                          <span class="ml-2">
                            <i class="mdi mdi-reply"></i>
                          </span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once('../home_page/footer.php'); ?>
    <!--<footer id="copyRight">
      *need to figure out what we are going to include in the footer
      <a href="#">Sitemap |</a>
      <a href="#">Policy</a>
      <p class="copyRightLogo"><i class="far fa-copyright"></i> this is the footer</p>
    </footer>-->
</body>
</html>

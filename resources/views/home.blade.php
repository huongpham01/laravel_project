<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<style scoped>
    ul {
        list-style-type: none;
        margin: 0 !important;
        padding: 0;
        overflow: hidden;
        background-color: #4f4d4d;
    }

    li {
        float: left;
    }

    ul li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    ul li a:hover {
        background-color: #111;
        text-decoration: none;
        color: pink;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog review books &mdash; My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
    <meta name="keywords"
        content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="FreeHTML5.co" />


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
 <script src="js/respond.min.js"></script>
 <![endif]-->

</head>

<body>
    <nav>
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="{{ route('user.post.login') }}">Login</a></li>
            <li style="position: absolute; right: 0;">
                <a href="{{ route('user.get.logout') }}">Logout</a>
            </li>

        </ul>
    </nav>
    <header id="fh5co-header" style="background-image: url(images/hero_bg_1.jpg)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row" style="margin-top: 5em;">
                <div class="col-md-12 text-center">
                    <h1 id="fh5co-logo" class="cursive-font"><a href="index.html">Review books</a></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="intro">

                        <h2>You can review books you like or read the reviews of others to find interesting books ^^
                        </h2>
                        <p>
                        <p>If you don't have an account, you can sign up here: <a
                                href="{{ route('user.post.register') }}"
                                class="btn btn-primary btn-lg btn-hardbound">Sign Up</a></p>

                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <figure class="fh5co-intro-img">
                        <img class="img-1 animate-box" src="images/book_black.png"
                            alt="Free Website Template by FreeHTML5.co">
                        <img class="img-2 animate-box" src="images/book_white.png"i
                            alt="Free Website Template by FreeHTML5.co">
                    </figure>
                </div>
            </div>
        </div>
    </header>

    <div id="main">

        <div class="container">

            <div class="row row-pb-md">
                <div class="col-md-4">
                    <div class="review text-center">
                        <figure>
                            <img src="images/person_3.jpg" alt="user">
                        </figure>
                        <span>Rob Smith </span>
                        <span class="star">
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                        </span>
                        <blockquote>
                            <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts.
                                Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="review text-center">
                        <figure>
                            <img src="images/person_2.jpg" alt="user">
                        </figure>
                        <span>John Doe </span>
                        <span class="star">
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                        </span>
                        <blockquote>
                            <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.&rdquo;</p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="review active text-center">
                        <figure>
                            <img src="images/person_1.jpg" alt="user">
                        </figure>
                        <span>Jean Doe </span>
                        <span class="star">
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star colored"></i>
                            <i class="icon-star"></i>
                        </span>
                        <blockquote>
                            <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.&rdquo;
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="row fh5co-feature">
                <div class="col-md-6 col-md-push-6">
                    <div class="fh5co-copy">
                        <div class="fh5co-copy-inner">
                            <h2>Keep It Simple</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="fh5co-img text-right">
                        <figure class="fh5co-figure animate-box">
                            <img class="img-2" src="images/book_white.png"
                                alt="Free Website Template by FreeHTML5.co">
                        </figure>
                    </div>
                </div>
            </div>
            <!-- END feature -->

            <div class="row fh5co-feature fh5co-reverse">
                <div class="col-md-6">
                    <div class="fh5co-copy">
                        <div class="fh5co-copy-inner">
                            <h2>Pixel Perfect</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fh5co-img text-left">
                        <figure class="fh5co-figure animate-box">
                            <img class="img-2" src="images/book_black.png"
                                alt="Free Website Template by FreeHTML5.co">
                        </figure>
                    </div>
                </div>
            </div>
            <!-- END feature -->

            <div class="row fh5co-feature last-feature">
                <div class="col-md-6 col-md-push-6">
                    <div class="fh5co-copy">
                        <div class="fh5co-copy-inner">
                            <h2>Beautiful Design</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                the Semantics, a large language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <div class="fh5co-img text-right">
                        <figure class="fh5co-figure animate-box">
                            <img class="img-2" src="images/book_white.png"
                                alt="Free Website Template by FreeHTML5.co">
                        </figure>
                    </div>
                </div>
            </div>
            <!-- END feature -->


        </div>


        <div class="fh5co-testimonial">
            <div class="container">
                <div class="row text-center fh5co-heading">
                    <h2>More Customer Review</h2>
                </div>
                <div class="owl-carousel owl-carousel-fullwidth">
                    <div class="item">
                        <div class="testimony-slide active text-center">
                            <figure>
                                <img src="images/person_1.jpg" alt="user">
                            </figure>
                            <span>Jean Doe </span>
                            <span class="review">
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star"></i>
                            </span>
                            <blockquote>
                                <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.&rdquo;</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-slide active text-center">
                            <figure>
                                <img src="images/person_2.jpg" alt="user">
                            </figure>
                            <span>John Doe </span>
                            <span class="review">
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                            </span>
                            <blockquote>
                                <p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                                    large language ocean.&rdquo;</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-slide active text-center">
                            <figure>
                                <img src="images/person_3.jpg" alt="user">
                            </figure>
                            <span>Rob Smith </span>
                            <span class="review">
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                                <i class="icon-star colored"></i>
                            </span>
                            <blockquote>
                                <p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts.
                                    Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                    language ocean.&rdquo;</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="features">
            <div class="container">
                <div class="row text-center fh5co-heading">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>More Features</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-tablet"></i>
                            </span>
                            <h3>iBook</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-heart"></i>
                            </span>
                            <h3>Love by everyone</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-star"></i>
                            </span>
                            <h3>Good Review</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 animate-box">
                        <div class="feature-center">
                            <span class="icon">
                                <i class="icon-cog"></i>
                            </span>
                            <h3>Mob</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="get-subscribe">
            <div class="container">
                <div class="row text-center fh5co-heading">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Subscribe</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="get-subscribe">
                    <form class="form-inline">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer id="footer">
            <div class="container">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        <small>&copy; 2016. Free HTML5 Template. All Rights Reserved.</small>
                        <em><small>Designed by <a href="http://freehtm5.co" target="_blank">FreeHTML5.co</a> Demo
                                Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a>. Book image is
                                from <a href="http://graphicburger.com">GraphicBurger</a></small> </em>
                    </p>
                    <ul class="fh5co-social">

                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-apple"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="js/owl.carousel.min.js"></script>

    <!-- MAIN JS -->
    <script src="js/main.js"></script>

</body>

</html>

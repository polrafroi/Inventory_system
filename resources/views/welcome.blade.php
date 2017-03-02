<style>
    .icon-pic {
        border: 1px solid;
        width: 197px;
        height: 84px;
    }

    .icon-pic {
        border: 1px solid;
        width: 197px;
        height: 84px;
        display: inline-block;
    }

    .contact-det {
        float: right;
        border: 1px solid;
        width: 197px;
        height: 84px;
    }

    .opening-det {
        float: right;
        border: 1px solid;
        width: 197px;
        height: 84px;
        margin-right: 11px;
    }

    /*CUSTOMIZE BOOTSTRAP*/

    .navbar-default {
        background: #2E375F;
        border-color: #e7e7e7;
    }

    .navbar-default .navbar-nav>li>a {
        color: white;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
    }

    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
        color: white;
        background: #F22613;
    }

    .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
        color: white;
        background-color: transparent;
    }

    /*CUSTOMIZE CAROUSEL*/
    .carousel-inner {
        position: relative;
        width: 100%;
        overflow: hidden;
        height: 100%;
    }

    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
        display: block;
        max-width: 100%;
        height: auto;
        height: 100%;
    }

    /*SERVICES*/

    span.span-ser {
        color: #F22613;
        font-weight: 700;
    }

    h2.h2-ser {
        font-weight: 700;
    }

    /*ABOUT*/

    h3.h3-about {
        float: left;
        font-weight: 700;
    }

    span.span-about {
        color: #F22613;
        font-weight: 700;
    }

    /*CONTACT*/

    h3.h3-cont {
        font-weight: 700;
    }

    span.span-cont {
        color: #F22613;
        font-weight: 700;
    }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Services</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Intro Section -->
<section id="intro" class="intro-section">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img class="slide-image" src="http://placehold.it/1344x523" alt="">
            </div>
            <div class="item">
                <img class="slide-image" src="http://placehold.it/1344x523" alt="">
            </div>
            <div class="item">
                <img class="slide-image" src="http://placehold.it/1344x523" alt="">
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="h3-about">WELCOME TO <span class="span-about">LOREM IPSUM</span></h3>
                
            </div>

        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="h2-ser">Our <span class="span-ser">Services</span></h2>

            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Map Column -->
                    <div class="col-md-8">
                        <!-- Embedded Google Map -->
                        <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                    </div>
                    <!-- Contact Details Column -->
                    <div class="col-md-4">
                        <h3 class="h3-cont">Contact <span class="span-cont">Details</span></h3>
                        <p>
                            3481 Melrose Place<br>Beverly Hills, CA 90210<br>
                        </p>
                        <p><i class="fa fa-phone"></i>
                            <abbr title="Phone">P</abbr>: (123) 456-7890</p>
                        <p><i class="fa fa-envelope-o"></i>
                            <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">name@example.com</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i>
                            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
                        <ul class="list-unstyled list-inline list-social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Creative - Start Bootstrap Theme</title>

  <!-- Font Awesome Icons -->
  <link href="css/app.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="css/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{route('welcome')}}">CreativeMedia</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
              @guest
              @if (Route::has('register'))
              <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Write</a>
              @else            
              <a class="nav-link js-scroll-trigger" href="{{route('stories.index')}}">Write</a>
              @endif    
              @endguest
            </li>          
          </li>          
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="route('story.read')">Stories</a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Subscribe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('stories.index') }}">Write Story</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Tempat favorit anda untuk berbagi cerita</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Bagikan cerita, artikel atau pengalaman menarik anda kepada orang lain!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('story.index')}}">View story from around </a>
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            @guest
            <h2 class="text-white mt-0">Ingin berbagi cerita anda dengan orang lain?</h2>
            <hr class="divider light my-4">
            <p class="text-white-50 mb-4">Daftar sekarang untuk membagikan pengalaman anda kepada orang lain!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="{{route('register')}}">Daftar sekarang!</a>
            @else
            <h2 class="text-white mt-0">Tulis cerita anda</h2>
            <hr class="divider light my-4">
            <p class="text-white-50 mb-4">Bagikan pengalaman dan cerita menarik anda untuk orang lain!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Tulis Cerita</a>
            @endguest
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Cerita terbaru untuk anda</h2>
      <hr class="divider my-4">
      
      <div class="row">
          @foreach ($newPost as $item)
          <div class="col-lg-4 col-xs-12">
              <div class="card" style="height: 400px;">
                  <img src="storage/uploads/{{$item->thumbnail}}" class="card-img-top">
                  <div class="card-body">
                      <p class="card-text"><small class="text-muted">{{$item->category->nama}}</small></p>
                      <h5>{{$item->title}}</h5>
                  </div>
                  <div class="card-footer text-right bg-transparent">                            
                      <a href="{{route('story.read', $item->id)}}">Read story.</a>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/oto.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Otomotive
              </div>
              <div class="project-name">
                Baca cerita tentang otomotif
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/tech.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Technology
              </div>
              <div class="project-name">
                Baca cerita tentang teknologi
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Photoghrapy
              </div>
              <div class="project-name">
                Baca cerita tentang fotografi
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/sport.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Sports
              </div>
              <div class="project-name">
                Baca cerita tentang olahraga
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/game.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Games
              </div>
              <div class="project-name">
                Baca cerita tentang game
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Others
              </div>
              <div class="project-name">
                Baca cerita lainnya
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>  

  <!-- Contact Section -->
  @guest
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Berlangganan Sekarang!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Dapatkan info, artikel dan katalog terbaru dari kami.</p>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-4 m-auto mb-5">
            <form>
                <div class="form-group">
                  <label for="subscribe-name">Name</label>
                  <input type="email" class="form-control" id="subscribe-name" aria-describedby="emailHelp" placeholder="Your Name">                  
                </div>
                <div class="form-group">
                  <label for="subscribe-email">Your email</label>
                  <input type="email" class="form-control" id="subscribe-email" placeholder="Your email">
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
      </div>      
    </div>
  </section>
  @endguest

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.js"></script>

</body>

</html>

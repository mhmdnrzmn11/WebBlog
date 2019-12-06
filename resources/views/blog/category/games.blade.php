@extends('layouts.creative')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <h4 class="text-center">Cerita tentang Games</h4>              
            <hr class="divider my-4">   
            <div class="row">
                @foreach ($post as $item)
                <div class="col-lg-3 col-xs-12">
                    <div class="card" style="height: 350px">
                        <img src="{{url('storage/uploads/'.$item->thumbnail)}}" class="card-img-top">
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

    </div>
</div>

<section id="portfolio" class="mt-5">
        <h4 class="text-center">Baca Kategori Lainnya</h4>
        <hr class="divider my-4">
        <div class="container-fluid p-0">
          <div class="row no-gutters">
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{route('story.automotive')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/oto.jpg')}}" alt="">
                <div class="portfolio-box-caption">
                  <div class="project-category text-white-50">
                    Automotive
                  </div>
                  <div class="project-name">
                    Baca cerita tentang otomotif
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{route('story.technology')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/tech.jpg')}}" alt="">
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
              <a class="portfolio-box" href="{{route('story.photoghrapy')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/3.jpg')}}" alt="">
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
              <a class="portfolio-box" href="{{route('story.sports')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/sport.jpg')}}" alt="">
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
              <a class="portfolio-box" href="{{route('story.games')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/game.jpg')}}" alt="">
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
              <a class="portfolio-box" href="{{route('story.misc')}}">
                <img class="img-fluid" src="{{asset('img/portfolio/thumbnails/6.jpg')}}" alt="">
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

@endsection

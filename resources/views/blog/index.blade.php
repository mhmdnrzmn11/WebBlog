@extends('layouts.creative')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-9">
            <h4>Cerita terbaru</h4>                 
            <div class="row">
                @foreach ($newPost as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3">            
            <div class="card">                
                <div class="card-body">
                    <h5 class="card-title pl-2">Category</h5>
                    <a href="{{route('story.automotive')}}" class="btn btn-link w-100 text-left">Automotive</a>
                    <a href="{{route('story.technology')}}" class="btn btn-link w-100 text-left">Technology</a>
                    <a href="{{route('story.photoghrapy')}}" class="btn btn-link w-100 text-left">Photoghrapy</a>
                    <a href="{{route('story.sports')}}" class="btn btn-link w-100 text-left">Sports</a>
                    <a href="{{route('story.games')}}" class="btn btn-link w-100 text-left">Games</a>
                    <a href="{{route('story.misc')}}" class="btn btn-link w-100 text-left">Miscellaneous<a>
                </div>
            </div>            
        </div>
    </div>

    <h4 class="mt-5 ">Cerita tentang Otomotif</h4>                 
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach ($oto as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3"></div>
    </div>

    <h4 class="mt-5 ">Cerita tentang Olahraga</h4>                 
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach ($sport as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3"></div>        
    </div>

    <h4 class="mt-5 ">Cerita tentang Fotografi</h4>                 
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach ($photo as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3"></div>        
    </div>

    <h4 class="mt-5 ">Cerita tentang Games</h4>                 
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach ($games as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3"></div>        
    </div>

    <h4 class="mt-5 ">Cerita tentang Teknologi</h4>                 
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @foreach ($tech as $item)
                <div class="col-lg-4 col-xs-12">
                    <div class="card" style="height: 350px">
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
        <div class="col-lg-3"></div>        
    </div>
</div>

@endsection

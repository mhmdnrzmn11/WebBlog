@extends('layouts.creative')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">                            
            <nav class="navbar navbar-expand-sm navbar-dark primary justify-content-between">
                <div class="navbar-brand text-dark">My Stories</div>
                <div class="form-inline">
                    <form class="form-inline my-2 my-lg-0" action="">                        
                        <a class="btn btn-outline-primary btn-md my-2 my-sm-0 ml-3" href="{{route('stories.create')}}">Write a story</a>
                    </form>                
                </div>
            </nav>
            <div class="card mt-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs mr-auto" id="myTab" role="tablist">
                        <li class="nav-item mx-1">                            
                            <a class="nav-link active"href="" role="tab">
                                <i class="far fa-clipboard mr-2"></i> Stories
                            </a>
                        </li>                                                
                    </ul>                    
                </div>
                <div class="card-body">
                    <div class="tab-content m-1" id="myTabContent">
                        <div class="tab-pane fade show active" id="courses">
                            @if ($post->count() == 0)
                                <div class="row  mt-5 mb-5">
                                    <div class="col-sm text-center">
                                        <h5 class="text-center">You don't have any Stories</h5>                                        
                                        <p>Create your first story</p>
                                    </div>
                                </div>
                            @else
                                <table class="table mb-3" id="address-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center border-top-0">#</th>
                                            <th class="text-center border-top-0">Story Title</th>
                                            <th class="text-center border-top-0">Published Date</th>
                                            <th class="text-center border-top-0">Category</th>
                                            <th class="text-center border-top-0 pr-4 pb-2">                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                                                                                                
                                        @foreach ($post as $item) 
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center"><b>{{$item->title}}</b></td>
                                                <td class="text-center">{{$item->tanggal}}</td>
                                                <td class="text-center">{{$item->category->nama}}</td>
                                                <td class="text-center fit">
                                                    <button class="btn btn-sm my-0 btn-outline-primary">Preview</button>
                                                    <a class="btn btn-sm my-0 btn-outline-success" href="{{route('stories.edit', $item->id)}}">Edit</a>
                                                    <form class="d-inline" action="{{route('stories.destroy', $item->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm my-0 btn-outline-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            @endif
                            
                        </div>                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

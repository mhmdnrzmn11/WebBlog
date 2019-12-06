@extends('layouts.creative')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">                            
            <nav class="navbar navbar-expand-sm navbar-dark primary justify-content-between">
                <div class="navbar-brand text-dark">Create a Story</div>
            </nav>
            <hr class="mt-3">   
            <form action="{{route('stories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col col-lg-6">
                        <div class="form-group my-3">
                            <label for="title">Title</label><br>
                            <input type="text" name="title" id="title" class="w-100 form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('title') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group my-3">
                            <label for="category">Category</label><br>
                            <select name="category" id="category" class="w-100 form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ old('category') }}" required>
                                <option value="Active" selected>Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('category') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col col-lg-6">
                        <div class="form-group my-3">
                            <label for="thumbnail">Story Thumbnail <span class="text-muted">(Recomended size is 650 x 350 pixel)</span></label><br>
                            <input type="file" name="thumbnail" id="thumbnail">
                            @if ($errors->has('thumbnail'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('thumbnail') }}</strong></span>
                            @endif                            
                        </div>
                    </div>

                    <div class="col col-lg-12">                                
                        <div class="form-group mt-4">
                            <textarea id="text-content"  name="content" class="w-100 form-control{{$errors->has('content') ? ' is-invalid' : ''}}" id="content" rows="3" value="{{old('content')}}"></textarea>
                            @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('content') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="modal-footer pb-0">
                    <div class="float-right">                        
                        <button type="submit" class="btn btn-outline-primary btn-md">Publish Story</button>
                    </div>
                </div>
            </form>                               
        </div>
    </div>
</div>

@section('scripts')
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('text-content', {
            fontFamily: {
                options: [
                    'default',
                    'Merriweather, arial, sans-serif',
                    'Ubuntu Mono, Courier New, Courier, monospace'
                ]
            },
            filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

@endsection

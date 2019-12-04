@extends('layouts.creative')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">                            
            <nav class="navbar navbar-expand-sm navbar-dark primary justify-content-between">
                <div class="navbar-brand text-dark">Create a Story</div>
            </nav>
            <hr class="mt-3">   
            <form action="" method="post">
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
                            <label for="status">Category</label><br>
                            <select name="status" id="status" class="w-100 form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" value="{{ old('status') }}" required>
                                <option value="Active" selected>Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('status') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col col-lg-12">
                        <div class="form-group">
                            <label>Subject : </label>
                        </div>
                    </div>
                    <div class="col col-lg-12">                                
                        <textarea id="text-content"  name="content" class="w-100 form-control{{$errors->has('content') ? ' is-invalid' : ''}}" id="content" rows="3" value="{{old('content')}}"></textarea>
                        @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('content') }}</strong></span>
                        @endif                                
                    </div>
                </div>
                
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
            filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

@endsection

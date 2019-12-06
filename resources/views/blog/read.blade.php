@extends('layouts.creative')

@section('styles')
<style>
#content p {
    text-align: justify;
}
</style>
@endsection

@section('content')


<div class="container">
    <div class="row">

        <div class="col-lg-8">
            
            <span class="text-muted">{{$post->category->nama}}</span>
            <h4 class="my-3">{{$post->title}}</h4>
            <img src="{{asset('storage/uploads/'.$post->thumbnail)}}" alt="" style="width:100%">
            <hr>                
            
            <div id="content">
                <?php echo $post->content ?>
            </div>
            
        </div>
        <div class="col-lg-4">            
            <div class="card">                
                <div class="card-body">
                    <h5 class="card-title pl-2">Baca juga</h5>
                    @foreach ($baca as $item)
                    <a href="{{route('story.read', $item->id)}}" class="btn btn-link w-100 text-left">{{$item->title}}</a>                        
                    @endforeach
                </div>
            </div>            
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {        
       $('#content table').addClass('table table-bordered');
       $('#content table').removeAttr('style');
       $('#content table').removeAttr('border');

       $('#content img').removeAttr('style');
       $('#content img').attr('style', 'width:100%');
    });
</script>
@endsection
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
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
                                <th class="text-center border-top-0">Lesson Title</th>
                                <th class="text-center border-top-0">Status</th>
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
                                    <td class="text-center fit">
                                        <button class="btn btn-sm my-0 btn-outline-primary">Preview</button>
                                        <button class="btn btn-sm my-0 btn-outline-success">Edit</button>                                                    
                                        <form class="d-inline" action="" method="post">
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
    </body>
</html>

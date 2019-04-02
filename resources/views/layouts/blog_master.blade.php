
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>My Blog Posts</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <!-- Custom styles for this template -->
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body>

        @include('layouts.includes.blog_nav')
        @if($flash=session("message"))
            <div id="flash-message" class='alert alert-success'  role='alert'>

            {{$flash}}

            </div> 
        @endif
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">Important Articles</h1>
                <p class="lead blog-description">Important Articles</p>
            </div>
        </div>

        <div class="container">

            <div class="row">

                @yield('content')

                @include('layouts.includes.blog_sidebar') 

            </div><!-- /.row -->

        </div><!-- /.container -->

        @include('layouts.includes.blog_footer')
    </body>
</html>

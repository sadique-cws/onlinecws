<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Online cws</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <a href="" class="navbar-brand">Online CWS</a>

      <form action="" class="form-inline mx-auto">
          <input type="text" class="form-control" size="70" placeholder="search course">
          <input type="submit" class="btn btn-danger">
      </form>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="" class="nav-link">About</a></li>
        <li class="nav-item"><a href="" class="nav-link">Cart</a></li>
      </ul>
    </nav>

    
      @if (session("msg"))
        <div class="alert alert-success">
            {{session("msg")}}
        </div>
      @endif
      
    </ul>

    @section('content')
        @show



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
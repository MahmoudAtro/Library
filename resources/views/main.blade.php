<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">  </head>
  <body>
   

    <nav class="navbar navbar-expand-lg" style="background: #e3f2fd">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">AlManara Library</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('book.index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('about')}}">About us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}">Contact me</a>
              </li>
            </ul>
          </div>
          @if (!Auth::check())
                <div class="buttons" style="float:right;">
                    <a href="/register"><button type="button" class="btn btn-outline-danger" style="margin: 5px; color:black;">Register</button></a>
                    <a href="/login"><button type="button" class="btn btn-outline-danger" style="margin: 5px; color:black;">Login</button></a>
                </div>
            
          @endif
        </div>
      </nav>
<br>
  


    
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
  
    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/library2.jpeg" alt="Manara Library" class="d-block w-100" style="height: 700px;">
      </div>
      <div class="carousel-item">
        <img src="img/library.jpeg" alt="Manara Library" class="d-block w-100"  style="height: 700px;">
      </div>
      {{-- <div class="carousel-item">
        <img src="ny.jpg" alt="Manara Library" class="d-block w-100">
      </div> --}}
    </div>
  
    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <div class="content" style="position: absolute; top:50%; left:40%; 
  ">
    <div class="text" style="text-align: center; color:white;">
        <h2>Wellcome in Almanara Library</h2>
        <h5>Library Managment System</h5>
        <h6>By: Mahmoud Atro</h6>
    </div>
    <div class="buttons" style="display:flex; justify-content:center;">
        <a href="/register"><button type="button" class="btn btn-primary" style="margin: 5px; color:white;">Create Account</button></a>
        <a href="/login"><button type="button" class="btn btn-primary" style="margin: 5px; color:white;">Login Account</button></a>
    </div>
  </div>

   
  <footer class="bg-body-tertiary text-center">
    <!-- Grid container -->
    <div class="container p-4"></div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2024 Copyright:
      <a class="text-body" href="#">Mahmoud Atro</a>
    </div>
    <!-- Copyright -->
  </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>

@section('title' , 'AlManara Library')
    

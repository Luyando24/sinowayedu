@extends('layouts.app')

@section('title', 'Home')

@section('content')
<x-hero :heroes="$heroes" :degrees="$degrees" :cities="$cities" />

<x-universities :featuredUniversities="$featuredUniversities" />
<x-about-section />
<x-study-options :studyOptions="$studyOptions" />
<x-featured-cities :cities="$cities" />
  
@endsection


<style>
    .primary-button{
    background-color: #3EA2A4;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 27px;
    cursor: pointer;
}

.primary-button:hover{
    background-color: #2A7B7C;
    color: white;
}

.primary-button:active{
    background-color: #1A4D4E;
}

.primary-color{
    color: #3EA2A4;
}

.heading{
    font-weight: bold;
    color: #1A4D4E;
}

.secondary-color{
    color: #FFDD02;
}
.carousel-item img {
    height: 500px; /* Set the desired height */
    object-fit: cover; /* Cover the entire area without distortion */
    border-radius: 0px;
}
.carousel{
    margin-top: -25px;
}
.carousel-caption-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
    backdrop-filter: blur(5px);
  }
  
.university-card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;

}
.badge-option {
    background: linear-gradient(135deg, #3EA2A4, #1A4D4E);
    color: white;
    font-weight: 500;
    font-size: 1rem;
    transition: transform 0.2s ease;
    cursor: pointer;
}

.badge-option:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-body {
    background-color: white;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 0.9rem;
    color: #6c757d;
}
footer li a:hover {
    color: #3EA2A4;

}
.navbar-brand img {
    height: 60px; 
    width: auto;
}
.university-card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

@media (max-width: 576px) {
    .carousel-caption-overlay {
      position: relative !important;
      padding: 1rem 1rem !important;
      background-color: rgba(0, 0, 0, 0.6);
      text-align: center;
    }
  
    .carousel-caption-overlay h1,
    .carousel-caption-overlay h5 {
      font-size: 1.25rem;
      line-height: 1.4;
    }
  
    .carousel-caption-overlay form .row {
      flex-direction: column;
      align-items: stretch;
    }
  
    .carousel-caption-overlay .form-select,
    .carousel-caption-overlay .form-control,
    .carousel-caption-overlay .btn {
      width: 100% !important;
      max-width: 100% !important;
      margin-bottom: 0.75rem;
    }
  
    .carousel-caption-overlay button[type="submit"] {
      margin-top: 0.5rem;
    }
  }
  

</style>
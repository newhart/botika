@extends('app')

@section('content')
     <!-- Dashboard Section Start -->
     @include('components.home-section')
     <!-- Dashboard Section End -->
 
     <!-- Service Section Start -->
     @include('components.service-section')
     <!-- Service Section End -->
 
     <!-- Product Section Start -->
     @include('components.product-section')   
     <!-- Product Section End -->
 
     <!-- Banner Section Start -->
     @include('components.bannier-section')   
     <!-- Banner Section End -->
 
     <!-- Best Seller Section Start -->
    
     <!-- Best Seller Section End -->
     @include('components.best-seller')   
     <!-- Newsletter Section Start -->
@endsection
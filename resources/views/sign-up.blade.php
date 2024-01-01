@extends('app')

@section('content')
@include('components.crumb' , ['title' => 'Sign In' , 'sub_title' => 'Sign In'])
@include('components.register-form')
@endsection
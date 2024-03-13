@extends('app')
@section('content')
    @include('components.crumb', ['title' => $product?->name, 'sub_title' => $product?->name])
    @include('components.detail-product', ['product' => $product])
    @include('components.related', ['product_related' => $product_related])
@endsection

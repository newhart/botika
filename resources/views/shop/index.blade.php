@extends('app')

@section('content')
    @include('components.crumb', ['title' => 'Shop List', 'sub_title' => 'Shop List'])
    <!-- Shop Section Start -->
    <section class="section-b-space shop-section">
        <shop-list url="{{ asset('') }}" />
    </section>
    <!-- Shop Section End -->
@endsection

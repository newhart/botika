@extends('app')

@section('content')
    @include('components.crumb', ['title' => 'Wishlist', 'sub_title' => 'Wishlist'])

    <!-- Wishlist Section Start -->
    <section class="wishlist-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-3 g-2">
                @foreach ($wishlists as $wishlist)
                    <div class="col-xxl-2 col-lg-3 col-md-4 col-6 product-box-contain">
                        <div class="product-box-3 h-100">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="{{ route('products.detail', ['slug' => $wishlist->products[0]->page_title]) }}">
                                        <img src="{{ $wishlist->products[0]?->images[0]?->imageUrl() }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="product-header-top">
                                        <button class="btn wishlist-button close_button">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">
                                        @foreach ($wishlist->products[0]->categories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </span>
                                    <a
                                        href="{{ route('products.detail', ['slug' => $wishlist->products[0]->page_title]) }}">
                                        <h5 class="name">{{ $wishlist->products[0]->name }}</h5>
                                    </a>
                                    <h6 class="unit mt-1">{{ $wishlist->products[0]->weight }}
                                        {{ $wishlist->products[0]?->unit }}</h6>
                                    <h5 class="price">
                                        <span class="theme-color">${{ $wishlist->products[0]?->price }}</span>
                                        <del>${{ $wishlist->products[0]->compare_at_price }}</del>
                                    </h5>

                                    <div class="add-to-cart-box bg-white mt-2">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-gray">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group bg-white">
                                                <button type="button" class="qty-left-minus bg-gray" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="0">
                                                <button type="button" class="qty-right-plus bg-gray" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
@endsection

@php
    $products ??= [];
@endphp
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-9 col-xl-8">
                <div class="title title-flex">
                    <div>
                        <h2>Top Save Today</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="{{ asset('assets/svg/leaf.svg') }}#leaf"></use>
                            </svg>
                        </span>
                        <p>Don't miss this opportunity at a special discount just for this week.</p>
                    </div>
                    {{-- <div class="timing-box">
                        <div class="timing">
                            <i data-feather="clock"></i>
                            <h6 class="name">Expires in :</h6>
                            <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                <ul>
                                    <li>
                                        <div class="counter">
                                            <div class="days">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="hours">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="minutes">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="seconds">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="section-b-space">
                    <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 no-arrow">
                        @foreach ($products as $product)
                            <div>
                                <div class="product-box product-white-bg wow fadeIn">
                                    <div class="product-image">
                                        <a href="{{ route('products.detail', ['slug' => $product->page_title]) }}">
                                            <img src="{{ $product->images[0]?->imageUrl() }}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#view-{{ $product->id }}">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                <a href="compare.html">
                                                    <i data-feather="refresh-cw"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="{{ route('whislist.index', ['user' => auth()?->user()?->id ?? 1, 'product' => $product->id]) }}"
                                                    class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail position-relative">
                                        <a href="product-left-thumbnail.html">
                                            <h6 class="name">
                                                {{ $product->name }}
                                            </h6>
                                        </a>

                                        <h6 class="sold weight text-content fw-normal">{{ $product->weight }}
                                            {{ $product->unit }}</h6>

                                        <h6 class="price theme-color">${{ $product->price }}</h6>

                                        <div class="add-to-cart-btn-2 add-to-cart-box addtocart_btn">
                                            <button class="btn addcart-button btn buy-button"><i
                                                    class="fa-solid fa-plus"></i></button>
                                            <div class="cart_qty qty-box-2">
                                                <div class="input-group">
                                                    <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>
                                                    <input class="form-control input-number qty-input" type="text"
                                                        name="quantity" value="1">
                                                    <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @include('components.modal.modal-detail', [
                                'product' => $product,
                            ])
                        @endforeach

                    </div>
                </div>

                <div class="title">
                    <h2>Bowse by Categories</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="{{ asset('assets/svg/leaf.svg') }}#leaf"></use>
                        </svg>
                    </span>
                    <p>Top Categories Of The Week</p>
                </div>

                <div class="category-slider-2 product-wrapper no-arrow">
                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/decorations.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Decorations</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/pillows.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Bed linen</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/cushions.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Cushions</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/blankets.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Blankets</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/gift.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Giftwraps</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/sleepware.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Sleepwear</h5>
                            </div>
                        </a>
                    </div>

                    <div>
                        <a href="shop-left-sidebar.html" class="category-box category-dark">
                            <div>
                                <img src="{{ asset('assets/images/furniture/icon/bakeware.svg') }}"
                                    class="blur-up lazyload" alt="">
                                <h5>Cookware & Bakeware</h5>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="section-t-space section-b-space">
                    <div class="row g-md-4 g-3">
                        <div class="col-md-6">
                            <div class="banner-contain hover-effect">
                                <img src="{{ asset('assets/images/furniture/banner/4.jpg') }}"
                                    class="bg-img blur-up lazyload" alt="">
                                <div class="banner-details p-center-left p-4">
                                    <div>
                                        <h3 class="text-kaushan text-yellow">50% offer</h3>
                                        <h4 class="theme-color mb-2 fw-normal"><span
                                                class="theme-color fw-bold">Restyling</span> your Home</h4>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-furniture btn-sm mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="banner-contain hover-effect">
                                <img src="{{ asset('assets/images/furniture/banner/5.jpg') }}"
                                    class="bg-img blur-up lazyload" alt="">
                                <div class="banner-details p-center-left p-4">
                                    <div>
                                        <h3 class="text-kaushan text-yellow">50% offer</h3>
                                        <h4 class="theme-color mb-2 fw-normal"><span class="theme-color fw-bold">New
                                                Elite</span> Collections</h4>
                                        <button onclick="location.href = 'shop-left-sidebar.html';"
                                            class="btn btn-furniture btn-sm mend-auto">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title d-block">
                    <h2>Food Cupboard</h2>
                    <span class="title-leaf">
                        <svg class="icon-width">
                            <use xlink:href="{{ asset('assets/svg/leaf.svg') }}#leaf"></use>
                        </svg>
                    </span>
                    <p>A virtual assistant collects the products from your list</p>
                </div>

                <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-sm-3 row-cols-2 g-sm-4 g-3 no-arrow">
                    @foreach ($products as $product)
                        <div>
                            <div class="product-box product-white-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="{{ route('products.detail', ['slug' => $product->page_title]) }}">
                                        <img src="{{ $product->images[0]?->imageUrl() }}"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view-{{ $product->id }}">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="#" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail position-relative">
                                    <a
                                        href="{{ route('whislist.index', ['user' => auth()?->user()?->id ?? 1, 'product' => $product->id]) }}">
                                        <h6 class="name">{{ $product->name }}</h6>
                                    </a>

                                    <h6 class="sold weight text-content fw-normal">{{ $product->weight }}
                                        {{ $product->unit }}</h6>

                                    <h6 class="price theme-color">{{ $product->price }}</h6>

                                    <div class="add-to-cart-btn-2 addtocart_btn">
                                        <button class="btn addcart-button btn buy-button"><i
                                                class="fa-solid fa-plus"></i></button>
                                        <div class="cart_qty qty-box-2">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                    name="quantity" value="1">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('components.modal-detail')
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                <div class="p-sticky">
                    <div class="category-menu">
                        <h3>Shop By Product</h3>
                        <ul class="border-bottom-0">
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/decorations.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Decorations</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/pillows.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Bed Linen</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/cushions.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Cushions</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/blankets.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Blankets</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/gift.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Giftwraps</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/sleepware.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Sleepwear</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/bakeware.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Cookware & Bakeware</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/room-fragrance.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Room Fragrance</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/tableware.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Servingware & Tableware</a>
                                    </h5>
                                </div>
                            </li>
                            <li>
                                <div class="category-list">
                                    <img src="{{ asset('assets/images/furniture/icon/shower.svg') }}"
                                        class="blur-up lazyload" alt="">
                                    <h5>
                                        <a href="shop-left-sidebar.html">Bath & Shower</a>
                                    </h5>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="ratio_156 section-t-space">
                        <div class="home-contain hover-effect">
                            <img src="{{ asset('assets/images/furniture/banner/3.jpg') }}"
                                class="bg-img blur-up lazyload" alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h4 class="text-yellow home-banner text-kaushan">New Arrival</h4>
                                    <h3 class="text-uppercase theme-color fw-bold mb-1">Desk Table</h3>
                                    <p class="text-content mb-3">Top Selling Of The Week! Exclusive Offer!</p>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-furniture btn-md mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-t-space">
                        <div class="category-menu">
                            <h3>Trending Products</h3>

                            <ul class="product-list border-0 p-0 d-block">
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('assets/images/furniture/2.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Meatigo Premium Goat Curry</h6>
                                                </a>
                                                <span>450 G</span>
                                                <h6 class="price theme-color">$ 70.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('assets/images/furniture/3.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Coral Bean Bag Chair</h6>
                                                </a>
                                                <span>450 G</span>
                                                <h6 class="price theme-color">$ 40.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-0">
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{ asset('assets/images/furniture/5.png') }}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html" class="text-title">
                                                    <h6 class="name">Benefits of using natural stone tile flooring
                                                    </h6>
                                                </a>
                                                <span>1 KG</span>
                                                <h6 class="price theme-color">$ 80.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

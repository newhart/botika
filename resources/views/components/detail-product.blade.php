@php
    $product ??=null ; 
@endphp
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="product-main-2 no-arrow">
                                        @foreach ($product?->images ?? []  as $image_product)
                                        <div>
                                            <div class="slider-image">
                                                <img src="{{$image_product->imageUrl()}}"
                                                    data-zoom-image="{{$image_product->imageUrl()}}"
                                                    class="img-fluid image_zoom_cls-1 blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>

                                <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                    <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                        @foreach ($product?->images ?? [] as $key =>  $image)
                                        <div>
                                            <div class="sidebar-image">
                                                <img src="{{$image->imageUrl()}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h6 class="offer-top">30% Off</h6>
                            <h2 class="name">{{$product?->name}}</h2>
                            <div class="price-rating">
                                <h3 class="theme-color price">${{$product?->price}} <del class="text-content">${{$product?->compare_at_price}}</del> <span
                                        class="offer theme-color">(8% off)</span></h3>
                                <div class="product-rating custom-rate">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span class="review">23 Customer Review</span>
                                </div>
                            </div>

                            <div class="procuct-contain">
                                {!!$product?->description!!}
                            </div>

                            <div class="product-packege">
                                <div class="product-title">
                                    <h4>Weight</h4>
                                </div>
                                <ul class="select-packege">
                                    <li>
                                        <a href="javascript:void(0)" class="active">1/2 KG</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">1 KG</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">1.5 KG</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Red Roses</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">With Pink Roses</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="time deal-timer product-deal-timer mx-md-0 mx-auto" id="clockdiv-1"
                                data-hours="1" data-minutes="2" data-seconds="3">
                                <div class="product-title">
                                    <h4>Hurry up! Sales Ends In</h4>
                                </div>
                                <ul>
                                    <li>
                                        <div class="counter d-block">
                                            <div class="days d-block">
                                                <h5></h5>
                                            </div>
                                            <h6>Days</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter d-block">
                                            <div class="hours d-block">
                                                <h5></h5>
                                            </div>
                                            <h6>Hours</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter d-block">
                                            <div class="minutes d-block">
                                                <h5></h5>
                                            </div>
                                            <h6>Min</h6>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter d-block">
                                            <div class="seconds d-block">
                                                <h5></h5>
                                            </div>
                                            <h6>Sec</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <add-to-cart-detail product="{{ $product }}" position="modal"
                            image_url="{{ $product->images[0]?->imageUrl() }}"/>

                            <div class="buy-box">
                                <a href="wishlist.html">
                                    <i data-feather="heart"></i>
                                    <span>Add To Wishlist</span>
                                </a>

                                <a href="compare.html">
                                    <i data-feather="shuffle"></i>
                                    <span>Add To Compare</span>
                                </a>
                            </div>

                            <div class="pickup-box">
                                <div class="product-title">
                                    <h4>Store Information</h4>
                                </div>

                                <div class="pickup-detail">
                                    <h4 class="text-content">
                                        {{$product?->meta_description}}
                                    </h4>
                                </div>

                                <div class="product-info">
                                    <ul class="product-info-list product-info-list-2">
                                        <li>Type : <a href="javascript:void(0)">Black Forest</a></li>
                                        <li>SKU : <a href="javascript:void(0)">{{$product?->sku}}</a></li>
                                        <li>MFG : <a href="javascript:void(0)">Jun 4, 2022</a></li>
                                        <li>Stock : <a href="javascript:void(0)">{{$product?->stock}} Items Left</a></li>
                                        <li>Tags : <a href="javascript:void(0)">{{$product?->tags}}</a>
                                            </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="paymnet-option">
                                <div class="product-title">
                                    <h4>Guaranteed Safe Checkout</h4>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('assets/images/product/payment/1.svg')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('assets/images/product/payment/2.svg')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('assets/images/product/payment/3.svg')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('assets/images/product/payment/4.svg')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <img src="{{asset('assets/images/product/payment/5.svg')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                        data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                        aria-selected="false">Additional info</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                        data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                        aria-selected="false">Care Instuctions</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                        data-bs-target="#review" type="button" role="tab" aria-controls="review"
                                        aria-selected="false">Review</button>
                                </li>
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    {!!$product?->description!!}
                                </div>

                                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="table-responsive">
                                        <table class="table info-table">
                                            <tbody>
                                                <tr>
                                                    <td>Specialty</td>
                                                    <td>Vegetarian</td>
                                                </tr>
                                                <tr>
                                                    <td>Ingredient Type</td>
                                                    <td>Vegetarian</td>
                                                </tr>
                                                <tr>
                                                    <td>Brand</td>
                                                    <td>Lavian Exotique</td>
                                                </tr>
                                                <tr>
                                                    <td>Form</td>
                                                    <td>Bar Brownie</td>
                                                </tr>
                                                <tr>
                                                    <td>Package Information</td>
                                                    <td>Box</td>
                                                </tr>
                                                <tr>
                                                    <td>Manufacturer</td>
                                                    <td>Prayagh Nutri Product Pvt Ltd</td>
                                                </tr>
                                                <tr>
                                                    <td>Item part number</td>
                                                    <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
                                                </tr>
                                                <tr>
                                                    <td>Net Quantity</td>
                                                    <td>40.00 count</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                                    <div class="information-box">
                                        <ul>
                                            <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                                stored in an air conditioned environment.</li>

                                            <li>Slice and serve the cake at room temperature and make sure
                                                it is not exposed to heat.</li>

                                            <li>Use a serrated knife to cut a fondant cake.</li>

                                            <li>Sculptural elements and figurines may contain wire supports
                                                or toothpicks or wooden skewers for support.</li>

                                            <li>Please check the placement of these items before serving to
                                                small children.</li>

                                            <li>The cake should be consumed within 24 hours.</li>

                                            <li>Enjoy your cake!</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <div class="review-box">
                                        <div class="row g-4">
                                            <div class="col-xl-6">
                                                <div class="review-title">
                                                    <h4 class="fw-500">Customer reviews</h4>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="product-rating">
                                                        <ul class="rating">
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star" class="fill"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star"></i>
                                                            </li>
                                                            <li>
                                                                <i data-feather="star"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="ms-3">4.2 Out Of 5</h6>
                                                </div>

                                                <div class="rating-box">
                                                    <ul>
                                                        <li>
                                                            <div class="rating-list">
                                                                <h5>5 Star</h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: 68%" aria-valuenow="100"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        68%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="rating-list">
                                                                <h5>4 Star</h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: 67%" aria-valuenow="100"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        67%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="rating-list">
                                                                <h5>3 Star</h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: 42%" aria-valuenow="100"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        42%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="rating-list">
                                                                <h5>2 Star</h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: 30%" aria-valuenow="100"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        30%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="rating-list">
                                                                <h5>1 Star</h5>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        style="width: 24%" aria-valuenow="100"
                                                                        aria-valuemin="0" aria-valuemax="100">
                                                                        24%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="review-title">
                                                    <h4 class="fw-500">Add a review</h4>
                                                </div>

                                                <form class="row g-4" method="POST" action="{{route('review.store' , $product)}}">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <div class="form-floating theme-form-floating">
                                                            @include('share.input' , ['name'=> 'name', 'placeholder' => 'Your Name' , 'type' => 'text'])
                                                            <label for="name">Your Name</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating theme-form-floating">
                                                            @include('share.input' , ['name'=> 'email', 'placeholder' => 'Email Address' , 'type' => 'email'])
                                                            <label for="email">Email Address</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating theme-form-floating">
                                                            @include('share.input' , ['name'=> 'website', 'placeholder' => 'Website' , 'type' => 'text'])
                                                            <label for="website">Website</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-floating theme-form-floating">
                                                            @include('share.input' , ['name'=> 'title', 'placeholder' => 'Review Title' , 'type' => 'text'])
                                                            <label for="review1">Review Title</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-floating theme-form-floating">
                                                            @include('share.input' , ['name'=> 'comment', 'placeholder' => 'Leave a comment here' , 'type' => 'textarea'])
                                                            <label for="floatingTextarea2">Write Your
                                                                Comment</label>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary">submit</button>
                                                </form>
                                            </div>

                                            <div class="col-12">
                                                <div class="review-title">
                                                    <h4 class="fw-500">Customer questions & answers</h4>
                                                </div>

                                                <div class="review-people">
                                                    <ul class="review-list">
                                                        @foreach ($product?->reviews ?? [] as $review)
                                                        <li>
                                                            <div class="people-box">
                                                                <div>
                                                                    <div class="people-image">
                                                                        <img src="{{asset('assets/images/review/1.jpg')}}"
                                                                            class="img-fluid blur-up lazyload"
                                                                            alt="">
                                                                    </div>
                                                                </div>

                                                                <div class="people-comment">
                                                                    <a class="name"
                                                                        href="javascript:void(0)">{{$review->name}}</a>
                                                                    <div class="date-time">
                                                                        <h6 class="text-content">14 Jan, 2022 at
                                                                            12.58 AM</h6>

                                                                        <div class="product-rating">
                                                                            <ul class="rating">
                                                                                <li>
                                                                                    <i data-feather="star"
                                                                                        class="fill"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i data-feather="star"
                                                                                        class="fill"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i data-feather="star"
                                                                                        class="fill"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i data-feather="star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i data-feather="star"></i>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>

                                                                    <div class="reply">
                                                                        <p>{{$review->comment}}<a
                                                                                href="javascript:void(0)">Reply</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                <div class="right-sidebar-box">
                    <div class="vendor-box">
                        <div class="verndor-contain">
                            <div class="vendor-image">
                                <img src="{{asset('assets/images/product/vendor.png')}}" class="blur-up lazyload" alt="">
                            </div>

                            <div class="vendor-name">
                                <h5 class="fw-500">Noodles Co.</h5>

                                <div class="product-rating mt-1">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span>(36 Reviews)</span>
                                </div>

                            </div>
                        </div>

                        <p class="vendor-detail">Noodles & Company is an American fast-casual
                            restaurant that offers international and American noodle dishes and pasta.</p>

                        <div class="vendor-list">
                            <ul>
                                <li>
                                    <div class="address-contact">
                                        <i data-feather="map-pin"></i>
                                        <h5>Address: <span class="text-content">1288 Franklin Avenue</span></h5>
                                    </div>
                                </li>

                                <li>
                                    <div class="address-contact">
                                        <i data-feather="headphones"></i>
                                        <h5>Contact Seller: <span class="text-content">(+1)-123-456-789</span></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Trending Product -->
                    <div class="pt-25">
                        <div class="category-menu">
                            <h3>Trending Products</h3>

                            <ul class="product-list product-right-sidebar border-0 p-0">
                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{asset('assets/images/vegetable/product/23.png')}}"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html">
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
                                            <img src="{{asset('assets/images/vegetable/product/24.png')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">Dates Medjoul Premium Imported</h6>
                                                </a>
                                                <span>450 G</span>
                                                <h6 class="price theme-color">$ 40.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{asset('assets/images/vegetable/product/25.png')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">Good Life Walnut Kernels</h6>
                                                </a>
                                                <span>200 G</span>
                                                <h6 class="price theme-color">$ 52.00</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="mb-0">
                                    <div class="offer-product">
                                        <a href="product-left-thumbnail.html" class="offer-image">
                                            <img src="{{asset('assets/images/vegetable/product/26.png')}}"
                                                class="blur-up lazyload" alt="">
                                        </a>

                                        <div class="offer-detail">
                                            <div>
                                                <a href="product-left-thumbnail.html">
                                                    <h6 class="name">Apple Red Premium Imported</h6>
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

                    <!-- Banner Section -->
                    <div class="ratio_156 pt-25">
                        <div class="home-contain">
                            <img src="{{asset('assets/images/vegetable/banner/8.jpg')}}" class="bg-img blur-up lazyload"
                                alt="">
                            <div class="home-detail p-top-left home-p-medium">
                                <div>
                                    <h6 class="text-yellow home-banner">Seafood</h6>
                                    <h3 class="text-uppercase fw-normal"><span
                                            class="theme-color fw-bold">Freshes</span> Products</h3>
                                    <h3 class="fw-light">every hour</h3>
                                    <button onclick="location.href = 'shop-left-sidebar.html';"
                                        class="btn btn-animation btn-md fw-bold mend-auto">Shop Now <i
                                            class="fa-solid fa-arrow-right icon"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
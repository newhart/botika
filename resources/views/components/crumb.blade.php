@php
    $title ??= '404 Page'; 
    $sub_title ??='404'
@endphp
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>{{$title}}</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$sub_title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
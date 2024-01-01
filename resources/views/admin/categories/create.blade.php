@extends('base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header-2">
                            <h5>Category Information</h5>
                        </div>

                        <form class="theme-form theme-form-2 mega-form" method="POST" action="{{$category->name ? route('categories.update' , $category) :  route('categories.store')}}" enctype="multipart/form-data">
                            @if ($category->name)
                                @method('PUT')
                            @else
                                @method('POST')
                            @endif
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                <div class="col-sm-9">
                                    @include('share.input' , ['name' => 'name' , 'placeholder' => 'Category Name' ,'value' => $category->name])
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="form-label-title col-sm-3 mb-0">Slug</label>
                                <div class="col-sm-9">
                                    @include('share.input' , ['name' => 'slug' , 'placeholder' => 'Category slug' , 'value' => $category->slug])
                                </div>
                            </div>

                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Category
                                    Image</label>
                                <div class="form-group col-sm-9">
                                    <div class="dropzone-wrapper" id="file-preview" style="background-image:url({{asset($category->name ? $category->imageUrl() : '')}}); background-repeat: no-repeat; background-size: cover; ">
                                        <div class="dropzone-desc">
                                            <i class="ri-upload-2-line"></i>
                                            <p>Choose an image file or drag it here.</p>
                                        </div>
                                        <input type="file" name="image" class="dropzone" id="input-file" value="{{$category->image}}" onchange="handelChange()">
                                    </div>
                                </div>
                                <div></div>
                            </div>

                            {{-- <div class="mb-4 row align-items-center">
                                <div class="col-sm-3 form-label-title">Select Category Icon</div>
                                <div class="col-sm-9">
                                    <div class="dropdown icon-dropdown">
                                        <button class="btn dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                            Select Icon
                                        </button>
                                        <ul class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/vegetable.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/cup.svg')}}"
                                                        class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/meats.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/breakfast.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/frozen.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/biscuit.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/grocery.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/drink.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/milk.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <img src="{{asset('assets/svg/1/pet.svg')}}"
                                                        class="img-fluid" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <button class="btn btn-primary" type="submit">{{$category->name ? 'update' : 'create'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script defer>
        const previewPhoto = (input) => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('file-preview');
                fileReader.onload = event => {
                    preview.style.backgroundImage = `url(${event.target.result})`
                    preview.style.backgroundRepeat = `no-repeat`
                    // preview.style.backgroundSize = 'cover'; 
                }
                fileReader.readAsDataURL(file[0]);
            }
        }

        const handelChange = () =>  {
            console.log('change');
            const input = document.getElementById('input-file');
            input.addEventListener('change', previewPhoto(input));
        }
    </script>
@endsection
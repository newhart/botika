@extends('base')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title d-sm-flex d-block">
                    <h5>Products List</h5>
                    <div class="right-options">
                        <ul>
                            <li>
                                <a href="javascript:void(0)">import</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Export</a>
                            </li>
                            <li>
                                <a class="btn btn-solid" href="{{route('products.create')}}">Add Product</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table all-package theme-table table-product" id="table_id">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Current Qty</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="table-image">
                                            <img src="{{asset($product->images[0]->imageUrl())}}" class="img-fluid"
                                                alt="">
                                        </div>
                                    </td>

                                    <td>{{$product->name}}</td>

                                    <td>
                                        @foreach ($product->categories as $categorie)
                                            {{$categorie->name}}, 
                                        @endforeach
                                    </td>

                                    <td>{{$product->stock}}</td>

                                    <td class="td-price">${{$product->price}}</td>

                                    <td class="status-danger">
                                        <span>{{$product->status}}</span>
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="order-detail.html">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('product.edit', $product)}}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalToggle"
                                                    getValue({{$product}})
                                                    >
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-block text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="remove-box">
                    <p>The permission for the use/group, preview is inherited from the object, object will create a
                        new permission for this object</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                <form action="">
                    <input type="hidden" name="id" id="id_category">
                    <button type="button" class="btn btn-animation btn-md fw-bold" onclick="confirDelete()">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer>
    function getValue(category){
        const id = document.getElementById('id_category');
        id.value = category.id
    }

    function confirDelete(){
        const category = document.getElementById('id_category');
        axios.post(`/admin/products/delete/${category.value}`)
        .then((result) => {
            console.log(result);
            if(result.data){
                window.location = '/admin/products'
            }
        }).catch((err) => {
            console.log(err);
        });
    }
</script>
@endsection
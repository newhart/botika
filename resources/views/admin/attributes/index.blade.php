@extends('base')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>All Attributes</h5>
                    <form class="d-inline-flex">
                        <a href="{{route('attribute.create')}}" class="align-items-center btn btn-theme d-flex">
                            <i data-feather="plus-square"></i>Add New
                        </a>
                    </form>
                </div>

                <div class="table-responsive category-table">
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($attributes as $attribute)
                            <tr>
                                <td>{{$attribute->name}}</td>

                                <td>{{$attribute->values}}</td>

                                <td>
                                    <ul>
                                        <li>
                                            <a href="{{route('attribute.edit', $attribute)}}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                getValue({{$attribute}})
                                                data-bs-target="#exampleModalToggle">
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
        axios.post(`/admin/attributes/delete/${category.value}`)
        .then((result) => {
            console.log(result);
            if(result.data){
                window.location = '/admin/attributes'
            }
        }).catch((err) => {
            console.log(err);
        });
    }
</script>
@endsection
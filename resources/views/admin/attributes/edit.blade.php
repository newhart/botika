@extends('base')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <livewire:edit-attribute id="{{$attribute->id}}"/> 
            </div>
        </div>
    </div>
</div>
@endsection
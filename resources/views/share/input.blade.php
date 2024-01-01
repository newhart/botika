@php
    $name ??= null ; 
    $type ??= 'text'; 
    $placeholder ??= ''; 
    $value ??=null ; 
@endphp
@if($type === 'textarea')
<textarea placeholder="{{$placeholder}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}"   id="{{$name}}" rows="3">{{$value ? $value : old($name)}}</textarea>
@elseif ($type === 'select')
<select class="js-example-basic-single w-100 form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}">
    <option disabled>Static Menu</option>
    <option>Simple</option>
    <option>Classified</option>
</select>
@else
<input placeholder="{{$placeholder}}" type="{{$type}}" id="{{$name}}" class="form-control @error($name) is-invalid @enderror" value="{{$value ? $value : old($name)}}"
       name="{{$name}}">
@endif

@error($name)
<div class="invalid-feedback">
{{$message}}
</div>
@enderror
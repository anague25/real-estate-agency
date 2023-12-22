@php
    $class ??= null;
@endphp

<div @class(['form-check form-switch',$class])>


    <input type="hidden" value="0" name="{{$name}}">
    <input type="checkbox" @checked(old($name,$value ?? false)) value="1" name="{{$name}}" role="switch" id="{{$name}}" class="form-check-input @error($name) is-invalid @enderror">


    <label for="{{$name}}" class="form-check-label">{{$label}}</label>

    @error($name)
    <div class="invalid-feedback">
            {{$message}}
    </div>
    @enderror

</div>
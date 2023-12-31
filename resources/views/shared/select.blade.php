@php
    $label ??= ucfirst($name);
    $class ??= null;
    $name ??= "";
    $value ??= "";
@endphp

<div @class(['form-group',$class])>
  
    <label for="{{$name}}">{{$label}}</label>
    <select name="{{$name}}[]" id="{{$name}}" multiple>
    
        
        @forelse ($options as $k => $v)
        
            <option @selected($value->contains($k)) value="{{$k}}">{{$v}}</option>
            
        @empty
            
        @endforelse

    </select>
   
        @error($name)
        <div class="invalid-feedback">
                {{$message}}
        </div>
        @enderror
   
</div>
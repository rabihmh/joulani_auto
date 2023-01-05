<div class="form-group">
    <label>{{$label}}</label>
    <input class="form-control" placeholder="{{$placeholder??""}}" type="{{$type ?? 'text'}}" name="{{$name}}"
           value="{{old($name)}}" {{$attributes}}>
    @error($name)
    <div class="alert alert-danger mt-2">{{$message}}</div>
    @enderror
</div>

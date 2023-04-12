@props(['title', 'options','name','id', 'check','value'=>'null' ])
<div class="card-header text-white bg-blue">{{$title}}
    <div class="float-start">
        <i class="fas fa-star"></i>
    </div>
    @if($check)
        <div class="float-start">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="price_type_check">
                <label class="form-check-label" for="price_type_check">إختيار الجميع</label>
            </div>
        </div>
    @endif
</div>
<div class="card-body">
    <input type="hidden" value="{{old($name,$value)}}" name="{{$name}}" id="{{$id}}">
    @foreach($options as $key => $value)
        <div data-id="{{ $key }}" class="{{$id}} btn btn-outline-secondary btn-sm mb-2">{{ $value }}</div>
    @endforeach
</div>


@props([
    'data'=>'',
    'made_id'=>'',
    'mould_id'=>'',
]);
<div class="col-12">
    <div class="card mb-3">
        <div class="card-header text-white bg-blue">الشركة المصنعة</div>
        <div class="card-body">
            <div id="allMake">
                <div class="row">
                    @foreach($data as $value)
                        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-4 text-center mb-2 carMake"
                             data-id="{{$value->id}}">
                            <img src="{{asset('storage/'.$value->image)}}" width="50"
                                 height="50"/>
                            <div>{{$value->name}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-1 mb-1 card-body  d-none " id="chosenCarOnAdd">
                <hr/>
                <input type="hidden" value="{{$made_id}}" name="made_id" id="makes_type">
                <input type="hidden" value="{{$mould_id}}" name="mould_id" id="made_type">
                <div class="row">
                    <div class="col-2 text-center " id="MakeImg">
                    </div>
                    <div class="col-2 text-center make_in" id="MakeName">
                    </div>
                    <div class="col-2 text-center mould_in" id="ModelName">
                    </div>
                    <div class="col-2 text-center">
                        <div class="btn btn-warning" id="deleteUserChoice"><i
                                class="fas fa-trash-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn btn-secondary float-start" id="viewMoreMake">عرض المزيد من الشركات</div>
        </div>
    </div>
</div>

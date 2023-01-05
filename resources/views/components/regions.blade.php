<tr>
    <td>المنطقة</td>
    <td>
        @php
            $regions=\App\Models\Region::select('id','name')->get();
        @endphp
        <select class="form-control" name="region_id">
            <option value="">الرجاء إختيار المدينة</option>

            @foreach($regions as $region)
                <option value="{{$region->id}}">{{$region->name}}</option>
            @endforeach
        </select>
    </td>
</tr>

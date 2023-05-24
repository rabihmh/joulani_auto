@props(['selectedRegionId' => null])

<tr>
    <td>المنطقة</td>
    <td>
        @php
            $regions=\App\Models\Region::select('id','name')->get();
        @endphp
        <select class="form-control" name="region_id">
            <option value="">الرجاء إختيار المدينة</option>

            @foreach($regions as $region)
                <option value="{{$region->id}}" @if($region->id == $selectedRegionId) selected @endif
                >{{$region->name}}</option>
            @endforeach
        </select>
    </td>
</tr>

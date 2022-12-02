<form action="{{route('admin.vehicles.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input name="images[]" type="file" multiple>
    <button type="submit">Send</button>
</form>

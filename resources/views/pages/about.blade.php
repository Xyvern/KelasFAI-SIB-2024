{{-- @extends('layout.layout')
@section('content') --}}
<div class="card-group">
    @foreach ($data as $item)
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">{{$item["nama"]}}</h5>
            <p class="card-text">{{$item["alamat"]}}</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
    @endforeach
</div>
{{-- @endsection --}}
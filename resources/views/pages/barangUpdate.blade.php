@extends('layout.layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <form action="/admin/barang/{{$barang->id_barang}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" value="{{$barang->nama_barang}}" name="nama_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga Barang:</label>
                <input type="text" value="{{$barang->harga_barang}}" name="harga_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="qty_barang">Quantity Barang:</label>
                <input type="text" value="{{$barang->qty_barang}}" name="qty_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gambar_barang">Image:</label>
                <input type="file" value="{{$barang->gambar_barang}}" name="gambar_barang" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection
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
        <form action="/admin/barang/{{$barang->id_barang}}" method="post">
            @csrf
            @method('PUT')
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" id="">
            <br>
            <label for="">Harga Barang</label>
            <input type="number" name="harga_barang" id="" value="{{$barang->harga_barang}}">
            <br>
            <label for="">QTY Barang</label>
            <input type="number" name="qty_barang" id="" value="{{$barang->qty_barang}}">

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
@endsection
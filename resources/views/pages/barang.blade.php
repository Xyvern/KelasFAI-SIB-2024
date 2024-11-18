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
        <form action="/admin/barang" method="post" enctype="multipart/form-data">
        {{-- <form action="/admin/barang" method="post"> --}}
            @csrf
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori Barang:</label>
                <select name="kategori" id="">
                    <option disabled value="0">Pilih kategori</option>
                    @foreach ($kategori as $item)
                        <option value="{{$item["id_kategori"]}}">{{$item["nama_kategori"]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga Barang:</label>
                <input type="text" name="harga_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="qty_barang">Quantity Barang:</label>
                <input type="text" name="qty_barang" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gambar_barang">Image:</label>
                <input type="file" name="gambar_barang" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br>
    <div class="container">
        <h1>Barang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Barang</th>
                    <th>Kategori Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>QTY Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    {{-- @dd($item->kategori) --}}
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar_barang) }}" alt="Gambar Barang" width="100"></td>
                        <td>{{$item->kategori["nama_kategori"]}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->harga_barang}}</td>
                        <td>{{$item->qty_barang}}</td>
                        <td>
                            <a href="/admin/barang/update/{{$item->id_barang}}" class="btn btn-warning">Edit</a>
                            
                            <form action="/admin/barang/{{$item->id_barang}}/{{$item->status_barang}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <br>
    
    
@endsection
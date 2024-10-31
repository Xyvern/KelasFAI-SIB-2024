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
        <h1>Barang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>QTY Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barang as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
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
    <div class="container">
        <form action="/admin/barang" method="post">
            @csrf
            <label for="">Nama Barang</label>
            <input type="text" name="nama_barang" id="">
            <br>
            <label for="">Harga Barang</label>
            <input type="number" name="harga_barang" id="">
            <br>
            <label for="">QTY Barang</label>
            <input type="number" name="qty_barang" id="">

            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
@endsection
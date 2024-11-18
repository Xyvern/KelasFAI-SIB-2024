<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Insert</h1>
        {{-- <form action="/barang" method="post"> --}}
        <form action="{{route('barang.insert')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" name="nama">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Harga Barang" name="harga" min="0">
            </div>
            <button type="submit">Submit</button>
        </form>
        
    </div>
    <br>
    <div class="container">
        <h1>Update</h1>
        {{-- <form action="/admin/barang/1" method="post"> --}}
        <form action="{{route('barang.update',1)}}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" name="nama">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Harga Barang" name="harga" min="0">
            </div>
            <button type="submit">Submit</button>
        </form>
        
    </div>
    <br>
    <div class="container">
        <h1>Delete</h1>
        <form action="/admin/barang/1/0" method="post">
        {{-- <form action="{{route('barang.delete',[1,0])}}" method="post"> --}}
            @method("delete")
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" name="nama">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Harga Barang" name="harga" min="0">
            </div>
            <button type="submit">Submit</button>
        </form>
        
    </div>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
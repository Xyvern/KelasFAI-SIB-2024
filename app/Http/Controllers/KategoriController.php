<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('pages.kategori',[
            'kategori' => $kategori
        ]);
    }

    public function insert(Request $request){
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        $kategori->save();
        return redirect()->back()->with('success','Kategori berhasil ditambahkan');
    }

    public function update(Request $request, $id){
        // $barang = DB::table('barang')
        // ->where('id_barang',$id)
        // ->first();

        $barang = Barang::find($id);
        return view('pages.barangUpdate',[
            'barang' => $barang
        ]);
    }

    public function doUpdate(Request $request,$id){
        // DB::table('barang')
        // ->where('id_barang',$id)
        // ->update([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'qty_barang' => $request->qty_barang
        // ]);
        // if ($image = $request->file('gambar_barang')) {
        //     $path = $image->store('images', 'public');
        // }
        // $barang = Barang::find($id)
        // ->update([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'gambar_barang' => $path,
        //     'qty_barang' => $request->qty_barang
        // ]);
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_barang = $request->harga_barang;
        $barang->qty_barang = $request->qty_barang;
        if ($image = $request->file('gambar_barang')) {
            $path = $image->storeAs('images/' . $barang->id_barang, $image->getClientOriginalName(), 'public');
            $barang->gambar_barang = $path;
        }
        $barang->save();
        // $barang->save();
        return redirect()->route('barang')->with('success','Barang berhasil diupdate');
    }

    public function delete(Request $request,$id,$stat){
        // dd($request);
        // if($stat == 1){
        //     DB::table('barang')
        //     ->where('id_barang',$id)
        //     ->update([
        //         'status_barang' => 0
        //     ]);
        // }else{
        //     DB::table('barang')
        //     ->where('id_barang',$id)
        //     ->delete();
        // }
        $barang = Barang::find($id)->delete();
        return redirect()->back()->with('success','Barang berhasil dihapus');
    }
}

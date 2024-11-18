<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(){
        //Query builder
        // $barang = DB::table('barang')
        // // ->where('status_barang','=',1)
        // ->where('status_barang',1)
        // ->orWhere('qty_barang','>',20)
        // // ->first();
        // ->get();

        // $barang = Barang::all();
        $barang = Barang::where('status_barang',1)->get();
        // $barang = Barang::where('id_barang',1)->first();
        // $barang = Barang::find(1);
        // dd($barang);
        $kategori = Kategori::all();
        return view('pages.barang',[
            'barang' => $barang,
            'kategori' => $kategori,
        ]);
    }

    public function insert(Request $request){
        // dd($request);
        // DB::table('barang')
        // ->insert([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'qty_barang' => $request->qty_barang
        // ]);
        // dd($request->all());
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'qty_barang' => 'required|integer',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // if ($image = $request->file('gambar_barang')) {
        //     $path = $image->store('images', 'public');
        // }
        // $barang = Barang::create([
        //     'nama_barang' => $request->nama_barang,
        //     'harga_barang' => $request->harga_barang,
        //     'qty_barang' => $request->qty_barang,
        //     'gambar_barang' => $path,
        // ]);
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'qty_barang' => $request->qty_barang,
            'id_kategori' => $request->kategori,
        ]);
        if ($image = $request->file('gambar_barang')) {
            $path = $image->storeAs('images/' . $barang->id_barang, $image->getClientOriginalName(), 'public');
            $barang->gambar_barang = $path;
            $barang->save();
        }
        return redirect()->back()->with('success','Barang berhasil ditambahkan');
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

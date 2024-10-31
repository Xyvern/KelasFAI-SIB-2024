<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $barang = Barang::where('status_barang',1)->get();
        $barang = Barang::where('id_barang',1)->first();
        // $barang = Barang::find(1);
        dd($barang);

        return view('pages.barang',[
            'barang' => $barang
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

        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'qty_barang' => $request->qty_barang
        ]);
        $barang->save();
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

        $barang = Barang::find($id)
        ->update([
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'qty_barang' => $request->qty_barang
        ]);
        $barang->save();
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
        $barang -> save();
        return redirect()->back()->with('success','Barang berhasil dihapus');
    }

}

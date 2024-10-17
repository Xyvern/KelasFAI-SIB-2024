<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return view('barang');
    }

    public function insert(Request $request){
        dd($request);
    }

    public function update(Request $request){
        return "update";
    }

    public function delete($id,$tes,Request $request){
        return $id . "," . $tes;
    }

}

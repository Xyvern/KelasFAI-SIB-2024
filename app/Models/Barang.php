<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_kategori', 
        'nama_barang', 
        'gambar_barang', 
        'harga_barang', 
        'qty_barang'
    ];

    public $timestamps = true;
    
    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id_kategori');
    }
    
}

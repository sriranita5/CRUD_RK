<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Produk_KeluarController extends Controller
{
     // Untuk menampilkan data
    public function data()
    {
        $produkkeluar = DB::table('produk_keluar')->get();
        
        //return $produkkeluar;
        return view('produkkeluar/data', ['produkkeluar' => $produkkeluar]);
    }

    // Untuk Menambah data //
    public function add() 
    {
        return view('produkkeluar/add');
    }

    // Untuk Memasukkan data baru ke database //
    public function addProcess(Request $request) 
    {
        DB::table('produk_keluar')->insert([
            'id_keluar' => $request -> id_keluar,
            'kode_produk' => $request -> kode_produk,
            'waktu_masuk' => $request -> waktu_masuk,
            'jumlah_masuk' => $request -> jumlah_masuk
        ]);
        return redirect('produkkeluar') -> with('status', 'Data Produk Keluar berhasil ditambah!');
    }
    
    // Untuk Mengedit data //
    public function edit($id_keluar) 
    {
        $produkkeluar = DB::table('produk_keluar')->where('id_keluar', $id_keluar)->first();
        return view('produkkeluar/edit', compact('produkkeluar'));
    }

    // Untuk Memasukkan data yang sudah di edit ke database //
    public function editProcess(Request $request, $id_keluar)
    {
        DB::table('produk_keluar')->where('id_keluar', $id_keluar)
            ->update([
                'id_keluar' => $request -> id_keluar,
                'kode_produk' => $request -> kode_produk,
                'waktu_masuk' => $request -> waktu_masuk,
                'jumlah_masuk' => $request -> jumlah_masuk
            ]);
            return redirect('produkkeluar') -> with('status', 'Produk keluar berhasil diedit!');
    }

    // Untuk Menghapus data //
    public function delete($id_keluar)
    {
        DB::table('produk_keluar')->where('id_keluar', $id_keluar)->delete();
        return redirect('produkkeluar') -> with('status', 'Produk keluar berhasil dihapus!');
    }
}


   

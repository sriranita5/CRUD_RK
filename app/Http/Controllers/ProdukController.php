<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    // Untuk menampilkan data
    public function data()
    {
        $produks = DB::table('produk')->get();

        //return $produk;
        return view('produk/data')->with('produks', $produks);
    }

    // Untuk Menambah data //
    public function add()
    {
        return view('produk/add');
    }

    // Untuk Memasukkan data baru ke database //
    public function addProcess(Request $request)
    {
        DB::table('produk')->insert([
            'kode_produk' => $request -> kode_produk,
            'nama_produk' => $request -> nama_produk,
            'harga_beli' => $request -> harga_beli,
            'harga_jual' => $request -> harga_jual,
            'deskripsi' => $request -> deskripsi,
            'stok' => $request -> stok
        ]);
        return redirect('produks')  -> with('status', 'Data Produk berhasil ditambah!');
    }


    // Untuk Mengedit data //
    public function edit($kode_produk)
    {
        $produk = DB::table('produk')->where('kode_produk', $kode_produk)->first();
        return view('produk/edit', compact('produk'));
    }


    // Untuk Memasukkan data yang sudah di edit ke database //
    public function editProcess(Request $request, $kode_produk)
    {
        DB::table('produk')->where('kode_produk', $kode_produk)
            ->update([
                'kode_produk' => $request -> kode_produk,
                'nama_produk' => $request -> nama_produk,
                'harga_beli' => $request -> harga_beli,
                'harga_jual' => $request -> harga_jual,
                'deskripsi' => $request -> deskripsi,
                'stok' => $request -> stok
            ]);
            return redirect('produks')  -> with('status', 'Data Produk berhasil diupdate!');
    }

    // Untuk Menghapus data //
    public function delete($kode_produk, $id_keluar)
    {
        DB::table('produk')->where('kode_produk', $kode_produk)->delete();
        return redirect('produks')->with('status', 'Data Produk berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Produk_MasukController extends Controller
{
     // Untuk menampilkan data
     public function data()
     {
         $produkmasuk = DB::table('produk_masuk')->get();
         
         //return $produkmasuk;
         return view('produkmasuk/data', ['produkmasuk' => $produkmasuk]);
     }
 
     // Untuk Menambah data //
     public function add() 
     {
         return view('produkmasuk/add');
     }
 
     // Untuk Memasukkan data baru ke database //
     public function addProcess(Request $request) 
     {
         DB::table('produk_masuk')->insert([
             'id_masuk' => $request -> id_masuk,
             'kode_produk' => $request -> kode_produk,
             'waktu_masuk' => $request -> waktu_masuk,
             'jumlah_masuk' => $request -> jumlah_masuk
         ]);
         return redirect('produkmasuk') -> with('status', 'Data Produk Masuk berhasil ditambah!');
     }
     
     // Untuk Mengedit data //
     public function edit($id_masuk) 
     {
         $produkmasuk = DB::table('produk_masuk')->where('id_masuk', $id_masuk)->first();
         return view('produkmasuk/edit', compact('produkmasuk'));
     }
 
     // Untuk Memasukkan data yang sudah di edit ke database //
     public function editProcess(Request $request, $id_masuk)
     {
         DB::table('produk_masuk')->where('id_keluar', $id_masuk)
             ->update([
                 'id_masuk' => $request -> id_masuk,
                 'kode_produk' => $request -> kode_produk,
                 'waktu_masuk' => $request -> waktu_masuk,
                 'jumlah_masuk' => $request -> jumlah_masuk
             ]);
             return redirect('produkmasuk') -> with('status', 'Produk Masuk berhasil diedit!');
     }
 
     // Untuk Menghapus data //
     public function delete($id_masuk)
     {
         DB::table('produk_masuk')->where('id_masuk', $id_masuk)->delete();
         return redirect('produkmasuk') -> with('status', 'Produk Masuk berhasil dihapus!');
     }
 }

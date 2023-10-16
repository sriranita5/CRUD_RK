<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
         // Untuk menampilkan data
         public function data()
         {
             $pengiriman = DB::table('pengiriman')->get();
             
             //return $pengiriman;
             return view('pengiriman/data', ['pengiriman' => $pengiriman]);
         }
     
         // Untuk Menambah data //
         public function add() 
         {
             return view('pengiriman/add');
         }
     
         // Untuk Memasukkan data baru ke database //
         public function addProcess(Request $request) 
         {
             DB::table('pengiriman')->insert([
                 'no_order' => $request -> no_order,
                 'no_pengiriman' => $request -> no_pengiriman,
                 'tanggal_kirim' => $request -> tanggal_kirim,
                 'status' => $request -> status
             ]);
             return redirect('pengiriman') -> with('status', 'Data Produk Keluar berhasil ditambah!');
         }
         
         // Untuk Mengedit data //
         public function edit($no_pengiriman) 
         {
             $pengiriman = DB::table('pengiriman')->where('no_pengiriman', $no_pengiriman)->first();
             return view('pengiriman/edit', compact('pengiriman'));
         }
     
         // Untuk Memasukkan data yang sudah di edit ke database //
         public function editProcess(Request $request, $no_pengiriman)
         {
             DB::table('pengiriman')->where('no_pengiriman', $no_pengiriman)
                 ->update([
                     'no_order' => $request -> no_order,
                     'no_pengiriman' => $request -> no_pengiriman,
                     'tanggal_kirim' => $request -> tanggal_kirim,
                     'status' => $request -> status
                 ]);
                 return redirect('pengiriman') -> with('status', 'Pengiriman berhasil diedit!');
         }
     
         // Untuk Menghapus data //
         public function delete($no_pengiriman)
         {
             DB::table('pengiriman')->where('no_pengiriman', $no_pengiriman)->delete();
             return redirect('pengiriman') -> with('status', 'Pengiriman berhasil dihapus!');
         }
}

   

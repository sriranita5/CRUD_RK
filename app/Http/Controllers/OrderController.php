<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Untuk menampilkan data
    public function data()
    {
        $order = DB::table('order')->get();
        
        //return $order;
        return view('order/data', ['order' => $order]);
    }

    // Untuk Menambah data //
    public function add() 
    {
        return view('order/add');
    }

    // Untuk Memasukkan data baru ke database //
    public function addProcess(Request $request) 
    {
        DB::table('order')->insert([
            'id_order' => $request -> id_order,
            'no_order' => $request -> no_order,
            'tanggal_order' => $request -> tanggal_order,
            'kode_produk' => $request -> kode_produk,
            'status' => $request -> status
        ]);
        return redirect('order') -> with('status', 'Data Order berhasil ditambah!');
    }
    
    // Untuk Mengedit data //
    public function edit($id_order) 
    {
        $order = DB::table('order')->where('id_order', $id_order)->first();
        return view('order/edit', compact('order'));
    }

    // Untuk Memasukkan data yang sudah di edit ke database //
    public function editProcess(Request $request, $id_order)
    {
        DB::table('order')->where('id_order', $id_order)
            ->update([
                'id_order' => $request -> id_order,
                'no_order' => $request -> no_order,
                'tanggal_order' => $request -> tanggal_order,
                'kode_produk' => $request -> kode_produk,
                'status' => $request -> status
            ]);
            return redirect('order') -> with('status', 'Data Order berhasil diedit!');
    }

    // Untuk Menghapus data //
    public function delete($no_order)
    {
        DB::table('order')->where('id_order', $no_order)->delete();
        return redirect('order') -> with('status', 'Data Order berhasil dihapus!');
    }
}

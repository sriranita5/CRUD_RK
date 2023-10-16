<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function data()
    {
        $customer = DB::table('customer')->get();
        
        //return $customer;
        return view('customer/data', ['customer' => $customer]);
    }

    public function add() 
    {
        return view('customer/add');
    }

    public function addProcess(Request $request) 
    {
        DB::table('customer')->insert([
            'id_cust' => $request -> id_cust,
            'nama_cust' => $request -> nama_cust,
            'alamat_cust' => $request -> alamat_cust,
            'no_order' => $request -> no_order
        ]);
        return redirect('customer') -> with('status', 'Data Customer berhasil ditambah!');
    }
    
    public function edit($id_cust) 
    {
        $customer= DB::table('customer')->where('id_customer', $id_cust)->first();
        return view('kel11/edit', compact('customer'));
    }

    public function editProcess(Request $request, $id_cust)
    {
        DB::table('customer')->where('id_customer', $id_cust)
            ->update([
            'id_cust' => $request -> id_cust,
            'nama_cust' => $request -> nama_cust,
            'alamat_cust' => $request -> alamat_cust,
            'no_order' => $request -> no_order
            ]);
            return redirect('customer') -> with('status', 'Data Customer berhasil diedit!');
    }

    public function delete($id_cust)
    {
        DB::table('customer')->where('id_cust', $id_cust)->delete();
        return redirect('customer') -> with('status', 'Data Customer berhasil dihapus!');
    }
}

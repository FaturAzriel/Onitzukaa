<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

        // UNTUK DATA TAMBAH


        public function pesanan()
        {
            $form = DB::table('form')->get();

            return view('/admin/pesanan',['form' =>$form]);
        }

        public function storeukuran(Request $request)
        {
            // Tambah data ke table service
            DB::table('brand_type_size')->insert([
                'brand' => $request->brand,
                'type' => $request->type,
                'size' => $request->size

                ]);            
            // Alihkan kehalaman service
            return redirect('/tambahukuran');
        }

        public function tambahukuran()
        {
            $brand_type_size = DB::table('brand_type_size')->get();

            // Manggil view tambah
            return view('/admin/tambahukuran',['brand_type_size' =>$brand_type_size]);
        }

        // HAPUS
        public function hapuspesanan($id)
        {
            // Menghapus data service berdasarkan id
            DB::table('form')->where('id',$id)->delete();
    
            // Alihkan data ke halaman service
            return redirect('/pesanan');
        }


        // public function tambahukuran()
        // {
        //     $brand_type_size = DB::table('brand_type_size')->get();

        //     return view('/admin/tambahukuran',['brand_type_size' =>$brand_type_size]);
        // }
}
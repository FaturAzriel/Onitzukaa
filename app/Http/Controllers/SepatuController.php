<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Sepatu;


class SepatuController extends Controller
{
    public function index()
    {
    	$sepatu = Sepatu::all();
    	return view('sepatu',['sepatu'=>$sepatu]);
    }

    public function cetak_pdf($id)
    {
    	$sepatu = DB::table('form')->where('id',$id)->get();

    	$pdf = PDF::loadview('sepatu_pdf',['sepatu'=>$sepatu]);
    	return $pdf->stream();
    }
}
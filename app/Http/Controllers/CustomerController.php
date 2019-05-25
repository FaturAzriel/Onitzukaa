<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Upload;

class CustomerController extends Controller
{
	public function upload(){
		$gambar = Upload::get();
		return view('detail-product',['gambar' => $gambar]);
    }
    

	public function storeupload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		// Upload::create([
        //     'file' => $nama_file,
        // ]);
        
        DB::table('form')->insert([
            'file' => $nama_file,
            'brand' => $request->brand,
            'type' => $request->type,
            'size' => $request->size,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
            ]); 

		return redirect('thank-you');
    }
    
    // VIEW THANK YOU
    public function thankyou(){
		return view('thank-you');
    }

    // public function confirm(){
    //     $confirm = DB::table('form')->get();
    //     return view('confirm-order',['form' =>$confirm]);
    // }


    public function myform()
    {
        $allsize = DB::table("allsize")->pluck("name","id");
        return view('detail-product',compact('allsize'));
    }

    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $spesificsize = DB::table("spesificsize")
                    ->where("allsize_id",$id)
                    ->pluck("name","id");
        return json_encode($spesificsize);
    }
}
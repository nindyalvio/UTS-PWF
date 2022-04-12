<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    //menambahkan data ke database
    public function store(Request $request) {
        //memvalidasi inputan
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan,minuman,makeup',
            'expired_at' => 'required|date'
        ]);
        //kondisi apabila inputan yang diinginkan tidak sesuai
        if($validator->fails()) {
            //response json akan dikirim jika ada inputan yang salah
            return response()->json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validated();
        //masukan inputan yang benar ke database (table product)
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at']
        ]);
        //response json akan dikirim jika inputan benar
        return response()->json('produk berhasil disimpan')->setStatusCode(201);
    }

    public function show() {
        $products = Product::all();

        return response()->json($products)->setStatusCode(200);
    }

    public function update(Request $request,$id) {

        //memvalidasi inputan
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'price' => 'required|numeric',
            'type' => 'required|in:makanan,minuman,makeup',
            'expired_at' => 'required|date'
        ]);
        //kondisi apabila inputan yang diinginkan tidak sesuai
        if($validator->fails()) {
            //response json akan dikirim jika ada inputan yang salah
            return response()->json($validator->messages())->setStatusCode(422);
        }

        //inputan yang sudah benar
        $validated = $validator->validated();
        
        $checkData = Product::find($id);

        // dd($checkData);

        if($checkData) {
            Product::where('id',$id)
            ->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'type' => $validated['type'],
                'expired_at' => $validated['expired_at']
            ]);
            return response()->json([
                'messages' => 'Data berhasil disunting'
            ])->setStatusCode(201);
        }

        return response()->json([
            'messages' => 'Data tidak ditemukan'
        ])->setStatusCode(404);
       
    }

    public function destroy($id) {

        $checkData = Product::find($id);

        if($checkData) {

            Product::destroy($id);

            return response()->json([
                'messages' => 'Data berhasil dihapus'
            ])->setStatusCode(200);
        }

        return response()->json([
            'messages' => 'Data tidak ditemukan'
        ])->setStatusCode(404);
    }
}

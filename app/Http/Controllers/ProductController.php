<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

Use Validator;

use File;

class ProductController extends Controller
{
    public function index()
    {
        $all = Product::all();

        return view('product.index',compact('all'));
    }


    public function destroyproduct($id){




        $product = Product::find($id);


        if(File::exists(public_path('product/img/'.$product->image))){
            File::delete(public_path('product/img/'.$product->image));
        }else{
            dd('File does not exists.');
        }

        Product::destroy($id);


        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // $postData = $request->only('file');
        //     $file = $postData['file'];

        //     $fileArray = array('image' => $file);


        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
        ]);

        // dd($validator);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }


        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
		]);

        $file = $request->file('image');
		$nama_file = $file->getClientOriginalName();
		$tujuan_upload = 'product/img';
		$file->move($tujuan_upload,$nama_file);


        $product = Product::create([
            'name' => $request->name,
            'image' => $nama_file,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->desc,
        ]);

        // dd($product);



        if(!$product){
            return redirect()->back()->withErrors('register failed');
        }

        return redirect()->back()->with(['success' => 'Registration Success']);




    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
        ]);

        // dd($validator);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // dd($validator);

        $cek = $request->file('image');

        if(!$cek){

            $product = Product::where('id',$request->id)
                ->update([
                'name' => $request->name,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->desc,
            ]);

            // dd($product);



            if(!$product){
                return redirect()->back()->withErrors('register failed');
            }

            return redirect()->back()->with(['success' => 'Registration Success']);
        }


        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
		]);

        $file = $request->file('image');
		$nama_file = $file->getClientOriginalName();
		$tujuan_upload = 'product/img';
		$file->move($tujuan_upload,$nama_file);


        $product = Product::where('id',$request->id)
                ->update([
                'name' => $request->name,
                'image' => $nama_file,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->desc,
            ]);

        // dd($product);



        if(!$product){
            return redirect()->back()->withErrors('register failed');
        }

        return redirect()->back()->with(['success' => 'Registration Success']);



    }

    public function stock()
    {

        $product = Product::all();

        return response()->json($product, 200);

    }
}

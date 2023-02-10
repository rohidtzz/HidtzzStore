<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

Use Validator;

use App\Models\Cart;

use File;

class ProductController extends Controller
{
    public function index()
    {
        $all = Product::all();
        $users = Auth()->user()->id;

        $cart = Cart::where('user_id',$users)->count();

        return view('v1.product.index',compact('all','cart'));
    }


    public function destroyproduct($id){




        $product = Product::find($id);


        if(File::exists(public_path('product/img/'.$product->image))){
            File::delete(public_path('product/img/'.$product->image));
        }else{
            dd('File does not exists.');
        }

        Product::destroy($id);


        return redirect()->back()->withSuccess('Product Deleted');

    }

    public function create()
    {


        $users = Auth()->user()->id;

        $cart = Cart::where('user_id',$users)->count();

        return view('v1.product.create',compact('cart'));


    }

    public function edit($id)
    {

        if($id == null || $id == ''){
            return redirect()->back()->withErrors('Product not found');
        }


        $product = Product::find($id);

        if(!$product){
            return redirect()->back()->withErrors('Product not found');
        }

        $users = Auth()->user()->id;

        $cart = Cart::where('user_id',$users)->count();

        return view('v1.product.edit',compact('product','cart'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $postData = $request->only('file');
        //     $file = $postData['file'];

        //     $fileArray = array('image' => $file);


        $validator = Validator::make($request->all(), [
            'name' => ['required','string'],
            'price' => ['required','integer'],
            'stock' => ['required','integer'],
            'description' => ['required']
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
            'description' => $request->description,
        ]);

        // dd($product);



        if(!$product){
            return redirect()->back()->withErrors('Create Product Failed');
        }

        return redirect()->back()->with(['success' => 'Create Product Success']);




    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'description' => ['required']
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
                'description' => $request->description,
            ]);

            // dd($product);



            if(!$product){
                return redirect()->back()->withErrors('Edit Product Failed');
            }

            return redirect()->back()->with(['success' => 'Edit Product Success']);
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
                'description' => $request->description,
            ]);

        // dd($product);



        if(!$product){
            return redirect()->back()->withErrors('Edit Product Failed');
        }

        return redirect()->back()->with(['success' => 'Edit Product Success']);



    }

    public function stock()
    {

        $product = Product::all();

        return response()->json($product, 200);

    }
}

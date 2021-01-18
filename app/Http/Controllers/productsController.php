<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\Input;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view("index",["products"=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        return view("create",["products"=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Input::file("image")) {
            $dest=public_path("images");
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dest,$filename);
        }
        product::create([
            "title"=>$request->input("title"),
            "price"=>$request->input("price"),
            "category_id"=>$request->input("category"),
            "description"=>$request->input("description"),
            "image"=>$filename,
        ]);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=product::where("id",$id)->firstOrFail();
        #$comments=userComments::where("book_id",$id)->get();
        return view("single")
        ->with("product",$product);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::where("id",$id)->firstOrFail();
        #$comments=userComments::where("book_id",$id)->get();
        return view("edit")
        ->with("product",$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Input::file("image")) {
            $dest=public_path("images");
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dest,$filename);
        }
        product::where("id",$request->input("id"))->update([
         "title"=>$request->input("title"),
            "price"=>$request->input("price"),
            "category_id"=>$request->input("category"),
            "description"=>$request->input("description"),
           "image"=>$filename,
        ]);

        return redirect("/admin");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        product::where("id",$request->input("id"))->delete();
        return redirect("/admin");
    }
    public function add_comment(Request $request)
    {
        Product::find($request->input('product_id'))->comments()
        ->create([
            'user_id' => auth()->id(),
            'product_id' => $request->input('product_id'),
            'body' => $request->input('body'),
        ]);
        return redirect()->back();
    }
    public function like(Request $request){
        $likeAmnt=product::where("id",$request->input('product_id'))->firstOrFail()['likes']+1;
        product::where("id",$request->input('product_id'))->update([
            'likes' => $likeAmnt
        ]);
        return redirect()->back();
    }

}

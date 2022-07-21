<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Discount;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate(6);
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::all();
        $discount = Discount::all();
        return view('admin.product.create' , compact('categorie','discount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'categorie_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'album' => 'required',
            'quantity' => 'required|numeric',
            'discription' => 'required',
        ]);

        //upload files with new name
        $ex = $request->file('image')->getClientOriginalExtension();
        $img_name = 'clothing_store'.time().'.'.$ex;
        $request->file('image')->move(public_path('images'),$img_name);

        $album_name = [];
        foreach ($request->file('album') as $album) {
            $ex = $album->getClientOriginalExtension();
            $al_name = 'clothing_store'.time().'.'.$ex;
            $album_name[] = $al_name;
            $album->move(public_path('images'),$al_name);
        }
             $album_name = implode(',' , $album_name);

        Product::create([
            'user_id' => Auth::user()->id,
            'categorie_id' => $request->categorie_id,
            'discount_id' => $request->discount_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'old_price' => $request->old_price,
            'image' => $img_name,
            'album' => $album_name,
            'quantity' => $request->quantity,
            'discription' => $request->discription,
            'serial_number' => $request->serial_number,
        ]);

        return redirect()->route('admin.products.index')
        ->with('msg','Product Add Successfully')->with('type' , 'success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categorie = Categorie::all();
        $discount = Discount::all();
        return view('admin.product.edit',compact('product' , 'categorie' , 'discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
        {
            //validate
            $request->validate([
                'name' => 'required',
                'categorie_id' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'discription' => 'required',
            ]);

            $product = Product::findOrFail($id);

            $img_name = $product->image;

            //upload files with new name
            if($request->hasFile('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $img_name = 'clothing_store'.time().'.'.$ex;
            $request->file('image')->move(public_path('images'),$img_name);
            }

            $album_name = $product->album;

             if($request->hasFile('album')){
                $album_name = [];
                foreach ($request->file('album') as $album) {
                    $ex = $album->getClientOriginalExtension();
                    $al_name = 'clothing_store'.time().'.'.$ex;
                    $album_name[] = $al_name;
                    $album->move(public_path('images'),$al_name);
                }
                 $album_name = implode(',' , $album_name);
             }

            Product::findOrFail($id)->update([
                'user_id' => Auth::user()->id,
                'categorie_id' => $request->categorie_id,
                'discount_id' => $request->discount_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'price' => $request->price,
                'old_price' => $request->old_price,
                'image' => $img_name,
                'album' => $album_name,
                'quantity' => $request->quantity,
                'discription' => $request->discription,
                'serial_number' => $request->serial_number,
            ]);

            return redirect()->route('admin.products.index')
            ->with('msg','Product Add Successfully')->with('type' , 'success');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')
        ->with('msg','Product deleted Successfully')->with('type' , 'danger');
    }
}

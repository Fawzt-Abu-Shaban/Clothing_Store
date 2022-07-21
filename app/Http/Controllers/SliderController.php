<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::latest()->paginate(6);
        return view('admin.slider.index' , compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discount = Discount::all();
        return view('admin.slider.create' , compact('discount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'image'=>'required',
            'discription'=>'required|max:100',
        ]);

        $ex = $request->file('image')->getClientOriginalExtension();
        $img_name = 'clothing_store'.time().'.'.$ex;
        $request->file('image')->move(public_path('slider') , $img_name);

        Slider::create([
            'user_id' => Auth::user()->id,
            'discount_id' => $request->discount_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $img_name,
            'discription' => $request->discription,
        ]);

        return redirect()->route('admin.sliders.index')
        ->with('msg','Slider Add Successfully')->with('type' , 'success');

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
        $slider = Slider::findOrFail($id);
        $discount = Discount::all();
        return view('admin.slider.edit' , compact('slider' , 'discount'));
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
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'discription'=>'required|max:100',
        ]);

            $slider = Slider::findOrFail($id);
            $img_name = $slider->image;

        if($request->hasFile('image')){
        $ex = $request->file('image')->getClientOriginalExtension();
        $img_name = 'clothing_store'.time().'.'.$ex;
        $request->file('image')->move(public_path('slider') , $img_name);
        }

        Slider::findOrFail($id)->update([
            'user_id' => Auth::user()->id,
            'discount_id' => $request->discount_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $img_name,
            'discription' => $request->discription,
        ]);

        return redirect()->route('admin.sliders.index')
        ->with('msg','Slider Add Successfully')->with('type' , 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return redirect()->route('admin.sliders.index')
        ->with('msg','Slider deleted Successfully')->with('type' , 'danger');
    }
}

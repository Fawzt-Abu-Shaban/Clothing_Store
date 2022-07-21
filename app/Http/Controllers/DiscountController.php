<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(6);
        return view('admin.discount.index' , compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'percentage' => 'required|numeric',
            'customers' => 'numeric|nullable'
        ]);

        Discount::forceCreate($request->except('_token'));

        return redirect()->route('admin.discounts.index')
       ->with('msg','Discount Add Successfully')->with('type' , 'success');

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
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit' , compact('discount'));
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
        //validation
        $request->validate([
            'name' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'percentage' => 'required|numeric',
            'customers' => 'numeric|nullable'
        ]);

        Discount::findOrFail($id)->update($request->all());

        return redirect()->route('admin.discounts.index')
       ->with('msg','Discount Update Successfully')->with('type' , 'primary');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::findOrFail($id)->delete();
        return redirect()->route('admin.discounts.index')
        ->with('msg','Discount deleted Successfully')->with('type' , 'danger');

    }
}

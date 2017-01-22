<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\price;

class pricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = price::orderby('price','ASC')->get();
        return view('management.prices.index')->with('prices',$prices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = new price();
        $price->initials = $request->initials;
        $price->price = $request->price;
        $price->save();

        flash('Precio <b>'.$price->initials.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('precio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = price::find($id);
        return view('management.prices.show')->with('price',$price);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = price::find($id);
        return view('management.prices.edit')->with('price',$price);
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
        $price = price::find($id);
        $price->initials = $request->initials;
        $price->price = $request->price;
        $price->save();

        flash('Precio <b>'.$price->initials.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('precio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = price::find($id);
        $price->delete();

        flash('Precio <b>'.$price->initials.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('precio.index');
    }
}

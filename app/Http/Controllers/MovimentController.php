<?php

namespace App\Http\Controllers;

use App\{Group, Moviment, Product};
use Illuminate\Http\Request;
use Auth;

class MovimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function application()
    {
        $user           = Auth::user();
        $group_list     = $user->groups->pluck('name', 'id');
        $product_list   = Product::all()->pluck('name', 'id');

        return view('moviment.application', [
            'group_list'    => $group_list,
            'product_list'  => $product_list,
        ]);
    }

    public function storeApplication(Request $request)
    {
        $movimento = Moviment::create([
            'user_id'       => Auth::user()->id,
            'group_id'      => $request->get('group_id'), 
            'product_id'    => $request->get('product_id'),
            'value'         => $request->get('value'),
            'type'          => 1,
        ]);

        session()->flash('success',[
            'success'   => true,
            'message'   => "Sua aplicação de " . $movimento->value . " no produto " . $movimento->product->name . " foi realizada com sucesso."
        ]);

        return redirect()->route('moviment.application');
    }

    public function getback()
    {
        $user           = Auth::user();
        $group_list     = $user->groups->pluck('name', 'id');
        $product_list   = Product::all()->pluck('name', 'id');

        return view('moviment.getback', [
            'group_list'    => $group_list,
            'product_list'  => $product_list,
        ]);
    }

    public function storeGetback(Request $request)
    {
        $movimento = Moviment::create([
            'user_id'       => Auth::user()->id,
            'group_id'      => $request->get('group_id'), 
            'product_id'    => $request->get('product_id'),
            'value'         => $request->get('value'),
            'type'          => 2,
        ]);

        session()->flash('success',[
            'success'   => true,
            'message'   => "Sua resgate de " . $movimento->value . " no produto " . $movimento->product->name . " foi realizada com sucesso."
        ]);

        return redirect()->route('moviment.application');
    }

    public function index()
    {
        return view('moviment.index', [
            'product_list' => Product::all(),
        ]);
    }

    public function all()
    {
        return view('moviment.all', [
            'moviment_list' => Auth::user()->moviments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Moviment  $moviment
     * @return \Illuminate\Http\Response
     */
    public function show(Moviment $moviment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Moviment  $moviment
     * @return \Illuminate\Http\Response
     */
    public function edit(Moviment $moviment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Moviment  $moviment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moviment $moviment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Moviment  $moviment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moviment $moviment)
    {
        //
    }
}

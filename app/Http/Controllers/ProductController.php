<?php

namespace App\Http\Controllers;

use App\Product;
use App\Instituition;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($instituition_id)
    {
        $instituition  = Instituition::find($instituition_id);

        return view('instituition.product.index', [
            'instituition' => $instituition,
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
    public function store(Request $request, $instituition_id)
    {
        try{
            $data = $request->all();
            $data['instituition_id'] = $instituition_id;

            $product = Product::create($data);
        
            session()->flash('success', [
                'succes'    => true,
                'message'   => 'Produto Cadastrado',
            ]);
        }catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Erro no cadastro: ' . $e->getMessage(),
            ];
        }

        return redirect()->route('instituition.product.index', $instituition_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($instituition_id, $product_id)
    {
        Product::destroy($product_id);

        session()->flash('success', [
            'succes'    => true,
            'message'   => 'Produto Removido',
        ]);

        return redirect()->route('instituition.product.index', $instituition_id);
    }
}

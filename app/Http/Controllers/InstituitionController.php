<?php

namespace App\Http\Controllers;

use App\Instituition;
use App\Services\InstituitionService;
use Illuminate\Http\Request;

class InstituitionController extends Controller
{
    private $service;

    function __construct(InstituitionService $s){
        $this->service = $s;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituition = Instituition::all();

        return view('instituition.index', [
            'instituitions' => $instituition,
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
        $retorno = $this->service->store($request->all());
        $instituition = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('instituition.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituition  $instituition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instituition = Instituition::find($id);

        return view('instituition.show', [
            'instituition' => $instituition,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituition  $instituition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituition = Instituition::find($id);

        return view('instituition.edit', [
            'instituition' => $instituition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituition  $instituition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $retorno = $this->service->update($request->all(), $id);
        $instituition = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('instituition.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituition  $instituition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retorno = $this->service->destroy($id);

        $instituition = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('instituition.index');
    }
}

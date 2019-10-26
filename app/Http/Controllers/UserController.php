<?php

namespace App\Http\Controllers;

use App\User;
use App\Services\UserService;
use Illuminate\Http\Request;


class UserController extends Controller
{
    private $service;

    function __construct(UserService $s){
        $this->service = $s;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users,
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
        $usuario = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('user.index');

        /*return view('user.index', [
            'usuario' => $usuario,
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $retorno = $this->service->update($request->all(), $id);
        $usuario = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retorno = $this->service->destroy($id);

        $usuario = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('user.index');
    }
}

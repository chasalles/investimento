<?php

namespace App\Http\Controllers;

use App\{Group, Instituition, User};
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    private $service;

    function __construct(GroupService $s){
        $this->service = $s;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group              = Group::all();
        $user_list          = User::pluck('name', 'id')->all();
        $instituition_list  = Instituition::pluck('name', 'id')->all();

        return view('group.index', [
            'groups'            => $group,
            'user_list'         => $user_list,
            'instituition_list' => $instituition_list,
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
        $group = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('group.index');
    }

    public function userStore(Request $request, $group_id)
    {
        $retorno = $this->service->userStore($request->all(), $group_id);

        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('group.show', [$group_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group      = Group::find($id);
        $user_list  = User::pluck('name', 'id')->all();

        return view('group.show', [
            'group'         => $group,
            'user_list'    => $user_list,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\ResponseSS
     */
    public function edit($id)
    {
        $group              = Group::find($id);
        $user_list          = User::pluck('name', 'id')->all();
        $instituition_list  = Instituition::pluck('name', 'id')->all();

        return view('group.edit', [
            'group'            => $group,
            'user_list'         => $user_list,
            'instituition_list' => $instituition_list,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group_id)
    {
        $retorno = $this->service->update($request->all(), $group_id);

        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retorno = $this->service->destroy($id);

        $group = $retorno['success'] ? $retorno['data'] : null;
    
        session()->flash('success', [
            'succes'    => $retorno['success'],
            'message'   => $retorno['message'],
        ]);

        return redirect()->route('group.index');
    }
}

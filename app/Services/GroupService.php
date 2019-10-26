<?php

namespace App\Services;

use App\Group;
use Exception; 

/**
 * 
 */
class GroupService
{
	
	function __construct(){
	}

	public function store($data){

		try {
			
			$group = Group::create($data);

			return [
				'success'	=> true,
				'message'	=> 'Grupo cadastrado',
				'data'		=> $group,		
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro no cadastro: ' . $e->getMessage(),
			];
		}

	}

	public function userStore($data, $group_id){

		try {
			
			$group 		= Group::find($group_id);
			$user_id 	= $data['user_id'];

			$group->users()->attach($user_id);

			return [
				'success'	=> true,
				'message'	=> 'Usuário incluído com sucesso',
				'data'		=> $group,		
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro no cadastro: ' . $e->getMessage(),
			];
		}

	}



	public function update($data, $id){
		try {
			
			$group = Group::find($id)->update($data);

			return [
				'success'	=> true,
				'message'	=> 'Usuário incluído com sucesso',
				'data'		=> $group,		
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro no cadastro: ' . $e->getMessage(),
			];
		}
	}	

	public function destroy($id){
		try {
			
			Group::destroy($id);

			return [
				'success'	=> true,
				'message'	=> 'Grupo Removida',
				'data'		=> null,		
			];

		}catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro pra deletar grupo: ' . $e->getMessage(),
			];
		}
	}
}
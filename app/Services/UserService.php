<?php

namespace App\Services;

use App\User;
use Exception;

/**
 * 
 */
class UserService
{
	
	function __construct(){
	}

	public function store($data){

		try {
			
			$usuario = User::create($data);

			return [
				'success'	=> true,
				'message'	=> 'Usuário cadastrado',
				'data'		=> $usuario,		
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
			
			$usuario = User::find($id)->update($data);

			return [
				'success'	=> true,
				'message'	=> 'Usuário atualizado',
				'data'		=> $usuario,		
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
			
			User::destroy($id);

			return [
				'success'	=> true,
				'message'	=> 'Usuário Removido',
				'data'		=> null,		
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro pra deletar: ' . $e->getMessage(),
			];
		}
	}
}
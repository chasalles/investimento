<?php

namespace App\Services;

use App\Instituition;
use Exception; 

/**
 * 
 */
class InstituitionService
{
	
	function __construct(){
	}

	public function store($data){

		try {
			
			$instituition = Instituition::create($data);

			return [
				'success'	=> true,
				'message'	=> 'Usuário cadastrado',
				'data'		=> $instituition,		
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
			
			$instituition = Instituition::find($id)->update($data);

			return [
				'success'	=> true,
				'message'	=> 'Instituição atualizada',
				'data'		=> $instituition,		
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
			
			Instituition::destroy($id);

			return [
				'success'	=> true,
				'message'	=> 'Instituição Removida',
				'data'		=> null,		
			];

		} catch (Exception $e) {
			return [
				'success' => false,
				'message' => 'Erro pra deletar instituição: ' . $e->getMessage(),
			];
		}
	}
}
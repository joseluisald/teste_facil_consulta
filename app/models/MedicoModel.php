<?php 
/*
 *@autor: José Luis
 *@Teste Facil Consulta
 *@MedicoModel
*/	

class MedicoModel extends Model
{	
	public function inserir($postData)
	{	
		$response = $this->loadLibrarie('Response');
		$hash = $this->loadLibrarie('Hash');

		//Lógica para ver se os campos estão com mais de 6 caracteres
		if (strlen($postData['emailMedico']) < 6 || strlen($postData['nomeMedico']) < 6 || strlen($postData['senhaMedico']) < 6)
		{
			return $response->emit('warning', 'Por favor, forneça ao menos 6 caracteres nos campos!');
		}
		else
		{
			$data = array
			(
				'email' => $postData['emailMedico'],
				'nome' => $postData['nomeMedico'],
				'senha' => $hash->create($postData['senhaMedico']),
				'data_criacao' => date('Y-m-d H:i:s')
			);

			if($this->insert('medico', $data) > 0)
			{	
				return $response->emit('success', 'Médico cadastrado com sucesso!');
			}
			else
			{
				return $response->emit('danger', 'Erro ao cadastrar o médico!');
			}
		}
	}

	public function atualizar($postData)
	{	
		$response = $this->loadLibrarie('Response');
		$hash = $this->loadLibrarie('Hash');

		$medico = $this->getMedicoById($postData['idMedico']);

		//Lógica para ver se os campos estão com mais de 6 caracteres
		if (strlen($postData['emailMedico']) < 6 || strlen($postData['nomeMedico']) < 6)
		{
			return $response->emit('warning', 'Por favor, forneça ao menos 6 caracteres nos campos!');
		}
		else
		{	
			//Lógica para saber se os campos de senha antiga e nova estão com valores
			if(!empty($postData['novaSenhaMedico']) && !empty($postData['senhaMedico']))
			{	
				//Lógica para ver se os campos estão com mais de 6 caracteres
				if (strlen($postData['novaSenhaMedico']) < 6 || strlen($postData['senhaMedico']) < 6)
				{
					return $response->emit('warning', 'Por favor, forneça ao menos 6 caracteres nos campos!');
				}
				else
				{
					//Lógica para comparar se as duas senhas coincidem
					if($hash->compare($postData['senhaMedico'], $medico['senha']))
					{
						$data = array
						(
							'nome' => $postData['nomeMedico'],
							'senha' => $hash->crypt($postData['novaSenhaMedico']),
							'data_alteracao' => date('Y-m-d H:i:s')
						);

						$this->where('id = '.$postData['idMedico']);

						if($this->update('medico', $data) > 0)
						{	
							return $response->emit('success', 'Médico editado com sucesso!');
						}
						else
						{
							return $response->emit('danger', 'Erro ao editar o médico!');
						}
					}
					else
					{
						return $response->emit('warning', 'Parece que a senha que você digitou não é a mesma de seu cadastro!');
					}
				}
			}
			else
			{	
				$data = array
				(
					'nome' => $postData['nomeMedico'],
					'data_alteracao' => date('Y-m-d H:i:s')
				);

				$this->where('id = '.$postData['idMedico']);

				if($this->update('medico', $data) > 0)
				{	
					return $response->emit('success', 'Médico editado com sucesso!');
				}
				else
				{
					return $response->emit('danger', 'Erro ao editar o médico!');
				}
			}
		}
	}

	public function getMedicos($start = null, $perPage = null)
	{
		$this->select('*');
		$this->from('medico');
		$this->limit($start, $perPage);
		$this->get();
		$dados['dados'] = '';
		$dados['total'] = $this->rowCount();

		if($this->num_rows() > 0)
		{	
			$dados['dados'] .=
			'<table class="table" style="font-weight: bold;">
				<thead>
					<tr>
						<th style="font-weight: bold;">Nome</th>
						<th style="font-weight: bold;"></th>
					</tr>  
				</thead>
			<tbody>';

			foreach ($this->result() as $medico)
			{
				$dados['dados'] .=
				'<tr> 
				<td>'.$medico['nome'].'</td>
				<td>
					<div class="td-actions text-right" style="display: block;">
						<a href="'.BASE_URL.'medico/editar/'.$medico['id'].'" rel="tooltip" class="btn btn-info btn-link">
							<i class="material-icons">edit</i>
						</a>						
						<a href="'.BASE_URL.'medico/horario/'.$medico['id'].'" rel="tooltip" class="btn btn-success btn-link">
							<i class="material-icons">query_builder</i>
						</a>
					</div>  
				</td>
				</tr>';
			}

			$dados['dados'] .=
			'</tbody>
			</table>';
		}
		else
		{
			$dados['dados'] .= 
			'<table class="table table-striped table-sm" style="font-weight: bold;">   
				<tr>
					<td>Nenhum Registro encontrado!</td>
				</tr>                        
			<table>';
		}	

		return $dados;	
	}

	public function getMedicoById($id)
	{
		$this->select('*');
		$this->where('id = '.$id);
		$this->from('medico');
		$this->get();
		if($this->num_rows() > 0)
		{
			return $this->row();
		}	
		else
		{
			return false;
		}
	}

}
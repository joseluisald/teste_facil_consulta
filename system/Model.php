<?php
/*
 *@autor: José Luis
 *@Teste Facil Consulta
 *@Model
*/

class Model extends Database
{	
	private $select;
	private $where;
	private $from;
	private $join;
	private $sql;
	private $values;
	private $set;
	private $insert;
	private $limit;
	private $delete;
	private $update;

	//Responsável por selecionar as colunas de uma query
	public function select($select)
	{
		return $this->select = 'SELECT '.$select;
	}

	//Responsável por especificar quais registros de uma query serão retornados
	public function where($where)
	{	
		if(isset($where) && !empty($where))
		{
			return $this->where = ' WHERE '.$where;
		}
	}	

	//Responsável por especificar uma tabela
	public function from($from)
	{	
		if(isset($from) && !empty($from))
		{
			return $this->from = ' FROM '.$from;
		}
	}

	//Responsável por limitar a busca dos dados em uma tabela
	public function limit($start, $perPage)
	{				
		return $this->limit = 'LIMIT '.$start.', '.$perPage;
	}

	//Responsável por combinar duas ou mais tabelas
	public function join($from, $where)
	{	
		if(isset($from) && !empty($from) && isset($where) && !empty($where))
		{
			return $this->join .= 'JOIN '.$from.' ON '.$where.' ';
		}				
	}

	//Responsável por montar uma query
	public function prepare()
	{	
		return ($this->select.' '.$this->from.' '.$this->join.' '.$this->where.' '. $this->limit);		 	
	}    

	//Responsável por preparar uma query
	public function get()
	{	
		$this->sql = $this->prepare();
		return $this->conn->query($this->sql);
	}

	//Responsável por contar quantos registros há na tabela após uma pesquisa
	public function num_rows()
	{
		return $this->get()->rowCount();
	}

	//Responsável por contar quantos registros há na tabela
	public function rowCount()
	{
		$query = $this->conn->query($this->select.' '.$this->from.' '.$this->join.' '.$this->where);
		return $query->rowCount();
	}

	//Responsável por retornar todos as linhas da tabela
	public function result()
	{
		return $this->get()->fetchAll(PDO::FETCH_ASSOC);
	}

	//Responsável por retornar uma unica linha da tabela
	public function row()
	{
		return $this->get()->fetch(PDO::FETCH_ASSOC);
	}

	//Responsável por adicionar registros em uma tabela
	public function insert($from, $data = array())
	{
		$dados['set'] = '';
		$dados['values'] = '';

		foreach ($data as $colum => $value)
		{
			$dados['set'] .= '`'.$colum.'`, ';
			$dados['values'] .= '\''.$value.'\', ';
		}

		$this->values = substr($dados['values'], 0, -2);
		$this->set = substr($dados['set'], 0, -2);

		$this->insert = 'INSERT INTO `'.$from.'` ('.$this->set.') VALUES ('.$this->values.')';

		return $this->conn->exec($this->insert);
	}

	//Responsável por editar registros em uma tabela
	public function update($from, $data = array())
	{
		$dados['set'] = '';

		foreach ($data as $colum => $value)
		{
			$dados['set'] .= '`'.$colum.'` = \''.$value.'\', ';
		}

		$this->set = substr($dados['set'], 0, -2);

		$this->update = 'UPDATE `'.$from.'` SET '.$this->set.' '.$this->where;

		return $this->conn->exec($this->update);
	}

	//Responsável por deletar registros em uma tabela
	public function delete($from)
	{
		$this->delete = ('DELETE FROM `'.$from.'` '.$this->where);
		return $this->conn->exec($this->delete);
	}

	//Responsável por verificar se houve sucesso ao adicionar, editar ou deletar um registro
	public function affected_rows()
	{
		return $this->rowCount();
	}	

	//Responsável por retornar o id do ultimo registro inserido na tabela
	public function insert_id()
	{
		return $this->conn->lastInsertId();
	}

	//Responsável por carregar um biblioteca
	public function loadLibrarie($library)
	{		
		if(file_exists(LIBRARY_DIR.$library.EXT))
 		{	
 			require LIBRARY_DIR.$library.EXT;
			return new $library();
 		}
 		else
 		{
 			throw new Exception($library." não encontrada!");
 		}
	}	   
}

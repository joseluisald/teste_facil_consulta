<?php 
/*
 *@autor: José Luis
 *@Teste Facil Consulta
 *@MedicoController
*/	

class MedicoController extends Controller
{	
	private $medicoModel;
	private $pagination;

	public function __construct()
	{
		$this->medicoModel = $this->loadModel('MedicoModel');
		$this->pagination = $this->loadLibrarie('Pagination');
	}

	public function index()
	{	
		$this->loadView('frame/header');
		$this->loadView('frame/menu');
		$this->loadView('frame/navbar');
		$this->loadView('medico/listagem');
	}

	public function cadastro()
	{	
		$this->loadView('frame/header');
		$this->loadView('frame/menu');
		$this->loadView('frame/navbar');
		$this->loadView('medico/cadastro');
	}

	public function listagem()
	{
		$this->loadView('frame/header');
		$this->loadView('frame/menu');
		$this->loadView('frame/navbar');
		$this->loadView('medico/listagem');
	}

	public function editar($id)
	{	
		if(is_numeric($id) && !empty($id))
		{	
			$medico = $this->medicoModel->getMedicoById($id);

			if($medico)
			{
				$dados = array('medico' => $medico);

				$this->loadView('frame/header');
				$this->loadView('frame/menu');
				$this->loadView('frame/navbar');
				$this->loadView('medico/editar', $dados);
			}
			else
			{
				Header('Location:'.BASE_URL.'medico/listagem?er=1');
			}
		}
		else
		{
			Header('Location:'.BASE_URL.'medico/listagem?er=2');
		}	
	}	

	public function horario($id)
	{	
		if(is_numeric($id) && !empty($id))
		{	
			$medico = $this->medicoModel->getMedicoById($id);

			if($medico)
			{
				$dados = array('medico' => $medico);

				$this->loadView('frame/header');
				$this->loadView('frame/menu');
				$this->loadView('frame/navbar');
				$this->loadView('medico/horario', $dados);
			}
			else
			{
				Header('Location:'.BASE_URL.'medico/listagem?er=1');
			}
		}
		else
		{
			Header('Location:'.BASE_URL.'medico/listagem?er=2');
		}	
	}

	public function inserir()
	{	
		$addMedico = $this->medicoModel->inserir($_POST);
		echo json_encode($addMedico);
	}

	public function atualizar()
	{	
		$attMedico = $this->medicoModel->atualizar($_POST);
		echo json_encode($attMedico);
	}

	public function getMedicos()
	{
		$limit = PER_PAGE;  
		$perPage = (isset($_GET["p"])) ? $_GET["p"] : 1;  		
		$start = ($perPage - 1) * $limit;  		

		$getMedicos = $this->medicoModel->getMedicos($start, $limit);

		$totalRows = $getMedicos['total'];

		$this->pagination->paginate($totalRows, $limit, $perPage);

		$data = array
		(
			'dados' => $getMedicos['dados'],
			'total' => $getMedicos['total'],
			'paginate' => $this->pagination->links()
		);

		echo json_encode($data);
	}
}
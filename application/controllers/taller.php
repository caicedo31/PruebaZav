<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taller extends MY_Controller {
               
	function __construct()
	{
		parent::__construct();   
		$access = FALSE;
 
	}	
	function index()
	{
 		$this->content_view = 'taller/all';
	}
	function all()
	{
		 $rows = Usuario::find('all' ,['order' => 'id desc']);
		 $datos=array();
		 foreach ($rows as $rs):
		    $usuario=array();
		    $usuario['id']=$rs->id;
		    $usuario['nombre']=$rs->nombre;
		    $usuario['correo']=$rs->correo;
		    $usuario['celular']=$rs->celular;
		    $usuario['motivo']=$rs->motivo;
		    $usuario['comentario']=$rs->comentario;
 		    $datos[] = $usuario;
		 endforeach;
		 echo json_encode($datos);
		 exit();
 	}
	
	
	function create(){
  			$item = Usuario::create($_POST);
       		exit(); 
	}
	function update( ){
	        $id=$_POST['id'];
  			$item = Usuario::find($id);
			$item = $item->update_attributes($_POST);
			exit();
 	}
	function delete ( ){
	    $id=$_POST['id'];
		$item = Usuario::find($id);
 		$item->delete();
		exit();
  	}
	
}
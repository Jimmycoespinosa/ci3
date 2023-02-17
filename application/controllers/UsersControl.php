<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersControl extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->model("UsuariosModel");//Query Builder.
    }
    public function index($pag = 1)
    {
        //IMPLEMENTACIÓN PAGINACIÓN
        $pag--;
        if($pag < 0)
        {
            $pag =0;
        }
        $page_size = 5;
        $offset = $pag * $page_size;
        //IMPLEMENTACIÓN PAGINACIÓN

        //Query NO Seguro
		//$this->load->model("UserModel");
        //$users=$this->UserModel->getUser();
        //print_r($users);
        //$this->load->view("Header");
        //$this->load->view("UsersView", compact("users"));

        //Query Builder
        //$this->load->model("UsuariosModel");
        //$users = $this->UsuariosModel->getUsarios();
        //print_r($users);
        //$this->load->view("Header");
        //$this->load->view("UsersView", compact('users'));

        //Query Builder MaxId
        //$this->load->model("UsuariosModel");
        //$No = $this->UsuariosModel->getMaxId();
        //echo "ID MAYOR: ".$No[0]->id;     
        //print_r($No);
        
        //IMPLEMENTACIÓN PAGINACIÓN
        //$users=$this->UserModel->getUser();
        $vdata["users"] = $this->UsuariosModel->pagination($page_size, $offset);//Retorna registros por página de la tabla usuarios.
        $vdata["current_page"] = $pag + 1;
        $vdata["last_page"] = ceil($this->UsuariosModel->countUsers()/$page_size);
        $this->load->view("Header");
        $this->load->view("UsersView", $vdata);        
        //IMPLEMENTACIÓN PAGINACIÓN
    }

    public function saveUser()
    {
        // IMPLEMENTACIÓN FORM CON HTML        
        // if($this->input->get())
        // {
        //     //print_r($this->input->get());
        //     $nombre = $this->input->get('name');
        //     $correo = $this->input->get('email');
            
        //     //Query NO Seguro
        //     // if($this->UserModel->setUser($nombre, $correo))
        //     // {
        //     //     header("Location:".base_url());
        //     //     echo "Finalización ...";
        //     // }

        //     //Query Builder
        //     $datos = array("name"=>$nombre, "email"=>$correo);
        //     //print_r($datos);
        //     if($this->UsuariosModel->setUsuario($datos))
        //     {
        //         header("Location:".base_url());
        //         echo "Finalización ...";
        //     }
        // }

        // IMPLEMENTACIÓN FORM HELPER EN FORMS
        if($this->input->post())
        {
            //print_r($this->input->post());
            $nombre = $this->input->post('name');
            $correo = $this->input->post('email');

            //IMPLEMENTACIÓN QUERY BUILDER
            $datos = array("name"=>$nombre, "email"=>$correo);
            //print_r($datos);
            // if($this->UsuariosModel->setUsuario($datos))
            // {
            //     header("Location:".base_url());
            //     echo "Finalización ...";
            // }

            //IMPLEMENTACIÓN TRANSACCIONES
            try{
                $this->db->trans_begin();
                $this->UsuariosModel->setUsuario($datos);
                $id_usuario = $this->db->insert_id();
                $codigo = 'ES'.$id_usuario;
                $this->UsuariosModel->setCodigo($id_usuario, $codigo);
                $this->db->trans_commit();
                header("Location:".base_url());
            }
            catch(Exception $e)
            {
                $this->db->trasn_rollback();
            }
            //IMPLEMENTACIÓN TRANSACCIONES
        }
        else
        {
            echo "No recibe datos ...";
        }
    }

    public function editUser($id = null)
    { 
        if(!$id == null)
        {
            //print_r($this->input->get());
            //$user = $this->UserModel->getUserId($id);

            //IMPLEMENTACIÓN QUERY BUILDER
            $user = $this->UsuariosModel->getUsuario($id);
            $this->load->view("Header");
            $this->load->view("FormEditarView", compact("user"));
        }
        else
        {
            header("Location:".base_url());
        }
    }

    public function updateUser()
    { 
        // if($this->input->get())
        // {
        //     $id = $this->input->get('id');
        //     $nombre = $this->input->get('name');
        //     $correo = $this->input->get('email');
        //     if($this->UserModel->updateUser($id, $nombre, $correo))
        //     {
        //         header("Location:".base_url());
        //     }
        // }
        // else
        // {
        //     echo "No se enviaron datos ..";
        // }

        //IMPLEMENTACIÓN QUERY BUILDER
        if (!$this->input->post('Cancelar'))
        {
            if($this->input->post())
            {
                $id = $this->input->post('id');
                $codigo = $this->input->post('code');
                $nombre = $this->input->post('name');
                $correo = $this->input->post('email');
                if($codigo == "")
                {
                    $codigo = 'ES'.$id;
                }
                $datos = array('code'=>$codigo, 'name'=>$nombre, 'email'=>$correo);
                if($this->UsuariosModel->actualizaUsuario($id, $datos))
                {
                    echo "Se actualiza";
                    header("Location:".base_url());
                }
                else
                {
                    echo "NO se actualiza";
                    header("Location:".base_url().'editUser/'.$id);
                }
            }
            else
            {
                echo "No hay datos...";
                header("Location:".base_url());
            }
        }
        else
        {
            echo "Cancelar";
            header("Location:".base_url());
        }
    }

    public function deleteUser($id = null)
    { 
        if(!$id == null)
        {
            //if($this->UserModel->deleteUser($id))

            //IMPLEMENTACIÓN QUERY BUILDER
            if($this->UsuariosModel->deleteUser($id))
            {
                header("Location:".base_url());
            }
        }
        else{
            echo "No recibe datos ...";
        }
    }
}

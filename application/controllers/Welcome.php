<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
//Cargamos el modelo
        parent::__construct();
        $this->load->model('M_Marketing');

    }
    public function Chat()
    {
        $datos['companascm'] = $this->M_Marketing->CamapañasXCM($_SESSION['IdUsuario']);
        $this->load->view('Chat/Chat', $datos);
    }
    /////////////////////////////////////////Facebook
    public function publicarFacebook()
    {
        if (isset($_POST['publicar'])) {
            $this->load->library('facebook');
            $contenido = $_POST['contenido'];
            $imagen    = $_POST['imagenfack'];

            $ruta        = base_url() . "Disenos/" . $imagen;
            $arr         = array('message' => $contenido, 'source' => $this->facebook->object()->fileToUpload($ruta));
            $userProfile = $this->facebook->request('post', '168129400490861' . '/photos/', $arr, 'EAADDccDBPtsBANzlZCjSsZB8h9Q7oBCoXYSL2KdK0FFiW7xrQBk5ZCZAKSxISoQJFaHXZC4xfWvbBHcl4kQZBeda6q0TdgcVnXevPjvyvK5uOJjy5to8ygNuF81qXpZCZCXPDRhyZCDY1BprL61TqGUqQtyZBJD17FKT5dZAOzWZA32IpKdWLhwfAxsTnN43DTZBbbMoZD');
            //inserto a la tabla de publicaciones
            date_default_timezone_set("America/Mexico_City");
            $fecha                      = date('Y-m-d');
            $hora                       = date("H:i:s");
            $datosP['IdCampana']        = $_POST['campa'];
            $datosP['IdPNodo']          = $_POST['nodo'];
            $datosP['FechaPublicacion'] = $fecha;
            $datosP['HoraPublicacion']  = $hora;
            $this->M_Marketing->AddPublicacion($datosP);
            //recargo la vista  de revisionGCD
            $id = $this->session->userdata('IdUsuario');
            $this->M_Marketing->DeleteRevision($datosP, $id);
            $this->CMRevision($id);
        }
    }

    public function saveChat()
    {
        $datos['mensaje'] = $this->input->post('submitmsg');
        $this->M_Marketing->SaveEdit($datos);
        echo json_encode(true);
    }

    public function getUserByCampana($idcamapana)
    {
        $result = $this->M_Marketing->GetUsersByCampana($idcamapana);
        echo json_encode($result);
    }

    private function valida_session()
    {
        if (empty($this->session->userdata('usuario'))) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $user = $this->input->post('user');
        $pswd = $this->input->post('pswd');
        if ($user != 0 | $pswd != 0) {
            redirect('prueba1');
        }
        $this->load->view('LogIn');
    }

    public function valida()
    {

        //recibimos por POST el nombre de ususario y su clave
        $user = $this->input->post('user');
        $pswd = $this->input->post('pswd');

        //invocamos el metodo getUsuario del modelo M_Marketing
        $res       = $this->M_Marketing->getUsuario($user, $pswd);
        $usuario   = $res['Usuario'];
        $IdUsuario = $res['IdUsuario'];
        $this->session->set_userdata('usuario', $usuario);
        $this->session->set_userdata('IdUsuario', $IdUsuario);
        if (empty($res)) {
            redirect(base_url());
        } else {
            //se obtiene en rol
            $rol    = $res['Rol'];
            $IdUser = $res['IdUsuario'];
            switch ($rol) {
                case 1:
                    $datos['campañas'] = $this->M_Marketing->Camapañas();
                    $this->load->view('Admin/Administrador', $datos);
                    break;
                case 2:
                    $this->CM_Campanas($IdUser);
                    break;
                case 3:
                    $datos['campanasdiseñador'] = $this->M_Marketing->CamapañasAsigGC();
                    $datos2['nodos']             = $this->M_Marketing->GetNodos();
                    $this->load->view('GC/GC', $datos + $datos2);
                    break;
                case 4:
                    $datos['campanasdiseñador'] = $this->M_Marketing->CamapañasAsigDiseñador();
                    $this->load->view('Disenador/diseno', $datos);
                    break;

            }
            //registrar usuario en una viable de SESION
            //$this->session->set_userdata('usuario',$user);
            //$this->load->view('prueba1');
        }

    }
    public function CM_Campanas($IdUsuario)
    {
        $this->valida_session();
        $datos['campañas'] = $this->M_Marketing->CamapañasXCM($IdUsuario);
        //$datos2['cm']=$this->M_Marketing->GetCM();
        //$datos3['empresa']=$this->M_Marketing->GetEmpresas();
        $datos2['revisar']     = $this->M_Marketing->CDXRevisar($IdUsuario);
        $datos3['inforevisar'] = $this->M_Marketing->AllRevision($IdUsuario);
        //print_r($datos3);
        $this->load->view('CM/CM', $datos + $datos2 + $datos3);
    }

    public function recargarDisenador()
    {
        $datos['campanasdiseñador'] = $this->M_Marketing->CamapañasAsigDiseñador();
        $this->load->view('Disenador/diseno', $datos);
    }
//sube la imagen
    public function subirimagen2()
    {
        if (isset($_POST['guardar'])) {
            date_default_timezone_set("America/Mexico_City");
            $fecha     = date('Y-m-d');
            $idcampana = $_POST['campana'];
            $idnodo    = $_POST['nodo'];
            $nombre    = $_FILES['archivo']['name'];
            $idusuario = $this->session->userdata('IdUsuario');
            $destino   = "Disenos/" . $nombre;
            $ruta      = $_FILES["archivo"]["tmp_name"];
            copy($ruta, $destino);
            $dat['IdCampanaD']  = $idcampana;
            $dat['IdNodoD']     = $idnodo;
            $dat['Fecha']       = $fecha;
            $dat['Diseno']      = $nombre;
            $dat['IdDisenador'] = $idusuario;
            $this->M_Marketing->guardaDiseno($dat);
            redirect(base_url() . "index.php/welcome/recargarDisenador");
        }
        if (isset($_POST['enviar'])) {
            date_default_timezone_set("America/Mexico_City");
            $fecha      = date('Y-m-d');
            $comentario = $_POST['comentario'];
            $idcampana  = $_POST['campana'];
            $idnodo     = $_POST['nodo'];
            $idusuario  = $this->session->userdata('IdUsuario');
            $nombre     = $_FILES['archivo']['name'];
            if ($nombre != null) {
                $dat['Diseno'] = $nombre;
                $destino       = "Disenos/" . $nombre;
                $ruta          = $_FILES["archivo"]["tmp_name"];
                $cm            = $_POST['cm'];
                copy($ruta, $destino);
            } else {
                $dat['Diseno'] = $_POST['imagenfack'];
            }
            //$dat['IdRCampana']    = $idcampana;
            //$dat['IdRNodo']       = $idnodo;
            $dat['FechaEnvioDis'] = $fecha;
            $dat['IdRDis']        = $idusuario;
            //$dat['IdRCM']         = $cm;
            $dat['Comentarios'] = $comentario;
            $this->M_Marketing->RevisionDiseno($dat, $idcampana, $idnodo, $cm);
            redirect(base_url() . "index.php/welcome/recargarDisenador");
        }
    }

    public function CMRevision($IdUsuario)
    {
        $this->valida_session();

        $datos2['campanas'] = $this->M_Marketing->CamapañasXCMRevision($IdUsuario);
        $datos3['nodos']    = $this->M_Marketing->GetNodos();
        $this->load->view('CM/CMReviwPublicaciones', $datos2 + $datos3);
    }

    public function GetDC()
    {
        $this->valida_session();
        $nom1  = $_POST['valor1'];
        $nom2  = $_POST['valor2'];
        $datos = $this->M_Marketing->GetDC($nom1, $nom2);
        echo json_encode($datos);
    }

    public function GetContenido()
    {
        $this->valida_session();
        $nom1  = $_POST['valor1'];
        $nom2  = $_POST['valor2'];
        $nom3  = $_POST['valor3'];
        $datos = $this->M_Marketing->GetContenido($nom1, $nom2, $nom3);
        echo json_encode($datos);
    }

    public function Back()
    {
        $this->valida_session();
        $this->load->view('Admin/Administrador');
    }

    public function AdminCampanas()
    {
        $this->valida_session();
        $this->load->view('Admin/CampanasAdmin');
    }

//function AdminUsuarios(){
    //]//    $this->valida_session();
    //$this->load->view('UsuariosAdmin');
    //]//}

/////////////////////////////////////////////CAMPAÑAS CRUD//////////////////////////////////

    public function GetCamapanas()
    {
        $this->valida_session();
        $datos['campañas'] = $this->M_Marketing->Camapañas();
        $datos2['cm']       = $this->M_Marketing->GetCM();
        $datos3['empresa']  = $this->M_Marketing->GetEmpresas();
        $datos4['estado']   = $this->M_Marketing->GetEstadosCamp();
        $this->load->view('Admin/CampanasAdmin', $datos + $datos2 + $datos3 + $datos4);

    }

    public function llenatabale()
    {
        $datos['campañas'] = $this->M_Marketing->Camapañas();
        $datos2['cm']       = $this->M_Marketing->GetCM();
        $datos3['empresa']  = $this->M_Marketing->GetEmpresas();
        $datos4['estado']   = $this->M_Marketing->GetEstadosCamp();
        $cam['data']        = $datos;
        echo json_encode($cam);
    }

    public function add_Campana()
    {
//recibimos los datos por POST del formulario para agregarlos a la tabla contactos
        $this->valida_session();
        $datos['NombreCampana']    = $this->input->post('campañanomADD');
        $datos['Objetivo']         = $this->input->post('objADD');
        $datos['empresa']          = $this->input->post('empresaADD');
        $datos['Representante']    = $this->input->post('responsableADD');
        $datos['FechaInicio']      = $this->input->post('f_iniADD');
        $datos['FechaTermino']     = $this->input->post('f_finADD');
        $datos['CommunityManager'] = $this->input->post('selectCMADD');
        $datos['Estado']           = $this->input->post('estadoADD');

        //llamamos los datos del nuevo contacto al modelo
        $this->M_Marketing->save_Campa($datos);
        sleep(1.5);
        redirect(base_url() . "index.php/welcome/GetCamapanas");

    }

    public function MostrarCampana()
    {
        $id = $this->input->get('idc');

        $result = $this->M_Marketing->ObtenerCampaña($id);

        echo json_encode($result);
        //print_r($result);
    }

    public function edit_Campana()
    {
        $id                        = $this->input->post('idcampa');
        $datos['NombreCampana']    = $this->input->post('campañanom');
        $datos['Objetivo']         = $this->input->post('obj');
        $datos['empresa']          = $this->input->post('idempresa');
        $datos['Representante']    = $this->input->post('responsable');
        $datos['FechaInicio']      = $this->input->post('f_ini');
        $datos['FechaTermino']     = $this->input->post('f_fin');
        $datos['CommunityManager'] = $this->input->post('cm');
        $datos['Estado']           = $this->input->post('estado');

        $this->M_Marketing->updateCampana($id, $datos);
        sleep(1.5);
        $this->GetCamapanas();
    }

    public function borra_campana($id)
    {
        $this->valida_session();
        $this->M_Marketing->deleteCampana($id);
        sleep(1.5);
        $this->GetCamapanas();
    }
/////////////////////////////////////////////CAMPAÑAS CRUD//////////////////////////////////

/////////////////////////////////////////////EMPRESAS CRUD////////////////////////////////
    public function addRepre()
    {
        $this->valida_session();
        $datos['Nombre']     = $this->input->post('representante');
        $datos['Telefono']   = $this->input->post('emptelR');
        $datos['Correo']     = $this->input->post('empcorreoR');
        $datos['IdEmpresaR'] = $this->input->post('idempresaR');
        $this->M_Marketing->AddRepresentante($datos);

        $this->AdminEmpresas();
    }
    public function AdminEmpresas()
    {
        $this->valida_session();
        $datos['empresas'] = $this->M_Marketing->GetEmpresas();
        $this->load->view('Admin/EmpresaAdmin', $datos);
    }

    public function add_Empre()
    {
        $this->valida_session();
        $datos['Nombre']        = $this->input->post('nomempresa');
        $datos['Representante'] = $this->input->post('representante');
        $datos['Telefono']      = $this->input->post('emptel');
        $datos['Correo']        = $this->input->post('empcorreo');

        //llamamos los datos del nuevo contacto al modelo
        $this->M_Marketing->save_Empresa($datos);
        sleep(1.5);
        redirect(base_url() . "index.php/welcome/AdminEmpresas");
    }

    public function edit_Empresa()
    {
        $id = $this->input->post('idempresa');
        $this->valida_session();
        $datos['Nombre']        = $this->input->post('nomempresa');
        $datos['Representante'] = $this->input->post('representante');
        $datos['Telefono']      = $this->input->post('emptel');
        $datos['Correo']        = $this->input->post('empcorreo');

        //llamamos los datos del nuevo contacto al modelo
        $this->M_Marketing->UpdateEmpresa($id, $datos);
        sleep(1.5);
        $this->AdminEmpresas();
    }

    public function borra_empresa($id)
    {
        $this->valida_session();
        $this->M_Marketing->deleteEmpresa($id);
        sleep(1.5);
        $this->AdminEmpresas();
    }

///////////////////////////////////////////////////////////////// USUARIO /////////////////////////////////
    public function GetUsuarios()
    {
        //validamos la session
        $this->valida_session();
        $datos['usuarios'] = $this->M_Marketing->UsuariosRol();
        $datos2['roles']   = $this->M_Marketing->Roles();
        $this->load->view('Admin/UsuariosAdmin', $datos + $datos2);
    }
    public function add_Usuario()
    {
        $this->valida_session();
        $datos['Nombre']      = $this->input->post('nom');
        $datos['Usuario']     = $this->input->post('user');
        $datos['Contraseña'] = $this->input->post('contrasena');
        $datos['Rol']         = $this->input->post('namRol');

        //llamamos los datos del nuevo contacto al modelo
        $this->M_Marketing->save_Usuario($datos);
        sleep(1.5);
        redirect(base_url() . "index.php/welcome/GetUsuarios");
    }

    public function MostrarUsuario()
    {
        $id = $this->input->get('idu');

        $result = $this->M_Marketing->ObtenerUsuario($id);

        echo json_encode($result);
    }

    public function edit_User()
    {
        $this->valida_session();
        $id                   = $this->input->post('iduserE');
        $datos['Nombre']      = $this->input->post('nomuserE');
        $datos['Usuario']     = $this->input->post('userE');
        $datos['Contraseña'] = $this->input->post('passE');
        $datos['Rol']         = $this->input->post('roluserE');
        //llamamos los datos del nuevo contacto al modelo
        $this->M_Marketing->UpdateUsuario($id, $datos);
        sleep(1.5);
        $this->GetUsuarios();
    }

    public function borra_usuario($id)
    {
        $this->valida_session();
        $this->M_Marketing->deleteUsuario($id);
        sleep(1.5);
        $this->GetUsuarios();
    }
/////////////////////////////////////////////CM Campañas Asigandas///////////////////////////////////////////////
    public function CampanasAsigCM($IdUsuario)
    {
        $this->valida_session();
        $datos['campañas'] = $this->M_Marketing->CamapañasXCM($IdUsuario);
        $this->load->view('CM/CampanasAsignadasCM', $datos);
    }

    public function AsignUserCM($IdUsuario)
    {
        $this->valida_session();
        $datos['usuarios']  = $this->M_Marketing->AsignarUsuariosCM();
        $datos2['campanas'] = $this->M_Marketing->CamapañasXCM($IdUsuario);
        $datos3['nodos']    = $this->M_Marketing->GetNodos();
        $this->load->view('CM/AsignarUsuarioCM', $datos + $datos2 + $datos3);
    }

    public function RedSemanticaCM()
    {
        $this->valida_session();
        $id                 = $this->session->userdata('IdUsuario');
        $datos['campañas'] = $this->M_Marketing->CamapañasXCM($id);
        $datos2['empresa']  = $this->M_Marketing->empresasXC($id);
        print_r($datos2);
        $this->load->view('CM/RedSemantica2', $datos + $datos2);
    }

    public function AddRoles()
    {
        $this->valida_session();
        $id     = $this->input->post('idcampa');
        $idnodo = $this->input->post('idnodo');
        if (!empty($idnodo)) {
            if (!empty($_POST['check_gc']) || !empty($_POST['check_d'])) {
                date_default_timezone_set("America/Mexico_City");
                $fecha = date('Y-m-d');
                $hora  = date("H:i:s");
                foreach ($_POST['check_d'] as $selected2) {
                    foreach ($_POST['check_gc'] as $selected) {
                        $datos['IdCampana']       = $id;
                        $datos['IdGc']            = $selected;
                        $datos['IdDisenador']     = $selected2;
                        $datos['FechaAsignacion'] = $fecha;
                        $datos['IdNodoGrupo']     = $idnodo;
                        $datos['FechaEntregaDC']  = $_POST['fechaentrega'];
                        $idCM                     = $_SESSION['IdUsuario'];
                        $this->M_Marketing->AddGrupo($datos);
                        $datos2['IdRCampana'] = $id;
                        $datos2['IdRCM']      = $idCM;
                        $datos2['IdRNodo']    = $idnodo;
                        $datos2['IdRGC']      = $selected;
                        $datos2['IdRDis']     = $selected2;
                        $this->M_Marketing->AddRevison($datos2);
                    }
                }sleep(1.5);
                $this->AsignUserCM($_SESSION['IdUsuario']);

            }
        } else {
            $this->AsignUserCM($_SESSION['IdUsuario']);
        }
        //$this->M_Marketing->addRoles($id,$datos);
    }

    public function LogOut()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

///RED
    public function nodosjson($ca)
    {

        header('Content-Type: application/json');
        $json = $this->M_Marketing->nodosjson($ca);
        echo json_encode($json);

    }

    public function campajson($campana)
    {
        header('Content-Type: application/json');
        $json = $this->M_Marketing->getCamp($campana);

        echo json_encode($json);

    }

    public function campajson2($campana)
    {
        header('Content-Type: application/json');
        $json = $this->M_Marketing->getCamp2($campana);

        echo json_encode($json);

    }
    public function campajson2Revision($campana)
    {
        header('Content-Type: application/json');
        $json = $this->M_Marketing->getCamp2Revision($campana);

        echo json_encode($json);

    }

    public function campanasjson($idempresa)
    {
        header('Content-Type: application/json');
        $json = $this->M_Marketing->getCampanasJSON($idempresa);

        echo json_encode($json);
    }

    public function redSemantica()
    {
        $campana = $this->input->get('campanared');

        if (isset($_POST['c'])) {
            $id       = $this->session->userdata('IdUsuario');
            $id_campa = $_POST['c'];

            $campas['campañas'] = $this->M_Marketing->CamapañasXCM($id);
            $datos               = array('redsemantica' => $this->M_Marketing->getRedSemantica($id_campa));
            $principal           = array('principal' => $this->M_Marketing->principal($id_campa));
            $principal2          = array('principal2' => $this->M_Marketing->principal2($id_campa));
            $datos2['empresa']   = $this->M_Marketing->empresasXC($id);
            $this->load->view('CM/RedSemantica2', $datos + $campas + $principal + $principal2 + $datos2);

        } else {
            if (!empty($campana)) {
                $id = $this->session->userdata('IdUsuario');

                $campas['campañas'] = $this->M_Marketing->CamapañasXCM($id);
                $datos               = array('redsemanticanodo' => $this->M_Marketing->getRedSemantica($campana));
                $principal           = array('principal' => $this->M_Marketing->principal($campana));
                $principal2          = array('principal2' => $this->M_Marketing->principal2($campana));
                $this->load->view('CM/RedSemantica2', $datos + $campas + $principal + $principal2);
                //redirect(base_url() . "index.php/welcome/redSemantica?campanared=" . $campana);

            } else {
                $this->RedSemanticaCM();
            }

        }
    }

    public function red2()
    {
        $id = $this->session->userdata('IdUsuario');
        header('Content-Type: application/json');
        if (isset($_POST['campana'])) {
            $id_campa            = $_POST['campana'];
            $campas['campañas'] = $this->M_Marketing->CamapañasXCM($id);
            $datos               = array('redsemantica' => $this->M_Marketing->getRedSemantica($id_campa));
            $principal           = array('principal' => $this->M_Marketing->principal($id_campa));
            $principal2          = array('principal2' => $this->M_Marketing->principal2($id_campa));
            $this->load->view('CM/RedSemantica2', $datos + $campas + $principal + $principal2);
        } else {
            $this->RedSemanticaCM();
        }
    }

    public function agregarnodo()
    {
        $id = $this->session->userdata('IdUsuario');
        echo $this->input->post('campana');
        header('Content-Type: application/json');
        if ($this->input->post('campana')) {
            $id_campana            = $_POST['campana'];
            $nodos                 = $_POST['nodos'];
            $nodo                  = $_POST['nodo'];
            $datos['IdCampanaRed'] = $id_campana;
            $datos['Nodo']         = $nodo;
            $datos['IdUsuario']    = $id;
            $datos['Padre']        = $nodos;
            $this->M_Marketing->agregarnodo($datos);

            // $campas['campañas'] = $this->M_Marketing->CamapañasXCM($id);
            // $datos2              = array('redsemantica' => $this->M_Marketing->getRedSemantica($id_campana));
            // $principal           = array('principal' => $this->M_Marketing->principal($id_campana));
            // $principal2          = array('principal2' => $this->M_Marketing->principal2($id_campana));
            // //print_r($datos2);
            // $this->load->view('CM/RedSemantica2', $datos2 + $campas + $principal + $principal2);
            redirect(base_url() . "index.php/welcome/redSemantica?campanared=" . $id_campana);
        } else {
            $json = array('error', 'llene todos los datos');
            echo json_encode($json);
        }
    }

    public function guardarContenido()
    {
        $id = $this->session->userdata('IdUsuario');
        echo $this->input->post('campana');
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora  = date("H:i:s");
        header('Content-Type: application/json');
        if ($this->input->post('campana')) {
            $id_campana = $_POST['campana'];
            $nodo       = $_POST['nodo'];
            $contenido  = $_POST['contenido'];

            $datos['IdCampanaC'] = $id_campana;
            $datos['IdNodoC']    = $nodo;
            $datos['IdGC']       = $id;
            $datos['contenido']  = $contenido;
            $datos['fecha']      = $fecha;
            sleep(1.5);
            $this->M_Marketing->guardaContenido($datos);

        } else {
            $json = array('error', 'llene todos los datos');
            echo json_encode($json);
        }
    }

    public function guardarDiseno()
    {
        $id = $this->session->userdata('IdUsuario');
        echo $this->input->post('campana');
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora  = date("H:i:s");
        header('Content-Type: application/json');
        if ($this->input->post('campana')) {
            $id_campana = $_POST['campana'];
            $nodo       = $_POST['nodo'];
            $archivo    = $_POST['archivo'];

            $datos['IdCampanaD']  = $id_campana;
            $datos['IdNodoD']     = $nodo;
            $datos['IdDisenador'] = $id;
            $datos['Diseno']      = $archivo;
            $datos['fecha']       = $fecha;
            sleep(1.5);
            $this->M_Marketing->guardaDiseno($datos);

        } else {
            $json = array('error', 'llene todos los datos');
            echo json_encode($json);
        }
    }

    public function RevisonContenido()
    {
        $id = $this->session->userdata('IdUsuario');
        echo $this->input->post('campana');
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora  = date("H:i:s");
        header('Content-Type: application/json');
        if ($this->input->post('campana')) {
            print_r($this->input->post('campana'));
            $id_campana          = $_POST['campana'];
            $nodo                = $_POST['nodo'];
            $contenido           = $_POST['contenido'];
            $cm                  = $_POST['cm'];
            $datos['IdRGC']      = $id;
            $datos['Contenido']  = $contenido;
            $datos['FechaEnvio'] = $fecha;
            sleep(1.5);
            $this->M_Marketing->RevisionContenido($datos, $id_campana, $nodo, $cm);

        } else {
            $json = array('error', 'llene todos los datos');
            echo json_encode($json);
        }
    }

    public function RevisonDiseno()
    {
        $id = $this->session->userdata('IdUsuario');
        echo $this->input->post('campana');
        date_default_timezone_set("America/Mexico_City");
        $fecha = date('Y-m-d');
        $hora  = date("H:i:s");
        header('Content-Type: application/json');
        if ($this->input->post('campana')) {
            print_r($this->input->post('campana'));
            $id_campana             = $_POST['campana'];
            $nodo                   = $_POST['nodo'];
            $archivo                = $_POST['archivo'];
            $cm                     = $_POST['cm'];
            $datos['IdRDis']        = $id;
            $datos['Diseno']        = $archivo;
            $datos['FechaEnvioDis'] = $fecha;
            sleep(1.5);
            $this->M_Marketing->RevisionDiseno($datos, $id_campana, $nodo, $cm);
        } else {
            $json = array('error', 'llene todos los datos');
            echo json_encode($json);
        }
    }

    public function dropnodo()
    {
        if (isset($_POST['nodo'])) {
            $nodo = $_POST['nodo'];
            $this->M_Marketing->dropnodo($nodo);
            $this->RedSemanticaCM();
        } else {
            $this->RedSemanticaCM();
        }

    }
    public function buscampa()
    {
        $tabla = "";
        if (isset($_POST['campa'])) {
            $q = addslashes($_POST['campa']);

            $query = $this->db->query("SELECT * FROM empresas WHERE
        IdEmpresa LIKE '%" . $q . "%' OR
        nombre_empresa LIKE '%" . $q . "%'");

        }

        if (isset($_POST['campa']) > 0) {

            if ($query->num_rows() > 0) {

                $tabla .= '';

                foreach ($query->result_array() as $row) {

                    $tabla .=
                        '<div class="mdl-list">
                                    <div class="mdl-list__item mdl-list__item--two-line">
                                        <span class="mdl-list__item-primary-content">
                                            <i class="zmdi zmdi-account mdl-list__item-avatar"></i>
                                            <span> Nombre: ' . $row['IdEmpresa'] . '</span>
                                            <span class="mdl-list__item-sub-title">Tipo de usuario: ' . $row['Nombre'] . '</span>


                                        </span>


                                       <td><a  onClick="confirmar(this);" data="Baja/' . $row['IdEmpresa'] . '"><span style="color: red;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>


                                            <script>
                                              function confirmar(temp){
                                                res = confirm("¿Desea deshabilitar usuario?");
                                                if (res == true){
                                                   enlace = $(temp).attr("data");
                                                   $(temp).attr("href",enlace);
                                                }
                                              }

                                            </script>



                                    </div>

                                </div>';

                }
                $tabla .= '</table>';

            } else {
                $tabla = "No se encontraron coincidencias con sus criterios de búsqueda.";

            }

        }
        echo $tabla;
    }

}

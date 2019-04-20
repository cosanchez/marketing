<?php
class M_Marketing extends CI_Model
{
    public function SaveEdit($text)
    {
        $this->db->insert('chat', $text);
    }

    public function CDXRevisar($IdUser)
    {
        $this->db->select('COUNT(IdRNodo) revisar');
        $this->db->from('revisiongcd r');
        $this->db->join('campanas c', 'r.IdRCampana = c.IdCampana');
        $this->db->join('red re', 'r.IdRNodo = re.IdRed');
        $this->db->where('IdRCM', $IdUser);
        $result = $this->db->get();

        return $result->result_array();
        //selectcount(IdRNodo) as porrevisarfromrevisiongcdwhereIdRCM = 6
    }

    public function AllRevision($IdUsuario)
    {
        $this->db->select('r.*,c.NombreCampana,re.Nodo');
        $this->db->from('revisiongcd r');
        $this->db->join('campanas c', 'r.IdRCampana = c.IdCampana');
        $this->db->join('red re', 'r.IdRNodo = re.IdRed');
        $this->db->where('r.IdRCM', $IdUsuario);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function DeleteRevision($datosP, $id)
    {
        $this->db->where('IdRCampana', $datosP['IdCampana']);
        $this->db->where('IdRCM', $id);
        $this->db->where('IdRNodo', $datosP['IdPNodo']);
        $this->db->delete('revisiongcd');
    }

    public function AddPublicacion($datosP)
    {
        $this->db->insert('publicaciones', $datosP);
    }

    public function GetDC($nom1, $nom2)
    {
        $this->db->select('Diseno, Contenido');
        $this->db->where('IdRCampana', $nom1);
        $this->db->where('IdRNodo', $nom2);
        $result = $this->db->get('revisiongcd');

        return $result->result_Array()[0];
    }

    public function GetContenido($nom1, $nom2, $nom3)
    {
        $this->db->select('Diseno,Contenido');
        $this->db->where('IdRCampana', $nom1);
        $this->db->where('IdRNodo', $nom2);
        $this->db->where('IdRCM', $nom3);
        $result = $this->db->get('revisiongcd');

        return $result->result_Array()[0];
    }

    public function getUsuario($user, $pswd)
    {
        $this->db->where('Usuario', $user);
        $this->db->where('Contraseña', $pswd);
        $query = $this->db->get('usuarios');

        return $query->result_Array()[0];
    }

    public function GetUsersByCampana($idcamapana)
    {
        $this->db->where('IdCampana', $idcamapana);
        $query = $this->get('grupoasignado');

        return $query->result_array();

    }

    public function UsuariosRol()
    {
        $this->db->select('a.*,d.IdRol IdRol, d.Nombre RolNombre');
        $this->db->from('usuarios a');
        $this->db->join('roles d', 'a.Rol = d.IdRol');
        $aResult = $this->db->get();

        return $aResult->result_array();

    }

    public function AsignarUsuariosCM()
    {
        $this->db->select('u.*,r.IdRol IdRol, r.Nombre RolNombre');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.Rol = r.IdRol');
        $this->db->where('u.Rol !=', 2);
        $this->db->where('u.Rol !=', 1);
        $query = $this->db->get();

        return $query->result_Array();
    }

    public function Roles()
    {
        $aResult = $this->db->get('roles');

        return $aResult->result_array();
    }

    public function GetEstadosCamp()
    {
        $aResult = $this->db->get('estadocamp');

        return $aResult->result_array();
    }

    public function ObtenerCampaña($id)
    {
        $this->db->select('c.IdCampana IdC,
                        c.empresa empresa,
                        c.CommunityManager cm,
                         c.Estado Estado,
                         c.NombreCampana NombreCampana,
                         c.Objetivo Objetivo,
                         e.Nombre NombreE,
                         e.Representante Representante,
                         c.FechaInicio FechaInicio,
                         c.FechaTermino FechaTermino,
                         u.Nombre NombreU,
                         ec.Descripcion des
                         ');
        $this->db->from('campanas c');
        $this->db->join('empresa e', 'c.empresa = e.IdEmpresa');
        $this->db->join('usuarios u', 'c.CommunityManager = u.IdUsuario');
        $this->db->join('estadocamp ec', 'c.Estado = ec.IdEstado');
        $this->db->where('c.IdCampana', $id);
        $aResult = $this->db->get();

        return $aResult->result_array()[0];
    }

    public function ObtenerUsuario($id)
    {
        $this->db->select(' u.Nombre NombreU,
                            u.IdUsuario IdUsuarioU,
                            u.Usuario Usuario,
                            u.Contraseña Contraseña,
                            r.*');
        $this->db->from('usuarios u');
        $this->db->join('roles r', 'u.Rol = r.IdRol');
        $this->db->where('u.IdUsuario', $id);
        $aResult = $this->db->get();

        return $aResult->result_array()[0];
    }

    public function Camapañas()
    {
        $this->db->select('c.IdCampana,
                         c.CommunityManager cm,
                         c.Estado Estado,
                         c.NombreCampana NombreCampana,
                         c.Objetivo Objetivo,
                         e.Nombre NombreE,
                         e.Representante Representante,
                         c.FechaInicio FechaInicio,
                         c.FechaTermino FechaTermino,
                         u.Nombre NombreU,
                         ec.Descripcion des
                         ');
        $this->db->from('campanas c');
        $this->db->join('empresa e', 'c.empresa = e.IdEmpresa');
        $this->db->join('usuarios u', 'c.CommunityManager = u.IdUsuario');
        $this->db->join('estadocamp ec', 'c.Estado = ec.IdEstado');
        $aResult = $this->db->get();

        return $aResult->result_array();

    }

    public function empresasXC($IdUser)
    {
        $this->db->select('c.*,u.*,e.*,em.Nombre nomE,em.IdEmpresa idE');
        $this->db->from('campanas c');
        $this->db->join('usuarios u', 'c.CommunityManager=u.IdUsuario');
        $this->db->join('estadocamp e', 'c.Estado=e.IdEstado');
        $this->db->join('empresa em', 'c.empresa = em.IdEmpresa');
        $this->db->where('CommunityManager', $IdUser);
        $this->db->group_by('c.empresa');
        $aResult = $this->db->get();
        return $aResult->result_array();
    }
    public function CamapañasXCM($IdUser)
    {
        $this->db->select('c.*,u.*,e.*,em.Nombre nomE,em.IdEmpresa idE');
        $this->db->from('campanas c');
        $this->db->join('usuarios u', 'c.CommunityManager=u.IdUsuario');
        $this->db->join('estadocamp e', 'c.Estado=e.IdEstado');
        $this->db->join('empresa em', 'c.empresa = em.IdEmpresa');
        $this->db->where('CommunityManager', $IdUser);
        $aResult = $this->db->get();

        return $aResult->result_array();
    }
    public function CamapañasXCMRevision($IdUser)
    {
        $this->db->select('c.*,u.*,e.*,em.Nombre nomE,em.IdEmpresa idE');
        $this->db->from('campanas c');
        $this->db->join('usuarios u', 'c.CommunityManager=u.IdUsuario');
        $this->db->join('estadocamp e', 'c.Estado=e.IdEstado');
        $this->db->join('empresa em', 'c.empresa = em.IdEmpresa');
        $this->db->join('revisiongcd rgd', 'c.IdCampana=rgd.IdRCampana');
        $this->db->where('CommunityManager', $IdUser);
        $this->db->group_by('c.IdCampana');
        $aResult = $this->db->get();

        return $aResult->result_array();
    }

    public function CamapañasAsigDiseñador()
    {
        $this->db->distinct();
        $this->db->select('DISTINCT(em.Nombre),em.IdEmpresa,c.CommunityManager');
        $this->db->from('campanas c');
        $this->db->join('grupoasignado ga', 'c.IdCampana=ga.IdCampana');
        $this->db->join('empresa em', 'c.empresa = em.IdEmpresa');
        $this->db->join('usuarios u', 'ga.IdDisenador=u.IdUsuario');
        $this->db->where('ga.IdDisenador', $_SESSION['IdUsuario']);
        $aResult = $this->db->get();

        return $aResult->result_Array();
    }

    public function CamapañasAsigGC()
    {
        $this->db->distinct();
        $this->db->select('DISTINCT(em.Nombre),em.IdEmpresa,c.CommunityManager');
        $this->db->from('campanas c');
        $this->db->join('grupoasignado ga', 'c.IdCampana=ga.IdCampana');
        $this->db->join('empresa em', 'c.empresa = em.IdEmpresa');
        $this->db->join('usuarios u', 'ga.IdGC=u.IdUsuario');
        $this->db->where('ga.IdGC', $_SESSION['IdUsuario']);
        $aResult = $this->db->get();

        return $aResult->result_Array();
    }

    public function GetCM()
    {
        $this->db->where('Rol', 2);

        $aResult = $this->db->get('usuarios');

        return $aResult->result_Array();
    }

    public function GetEmpresas()
    {
        $this->db->order_by('IdEmpresa', 'asc');
        $aResult = $this->db->get('empresa');

        return $aResult->result_array();

    }

    public function AddRepresentante($datos)
    {
        $this->db->insert('representantes', $datos);
    }

    public function save_Campa($datos)
    {
        $this->db->insert('campanas', $datos);
    }

    public function save_DetalleCampa()
    {
        $this->db->insert('detallecampanas', $datos);
    }

    public function save_Empresa($datos)
    {
        $this->db->insert('empresa', $datos);
    }

    public function save_Usuario($datos)
    {
        $this->db->insert('usuarios', $datos);
    }

    public function updateCampana($id, $datos)
    {
        $this->db->where('IdCampana', $id);
        $this->db->update('campanas', $datos);
    }

    public function UpdateEmpresa($id, $datos)
    {
        $this->db->where('IdEmpresa', $id);
        $this->db->update('empresa', $datos);
    }

    public function UpdateUsuario($id, $datos)
    {
        $this->db->where('IdUsuario', $id);
        $this->db->update('usuarios', $datos);
    }

    public function deleteCampana($id)
    {
        $this->db->where('IdCampana', $id);
        $this->db->delete('campanas');
    }

    public function deleteEmpresa($id)
    {
        $this->db->where('IdEmpresa', $id);
        $this->db->delete('empresa');
    }

    public function deleteUsuario($id)
    {
        $this->db->where('IdUsuario', $id);
        $this->db->delete('usuarios');
    }

    public function AddGrupo($datos)
    {
        $this->db->insert('grupoasignado', $datos);
    }
    /*function getRoles(){
    $query = $this -> db -> get('usuarios');
    return $query -> result_Array();
    }
    function getProductos(){
    $query = $this -> db -> get('productos');

    return $query -> result_Array();
    }*/
    //RED{
    public function GetNodos()
    {
        $aResult = $this->db->get('red');
        return $aResult->result_Array();
    }
    public function nodosjson($ca)
    {
        $this->db->where('IdCampanaRed', $ca);
        $this->db->from('red');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function dropnodo($nodo)
    {
        $this->db->where('IdRed', $nodo);
        $this->db->delete('red');
    }

    public function getRedSemantica($id_campa)
    {
        $this->db->select('*');
        $this->db->from('red');
        $this->db->where('IdCampanaRed', $id_campa);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function principal($id_campa)
    {
        $this->db->where('IdCampana', $id_campa);
        $this->db->from('campanas c');
        $this->db->join('red t', 'c.IdCampana=t.IdCampanaRed');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function principal2($id_campa)
    {
        $this->db->where('IdCampana', $id_campa);
        $this->db->from('campanas');
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function agregarnodo($datos)
    {
        $this->db->insert('red', $datos);
    }

    public function guardaContenido($datos)
    {
        $this->db->insert('contenidos', $datos);
    }

    public function guardaDiseno($datos)
    {
        $this->db->insert('disenos', $datos);
    }

    public function AddRevison($datos2)
    {
        $this->db->insert('revisiongcd', $datos2);

    }

    public function RevisionContenido($datos, $id_campana, $nodo, $cm)
    {
        $this->db->where('IdRCampana', $id_campana);
        $this->db->where('IdRCM', $cm);
        $this->db->where('IdRNodo', $nodo);
        $this->db->update('revisiongcd', $datos);
    }

    public function RevisionDiseno($datos, $id_campana, $nodo, $cm)
    {
        $this->db->where('IdRCampana', $id_campana);
        $this->db->where('IdRCM', $cm);
        $this->db->where('IdRNodo', $nodo);
        $this->db->update('revisiongcd', $datos);
    }

    public function getCamp($campa)
    {
        $this->db->where('IdCampana', $campa);
        $this->db->from('grupoasignado c');
        $this->db->join('red r', 'c.IdNodoGrupo=r.IdRed');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCamp2($campa)
    {
        $this->db->where('IdCampana', $campa);
        $this->db->from('campanas c');
        $this->db->join('red r', 'c.IdCampana=r.IdCampanaRed');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCamp2Revision($campa)
    {
        $this->db->where('IdCampana', $campa);
        $this->db->from('campanas c');
        $this->db->join('red r', 'c.IdCampana=r.IdCampanaRed');
        $this->db->join('revisiongcd rgd', 'r.IdRed=rgd.IdRNodo');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCampanasJSON($idempresa)
    {
        $this->db->where('Empresa', $idempresa);
        $this->db->from('campanas');
        $query = $this->db->get();
        return $query->result_array();
    }

}

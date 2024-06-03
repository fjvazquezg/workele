<?php
require_once('conexion.class.php');
    class Functions
    {
        private static $instancia;
        private $dbh;
        private function __construct()
        {
     
            $this->dbh = Conexion::singleton_conexion();
     
        }
     
        public static function singleton_functions()
        {
     
            if (!isset(self::$instancia)) {
     
                $miclase = __CLASS__;
                self::$instancia = new $miclase;
     
            }
     
            return self::$instancia;
     
        }
      
        public function __clone()
        {
            trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
        }

        // Funcion para el login de usuario
        public function login($usuario, $password)
        {        
            try {
            $sql = "SELECT * FROM tbl_usuario where (password='$password' and correo='$usuario')";
            $query = $this->dbh->prepare($sql);
            $query->execute();
            $data = array();
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }}catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
               
            }        
            return $data;
        }

        // Funciones para los consecutivos
        public function consec_experiencia()
        {
            try
            {
                $sql = "SELECT IFNULL(MAX(id_experiencia),0) + 1 AS CONSECUTIVO FROM tbl_experiencia_laboral";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() == 1)
                {
                    $fila = $query->fetch();
                    $f_idexperiencia = $fila['CONSECUTIVO'];
                    return $f_idexperiencia;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }
        public function consec_favoritos()
        {
            try
            {
                $sql = "SELECT IFNULL(MAX(id_favoritos),0) + 1 AS CONSECUTIVO FROM tbl_favoritos";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() == 1)
                {
                    $fila = $query->fetch();
                    $f_idfavoritos = $fila['CONSECUTIVO'];
                    return $f_idfavoritos;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        function consec_usuario()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id_usuario), 0) + 1 AS CONSECUTIVO FROM tbl_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;

                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_id_usuario = $fila['CONSECUTIVO'];
                        return $f_id_usuario;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            function consec_vacantes()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id_vacante), 0) + 1 AS CONSECUTIVO FROM tbl_vacantes";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;

                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_id_usuario = $fila['CONSECUTIVO'];
                        return $f_id_usuario;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            function consec_formacion()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_formacion),0) + 1 AS CONSECUTIVO FROM tbl_formacion_academica";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_IdCitaDet = $fila['CONSECUTIVO'];
                        return $f_IdCitaDet;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            public function consecutivo_interes()
            {        
                try {
                    
                    $sql="SELECT IFNULL(MAX(id_di),0)+1 as consecutivo from tbl_dinteres";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    if ($query->rowcount()==1)
                    {
                        $fila = $query -> fetch();
                        $id_di = $fila['consecutivo'];
                        return $id_di;
                        

                    }
                    $this->dbh = null;
                        
                   
                }
                catch(PDOException $e)
                {
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }
            public function consecutivo_vid_curriculum()
            {        
                try {
                    
                    $sql="SELECT IFNULL(MAX(id_vid_curriculum),0)+1 as consecutivo from tbl_vid_curriculum";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    if ($query->rowcount()==1)
                    {
                        $fila = $query -> fetch();
                        $id_vid_curriculum = $fila['consecutivo'];
                        return $id_vid_curriculum;
                        

                    }
                    $this->dbh = null;
                        
                   
                }
                catch(PDOException $e)
                {
                    
                    print "Error!: " . $e->getMessage();
                    
                }        
                return TRUE;
            }

            function consec_pasatiempo()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_aop),0) + 1 AS CONSECUTIVO FROM tbl_aop";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_Id_Pasatiempo = $fila['CONSECUTIVO'];
                        return $f_Id_Pasatiempo;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            function consec_postulacion()
            {
                try
                {
                    $sql = "SELECT IFNULL(max(id_postulacion),0) + 1 AS CONSECUTIVO FROM tbl_postulacion";
                    $query = $this->dbh->prepare($sql);
                    $query -> execute();
                    //this->dbh = null;
                    //si existe el usuario
                    if($query -> rowCount() == 1)
                    {
                        $fila = $query -> fetch();
                        $f_Id_Pasatiempo = $fila['CONSECUTIVO'];
                        return $f_Id_Pasatiempo;
                    }
                }
                catch(PDOException $e){
                    
                    print "Error!: " . $e->getMessage();
                }        
                return TRUE;
            }

            public function consec_merril()
            {
                try
                {
                    $sql = "SELECT IFNULL(MAX(id),0) + 1 AS CONSECUTIVO FROM tbl_terman_merril";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
        
                    if($query->rowCount() == 1)
                    {
                        $fila = $query->fetch();
                        $id_merril = $fila['CONSECUTIVO'];
                        return $id_merril;
                    }
                }
                    
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return TRUE;
                
            }
            
            function buscarCandidatos($_idusuario)
            {
                try
                {
                    $sql = "SELECT 
                    CONCAT(tbl_usuario.nombre, ' ', tbl_usuario.apellido) AS nombreUsuario,
                    tbl_usuario.correo,
                    tbl_usuario.id_usuario,
                    COALESCE(tbl_vid_curriculum.id_vid_curriculum, '0') AS vid_status,
                    GROUP_CONCAT(tbl_experiencia_laboral.descripcion_puesto SEPARATOR ', ') AS descripcionesPuestos
                FROM 
                    tbl_usuario
                LEFT JOIN 
                    tbl_vid_curriculum ON tbl_usuario.id_usuario = tbl_vid_curriculum.id_usuario
                INNER JOIN 
                    tbl_experiencia_laboral ON tbl_usuario.id_usuario = tbl_experiencia_laboral.id_usuario
                WHERE 
                    tbl_usuario.estado_laboral = 0
                    AND tbl_usuario.rol = 2
                GROUP BY 
                    tbl_usuario.id_usuario, 
                    tbl_usuario.nombre, 
                    tbl_usuario.apellido, 
                    tbl_usuario.correo, 
                    tbl_vid_curriculum.id_vid_curriculum;
             ";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }

                return $data;
            }

        // Funcion para busquedas de campos
            function buscaPaises()
            {
                try
                {
                    $sql = "SELECT region, nombre FROM tbl_paises ORDER BY (region = '52') DESC";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }

                return $data;
            }
            function buscaToken($token)
            {
                try
                {
                    $sql = "SELECT token FROM tbl_usuario where token=$token";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data = $row['token'];
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }

                return $data;
            }
            
            function buscarPais()
            {
                try
                {
                    $sql = "SELECT region, nombre FROM tbl_paises";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }

                return $data;
            }

            function buscarimagenvacante()
            {
                try
                {

                   $sql = "SELECT v.puesto as puesto,v.id_vacante as idvacante, u.ruta_imagen as rutaimg FROM tbl_usuario as u INNER JOIN tbl_vacantes as v ON v.id_empresa=u.id_usuario ORDER BY v.id_vacante DESC LIMIT 5";
                $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            
            // Consulta para cargar las vacantes iniciales
            public function cargarVacantesIniciales($_idusuario, $limit) {
                return $this->buscarVacante($_idusuario, 0, $limit);
            }
            
            // Consulta para cargar las vacantes siguientes sin repetir
            public function cargarSiguienteVacantes($_idusuario, $currentPage, $limit) {
                $offset = $currentPage * $limit;
                return $this->buscarVacante($_idusuario, $offset, $limit);
            }
            
            // // Consulta para regresar a las vacantes anteriormente cargadas
            // public function cargarVacantesAnteriores($_idusuario, $currentPage, $limit) {
            //     $offset = max(0, ($currentPage - 2) * $limit); // Restamos 2 para retroceder dos páginas
            //     return $this->buscarVacante($_idusuario, $offset, $limit);
            // }
        
            // Función para buscar las vacantes del perfil de USUARIO
            private function buscarVacante($_idusuario, $offset, $limit) {
                try {
                    $sql = "SELECT v.*, c.nombre as nombrePais, f.id_vacante AS verificacionFav
                            FROM tbl_vacantes v
                            INNER JOIN tbl_paises c ON v.lugar = c.region
                            LEFT JOIN tbl_favoritos f ON v.id_vacante = f.id_vacante AND f.id_usuario = $_idusuario
                            LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario 
                            WHERE (DATEDIFF(datefin, dateInicio) >= 1 AND v.status = 1 AND (p.id_vacante IS NULL OR p.id_usuario <> $_idusuario))
                            ORDER BY v.id_vacante DESC
                            LIMIT :limit OFFSET :offset;";
                
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
                    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $query->execute();
            
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e) {
                    print "Error: !" . $e->getMessage();
                    return null; // Devolvemos null en caso de error
                }
                return $data;
            }


            // function buscarVacante($_idusuario, $offset)
            // {
            //     try
            //     {
            //         $sql = "SELECT v.*, c.nombre as nombrePais, f.id_vacante AS verificacionFav
            //                 FROM tbl_vacantes v
            //                 INNER JOIN tbl_paises c ON v.lugar = c.region
            //                 LEFT JOIN tbl_favoritos f ON v.id_vacante = f.id_vacante 
            //                 LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario 
            //                 WHERE (DATEDIFF(datefin, dateInicio) >= 1 AND v.status = 1 AND (p.id_vacante IS NULL OR p.id_usuario <> $_idusuario))
            //                 GROUP BY v.id_vacante DESC
            //                 LIMIT $offset, 9;";

            //         $query = $this->dbh->prepare($sql);
            //         $query->execute();

            //         $data = array();
            //         while ($row = $query->fetch(PDO::FETCH_ASSOC))
            //         {
            //             $data[] = $row;    
            //         }
            //     }
            //     catch(PDOException $e)
            //     {
            //         print "Error: !" . $e->getMessage();
            //     }
            //     return $data;
            // }
            
            //  Funcion para buscar las vacantes del perfil de empresa (NO TOCAR)
            function buscarVacantes($_idusuario)
            {
                try
                {
                    $sql = "SELECT v.*, c.nombre as nombrePais 
                            FROM tbl_vacantes v
                            INNER JOIN tbl_paises c ON v.lugar = c.region
                            LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario 
                            WHERE (DATEDIFF(datefin, dateInicio) >= 1 AND v.status = 1 AND (p.id_vacante IS NULL OR p.id_usuario <> $_idusuario)) AND v.id_empresa=$_idusuario
                            GROUP BY v.id_vacante DESC";

                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            function buscarVacantesFAV($_idusuario)
            {
                try
                {
                    $sql = "SELECT v.*, c.nombre as nombrePais, f.id_vacante AS verificacionFav 
                            FROM tbl_vacantes v
                            INNER JOIN tbl_paises c ON v.lugar = c.region
                            LEFT JOIN tbl_favoritos f ON v.id_vacante = f.id_vacante AND f.id_usuario = $_idusuario
                            LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario 
                            WHERE (DATEDIFF(datefin, dateInicio) >= 1 AND v.status = 1 AND v.id_vacante=f.id_vacante AND (p.id_vacante IS NULL OR p.id_usuario <> $_idusuario))
                            GROUP BY v.id_vacante DESC";

                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }


            // function buscarVacante($_idusuario)
            // {
            //     try
            //     {
            //     $sql = "SELECT v.*, c.nombre as nombrePais 
            //     FROM tbl_vacantes v
            //     INNER JOIN tbl_paises c ON v.lugar = c.region
            //     LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario 
            //     WHERE (DATEDIFF(datefin, dateInicio) >= 1 AND v.status = 1 AND (p.id_vacante IS NULL OR p.id_usuario <> $_idusuario))
            //     GROUP BY v.id_vacante DESC
            //     LIMIT 9;";

            //     $query = $this->dbh->prepare($sql);
            //         $query->execute();

            //         $data = array();
            //         while ($row = $query->fetch(PDO::FETCH_ASSOC))
            //         {
            //             $data[] = $row;    
            //         }
            //     }
            //     catch(PDOException $e)
            //     {
            //         print "Error: !" . $e->getMessage();
            //     }
            //     return $data;
            // }

          /* function buscarVacante2()
            {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,3) = 1 and datediff(datefin,dateInicio) <=3  AND status = 1
                    group by id_vacante";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            } */

          /*   function buscarVacante3()
             {
                try
                {
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE mod(id_vacante,3) = 2 and datediff(datefin,dateInicio) <=3  AND status = 1
                    group by id_vacante";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
            return $data;
            } */

            function TotalVacantes($_idusuario) {
                try {
                    $sql = "SELECT COUNT(*) AS totalVacantes 
                    FROM tbl_vacantes v
                    LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = $_idusuario
                    WHERE DATEDIFF(v.datefin, v.dateInicio) >= 1 
                        AND v.status = 1 
                        AND (p.id_postulacion IS NULL OR v.id_vacante NOT IN (SELECT id_vacante FROM tbl_postulacion 
                        WHERE id_usuario = $_idusuario))";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    $resultado = $query->fetch(PDO::FETCH_ASSOC);
                    return $resultado['totalVacantes'];
                } catch(PDOException $e) {
                    print "Error: " . $e->getMessage();
                    return false;
                }
            }

            function buscarPostulacion($_idusuario)
            {
                try
                {
                    $sql = "SELECT COALESCE(tbl_vid_curriculum.id_vid_curriculum, '0') AS vid_status, tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario, tbl_usuario.correo, tbl_vacantes.puesto FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante LEFT JOIN tbl_vid_curriculum ON tbl_postulacion.id_usuario = tbl_vid_curriculum.id_usuario WHERE tbl_vacantes.id_empresa = $_idusuario AND tbl_postulacion.status = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            function buscarPostulacion2($iusuario)
            {
                try
                {
                    $sql = "SELECT tbl_postulacion.*, tbl_vacantes.* FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE  tbl_postulacion.id_usuario = $iusuario AND tbl_postulacion.status = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            function buscarEmpresa()
            {
                try
                {
                    $sql = "SELECT id_usuario,CONCAT(nombre,' ',apellido) AS nombreEmpresa, correo, telefono, razon_social FROM tbl_usuario WHERE status = 0 AND rol = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }

            function buscarNota()
            {
                try
                {
                    $sql = "SELECT * FROM tbl_noticia";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }

        //Ajax
            function ajax_vacante()
            {
                try
                {

                $sql = "SELECT tbl_paises.nombre as pais, COUNT(tbl_vacantes.lugar) as vacantes  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.id_paises WHERE status = 1 group by tbl_paises.id_paises ORDER BY id_vacante DESC LIMIT 5";
                $query = $this->dbh->prepare($sql);
                    $query->execute();

                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }

            //Funciones que sirve para seleccion de campos
            public function buscarMensaje($id_empresa, $id_usuario)
            {
                try {
                    $sql = "SELECT  m.id_usuario , m.mensaje , m.fecha ,m.id_mensaje from tbl_mensajes as m INNER JOIN tbl_conversaciones as c on m.id_conversacion = c.id_conversacion where c.id_empresa = :id_empresa and c.id_usuario = :id_usuario order by m.id_mensaje ASC";  
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_empresa', $id_empresa);
                    $query->bindParam(':id_usuario', $id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_conversacion($id_empresa, $id_usuario)
            {
                try
                {
                    $sql = "SELECT id_conversacion FROM tbl_conversaciones WHERE id_empresa = :id_empresa AND id_usuario = :id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
                    $query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $query->execute();
                    
                    $row = $query->fetch(PDO::FETCH_ASSOC);
                    
                    if ($row) {
                        return $row['id_conversacion'];
                    } else {
                        return null;
                    }
                }
                catch (PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                    return null;
                }
            }
            

            public function actualizarMensaje($id_empresa, $id_usuario,$id_m)
            {
                try {
                    $sql = "SELECT m.id_usuario , m.mensaje , m.fecha ,m.id_mensaje as id_mensaje FROM tbl_mensajes AS m INNER JOIN tbl_conversaciones AS c ON m.id_conversacion = c.id_conversacion WHERE c.id_empresa = :id_empresa AND c.id_usuario = :id_usuario AND m.id_mensaje > :id_m ORDER BY m.id_mensaje ASC";  
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_empresa', $id_empresa);
                    $query->bindParam(':id_usuario', $id_usuario);
                    $query->bindParam(':id_m', $id_m);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;    
                    }
                }
                catch(PDOException $e)
                {
                    print "Error: !" . $e->getMessage();
                }
                return $data;
            }
            public function buscarConversacion($id_usuario,$rol)
            {
                try {


                    $sql = "SELECT MAX(m.fecha) as fecha, c.id_conversacion as idc,u1.id_usuario as id1, u2.id_usuario as id2, u1.razon_social as razon, u1.nombre AS nombre1, u2.nombre AS nombre2, u1.rol AS rol1, u2.rol AS rol2,u1.ruta_imagen as ruta1, u2.ruta_imagen as ruta2 
                    FROM tbl_conversaciones AS c
                    JOIN tbl_usuario AS u1 ON c.id_empresa = u1.id_usuario 
                    JOIN tbl_usuario AS u2 ON c.id_usuario = u2.id_usuario
                    LEFT JOIN tbl_mensajes AS m ON c.id_conversacion = m.id_conversacion
                    WHERE c.id_empresa = :id_usuario OR c.id_usuario = :id_usuario
                    GROUP BY c.id_conversacion, u1.nombre, u2.nombre, u1.rol, u2.rol
                    ORDER BY MAX(m.fecha) DESC";
                    
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario', $id_usuario);

                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        if ($rol == 2) {
                            $row['idc'] = $row['idc'];
                            $row['ruta'] = $row['ruta1'];
                            $row['nombre'] = $row['razon'];
                            $row['id'] = $row['id1'];
                            $row['fecha'] = $row['fecha']; // Si el rol es 1, toma el nombre del usuario 1
                        } else {
                            $row['idc'] = $row['idc'];
                            $row['ruta'] = $row['ruta2'];
                            $row['nombre'] = $row['nombre2'];
                            $row['id'] = $row['id2'];
                            $row['fecha'] = $row['fecha']; // Si el rol no es 1, toma el nombre del usuario 2
                        }
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_vacantes($id_vacante)
            {        
                try {
                    
                    $sql = "SELECT tbl_vacantes.*, tbl_paises.nombre as nombrePais, tbl_favoritos.id_vacante AS verificacionFav  FROM tbl_vacantes INNER JOIN tbl_paises ON tbl_vacantes.lugar=tbl_paises.region LEFT JOIN tbl_favoritos ON tbl_vacantes.id_vacante = tbl_favoritos.id_vacante  WHERE tbl_vacantes.id_vacante = :id_vacante";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_vacante',$id_vacante);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function buscarVacantePostulada($id_postulacion)
            {
                try {
                    
                    $sql = "SELECT v.puesto, v.empresa, v.ciudad, v.region, v.sueldo, v.datos_adicionales
                    FROM tbl_vacantes v
                    INNER JOIN tbl_postulacion o on o.id_vacante = v.id_vacante
                    WHERE o.id_postulacion = :id_postulacion;";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_postulacion',$id_postulacion);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function comprobar_postulacion($_idusuario,$id_vacante)
            {        
                try {
                    $sql = "SELECT v.* FROM tbl_vacantes v
                    LEFT JOIN tbl_postulacion p ON v.id_vacante = p.id_vacante AND p.id_usuario = :id_usuario
                    WHERE p.id_vacante = :id_vacante AND v.status = 1 AND p.id_usuario = :id_usuario 
                    GROUP BY v.id_vacante;";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$_idusuario);
                    $query->bindParam(':id_vacante',$id_vacante);
                    $query->execute();
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function seleccionar_usuarios($id_usuario)
            {        
                try {
                    $sql = "SELECT CONCAT(nombre, ' ', apellido) AS nombreUsuario FROM tbl_usuario WHERE id_usuario=:id_usuario;";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario', $id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        $data[] = $row;
                    }
                } catch(PDOException $e) {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            
            public function seleccionar_postulaciones($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT tbl_postulacion.*, tbl_vacantes.puesto
                    FROM tbl_postulacion
                    INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante
                    WHERE tbl_postulacion.id_usuario = :id_usuario
                    LIMIT 1
                    ";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            

            public function seleccionar_experiencia($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_experiencia_laboral WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function seleccionar_formacion($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_formacion_academica WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function seleccionar_aficiones($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_aop WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

            public function seleccionar_interes($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_dinteres WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_usuario($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT a.*, b.nombre AS pais FROM tbl_usuario AS a INNER JOIN tbl_paises AS b ON b.region=a.region WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
            public function seleccionar_vid_curriculum($id_usuario)
            {        
                try {
                    
                    $sql = "SELECT * FROM tbl_vid_curriculum WHERE id_usuario=:id_usuario";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_usuario',$id_usuario);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }
           
            
            public function seleccionar_postulacion($id_postulacion)
            {        
                try {
                    
                    $sql = "SELECT tbl_postulacion.*, CONCAT(tbl_usuario.nombre,' ',tbl_usuario.apellido) AS nombreUsuario,tbl_vacantes.puesto,tbl_usuario.telefono FROM tbl_postulacion INNER JOIN tbl_usuario ON tbl_postulacion.id_usuario = tbl_usuario.id_usuario INNER JOIN tbl_vacantes ON tbl_postulacion.id_vacante = tbl_vacantes.id_vacante WHERE id_postulacion=:id_postulacion LIMIT 5";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':id_postulacion',$id_postulacion);
                    $query->execute();
                    $data = array();
                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                    {
                        $data[] = $row;
                    }
                }
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return $data;
            }

        //Notificaciones
            function notificacionexperiencia($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_experiencia_laboral WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
            function video_registrado($iusuario)
            {
                try
                {
                    $sql = "SELECT * FROM tbl_vid_curriculum where id_usuario ='$iusuario' ";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
        
                    if($query->rowCount() >= 1)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                    
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return TRUE;
                
            }

            function verificar_favoritos($iusuario,$vacanteID)
            {
                try
                {
                    $sql = "SELECT * FROM tbl_favoritos WHERE id_vacante =$vacanteID AND id_usuario = $iusuario ";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
        
                    if($query->rowCount() > 0)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                    
                catch(PDOException $e)
                {
                    print "Error!: " . $e->getMessage();
                }
                return TRUE;
                
            }
            function verificar_datospersonales($iusuario)
            {
                try
                {
                    $sql = "SELECT CASE 
                                    WHEN 
                                        EXISTS (
                                            SELECT 1
                                            FROM tbl_aop AS a
                                            INNER JOIN tbl_dinteres AS i ON a.id_usuario = i.id_usuario
                                            INNER JOIN tbl_experiencia_laboral AS e ON a.id_usuario = e.id_usuario
                                            INNER JOIN tbl_formacion_academica AS f ON a.id_usuario = f.id_usuario
                                            WHERE a.id_usuario = :iusuario
                                        )
                                        OR EXISTS (
                                            SELECT 1
                                            FROM tbl_vid_curriculum AS v
                                            WHERE v.id_usuario = :iusuario
                                        )
                                    THEN 1
                                    ELSE 0
                                END AS resultado";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':iusuario', $iusuario, PDO::PARAM_INT);
                    $query->execute();

                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    
                    return $result['resultado'];
                }
                catch (PDOException $e)
                {
                    // Manejo de errores
                    echo "Error: " . $e->getMessage();
                    return false;
                }
            }


            function notificacionformacion($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_formacion_academica WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
           
            function notificacionaficiones($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_aop WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }

            function notificacioninteres($iusuario)
            {
                try
                {
                
                    $sql = "SELECT id_usuario FROM tbl_dinteres WHERE id_usuario = :DU_ID LIMIT 1";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();;
                    if($numeroDeFilas >= 1)
                    {
                        $data = 1;
                    }
                    else {
                        $data = 0;
                    } 
                    
                }
                catch(PDOException $e)
                {
                
                    print "Error!: " . $e->getMessage();
                        
                }  
                return $data;
                
            }
            
            
            function notificacionpostulaciones($iusuario)
            {
                try
                {
                    $sql = "SELECT a.id_postulacion FROM tbl_postulacion AS a INNER JOIN tbl_vacantes AS b ON a.id_vacante = b.id_vacante WHERE b.id_empresa = :DU_ID AND a.status = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(":DU_ID",$iusuario);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function notificacionempresa()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM tbl_usuario WHERE status = 0 AND rol = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function total_usuarios()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM `tbl_usuario` WHERE rol = 2;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }
            function total_empresas()
            {
                try
                {
                    $sql = "SELECT id_usuario FROM `tbl_usuario` WHERE rol = 1;";
                    $query = $this->dbh->prepare($sql);
                    $query->execute();
                    //$this->dbh = null;
                    $numeroDeFilas = $query->rowCount();
                    //si existe el usuario
                    $data = array();
                    if($numeroDeFilas >= 1)
                    {
                        $data = $numeroDeFilas;
                    }
                    else {
                        $data = 0;
                    } 
                }
                catch(PDOException $e)
                {

                    print "Error!: " . $e->getMessage();

                }  
                return $data;
            }

            // function notificacionvacantes($iusuario)
            // {
            //     try
            //     {
                
            //         $sql = "SELECT id_usuario FROM tbl_vacantes WHERE id_usuario = :DU_ID LIMIT 1";
            //         $query = $this->dbh->prepare($sql);
            //         $query->bindParam(":DU_ID",$iusuario);
            //         $query->execute();
            //         //$this->dbh = null;
            //         $numeroDeFilas = $query->rowCount();
            //         //si existe el usuario
            //         $data;
            //         if($numeroDeFilas >= 1)
            //         {
            //             $data = 1;
            //         }
            //         else {
            //             $data = 0;
            //         } 
                    
            //     }
            //     catch(PDOException $e)
            //     {
                
            //         print "Error!: " . $e->getMessage();
                        
            //     }  
            //     return $data;
                
            // }

        // verificaciones
        public function verif_aficion($_idusuario,$_descripcion)
        {        
            try 
            {
            $sql = "SELECT * FROM tbl_aop where (id_usuario = '$_idusuario' and descripcion = '$_descripcion')";
            $query = $this->dbh->prepare($sql);
            $query->execute();

            if($query -> rowCount() == 1)
                    {
                        return FALSE;
            } else {
                return TRUE;
            }
            }
            catch(PDOException $e){
                
                print "Error!: " . $e->getMessage();
                
            }        
            
        }

        //Validaciones de los test
        public function val_merril($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_terman_merril where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_moss($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_moss where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_sjt($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_sjt where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_raven($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_raven where id_usuario = '$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function val_cleaver($_idusuario)
        {
            try
            {
                $sql = "SELECT * FROM tbl_respuestas_cleaver where id_usuario ='$_idusuario' ";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        //Envio del test
        public function envio_test()
        {
            try
            {
                $sql = "SELECT * FROM tbl_envio_test";
                $query = $this->dbh->prepare($sql);
                $query->execute();
    
                if($query->rowCount() >= 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
                
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;   
        }
        
        // Comprobar tests
        public function comprobarRaven($_idusuario)
        {
            try
            {
                $sql = "SELECT test_raven FROM tbl_envio_test where id_usuario ='$_idusuario' and test_raven = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarMoss($_idusuario)
        {
            try
            {
                $sql = "SELECT test_moss FROM tbl_envio_test where id_usuario ='$_idusuario' and test_moss = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarMerril($_idusuario)
        {
            try
            {
                $sql = "SELECT test_merril FROM tbl_envio_test where id_usuario ='$_idusuario' and test_merril = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarSjt($_idusuario)
        {
            try
            {
                $sql = "SELECT test_sjt FROM tbl_envio_test where id_usuario ='$_idusuario' and test_sjt = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function comprobarCleaver($_idusuario)
        {
            try
            {
                $sql = "SELECT test_cleaver FROM tbl_envio_test where id_usuario ='$_idusuario' and test_cleaver = 1";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }

        public function buscar_correo($_correo)
        {
            try
            {
                $sql = "SELECT correo FROM tbl_usuario where correo ='$_correo'";
                $query = $this->dbh->prepare($sql);
                $query->execute();

                if($query->rowCount() >= 1)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return TRUE;
            
        }
        public function eliminar_vacantes()
        {        
            try 
            {
                // Obtener la fecha actual
                $fecha_actual = date('Y-m-d');
                
                // Calcular la fecha un día antes
                $fecha_un_dia_antes = date('Y-m-d', strtotime('-1 day', strtotime($fecha_actual)));
                
                // Construir la consulta SQL para eliminar las vacantes con fecha de inicio un día antes de la fecha actual
                $sql = "DELETE FROM tbl_vacantes WHERE dateInicio = :fecha_un_dia_antes";
                
                // Preparar la consulta
                $query = $this->dbh->prepare($sql);
                
                // Asignar valor al parámetro
                $query->bindParam(':fecha_un_dia_antes', $fecha_un_dia_antes);
                
                // Ejecutar la consulta
                $query->execute();
                
                // Cerrar la conexión
                $this->dbh = null;
                    
            }
            catch(PDOException $e){
                // Manejar cualquier error de PDO
                print "Error!: " . $e->getMessage();
                return FALSE;
            }        

            return TRUE;
        }
        public function buscar_correo_usuario($_correo)
        {
            try {
                    
                $sql = "SELECT * FROM tbl_usuario WHERE correo=:correo";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':correo',$_correo);
                $query->execute();
                $data = array();
                while ($row = $query->fetch(PDO::FETCH_ASSOC))
                {
                    $data[] = $row;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return $data;
            
        }
        public function buscar_usuario($_idusuario)
        {
            try {
                    
                $sql = "SELECT * FROM tbl_usuario WHERE id_usuario=:id_usuario";
                $query = $this->dbh->prepare($sql);
                $query->bindParam(':id_usuario',$_idusuario);
                $query->execute();
                $data = array();
                while ($row = $query->fetch(PDO::FETCH_ASSOC))
                {
                    $data[] = $row;
                }
            }
            catch(PDOException $e)
            {
                print "Error!: " . $e->getMessage();
            }
            return $data;
            
        }
        // public function eliminar_vacantes()
        // {        
        //     try 
        //     {
                
        //         $sql="DELETE FROM tbl_vacantes WHERE dateInicio";
                
        //         $query = $this->dbh->prepare($sql);
        //         $query->execute();
        //         $this->dbh = null;
                    
            
        //     }
        //     catch(PDOException $e){
                
        //         print "Error!: " . $e->getMessage();

        //     }        
        //     return TRUE;
        // }
        // public function enviar_correo($_correo, $_token)
        // {        
        //     $todogood = false;
        //     try 
        //     {
                
        //         // Configuración SMTP
        //         $transport = (new Swift_SmtpTransport('svgt333.serverneubox.com.mx', 465, 'ssl'))
        //         ->setUsername('no-reply@workele.com')
        //         ->setPassword('i7OTm-M6usi]');

        //         // Crea el objeto Mailer usando tu configuración de transporte
        //         $mailer = new Swift_Mailer($transport);

        //         // Crea un mensaje
        //         $message = (new Swift_Message('Ejemplo de correo'))
        //         ->setFrom(['no-reply@workele.com' => 'Example'])
        //         ->setTo([$_correo => 'Usuario'])
        //         ->setBody('Confirmacion: ' . $_token);

        //         // Enviar el mensaje
        //         $result = $mailer->send($message);

        //         $todogood = true;
        //     }
        //     catch(PDOException $e){
                
        //         print "Error!: " . $e->getMessage();
        //         $todogood = false;

        //     }

        //     return $result;
        // }

}
<?php
class ModeloBD {
    private static $db_host = '192.168.1.108';
    private static $db_user = 'root';
    private static $db_pass = 'nologo';
    /*private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';*/
    protected $db_name = '';
    protected $rows = array();
    private $conexion;
    private $ultimoId;

      
    #Constructor
    function __construct($db_name) {
        $this->db_name = 'gestion';
    }

    # Conectar a la base de datos   
    public function open_connection() {
        $this->conexion = new mysqli(self::$db_host, self::$db_user,
        self::$db_pass, $this->db_name);
		$this->conexion->query("SET NAMES UTF8");
    }   

    # Desconectar la base de datos
    public function close_connection() {
        $this->conexion->close();
    }

    # Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
    public function execute_single_query($query) {
        $this->open_connection();
        $this->conexion->query($query);
        $this->ultimoId = $this->conexion->insert_id;
        $this->close_connection();
        
    }
    
    public function devolverUltimoId()
    {
        return($this->ultimoId);
    }
    


    # Almacenar resultados de una consulta en un Array
    public function get_results_from_query($query) {
        $this->open_connection();
        $result = $this->conexion->query($query);
        $filas=$result->num_rows;
        // Vacío el array para que no se me acumulen los valores
        unset($this->rows);
        for ($i=0;$i<$filas;$i++) {
            $this->rows[] = $result->fetch_assoc();
        }
        if ($result!=null) $result->close();
        $this->close_connection();
    }
    public function get_results_from_query2($query) {
        $result = $this->conexion->query($query);
        $filas=$result->num_rows;
        // Vacío el array para que no se me acumulen los valores
        unset($this->rows);
        for ($i=0;$i<$filas;$i++) {
            $this->rows[] = $result->fetch_assoc();
        }
        if ($result!=null) $result->close();
    
    }

    
    # Comprueba si el resultado de una consulta da alguna fila.
    public function exist_some_row($query) {
        $this->open_connection();
        $result = $this->conexion->query($query);
        $filas=$result->num_rows;  
        if ($filas>0) return true;
        return false;
    }
    
    #Devuelve el número de filas de la última consulta realizada
    public function num_rows_cursor() {
        return count($this->rows);        
    }
    
    #Devuelve un array asociativo con las filas de la última consulta
    public function get_rows() {
        return $this->rows;
    }
}
 
?>

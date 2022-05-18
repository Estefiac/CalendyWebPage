<!--Author: Estefanía Anaya -->
<!--Materia: Desarrollode aplicaciones web -->

<?php
class Database{
    public $db;
    protected $result;
    protected $prep;
    protected $queries;
    public function __construct($dbhost, $dbuser,$dbpass, $dbname){
        $this->db =new mysqli($dbhost,$dbuser,$dbpass,$dbname);
        if($this->db->connect_errno){
            trigger_error("Failed connection with MySQl, Error type -> ({$this->db->connect_errno()})", E_USER_ERROR);

        }
        $this->db->set_charset('utf8');

    }

    public function getContacto(){
        $this->result = $this->db->query("SELECT * FROM contacto");
        return $this->result->fetch_all();        
    }

    public function preparing($queries){
        $this->queries = $queries;
        $this->prep = $this->db->prepare($this->queries);
        if(!$this->prep){
            trigger_error("Error preparing the query", E_USER_ERROR);
        }else{
            return true;
        }
    }
    
    //Function to execute the prepare connection
    public function run() {
        $this->prep->execute();
    }
    
    //Return the prep value
    public function prep(){
        return $this->prep;
    }
    
    //Return result values
    public function result(){
        return $this->prep->fetch();
    }
    
    //Function to change Database
    public function changeDatabase($db){
        $this->db->select_db($db);
    }
    
    //Function to validate data
    public function validateData($column, $table, $condition){
        $this->result = $this->db->query("SELECT $column FROM $table WHERE $column = '$condition'");
        $check = $this->result->num_rows;
        return $check ;
    }
    
    public function closeConn(){
        $this->db->close();
        $this->prep->close();
    } 
    
    public function freeDB(){

         $this->prep->free_result();

     }
    
    public function rowsChanged(){

        return $this->prep->affected_rows;

    }

}
?>
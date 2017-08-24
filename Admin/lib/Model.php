<?php
  /**
   *
   */
  class Model
  {
    protected $conn; // Bien ket noi
    protected $table = ''; // Ten bang

    // Thong tin connect database
    protected $server = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $db = 'quiz';

    function __construct()
    {
      $this->conn = mysqli_connect($this->server, $this->user, $this->pass, $this->db);
      mysqli_set_charset($this->conn, 'utf8');
    }

    public function create($data){
      $sql = 'Insert into '.$this->table.'(';

      $keys = ''; // Field name
      $values = ''; // Gia tri cua field

      foreach($data as $key => $value){
        $keys .= $key.',';
        $values .= "'".$value."',";
      } // Vong lap

      $keys = trim($keys, ','); // Bo day phay du thua
      $values = trim($values, ',');

      $sql .= $keys.') value('.$values.')';

      $query = mysqli_query($this->conn, $sql);
      return $query; //
    } // Create function: insert data into table

    public function get_where($where = null, $order = null){
      if($where !== null){
        $sql = 'Select * from '.$this->table.' where '.$where;
      }else {
        $sql = 'Select * from '.$this->table;
      }

      if($order !== null){
        $sql .= ' Order by '.$order;
      }

      $query = mysqli_query($this->conn, $sql);

      $data = array(); // Bien hung gia tri cua query

      if($query){
        while($row = mysqli_fetch_assoc($query)){
          $data[] = $row;
        }
      }// Neu query dung

      return $data;
    } // Lay gia tri cua bang

    public function get_max_id(){
      $sql = 'Select max(id) as max_id from '.$this->table;

      $query = mysqli_query($this->conn, $sql);

      $row = mysqli_fetch_assoc($query);

      return $row['max_id'];
    }
  }

 ?>

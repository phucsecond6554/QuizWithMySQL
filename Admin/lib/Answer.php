<?php
  require_once('Model.php');

  /**
   *
   */
  class Answer extends Model
  {

    function __construct()
    {
      parent::__construct();
      $this->table = 'Answer';
    }

    function check_answer($id){
      $sql = 'Select is_right from '.$this->table.' where id = '.$id;

      $query = mysqli_query($this->conn, $sql);

      $row = mysqli_fetch_assoc($query);

      return $row['is_right'];
    }
  }

 ?>

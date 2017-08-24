<?php
  require('Model.php');

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
  }

 ?>

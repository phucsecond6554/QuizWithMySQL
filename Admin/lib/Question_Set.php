<?php

require_once('Model.php');
  /**
   *
   */
  class Question_Set extends Model
  {

    function __construct()
    {
      parent::__construct();

      $this->table = 'Question_Set';
    }
  }

 ?>

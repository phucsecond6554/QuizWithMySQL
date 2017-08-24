<?php
  require('Model.php');

  /**
   *
   */
  class Question extends Model
  {

    function __construct()
    {
      parent::__construct();
      $this->table = 'Question';
    }
  }

 ?>

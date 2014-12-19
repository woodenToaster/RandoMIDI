<?php
  function getTicksByNote($noteVal) {
    switch($noteVal) {
      case 'w':
        return 1920;
        break;
      case 'h':
        return 960;
        break;
      case 'q':
        return 480;
        break;
      case 'e':
        return 240;
        break;
      case 's':
        return 120;
        break;
    }
  }
?>
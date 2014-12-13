<html>
  <body>
    <?php
      //Display errors during developemnt
      ini_set('display_errors',1);
      ini_set('display_startup_errors',1);
      error_reporting(E_ALL);

      //Connect to database
      //$servername = "mysql.eecs.ku.edu";
      //$username = "chogan";
      //$password = "581!!";

      //$conn = new mysqli($servername, $username, $password);

      //if ($conn->connect_error) {
      //  die("Connection failed: " . $conn->connect_error);
      //}

      //Get all posted variables 
      if(isset($_POST["name"])) {
        $compName = $_POST["name"];
      } else {
        $compName = "";
      }
      
      if(isset($_POST["style"])) {
        $style = $_POST["style"];
      } else {
        $style = "none";
      }

      if(isset($_POST["key"])) {
        $key = $_POST["key"];
      } else {
        $key = "atonal";
      }

      if(isset($_POST["mode"])) {
        $mode = $_POST["mode"];
      } else {
        $mode = "none";
      }

      if(isset($_POST["tempo"]) and $_POST["tempo"] != "") {
        $tempo = $_POST["tempo"];
      } else {
        $tempo = (string)rand(60, 260);
      }

      if(isset($_POST["instruments"]) and !empty($_POST["instruments"])) {
        $instruments = $_POST["instruments"];
      } else {
        //TODO: populate an array with random instruments
        $instruments = [];
      }

      if(isset($_POST["motif"])) {
        $motif = $_POST["motif"];
        //TODO: put motif in the database if it's not already in there
      } else {
        $motif = "none";
      }

      if(isset($_POST["progression"])) {
        $progression = $_POST["progression"];
      } else {
        $progression = "none";
      }

      echo $compName;    echo "</br>";
      echo $style;       echo "</br>";
      echo $key;         echo "</br>";
      echo $mode;        echo "</br>";
      echo $tempo;       echo "</br>";
      foreach($instruments as $instrument) {
        echo $instrument; 
        echo "</br>";
      }
      echo $motif;       echo "</br>";
      echo $progression; echo "</br>";

      //Create MIDI text file
      require('midi_class_v178/classes/midi.class.php');

      $midi = new Midi();
      $midi->open();
      $track1 = $midi->newTrack();
      $midi->addMsg(0, "4800 On ch=1 n=66 v=80");
      $midi->setTempo($tempo);
      $midi_text = $midi->getTxt();
      echo $midi_text;
      echo "</br>";
    ?>
  </body>
</html>
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

      //This section is where the MIDI text file is created
      require('classes/midi.class.php');

      //Each instrument gets its own track
      $tracks = count($instruments);
      
      $midi = new Midi();
      $midi->open();
      $midi->setTempo($tempo);
      $track1 = $midi->newTrack();
      $midi->addMsg(1, "0 Par ch=1 c=6 v=0");
      $midi->addMsg(1, "0 Par ch=1 c=7 v=100");
      $midi->addMsg(1, "0 Par ch=1 c=64 v=0");
      $midi->addMsg(1, "0 Pb ch=1 v=8192");
      $midi->addMsg(1, "0 PrCh ch=1 p=16 ");
      $midi->addMsg(1, "480 On ch=1 n=66 v=80");
      $midi->addMsg(1, "960 Off ch=1 n=66 v=80");
      $midi->addMsg(1, "970 Meta TrkEnd");
      $midi_text = $midi->getTxt();
      $midi->importTxt($midi_text);
      $save_dir = 'tmp/';
      srand((double)microtime()*1000000);
      $file = $save_dir.rand().".mid";
      $midi->saveMidFile($file, 0666);
      echo $midi_text;
      echo "</br>";
      print_r($midi);
      $pianoNum = array_search('Piano', $midi->getInstrumentList());
      echo $pianoNum; echo "</br>";
      $smf = $midi->getMid();
      $midi->playMidFile($file, true, true, true, "windowsmedia");
    ?>
  </body>
</html>
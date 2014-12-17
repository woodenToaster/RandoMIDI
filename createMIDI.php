<!DOCTYPE html>
<html>
  <body>
    <?php
      //Display errors during developemnt
      ini_set('display_errors',1);
      ini_set('display_startup_errors',1);
      error_reporting(E_ALL);

      require('classes/midi.class.php');
      include('connection.php');
      include('getTicksByNote.php');
      

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

      $midi = new Midi();

      if(isset($_POST["instruments"]) and !empty($_POST["instruments"])) {
        $instruments = $_POST["instruments"];
      } else {
        $instruments = [];
        $options = [
          'Piano', 'Distortion Guitar', 'Cello', 'Violin', 'Harpsichord', 'Steel String Guitar',
          'French Horn', 'Flute', 'Clarinet', 'Bassoon', 'Tuba'
        ];

        $numInstruments = rand(1, 3);
        //Populate array of 1-3 random instruments if none were selected
        for($i = 0; $i < $numInstruments; $i++) {
          $index = rand(0, 10);
          $instruments[$i] = array_search($options[$index], $midi->getInstrumentList());
        }
      }

      if(isset($_POST["motif"])) {
        $motif = $_POST["motif"];
        //See if this motif is already in the DB
        $stmt = $conn->prepare('SELECT * FROM MOTIFS WHERE Motif = ?');
        $stmt->bind_param('s', $motif);
        $stmt->execute();
        $result = $stmt->get_result();
        $finfo = $result->fetch_field();
        if(!$finfo->Motif) {
          //Add this motif to the DB
          $stmt = $conn->prepare('INSERT INTO MOTIFS(Key, Mode, TimeSignature, Motif)
                                  VALUES(?, ?, ?, ?)');
          $stmt->bind_param('ssss', $key, $mode, '4/4', $motif);

          $stmt->execute();
        }
      } else {
        //TODO: select random motif from DB
        $result = $conn->query('SELECT Motif FROM MOTIFS ORDER BY RAND() LIMIT 1');
        $motif = $result->fetch_assoc()['Motif'];
        echo "Motif: ".$motif; echo "</br>";
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
        echo "Number: " . $instrument;
        //echo "   Instr: " . $list[$instrument]; 
        echo "</br>";
      }
      echo $motif;       echo "</br>";
      echo $progression; echo "</br>";

      //This section is where the MIDI text file is created
      $tracks = count($instruments);
      $midi->open();
      $midi->setBpm($tempo);
      
      //Create a track for each instrument
      for($i = 0; $i < $tracks; $i++) {
        $track = $midi->newTrack();
        $channel = $i + 1;
        $ticks = 0;
        $instrNum = $instruments[$i];
        //Set most significant bit mode to false
        $midi->addMsg($track, $ticks." Par ch=".$channel." c=6 v=0");
        //Set master volume to 100
        $midi->addMsg($track, $ticks." Par ch=".$channel." c=7 v=100");
        //Turn sustain off
        $midi->addMsg($track, $ticks." Par ch=".$channel." c=64 v=0");
        $midi->addMsg($track, $ticks." Pb ch=".$channel." v=8192");
        //Set instrument
        $midi->addMsg($track, $ticks." PrCh ch=".$channel." p=".$instrNum);

        //Create a pseudo random note sequence
        //for() {
          $midi->addMsg($track, "480 On ch=".$channel." n=66 v=80");
          $midi->addMsg($track, "960 Off ch=".$channel." n=66 v=80");
        //}
        //End the track
        //$ticks += 480;
        $midi->addMsg($track, "970 Meta TrkEnd");
      }
      
      
      $midi_text = $midi->getTxt();
      $midi->importTxt($midi_text);
      $save_dir = 'tmp/';
      srand((double)microtime()*1000000);
      $file = $save_dir.rand().".mid";
      $midi->saveMidFile($file, 0666);
      
      echo $midi_text;
      echo "</br>";
      print_r($midi);
      
      $pianoNum = array_search('Rock Organ', $midi->getInstrumentList());
      echo $pianoNum; echo "</br>";
      
      $smf = $midi->getMid();
      $midi->playMidFile($file, true, true, true, "windowsmedia");
    ?>
  </body>
</html>
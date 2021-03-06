<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
  <body>
    <?php include("php_includes/navbar.php"); ?>
    <div id="background">
      <div id="vertical-container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <form role="search">
                <div class="form-inline">
                  <input type="text" class="form-control" placeholder="Search">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </form>
              <?php
                //Display errors during developemnt
                ini_set('display_errors',1);
                ini_set('display_startup_errors',1);
                error_reporting(E_ALL);
          
                require('classes/midi.class.php');
                include('php_includes/connection.php');
                include('functions/getTicksByNote.php');
                
                //Create the actual MIDI object
                $midi = new Midi();
          
                //The list of all available instruments
                $instrumentList = $midi->getInstrumentList();
          
                //The array of all notes
                $noteList = $midi->getNoteList();
          
                //The list of intruments for the current song
                $instruments = [];
          
                //Get all posted variables 
                if(isset($_POST["name"])) {
                  $compName = $_POST["name"];
                } else {
                  $compName = "";
                }
                
                if(isset($_POST["style"])) {
                  $style = $_POST["style"];
                  //Get the instruments associated with this style
                  $styleStmt = $conn->prepare(
                    "SELECT i.Name " .
                    "FROM INSTRUMENTS i, STYLES s " .
                    "WHERE i.Name=s.Instrument and s.Style=?"
                  );
                  $styleStmt->bind_param('s', $style);
                  $styleStmt->execute();
                  $styleResult = $styleStmt->get_result();
                  while($styleRow = $styleResult->fetch_row()) {
                    $instruments[] = array_search($styleRow[0], $instrumentList);
                  }
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
                  //Create a random tempo
                  $tempo = (string)rand(60, 260);
                }
          
                if(isset($_POST["instruments"]) and !empty($_POST["instruments"] and $style == "none")) {
                  $instrumentNames = $_POST["instruments"];
                  for($i = 0; $i < count($instrumentNames); $i++) {
                    $instruments[$i] = array_search($instrumentNames[$i], $instrumentList);
                  }
                } else {
                  $options = [
                    'Piano', 'Distortion Guitar', 'Cello', 'Violin', 'Harpsichord', 'Steel String Guitar',
                    'French Horn', 'Flute', 'Clarinet', 'Bassoon', 'Tuba'
                  ];
          
                  $numInstruments = rand(1, 3);
                  //Populate array of 1-3 random instruments if none were selected
                  for($i = 0; $i < $numInstruments; $i++) {
                    $index = rand(0, 10);
                    $instruments[$i] = array_search($options[$index], $instrumentList);
                  }
                }
          
                if(isset($_POST["motif"]) and $_POST["motif"] != "") {
                  $motif = $_POST["motif"];
                  //See if this motif is already in the DB
                  $stmt = $conn->prepare('SELECT * FROM MOTIFS WHERE Motif = ?');
                  $stmt->bind_param('s', $motif);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $stmt->close();
                  
                  if($result->num_rows == 0) {
                    //Add this motif to the DB
                    $insertStmt = $conn->stmt_init();
                    $insertStmt = $conn->prepare(
                      "INSERT INTO MOTIFS " .
                      "VALUES (NULL, ?, ?, '4/4', ?)"
                    );
                    $insertStmt->bind_param('sss', $key, $mode, $motif);
          
                    $insertStmt->execute();
                    $insertStmt->close();
                  }
                } else {
                  //Get random motif from the database 
                  $result = $conn->query(
                    "SELECT Motif " .
                    "FROM MOTIFS " .
                    "ORDER BY RAND() LIMIT 1"
                  );
                  $motif = $result->fetch_assoc()['Motif'];
                }
          
                if(isset($_POST["progression"])) {
                  $progression = $_POST["progression"];
                } else {
                  $progression = "none";
                }
                
                //Get valid notes from scales that fit with the key of the selected motif
                $validMotifs = [];
                $validNotes = [];
                if($key != "atonal") {
                  $notesStmt = $conn->prepare(
                    "SELECT  Motif, Note1, Note2, Note3, Note4, Note5, Note6, Note7 " .
                    "FROM MOTIFS, SCALES " .
                    "WHERE Tonic=Key " .
                    "AND Key=?"
                  );
                  if($notesStmt) {
                    $notesStmt->bind_param('s', $key);
                    $notesStmt->execute();
                    $notesResult = $notesStmt->get_result();
                    while($noteRows = $notesResult->fetch_row()) {
                      $validMotifs[] = $noteRows[0];
                      for($ind = 1; $ind < 8; $ind++) {
                        $validNotes[] = $notesResult[$ind];
                      }
                    }
                    $notesStmt->close();
                  }
                }
                

                echo "<table class='table table-bordered'>";
                echo   "<tr>";
                echo      "<th>Name</th>";
                echo      "<th>Style</th>";
                echo      "<th>Key</th>";
                echo      "<th>Mode</th>";
                echo      "<th>Tempo</th>";
                echo  "</tr>";
                echo  "<tr>";
                echo      "<th>".$compName."</th>";
                echo      "<th>".$style."</th>";
                echo      "<th>".$key."</th>";
                echo      "<th>".$mode."</th>";
                echo      "<th>".$tempo."</th>";
                echo  "</tr>";
                echo "</table";
                
                $ranges = [];
                //Get valid ranges for instruments
                foreach($instruments as $instrument) {
                  $instrName = $instrumentList[$instrument];
                  $rangeStmt = $conn->prepare(
                    "SELECT Low, High " .
                    "FROM INSTRUMENTS " .
                    "WHERE Name=?"
                  );
                  $rangeStmt->bind_param('s', $instrName);
                  $rangeStmt->execute();
                  $rangeResult = $rangeStmt->get_result();
                  $rowLowHigh = $rangeResult->fetch_row();
                  $low = $rowLowHigh[0];
                  $high = $rowLowHigh[1];
                  $rangeStmt->close();
                  $ranges[$instrName] = array(
                    "Low" => $low,
                    "High" => $high
                  ); 
                }
                
                //This section is where the MIDI text file is created
                $numTracks = count($instruments);
                $midi->open();
                $midi->setBpm($tempo);
                
                //Create a track for each instrument
                for($i = 0; $i < $numTracks; $i++) {
                  
                  $currTrack = $midi->newTrack() - 1;
                  $channel = $i + 1;
                  $ticks = 0;
                  $instrNum = $instruments[$i];
                  $instrName = $instrumentList[$instrNum];
          
                  //Set most significant bit mode to false
                  $midi->addMsg($currTrack, $ticks." Par ch=".$channel." c=6 v=0");
                  //Set master volume to 100
                  $midi->addMsg($currTrack, $ticks." Par ch=".$channel." c=7 v=100");
                  //Turn sustain off
                  $midi->addMsg($currTrack, $ticks." Par ch=".$channel." c=64 v=0");
                  $midi->addMsg($currTrack, $ticks." Pb ch=".$channel." v=8192");
                  //Set instrument
                  $midi->addMsg($currTrack, $ticks." PrCh ch=".$channel." p=".$instrNum);
          
                  //Create an array of random notes
                  $numNotes = rand(5,10);
                  $notes = [];
                  for($j = 0; $j < $numNotes; $j++) {
                    //Make sure the note is in the range of the current instrument
                    $lowest = array_search($ranges[$instrName]["Low"], $noteList);
                    $highest = array_search($ranges[$instrName]["High"], $noteList);
                    $noteVal = rand($lowest, $highest);
                    $notes[] = $noteVal;
                  }
          
                  $measures = rand(5, 10);
                  $durations = ['w', 'h', 'q', 'e', 's'];
                  //Add the notes
                  for($k = 0; $k < $measures; $k++) {
                    $note = $notes[rand(0, ($numNotes - 1))];
                    $midi->addMsg($currTrack, $ticks." On ch=".$channel." n=".$note." v=80");
                    $increment = getTicksByNote($durations[rand(0, 4)]);
                    $ticks += $increment;
                    $midi->addMsg($currTrack, $ticks." Off ch=".$channel." n=".$note." v=80");
                  }
                  //End the track
                  $ticks += 480;
                  $midi->addMsg($currTrack, $ticks." Meta TrkEnd");
                }
                
                $midi_text = $midi->getTxt();
                $midi->importTxt($midi_text);
                $save_dir = 'tmp/';
                srand((double)microtime()*1000000);
                $file = $save_dir.rand().".mid";
                $midi->saveMidFile($file, 0666);
                
                echo "<div>";
                $midi->playMidFile($file, true, true, true, "windowsmedia");
                echo "</div";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
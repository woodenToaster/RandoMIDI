<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include('php_includes/navbar.php'); ?>
  <div id="background">
    <div id="vertical-container">
      <div class="container-fluid">
        <div class="jumbotron vertical-center">
          <h1>Welcome to RandoMIDI</h1>
          <h3>Choose the options you would like to hear in a pseudo-random song</h3>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form  id="options" action="createMIDI.php" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name your composition">
              </div>
              <div class="form-group">
                <label for="style">Style</label>
                <select name="style" form="options" class="form-control">
                  <option value="none">None</option>
                  <option value="rock">Rock</option>
                  <option value="blues">Blues</option>
                  <option value="classical">Classical</option>
                </select>
              </div>
              <div class="form-group">
            <label for="key">Key</label>
            <select name="key" form="options" class="form-control">
              <option value="atonal">Atonal</option>
              <option value="C">C</option>
              <option value="C-sharp">C-sharp</option>
              <option value="D-flat">D-flat</option>
              <option value="D">D</option>
              <option value="E-flat">E-flat</option>
              <option value="E">E</option>
              <option value="F">F</option>
              <option value="F-sharp">F-sharp</option>
              <option value="G">G</option>
              <option value="A-flat">A-flat</option>
              <option value="A">A</option>
              <option value="B-flat">B-flat</option>
              <option value="B">B</option>
            </select>
              </div>
              <div class="form-group">
            <label for="mode">Mode</label>
            <select name="mode" form="options" class="form-control">
              <option value="none">None</option>
              <option value="major">Major</option>
              <option value="minor">Minor</option>
              <option value="dorian">Dorian</option>
              <option value="phrygian">Phrygian</option>
              <option value="lydian">Lydian</option>
              <option value="mixolydian">Mixolydian</option>
              <option value="aeolian">Aeolian</option>
              <option value="locrian">Locrian</option>
            </select>
              </div>
              <div class="form-group">
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control" id="tempo" name="tempo" placeholder="Enter Tempo between 40 and 260 bpm">
              </div>
              <label for="instruments">Instruments</label>
              <div class="row">
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="piano">
                  Piano
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="guitar">
                  Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="cello">
                  Cello
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="violin">
                  Violin
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="electric bass">
                  Electric Bass
                </label>
              </div>
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="harpsichord">
                  Harpsichord
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="acoustic guitar">
                  Acoustic Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="classical guitar">
                  Classical Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="french horn">
                  French Horn
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="string bass">
                  String Bass
                </label>
              </div>
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="flute">
                  Flute
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="clarinet">
                  Clarinet
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="bassoon">
                  Bassoon
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="percussion">
                  Percussion
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="tuba">
                  Tuba
                </label>
              </div>
                </div>
              </div>
              <div class="form-group">
                <label for="motif">Motif</label>
                <input type="text" class="form-control" id="motif" name="motif" placeholder="Enter Motif">
              </div>
              <div class="form-group">
                <label for="progression">Chord Progression</label>
                <input type="text" class="form-control" id="progression" name="progression" placeholder="Enter Progression">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


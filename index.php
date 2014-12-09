<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div class="container-fluid">
    <h1>Welcome to RandoMIDI</h1>
    <h3>Choose the options you would like to hear in a pseudo-random song</h3>
    <div class="row">
      <div class="col-lg-6">
        <form  id="options" action="createFormArgs.php" method="post">
          <div class="form-group">
            <label for="style">Style</label>
            <select name="style-list" form="options" class="form-control">
              <option>None</option>
              <option>Rock</option>
              <option>Blues</option>
              <option>Classical</option>
              <option>Unicorn Metal</option>
            </select>
          </div>
          <div class="form-group">
            <label for="key">Key</label>
            <select name="key-list" form="options" class="form-control">
              <option>Atonal</option>
              <option>C</option>
              <option>C-sharp</option>
              <option>D-flat</option>
              <option>D</option>
              <option>E-flat</option>
              <option>E</option>
              <option>F</option>
              <option>F-sharp</option>
              <option>G</option>
              <option>A-flat</option>
              <option>A</option>
              <option>B-flat</option>
              <option>B</option>
            </select>
          </div>
          <div class="form-group">
            <label for="mode">Mode</label>
            <select name="mode-list" form="options" class="form-control">
              <option>None</option>
              <option>Major</option>
              <option>Minor</option>
              <option>Dorian</option>
              <option>Phrygian</option>
              <option>Lydian</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tempo">Tempo</label>
            <input type="text" class="form-control" id="tempo" placeholder="Enter Tempo between 40 and 260 bpm">
          </div>
          <label for="instruments">Instruments</label>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Piano
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Guitar
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Cello
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Violin
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="">
              Electric Bass
            </label>
          </div>
          <div class="form-group">
            <label for="motif">Motif</label>
            <input type="text" class="form-control" id="motif" placeholder="Enter Motif">
          </div>
          <div class="form-group">
            <label for="progression">Chord Progression</label>
            <input type="text" class="form-control" id="progression" placeholder="Enter Progression">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
      </div>
      <div class="col-lg-6">
      </div>  
    </div>
  </div>
</body>
</html>


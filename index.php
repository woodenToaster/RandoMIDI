<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div id="background">
    <div id="vertical-container">
      <div class="container-fluid">
        <div class="jumbotron vertical-center">
          <h1>Welcome to RandoMIDI</h1>
          <h3>Choose the options you would like to hear in a pseudo-random song</h3>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form  id="options" action="createFormArgs.php" onsubmit="return validateForm()" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name your composition">
              </div>
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
              <option>Mixolydian</option>
              <option>Aeolian</option>
              <option>Locrian</option>
            </select>
              </div>
              <div class="form-group">
                <label for="tempo">Tempo</label>
                <input type="text" class="form-control" id="tempo" placeholder="Enter Tempo between 40 and 260 bpm">
              </div>
              <label for="instruments">Instruments</label>
              <div class="row">
                <div class="col-lg-4">
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
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Harpsichord
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Acoustic Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Classical Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  French Horn
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  String Bass
                </label>
              </div>
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Flute
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Clarinet
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Bassoon
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Percussion
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Tuba
                </label>
              </div>
                </div>
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
        </div>
      </div>
    </div>
  </div>
</body>
</html>


<script>
function chordFormat(){
  var x = document.forms["options"]["progression"].value;
  var patt = /((I|II|III|IV|V|VI|VII|i|ii|iii|iv|v|vi|vii)+\s)*/
  return patt.test(x);
}
function validateForm(){
  var x = document.forms["options"]["tempo"].value;
  var temp = true;
  if(x.length != 0){
    if(40 > x || x > 260){
      alert("Given tempo is out of bounds.");
      temp = false;
    }
  }
  x = document.forms["options"]["progression"].value;
  var patt = /((I|II|III|IV|V|VI|VII|i|ii|iii|iv|v|vi|vii)+\s)+/
  if(x.length != 0){
    alert(patt.test(x));
    if(!patt.test(x)){
      alert("Chord progression needs to be in form of roman numeral 'space' roman numeral");
      temp = false;
    }
  }
  return temp;
}
</script>


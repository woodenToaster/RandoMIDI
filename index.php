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
            <form  id="options" action="createMIDI.php" onsubmit="return validateForm()" method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name your composition">
              </div>
              <div class="form-group">
                <label for="style">Style (If you select a style, please do not select any instruments)</label>
                <select name="style" form="options" class="form-control">
                  <option value="none">None</option>
                  <option value="Rock">Rock</option>
                  <option value="Classical">Classical</option>
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
                  <input type="checkbox" name="instruments[]" value="Piano">
                  Piano
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Distortion Guitar">
                  Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Cello">
                  Cello
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Violin">
                  Violin
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Fingered Bass">
                  Electric Bass
                </label>
              </div>
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Harpsichord">
                  Harpsichord
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Steel String Guitar">
                  Acoustic Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Nylon Str Guitar">
                  Classical Guitar
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="French Horn">
                  French Horn
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Contrabass">
                  String Bass
                </label>
              </div>
                </div>
                <div class="col-lg-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Flute">
                  Flute
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Clarinet">
                  Clarinet
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Bassoon">
                  Bassoon
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="instruments[]" value="Tuba">
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


<script>
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
  var patt = /((I|II|III|IV|V|VI|VII|i|ii|iii|iv|v|vi|vii)\s)+/
  if(x.length != 0){
    if(!patt.test(x)){
      alert("Chord progression needs to be in form of roman numeral 'space' roman numeral");
      temp = false;
    }
  }
  return temp;
}
</script>


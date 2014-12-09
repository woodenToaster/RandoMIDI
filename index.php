<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    <h1>Welcome to RandoMIDI</h1>
    <h3>Choose the options you would like to hear in a pseudo-random song</h3>
    <div class="row">
      <div class="col-lg-6">
        <form  name="options" action="createFormArgs.php" method="post">
          <div class="form-group">
            <label for="style">Style</label>
            <input type="text" class="form-control" id="style" placeholder="Enter Style">
          </div>
          <div class="form-group">
            <label for="tempo">Tempo</label>
            <input type="text" class="form-control" id="tempo" placeholder="Enter Tempo">
          </div>
          <div class="form-group">
            <label for="instruments">Instruments</label>
            <input type="text" class="form-control" id="instruments" placeholder="Enter Instruments">
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


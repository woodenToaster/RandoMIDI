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
          <div class="row">
            <div class="col-md-6">
              <form role="search">
                <div class="form-inline">
                  <input type="text" class="form-control" placeholder="Search">
                  <button type="submit" class="btn btn-default">Submit</button>
                </div>
              </form>
              <ul class="list-group">
                <li class="list-group-item">
                  <button class="btn btn-success" onclick="$midi->playMidFile(taylor_swift-shake_it_off.mid,0,1,0,'quicktime')">
                    <span class="glyphicon glyphicon-play"></span>
                  </button>
                  Taylor Swift Test
                </li>
                <li class="list-group-item">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-play"></span>
                  </button>
                  My crappy song
                </li>
                <li class="list-group-item">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-play"></span>
                  </button>
                  Weird random Dorian
                </li>
                <li class="list-group-item">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-play"></span>
                  </button>
                  Unicorn power
                </li>
                <li class="list-group-item">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-play"></span>
                  </button>
                  EECS 647 theme song
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html
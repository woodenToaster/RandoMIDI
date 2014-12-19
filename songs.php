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
                  <input type="submit" class="button" name="Taylor" value="Taylor">
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
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });

});
</script>

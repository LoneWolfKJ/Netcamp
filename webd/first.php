<!DOCTYPE html>
    <head>
    <style>
.zoom {
  transition: transform .2s; /* Animation */
  padding: 50px;
  margin: 0 auto;
}

.btn-zoom {
  background-color: #008CBA !important;
  padding: 50px;
  transition: transform 0.4s;
}

.btn-zoom:hover {
  background-color: #4CAF50 !important;
  transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.zoom:hover {
  transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
.carousel-inner img {
      width: 100%;
      height: 100%;
  }
</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-md-right lead">
                <a class="btn btn-outline-secondary prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                <a class="btn btn-outline-secondary next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="ralph.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="ralph.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="ralph.jpg" alt="New York">
    </div>
  </div>
    </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<br>
<br>
<br>
hello
    <div class="row">
    <?php
    $i = 10;
         while($i > 0){
         ?> 
         <div class="col-md-4 col-md-3"  style="margin-bottom:60px; margin-right:20px;">
            <div class="card card-default zoom">
            <div class="card-body">
              <div class="card-header"><?php echo "titlle"; ?></div>
              <div class="card-content"><?php echo "detail"; ?></div>
              <div class="card-footer"><?php echo "price"; ?></div>
              <p>
                <table class="card-clock-deals-timer">
                  <tr>
                    <td id="hours"><?php echo "hours"; ?></td>
                    <td>:</td>
                    <td id="minutes"><?php echo "minutes"; ?></td>
                  </tr>
                </table>
              </p>
          </div>
          <button type="button" class="btn btn-zoom btn-sm btn-block">Block level button</button>
       </div>
       </div>
        
         <?php
          $i--; }?>
        </div>
        <script src="" async defer></script>
    </body>
</html>
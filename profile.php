<?php

session_start();



$a = $_SESSION["username"];

$b = $_SESSION["id"];


echo $a;

$conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");




?>





<html>

    <head> 

<!-- HEAD SECTION -->
        <meta charset= "UTF-8">
	    <title> Planit </title>
	    <link rel = "stylesheet" type = "text/css" href="home2.css">
<!-- IE Edge Meta Tag -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

<!-- Minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional Theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Optional IE8 Support -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

        <style>
			
			.img_div {
				
				width: 20%;
				height: 20%;
			}
			
			.well {
				
				height: 500px;
			}
			
		</style>

    </head>

    <body>
	
	    <nav class="navbar navbar">
           <div class="container-fluid">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>                        
                   </button>
                  <a class="navbar-brand" href="home.html">Planit</a>
               </div>
               <div class="collapse navbar-collapse" id="myNavbar">
                   <ul class="nav navbar-nav">
                       <li class="active"><a href="Home.html">Home</a></li>
                       <li><a href="#">About</a></li>
                       <li><a href="#">Discover</a></li>
                       <li><a href="#">Contact</a></li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                       <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                   </ul>
              </div>
          </div>
       </nav>                  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        
       
        <div class="card-info"> 

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                <div class="hidden-xs">Plans</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Personal information</div>
            </button>
        </div>
        <!--<div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Following</div>
            </button>
        </div>-->
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
          <h1>Hello <?php echo $a ?></h1>
		  <?php
		  $result = $conn->query("SELECT * FROM users, plan_details2 where Username = '$a' and U_id = '$b'");
$row = $result->fetch();


if ($row == false) {
	
	
	
	echo "<p> No plans yet</p>";
}

else {
	
	echo "<h2> Your plans</h2>";
	
	while($row) {
		
		$ab = $row[location];
		$ac = $row[days];
		
		
		echo "<div class= img_div 'col-sm-4'>
                <div class='col-sm-12 thumbnail text-center'>
                    <img alt='' class='img-responsive ' src=
                    'box.jpg'>

                    <div class='caption'>
                        <h4>$row[Name]</h4>
						<a href='random.php?table1=$ab&table2=$ac'>Link</a>
                    </div>
                </div>
				</div>
              ";
			
			$row = $result->fetch();
		
	}
	
	
}


?>
        </div>
        <div class="tab-pane fade in" id="tab2">
          <h3>This is tab 2</h3>
        </div>
        <div class="tab-pane fade in" id="tab3">
          <h3>This is tab 3</h3>
        </div>
      </div>
    </div>
    
    </div>
    
    </body>
    
    </html>
    
    
            
    
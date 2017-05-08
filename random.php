<?php>

$string  = $_GET["table2"];
$string2 = $_GET["table1"];


 $ch = curl_init();
       
//curl_setopt($ch, CURLOPT_URL,'https://maps.googleapis.com/maps/api/place/textsearch/json?query=''$string2''&key=AIzaSyCZ3QdZ5RHRS88tQKPL-UlWqlbM4rCsBG0' );//

$data = http_build_query(array('key'=> 'AIzaSyCZ3QdZ5RHRS88tQKPL-UlWqlbM4rCsBG0', 'query'=> $string2)); // set url
curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/place/textsearch/json?'.$data); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_PROXYPORT, 3128);


//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);//

//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);//

$response = curl_exec($ch);

curl_close($ch);

$resp = curl_exec($ch);

   $res = json_decode($response);
   
  echo $name = $res->results[0]->name;
  echo $lat = $res->results[0]->geometry->location->lat;
  echo $lng = $res->results[0]->geometry->location->lng;
  echo $ide = $res->results[0]->place_id;
  echo $name;
  //$name = $res->results[0]->name;//

   //echo $name;//

echo $string2;

 function getMyUserData()  {

//$conn = new PDO ("mysql:host=localhost;dbname=Ajibola", "root","root");//

 $conn = new PDO("mysql:host=localhost;dbname=Ajibola;",
                "root","root");



//$conn = mysql_connect("mysql:host=localhost;dbname=Ajibola", "root", "root");//

$result = $conn->query("select * from Plan_details");

//$result2 = $conn->query("SELECT * FROM sc_users WHERE username = '$uname'");//

$row = $result->fetch();

//$row1 = $result2->fetch();//



while($row) {


echo "<p>";
echo "Location: $row[Name] </br>";
echo "</p>";





$row = $result->fetch();

}


echo $name2 = $row[Name];

}




echo "



<html lang='en'>
<head>
  <meta charset='utf-8'>

  <title>The HTML5 Herald</title>
  <meta name='description' content='The HTML5 Herald'>
  <meta name='author' content='SitePoint'>
   <link rel = 'stylesheet' type = 'text/css' href='home2.css'>
  
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js'></script>
  <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCZ3QdZ5RHRS88tQKPL-UlWqlbM4rCsBG0&libraries=places&callback=initMap' async defer></script>
  
  
  
  
  <script>
    
    
    $(document).ready(function(){
    
    
      
      var email = $('#myField').val();
      
      
    
    for (var i = 0; i < $string; i++) { 
  
  
     $('.blog-main').append('<div class= tab_content id= tab'+i+'><h2>Day'+i+'</h2><p></p></div>');
  
 $('.tabs').append('<li id='+i+' '+' class = mylist rel=tab'+i+'>Day'+i+'></li>').addClass('tabs2');
 
 



    }
    
    
     $('ul.tabs li').click(function(){
   
    var id = this.id;
   
  
    
     $.ajax({
        type: 'GET',
        data: {'id':id},
        url: 'insertation.php',
        success: function(responseText){
          
           
          
           $('.result').remove(); 
           $('.tab_content').append(responseText);
           $('.result').append('<button class=bang>Delete</button>');
           
           $('.bang').click(function(){
              
               var name = $('.name_2').text();
               alert(name);

                   $.ajax({
        type: 'GET',
        data: {'id':id, 'name':name},
        url: 'delete.php',
        success: function(responseText){

           alert('deleted');
           

}

});

});
          
          
           
            
   }
  
});

             
             
                  
});



    
    
  });
    
  </script>
  
   <script>
   
    $(document).ready(function(){
   
      
      $('.save2').click(function() {
      
       var loc = '$string2';
      var days = '$string';
      
    
      $.ajax({
        type: 'POST',
        data: {'loc':loc,'days':days},
        url: 'save.php',
        success: function(responseText){
           
           alert('Saved');
          
            
            
   }

  
});
      
      

});

});
		
      
      
      </script>
  
  
  
  <script>
			
			$(document).ready(function(){
            
            
			
			$('.tab_content').hide();
            $('.tab2-content').hide();
            $('.tab_content:first').show();


           $('ul.tabs li').click(function(){
           

                   $('.tab_content').hide();
                   $('.tab_content').removeClass('hidden');
                   $('.tab2-content').addClass('hidden');
                   var theactive = $(this).attr('rel');
                   $('#'+theactive).fadeIn();
  
  $('ul.tabs li').removeClass('active');
  $(this).addClass('active');
  
  
  
  
   /*$('.tab_drawer_heading').removeClass('d_active');
	  $('.tab_drawer_heading[rel^=''+activeTab+'']').addClass('d_active');*/
                     
                      });
                    
            

					$('ul.tabs22 li').click(function() {
						
						$('.tab_content').addClass('hidden');
                        
						 $('.tab2-content').removeClass('hidden');
						$('.tab2-content').hide();
						var theactive2 = $(this).attr('rel');
                        
                        $('#'+theactive2).fadeIn();												
						
					});
                    
                     

					


	$('ul.tabs li').last().addClass('tab_last');
	
	$('ul.tabs22 li').last().addClass('tab_last');
			
			});
			
		</script>
        
    
    <script>
      
       var map;
      var infowindow;
      

      function initMap() {
        var back = {lat: $lat, lng: $lng};

        map = new google.maps.Map(document.getElementById('map'), {
          center: back,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: back,
          radius: 30000,
          type: ['resturant']
        }, callback);
    	

		
		}
        
      
        
        
		
		function callback (results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
			$('.search_tabs').append('<li class=search2'+i+' ' + 'id=search2><h2 id=test >'+results[i].name+'</h2></li>');
            $('.search_tabs').append('<li class=search3'+i+' ' + 'id=search2><h2 id=test >'+results[i].place_id+'</h2></li>');
            $('.search_tabs').append('<input class=button id = '+i+ ' ' + 'type=submit value=Add></button>');
            $('.search_tabs').append('<input class=button2 id = 3'+i+ ' ' + 'type=submit value=View more></button>');
             
            }
            
                $('.button').click(function(){
                
                
                var ab = $(this).attr('id');
                
                var a = $('li.search2'+ab).text();
                var n = replaced = a.split(' ').join('-');;
                var c = $('li.search3'+ab+'').text();
                
                b = 'bbc';
                
                $('.editform').addClass('formopen');
                $('form').removeClass('editform');
                $('form').append('<input class= name type= text value='+n+'>');
                $('form').append('<input class=id type=text value= '+c+'>'); 
                
                   });
                   
                   
                   
                   $('.close').click(function() {
                    
                    $('.formopen').addClass('editform');
                     $('form').removeClass('formopen');
                     $('.name').remove();
                        $('.id').remove();
                    
                   });
                   
                 
               
                
          $('.add').click(function(){
          
         
   
    var namer = $('.name').val();
    var idd = $('.id').val();
    var quantity = $('.number').val();

    
     $.ajax({
        type: 'POST',
        data: {'idd':idd, 'namer':namer, 'quantity':quantity},
        url: 'insertation2.php',
        success: function(responseText){
           alert(responseText);
           alert(namer);
           $('.formopen').addClass('editform');
                     $('form').removeClass('formopen');
                     $('.name').remove();
                        $('.id').remove();
           
          
            
            
   }
  
});
			
          });
          
          
           $('.button2').click(function(){
                
                
                
                
                
                var a = $(this).attr('id');
                
               
                var b = $('li.search'+a+'').text();
                
               
                
                 var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails({
          placeId: $('li.search'+a+'').text()
        }, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            
                
                $('.search'+a+'').append('<p>Address: '+place.formatted_address+'</p>');
                
                  $('.search'+a+'').append('<p> website: '+place.website+'</p>');
                    $('.search'+a+'').append('<p>Phone: '+place.international_phone_number+'</p>');
                     $('.search'+a+'').append('<p>Review: '+place.rating+'</p>');
                     $('.search'+a+'').append('<p> Opening time: '+place.opening_hours.periods[0].open.day+'</p>');
                  
                }
                   
                   
                
                   
                   
                   
                   });
          
          
       
      
		
		
		
		
		});
        }
        
        };
		
		
	  
	  
	  
	 

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });
		
		
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
		
	  
      }
      
      </script>
      
     
   
    
     
    
    
     
                  
                  
                 
    

     
      
      
  
      
     
     
    <script src='https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js'></script>
  <![endif]-->
</head>

<body>
  <!--<h1>Hello</h1>
  
  <div class='blog-post'>
    <h2>Bull</h2>
    <h2>Pool</h2>
  
  <section>
  
    
      </div>
    
  </section>
  
  <article class='bat'>
    
    
    
  </article> -->
  
  <html>

   


		
		
<!-- IE Edge Meta Tag -->
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>

<!-- Viewport -->
        <meta name='viewport' content='width=device-width, initial-scale=1'> 

<!-- Minified CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

<!-- Optional Theme -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'>

<!-- Optional IE8 Support -->
<!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
        <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
		

<![endif]-->

    </head>

    <body>
	
	    <nav class='navbar navbar'>
           <div class='container-fluid'>
               <div class='navbar-header'>
                   <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                       <span class='icon-bar'></span>
                       <span class='icon-bar'></span>
                       <span class='icon-bar'></span>                        
                   </button>
                  <a class='navbar-brand' href='random.php'>Planit</a>
               </div>
               <div class='collapse navbar-collapse' id='myNavbar'>
                   <ul class='nav navbar-nav'>
                       <li class='active'><a href='random2.php'>Home</a></li>
                       <li><a href='#'>About</a></li>
                       <li><a href='#'>Discover</a></li>
                       <li><a href='#'>Contact</a></li>
                   </ul>
                   <ul class='nav navbar-nav navbar-right'>
                       <li><a href='loginform.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                   </ul>
              </div>
          </div>
       </nav>

        <header class= 'head'>
            <div class='container'>
                <div class='row'>
                    <div class='dum col-md-12 column-block'>
						<ul class='tabs22'>
                            <li rel='tab21'>Dining</li>
                            <li rel='tab22'>Attractions</li>
                            <li rel='tab23'>Accomadation </li>
						    <li rel='tab24'>Night life</li>
						</ul>
                    </div>

                </div>
            </div>

        </header>
        
        
        <div class='container'>

      <div class='row'>

        <div class='col-sm-3 offset-sm-1 blog-sidebar'>
          <div class='sidebar-module'>
            <h4>List</h4>
            <ul class='tabs list-unstyled'>
              <li class='active'rel='tab0'>Day 1</li>
			  <li rel='tab1'>Day 2</li>
              <li rel='tab0'>Add new</a></li>
              
            </ul>
          </div>
          <div class='sidebar-module'>
            <h4>Elsewhere</h4>
            <ol class='list-unstyled'>
              <li><a href='#'>Edit</a></li>
              <li><a href=''>Save</a></li>
              <button class='save2'>Save</button>
              <li><a href=''>PDF</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->
		
		<div class='col-sm-8 blog-main'>

          <!-- <div>
			
			
			<div id= 'tab1' class='tab_content'>
			<h2 class='blog-post-title'>Day1</h2>	
            
            <p class='blog-post-meta'>January 1, 2014 by <a href='#'>Mark</a></p>
            
              
            
			
			</div> 
			
			
			<div id= 'tab2' class='tab_content'>
				
				<h2>Day2</h2>
                
                
               
			</div> -->
			
			<!--<h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <pre><code>Example code block</code></pre>
            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            <ol>
              <li>Vestibulum id ligula porta felis euismod semper.</li>
              <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
              <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
            </ol>
            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
          </div><!-- /.blog-post --> -->

          <div id='tab21' class='tab2-content'>
            <h2 class='blog-post-title'>Accomadations</h2>
            
            <input type='text' name='search' placeholder='Search..'>
            
            
            <div id='map'></div>
			
			

            <ul class='search_tabs'>
            
            <form class='editform' action=#>
              <label for='name'>Location:</label>
              <label for='days'>Days:</label>
              <input type='number' name='quantity' class='number'
   min='0' max='$string' step='1' value='1'>
              
              
              <button class='add' type='button' name='submit' value='Add item'>Add</button>
              <button class='close' type= 'button' >Close</button>
            
            </form>
				
			    <li class='acc'></li>
                
                
				
				
			</ul>
            
            
            
           
            
            
            
          </div><!-- /.blog-post -->
          
         

          <div id='tab22' class='tab2-content'>
            <h2 class='blog-post-title'>Attractions</h2>
            <p class='blog-post-meta'>December 14, 2013 by <a href='#'>Chris</a></p>
			
			<input type='text' name='search' placeholder='Search..'>


            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
          </div><!-- /.blog-post -->
		  
		  <div id='tab23' class='tab2-content'>
			
			  <h2>Dining</h2>   
		      
			
		  </div>
		  
		  <div id='tab24' class='tab2-content'>
			
			  <h2>Night life</h2>
			
			
		  </div>

          <nav class='blog-pagination'>
            <a class='btn btn-outline-primary' href='#'>Older</a>
            <a class='btn btn-outline-secondary disabled' href='#'>Newer</a>
          </nav>

        </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class='blog-footer'>
     
      <p>
        <a href='#'>Back to top</a>
      </p>
    </footer>
	
	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

<!-- Minified JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</body>
</html>
	
  
</body>
</html>

"

?>
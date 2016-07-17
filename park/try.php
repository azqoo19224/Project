<?php
require ("config.php");
echo $_POST["txtUse"];
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );

$searchID = <<<SqlQuery
select area, name, summary, address, tel, payex from Park where area like '%{$_POST["txtUse"]}%'
SqlQuery;

$result = mysql_query ( $searchID, $link );


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>停車場車位查詢系統</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		
		<script type="text/javascript" src="jquery.js"></script>
	  <script type="text/javascript">
	  
	  
//   $(document).ready(function(){
      
//         htmlobj=$.ajax({url:"seachName.php",async:false});
//       $("#content1").html(htmlobj.responseText);
  
// });

	 //  $(document).ready(function(){
	 //  $("btnOK").click(function seachUse(textUse){
  //     alert(textUse);
	 //  //$.ajax({
	 //  //     type:"GET",
	 //  //     url:"seachUse.php?ID="+textUse,
	 //  //     dataType:"text",
	 //  //      error:function(Xhr)
	 //  //     {
	 //  //       alert("error");
	 //  //     },
	 //  //     success:function(json)
	 //  //     {
	          
	 //  //       var obj=JSON.parse(json);
	 //  //       $("#nameid").text(obj.name);
	 //  //       $("#area").text("地區: "+obj.area);
	 //  //       $("#summary").text("規格: "+obj.summary);
	 //  //       $("#tel").text("電話: "+obj.tel);
	 //  //       $("#address").text("地點: "+obj.address);
	 //  //       $("#payex").text("收費: "+obj.payex);
	          
	   
	 //  //     }
	 //  //   });
	 //})});

	 
    function seachID(ID)
	 {

	 
	     
	    $.ajax({
	        type:"GET",
	        url:"seachID.php?ID="+ID,
	        dataType:"text",
	        error:function(Xhr)
	        {
	          alert("error");
	        },
	        success:function(json)
	        {
	          
	          var obj=JSON.parse(json);
	          $("#nameid").text(obj.name);
	          $("#area").text("地區: "+obj.area);
	          $("#summary").text("規格: "+obj.summary);
	          $("#tel").text("電話: "+obj.tel);
	          $("#address").text("地點: "+obj.address);
	          $("#payex").text("收費: "+obj.payex);
	          
	   
	        }
	      });
	 }


	  
	</script>

	</head>

	<body>
<!-- Wrap all page content here -->
<div id="wrap">

 
<header class="masthead">

  	<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/car5.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2>停車場車位查詢系統</h2>
              <p></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/car6.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2>停車場車位查詢系統</h2>
              <p></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/car2.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h2>停車場車位查詢系統</h2>
              <p></p>
            </div>
          </div>
        </div>       
      </div><!-- /.carousel-inner -->
      <div class="logo"></div> 
      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>  
    </div>
    <!-- /.carousel -->
  
</header>
  
<!-- Fixed navbar -->
<div class="navbar navbar-custom navbar-inverse navbar-static-top" id="nav">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav nav-justified">
           <li><a href="#section1">Home</a></li>
          <li class="dropdown">
            <a href="#section4" class="dropdown-toggle" data-toggle="dropdown">Map <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#Place">place</a></li>
            <!--  <li><a href="#">Academic</a></li>-->
            <!--  <li><a href="#">Commercial</a></li>-->
            <!--  <li><a href="#">Financial</a></li>-->
            <!--  <li><a href="#">Interior Design</a></li>-->
            <!--  <li><a href="#">Medical</a></li>-->
            <!--  <li><a href="#">Religious</a></li>-->
              <li><a href="#Map">Map</a></li>
            </ul>
          </li>
          <!--<li><a href="#section5">Contact</a></li>-->
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->

<div class="divider" id="section1"  align="center">
  
  
<!----------------------   查詢條  --------------------------------    -->
  <form style="font-family:DFKai-sb;" name="form1" method="POST" action="side.php">
  <tr>
    <td>
      <select name="YourLocation" style ="font-family:DFKai-sb;color:#666666;font-size:20pt" >
        
    　     <option value="area">區域</option>
        　<option value="Taoyuan">信義區</option>
　        <option value="Hsinchu">北投</option>
    　     <option value="Miaoli">萬華</option>
  
      </select>
    </td>
    <td>
      <input type="text" size="55" style="font-size:16pt" name="txtUse" id="txtUse"/>
    </td>
    <td>
      <input type="submit" name="btnOK" id="btnOK" style="font-size:16pt" value="查詢"/>

    </td>
  </tr>
</form> 
</div>




<div class="container">
  <div id="content1" class="col-sm-10 col-sm-offset-1" style="overflow: scroll;height:500px;">
    
    <!------抓資料------->
    <?php while ($row = mysql_fetch_array($result)){ ?>
    		<A id="<?php echo $row['id']?>"   target="_self" href="#Place"
    		onclick="seachID(<?php echo $row['id']?>)">
		    	<h4><?php echo $row["area"]."__".$row["name"] ?></h4>
		      </A>
	   <?php }  ?>
	   
    

    </div>
    
     <div class="page-header text-center">
        <div class="divider"></div>
  </div>
</div>
    
<div class="divider"></div>
  
<section class="bg-3" id="Place">
  <div class="col-sm-6 col-sm-offset-3 text-center"><h2 style="padding:20px;background-color:rgba(5,5,5,.8)">Place</h2></div>
</section>

<!--------  場地詳細 --------------->
<div class="divider" id="section2"></div>
   
<div class="row">
  	<div class="col-sm-10 col-sm-offset-1">
 
    <h1><p id="nameid"></p></h1>
      
      
      <hr>
     <h4>
      <p  id="area"></p>
	    <p id="tel"></p>
      <p id="address"></p> 
      <p id="payex"></p></p>  
      <p id="summary"></p> 
        </h4>
      <hr>
      
      <div class="divider"></div>
      
  	</div><!--/col-->
</div><!--/場地詳細-->

<div class="divider"></div>
  
<section class="bg-3" id="Map">
  <div class="col-sm-6 col-sm-offset-3 text-center"><h2 style="padding:20px;background-color:rgba(5,5,5,.8)">Map</h2></div>
</section>
  
 <div id="map" style="height: 100%:
        margin: 0;
        padding: 0;"></div>

<div class="row">
  <div class="col-md-8 col-md-offset-1">
  </div>
</div>
  
<div class="row">
  
  <div class="col-sm-10 col-sm-offset-1">
      <h1>Location</h1>
  </div>   
       
  <div id="map-canvas"></div>
  
  <hr>
  
  <div class="col-sm-8"></div>
  <div class="col-sm-3 pull-right">

      <address>
        The Firm, Inc.<br>
        <span id="map-input">
        1500 Main Street<br>
        Springfield, MA 01115</span><br>
        P: (413) 700-5999
      </address>
    
      <address>
        <strong>Email Us</strong><br>
        <a href="mailto:#">first.last@example.com</a>
      </address>          
  </div>
  
</div><!--/row-->
  
<div class="divider" id="section5"></div>  

<div class="row">
  
  <hr>
  
  <div class="col-sm-9 col-sm-offset-1">
      
      <div class="row form-group">
        <div class="col-md-12">
        <h1>Contact Us</h1>        
        </div>
        <div class="col-xs-4">
          <input type="text" class="form-control" id="firstName" name="name" placeholder="Your Name">
        </div>
        <div class="col-xs-6">
          <input type="text" class="form-control" id="organization" name="organization" placeholder="Company or Organization">
        </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-5">
          <input type="text" class="form-control" name="email" placeholder="Email">
          </div>
          <div class="col-xs-5">
          <input type="text" class="form-control" name="phone" placeholder="Phone">
          </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-10">
            <textarea class="form-control" placeholder="Comments"></textarea>
          </div>
      </div>
      <div class="row form-group">
          <div class="col-xs-10">
            <button class="btn btn-default pull-right">Contact Us</button>
          </div>
      </div>
    
  </div>
  
</div><!--/row-->
  
<!--<div class="container">-->
<!--  	<div class="col-sm-8 col-sm-offset-2 text-center">-->

<!--      <ul class="list-inline center-block">-->
<!--        <li><a href="http://facebook.com/bootply"><img src="/assets/example/soc_fb.png"></a></li>-->
<!--        <li><a href="http://twitter.com/bootply"><img src="/assets/example/soc_tw.png"></a></li>-->
<!--        <li><a href="http://google.com/+bootply"><img src="/assets/example/soc_gplus.png"></a></li>-->
<!--        <li><a href="http://pinterest.com/in1"><img src="/assets/example/soc_pin.png"></a></li>-->
<!--      </ul>-->
      
<!--  	</div><!--/col-->-->
<!--</div><!--/container-->
  
</div><!--/wrap-->

<div id="footer">
  <div class="container">
    <p class="text-muted">Copyright ©2014 ACME, Inc.</p>
  </div>
</div>

<ul class="nav pull-right scroll-top">
  <li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>


<div class="modal" id="myModal" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
		<button class="close" type="button" data-dismiss="modal">×</button>
		<h3 class="modal-title"></h3>
	</div>
	<div class="modal-body">
		<div id="modalCarousel" class="carousel">
 
          <div class="carousel-inner">
           
          </div>
          
          <a class="carousel-control left" href="#modaCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
          <a class="carousel-control right" href="#modalCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
          
        </div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
   </div>
  </div>
</div>


	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/scripts.js"></script>
		
	
		
		
		
	</body>
</html>


<!--<div class="bg-4">-->
<!--  <div class="container">-->
<!--	<div class="row">-->
<!--	   <div class="col-sm-4 col-xs-6">-->
      
<!--        <div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="Renovations"><img src="//placehold.it/600x400/444/F8F8F8" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>Renovations</p>-->
<!--            <p></p>-->

<!--          </div>-->
<!--        </div><!--/panel-->-->
<!--      </div><!--/col-->-->
      
<!--      <div class="col-sm-4 col-xs-6">-->
      
<!--      	<div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="Academic Institutions"><img src="//placehold.it/600x400/454545/FFF" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>Academic Institutions</p>-->
<!--            <p></p>-->
            
<!--          </div>-->
<!--        </div><!--/panel--> -->
<!--      </div><!--/col-->-->
      
<!--      <div class="col-sm-4 col-xs-6">-->
      
<!--      	<div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="Interiors"><img src="//placehold.it/600x400/555/F2F2F2" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>Interiors</p>-->
<!--            <p></p>-->
            
<!--          </div>-->
<!--        </div><!--/panel--> -->

<!--      </div><!--/col--> -->
      
<!--      <div class="col-sm-4 col-xs-6">-->
      
<!--      	<div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="New Construction"><img src="//placehold.it/600x400/555/FFF" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>New Construction</p>-->
<!--            <p></p>-->
            
<!--          </div>-->
<!--        </div><!--/panel--> -->

<!--      </div><!--/col--> -->
      
<!--      <div class="col-sm-4 col-xs-6">-->
      
<!--      	<div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="Site Planning"><img src="//placehold.it/600x400/555/EEE" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>Site Planning</p>-->
<!--            <p></p>-->
            
<!--          </div>-->
<!--        </div><!--/panel--> -->

<!--      </div><!--/col--> -->
      
<!--      <div class="col-sm-4 col-xs-6">-->
      
<!--      	<div class="panel panel-default">-->
<!--          <div class="panel-thumbnail"><a href="#" title="Churches"><img src="//placehold.it/600x400/666/F4F4F4" class="img-responsive"></a></div>-->
<!--          <div class="panel-body">-->
<!--            <p>Churches</p>-->
<!--            <p></p>-->
            
<!--          </div>-->
<!--        </div><!--/panel--> -->

<!--      </div><!--/col--> -->
      
<!--	</div><!--/row-->-->
<!--  </div><!--/container-->-->
<!--</div>-->
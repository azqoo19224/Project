
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

    <style type="text/css">
      #map { height: 100%; }
    </style>
    
    

	

		<script type="text/javascript" src="jquery.js"></script>
	  <script type="text/javascript">
	  
//-----------------------------------AREA CHANGE----------------------
$(document).ready(initArea).ready(initTxtUse);
//---------------------------letterArea-------------------------------
function initArea() {

Change();
	      
$("#Area").on("change",function(){
		Change()});

}

//--------------------------------------changetxt-----------------------
function initTxtUse() {
	      
$("#txtUse").on("change",function(){
		Change()});

}
//-------------------------change--------------------------------------
function Change() {

	var s = $("#Area option:selected").val();
	var u = $("#txtUse").val();
	$.ajax({
	        type:"GET",
	        url:"letterArea.php?letter="+s+"&txtUse="+u,
	        dataType:"text",
	        error:function(Xhr)
	        {
	          alert("error");
	        },
	        success:function(data)
	        {
	          $("#content1").html(data);
	          
	        }
	      });
}





//----------------------------ajax 抓資料-------------------
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
	          
	          seachMap(obj.id);
	          
	        }
	      });
	 }
	 function seachMap(id){
	   
	   $.ajax({
	     type:"GET",
	     url:"seachTotol.php?id="+id,
	     dataType:"text",
	     error:function(Xhr)
	     {
	       alert("error");
	     },
	     success:function(json){
	       var obj=JSON.parse(json);
	        $("#mapName").text(obj.id);
	       
	        initMap(obj.Xcod,obj.Ycod);
	        
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
            <a class="dropdown-toggle" data-toggle="dropdown">Map <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#Place">place</a></li>
              <li><a href="#Map">Map</a></li>
            </ul>
            
          </li>
          <li><a href="#Map">sign in</a></li>
       
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
</div><!--/.navbar -->
  
<!-- Begin page content -->

<div class="divider" id="section1"  align="center">

<!----------------------   查詢條  --------------------------------    -->

      <select name="Area" id="Area" style ="font-family:DFKai-sb;color:#666666;font-size:20pt"  >
        
    　     <option value="區">區域</option>
        　<option value="信義" option:selected>信義區</option>
　        <option value="北投">北投區</option>
          <option value="大安">大安區</option>
          <option value="內湖">內湖區</option>
          <option value="文山">文山區</option>
          <option value="士林">士林區</option>
          <option value="大同">大同區</option>
          <option value="中山">中山區</option>
          <option value="南港">南港區</option>
          <option value="松山">松山區</option>
          <option value="中正">中正區</option>
          <option value="萬華">萬華區</option>
               
      </select>
         
    
      <input type="text" size="55" style="font-size:16pt" name="txtUse" id="txtUse"/>


</div>




<div class="container">
  <div id="content1" class="col-sm-10 col-sm-offset-1" style="overflow: scroll;height:500px;"></div>
    
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
      <p id="area"></p>
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
  <div class="col-sm-10 col-sm-offset-1">
      <h1 id=mapName>Location</h1>
  </div>   
 <div id="map-canvas"></div>
  
<div class="row">
  
   
       
  
  
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

</div><!--/wrap-->

	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
		<script src="js/scripts.js"></script>
		
		<!--//--------------------------------------------------------MAP---------------------->
		<script type="text/javascript">
		
var map;
function initMap(Lat,Lng) {
  var Lat = 25.04815;
  var Lng =121.5191;
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    
    
    center: {lat: Lat, lng: Lng},
    zoom: 17

  });
}
function GetAddressMarker()
{//重新定位地圖位置與標記點位置
address = $("#address_val").val();
geocoder = new google.maps.Geocoder();
geocoder.geocode(
 {
  'address':address
 },function (results,status) 
 {
 if(status==google.maps.GeocoderStatus.OK) 
 {
    //console.log(results[0].geometry.location);
    LatLng = results[0].geometry.location;
    map.setCenter(LatLng);  //將地圖中心定位到查詢結果
    marker.setPosition(LatLng); //將標記點定位到查詢結果
    marker.setTitle(address); //重新設定標記點的title
    $("#SearchLatLng").html("【您輸入的地址位置】緯度：" + LatLng.lat() + "經度：" + LatLng.lng());
 }
 }
); 
}
 
$(document).ready(function() { 
  //綁定地址輸入框的keyup事件以即時重新定位
  $("#address_val").bind("keyup",function(){ 
    GetAddressMarker();
    $("#NowLatLng").html("【移動標記點後的位置】");
  }); 
});
    </script>
    
		
		 <script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvv993Le3vmuTkcgSiz_wG5cLmucOAdbs&callback=initMap" async defer></script>
    </script>
		
		
		
	</body>
</html>


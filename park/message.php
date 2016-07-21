<?php 

require_once("seach.php");

unset($_SESSION["logi"]);
unset($_SESSION['result']);

$insetrMember=Seach::message($link);


$name=($haveM!=null)? "修改評論": "評論"; 

if(isset($_POST["btnOK"])){
	
	
	mysql_query( $insetrMember, $link);
	
	 header("Location: index.php");

     exit();
}





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_SESSION["UserName"]?></title>
<link rel="stylesheet"
	href="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.css" />
<script src="jquery-1.9.1.min.js"></script>
<script src="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>

</head>
<body>
	<div data-role="page">
		<div data-role="content">
			<form method="post" action="message.php">
                        <h1>HELLO <?php echo  $_SESSION["login"].$_SESSION["UserName"]?></h1>
                        <h2><?php echo $name ?></h2>
                        <input type="text" size = "54" name="message" id="message"/>

            			<fieldset data-role="controlgroup" data-type="horizontal">
            				
							<legend>星數:</legend>
			     			<input type="radio" name="rdoPet" id="rdoPet0" value="1" checked="checked" />
			     			<label for="rdoPet0">一顆星</label>
			
			     			<input type="radio" name="rdoPet" id="rdoPet1" value="2"  />
					     	<label for="rdoPet1">兩顆星</label>
					
			     			<input type="radio" name="rdoPet" id="rdoPet2" value="3"  />
			     			<label for="rdoPet2">三顆星</label>
			
					     	<input type="radio" name="rdoPet" id="rdoPet3" value="4"  />
			    		 	<label for="rdoPet3">四顆星</label>
			     	
			     			<input type="radio" name="rdoPet" id="rdoPet4" value="5"  />
			     			<label for="rdoPet4">五顆星</label>
			</fieldset>
		                               <!--onclick="location.href='index.php?#msg'"-->
			
			<div class="ui-grid-a">
				<div class="ui-block-a"><input type="submit" name="btnOK" value="OK" onclick="location.href='index.php#Place'" /></div>
				<div class="ui-block-b"><input type="button" name="btnCancel" value="取消" onclick="location.href='index.php'" /></div>
			</div>

			</form>
		</div>

	</div>

</body>
</html>




<script src="javascripts/jquery.js"></script><script src="javascripts/jquery.raty.js"></script>
<script src="javascripts/labs.js" type="text/javascript"></script>

		<script>

$.fn.raty.defaults.path = 'images';

// $('#default').raty();

// function Star(a,i){

// $("#\i").raty({ readOnly: true, score: a });
   
// }
</script>
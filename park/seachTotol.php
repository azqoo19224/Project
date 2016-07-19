
<!DOCTYPE html>
<html>
    <head>


<script src="javascripts/jquery.js"></script><script src="javascripts/jquery.raty.js"></script>
<script src="javascripts/labs.js" type="text/javascript"></script>




</script>

    </head>

<body>
 
<div id="score"></div>

<!--<script type="text/javascript" src="jquery.js"></script>-->

<script type="text/javascript"></script>



  <script>
  $.fn.raty.defaults.path = 'images';


    $('#default').raty();

$('#score').raty({ score: 3 });



</script>


</body>
</html>
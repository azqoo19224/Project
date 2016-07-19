<?php 

session_start();

require ("config.php");


$insetrMember ="INSERT INTO `Member` (name, password) VALUES ('{$_POST["txtmemberName"]}','{$_POST["txtmemberPassword"]}')";



$searchMember ="select name,password from Member";

$resultMember = mysql_query ( $searchMember, $link );


if (isset($_POST["btnROK"]))
{
  


$resultID = mysql_query ($insetrMember, $link );

		header("Location: login.php");
		exit();

}

  if (isset($_POST["btnCancel"]))
{
	
		header("Location:login.php");
		exit();

}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     
		<script type="text/javascript" src="jquery.js"></script>
	  <script type="text/javascript">
$(document).ready(inputTXT);
//---------------------------letterArea-------------------------------
function inputTXT() {

$("#txtmemberName").on("change",function(){
		memberName()});

}

	  function memberName(){
	 
	    var s = $("#txtmemberName").val();
	    $.ajax({
	      type:"GET",
	      url:"searchmember.php?txtmemberName="+s,
	      dataType:"text",
	      error:function(Xhr){
	        alert("error");
	      },
	      success:function(data)
	        {
	      
	          $("#txtN").text(data);
	          
	        }
	      
	    });
	  }
	  
	  
	  </script>
    </head>
    <body>
      <form id="form1" style="font-family:DFKai-sb;" name="form1" method="post" action="registered.php">
        <table width="600" border="10" align="center" cellpadding="9" cellspacing="10" bgcolor="#F2F2F2">
          <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">
              <font color="#FFFFFF">會員系統 - 註冊</font>
            </td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline">輸入帳號</td>
            <td valign="baseline"><input type="text"  size='54'name="txtmemberName" id="txtmemberName" /></td>
            <td id='txtN'></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline">輸入密碼</td>
            <td valign="baseline"><input type="password" size='54' name="txtmemberPassword" id="txtmemberPassword" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">
              <input type="submit" name="btnROK" id="btnROK" value="登入" />
              <input type="reset" name="btnReset" id="btnReset" value="重設" />
              <input type="submit" name="btnCancel" id="btnCancel" value="取消" />
             
            </td>
          </tr>
        </table>
      </form>
      </body>
        </html>
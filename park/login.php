<?php

require ("config.php");
session_start();


$searchMember ="select name,password from Member";



$resultMember = mysql_query ( $searchMember, $link );


    if (isset($_GET["logout"]))
       {  $_SESSION["UserName"]=null;
	        header("Location: index.php");
	        exit();
      }
      
      
      //返回首頁
    if (isset($_POST["btnHome"]))
      {
	      header("Location: index.php");
	      exit();
      }
      
      
      //註冊           
      if(isset($_POST['btnRegistered'])){
        header("Location: registered.php");
        exit();
      }
      


//   //btnOK

  if (isset($_POST["btnOK"]))
{
  while($resultem= mysql_fetch_array($resultMember)){
  if($resultem['name'] == $_POST['txtUserName'] && $resultem['password'] == $_POST['txtPassword']){
  	$UserName = $_POST["txtUserName"];
	  if (trim($UserName) != "")
  	{
  	  
  	  $_SESSION["UserName"] = $UserName;
  	  header("Location: index.php");
  	  
	  	exit();
    }
    
  }
  }echo error;
}
  

  
?>

  <html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Lab - Login</title>

</script>
    </head>
    <body>
      <form id="form1" style="font-family:DFKai-sb;" name="form1" method="post" action="login.php">
        <table width="600" border="10" align="center" cellpadding="9" cellspacing="10" bgcolor="#F2F2F2">
          <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">
              <font color="#FFFFFF">會員系統 - 登入</font>
            </td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline">帳號</td>
            <td valign="baseline"><input type="text" size="54" name="txtUserName" id="txtUserName" /></td>
          </tr>
          <tr>
            <td width="80" align="center" valign="baseline">密碼</td>
            <td valign="baseline"><input type="password" size="54" name="txtPassword" id="txtPassword" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">
              <input type="submit" name="btnOK" id="btnOK" value="登入" />
              <input type="reset" name="btnReset" id="btnReset" value="重設" />
              <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
              <input type="submit" name="btnRegistered" id="btnRegistered" value="註冊" />
            </td>
          </tr>
        </table>
      </form>
      </body>
        </html>
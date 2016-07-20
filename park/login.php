<?php

require ("config.php");
session_start();

$searchMember ="select name,password from Member";
$resultMember = mysql_query ( $searchMember, $link );

// 跳轉評論SESSION


if(isset($_GET["message"])){
  if(isset($_SESSION['UserName'])){
   header("Location: message.php");
   exit();
  }
}


if (isset($_GET["message"]))
{  $_SESSION["logi"]=$_GET["message"];
//     	   //$Surl ='Location: message.php';
    $Lurl ="onclick=\"location.href='message.php'\"";
}else{
    $Lurl ="onclick=\"location.href='index.php'\"";
    // $Surl ='Location: index.php';
}

 
 

///移除登出SESSION
      if (isset($_GET["logout"]))
      {  
          $_SESSION["UserName"]=null;
	        header("Location: index.php");
	        exit();
      }
    


//   //btnOK

      if (isset($_POST["btnOK"]))
      {
          while($resultem= mysql_fetch_array($resultMember)){
            if($_POST['txtUserName']!=0 && $_POST['txtPassword']!=0 ){
          if($resultem['name'] == $_POST['txtUserName'] && $resultem['password'] == $_POST['txtPassword'])
          {
  	         $_SESSION["UserName"] = $_POST["txtUserName"];
            if(isset($_SESSION["logi"]))
  	         {
  	                
  	                  header("Location: message.php");
  	                  exit();
  	         }
  	         else
  	         {  
  	                   header("Location: message.php");
  	  	  	          exit();
  	         }
          }
    
        }
        }
            
  	                header("Location: login.php");
  	                exit();
  	
        }
      
  
?>

  <html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <title>Login</title>
      
      <link rel="stylesheet" href="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.css" />
      <script src="jquery-1.9.1.min.js"></script>
      <script src="jquery.mobile-1.3.2/jquery.mobile-1.3.2.min.js"></script>
      
    </head>
    
    <body>
      <div data-role="page">
	    	<div data-role="content">
    <form id="form1" style="font-family:DFKai-sb;" name="form1" method="post" action="login.php">
      <table width="800" border="10" align="center" cellpadding="9" cellspacing="10" bgcolor="#F2F2F2">
        <tr>
          <td colspan="2" align="center" bgcolor="#CCCCCC">
            <font color="#333333">會員系統 - 登入</font>
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
            
            
        
            <input type="submit" name="btnOK" id="btnOK" value="登入" <?php echo $Lurl;?>/>
            <input type="reset" name="btnReset" id="btnReset" value="重設" />
            <input type="button" name="btnHome" id="btnHome" onclick="location.href='index.php'" value="回首頁" /> 
            <input type="button" name="btnRegistered" id="btnRegistered" onclick="location.href='registered.php'"  value="註冊" />
        
           
          </td>
        </tr>
      </table>
    </form>
    </div>
    </div>
    
    </body>
      </html>
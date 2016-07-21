<?php
    session_start(); 
    require_once ("config.php");
    class Seach{
        
        
    function message($link){
        
        $searchMember="select name from Message where id = '{$_SESSION['id']}' and name ='{$_SESSION['UserName']}'";
        $haveM=mysql_fetch_array(mysql_query($searchMember,$link));

        if($haveM){
            $insetrMember ="UPDATE `Message` SET `msg` = '{$_POST['message']}' , `star` ='{$_POST['rdoPet']}' WHERE `name` = '{$_SESSION['UserName']}'";
        }else{
            $insetrMember ="INSERT INTO `Message` (id, msg, name, star) VALUES ('{$_SESSION['id']}','{$_POST['message']}','{$_SESSION['UserName']}','{$_POST['rdoPet']}')";
        }
        
        return $insetrMember;
        }
    
             
    function registered(){
        
        $insetrMember ="INSERT INTO `Member` (name, password) VALUES ('{$_POST['txtmemberName']}','{$_POST['txtmemberPassword']}')";
        return $insetrMember;

    }
    
    function letterArea($link){
        
        $searchletter ="select id, area, name, summary, address, tel, payex from Park where area like '%{$_GET['letter']}%' and name like '%{$_GET['txtUse']}%'";
        $resultID = mysql_query ( $searchletter, $link );
        return $resultID;
    }
    
    function login($link){
        
        $searchMember ="select name,password from Member";
        $resultMember = mysql_query ( $searchMember, $link );
        return $resultMember;

    }
//**************************************************************seachID.php************************************************    
    function seachMname($link){
        $m ="select name from Message where id = '{$_SESSION['id']}' and name ='{$_SESSION['UserName']}'";
        $searchMemberName=mysql_query ($m,$link);
        $Mname=mysql_fetch_array($searchMemberName);
        return $Mname;
        
    }
 
    
    
    function seachID($link){
        $searchID ="select id,area, name, summary, address, tel, payex from Park where id = '{$_GET['ID']}'";
        $resultID = mysql_fetch_array(mysql_query ( $searchID, $link ));
        return $resultID;
    }
    
    
    
    
    
    
    
    }

?>
<!-- <?php

function est_connecte():bool{
if(session_status() === PHP_SESSION_NONE){
  session_start();
 }
return !empty($_SESSION['login']);
}function utilisateur_connecte():void{
    if(!est_connecte()){
        header('location:index.php');
      exit(); 
      } 
}
function user(){
  if (($_SESSION['login']==TRUE)) {
  
  }
}
?>
 -->

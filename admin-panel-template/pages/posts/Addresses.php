<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php 
//اتصال به مایاسکیوال 
$link=new PDO ("mysql:dbname=essay writing site","root","");
//mysqli_connect("localhost","root","","essay writing site");
//ادرس زخیره عکس مقاله ها 
$addres_img="../Photo/";

?>
<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php 
include("Addresses.php");
$retern_delete_no=false;
$retern_delete_yes=false;
if(isset($_GET["id"])){
    $id=intval($_GET["id"]);
    $img_name_delete=$_GET["img"];
    $delete_sql=$link->query("DELETE FROM `contents of the article` WHERE id=$id");
    unlink($addres_img.$img_name_delete);
    if($delete_sql){
        $retern_delete_yes="مقاله شماره $id  با موفقیت حذف شد ";
    }else{
        $retern_delete_no="مقاله شماره $id   حذف نشد  ";
    }
};
?>
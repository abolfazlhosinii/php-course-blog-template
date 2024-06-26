<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php 
include("Addresses.php");
//ارسال داده ها به دیتابیس 
function add($Article){
    global $link;
    $titlesql=$Article["title"];
    $namesql=$Article["name"];
    $Categorysql=$Article["Category"];
    $imgsql=$Article["img"];
    $textsql=$Article["text"];
    $updit=$Article["updit"];
    if($updit==0){
        $textquery="INSERT INTO `contents of the article`(`title`, `name`, `Category`, `img`, `text`) VALUES ('$titlesql','$namesql','$Categorysql','$imgsql','$textsql')";
        $query=$link->query($textquery);
        return $query;
    }else{
        $textquery="UPDATE `contents of the article` SET `title`='$titlesql',`name`='$namesql',`Category`='$Categorysql',`img`='$imgsql',`text`='$textsql' WHERE id=$updit";
        $query=$link->query($textquery);
        return $query;
    }
    
}   
?>
<?php  
session_start();
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php

include("link.php");
$eror_strler=false;
$upditwasadded=false;
$upditnotadded=false;
$wasadded=false;
$notadded=false;
if (isset($_POST["submit"]) ) {

    $name_trim=(isset($_POST["name"]))?trim($_POST["name"]):"";
    $name_strler=intval(strlen($name_trim));
    if($name_strler>30){
        $eror_strler="نام انتخابی شما بیشتر از 30 کلمه است ";
    }else{
        $name=$name_trim;
        if(!isset($_GET["updit"])){
            $sqliqoere=$link->query("INSERT INTO `categories`( `name`) VALUES ('$name')");
            if( $sqliqoere){$wasadded="دسته با موفقیت ایجاد  شد";}else{$notadded="مشکل در ایجاد  دسته ";}
            };
        }

        if(isset($_GET["updit"])){
                $id=$_GET["updit"];
                echo $id;
                $sqliqoere=$link->query("UPDATE `categories` SET`name`='$name' WHERE id=$id");
                if( $sqliqoere){$upditwasadded="دسته با موفقیت ویرایش  شد";}else{$upditnotadded="مشکل در ویرایش دسته ";}
        }

}

?>
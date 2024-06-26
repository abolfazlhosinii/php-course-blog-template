<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php 
include("Addresses.php");
//صحفه بندی 
$limt=5;
$page=isset($_GET['page'])?$_GET['page']:1;
$offset=($page-1)*$limt;

//گرفتن تعداد رکورد های ثبت شده در دیتابیس
$count_SQL="SELECT COUNT(*) FROM `contents of the article` WHERE 1=1 ";
$querycont=$link->query($count_SQL);
$cont=$querycont->fetch()[0];
//تعداد صفحات
$page_count=ceil($cont/$limt);


function select(){
    global $limt;
    global $offset;
    global $link;
    $queryselect="SELECT * FROM `contents of the article` WHERE 1=1 ORDER BY `id` DESC LIMIT $limt OFFSET $offset ";
    $select=$link->query($queryselect);
    $slectarry=$select->fetchAll(PDO :: FETCH_ASSOC);
    return $slectarry;
};


?>
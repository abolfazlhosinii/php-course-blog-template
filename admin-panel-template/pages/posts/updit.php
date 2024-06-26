<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<?php 
//گرفتن داده ها ی اون مقاله ای که میخواد آپدیت بشه و ریختن ان ها داخل این پوت ها 
if (isset($_GET["updit"])) {
    $linkupdit = new PDO("mysql:dbname=essay writing site", "root", "");
    $id_updit = intval($_GET["updit"]);
    $Update_details = $linkupdit->query("SELECT `title`, `name`, `Category`, `img`, `text` FROM `contents of the article` WHERE id=$id_updit");

    // استخراج داده‌ها با استفاده از fetch
    $record = $Update_details->fetch(PDO::FETCH_ASSOC);

    if ($record) {
        $updit_title = $record['title'];
        $updit_name = $record['name'];
        $updit_Category = $record['Category'];
        $updit_img = $record['img'];
        $updit_text = $record['text'];
    }
}

?>
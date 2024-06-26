<?php  
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
?>
<!-- ایمن سازی داده ها برای ارسال -->
<?php
include("ADDArticle.php");
            $title=false;
            $name=false;
            $Category=false;
            $img=false;
            $text=false;
            $erorry_size=false;
            $erorry_fili_dairectory=false;
            $Sent=false;
            $failed=false;
            if(isset($_POST['submit'])){
                $titleArticle=(isset($_POST["TitleArticle"]))?trim($_POST["TitleArticle"]):false;
                $nameArticle=(isset($_POST["Authorofthearticle"]))?trim($_POST["Authorofthearticle"]):false;
                $CategoryArticle=(isset($_POST["Articlecategories"]))?trim($_POST["Articlecategories"]):false;
                $imgArticle=$_FILES["Imageofthearticle"];
                $textArticle=(isset($_POST["Thetextofthearticle"]))?trim($_POST["Thetextofthearticle"]):false;
                //گرفتن نام نام موقت سایز و.... عکس 
                $img_name=$imgArticle['name'];
                $img_tmp_name=$imgArticle['tmp_name'];
                $img_type=$imgArticle['type'];
                $img_size=$imgArticle['size'];
                //ارور برای خالی بودن اینپوت ها 
                if($titleArticle==""){
                    $title="نام مقاله را پر کنید";
                };
                if($nameArticle==""){
                    $name=" نام نویسنده  را پر کنید";
                };
                if($img_name==""){
                    $img=" تصویر را انتخاب  نکرده اید   ";
                };
                if($textArticle==""){
                    $text="متن مقاله را پر کنید ";
                };
                //دادن ارور برای  یکتا نبودن نام  عکس و فرستادن عکس به پوشه داعمی 
                $img_beingone=file_exists($addres_img . $img_name);
                if ( $img_beingone && !$img_name=="") {
                    $erorry_fili_dairectory="نام عکس خود را تقیرر دهید";
                };
                
                if (!isset($_GET["updit"])) {
                    if(!$titleArticle=="" && !$nameArticle=="" && !$CategoryArticle=="" && !$imgArticle=="" && !$textArticle=="" && $erorry_size==false && !$img_beingone){
                        $arrarticle=["title"=>"$titleArticle","name"=>"$nameArticle","Category"=>"$CategoryArticle","img"=>"$img_name","text"=>"$textArticle","updit"=>0];
                        $sendresult=add($arrarticle);
                        if($sendresult){
                            $Sent="مقاله شما با موفقیت ثبت شد ";
                            if (!$img_name=="" && !$img_beingone ) {
                                $yes=move_uploaded_file($img_tmp_name,$addres_img . $img_name);
                            };    
                        }else{
                            $failed="مقاله شما ثبت نشد ";
                        }
                        };
                }

                if (isset($_GET["updit"])) {
                    if(!$titleArticle=="" && !$nameArticle=="" && !$CategoryArticle=="" && !$imgArticle=="" && !$textArticle=="" && $erorry_size==false && !$img_beingone){
                        $arrarticle=["title"=>"$titleArticle","name"=>"$nameArticle","Category"=>"$CategoryArticle","img"=>"$img_name","text"=>"$textArticle","updit"=>$_GET['updit']];
                        $sendresult=add($arrarticle);
                        if($sendresult){
                            $Sent="مقاله شما با موفقیت آپدیت  شد ";
                            if (!$img_name=="" && !$img_beingone ) {
                                $yes=move_uploaded_file($img_tmp_name,$addres_img . $img_name);
                            };    
                        }else{
                            $failed="مقاله شما آپدیت  نشد ";
                        }
                        };
                }
            };
            ?>
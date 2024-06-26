<?php 
//اتصال به مایاسکیوال 
session_start();
if (isset($_POST["but"])) {
    $haking_name = isset($_POST["name"]) ? $_POST["name"] : "";

    $keywords = ["mysql", "SELECT", "INSERT", "UPDATE", "DELETE"];

    foreach ($keywords as $keyword) {
        if (strpos($haking_name, $keyword) !== false) {
            header("Location:google.com")
            exit;
        }
    }
}
$yes=false;
$no=false;
$link=new PDO ("mysql:dbname=essay writing site","root","");
$admin_sleect=$link->query("SELECT * FROM `admin` WHERE 1");
$admin_sleect_name_and_password=$admin_sleect->fetchAll(PDO :: FETCH_ASSOC);
if (isset($_POST["but"])) {
    $name=(isset($_POST["name"]))?$_POST["name"]:"";
    $password=(isset($_POST["password"]))?$_POST["password"]:"";
    foreach($admin_sleect_name_and_password as $admin){
        $admun_name=$admin["name"];
        $admun_password=$admin["pasword"];
        $admun_id=$admin["id"];
        if ($name==$admun_name && $password==$admun_password) {
            $_SESSION["name"]=[$admun_name];
            $_SESSION["password"]=[$admun_password];
            $yes="خوش امدی $admun_name به پنل ادمین ";
            header("Location:../../index.php");
            
        }else{
            $no="نام یا پسورد شما اشتباه است";
        }
    }
}
?>


<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body class="auth">
                

    <main class="form-signin w-100 m-auto">
                        <?php if($yes){ ?>
                            <div class="alert alert-success" id="delete">
                                <?php echo $yes; ?>
                            </div>
                        <?php }elseif($no){ ?>
                            <div class="alert alert-danger" id="delete">
                                <?php echo $no; ?>
                            </div>
                        <?php }?>
        <form action=""  method="post">
            <div class="fs-2 fw-bold text-center mb-4">blog</div>
            <div class="mb-3">
                <label class="form-label">نام</label>
                <input type="text" name="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control" />
            </div>
            <button class="w-100 btn btn-dark mt-4" name="but" type="submit">
                ورود
            </button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
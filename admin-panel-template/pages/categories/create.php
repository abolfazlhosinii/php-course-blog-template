<?php  
session_start();
if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
    
}else{
    header("Location:../auth/login.php");
}
if (isset($_GET["session"])) {
    session_destroy();
    session_gc();
}
?>
<?php 
include("add.php");
include("updite.php");

?>
<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>blog</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <link rel="stylesheet" href="../../assets/css/style.css" />
</head>

<body>
    <header class="navbar sticky-top bg-secondary flex-md-nowrap p-0 shadow-sm">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white" href="index.html">پنل ادمین</a>

        <button class="ms-2 nav-link px-3 text-white d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">
            <i class="bi bi-justify-left fs-2"></i>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Section -->
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu">
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu"></button>
                    </div>

                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column pe-3">
                            <li class="nav-item">
                                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                    href="../../index.php">
                                    <i class="bi bi-house-fill fs-4 text-secondary"></i>
                                    <span class="fw-bold">داشبورد</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                    href="./index.php">
                                    <i class="bi bi-file-earmark-image-fill fs-4 text-secondary"></i>
                                    <span class="fw-bold">مقالات</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 text-secondary"
                                    href="../categories/index.php">
                                    <i class="bi bi-folder-fill fs-4 text-secondary"></i>

                                    <span class="fw-bold">دسته بندی</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                    href="../comments/index.php">
                                    <i class="bi bi-chat-left-text-fill fs-4 text-secondary"></i>

                                    <span class="fw-bold">کامنت ها</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                    href="../../../app-template/index.html?session=1">
                                    <i class="bi bi-box-arrow-right fs-4 text-secondary"></i>

                                    <span class="fw-bold">خروج</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <?php
                if (isset($_GET["updit"])) {
                    ?>
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="fs-3 fw-bold">ویرایش  دسته بندی</h1>
                        </div>
                    <?php
                }else{
                    ?>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="fs-3 fw-bold">ایجاد  دسته بندی</h1>
                        </div>
                    <?php
                }
                ?>
                <?php if($upditwasadded){ ?>
                    <div class="alert alert-success" id="delete">
                            <?php echo $upditwasadded; ?>
                        </div>
                    <?php }elseif($upditnotadded){ ?>
                        <div class="alert alert-danger" id="delete">
                        <?php echo $upditnotadded; ?>
                    </div>
                <?php }?>
                <?php if($wasadded){ ?>
                    <div class="alert alert-success" id="delete">
                            <?php echo $wasadded; ?>
                        </div>
                    <?php }elseif($notadded){ ?>
                        <div class="alert alert-danger" id="delete">
                        <?php echo $notadded; ?>
                    </div>
                <?php }?>
                <!-- Posts -->
                <div class="mt-4">
                    <form class="row g-4" action="create.php<?php if(isset($_GET['updit'])){ echo '?updit=' . $_GET['updit']; } ?>" method="post"  >

                        <div class="col-12 col-sm-6 col-md-4">
                            <label class="form-label" >عنوان دسته بندی</label>
                            <input type="text" class="form-control" name="name" value="<?php if(isset($_GET["updit"])){echo $name_input; }else{} ?>" />
                        </div>

                        <div class="col-12">
                        <?php
                            if (isset($_GET["updit"])) {
                        ?>
                            <button type="submit" class="btn btn-dark" name="submit">
                                ویرایش 
                            </button>
                        <?php
                            }else{
                        ?>
                            <button type="submit" class="btn btn-dark" name="submit">
                                ایجاد
                            </button>
                        <?php
                            }
                        ?>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script>
        // تابعی برای محو کردن المان پس از 5 ثانیه
        function hideElement() {
            var element = document.getElementById('delete');
            element.style.transition = 'opacity 1s ease'; // افزودن انیمیشن
            element.style.opacity = '0'; // تغییر شفافیت به صفر
            setTimeout(function() {
                element.style.display = 'none'; // مخفی کردن المان
            }, 1000); // انتظار 1 ثانیه بعد از اتمام انیمیشن
        }

        // فراخوانی تابع برای محو کردن المان پس از 5 ثانیه
        setTimeout(hideElement, 5000); // محو کردن المان پس از 5 ثانیه
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>
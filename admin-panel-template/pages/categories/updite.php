<?php 
if (isset($_GET["updit"])) {
    $linkkk=new PDO ("mysql:dbname=essay writing site","root","");
    $id_cg=$_GET["updit"];
    $select_categorie=$linkkk->query("SELECT `id`, `name` FROM `categories` WHERE id=$id_cg ");
    $slect_cg=$select_categorie->fetch(PDO :: FETCH_ASSOC);
    $name_input=$slect_cg["name"];
}

?>
<?php 
require_once './config.php';
require_once './function.php';
if (isset($_GET['mod'])) {
    extract($_GET);
    $query = $bd->query("SELECT * FROM plat where id = $mod ");
$data = $query->fetch(PDO::FETCH_OBJ);
$query = $bd->query("SELECT nom FROM categorie where id = $data->categorie_id ");
$nomcat = $query->fetch(PDO::FETCH_OBJ);
}
$query = $bd->query("SELECT * FROM categorie where id <> $data->categorie_id");
$categories = $query->fetchAll(PDO::FETCH_OBJ);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(valideArray($_POST,['nom','prix','description','temps','categorie'])){
        extract($_POST);
        $nom = strip_tags($nom);
        $prix = strip_tags($prix);
        $description = strip_tags($description);
        $temps = strip_tags($temps);
        $categorie = strip_tags($categorie);
        // if($_FILES["image"]["size"] > 1048576 && $_FILES["miniature"]["size"]){
        //     exit("fichier trop lourd (max 1MB)");
        // }
        // $finfo = new finfo(FILEINFO_MIME_TYPE);
        // $image = $finfo->file($_FILES["image"]["tmp_name"]);
        // $miniature = $finfo->file($_FILES["miniature"]["tmp_name"]);
        // // exit($mimes);
        // $image = ["image/gif","image/png","image/jpeg"];
        // $miniature = ["miniature/gif","miniature/png","miniature/jpeg"];
        // if((!in_array($_FILES["image"]["type"], $image)) && (!in_array($_FILES["miniature"]["type"], $miniature)) )
        // {
        //     exit("Type d'image invalide");
        // }
        // $imagename = $_FILES["image"]["name"];
        // $miniaturename = $_FILES["miniature"]["name"];
        //    $destinationimage = __DIR__ ."/img/" . $imagename;
        //    $destinationminiature = __DIR__ ."/img/" . $miniaturename;
        //  if ((!move_uploaded_file($_FILES["image"]["tmp_name"],$destinationimage)) || (!move_uploaded_file($_FILES["miniature"]["tmp_name"],$destinationminiature)))
        //  {
        //     exit('Un erreur est survenue');
        //  };
        //  $destinationimage = str_replace(__DIR__,'.',$destinationimage);
        //  $destinationminiature = str_replace(__DIR__,'.',$destinationminiature);
      $query = $bd->prepare("UPDATE plat SET  nom = ?,description  = ?,prix=?,temps=?,categorie_id=? WHERE id =? ");
      $update = $query->execute([$nom,$description,$prix,$temps,$categorie,$mod]);
      if ($update) {

       header('location:./plat.php');
      }
    }else {
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Admin PortoDelice</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
    <link rel="icon" href="../Home/img/logo1.png" >
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
   
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
               <a href="index.html" class="b-brand">
                <a href="index.html" class="b-brand">
                    <img src="./assets/images/logo0.png" alt="" style="border-radius:150px ;">
                  </a>
               </a>
               <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
           </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                        <a href="index.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                   
                
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="plat.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Categorie</span></a>
                    </li>
                    <li data-username="Table bootstrap datatable footable" class="nav-item active">
                        <a href="categorie.php" class="nav-link "><span class="pcoded-micon"><i class="feather icon-circle"></i></span><span class="pcoded-mtext">plat</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
            <a href="index.html" class="b-brand">
                   <div class="b-bg">
                       <i class="feather icon-trending-up"></i>
                   </div>
                   <span class="b-title">Datta Able</span>
               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="javascript:">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            
                <li>
                    <div class="dropdown drp-user">
                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                                <a href="auth-signin.html" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="javascript:" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                   
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                     
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                      
                                            <h5>Ajouter un plat</h5>
                                        </div>
                                        <div class="card-body">
                                            
                                            <form action="" method="post" enctype="multipart/form-data">
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <input type="text" name="nom" class="form-control" value="<?=$data->nom?>" aria-label="Nom" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm" >Prix &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <input type="number" value="<?=$data->prix?>" name="prix" class="form-control" aria-label="Prix" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Description &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <textarea  id="" name="description" cols="30" rows="10" class="form-control" aria-label="Prix" aria-describedby="inputGroup-sizing-sm"><?=$data->description?></textarea>
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"  id="inputGroup-sizing-sm">Temps de preparation</span>
                                                </div>
                                                <input type="time" name="temps" value="<?=$data->temps?>" class="form-control" aria-label="Prix" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Categorie &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <select name="categorie" id="" class="form-control" aria-label="Prix" value="" aria-describedby="inputGroup-sizing-sm" >
                                                    <option value="<?=$data->categorie_id?>"><?=$nomcat->nom?></option>
                                                    <?php foreach($categories as $categorie ):?>
                                                    <option value="<?=$categorie->id?>"><?=$categorie->nom?></option>
                                                    <?php endforeach?>

                                                </select>
                                            </div>
                                            <!-- <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Miniature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <input type="file" name="miniature" value="" class="form-control" aria-label="Prix" aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
                                                <input type="file" name = "image" class="form-control" value="" aria-label="Prix" aria-describedby="inputGroup-sizing-sm">
                                            </div> -->
                                            <br>
                                            <button type="submit" class="btn btn-primary mb-2">Modifier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

</body>
</html>

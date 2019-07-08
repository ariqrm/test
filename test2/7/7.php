<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "1";
$db_name = "bootcamp";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
?>
<head>
    <title>Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
        }

        .container {
            padding: 100px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">ARKADEMY BOOTCAMP</a>
            </div>
        </div>
    </nav>
    <div class="container" ng-app="">
        <p><a type="button" class="btn btn-xs btn-warning pull-right" data-toggle="modal"
                data-target="#myModalAdd">ADD</a></p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr class="active">
                    <th>Name</th>
                    <th>Hobby</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($koneksi, "SELECT `N`.`name`AS`Name`, `N`.`id`AS`ID`,`H`.`name`AS `hobby`,`K`.`name` AS `category` FROM `Nama` AS `N` JOIN `Hobi` AS `H` ON `N`.`id_hobby`=`H`.`id` JOIN `Kategori` AS `K` ON `N`.`id_category`=`K`.`id` ORDER BY `N`.`id`");
                if(mysqli_num_rows($sql) == 0){
                    echo '<tr><td colspan="4">Data Tidak Ada.</td></tr>';
                }else{
                    while($row = mysqli_fetch_assoc($sql)) {
                        echo '
                <tr>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['hobby'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>
                        <a href="?id='.$row['ID'].'" class="btn btn-link" data-toggle="modal" data-target="#myModalDel">
                            <span class="glyphicon glyphicon-trash" style="color: red">'.$row['ID'].'</span>
                        </a>
                        <a href="7.php?id='.$row['ID'].'" class="btn btn-link" data-toggle="modal" data-target="#myModalEdit">
                            <span class="glyphicon glyphicon-edit" style="color: green">'.$row['ID'].'</span>
                        </a>
                    </td>
                </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="myModalAdd" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ADD DATA</h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <center>
                            <div class="form-group">
                                <p><input type="text" maxlength="25" class="form-control" name="nama" placeholder="Name..."></p>
                                <p><select class="form-control" name="hobby" >
                                        <option disabled selected>Hobby...</option>
                                        <?php 
                                        $sql = mysqli_query($koneksi, "SELECT * FROM `Hobi` ORDER BY `id`");
                                        while($hsl = mysqli_fetch_object($sql)){?>
                                        <option value="<?=$hsl->id_category;?>-<?=$hsl->name;?>-<?=$hsl->id;?>"><?=$hsl->name;?></option>
                                        <?php } ?>
                                    </select></p>
                                <p><select class="form-control" name="category" >
                                        <option disabled selected>Category...</option>
                                        <?php
                                        $sql = mysqli_query($koneksi, "SELECT * FROM `Kategori` ORDER BY `id`");
                                        while($hsl = mysqli_fetch_object($sql)){?>
                                        <option value="<?=$hsl->id;?>-<?=$hsl->name;?>"><?=$hsl->name;?></option>
                                        <?php } ?>
                                    </select></p><br>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  name="add" class="btn btn-warning">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST['add'])){
            $nama = $_POST['nama'];
            $hoby = explode("-",$_POST['hobby']);
            $category = explode("-",$_POST['category']);
            if((empty($hoby[0])) or (empty($category[0])) or (empty($nama))){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Tidak boleh kosong!</div>';
            }elseif($hoby[0] != $category[0]){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data hoby tidak sesuai dengan kategori!</div>';
            }else{
                $sql = mysqli_query($koneksi, "INSERT INTO `Nama` VALUES (NULL, '$nama', '$hoby[2]', '$category[0]')")or die(mysqli_error());
                if($sql){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Benar.</div>';
                }
            }
        }
    ?>
    <?php
        if(isset($_GET['id'])){
            $nama = $_POST['nama'];
            $hoby = explode("-",$_POST['hobby']);
            $category = explode("-",$_POST['category']);
            if((empty($hoby[0])) or (empty($category[0])) or (empty($nama))){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Tidak boleh kosong!</div>';
            }elseif($hoby[0] != $category[0]){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data hoby tidak sesuai dengan kategori!</div>';
            }else{
                $sql = mysqli_query($koneksi, "INSERT INTO `Nama` VALUES (NULL, '$nama', '$hoby[2]', '$category[0]')")or die(mysqli_error());
                if($sql){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Benar.</div>';
                }
            }
        }
    ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="myModalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EDIT DATA</h4>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <center>
                            <div class="form-group">
                                <p><input type="text" class="form-control" id="usr" placeholder="Name..."></p>
                                <p><select class="form-control" id="sel1" >
                                        <option disabled selected>Hobby...</option>
                                        <option>Koleksi Tas</option>
                                        <option>InstaStory</option>
                                    </select></p>
                                <p><select class="form-control" id="sel1" >
                                        <option disabled selected>Category...</option>
                                        <option>Shopping</option>
                                        <option>Media Sosial</option>
                                    </select></p>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Delet -->
    <div class="modal fade" id="myModalDel" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <center>
                        <span class="glyphicon glyphicon-ok-circle" style="color: green"></span>
                        <p>Data telah berhasil dihapus.</p>
                    </center>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</body>

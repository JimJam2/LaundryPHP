<?php 
    include "header.php";
?>
<?php
    if($_SESSION['role']=='admin'){
?>
<!DOCTYPE html>
<html>  
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<style>
body {
  background-image: url('12.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body>
    
    <h3>Tambah Member</h3>
    <form action="proses_tambah_member.php"  method="post">
        Nama Member:
        <input type="text" name="nama" value= "" class="form-control">
        Gender : 
        <?php 
        $arr_gender=array('male'=>'Male','female'=>'Female');
        ?>
        <select name="jk" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$dt_member['jk']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
            <option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select>
        Alamat : 
        <textarea name="alamat" class="form-control" rows="2"></textarea>
        </select>
        No. Telepon : 
        <textarea name="tlp" class="form-control" rows="1"></textarea>
        <input type="submit" name="simpan" value="Tambah Member" class="btn btn-primary">
    </form>
    
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }
?>
<?php
    if($_SESSION['role']=='kasir'){
?>
<!DOCTYPE html>
<html>  
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<style>
body {
  background-image: url('12.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body>
    
    <h2><b>Tambah Member</b></h2>
    <form action="proses_tambah_member.php" method="post">
        Nama Member:
        <input type="text" name="nama" value= "" class="form-control">
        Gender : 
        <?php 
        $arr_gender=array('male'=>'male','female'=>'female');
        ?>
        <select name="jk" class="form-control">
            <option></option>
            <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$dt_member['jk']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
            <option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
            <?php endforeach ?>
        </select>
        Alamat : 
        <textarea name="alamat" class="form-control" rows="2"></textarea>
        </select>
        No. Telepon : 
        <textarea name="tlp" class="form-control" rows="1"></textarea>
        <input type="submit" name="simpan" value="Tambah Member" class="btn btn-primary">
    </form>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }
?>
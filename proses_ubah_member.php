<?php
    if($_POST){
        $id=$_POST['id_member'];
        $nama=$_POST['nama'];
        $alamat=$_POST['alamat'];
        $gender=$_POST['jk'];
        $tlp=$_POST['telp'];
        if(empty($nama)){
            echo "<script>alert('nama tidak boleh kosong');location.href='ubah_member.php';</script>";
        } else {
            include "koneksi.php";
            $update=mysqli_query($conn,"update member set nama='".$nama."', jk='".$gender."', alamat='".$alamat."', telp='".$tlp."' where id_member = '".$id."'") or die(mysqli_error($conn));
            echo "update member set nama='".$nama."', jk='".$gender."', alamat='".$alamat."', telp='".$tlp."' where id_member = '".$id."'";
            if($update){
                echo "<script>alert('Sukses update member');location.href='tampil_member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id=".$id."';</script>";
            }
        } 
    }
?>
<?php 
    include "header.php";
?>
<?php
    if($_SESSION['role'] == 'admin'){
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
    <h2>Histori Transaksi</h2>
        <table class="table table-hover">
            <thead style="text-align:center;">
                <th>NO</th>
                <th>Nama Member</th>
                <th>Tanggal Transaksi</th>
                <th>Batas Waktu</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Total Harga</th>
                <th>Dibayar</th>
                <th colspan="3">Aksi</th>
            </thead>
            <tbody style="text-align:center;">
                <?php 
                    include "koneksi.php";
                    $qry_histori=mysqli_query($conn,"select *,transaksi.id_transaksi AS id_transaksi from transaksi join member on transaksi.id_member = member.id_member order by transaksi.id_transaksi desc");
                    $no=0;
                    while($dt_histori=mysqli_fetch_array($qry_histori)){
                        $qry_detail=mysqli_query($conn, "select * from detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where detail_transaksi.id_transaksi = ".$dt_histori['id_transaksi']);
                        $total=0;
                        while($dt_detail=mysqli_fetch_array($qry_detail)){
                            $total+=$dt_detail['qty']*$dt_detail['harga'];
                        }

                        $no++;
                        $button_lunas="<a href='lunas.php?id=".$dt_histori['id_transaksi']."' class='btn btn-success' onclick='return confirm(\"Apakah anda yakin?\")'>Lunas</a>";
                        $button_proses="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Proses</a>";
                        $button_selesai="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Selesai</a>";
                        $button_diambil="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Diambil</a>";
                        $button_cetak="<a href='cetak.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning'>Cetak</a>";
                    ?>
                    
                <tr>
                    <td><?=$no?></td>
                    <td><?=$dt_histori['nama']?></td>
                    <td><?=$dt_histori['tgl']?></td>
                    <td><?=$dt_histori['batas_waktu']?></td>
                    <td><?=$dt_histori['tgl_bayar']?></td>
                    <td><?=$dt_histori['status']?></td>
                    <td><?=$total?></td>
                    <td><?=$dt_histori['dibayar']?></td>
                    <?php if($dt_histori['dibayar']=='belum_dibayar'){ ?>
                            <td><?=$button_lunas?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='baru'){ ?>
                            <td><?=$button_proses?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='proses'){ ?>
                            <td><?=$button_selesai?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='selesai'){ ?>
                            <td><?=$button_diambil?></td>
                    <?php        
                        }
                    ?>
                    <td><?=$button_cetak?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
    }
?>
<?php
    if($_SESSION['role'] == 'kasir'){
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
        <h2>Histori Transaksi</h2>
        <table class="table table-hover">
            <thead style="text-align:center;">
                <th>NO</th><th>Nama Member</th><th>Tanggal Transaksi</th><th>Batas Waktu</th><th>Tanggal Bayar</th><th>Status</th><th>Dibayar</th><th colspan="3">Aksi</th>
            </thead>
            <tbody style="text-align:center;">
                <?php 
                    include "koneksi.php";
                    $qry_histori=mysqli_query($conn,"select *,transaksi.id_transaksi AS id_transaksi from transaksi join member on transaksi.id_member = member.id_member order by transaksi.id_transaksi desc");
                    $no=0;
                    while($dt_histori=mysqli_fetch_array($qry_histori)){
                        $no++;
                        $button_lunas="<a href='lunas.php?id=".$dt_histori['id_transaksi']."' class='btn btn-success' onclick='return confirm(\"Apakah anda yakin?\")'>Lunas</a>";
                        $button_proses="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Proses</a>";
                        $button_selesai="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Selesai</a>";
                        $button_diambil="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Diambil</a>";
                        $button_cetak="<a href='cetak.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning'>Cetak</a>";
                    ?>
                <tr>
                    <td><?=$no?></td><td><?=$dt_histori['nama']?></td><td><?=$dt_histori['tgl']?></td><td><?=$dt_histori['batas_waktu']?></td><td><?=$dt_histori['tgl_bayar']?></td><td><?=$dt_histori['status']?></td><td><?=$dt_histori['dibayar']?></td>
                    <?php if($dt_histori['dibayar']=='belum_dibayar'){ ?>
                            <td><?=$button_lunas?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='baru'){ ?>
                            <td><?=$button_proses?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='proses'){ ?>
                            <td><?=$button_selesai?></td>
                    <?php        
                        }
                    ?>
                    <?php if($dt_histori['status']=='selesai'){ ?>
                            <td><?=$button_diambil?></td>
                    <?php        
                        }
                    ?>
                    <td><?=$button_cetak?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
    }
?>

<?php
    if($_SESSION['role'] == 'owner'){
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
        <h2>Histori Transaksi</h2>
        <table class="table table-hover">
            <thead style="text-align:center;">
                <th>NO</th>
                <th>Nama Member</th>
                <th>Tanggal Transaksi</th>
                <th>Batas Waktu</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Total Harga</th>
                <th>Dibayar</th>
                <th colspan="3">Aksi</th>
            </thead>
            <tbody style="text-align:center;">
                <?php 
                    include "koneksi.php";
                    $qry_histori=mysqli_query($conn,"select *,transaksi.id_trasnasksi AS id_transaksi from transaksi join member on transaksi.id_member = member.id_member order by transaksi.id_trasnsaki desc");
                    $no=0;
                    while($dt_histori=mysqli_fetch_array($qry_histori)){
                        $qry_detail=mysqli_query($conn, "select * from detail_transaksi join paket on paket.id=detail_transaksi.id_paket where detail_transaksi.id_transaksi = ".$dt_histori['id_transaksi']);
                        $total=0;
                        while($dt_detail=mysqli_fetch_array($qry_detail)){
                            $total+=$dt_detail['qty']*$dt_detail['harga'];
                        }

                        $no++;
                        $button_lunas="<a href='lunas.php?id=".$dt_histori['id_transaksi']."' class='btn btn-success' onclick='return confirm(\"Apakah anda yakin?\")'>Lunas</a>";
                        $button_proses="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Proses</a>";
                        $button_selesai="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Selesai</a>";
                        $button_diambil="<a href='update_transaksi.php?id=".$dt_histori['id_transaksi']."' class='btn btn-primary' onclick='return confirm(\"Apakah anda yakin?\")'>Diambil</a>";
                        $button_cetak="<a href='cetak.php?id=".$dt_histori['id_transaksi']."' class='btn btn-warning'>Cetak</a>";
                    ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$dt_histori['nama']?></td>
                    <td><?=$dt_histori['tgl']?></td>
                    <td><?=$dt_histori['batas_waktu']?></td>
                    <td><?=$dt_histori['tgl_bayar']?></td>
                    <td><?=$dt_histori['status']?></td>
                    <td><?=$total?></td>
                    <td><?=$dt_histori['dibayar']?></td>
                   
                    <td><?=$button_cetak?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php
    }
?>
<?php
$total_masuk = null;
$total_keluar = null;


$sql = $koneksi->query("select * from pembukuan");
while ($data = $sql->fetch_assoc()) {

    $jml = $data['jumlah'];

    $total_masuk = $total_masuk + $jml;


    $jml_keluar = $data['keluar'];
    $total_keluar =  $total_keluar + $jml_keluar;

    $total = $total_masuk - $total_keluar;
}

?>


<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h2>Admin Dashboard</h2>
            <h5>Pengelolaan Keeuangan</h5>
        </div>
    </div>
    <!-- /. ROW  -->
    <hr />
    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-arrow-down"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($total_masuk); ?>,-</p>
                    <p class="text-muted">Total Pemasukan</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-arrow-up"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($total_keluar); ?>,-</p>
                    <p class="text-muted">Total Pengeluaran</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="glyphicon glyphicon-th-list"></i>
                </span>
                <div class="text-box">
                    <p class="main-text"><?php echo "Rp." . number_format($total); ?>,-</p>
                    <p class="text-muted">Saldo Akhir</p>
                </div>
            </div>
        </div>
    </div>
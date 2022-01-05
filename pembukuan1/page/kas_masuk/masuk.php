<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Pemasukan
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $total = 0;
                            $no = 1;
                            $sql = $koneksi->query("select * from pembukuan where jenis ='masuk'");
                            while ($data = $sql->fetch_assoc()) {

                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode']; ?></td>
                                    <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                                    <td class="test"><?php echo $data['keterangan']; ?></td>
                                    <td align="right"><?php echo number_format($data['jumlah']) . ",-"; ?></td>
                            
                                    <td>

                                        <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode'] ?>" data-ket="<?php echo $data['keterangan'] ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah'] ?>" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>

                                        <a id="hapus_data" data-toggle="modal" data-target="#hapus" data-id="<?php echo $data['kode'] ?>" data-ket="<?php echo $data['keterangan'] ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah'] ?>" class="btn btn-danger" ><i class="fa fa-trash"></i>delete</a>

                                    </td>
                                </tr>
                            <?php
                                $total = $total + $data['jumlah'];
                            }
                            ?>
                        </tbody>
                        <tr>
                            <th colspan="4" style="text-align: center; font-size:20px">Total Pemasukan</th>
                            <td style="font-soze: 17px; text-align:right;"><?php echo "Rp" . number_format($total) . ",-"; ?></td>
                        </tr>
                    </table>
                </div>
                <!--Halaman Tambah-->

                <div class="panel-body">
                    <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                        Tambah Data
                    </button>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                                </div>
                                <div class="modal-body">

                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Input Kode" />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl" type="date" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" name="jml" type="number" />
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST['simpan'])) {

                    $kode = $_POST['kode'];
                    $ket = $_POST['ket'];
                    $tgl = $_POST['tgl'];
                    $jml = $_POST['jml'];

                    $sql = $koneksi->query("insert into pembukuan (kode,keterangan,tgl,jumlah,jenis,keluar)values('$kode','$ket','$tgl','$jml','masuk','0')");
                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Simpan Data Berhasil");
                            window.location.href = "?page=masuk";
                        </script>
                <?php
                    }
                }
                ?>

                <!--Akhir Halaman Tambah-->

                <!--Halaman Ubah-->



                <div class="panel-body">
                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                                </div>
                                <div class="modal-body" id="modal_edit">

                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket" rows="3" id="ket"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl" type="date" id="tgl" />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" name="jml" type="number" id="jml" />
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
                                </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <script src="assets/js/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#edit_data", function() {
                        var kode = $(this).data('id');
                        var ket = $(this).data('ket');
                        var tgl = $(this).data('tgl');
                        var jml = $(this).data('jml');

                        $("#modal_edit #kode").val(kode);
                        $("#modal_edit #ket").val(ket);
                        $("#modal_edit #tgl").val(tgl);
                        $("#modal_edit #jml").val(jml);


                    })
                </script>

                <?php
                if (isset($_POST['ubah'])) {

                    $kode = $_POST['kode'];
                    $ket = $_POST['ket'];
                    $tgl = $_POST['tgl'];
                    $jml = $_POST['jml'];

                    $sql = $koneksi->query("UPDATE pembukuan set
                    keterangan = '$ket',
                    tgl = '$tgl',
                    jumlah = '$jml',
                    jenis = 'masuk',
                    keluar = '0' 
                    where kode = $kode");
                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Ubah Data Berhasil");
                            window.location.href = "?page=masuk";
                        </script>
                <?php
                    }
                }
                ?>


                <!--Akir Halaman Ubah-->

                <!-- Function Hapus --> 
                <div class="panel-body">
                    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Apakah anda ingin menghapus data ini?</h4>
                                </div>
                                <div class="modal-body" id="modal_edit">

                                    <form role="form" method="POST">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="ket" rows="3" id="ket" readonly></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input class="form-control" name="tgl" type="date" id="tgl" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" name="jml" type="number" id="jml" readonly/>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <input type="submit" name="hapus" value="Hapus" class="btn btn-primary">
                                </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

                <script src="assets/js/jquery-1.10.2.js"></script>
                <script type="text/javascript">
                    $(document).on("click", "#hapus_data", function() {
                        var kode = $(this).data('id');
                        var ket = $(this).data('ket');
                        var tgl = $(this).data('tgl');
                        var jml = $(this).data('jml');

                        $("#modal_edit #kode").val(kode);
                        $("#modal_edit #ket").val(ket);
                        $("#modal_edit #tgl").val(tgl);
                        $("#modal_edit #jml").val(jml);


                    })
                </script>

                <?php
                if (isset($_POST['hapus'])) {

                    $kode = $_POST['kode'];
                    $ket = $_POST['ket'];
                    $tgl = $_POST['tgl'];
                    $jml = $_POST['jml'];

                    $sql = $koneksi->query("DELETE FROM pembukuan
                    where kode = $kode");
                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Hapus Data Berhasil");
                            window.location.href = "?page=masuk";
                        </script>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            console.log(filter)
            table = document.getElementById("dataTables-example");
            tr = table.getElementsByTagName("tr");



            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByClassName("test")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
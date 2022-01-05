<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Advanced Tables
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
                                        while ($data=$sql->fetch_assoc()){
                                    
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php  echo $no++;?></td>
                                            <td><?php echo $data ['kode'];?></td>
                                            <td><?php echo date('d F Y', strtotime( $data ['tgl']));?></td>
                                            <td><?php echo $data ['keterangan'];?></td>
                                            <td align ="right"><?php echo number_format($data ['jumlah']).",-";?></td>
                                            <td>

                                                <a href="">edit</a>
                                                <a href="">delete</a>

                                            </td>
                                        </tr>

                                        <?php
                                            $total=$total+$data['jumlah'];
                                        }
                                        ?>
                                    </tbody>
                                    <tr>
                                        <th colspan="4">Total Pemasukan</th>
                                        <td align="right"><?php echo "Rp". number_format( $total).",-";?></td>
                                    </tr>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                        </div>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTables-example");
  tr = table.getElementsByTagName("tr");
}
</script>
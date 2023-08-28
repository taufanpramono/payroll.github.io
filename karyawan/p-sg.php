<?php 

    require 'module/getdata.php';
    $id_karyawan = $_SESSION['id_karyawan'];
    $row                = get_data_slip_gaji($id_karyawan);
    $data_slip_kosong   = data_slip_kosong($id_karyawan);
    $status_nonaktif    = data_slip_kosong_karena_nonaktif($id_karyawan);

    // var_dump($row);
    // print_r($data_slip_kosong);
    // var_dump($status_nonaktif);
 ?>


 <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4>Data Slip Gaji</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Gajian</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>

                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal Gajian</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                        <?php foreach ($row as $r ) : ?>
                        <tr>
                            <td><?=  $r['tanggal_gajian'];  ?></td>
                            <td><?=  $r['total_gaji'];  ?></td> 
                            <td>
                            </i></a>
                             <a href="action/lihat-slip.php?id=<?=  $r['id_gaji'];  ?>" target="_blank" class="btn btn-info btn-circle btn-sm"><i class="fas fa-eye">
                            </i></a>
                             <a href="action/download-slip.php?id=<?=  $r['id_gaji'];  ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-download">
                            </i></a>
                            </td>
                            
                        </tr>
                        <?php endforeach; ?>
                        <?php if ($data_slip_kosong == 0) { 
                        echo "<tr><td colspan='5'><center>Data Slip Gaji Kosong<center></td></tr>"; 

                        } if ($status_nonaktif == NULL) {

                            echo "<tr><td colspan='5'><center>Anda Di Nonaktifkan<center></td></tr>";
                        }
                        ?>
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

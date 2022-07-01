<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $title_pdf?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/laporan/css/styles-cuti.css">
</head>

<body>
    <div class="row">
        <div class="col text-center mx-auto"><img src="<?php echo base_url() ?>assets/dist/img/logo-mini-gid.png" style="width: 30px;"><strong>&nbsp; PT. Global Integrasi Data</strong></div>
    </div>
    <div class="row">
        <div class="col text-center"><strong>Laporan Rekapitulasi Cuti Periode <?php echo $bulan.'-'.$tahun?></div></strong></div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan (ID)</th>
                            <th>Jabatan</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Jumlah Hari</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($laporan as $l ) :
							$id_awal = $l->ID;
							$id_karyawan = str_replace('-','',$id_awal);?>
                        <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $l->nama?> (<?php echo $id_karyawan?>)</td>
                            <td>
                                <?php if ($l->level_user == "1"){
                                                echo "Direksi";
                                            }elseif ($l->level_user == "2"){
                                                echo "HRD";
                                            }elseif ($l->level_user == "3"){
                                                echo "Finance";
                                            }elseif ($l->level_user == "4"){
                                                echo "Manager Proyek";
                                            }elseif ($l->level_user == "5"){
                                                echo "Admin";
                                            }elseif ($l->level_user == "6"){
                                                echo "Teknisi";
                                            }else {echo "WOW AMAZING";};
                                            ?>
                            </td>
                            <td><?php echo $l->tanggal_mulai?></td>
                            <td><?php echo $l->tanggal_selesai?></td>
                            <td><?php echo $l->jumlah_hari?></td>
                            <td><?php echo $l->keterangan?></td>
                        </tr>
                        <?php $no++; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
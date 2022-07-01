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
        <div class="col text-center"><strong>Laporan Rekapitulasi Reimburstment Karyawan Periode <?php echo $bulan.'-'.$tahun?></div></strong></div>
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
                            <th>Nama Pengaju</th>
                            <th>Keterangan</th>
                            <th>Nominal</th>
                            <th>Nama Project</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                return $hasil_rupiah;
                            };
                        foreach ($laporan as $l ) :?>
                        <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $l->nama?></td>
                            <td><?php echo $l->keterangan?></td>
                            <td><?php echo rupiah($l->nominal)?></td>
                            <td><?php echo $l->nama_paket?></td>
                            <td><?php echo $l->tanggal_pengajuan?></td>
                            <td><?php if ($l->status == 0){
                                                echo 'Selesai';
                                            }elseif ($l->status == 1){
                                                echo 'Proses';
                                            }else{echo "Error";};?></td>
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
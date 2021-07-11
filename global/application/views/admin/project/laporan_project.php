<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" >
    <title>laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/laporan/css/styles.css">
    <style>
        p {
            font-size: 12px;
        }
        td {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="row text-center">
        <div class="col-md-3"><img src="<?php echo base_url()?>assets/laporan/img/global-icon.png"></div>
        <div class="col-md-9 align-self-center">
            <h6>DATA PENGALAMAN PERUSAHAAN PT. GLOBAL INTEGRASI DATA</h6>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table border-spacing: -1px; cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td style="border:1px solid #000; text-align: center;" rowspan="2" valign="middle" style="border:1px solid #000; text-align: center;">
                <p>
                    <p>
                        No
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" rowspan="2" valign="middle" style="border:1px solid #000; text-align: center;">
                <p>
                    <p>
                        Nama Paket Pekerjaan
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" rowspan="2" valign="middle">
                <p>
                    <p>
                        Sub Bidang Pekerjaan
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" rowspan="2" valign="middle">
                <p>
                    <p>
                        Lokasi
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" colspan="2" valign="middle">
                <p>
                    <p>
                        Pemberi Tugas/Pejabat Pembuat Komitmen
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" colspan="2" valign="middle">
                <p>
                    <p>
                        Kontrak
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" colspan="2" valign="middle">
                <p>
                    <p>
                        Tanggal Selesai Menurut
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        Nama
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        Alamat/No. Telp
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        No. / Tanggal
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        Nilai
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        Kontrak
                    </p>
                </p>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <p>
                    <p>
                        BA. Serah Terima
                    </p>
                </p>
            </td>
        </tr>
        <tr>
            <td style="border:1px solid #000; text-align: center;" valign="middle">1
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">2
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">3
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">4
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">5
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">6
            </td>7
            <td style="border:1px solid #000; text-align: center;" valign="middle">7
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">8
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">9
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">10
            </td>
        </tr>
        <?php $no = 1;foreach ($project as $p) : ?>
            <tr>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $no?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->nama_paket?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->sub_pekerjaan?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->lokasi_pekerjaan?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->nama_ppk?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->alamat_ppk?>
            </td>7
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->nomor_kontrak?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">Rp. <?php echo $p->nilai_kontrak?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle"><?php echo $p->selesai_kontrak?>
            </td>
            <td style="border:1px solid #000; text-align: center;" valign="middle">
                <?php if ($p->serah_terima == 0){
                echo "Selesai";
                }elseif($p->serah_terima == 1){
                    echo "Proses";
                }elseif($p->serah_terima == 2){
                    echo "Ditahan";
                }else {echo "Error";};
                $no++;
                ?>
            </td>
        </tr>
            <?php endforeach?>
    </tbody>
</table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
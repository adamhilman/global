<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" >
    <title>laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/laporan/css/styles.css">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($project as $p) : ?>
                        <tr>
                            <td><?php echo $p->nama_paket?></td>
                            <td>Cell 2</td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
require '../fungsi/fungsi.php';
?>

<head>
    <title>Tabel Lulusan</title>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>

    <div class="container">
        <br>
        <a href="tabel_lulusan.php" type="button" class="btn btn-secondary">Kembali</a>
        <br>
        <h2>Tabel Lulusan</h2>

        <div class="data-tables datatable-dark">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap Lulusan</th>
                        <th>Username</th>
                        <th>NIK KTP</th>
                        <th>No Telepon</th>
                        <th>Alamat Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Mulai Latihan</th>
                        <th>Selesai Latihan</th>
                        <th>Status Akun</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $tabel_lulusan = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE role = 'Lulusan'");
                    while ($tl = mysqli_fetch_array($tabel_lulusan)) {
                        $id_user = $tl['id_user'];
                        $username = $tl['username'];
                        $nik_ktp = $tl['nik_ktp'];
                        $nama_lengkap = $tl['nama_lengkap'];
                        $kelamin = $tl['kelamin'];
                        $tempat_lahir = $tl['tempat_lahir'];
                        $tgl_lahir = $tl['tgl_lahir'];
                        $alamat = $tl['alamat'];
                        $email = $tl['email'];
                        $no_tlp = $tl['no_tlp'];
                        $password = $tl['password'];
                        $nama_perusahaan = $tl['nama_perusahaan'];
                        $status_pekerjaan = $tl['status_pekerjaan'];
                        $tgl_mulai_pelatihan = $tl['tgl_mulai_pelatihan'];
                        $tgl_selesai_pelatihan = $tl['tgl_selesai_pelatihan'];
                        $skema_pelatihan = $tl['skema_pelatihan'];
                        $role = $tl['role'];
                        $status_user = $tl['status_user'];
                    ?>



                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nama_lengkap; ?></td>
                            <td><?= $username; ?></td>
                            <td><?= $nik_ktp; ?></td>
                            <td><?= $no_tlp; ?></td>
                            <td><?= $alamat; ?></td>
                            <td><?= $kelamin; ?></td>
                            <td><?= $tgl_mulai_pelatihan; ?></td>
                            <td><?= $tgl_selesai_pelatihan; ?></td>
                            <td><?= $status_user; ?></td>
                        </tr>
                    <?php } ?>
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>
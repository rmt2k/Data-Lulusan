<?php
require_once("header.php");
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                        <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Lulusan</h6>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahlulusan">Tambah Lulusan</button>
                    <a href="export_tabel_lulusan.php" class="btn btn-info">Export Tabel Lulusan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                    <th>Nilai</th>
                                    <th>Status Akun</th>
                                    <th>Aksi</th>
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
                                    $nilai = $tl['nilai'];
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
                                        <td><?= $nilai; ?></td>
                                        <td><?= $status_user; ?></td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content">
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $id_user; ?>" type="button">Edit</button>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $id_user; ?>" type="button">Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit -->
                                    <div class="container">
                                        <!-- The Modal -->
                                        <div class="modal fade" id="edit<?= $id_user; ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Lulusan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nik_ktp" class="form-label">NIK KTP</label>
                                                                <input type="text" class="form-control" id="nik_ktp" name="nik_ktp" value="<?= $nik_ktp; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Jenis Kelamin</label>
                                                                <div class="form-label-group">
                                                                    <select class="form-control" name="kelamin">
                                                                        <option value="<?= $kelamin; ?>"><?= $kelamin; ?></option>
                                                                        <option value="Laki-laki">Laki-laki</option>
                                                                        <option value="Perempuan">Perempuan</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tempat_lahir" class="form-label">
                                                                    Tempat Lahir
                                                                </label>
                                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tempat_lahir; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal_lahir" class="form-label">
                                                                    Tanggal Lahir
                                                                </label>
                                                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">
                                                                    Alamat
                                                                </label>
                                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">
                                                                    Email
                                                                </label>
                                                                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="no_tlp" class="form-label">
                                                                    No Telepon
                                                                </label>
                                                                <input type="number" class="form-control" id="no_tlp" name="no_tlp" value="<?= $no_tlp; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">
                                                                    Password
                                                                </label>
                                                                <input type="text" class="form-control" id="password" name="password" value="<?= $password; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_perusahaan" class="form-label">
                                                                    Nama Perusahaan
                                                                </label>
                                                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $nama_perusahaan; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="status_pekerjaan" class="form-label">
                                                                    Status Pekerjaan
                                                                </label>
                                                                <input type="text" class="form-control" id="status_pekerjaan" name="status_pekerjaan" value="<?= $status_pekerjaan; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_mulai_pelatihan" class="form-label">
                                                                    Tanggal Mulai Pelatihan
                                                                </label>
                                                                <input type="date" class="form-control" id="tgl_mulai_pelatihan" name="tgl_mulai_pelatihan" value="<?= $tgl_mulai_pelatihan; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_selesai_pelatihan" class="form-label">
                                                                    Tanggal Selesai Pelatihan
                                                                </label>
                                                                <input type="date" class="form-control" id="tgl_selesai_pelatihan" name="tgl_selesai_pelatihan" value="<?= $tgl_selesai_pelatihan; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_mulai_pelatihan" class="form-label">
                                                                    Skema Pelatihan
                                                                </label>
                                                                <input type="text" class="form-control" id="skema_pelatihan" name="skema_pelatihan" value="<?= $skema_pelatihan; ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tgl_mulai_pelatihan" class="form-label">
                                                                    Nilai
                                                                </label>
                                                                <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $nilai; ?>">
                                                            </div>
                                                            <input type="hidden" name="role" value="Lulusan">
                                                            <div class="form-group">
                                                                <select class="form-control" name="status_user" id="status_user">
                                                                    <option value="<?= $status_user; ?>"><?= $status_user; ?></option>
                                                                    <option value="Aktif">Aktif</option>
                                                                    <option value="Nonaktif">Nonaktif</option>
                                                                </select>
                                                            </div>
                                                            <!-- Hidden Input -->

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" name="edit_lulusan">Submit</button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Modal Edit -->

                                    <!-- Modal Delete -->
                                    <div class="modal fade" id="hapus<?= $id_user; ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Lulusan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <h5 class="modal-title text-center">
                                                            Apakah anda yakin ingin menghapus data lulusan<br>
                                                            <b><?= $nama_lengkap; ?></b> ?
                                                        </h5>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="hapus_lulusan">Hapus</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <!-- Hidden Input -->
                                                        <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Delete -->
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- Modal Tambah Lulusan -->
    <div class="modal fade" id="tambahlulusan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Lulusan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik_ktp" class="form-label">NIK KTP</label>
                            <input type="text" class="form-control" id="nik_ktp" name="nik_ktp" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <div class="form-label-group">
                                <select class="form-control" name="kelamin" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">
                                Tempat Lahir
                            </label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tempat_lahir; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">
                                Tanggal Lahir
                            </label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">
                                Alamat
                            </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_tlp" class="form-label">
                                No Telepon
                            </label>
                            <input type="number" class="form-control" id="no_tlp" name="no_tlp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_perusahaan" class="form-label">
                                Nama Perusahaan
                            </label>
                            <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_pekerjaan" class="form-label">
                                Status Pekerjaan
                            </label>
                            <select class="form-control" name="status_user" id="status_user" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_mulai_pelatihan" class="form-label">
                                Tanggal Mulai Pelatihan
                            </label>
                            <input type="date" class="form-control" id="tgl_mulai_pelatihan" name="tgl_mulai_pelatihan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_selesai_pelatihan" class="form-label">
                                Tanggal Selesai Pelatihan
                            </label>
                            <input type="date" class="form-control" id="tgl_selesai_pelatihan" name="tgl_selesai_pelatihan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_mulai_pelatihan" class="form-label">
                                Skema Pelatihan
                            </label>
                            <input type="text" class="form-control" id="skema_pelatihan" name="skema_pelatihan" required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_mulai_pelatihan" class="form-label">
                                Nilai
                            </label>
                            <input type="text" class="form-control" id="nilai" name="nilai" required>
                        </div>
                        <input type="hidden" name="role" value="Lulusan">
                        <div class="form-group">
                            <select class="form-control" name="status_user" id="status_user" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="tambah_lulusan">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <?php
    require_once("footer.php");
    ?>
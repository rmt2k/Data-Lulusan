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
        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <?php
                            $id = $_SESSION['id_user'];
                            $tabel_laporan = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE id_user = '$id' ");
                            while ($il = mysqli_fetch_array($tabel_laporan)) {
                                $id_user = $il['id_user'];
                                $username = $il['username'];
                                $nik_ktp = $il['nik_ktp'];
                                $nama_lengkap = $il['nama_lengkap'];
                                $kelamin = $il['kelamin'];
                                $tempat_lahir = $il['tempat_lahir'];
                                $tgl_lahir = $il['tgl_lahir'];
                                $alamat = $il['alamat'];
                                $email = $il['email'];
                                $no_tlp = $il['no_tlp'];
                                $password = $il['password'];
                                $nama_perusahaan = $il['nama_perusahaan'];
                                $status_pekerjaan = $il['status_pekerjaan'];
                                $tgl_mulai_pelatihan = $il['tgl_mulai_pelatihan'];
                                $tgl_selesai_pelatihan = $il['tgl_selesai_pelatihan'];
                                $skema_pelatihan = $il['skema_pelatihan'];
                                $nilai = $il['nilai'];
                            ?>
                                <div class="row">
                                    <div class="col-lg">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><b>Data Diri</b></h1>
                                            </div>
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#ubahdatadiri<?= $id_user; ?>">Ubah Data Diri</button>
                                            <hr>
                                            <div class="col-sm">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $nama_lengkap; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Username</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $username; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>NIK KTP</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $nik_ktp; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Kelamin</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $kelamin; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Tempat Lahir</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $tempat_lahir; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Tanggal Lahir</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $tgl_lahir; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Alamat</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $alamat; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>No Telepon</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $no_tlp; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Password</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $password; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nama Perusahaan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $nama_perusahaan; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Status Pekerjaan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $status_pekerjaan; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Tanggal Mulai Latihan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $tgl_mulai_pelatihan; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Tanggal Selesai Latihan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $tgl_selesai_pelatihan; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Skema Pelatihan</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $skema_pelatihan; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Nilai</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?= $nilai; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ubah Data Diri -->
        <div class="modal fade" id="ubahdatadiri<?= $id_user; ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Diri</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_lengkap; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $username; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nik_ktp" class="form-label">NIK KTP</label>
                                <input type="text" class="form-control" id="nik_ktp" name="nik_ktp" value="<?= $nik_ktp; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Jenis Kelamin</label>
                                <div class="form-label-group">
                                    <select class="form-control" name="kelamin" required>
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
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $tempat_lahir; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">
                                    Tanggal Lahir
                                </label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $tgl_lahir; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">
                                    Alamat
                                </label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_tlp" class="form-label">
                                    No Telepon
                                </label>
                                <input type="number" class="form-control" id="no_tlp" name="no_tlp" value="<?= $no_tlp; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                </label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $password; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">
                                    Nama Perusahaan
                                </label>
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $nama_perusahaan; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Status Pekerjaan</label>
                                <div class="form-label-group">
                                    <select class="form-control" name="status_pekerjaan" required>
                                        <option value="<?= $status_pekerjaan; ?>"><?= $status_pekerjaan; ?></option>
                                        <option value="Bekerja">Bekerja</option>
                                        <option value="Belum Bekerja">Belum Bekerja</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_mulai_pelatihan" class="form-label">
                                    Tanggal Mulai Pelatihan
                                </label>
                                <input type="date" class="form-control" id="tgl_mulai_pelatihan" name="tgl_mulai_pelatihan" value="<?= $tgl_mulai_pelatihan; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_selesai_pelatihan" class="form-label">
                                    Tanggal Selesai Pelatihan
                                </label>
                                <input type="date" class="form-control" id="tgl_selesai_pelatihan" name="tgl_selesai_pelatihan" value="<?= $tgl_selesai_pelatihan; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_mulai_pelatihan" class="form-label">
                                    Skema Pelatihan
                                </label>
                                <input type="text" class="form-control" id="skema_pelatihan" name="skema_pelatihan" value="<?= $skema_pelatihan; ?>" required>
                            </div>
                            <input type="hidden" name="role" value="Lulusan">
                            <input type="hidden" name="status_user" value="Aktif">
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="edit_lulusan_user">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    <?php
    require_once("footer.php");
    ?>
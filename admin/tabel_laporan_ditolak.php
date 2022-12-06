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
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Ditolak</h6>
                    <hr>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#buatlaporan">Buat Laporan Baru</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Laporan</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Status Laporan</th>
                                    <th>File Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $tabel_laporan = mysqli_query($koneksi, "SELECT * FROM tabel_laporan WHERE status_laporan = 'Tolak' ");
                                while ($il = mysqli_fetch_array($tabel_laporan)) {
                                    $id_laporan = $il['id_laporan'];
                                    $nama_laporan = $il['nama_laporan'];
                                    $tanggal_laporan = $il['tanggal_laporan'];
                                    $status_laporan = $il['status_laporan'];
                                    $file_laporan = $il['file_laporan'];
                                    $komentar_laporan = $il['komentar_laporan'];

                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $nama_laporan; ?></td>
                                        <td><?= $tanggal_laporan; ?></td>
                                        <td><?= $status_laporan; ?></td>
                                        <td>
                                            <a href="file/<?= $file_laporan; ?>" download>Download</a>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-flex justify-content">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editlaporan<?= $id_laporan; ?>">
                                                    Perbarui
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- The Modal Edit Laporan -->
                                    <div class="modal fade" id="editlaporan<?= $id_laporan; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Laporan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_laporan" value="<?= $id_laporan; ?>">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Nama Laporan</label>
                                                            <input type="text" class="form-control" id="nama_laporan" name="nama_laporan" value="<?= $nama_laporan; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Tanggal Laporan</label>
                                                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan" value="<?= $tanggal_laporan; ?>">
                                                        </div>
                                                        <input type="hidden" name="status_laporan" value="Pending">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">File Laporan</label>
                                                            <input type="file" class="form-control" id="file_laporan" name="file_laporan" value="<?= $file_laporan; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Komentar Laporan</label>
                                                            <textarea class="form-control" name="komentar_laporan" id="komentar_laporan" rows="3" disabled><?= $komentar_laporan; ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="file_laporan_lama" value="<?= $file_laporan; ?>">
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="edit_laporan">Submit</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- The Modal Hapus Laporan -->
                                    <div class="modal fade" id="hapuslaporan<?= $id_laporan; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Modal Heading</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="post">
                                                        <h5 class="modal-title text-center">
                                                            Apakah anda yakin ingin menghapus data laporan<br>
                                                            <b><?= $nama_laporan; ?></b> ?
                                                        </h5>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="hapus_laporan">Hapus</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                        <!-- Hidden Input -->
                                                        <input type="hidden" name="id_laporan" value="<?= $id_laporan; ?>">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- Modal Buat Laporan -->
    <div class="modal fade" id="buatlaporan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Buat Laporan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Laporan</label>
                            <input type="text" class="form-control" id="nama_laporan" name="nama_laporan">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tanggal Laporan</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan">
                        </div>
                        <input type="hidden" name="status_laporan" value="Pending">
                        <div class="mb-3">
                            <label for="file_laporan" class="form-label">File Laporan</label>
                            <input type="file" class="form-control" id="file_laporan" name="file_laporan">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" name="tambah_laporan">Submit</button>
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
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
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Masuk</h6>
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
                                $tabel_laporan = mysqli_query($koneksi, "SELECT * FROM tabel_laporan WHERE status_laporan = 'Pending' ");
                                while ($il = mysqli_fetch_array($tabel_laporan)) {
                                    $id_laporan = $il['id_laporan'];
                                    $nama_laporan = $il['nama_laporan'];
                                    $tanggal_laporan = $il['tanggal_laporan'];
                                    $status_laporan = $il['status_laporan'];
                                    $file_laporan = $il['file_laporan'];

                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $nama_laporan; ?></td>
                                        <td><?= $tanggal_laporan; ?></td>
                                        <td><?= $status_laporan; ?></td>
                                        <td><a href="../admin/file/<?= $file_laporan; ?>" download>Download</a></td>
                                        <td>
                                            <center>
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#aksilaporan<?= $id_laporan; ?>">
                                                    Aksi
                                                </button>
                                            </center>
                                        </td>
                                    </tr>
                                    <!-- The Modal Aksi Laporan -->
                                    <div class="modal fade" id="aksilaporan<?= $id_laporan; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Tanggapi Laporan</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="id_laporan" value="<?= $id_laporan; ?>">
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Nama Laporan</label>
                                                            <input type="text" class="form-control" value="<?= $nama_laporan; ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">File Laporan</label>
                                                            <p class="form-control" style="background-color:#f0ecf4"><a href="../admin/file/<?= $file_laporan; ?>" download>Download</a></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="username" class="form-label">Tanggal Laporan</label>
                                                            <input type="text" class="form-control" value="<?= $tanggal_laporan; ?>" disabled>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="komentar_laporan" class="form-label">Komentar</label>
                                                            <textarea class="form-control" name="komentar_laporan" id="komentar_laporan" rows="2"></textarea>
                                                        </div>
                                                        <div class="form-group">Tanggapan
                                                            <select class="form-control" name="status_laporan" id="status_laporan">
                                                                <option value="<?= $status_laporan; ?>"><?= $status_laporan; ?></option>
                                                                <option value="Setuju">Setuju</option>
                                                                <option value="Tolak">Tolak</option>
                                                            </select>
                                                        </div>
                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="edit_laporan2">Submit</button>
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
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
    <!-- End of Main Content -->
    <?php
    require_once("footer.php");
    ?>
<?php
include "fungsi/fungsi.php";
include "fungsi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Datalulusan - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Formulir -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Register</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="username" name="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control " id="no_tlp" name="no_tlp" placeholder="Nomor Handphone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control " id="nik_ktp" name="nik_ktp" placeholder="Nomor Induk Kependudukan (NIK)" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control " id="alamat" name="alamat" placeholder="Alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="kelamin" id="kelamin" required>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control " id="password" name="password" placeholder="Password Min 8 Karakter" minlength="8" required>
                                            <input type="checkbox" onclick="liatpassword()"><small> Lihat Password</small>
                                            <script>
                                                function liatpassword() {
                                                    var x = document.getElementById("password");
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                    } else {
                                                        x.type = "password";
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <!-- Hidden Input -->
                                        <input type="hidden" value="" name="tempat_lahir">
                                        <input type="hidden" value="" name="tgl_lahir">
                                        <input type="hidden" value="" name="email">
                                        <input type="hidden" value="" name="nama_perusahaan">
                                        <input type="hidden" value="" name="status_pekerjaan">
                                        <input type="hidden" value="" name="tgl_mulai_pelatihan">
                                        <input type="hidden" value="" name="tgl_selesai_pelatihan">
                                        <input type="hidden" value="" name="skema_pelatihan">
                                        <input type="hidden" value="" name="nilai">
                                        <input type="hidden" value="Nonaktif" name="status_user">
                                        <input type="hidden" value="Lulusan" name="role">
                                        <!-- Kirim -->
                                        <button class="btn btn-primary btn-block" type="submit" name="register">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <center>
                                        <div><small><a href="index.php">Sudah memiliki akun?</a></small></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
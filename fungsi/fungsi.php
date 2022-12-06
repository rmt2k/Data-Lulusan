<?php

$koneksi = mysqli_connect("localhost", "root", "", "datalulusan");

// Fungsi Register
if (isset($_POST["register"])) {
    if (register($_POST) > 0)
        echo "<script>
                alert('Registrasi berhasil silahkan login');
                document.location.href = 'index.php';
            </script>";
    else {
        echo "<script>
        alert('Gagal');
        document.location.href = 'register.php';
    </script>";
    }
}

function register($data_register)
{
    global $koneksi;

    $username = $data_register["username"];
    $nik_ktp = $data_register["nik_ktp"];
    $nama_lengkap = $data_register["nama_lengkap"];
    $kelamin = $data_register["kelamin"];
    $tempat_lahir = $data_register["tempat_lahir"];
    $tgl_lahir = $data_register["tgl_lahir"];
    $alamat = $data_register["alamat"];
    $email = $data_register["email"];
    $no_tlp = $data_register["no_tlp"];
    $password = $data_register["password"];
    $nama_perusahaan = $data_register["nama_perusahaan"];
    $status_pekerjaan = $data_register["status_pekerjaan"];
    $tgl_mulai_pelatihan = $data_register["tgl_mulai_pelatihan"];
    $tgl_selesai_pelatihan = $data_register["tgl_selesai_pelatihan"];
    $skema_pelatihan = $data_register["skema_pelatihan"];
    $nilai = $data_register["nilai"];
    $role = $data_register["role"];
    $status_user = $data_register["status_user"];

    $query = "INSERT INTO tabel_user VALUES ('', '$username', '$nik_ktp', '$nama_lengkap', '$kelamin', '$tempat_lahir', '$tgl_lahir', '$alamat', '$email', '$no_tlp', '$password', '$nama_perusahaan', '$status_pekerjaan', '$tgl_mulai_pelatihan', '$tgl_selesai_pelatihan', '$skema_pelatihan', '$nilai', '$role', '$status_user')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Fungsi Edit Lulusan Admin
if (isset($_POST["edit_lulusan"])) {
    if (edit_lulusan($_POST) > 0)
        echo "<script>
                alert('Data Lulusan Berhasil di Ubah');
                document.location.href = '../admin/tabel_lulusan.php';
            </script>";
    else {
        echo "<script>
        alert('Gagal Mengubah Data');
    </script>";
    }
}
function edit_lulusan($edit_lulusan)
{
    global $koneksi;

    $id_user = $edit_lulusan["id_user"];

    $username = $edit_lulusan["username"];
    $nik_ktp = $edit_lulusan["nik_ktp"];
    $nama_lengkap = $edit_lulusan["nama_lengkap"];
    $kelamin = $edit_lulusan["kelamin"];
    $tempat_lahir = $edit_lulusan["tempat_lahir"];
    $tgl_lahir = $edit_lulusan["tgl_lahir"];
    $alamat = $edit_lulusan["alamat"];
    $email = $edit_lulusan["email"];
    $no_tlp = $edit_lulusan["no_tlp"];
    $password = $edit_lulusan["password"];
    $nama_perusahaan = $edit_lulusan["nama_perusahaan"];
    $status_pekerjaan = $edit_lulusan["status_pekerjaan"];
    $tgl_mulai_pelatihan = $edit_lulusan["tgl_mulai_pelatihan"];
    $tgl_selesai_pelatihan = $edit_lulusan["tgl_selesai_pelatihan"];
    $skema_pelatihan = $edit_lulusan["skema_pelatihan"];
    $nilai = $edit_lulusan["nilai"];
    $role = $edit_lulusan["role"];
    $status_user = $edit_lulusan["status_user"];

    $query = "UPDATE tabel_user SET 

    username = '$username', 
    nik_ktp = '$nik_ktp', 
    nama_lengkap = '$nama_lengkap', 
    kelamin = '$kelamin',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    alamat = '$alamat',
    email = '$email',
    no_tlp = '$no_tlp',
    password = '$password',
    nama_perusahaan = '$nama_perusahaan',
    status_pekerjaan = '$status_pekerjaan',
    tgl_mulai_pelatihan = '$tgl_mulai_pelatihan',
    tgl_selesai_pelatihan = '$tgl_selesai_pelatihan',
    skema_pelatihan = '$skema_pelatihan',
    nilai = '$nilai',
    role = '$role',
    status_user = '$status_user'
    
    WHERE id_user = '$id_user' 
    ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
// Fungsi Hapus Lulusan Admin
if (isset($_POST["hapus_lulusan"])) {

    if (hapus_lulusan($_POST) > 0)
        echo "<script>
                alert('Owner berhasil Dihapus');
                document.location.href = '../admin/tabel_lulusan.php';
            </script>";
    else {
        echo "<script>
        alert('Owner Gagal Dihapus');
        document.location.href = '../admin/tabel_lulusan.php';
    </script>";
    }
}
function hapus_lulusan($data_lulusan)
{
    global $koneksi;

    $id_user = $data_lulusan["id_user"];

    mysqli_query($koneksi, "DELETE FROM tabel_user WHERE id_user = '$id_user' ");

    return mysqli_affected_rows($koneksi);
}
// Fungsi Tambah Lulusan
if (isset($_POST["tambah_lulusan"])) {
    if (register($_POST) > 0)
        echo "<script>
                alert('Lulusan berhasil ditambahkan');
                document.location.href = '../admin/tabel_lulusan.php';
            </script>";
    else {
        echo "script>
        alert('Lulusan Gagal ditambah');
        document.location.href = '../admin/tabel_lulusan.php';
    </script>";
    }
}

function tambah_lulusan($tambah_lulusan)
{
    global $koneksi;

    $username = $tambah_lulusan["username"];
    $nik_ktp = $tambah_lulusan["nik_ktp"];
    $nama_lengkap = $tambah_lulusan["nama_lengkap"];
    $kelamin = $tambah_lulusan["kelamin"];
    $tempat_lahir = $tambah_lulusan["tempat_lahir"];
    $tgl_lahir = $tambah_lulusan["tgl_lahir"];
    $alamat = $tambah_lulusan["alamat"];
    $email = $tambah_lulusan["email"];
    $no_tlp = $tambah_lulusan["no_tlp"];
    $password = $tambah_lulusan["password"];
    $nama_perusahaan = $tambah_lulusan["nama_perusahaan"];
    $status_pekerjaan = $tambah_lulusan["status_pekerjaan"];
    $tgl_mulai_pelatihan = $tambah_lulusan["tgl_mulai_pelatihan"];
    $tgl_selesai_pelatihan = $tambah_lulusan["tgl_selesai_pelatihan"];
    $skema_pelatihan = $tambah_lulusan["skema_pelatihan"];
    $nilai = $tambah_lulusan["nilai"];
    $role = $tambah_lulusan["role"];
    $status_user = $tambah_lulusan["status_user"];

    $query = "INSERT INTO tabel_user VALUES ('', '$username', '$nik_ktp', '$nama_lengkap', '$kelamin', '$tempat_lahir', '$tgl_lahir', '$alamat', '$email', '$no_tlp', '$password', '$nama_perusahaan', '$status_pekerjaan', '$tgl_mulai_pelatihan', '$tgl_selesai_pelatihan', '$skema_pelatihan','$nilai', '$role', '$status_user')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



// Menambah Laporan Baru
if (isset($_POST["tambah_laporan"])) {
    if (tambah_laporan($_POST) > 0) {
        echo "<script>
        alert('Laporan berhasil ditambahkan');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
    } else {
        return false;
    }
}
function upload()
{
    $nama_file = $_FILES['file_laporan']['name'];
    $ukuran_file = $_FILES['file_laporan']['size'];
    $error = $_FILES['file_laporan']['error'];
    $tmp_file = $_FILES['file_laporan']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('Masukkan Laporan');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
        return false;
    }
    // Cek File Valid
    $ekstensi_valid = ['xls', 'xlsx', 'PDF'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $ekstensi_valid)) {
        echo "<script>
            alert('Format Laporan anda tidak di dukung');
            document.location.href = '../admin/tabel_laporan_pending.php';
            </script>";
        return false;
    }
    // Cek Ukuran Gambar
    if ($ukuran_file > 5000000) {
        echo "<script>
        alert('Ukuran Terlalu Besar');
        document.location.href = '../admin/tabel_laporan.php';
        </script>";
        return false;
    }
    // Generate Nama Baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    move_uploaded_file($tmp_file, 'file/' . $nama_file_baru);

    return $nama_file_baru;
}


function tambah_laporan($data_laporan)
{
    global $koneksi;

    $nama_laporan = $data_laporan['nama_laporan'];
    $tanggal_laporan = $data_laporan['tanggal_laporan'];
    $status_laporan = $data_laporan['status_laporan'];
    $file_laporan = $data_laporan['file_laporan'];
    $komentar_laporan = $data_laporan['komentar_laporan'];
    // Upload File
    $file_laporan = upload();
    if (!$file_laporan) {
        return false;
    }

    $tambah_laporan = " INSERT INTO tabel_laporan VALUES ('', '$nama_laporan', '$tanggal_laporan', '$status_laporan', '$file_laporan', '$komentar_laporan')";

    mysqli_query($koneksi, $tambah_laporan);

    return mysqli_affected_rows($koneksi);
}
// Mengubah data laporan 
if (isset($_POST["edit_laporan"])) {
    if (ubah_laporan($_POST) > 0) {
        echo "<script>
        alert('Laporan Berhasil Diubah');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Mengubah Laporan');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
    }
}

function ubah_laporan($data_laporan)
{
    global $koneksi;

    $id_laporan = $data_laporan["id_laporan"];
    $nama_laporan = $data_laporan['nama_laporan'];
    $tanggal_laporan = $data_laporan['tanggal_laporan'];
    $status_laporan = $data_laporan['status_laporan'];
    $file_laporan_lama = $data_laporan['file_laporan_lama'];

    // Cek User input file baru atau tidak
    if ($_FILES['file_laporan']['error'] === 4) {
        $file_laporan = $file_laporan_lama;
    } else {
        $file_laporan = upload();
    }


    $ubah_laporan = " UPDATE tabel_laporan SET 
    
    nama_laporan = '$nama_laporan',
    tanggal_laporan = '$tanggal_laporan',
    status_laporan = '$status_laporan',
    file_laporan = '$file_laporan'

    WHERE id_laporan = $id_laporan

    ";

    mysqli_query($koneksi, $ubah_laporan);

    return mysqli_affected_rows($koneksi);
}
// Mengubah data laporan di atasan 
if (isset($_POST["edit_laporan2"])) {
    if (ubah_laporan_atasan($_POST) > 0) {
        echo "<script>
        alert('Laporan Berhasil Diubah');
        document.location.href = '../atasan/home_atasan.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Mengubah Laporan');
        document.location.href = '../atasan/home_atasan.php';
        </script>";
    }
}

function ubah_laporan_atasan($data_laporan)
{
    global $koneksi;

    $id_laporan = $data_laporan["id_laporan"];
    $komentar_laporan = $data_laporan["komentar_laporan"];
    $status_laporan = $data_laporan["status_laporan"];

    $ubah_laporan2 = " UPDATE tabel_laporan SET 
    
    status_laporan = '$status_laporan',
    komentar_laporan = '$komentar_laporan'

    WHERE id_laporan = $id_laporan

    ";

    mysqli_query($koneksi, $ubah_laporan2);

    return mysqli_affected_rows($koneksi);
}
// Menghapus Laporan
if (isset($_POST['hapus_laporan'])) {

    $id_laporan = $_POST['id_laporan'];

    $hapus_laporan = mysqli_query($koneksi, " DELETE FROM tabel_laporan WHERE id_laporan = '$id_laporan' ");

    if ($hapus_laporan) {
        echo "<script>
        alert('Laporan Berhasil Dihapus');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Menghapus Laporan');
        document.location.href = '../admin/tabel_laporan_pending.php';
        </script>";
    }
}
// Menambah Pengumuman Baru
if (isset($_POST["tambah_pengumuman"])) {
    if (tambah_pengumuman($_POST) > 0) {
        echo "<script>
        alert('Laporan berhasil ditambahkan');
        document.location.href = '../admin/pengumuman.php';
        </script>";
    } else {
        return false;
    }
}
function upload_gambar()
{
    $nama_gambar = $_FILES['gambar']['name'];
    $ukuran_gambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_gambar = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('Masukkan Gambar');
        document.location.href = '../admin/pengumuman.php';
        </script>";
        return false;
    }
    // Cek File Valid
    $ekstensi_valid = ['jpg', 'png', 'jpeg'];
    $ekstensi_gambar = explode('.', $nama_gambar);
    $ekstensi_gambar = strtolower(end($ekstensi_gambar));
    if (!in_array($ekstensi_gambar, $ekstensi_valid)) {
        echo "<script>
            alert('Format Gambar anda tidak di dukung');
            document.location.href = '../admin/pengumuman.php';
            </script>";
        return false;
    }
    // Cek Ukuran Gambar
    if ($ukuran_gambar > 5000000) {
        echo "<script>
        alert('Ukuran Gambar Terlalu Besar');
        document.location.href = '../admin/pengumuman.php';
        </script>";
        return false;
    }
    // Generate Nama Baru
    $nama_gambar_baru = uniqid();
    $nama_gambar_baru .= '.';
    $nama_gambar_baru .= $ekstensi_gambar;

    move_uploaded_file($tmp_gambar, 'gambar/' . $nama_gambar_baru);

    return $nama_gambar_baru;
}
function tambah_pengumuman($data_pengumuman)
{
    global $koneksi;

    $judul_pengumuman = $data_pengumuman['judul_pengumuman'];
    $isi_pengumuman = $data_pengumuman['isi_pengumuman'];
    // Upload Gambar
    $gambar = upload_gambar();
    if (!$gambar) {
        return false;
    }

    $tambah_laporan = " INSERT INTO tabel_pengumuman VALUES ('', '$judul_pengumuman', '$isi_pengumuman', '$gambar')";

    mysqli_query($koneksi, $tambah_laporan);

    return mysqli_affected_rows($koneksi);
}
// Mengubah Pengumuman
if (isset($_POST["edit_pengumuman"])) {
    if (ubah_pengumuman($_POST) > 0) {
        echo "<script>
        alert('Pengumuman Berhasil Diubah');
        document.location.href = '../admin/pengumuman.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Mengubah Pengumuman');
        document.location.href = '../admin/pengumuman.php';
        </script>";
    }
}
function ubah_pengumuman($data_pengumuman)
{
    global $koneksi;

    $id_pengumuman = $data_pengumuman["id_pengumuman"];
    $judul_pengumuman = $data_pengumuman['judul_pengumuman'];
    $isi_pengumuman = $data_pengumuman['isi_pengumuman'];
    $gambar_lama = $data_pengumuman['gambar_lama'];

    // Cek User input gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = upload_gambar();
    }


    $ubah_pengumuman = " UPDATE tabel_pengumuman SET 
    
    judul_pengumuman = '$judul_pengumuman',
    isi_pengumuman = '$isi_pengumuman',
    gambar = '$gambar'

    WHERE id_pengumuman = $id_pengumuman

    ";

    mysqli_query($koneksi, $ubah_pengumuman);

    return mysqli_affected_rows($koneksi);
}
// Menghapus Pengumuman
if (isset($_POST['hapus_pengumuman'])) {

    $id_pengumuman = $_POST['id_pengumuman'];

    $hapus_pengumuman = mysqli_query($koneksi, " DELETE FROM tabel_pengumuman WHERE id_pengumuman = '$id_pengumuman' ");

    if ($hapus_pengumuman) {
        echo "<script>
        alert('Pengumuman Berhasil Dihapus');
        document.location.href = '../admin/pengumuman.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal Menghapus Pengumumuan');
        document.location.href = '../admin/pengumuman.php';
        </script>";
    }
}
// Fungsi Edit Lulusan User
if (isset($_POST["edit_lulusan_user"])) {
    if (edit_lulusan_user($_POST) > 0)
        echo "<script>
                alert('Data Lulusan Berhasil di Ubah');
                document.location.href = '../lulusan/home_lulusan.php';
            </script>";
    else {
        echo "<script>
                alert('Data Lulusan Gagal di Ubah');
                document.location.href = '../lulusan/home_lulusan.php';
            </script>";
    }
}
function edit_lulusan_user($edit_lulusan)
{
    global $koneksi;

    $id_user = $edit_lulusan["id_user"];

    $username = $edit_lulusan["username"];
    $nik_ktp = $edit_lulusan["nik_ktp"];
    $nama_lengkap = $edit_lulusan["nama_lengkap"];
    $kelamin = $edit_lulusan["kelamin"];
    $tempat_lahir = $edit_lulusan["tempat_lahir"];
    $tgl_lahir = $edit_lulusan["tgl_lahir"];
    $alamat = $edit_lulusan["alamat"];
    $email = $edit_lulusan["email"];
    $no_tlp = $edit_lulusan["no_tlp"];
    $password = $edit_lulusan["password"];
    $nama_perusahaan = $edit_lulusan["nama_perusahaan"];
    $status_pekerjaan = $edit_lulusan["status_pekerjaan"];
    $tgl_mulai_pelatihan = $edit_lulusan["tgl_mulai_pelatihan"];
    $tgl_selesai_pelatihan = $edit_lulusan["tgl_selesai_pelatihan"];
    $skema_pelatihan = $edit_lulusan["skema_pelatihan"];
    $role = $edit_lulusan["role"];
    $status_user = $edit_lulusan["status_user"];

    $query = "UPDATE tabel_user SET 

    username = '$username', 
    nik_ktp = '$nik_ktp', 
    nama_lengkap = '$nama_lengkap', 
    kelamin = '$kelamin',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    alamat = '$alamat',
    email = '$email',
    no_tlp = '$no_tlp',
    password = '$password',
    nama_perusahaan = '$nama_perusahaan',
    status_pekerjaan = '$status_pekerjaan',
    tgl_mulai_pelatihan = '$tgl_mulai_pelatihan',
    tgl_selesai_pelatihan = '$tgl_selesai_pelatihan',
    skema_pelatihan = '$skema_pelatihan',
    role = '$role',
    status_user = '$status_user'
    
    WHERE id_user = '$id_user' 
    ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

<?php 

    require_once("helper.php");
    require_once("koneksi.php");

    function register($data) {
        global $koneksi;

        $username = strtolower(stripslashes($data["username_register"]));
        $email = $data["email_register"];
        $password = mysqli_real_escape_string($koneksi, $data["password_register"]);

        // cek username sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username' ");

        
        if( mysqli_fetch_assoc($result) ) {
            echo "
                <script>
                    alert('username sudah terdaftar!')
                </script>
            ";
        }

        // return false;

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan userbaru ke database
        mysqli_query($koneksi, "INSERT INTO users VALUES('', '$username', '$email', '$password', '')");

        return mysqli_affected_rows($koneksi);
    }    


    // logic buat admin dashboard
    // Definisi fungsi untuk mengambil total berdasarkan kelas_ukm
    function getTotalByKelasUkm($conn, $kelasUkm) {
        // Menjalankan query SQL
        $sql = "SELECT SUM(CASE WHEN kelas_ukm = '$kelasUkm' THEN 1 ELSE 0 END) AS total FROM user_profiles";
        $result = mysqli_query($conn, $sql);

        // Memeriksa apakah query berhasil dijalankan
        if ($result) {
            // Mengambil hasil query
            $row = mysqli_fetch_assoc($result);

            // Mengembalikan hasil query
            return $row['total'];
        } else {
            // Menampilkan pesan kesalahan jika query gagal
            echo "Error: " . mysqli_error($conn);
            return false;
        }
    }


    // mengambil total semua profile di profile ukm
    function getTotalKelasUKM() {
        global $koneksi;
    
        // Memeriksa koneksi
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    
        // Kueri SQL
        $sql = "SELECT SUM(kelas_ukm) AS total_kelas_ukm FROM user_profiles";
        $result = mysqli_query($koneksi, $sql);
    
        // Memeriksa hasil kueri
        if (!$result) {
            die("Kesalahan kueri: " . mysqli_error($koneksi));
        }
    
        // Mengambil hasil kueri
        $row = mysqli_fetch_assoc($result);
        $totalKelasUKM = $row['total_kelas_ukm'];
    
        var_dump($totalKelasUKM);die;
        // Menutup koneksi
        mysqli_close($koneksi);
    
        return $totalKelasUKM;
    }



    // function delete
    function hapusDataById($idToDelete) {
        // Konfigurasi database
        global $koneksi;
    
        // Memeriksa koneksi
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    
        // Kueri SQL untuk menghapus baris berdasarkan ID
        $sql = "DELETE FROM user_profiles WHERE id = $idToDelete";
    
        // Menjalankan kueri
        if (mysqli_query($koneksi, $sql)) {
            echo "Baris dengan ID $idToDelete berhasil dihapus.";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        return mysqli_affected_rows($koneksi);
    }
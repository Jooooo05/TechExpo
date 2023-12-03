<?php 
$dataUser = $_SESSION["user_data"];
$dataProfile = $_SESSION["user_profile"] ?? null;
// var_dump($dataProfile);die();

require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

if( isset($_POST["simpan_profile"])) {
    $nama_lengkap = $_POST["nama_lengkap"];
    $nim = $_POST["nim"];
    $tingkat = $_POST["tingkat"];
    $fakultas = $_POST["fakultas"];
    $jurusan = $_POST["jurusan"];
    $kelas_ukm = $_POST["kelas_ukm"];

    $idUser = (int) $dataUser['id'];
    $storeNewUser = mysqli_query(
        $koneksi, 
        "INSERT INTO user_profiles (nama_lengkap, nim, tingkat, fakultas, jurusan, kelas_ukm, user_id) 
        VALUES('$nama_lengkap', '$nim', '$tingkat', '$fakultas', '$jurusan', '$kelas_ukm', $idUser)"
    );
    
    if($storeNewUser){
        $queryUserProfile = mysqli_query(
            $koneksi, 
            "SELECT * FROM user_profiles WHERE user_id = $idUser"
        );

        if(mysqli_num_rows($queryUserProfile) === 1){
            $dataProfile = mysqli_fetch_assoc($queryUserProfile);
            $_SESSION["user_profile"] = $dataProfile;
        }
        echo "Data berhasil disimpan";
    }else{
        echo "Data gagal disimpan";
    }
}
?>


<div class="px-5">


    <div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-3">
                <i class="bi bi-person-circle"></i>
        </div>
        <div class="col-md-9">
            <form action="" method="post">
                <div class="card-body">
                <!-- form -->
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" value="<?php echo htmlspecialchars($dataProfile["nama_lengkap"] ?? '') ?>" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="number" value="<?php echo htmlspecialchars($dataProfile["nim"] ?? '') ?>" name="nim" class="form-control" id="tingkat">
                    </div>
                    <div class="mb-3">
                        <label for="tingkat" class="form-label">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="form-control">
                            <option value="<?php echo htmlspecialchars($dataProfile["tingkat"] ?? '') ?>" selected>Tingkat <?php echo htmlspecialchars($dataProfile["tingkat"] ?? 'berapa') ?></option>
                            <option value="1">Tingkat 1</option>
                            <option value="2">Tingkat 2</option>
                            <option value="3">Tingkat 3</option>
                            <option value="4">Tingkat 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <input type="text" value="<?php echo htmlspecialchars($dataProfile["fakultas"] ?? '') ?>" class="form-control" name="fakultas" id="fakultas">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" value="<?php echo htmlspecialchars($dataProfile["jurusan"] ?? '') ?>" class="form-control" name="jurusan" id="jurusan">
                    </div>
                    <div class="mb-3">
                        <label for="kelas_ukm" class="form-label">Kelas UKM</label>
                        <select name="kelas_ukm" id="kelas_ukm" class="form-control">
                            <option value="<?php echo htmlspecialchars($dataProfile["nama_lengkap"] ?? '') ?>" selected>Kelas <?php echo htmlspecialchars($dataProfile["kelas_ukm"] ?? 'UKM') ?></option>
                            <option value="Web Beginner">Web Beginner</option>
                            <option value="Web Advanced">Web Advanced</option>
                            <option value="Cyber Security">Cyber Security</option>
                            <option value="Data Science">Data Science</option>
                            <option value="Multimedia">Multimedia</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Produck Manager">Produck Manager</option>
                        </select>
                    </div>
                    <!-- form -->
                </div>
                <div class="card-fotter mb-4">
                    <?php if($dataProfile) : ?>
                    <button type="submit" name="update_profile" class="btn btn-warning">Update</button>
                    <?php else : ?>
                    <button type="submit" name="simpan_profile" class="btn btn-success">Simpan</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    </div>




</div>
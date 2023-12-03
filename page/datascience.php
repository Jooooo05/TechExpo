
<?php 

require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

$result = mysqli_query($koneksi, "SELECT * FROM user_profiles WHERE kelas_ukm = 'Data Science' ");

$dataScienceTotal = getTotalByKelasUkm($koneksi, 'Data Science');
// var_dump($cyber_security);die();


?>




<h3 class="border-bottom border-secondary">
    <div class="pb-3 px-4">
        <i class="bi bi-incognito me-3"></i>DATA SCIENCE
    </div>
</h3>

<div class="px-5 mt-4">
    <div class="card">
      <div class="card-header bg-secondary text-white">
        MEMBER DATA SCIENCE
      </div>
      <div class="card-body">
        <div><span class="display-4 fw-bold me-2"><?php echo $dataScienceTotal ?? 0 ?></span><span class="display-6">member</span></div>
        <p class="card-text">ukm ITVerse is an organization under the direct supervision of the Information Technology faculty student association that can build fti students more developed by presenting the best mentors.</p>
      </div>
    </div>

    <!-- table -->
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Nim</th>
            <th scope="col">Tingkat</th>
            <th scope="col">Fakultas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Kelas UKM</th>
            <th scope="col">Kelulusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 1; ?>
            <?php while( $cyber_security = mysqli_fetch_assoc($result) ) : ?>
            <tr>
                <th scope="row"><?php echo $number ?></th>
                <td><?php echo $cyber_security["nama_lengkap"]; ?></td>
                <td><?php echo $cyber_security["nim"] ?></td>
                <td><?php echo $cyber_security["tingkat"]; ?></td>
                <td><?php echo $cyber_security["fakultas"]; ?></td>
                <td><?php echo $cyber_security["jurusan"]; ?></td>
                <td><?php echo $cyber_security["kelas_ukm"]; ?></td>
                <td><?php echo $cyber_security["kelulusan"]; ?></td>
                <td><a href="" class="btn btn-primary">edit</a> || <a href="dashboardAdmin.php?page=delete&next=datascience&id=<?php echo $web_advanced["id"]; ?>" class="btn btn-danger">delete</a></td>
            </tr>
            <?php $number++ ?>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!-- table -->
</div>
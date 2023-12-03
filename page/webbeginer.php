
<?php 

require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

$result = mysqli_query($koneksi, "SELECT * FROM user_profiles WHERE kelas_ukm = 'Web Beginner' ");

$webBeginnerTotal = getTotalByKelasUkm($koneksi, 'Web Beginner');

// var_dump($web_advanced);die();

?>

<h3 class="border-bottom border-secondary">
    <div class="pb-3 px-4">
        <i class="bi bi-backpack3-fill me-3"></i>WEB BEGINNER
    </div>
</h3>

<div class="px-5 mt-4">
    <div class="card">
      <div class="card-header bg-secondary text-white">
        MEMBER WEB BEGINNER
      </div>
      <div class="card-body">
        <div><span class="display-4 fw-bold me-2"><?php echo $webBeginnerTotal ?? 0 ?></span><span class="display-6">member</span></div>
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
            <?php while( $web_advanced = mysqli_fetch_assoc($result) ) : ?>
            <tr>
                <th scope="row"><?php echo $number ?></th>
                <td><?php echo $web_advanced["nama_lengkap"]; ?></td>
                <td><?php echo $web_advanced["nim"] ?></td>
                <td><?php echo $web_advanced["tingkat"]; ?></td>
                <td><?php echo $web_advanced["fakultas"]; ?></td>
                <td><?php echo $web_advanced["jurusan"]; ?></td>
                <td><?php echo $web_advanced["kelas_ukm"]; ?></td>
                <td><?php echo $web_advanced["kelulusan"]; ?></td>
                <td><a href="" class="btn btn-primary">edit</a> || <a href="dashboardAdmin.php?page=delete&next=webadvanced&id=<?php echo $web_advanced["id"]; ?>" class="btn btn-danger">delete</a></td>
            </tr>
            <?php $number++ ?>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!-- table -->
</div>
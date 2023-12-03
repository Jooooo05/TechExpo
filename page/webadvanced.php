<?php 


require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

$result = mysqli_query($koneksi, "SELECT * FROM user_profiles WHERE kelas_ukm = 'Web Advanced' ");

$webAdvancedTotal = getTotalByKelasUkm($koneksi, 'Web Advanced');
// var_dump($web_advanced);die();

if( isset($_POST["submit_update_user"])) {

}
?>



<h3 class="border-bottom border-secondary">
    <div class="pb-3 px-4">
        <i class="bi bi-backpack4-fill me-3"></i>WEB ADVANCED
    </div>
</h3>

<div class="px-5 mt-4">
    <div class="card">
      <div class="card-header bg-secondary text-white">
        MEMBER WEB ADVANCED
      </div>
      <div class="card-body">
        <div><span class="display-4 fw-bold me-2"><?php echo $webAdvancedTotal ?? 0 ?></span><span class="display-6">member</span></div>
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
                <td>
                    <!-- <a href="dashboardAdmin.php?page=delete&id=<?php echo $web_advanced["id"]; ?>" class="btn btn-primary">edit</a>  -->
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="openModalEditProfile('<?php echo $web_advanced["id"]; ?>')">edit</a> 
                    || 
                    <a href="dashboardAdmin.php?page=delete&next=webadvanced&id=<?php echo $web_advanced["id"]; ?>" class="btn btn-danger">delete</a>
                </td>
            </tr>
            <?php $number++ ?>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!-- table -->

    <div class="modal fade" id="modalEditDataUserProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit_update_user" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function openModalEditProfile(id){
        $('#modalEditDataUserProfile').modal('show');
    
        $.ajax({
            type: "POST",
            url: "webadvanced.php",
            data: { 
                id: id, 
                submit_update_user: true 
            },
            dataType: "json",
            success: function(response) {
                // Tanggapi respon dari server
                console.log(response);
            },
            error: function(error) {
                // Tanggapi kesalahan jika terjadi
                console.error("Error:", error);
                alert("Terjadi kesalahan saat memperbarui profil.");
            }
        });
    }

    function updateDataProfile(){
        
    }
</script>
<?php 
    $dataUser = $_SESSION["user_data"];
    $dataProfile = $_SESSION["user_profile"] ?? null;
?>



<!-- row start -->
<div class="row px-5">
    <!-- col start -->
    <div class="col-lg-4">

        <!-- icon profile -->

        <div class="card mb-3">

            <div class="display-1 m-auto">
                <i class="bi bi-person-circle"></i>
            </div>

            <div class="card-body">
                <h5 class="card-title upper"><?php echo $dataUser['username']; ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>

        </div>


        <!-- icon profile -->

        <?php 


            
        ?>
    </div>
    <!-- col end -->

    <!-- col start -->
    <div class="col-lg-8">
        <div class="card text-center">
            <div class="card-header">
                Profile
            </div>
            <div class="card-body">
                <div class="left">
                    <p></p>
                </div>
                <div class="right">

                </div>
                <?php if($dataProfile) : ?>
                <p>Nama Lengkap : <?php echo $dataProfile["nama_lengkap"] ?? '' ?></p>
                <p>NIM : <?php echo $dataProfile["nim"] ?? '' ?></p>
                <p>Tingkat : <?php echo $dataProfile["tingkat"] ?? '' ?></p>
                <p>Fakultas : <?php echo $dataProfile["fakultas"] ?? '' ?></p>
                <p>Jurusan: <?php echo $dataProfile["jurusan"] ?? '' ?></p>
                <p>Kelas UKM : <?php echo $dataProfile["kelas_ukm"] ?? '' ?></p>
                <?php else : ?>
                <p><i>Data Profile Belum Dilengkapi!</i></p>
                <?php endif; ?>
            </div>
            <div class="card-footer text-body-secondary">
                2 days ago
            </div>
        </div>
    </div>
    <!-- col end -->
</div>
<!-- row start -->
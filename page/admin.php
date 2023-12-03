<?php 

require_once("function/helper.php");
require_once("function/koneksi.php");
require_once("function/function.php");

$webAdvancedTotal = getTotalByKelasUkm($koneksi, 'Web Advanced');
$webBeginnerTotal = getTotalByKelasUkm($koneksi, 'Web Beginner');
$cyberSecurityTotal = getTotalByKelasUkm($koneksi, 'Cyber Security');
$dataScienceTotal = getTotalByKelasUkm($koneksi, 'Data Science');
$multiMediaTotal = getTotalByKelasUkm($koneksi, 'Multimedia');
$UIUX_DesignTotal = getTotalByKelasUkm($koneksi, 'UI/UX Design');
$produckManager = getTotalByKelasUkm($koneksi, 'Produck Manager');

// echo "Total Web Developer: " . $webDeveloperTotal;

$totalKelasUKM = $webAdvancedTotal + $webBeginnerTotal + $cyberSecurityTotal + $dataScienceTotal + $multiMediaTotal + $UIUX_DesignTotal + $produckManager;

?>



<h3 class="border-bottom border-secondary">
    <div class="pb-3 px-4">
        <i class="bi bi-speedometer2 me-3"></i>DASHBOARD
    </div>
</h3>

<div class="px-5 mt-4">

    <div class="card">
      <div class="card-header bg-secondary text-white">
        JUMLAH MEMBER IT VERSE
      </div>
      <div class="card-body">
        <div><span class="display-4 fw-bold me-2"><?php echo $totalKelasUKM ?? 0; ?></span><span class="display-6">member</span></div>
        <p class="card-text">ukm ITVerse is an organization under the direct supervision of the Information Technology faculty student association that can build fti students more developed by presenting the best mentors.</p>
      </div>
    </div>
    
    <div class="row justify-content-evenly">
    
        <div class="card bg-info mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-backpack4-fill me-3"></i>
                </div>
                <h5 class="card-title">WEB ADVANCED</h5>
                <div class="display-4 fw-bold"><?php echo $webAdvancedTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=webadvanced" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-success mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                <i class="bi bi-backpack3-fill me-3"></i>
                </div>
                <h5 class="card-title">WEB BEGINER</h5>
                <div class="display-4 fw-bold"><?php echo $webBeginnerTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=webbeginer" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-danger mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-incognito me-3"></i>
                </div>
                <h5 class="card-title">CYBER SECURITY</h5>
                <div class="display-4 fw-bold"><?php echo $cyberSecurityTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=cybersecurity" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-warning mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-pen-fill me-3"></i>
                </div>
                <h5 class="card-title">MULTIMEDIA</h5>
                <div class="display-4 fw-bold"><?php echo $multiMediaTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=multimedia" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-dark mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-pencil-square me-3"></i>
                </div>
                <h5 class="card-title">UI/UX DESIGN</h5>
                <div class="display-4 fw-bold"><?php echo $UIUX_DesignTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=uidesign" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-dark mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-pencil-square me-3"></i>
                </div>
                <h5 class="card-title">DATA SCIENCE</h5>
                <div class="display-4 fw-bold"><?php echo $dataScienceTotal ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=datascience" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>

        <div class="card bg-secondary mx-2 my-4" style="width: 18rem;">
            <div class="card-body text-white">
                <div class="card-body-icon">
                    <i class="bi bi-award-fill me-3"></i>
                </div>
                <h5 class="card-title">PRODUCT MANAGER</h5>
                <div class="display-4 fw-bold"><?php echo $produckManager ?? 0; ?></div>
                <a href="dashboardAdmin.php?page=manager" class="text-white">Lihat Detail<i class="bi bi-arrow-right ms-1"></i></a>
            </div>
        </div>
    
    </div>
</div>
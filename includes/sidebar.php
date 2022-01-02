        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-virus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">COVID19-TMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php if(isset($_SESSION['aid'])):?>


     <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bords</span></a>
            </li>

    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Techniciens de labo</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="ajouterTechnicien.php">Ajouter</a>
                         <a class="collapse-item" href="gererTechniciens.php">Gérer</a>
                    </div>
                </div>
            </li>


     <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-virus"></i>
                    <span>Tests</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="NewTests.php">Nouveau tests</a>
                        <a class="collapse-item" href="assignToTech.php">Affecter à un technicien</a>
                        <a class="collapse-item" href="Result.php">Rapport fourni au patient</a>
                        <a class="collapse-item" href="ToutsTest.php">Touts les tests</a>
                    </div>
                </div>
            </li>
   
<?php else:    ?>          
         
    <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                COVID19 Testing
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Testing</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-user.php">New User</a>
                        <a class="collapse-item" href="registred-user.php">Already Registered User</a>
                    </div>
                </div>
            </li>
 
<li class="nav-item active">
                <a class="nav-link" href="loginAdmin.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span></a>
            </li>
<?php endif;    ?>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
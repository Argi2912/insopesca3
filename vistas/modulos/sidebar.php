<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <p><b>INSOPESCA</b></p>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Menu Principal</li>
            
                <li class="sidebar-item  ">
                    <a href="inicio" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Inicio</span>
                    </a>
                    
                </li>

                <?php 
                    if ($_SESSION["perfil"] == "Administrador") {
                        echo '<li class="sidebar-item  ">
                                <a href="inicio" class="sidebar-link">
                                    <i data-feather="home" width="20"></i> 
                                    <span>Inicio</span>
                                </a>
                        
                             </li>';
                    }
                ?>
         
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>

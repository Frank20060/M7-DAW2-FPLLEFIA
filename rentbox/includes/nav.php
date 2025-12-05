<?php

    session_start();

    if($_SESSION['ROL']==='client'){
        echo '
        
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill me-2"></i>RentBox</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><span class="nav-link"><i class="bi bi-person-circle"></i>' . $_SESSION['NOM'] . '</span></li>
                        <li class="nav-item"><a class="nav-link" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Sortir</a></li>
                    </ul>
                </div>
            </nav>

        
        '
        ;

    }else if( $_SESSION['ROL']==='admin'){

        echo '
        
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill me-2"></i>RentBox</a>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><span class="nav-link"><i class="bi bi-person-circle"></i>  ' . $_SESSION['NOM'] . ' </span></li>
                        <li class="nav-item"><a class="nav-link" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Sortir</a></li>
                    </ul>
                </div>
            </nav>
                    
        ';
    };

    
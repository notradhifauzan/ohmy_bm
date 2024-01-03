<nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Thirteenth navbar example">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
            <a style="visibility: hidden;" class="navbar-brand col-lg-3 me-0" href="#">Centered nav</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo isAdmin() ? URLROOT.'/admins/home': URLROOT.'/students/home' ?>">Halaman Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/halaman/about">Tentang Web</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/halaman/info">Info Tambahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/halaman/contactUs">Hubungi Kami</a>
                </li>
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                <button style="visibility: hidden;" class="btn btn-primary">Button</button>
            </div>
        </div>
    </div>
</nav>
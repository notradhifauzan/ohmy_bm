<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <?php require APPROOT . '/views/student/css/style_home.php'; ?>
</head>

<body>
    <?php require APPROOT . '/views/include/navbar.php'; ?>
    <div class="navbar-no-bs">
        <img src="<?php echo URLROOT; ?>/assets/logo_n_title.svg" alt="logo Bing" />

        <div class="logout">
            <form action="<?php echo URLROOT ?>/students/logout">
                <button type="submit">
                    Logout
                </button>
            </form>

            <a href="userProfile.html">
                <img src="<?php echo URLROOT; ?>/assets/user_icon.svg" alt="user_icon" />
            </a>
        </div>
    </div>

    <div class="stu_home_p1">

        <div class="stu_home_p1_c1">
            <h1>Puncak Kreatif Bahasa</h1>
            <h2>Tingkatkan kemahiran Bahasa Melayu</h2>
            <p class="a_h_p1_p">Selamat datang ke laman web Puncak Kreatif Bahasa kami! Kami bertujuan meningkatkan kemahiran Bahasa Melayu melalui bahan pembelajaran menarik dan interaktif untuk semua peringkat umur.</p>
        </div>

        <img id="home_flat_art" src="<?php echo URLROOT; ?>/assets/home_flat_art.svg" alt="flat_art" />

    </div>

    <div class="stu_home_p2">

        <img src="<?php echo URLROOT; ?>/assets/home_flat_art2.svg" alt="flat_art" />

        <div class="home_p2_list_button">

            <a href="<?php echo URLROOT; ?>/students/darjah/1"><button>Darjah 1</button></a>

            <a href="<?php echo URLROOT; ?>/students/darjah/2"><button>Darjah 2</button></a>
            <a href="<?php echo URLROOT; ?>/students/darjah/3"><button>Darjah 3</button></a>
            <a href="<?php echo URLROOT; ?>/students/darjah/4"><button>Darjah 4</button></a>
            <a href="<?php echo URLROOT; ?>/students/darjah/5"><button>Darjah 5</button></a>
            <a href="<?php echo URLROOT; ?>/students/darjah/6"><button>Darjah 6</button></a>
        </div>

    </div>
</body>

</html>
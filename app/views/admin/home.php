<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <?php require APPROOT . '/views/admin/css/style_home.php'; ?>
</head>

<body>


    <div class="navbar">
        <div style="padding: 0 60px">
            <img src="<?php echo URLROOT; ?>/assets/logo_n_title.svg" alt="logo Bing" />
        </div>

        <div style="padding-right: 0">
            <p>Hai Cikgu</p>
            <a href="userProfile.html">
                <img src="<?php echo URLROOT; ?>/assets/user_icon.svg" alt="user_icon" style="margin-left:30px" />
            </a>
        </div>

    </div>

    <div class="adm_home_p1">

        <div class="adm_home_p1_c1">
            <h1>Puncak Kreatif Bahasa</h1>
            <h2>Tingkatkan kemahiran Bahasa Melayu</h2>
            <p class="a_h_p1_p">Selamat datang ke laman web Puncak Kreatif Bahasa kami! Kami bertujuan meningkatkan kemahiran Bahasa Melayu melalui bahan pembelajaran menarik dan interaktif untuk semua peringkat umur.</p>

            <a><button>Info Lanjut</button></a>
        </div>

        <img id="home_flat_art" src="<?php echo URLROOT; ?>/assets/home_flat_art.svg" alt="flat_art" />

    </div>

    <div class="adm_home_p2">

        <div class="home_p2_list_button">

            <a href="<?php echo URLROOT; ?>/admins/darjah/1"><button>Darjah 1</button></a>

            <a href="<?php echo URLROOT; ?>/admins/darjah/2"><button>Darjah 2</button></a>
            <a href="<?php echo URLROOT; ?>/admins/darjah/3"><button>Darjah 3</button></a>
            <a href="<?php echo URLROOT; ?>/admins/darjah/4"><button>Darjah 4</button></a>
            <a href="<?php echo URLROOT; ?>/admins/darjah/5"><button>Darjah 5</button></a>
            <a href="<?php echo URLROOT; ?>/admins/darjah/6"><button>Darjah 6</button></a>
        </div>

        <img src="<?php echo URLROOT; ?>/assets/home_part2.svg" alt=home__p2>

    </div>
</body>

</html>
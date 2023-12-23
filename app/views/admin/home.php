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
        <a href="userProfile.html">
            <!-- Radhi: span user_name will dynamically changed based on user -->
            <p>Hai ${user_name}</p>
        </a>
        <a href="userProfile.html">
            <!-- Radhi: This is for user image ; If hardcoded > write hardcoded in src -->
            <img src="" alt="user_icon" />
        </a>
    </div>

    <h1>Halaman Utama</h1>

    <button><a href="<?php echo URLROOT; ?>/admins/darjah/1">Darjah 1</a></button>
    <button><a href="<?php echo URLROOT; ?>/admins/darjah/2">Darjah 2</a></button>
    <button><a href="<?php echo URLROOT; ?>/admins/darjah/3">Darjah 3</a></button>
    <button><a href="<?php echo URLROOT; ?>/admins/darjah/4">Darjah 4</a></button>
    <button><a href="<?php echo URLROOT; ?>/admins/darjah/5">Darjah 5</a></button>
    <button><a href="<?php echo URLROOT; ?>/admins/darjah/6">Darjah 6</a></button>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>
        Project
    </title>
    <meta charset="UTF-8">
    <meta name="description" contents="About CM Cawley Biography website in PHP">
    <?php require APPROOT . '/views/admin/css/style_login.php'; ?>

    <style>
        body {
            background: url('<?php echo URLROOT; ?>/assets/bg-login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div style="position: absolute; left: 100px ">
            <img src="<?php echo URLROOT; ?>/assets/logo_n_title.svg" alt="logo Bing" />
        </div>
    </div>

    <div class="login-div">
        <img src="" alt="img" class="avatar">

        <p>Daftar Bersama Kami</p>

        <form action="<?php echo URLROOT ?>/students/register" method="POST">
            <div class="formcontainer">
                <label for="username">
                    New Username
                </label>
                <input value="<?php echo $data['username'] ?>" type="text" placeholder="enter username" name="username" required>
                <?php if (!empty($data['username_err'])) : ?>
                    <span style="color: red"><?php echo $data['username_err']; ?></span><br>
                <?php endif ?>

                <!--  -->
                <label for="email">
                    Email
                </label>
                <input value="<?php echo $data['email'] ?>" type="text" placeholder="enter email" name="email" required>
                <?php if (!empty($data['email_err'])) : ?>
                    <span style="color: red"><?php echo $data['email_err']; ?></span><br>
                <?php endif ?>

                <label for="password">
                    New Password
                </label>
                <input value="<?php echo $data['password'] ?>" type="password" placeholder="enter password" name="password" required>
                <!-- Radhi: Wrong pass or both, can choose, DELETE one-->
                <?php if (!empty($data['password_err'])) : ?>
                    <span style="color: red"><?php echo $data['password_err']; ?></span>
                <?php endif ?>

                <!-- Irfan : bila user salah key in tak sama password dgn yang atas keluar error -->
                <label for="confirm_password">
                    Confirm Password
                </label>
                <input value="<?php echo $data['confirm_password'] ?>" type="password" placeholder="confirm password" name="confirm_password" required>
                <?php if (!empty($data['confirm_password_err'])) : ?>
                    <span style="color: red"><?php echo $data['confirm_password_err']; ?></span>
                <?php endif ?>

                <div class="buttoncontainer">
                    <button type="submit">Register</button>
                    <div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
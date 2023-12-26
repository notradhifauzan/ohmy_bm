<!DOCTYPE html>
<html>

<head>
    <title>
        Project
    </title>
    <meta charset="UTF-8">
    <meta name="description" contents="About CM Cawley Biography website in PHP">
    <?php require APPROOT . '/views/admin/css/style_login.php'; ?>
</head>

<body>

    <div class="navbar">
        <img src="<?php echo URLROOT; ?>/assets/logo_n_title.svg" alt="logo Bing" />
    </div>

    <div class="login-content">
        <div class="login_div">

            <div class="change_user">
                <a href="<?php echo URLROOT; ?>/students/login/">
                    <div class="c_u1">
                        Students
                    </div>
                </a>
                <a href="<?php echo URLROOT; ?>/admins/login/">
                    <div class="c_u2">
                        Admin
                    </div>
                </a>
            </div>

            <svg id='user-hexagon_48' width='48' height='48' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <rect width='48' height='48' stroke='none' fill='#000000' opacity='0' />
                <g transform="matrix(2 0 0 2 24 24)">
                    <g>
                        <g transform="matrix(1 0 0 1 0 0)">
                            <path style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 0 0 L 24 0 L 24 24 L 0 24 z" stroke-linecap="round" />
                        </g>
                        <g transform="matrix(1 0 0 1 0 -2)">
                            <path style="stroke: #E7ECEF; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -10)" d="M 12 13 C 13.65685424949238 13 15 11.65685424949238 15 10 C 15 8.34314575050762 13.65685424949238 7 12 7 C 10.34314575050762 7 9 8.34314575050762 9 10 C 9 11.65685424949238 10.34314575050762 13 12 13 z" stroke-linecap="round" />
                        </g>
                        <g transform="matrix(1 0 0 1 0 5.37)">
                            <path style="stroke: #E7ECEF; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -17.37)" d="M 6.201 18.744 C 6.742857141949237 17.105618722737415 8.274340110698947 15.999435709773687 9.999999999999998 16 L 14 16 C 15.724493877091748 15.999438894662836 17.25521561473809 17.104154082363895 17.798000000000002 18.741" stroke-linecap="round" />
                        </g>
                        <g transform="matrix(1 0 0 1 0 0)">
                            <path style="stroke: #E7ECEF; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 19.875 6.27 C 20.575 6.667999999999999 21.005 7.412999999999999 21 8.218 L 21 15.501999999999999 C 21 16.311 20.557 17.057 19.842 17.45 L 13.091999999999999 21.72 C 12.411882501252219 22.093408414000628 11.588117498747778 22.093408414000628 10.907999999999998 21.72 L 4.157999999999998 17.45 C 3.4454657079287827 17.06061105115846 3.001631886508296 16.313989044140232 2.9999999999999982 15.501999999999999 L 2.999999999999998 8.216999999999999 C 2.999999999999998 7.407999999999999 3.442999999999998 6.6629999999999985 4.157999999999998 6.269999999999999 L 10.907999999999998 2.2899999999999987 C 11.608303952759652 1.9038806638860972 12.457696047240344 1.9038806638860974 13.157999999999998 2.2899999999999987 L 19.907999999999998 6.269999999999999 L 19.874999999999996 6.269999999999999 z" stroke-linecap="round" />
                        </g>
                    </g>
                </g>
            </svg>

            <h2>Selamat Kembali</h2>

            <form action="<?php echo URLROOT ?>/admins/login" method="POST">
                <div class="form_container">
                    <div class="input">

                        <svg id='user-square_48' width='36' height='36' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='48' height='48' stroke='none' fill='#' opacity='0' />

                            <g transform="matrix(2 0 0 2 24 24)">
                                <g>
                                    <g transform="matrix(1 0 0 1 0 0)">
                                        <path style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 0 0 L 24 0 L 24 24 L 0 24 z" stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.63 -2.63)">
                                        <path style="stroke: rgb(5,5,5); stroke-width: 0.75; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -10)" d="M 9 10 C 9 11.65685424949238 10.34314575050762 13 12 13 C 13.65685424949238 13 15 11.65685424949238 15 10 C 15 8.34314575050762 13.65685424949238 7 12 7 C 10.34314575050762 7 9 8.343145750507619 9 10" stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.63 5.88)">
                                        <path style="stroke: rgb(5,5,5); stroke-width: 0.75; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -18.5)" d="M 6 21 L 6 20 C 6 17.790861000676827 7.790861000676826 16 10 16 L 14 16 C 16.209138999323173 16 18 17.790861000676827 18 20 L 18 21" stroke-linecap="round" />
                                    </g>

                                </g>
                            </g>
                        </svg>

                        <input value="<?php echo $data['username'] ?>" type="text" placeholder="Masukkan nama pengguna anda" name="username" required>
                    </div>
                    <?php if (!empty($data['username_err'])) : ?>
                        <span style="color: red"><?php echo $data['username_err']; ?></span><br>
                    <?php endif ?>

                    <div class="input">
                        <svg id='lock_48' width='32' height='32' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='48' height='48' stroke='none' fill='#000000' opacity='0' />
                            <g transform="matrix(2 0 0 2 24 24)">
                                <g>
                                    <g transform="matrix(1 0 0 1 0 0)">
                                        <path style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -12)" d="M 0 0 L 24 0 L 24 24 L 0 24 z" stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.63 3.38)">
                                        <rect style="stroke: rgb(0,0,0); stroke-width: 0.75; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" x="-7" y="-5" rx="2" ry="2" width="14" height="10" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.63 3.38)">
                                        <circle style="stroke: rgb(0,0,0); stroke-width: 0.75; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" cx="0" cy="0" r="1" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.63 -5.63)">
                                        <path style="stroke: rgb(0,0,0); stroke-width: 0.75; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -7)" d="M 8 11 L 8 7 C 8 4.790861000676826 9.790861000676827 3 12 3 C 14.209138999323173 3 16 4.790861000676825 16 6.999999999999999 L 16 11" stroke-linecap="round" />
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <input value="<?php echo $data['password'] ?>" type="password" placeholder="Masukkan kata kunci" name="password" required>
                    </div>

                    <?php if (!empty($data['password_err'])) : ?>
                        <span style="color: red"><?php echo $data['password_err']; ?></span>
                    <?php endif ?>

                    <button type="submit">Login</button>

                </div>
            </form>
        </div>
    </div>
</body>

</html>
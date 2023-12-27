<!-- REAL ENGINEERS UNDERSTAND ABSTRACTION! -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Topik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require APPROOT . '/views/student/css/style_darjahDetails.php'; ?>

</head>

<body>
    <?php flash('post_failed'); ?>
    <?php flash('post_success'); ?>
    <div class="navbar-non-bs">
        <img src="<?php echo URLROOT ?>/assets/logo.jpg" alt="img" height="50">
        <h1 style="margin: 0 20px;">Bahan Pembelajaran</h1>
        <div class="tahun_head_container">
            <h1 name="darjah_id">Tahun <?php echo $data['darjahId']; ?></h1>
        </div>
    </div>

    <div class="tahun_details">
        <h2>Silibus Darjah <?php echo $data['darjahId']; ?></h2>
        <div class="t_d_p1_c">

            <div class="t_d_p1_c1">



                <?php if (!empty($data['file'])) : ?>
                    <div class="">

                        <?php if (!empty($data['file'])) : ?>
                            <div>
                                <?php if (isset($data['file_name'])) : ?>
                                    <p><?php echo $data['file_name']; ?></p>
                                <?php else : ?>
                                    <p>File Name Not Available</p>
                                <?php endif; ?>

                                <a role="button" href="<?php echo URLROOT; ?>/students/downloadTextbook/<?php echo $data['darjahId']; ?>">
                                    <embed width="50%" height="50%" /><button type="submit">Muat Turun</button>
                                </a>
                            </div>
                        <?php endif; ?>


                    </div>
                <?php endif; ?>

                <?php if (empty($data['file'])) : ?>
                    <h4>Buku Teks Tiada</h4>
                    <?php if (!empty($data['fileName_err'])) : ?>
                        <span style="color: red">*<?php echo $data['fileName_err']; ?></span><br>
                    <?php endif ?>
                <?php endif; ?>


            </div>


            <div class="t_d_p1_c2">
                <textarea cols="65" rows="10" readonly><?php echo $data['summary']; ?></textarea>
            </div>

        </div>


        <div class="ic_bottom">
            <svg id='Double_Down_48' width='48' height='48' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <rect width='48' height='48' stroke='none' fill='#000000' opacity='0' />
                <g transform="matrix(1.05 0 0 1.05 24 24)">
                    <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25.7)" d="M 44.988281 7.984375 C 44.726563 7.992188 44.476563 8.101563 44.292969 8.292969 L 25 27.585938 L 5.707031 8.292969 C 5.519531 8.097656 5.261719 7.992188 4.992188 7.992188 C 4.582031 7.992188 4.21875 8.238281 4.0625 8.613281 C 3.910156 8.992188 4 9.421875 4.292969 9.707031 L 25 30.414063 L 45.707031 9.707031 C 46.003906 9.421875 46.09375 8.980469 45.9375 8.601563 C 45.777344 8.222656 45.402344 7.976563 44.988281 7.984375 Z M 44.988281 20.984375 C 44.726563 20.992188 44.476563 21.101563 44.292969 21.292969 L 25 40.585938 L 5.707031 21.292969 C 5.519531 21.097656 5.261719 20.992188 4.992188 20.988281 C 4.582031 20.992188 4.21875 21.238281 4.0625 21.613281 C 3.910156 21.992188 4 22.421875 4.292969 22.707031 L 25 43.414063 L 45.707031 22.707031 C 46.003906 22.421875 46.09375 21.980469 45.9375 21.601563 C 45.777344 21.222656 45.402344 20.976563 44.988281 20.984375 Z" stroke-linecap="round" />
                </g>
            </svg>
        </div>

        <div class="t_d_p2">
            <h2>Senarai Bahan Pembelajaran</h2>
            <div class="grid_x_note_list">

                <?php foreach ($data['topicList'] as $topic) : ?>

                    <div class="topic_card">
                        <h2><?php echo $topic->topicName; ?></h2>

                        <p class="x_note_desc"><?php echo $topic->summary; ?></p>
                        <a href="<?php echo URLROOT; ?>/students/downloadNotes/<?php echo $topic->topicId; ?>">
                            <button>Muat Turun</button>
                        </a>

                        <p style="font-style: italic; font-size: 0.7rem" class="date">dimuat naik pada: <strong><?php echo dateConverter($topic->date_posted) ?></strong></p>
                    </div>

                <?php endforeach ?>



            </div>
        </div>

        <!-- Div send comment -->
        <div class="t_d_p3">

            <form action="<?php echo URLROOT; ?>/students/addFeedbacks/<?php echo $data['darjahId']; ?>" method="POST">
                <h2>Maklum balas</h2>
                <div class="form_content">
                    <div class="avatar"></div>
                    <input type="text" name="feedback" placeholder="Add a comment..">
                    <button type="submit">Hantar</button>
                </div>
            </form>


            <div class="div_comments">
                <?php foreach ($data['feedbacks'] as $feedbacks) : ?>

                    <div class="cmt_container">
                        <div class="cmt_user">
                            <div class="avatar"></div>
                            <div class="cmt_username" name="">
                                dari
                                <?php echo $feedbacks->username ?>
                                |
                                <?php echo getTimeInterval($feedbacks->date_created); ?>
                            </div>
                        </div>

                        <p type="cmt_text" placeholder="Add a comment.." class="comment-input"><?php echo $feedbacks->post; ?></p>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>


    <div class="rtn_btn">
        <a href="<?php echo URLROOT; ?>/students/home">
            <button>Kembali Ke Halaman Utama</button>
        </a>

    </div>

</body>

</html>
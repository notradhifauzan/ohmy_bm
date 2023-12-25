<!-- REAL ENGINEERS UNDERSTAND ABSTRACTION! -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Topik</title>
    <?php require APPROOT . '/views/student/css/style_darjahDetails.php'; ?>

</head>

<body>
    <div class="navbar">
        <img src="<?php echo URLROOT ?>/assets/logo.jpg" alt="img">
        <h1 style="margin: 0 20px;">Bahan Pembelajaran</h1>
        <div class="tahun_head_container">
            <h1 name="darjah_id">Tahun <?php echo $data['darjahId']; ?></h1>
        </div>
    </div>

    <div class="tahun_details">
        <h2>Silibus Darjah <?php echo $data['darjahId']; ?></h2>
        <div class="t_d_p1_c">
            <div class="t_d_p1_c1">
                <!-- Dekat sini student boleh download and preview -->

                <?php if (!empty($data['file'])) : ?>
                    <div class="">

                        <?php if (!empty($data['file'])) : ?>
                            <div>
                                <?php if (isset($data['file_name'])) : ?>
                                    <p><?php echo $data['file_name']; ?></p>
                                <?php else : ?>
                                    <p>File Name Not Available</p>
                                <?php endif; ?>

                                <a role="button" href="<?php echo URLROOT; ?>/admins/downloadSOW/<?php echo $data['darjahId']; ?>">
                                    <embed width="50%" height="50%" /><button type="submit">Muat Turun</button>
                                </a>
                            </div>
                        <?php endif; ?>


                    </div>
                <?php endif; ?>

                <?php if (empty($data['file'])) : ?>
                    <h4>Tiada buku teks dimuat naik</h4>
                    <?php if (!empty($data['fileName_err'])) : ?>
                        <span style="color: red">*<?php echo $data['fileName_err']; ?></span><br>
                    <?php endif ?>
                    </form>
                <?php endif; ?>
            </div>


            <div class="t_d_p1_c2">
                <textarea cols="65" rows="10" readonly>
                        <?php echo $data['summary']; ?>
                </textarea>
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

        <h2>Senarai Nota Tambahan</h2>
        <div class="t_d_p1_c">

            <div class="grid_topic_list">

                <?php foreach ($data['topicList'] as $topic) : ?>
                    <div class="button-to-topic">
                        <a href=""><button><?php echo $topic->topicName; ?>
                            </button></a>
                    </div>

                <?php endforeach ?>

            </div>
        </div>

        <div class="t_d_p1_c">
            <div class="container_1">
                <div class="comment-container">
                    <form action="<?php echo URLROOT; ?>/students/addFeedbacks/<?php echo $data['darjahId']; ?>" method="POST">
                        <div class="avatar"></div>
                        <input type="text" name="feedback" placeholder="Add a comment.." class="comment-input">
                        <button type="submit" class="comment-button">
                            <p class="text">Add comment</p>
                        </button>
                    </form>
                </div>
            </div>
            <?php foreach ($data['feedbacks'] as $feedbacks) : ?>
                <div class="grid_topic_list_1">
                    <div class="container">
                        <div class="comment-container">
                            <div class="avatar"></div>
                            <div class="username" name="">dari <?php echo $feedbacks->username ?> | <?php echo getTimeInterval($feedbacks->date_created); ?></div>
                            <p type="text" placeholder="Add a comment.." class="comment-input"><?php echo $feedbacks->post; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
        </div>
    </div>
    <div class="rtn_btn">
        <a href="<?php echo URLROOT; ?>/students/home">
            <button>Kembali Ke Halaman Utama </button>
        </a>

    </div>
</body>

</html>
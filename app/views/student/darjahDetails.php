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
        <h2>Buku Teks</h2>
        <div class="t_d_p1_c">
            <div class="t_d_p1_c1">
                <!-- Tambah summary buku text, buat muat turun button utk buku text, preview buku text -->

                <?php if (empty($data['file'])) : ?>
                    <form action="<?php echo URLROOT; ?>/admins/uploadSOW/<?php echo $data['darjahId']; ?>" method="POST" enctype="multipart/form-data">

                        <label for="nota-tambahan">

                            <div class="ic_upload">
                                <svg id='Upload_to_the_Cloud_48' width='48' height='48' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                    <rect width='48' height='48' stroke='none' fill='#555' opacity='0' />

                                    <g transform="matrix(0.88 0 0 0.88 24 24)">
                                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,5,5); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -24.5)" d="M 20 8 C 13.539063 8 8.367188 13.109375 8.09375 19.5 C 3.417969 20.777344 0 24.996094 0 30 C 0 36.046875 4.953125 41 11 41 L 41 41 C 45.945313 41 50 36.945313 50 32 C 50 28.101563 47.402344 24.792969 43.90625 23.625 C 43.695313 17.761719 38.910156 13 33 13 C 31.960938 13 30.992188 13.257813 30.03125 13.53125 C 27.882813 10.261719 24.21875 8 20 8 Z M 20 10 C 23.726563 10 26.992188 12.09375 28.71875 15.09375 L 29.15625 15.8125 L 29.9375 15.53125 C 30.9375 15.167969 31.910156 15 33 15 C 37.953125 15 42 19.046875 42 24 L 42 25.09375 L 42.78125 25.28125 C 45.714844 25.972656 48 28.769531 48 32 C 48 35.855469 44.855469 39 41 39 L 11 39 C 6.046875 39 2 34.953125 2 30 C 2 25.671875 5.058594 21.996094 9.1875 21.1875 L 10 21.03125 L 10 20 C 10 14.433594 14.433594 10 20 10 Z M 25 18.59375 L 24.28125 19.28125 L 18.28125 25.28125 L 19.71875 26.71875 L 24 22.4375 L 24 34 L 26 34 L 26 22.4375 L 30.28125 26.71875 L 31.71875 25.28125 L 25.71875 19.28125 Z" stroke-linecap="round" />
                                    </g>
                                </svg>
                            </div>

                            <strong style="color:#8ab4f8; text-decoration: underline;">Click</strong> to add file


                        </label>
                        <input type="file" name="pdfFile" id="nota-tambahan" accept=".pdf">
                        <br>
                        <button type="submit">Muat Naik</button>

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

        <div class="topic-head"> <!-- 1. Feedback student -->
            <h3>Maklum Balas</h3>

            <div class="topic-container">
                Isi Di Sini:
                <div class="summary-container">
                    <blockquote contenteditable="true">
                        <p>
                            <?php echo $data['summary']; ?>
                        </p>
                    </blockquote>
                    <button style="width: fit-content; margin-left: 25px " name="update-summary">
                        Hantar
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="rtn_btn">
        <a href="<?php echo URLROOT; ?>/admins/home">
            <button>Kembali Ke Halaman Utama </button>
        </a>

    </div>
</body>

</html>
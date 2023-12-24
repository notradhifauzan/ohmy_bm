<!-- REAL ENGINEERS UNDERSTAND ABSTRACTION! -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Topik</title>
    <?php require APPROOT . '/views/student/css/style_darjahDetails.php'; ?>

    <style>
        body {
            background: url('<?php echo URLROOT; ?>/assets/bgDetails.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

</head>

<body>
    <div class="title-head">
        <img src="<?php echo URLROOT ?>/assets/logo.jpg" alt="img">

        <h1 class="title-text">

            SENARAI TOPIK
        </h1>
    </div>

    <div class="darjah-head-container">
        <img src="<?php echo URLROOT ?>/assets/ball.jpg" alt="img">
        <div class="centered">
            <h1 name="darjah_id">Darjah <?php echo $data['darjahId']; ?></h1>
        </div>
    </div>

    <div class="details-head">
        <button class="return-button">
            <a href="<?php echo URLROOT; ?>/students/home">Kembali Ke Halaman Utama</a>
        </button>
    </div>

    <div class="tambahan-nota-head">
        <h3>Buku Teks</h3>
        <div class="tambahan-nota-container">
        <!-- Tambah summary buku text, buat muat turun button utk buku text, preview buku text -->
        <p style = "margin: 20px">Summary Buku Text</p>
        <button style = "margin: 20px">Muat Turun</button>
        <div style = "margin: 20px">Preview</div>
        </div>
    </div>

    <div class="topiclist-head">
        <h3>Senarai Nota Tambahan</h3>
        <div class="topiclist-container">
            <?php foreach ($data['topicList'] as $topic) : ?>
                <div>
                    <button class="button-to-topic">
                        <a href=""><?php echo $topic->topicName; ?></a>
                    </button>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="topic-head">
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

</body>

</html>
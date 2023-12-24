<!-- REAL ENGINEERS UNDERSTAND ABSTRACTION! -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Topik</title>
    <?php require APPROOT . '/views/admin/css/style_darjahDetails.php'; ?>

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
            <a href="<?php echo URLROOT; ?>/admins/home">Kembali Ke Halaman Utama</a>
        </button>
    </div>

    <div class="tambahan-nota-head">
        <h3>Buku Teks</h3>
        <div class="tambahan-nota-container">

            <?php if (!empty($data['file'])) : ?>
                <div class="sow_container">
                    <p>Samplefile.txt</p>
                    <a role="button" href="<?php echo URLROOT; ?>/admins/deleteSOW/<?php echo $data['darjahId']; ?>"><button>
                            Hapus
                        </button></a>
                </div>
            <?php endif; ?>

            <?php if (empty($data['file'])) : ?>
                <form action="<?php echo URLROOT; ?>/admins/uploadSOW/<?php echo $data['darjahId']; ?>" method="POST" enctype="multipart/form-data">
                    <label for="pdfFile">Muat Naik Buku Teks: </label>
                    <input type="text" name="fileName" id="fileName" placeholder="nama buku teks">
                    <br>
                    <br>
                    <input type="file" name="pdfFile" id="nota-tambahan" accept=".pdf">
                    <button type="submit">Muat Naik</button>
                    <?php if (!empty($data['fileName_err'])) : ?>
                        <span style="color: red"><?php echo $data['fileName_err']; ?></span><br>
                    <?php endif ?>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="topic-head">
        <h3>Tahun <?php echo $data['darjahId']; ?></h3>

        <div class="topic-container">
            Silibus Bahasa Melayu:
            <div class="summary-container">
                <blockquote contenteditable="true">
                    <p>
                        <?php echo $data['summary']; ?>
                    </p>
                </blockquote>
                <button style="width: fit-content; margin-left: 25px " name="update-summary">
                    Ubah Suai
                </button>
            </div>
        </div>
    </div>

    <div class="topiclist-head">
        <h3>Senarai Nota Tambahan</h3>
        <div class="topiclist-container">
            <?php foreach ($data['topicList'] as $topic) : ?>
                <div class="button-to-topic">
                    <button>
                        <a href=""><?php echo $topic->topicName; ?></a>
                    </button>
                </div>
            <?php endforeach ?>
        </div>
        <div class="addtopic-container">
                <button name="go-to-add-new" class="tambah-button">
                    <a href="<?php echo URLROOT; ?>/admins/topicForm/<?php echo $data['darjahId']; ?>">Muat Naik Nota Tambahan</a>
                </button>
            </div>
    </div>


</body>

</html>
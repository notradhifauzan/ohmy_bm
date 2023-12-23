<!-- REAL ENGINEERS UNDERSTAND ABSTRACTION! -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Topik</title>
    <?php require APPROOT . '/views/admin/css/style_darjahDetails.php'; ?>
</head>

<body>
    <!-- Darjah ${} ambil dari db -->
    <h1 name="darjah_id">Darjah <?php echo $data['darjahId']; ?></h1>
    
    <h3>Ringkasan subjek bahasa melayu bagi Tahun <?php echo $data['darjahId']; ?></h3>
    <div class = "">
        <blockquote contenteditable="false">
        <p><?php echo $data['summary']; ?></p>
        </blockquote>
    </div>

   
    <br><br>
    
    <h1>Senarai Topik</h1>
    
    <?php foreach ($data['topicList'] as $topic) : ?>
        <button>
            <a href=""><?php echo $topic->topicName; ?></a>
        </button>
    <?php endforeach ?>
    
    <br><br>
    <button>
        <a href="<?php echo URLROOT; ?>/admins/home">Kembali</a>
    </button>

</body>

</html>
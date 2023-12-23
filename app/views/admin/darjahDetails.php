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

    <!-- dkt sini mesti ada satu ruang untuk admin tengok ada nota tambahan tak untuk subjek bm darjah 'n' ni -->
    <?php if (!empty($data['file'])) : ?>
        <div class="sow_container">
            <p>there is a file for this darjah</p>
            <p>allow admin to delete this file</p>
            <a role="button" href="<?php echo URLROOT; ?>/admins/deleteSOW/<?php echo $data['darjahId']; ?>">hapus fail</a>
        </div>
    <?php endif; ?>

    <!-- use this variable $data['summary'] to display the summary -->
    <!-- also allow the admin to edit this summary (maybe a button to edit) -->

    <!-- Irfan: instead pakai button to edit pakai text box and tambah so that bila edit tu the text stays there for that particular topic / ke better lagi button edit ? -->

    
    <h3>Ringkasan subjek bahasa melayu bagi Tahun <?php echo $data['darjahId']; ?></h3>
    <div class = "">
        <blockquote contenteditable="true">
        <p><?php echo $data['summary']; ?></p>
        </blockquote>
    </div>

    <!-- this portion of code (FORM) will be hidden if there is already a notes for this particular darjah -->
    <?php if (empty($data['file'])) : ?>
        <form action="<?php echo URLROOT; ?>/admins/uploadSOW/<?php echo $data['darjahId']; ?>" method="POST" enctype="multipart/form-data">
            <label for="pdfFile">Muat Naik Nota Tambahan: </label>
            <input type="text" name="fileName" id="fileName" placeholder="Nama nota">
            <br>
            <br>
            <input type="file" name="pdfFile" id="nota-tambahan" accept=".pdf">
            <button type="submit">muat naik</button>
            <?php if (!empty($data['fileName_err'])) : ?>
                <span style="color: red"><?php echo $data['fileName_err']; ?></span><br>
            <?php endif ?>
        </form>
    <?php endif; ?>

    <br><br>
    <!-- 
    
    Bawah senarai topik ada satu div utk display preview topik apabila diclick: 
    
    <div>
        <h1>
            ${title}
        </ah1>
        <TextArea>
            ${desc}
        </TextArea>
        <a href="pdf.">
            ${link utk download }
        </a>
    </div>
    -->
    <h1>Senarai Topik</h1>
    <!-- Each button akan ambil data dari DB and akan keluar button baru bila selesai add topik baru -->
    <!-- display as table/grid or whatever, yang penting mesti ada topic name, download button, ruang untuk letak topic summary -->
    <?php foreach ($data['topicList'] as $topic) : ?>
        <button>
            <a href=""><?php echo $topic->topicName; ?></a>
        </button>
    <?php endforeach ?>
    <h3>Tambah topik: </h3>


    <!-- Hantar Darjah ${} ke page tambah topik so that bila tambah dia akan according to Darjah ${}, tak sure perlu ke tak -->
    <button name="go-to-add-new">
        <a href="<?php echo URLROOT; ?>/admins/topicForm/<?php echo $data['darjahId']; ?>">Tambah Topik +</a>
    </button>
    <br><br>
    <button>
        <a href="<?php echo URLROOT; ?>/admins/home">Kembali</a>
    </button>

</body>

</html>
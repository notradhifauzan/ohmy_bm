<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Topik</title>
    <?php require APPROOT . '/views/admin/css/style_topicForm.php'; ?>
</head>

<body>
    <h1>Tambah Topik (Darjah - <?php echo $data['darjahId'] ?>)</h1>
    <!-- Tambah action apa and method apa -->
    <form action="<?php echo URLROOT; ?>/admins/topicForm/<?php echo $data['darjahId']; ?>" method="POST" enctype="multipart/form-data">
        <div class="add-topic-form-container">
            <label for="topicName">
                Tajuk Topik
            </label>
            <!-- Ambil topic baru utk sent ke db -->
            <input value="<?php echo $data['topicName']; ?>" type="text" placeholder="isi tajuk" name="topicName">
            <?php if (!empty($data['topicName_err'])) : ?>
                <span style="color: red"><?php echo $data['topicName_err']; ?></span><br>
            <?php endif ?>
            <label for="summary">
                Huraian
            </label>
            <!-- Ambil huraian baru utk sent ke db -->
            <input value="<?php echo $data['summary']; ?>" type="text" placeholder="isi huraian" name="summary">
            <?php if (!empty($data['summary_err'])) : ?>
                <span style="color: red"><?php echo $data['summary_err']; ?></span><br>
            <?php endif ?>
            <!-- Ambil file baharu ke db -->
            <input type="file" name="pdfFile" id="upload-new-file" accept=".pdf">
            <?php if (!empty($data['fileName_err'])) : ?>
                <span style="color: red"><?php echo $data['fileName_err']; ?></span><br>
            <?php endif ?>
            <!-- Push data into db according darjah berapa -->
            <div class="add-new-button"><br>
                <button type="submit" name="submit-new-topic">Tambah</button>
            </div>
        </div>
    </form>

    <!-- return to topicList page after submit-->
    <a href="<?php echo URLROOT; ?>/admins/home"><br>Kembali</a>
</body>

</html>
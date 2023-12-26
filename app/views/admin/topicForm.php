<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Topik</title>
    <?php require APPROOT . '/views/admin/css/style_topicForm.php'; ?>
</head>

<body>

    <div class="form_container">
        <div class="form_header">
            <h1>Tambah Bahan Pembelajaran: Darjah <?php echo $data['darjahId'] ?></h1>

            <a href="<?php echo URLROOT; ?>/admins/darjah/<?php echo $data['darjahId']; ?>">
                <svg id='Delete_32' width='28' height='28' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <rect width='32' height='32' stroke='none' fill='#000000' opacity='0' />
                    <g transform="matrix(1.18 0 0 1.18 24 24)">
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -25)" d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z" stroke-linecap="round" />
                    </g>
                </svg>
            </a>
        </div>

        <form action="<?php echo URLROOT; ?>/admins/topicForm/<?php echo $data['darjahId']; ?>" method="POST" enctype="multipart/form-data">
            <div class="form_c">
                <div class="form_c1">
                    <h3>Tajuk Bahan</h3>
                    <input value="<?php echo $data['topicName']; ?>" type="text" placeholder="isi tajuk" name="topicName">

                    <?php if (!empty($data['topicName_err'])) : ?>
                        <span style="color: red">*<?php echo $data['topicName_err']; ?></span>
                    <?php endif ?>

                    <h3>Huraian</h3>


                    <textarea rows="10" cols="80" placeholder="isi huraian" name="summary"><?php echo $data['summary']; ?></textarea>

                    <?php if (!empty($data['summary_err'])) : ?>
                        <span style="color: red">*<?php echo $data['summary_err']; ?></span>
                    <?php endif ?>

                    <div class="button_mid">
                        <button type="submit" name="submit-new-topic">Tambah</button>
                    </div>
                </div>

                <label class="form_c2" for="upload-new-file">
                    <div class="ic_upload">
                        <svg id='Upload_to_the_Cloud_48' width='48' height='48' viewBox='0 0 48 48' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='48' height='48' stroke='none' fill='#555' opacity='0' />

                            <g transform="matrix(0.88 0 0 0.88 24 24)">
                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(5,5,5); fill-rule: nonzero; opacity: 1;" transform=" translate(-25, -24.5)" d="M 20 8 C 13.539063 8 8.367188 13.109375 8.09375 19.5 C 3.417969 20.777344 0 24.996094 0 30 C 0 36.046875 4.953125 41 11 41 L 41 41 C 45.945313 41 50 36.945313 50 32 C 50 28.101563 47.402344 24.792969 43.90625 23.625 C 43.695313 17.761719 38.910156 13 33 13 C 31.960938 13 30.992188 13.257813 30.03125 13.53125 C 27.882813 10.261719 24.21875 8 20 8 Z M 20 10 C 23.726563 10 26.992188 12.09375 28.71875 15.09375 L 29.15625 15.8125 L 29.9375 15.53125 C 30.9375 15.167969 31.910156 15 33 15 C 37.953125 15 42 19.046875 42 24 L 42 25.09375 L 42.78125 25.28125 C 45.714844 25.972656 48 28.769531 48 32 C 48 35.855469 44.855469 39 41 39 L 11 39 C 6.046875 39 2 34.953125 2 30 C 2 25.671875 5.058594 21.996094 9.1875 21.1875 L 10 21.03125 L 10 20 C 10 14.433594 14.433594 10 20 10 Z M 25 18.59375 L 24.28125 19.28125 L 18.28125 25.28125 L 19.71875 26.71875 L 24 22.4375 L 24 34 L 26 34 L 26 22.4375 L 30.28125 26.71875 L 31.71875 25.28125 L 25.71875 19.28125 Z" stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>

                    <input type="file" name="pdfFile" id="upload-new-file" accept=".pdf">
                    <?php if (!empty($data['fileName_err'])) : ?>
                        <span style="color: red"><?php echo $data['fileName_err']; ?></span>
                    <?php endif ?>
                    Click here to upload
                </label>

            </div>
        </form>
    </div>

</body>

</html>
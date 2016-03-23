<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="/resources/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/resources/bower_components/jquery-uploader/dist/jquery-uploader.min.js"></script>
    <script src="/resources/js/uploads2.js"></script>

    <link rel="stylesheet" href="/resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/css/uploads.css">

    <title>Simple Uploader</title>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Uploaded files</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" id="images_list">
            <ul>
            <?php
            foreach($images as $image){
                ?>
                <li>
                    <img src="/resources/uploads/<?php echo $image?>">
                <li>
                <?php
            }
            ?>
            </ul>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="preview">

            </div>
        </div>
    </div>
    <div class="row text-center">
        <form method="post" action="/" enctype="multipart/form-data" id="upload_form">
            <input type="file" name="uploads[]" class="hidden" multiple id="hidden_input_file">
            <a href="#" id="uploader" class="btn btn-default">Select files</a>
            <div id="browser" class="text-center"></div>
        </form>
    </div>
</div>
</body>
</html>
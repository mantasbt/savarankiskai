<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <title>Darbas Nr. 15</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=8szf7itnvbwaibmbgqxh8a9pt0lskxt43e9ttambab4uv4u6'></script>
    <script>
        tinymce.init({
            selector: '#text',
            menubar: false,
            themes: 'modern',
        });
    </script>
</head>
<body>

    <div class="row">
        <div class="container">
            <div class="col-sm-4">
                <form action="send.php" method="post">
                    <legend>Laiško siuntimas</legend>
                    <div class="form-group">
                        <label for="sender">Siuntėjas</label>
                        <input type="email" class="form-control" name="sender" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Tema</label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Gavėjai</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Tekstas</label>
                        <textarea class="form-control" name="text" id="text" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file">Failas</label>
                        <input type="file" class="form-control-file" name="file">
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Siųsti</button>
                </form>

                <?php 
                    if(!empty($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
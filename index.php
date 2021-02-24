<?php
    namespace crud;
    require_once "./vendor/autoload.php";

    $crud = new Main();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo TITLE ?></title>
        <script>
            var site_url = "<?php echo SITE_URL ?>";
        </script>
        <!-- Jquery -->
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"
        ></script>
        <!-- Font awesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
            integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
            crossorigin="anonymous"
        />
        <!-- Self assets -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="assets/js/script.js"></script>
    </head>

    <body>
        <!-- Header part -->
        <header>
            <h1 class="site-logo"><?php echo TITLE ?></h1>
        </header>
        <!-- Main body part -->
        <div class="main-body">
            <!-- Contents container -->
            <div class="content">
                <form action="" method="POST" class="country-form">
                    <div class="input-group">
                        <label for="current-name">Current name</label>
                        <input
                            type="text"
                            name="current-name"
                            id="current-name"
                            disabled
                        />
                    </div>
                    <div class="input-group">
                        <label for="short-name">New name</label>
                        <input
                            type="text"
                            name="new-name"
                            id="new-name"
                            value=""
                        />
                    </div>
                    <div class="btn green save">Save</div>
                    <div class="btn yellow update">Update</div>
                    <div class="btn red delete">Delete</div>
                    <div class="btn blue refresh">Refresh</div>
                </form>
                <br>
                <ul class="short-name-list">
                    <?php
                    echo $crud->crud->retrieve(); ?>
                </ul>
            </div>
            <!-- Sidebar part -->
            <div class="country-list">
                <?php
                    echo create_list( \crud\Crud::countries );
                ?>
            </div>
        </div>
    </body>
</html>

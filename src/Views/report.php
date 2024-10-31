<style>
    body {
        background-color: #474544;
        font-size: 80%;
        overflow-x: hidden;
        color: white;
    }
</style>
<div class=".container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="row-1 d-flex justify-content-center">
                <a class="nav-link" href="<?php echo(admin_url('admin.php?page=OurivesWeb')) ?>">
                    <button type="button" class="btn btn-primary "
                            style='background-color: #dda34c !important;border-color:#bd8127 !important;'>Página Inicial
                    </button>
                </a>
            </div>
            <div class="row-8" style="margin-top:2vh;height:60vh;overflow: auto;">
                <form class="list-group" method="POST">
                    <?php
                    $dir_handle = @opendir(realpath(OURIVES_TEMP_FILES)) or die("Cannot open the folder" . realpath(OURIVES_TEMP_FILES));
                    while ($file = readdir($dir_handle)) {
                        if ($file != "." && $file != "..") {
                            print('<button class="btn btn-primary btn-sm" name="submit" type="submit" value="' . $file . '">' . $file . '</button>');
                        }
                    }
                    closedir($dir_handle);
                    ?>
                </form>
            </div>
            <div class="row-3" style="margin-top:2vh;height:15vh;">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success">Atualiza produto no ourives erp</li>
                    <li class="list-group-item list-group-item-info">Cria produto no WooCommerce</li>
                    <li class="list-group-item list-group-item-secondary">Atualiza produto no WooCommerce</li>
                    <li class="list-group-item list-group-item-danger">Erro</li>
                    <li class="list-group-item list-group-item-warning">Resumo</li>
                </ul>
            </div>
        </div>
        <div class="col-1">
        </div>
        <div class="col-9" style="height:85vh; overflow: auto;">
            <?php
            if (isset($_REQUEST['submit'])) {
                $filename = sanitize_text_field(trim($_REQUEST['submit']));
                print(file_get_contents(realpath(OURIVES_TEMP_FILES . $filename))) or die("Cannot open the folder" . realpath(OURIVES_TEMP_FILES));
            } else {
                print(file_get_contents(realpath(OURIVES_TEMPLATE_DIR . "Template.html"))) or die("Cannot open the folder" . realpath(OURIVES_TEMPLATE_DIR));
            }
            ?>
        </div>
    </div>
</div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OurivesWeb | Login Page</title>
<body>
<div class="circle-top-left"></div>
<div class="circle-bottom-right"></div>
<div class="container">
    <div class="container-left">
        <div class="forms-container">
            <div class="signin">
                <form id='formPerm' method='POST' class="sign-in-form"
                      action='<?php admin_url('admin.php?page=OurivesWeb') ?>'>
                    <div class="form-header">
                        <h1 class="title" draggable="false">BEM-VINDO AO</h1>
                        <img src="<?php echo esc_html(OURIVES_IMAGES_URL) ?>logo.svg" alt="logo" class="logo"
                             draggable="false">
                        <h2 class="description">O Software de Gestão da PONTO25 agora no Wordpress.</h2>
                    </div>
                    <div class="input-field">
                        <img src="<?php echo esc_html(OURIVES_IMAGES_URL) ?>/icons/user-solid.svg">
                        <input id="username" type='text' name='user' placeholder="Utilizador">
                    </div>
                    <div class="input-field">
                        <img src="<?php echo esc_html(OURIVES_IMAGES_URL) ?>/icons/lock-solid.svg">
                        <input id="password" type='password' name='pass' placeholder="Password">
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn solid">
            </div>
        </div>
    </div>
    <div class="container-right"
         style="background-image: url(<?php echo esc_html(OURIVES_IMAGES_URL) ?>ourives_gm.png);">
    </div>
</div>
</body>

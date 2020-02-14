<?php
require_once dirname(__FILE__).'/common/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-12 mt-5 mb-3">
            <h2>Вход в систему</h2>
        </div>
        <div class="message"><?php echo (isset($data['message']) ? htmlspecialchars($data['message'], ENT_QUOTES) : ""); ?> </div>

        <form action="/index.php?route=login/login" method="post">
        <div class="col-12 mb-2">
            <div class="form-group">
                <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input type="submit" class="form-control login-form-submit" id="login-form-submit" name="login-form-submit" value="Войти">
            </div>
        </div>
        </form>
    </div>
</div>
<?php
require_once dirname(__FILE__).'/common/footer.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100 p-t-50 p-b-20">
                        <form class="login100-form validate-form" action="<?=PATH;?>/user/registration" method="post">
                            <span class="login100-form-title">Регистрация</span>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите имя">
                                <input class="input100" type="text" name="first_name" required>
                                <span class="focus-input100" data-placeholder="Имя *"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите фамилию">
                                <input class="input100" type="text" name="last_name" required>
                                <span class="focus-input100" data-placeholder="Фамилия *"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите телефон">
                                <input class="input100" data-mask="callback-catalog-phone" type="text" name="phone" required>
                                <span class="focus-input100" data-placeholder="Телефон *"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate="Введите свой email">
                                <input class="input100" type="email" name="email">
                                <span class="focus-input100" data-placeholder="E-mail"></span>
                            </div>
                            <div class="wrap-input100 validate-input m-b-50" data-validate="Введите пароль">
                                <input class="input100" type="password" name="password">
                                <span class="focus-input100" data-placeholder="Пароль *"></span>
                            </div>
                            <div class="container-login100-form-btn">
                                <button class="login100-form-btn" type="submit">Зарегистрироваться</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
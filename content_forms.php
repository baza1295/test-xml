<div class="forms_block">
    <div class="title_aut">
        <span class="link" data-filter="register"> Регистрация</span>
        <span class="link active" data-filter="aut">Авторизация</span>
    </div>
    <div class="modal">
        <h2 class="title_form">Вы успешно зарегистрировались</h2>
        <span class="links" data-filter="aut">Авторизуйтесь</span>
    </div>
    <div class="form_container filter register">
        <h2 class="title_form">Регистрация</h2>
        <form id="form-registr" class="form" >
            <div class="form_input">
                <span>Логин</span>
                <input class="input_name" type="text" name="login">
            </div>
            <div class="form_input">
                <span>Пароль</span>
                <input id="password" class="input_name" type="password" name="password">
            </div>
            <div class="form_input">
                <span>Повторите пароль</span>
                <input class="input_name" type="password" name="confirm_password">
            </div>
            <div class="form_input">
                <span>E-mail</span>
                <input class="input_name" type="text" name="email">
            </div>
            <div class="form_input">
                <span>Имя</span>
                <input class="input_name" type="text" name="name">
            </div>
            <div class="form_button">
                <button >Регистрация</button>
            </div>
        </form>

    </div>
    <div class="form_container filter aut">
        <h2 class="title_form">Авторизация</h2>
        <form id="form-aut" class="form" onsubmit="return false;">
            <div class="form_input">
                <span>Логин</span>
                <input class="input_name" type="text" name="login">
            </div>
            <div class="form_input">
                <span>Пароль</span>
                <input class="input_name" type="password" name="password">
            </div>
            <div class="form_button">
                <button>Войти</button>
            </div>
        </form>

    </div>
</div>
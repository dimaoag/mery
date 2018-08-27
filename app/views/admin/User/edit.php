<section class="content-header">
    <h1>Пользователь <?=$user->first_name?> <?=$user->last_name?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/user"><i class="fa fa-dashboard"></i>Пользователи</a></li>
        <li class="active"><?=$user->first_name?> <?=$user->last_name?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   value="<?=h($user->first_name)?>"
                                   data-error="Minimum of 3 chars" data-minlength="4"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   value="<?=h($user->last_name)?>"
                                   data-error="Minimum of 3 chars" data-minlength="4"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                   value="<?=h($user->phone)?>"
                                   data-error="Minimum of 13 chars" data-minlength="13"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Если хотите изменить пароль, просто введите новый пароль">
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="<?=h($user->email)?>"
                                   data-error="Bruh, that email address is invalid">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="active">Active</label>
                            <select name="active" id="active" class="form-control" required>
                                <option value="0" <?php if ($user->active == '0') echo ' selected';?>>Неактивный</option>
                                <option value="1" <?php if ($user->active == '1') echo ' selected';?>>Активный</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="role">Роль</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="user" <?php if ($user->role == 'user') echo ' selected';?>>user</option>
                                <option value="admin" <?php if ($user->role == 'admin') echo ' selected';?>>admin</option>
                                <option value="moderator" <?php if ($user->role == 'moderator') echo ' selected';?>>moderator</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

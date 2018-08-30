<section class="content-header">
    <h1>Записать клиента на курс "<?=$course->name;?>" c <?=dateFormat($course->date_start);?> по <?=dateFormat($course->date_end);?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/order?id=<?=$course->id;?>"><i class="fa fa-dashboard"></i>Назад</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/order/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="+380 00 00 000"
                                   pattern="^[0-9+]{1,}$"
                                   data-error="Only numbers and plus"
                                   required>
                            <!-- От начала до кокца строки принимаеи только цыфри и точка, и один и больше символов -->
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="status">Статус</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="">Выберите статус</option>
                                <option value="1">Новая заявка</option>
                                <option value="2">В оброботке</option>
                            </select>
                        </div>
                        <input type="hidden" name="course_id" value="<?=$course->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
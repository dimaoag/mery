<section class="content-header">
    <h5>Изменить данные по клиенте "<?=$order['first_name'];?> <?=$order['last_name'];?>" и его заявке на курс "<?=$order['name'];?>" c <?=dateFormat($order['date_start']);?> по <?=dateFormat($order['date_end']);?></h5>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/order?id=<?=$order['course_id'];?>"><i class="fa fa-dashboard"></i>Назад</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <form action="<?=ADMIN?>/order/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                   data-error="Minimum of 3 chars" data-minlength="3"
                                   value="<?=$order['first_name'];?>"
                                   required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                   value="<?=$order['last_name'];?>">
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone">Телефон</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="+380 00 00 000"
                                   value="<?=$order['phone'];?>"
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
                                <?php $statuses = getStatus(); ?>
                                <?php foreach ($statuses as $key => $value): ?>
                                    <?php if ($key == $order['status']):?>
                                        <option value="<?=$key;?>" selected><?=$value;?></option>
                                    <?php else: ?>
                                        <option value="<?=$key;?>"><?=$value;?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="hidden" name="course_id" value="<?=$order['course_id'];?>">
                        <input type="hidden" name="id" value="<?=$order['id'];?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
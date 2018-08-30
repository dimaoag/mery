<section class="content-header">
    <h1>Все заявки по курсу "<?=$course->name;?>"</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/course"><i class="fa fa-dashboard"></i>Курсы по датам</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/order/add?id=<?=$course->id;?>" class="btn btn-success">Записать клиента на курс</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Дата записи</th>
                                    <th>Названия курса</th>
                                    <th>Клиент</th>
                                    <th>Телефон</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $statuses = getStatus(); ?>
                            <?php if (!empty($orders)): ?>
                                <?php foreach ($orders as $key => $order):?>
                                    <tr>
                                        <td><?=echoDate($order['created_at'], true);?></td>
                                        <td><?=$course->name;?></td>
                                        <td><?=$order['first_name'];?> <?=$order['last_name'];?></td>
                                        <td><?=$order['phone'];?></td>
                                        <td><?=$order['price'];?></td>
                                        <td><?=$statuses[$order['status']];?></td>
                                        <td>
                                            <a href="<?=ADMIN?>/order/edit?id=<?=$order['id'];?>">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a href="<?=ADMIN?>/order/delete?id=<?=$order['id'];?>">
                                                <i class="fa fa-fw fa-trash-o delete text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

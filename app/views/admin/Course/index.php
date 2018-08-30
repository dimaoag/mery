<section class="content-header">
    <h1>Все курсы по датам</h1>
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
                    <a href="<?=ADMIN?>/course/add" class="btn btn-success">Добавить новый курс</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Дата начала</th>
                                <th>Дата конца</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Вид курса</th>
                                <th>Тип курса</th>
                                <th>Мастер</th>
                                <th>Места</th>
                                <th>Статус</th>
                                <th>Заявки</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($courses as $key => $course):?>
                                <tr>
                                    <td><?=dateFormat($course['date_start'], '-');?></td>
                                    <td><?=dateFormat($course['date_end'], '-');?></td>
                                    <td><?=$course['name'];?></td>
                                    <td><?=$course['cat_name'];?></td>
                                    <td><?=$course['kind_name'];?></td>
                                    <td><?=$course['type_name'];?></td>
                                    <td><?=$course['first_name'];?> <?=$course['last_name'];?></td>
                                    <td><?=$course['sits'];?>/<?=$course['limit_sits'];?></td>
                                    <td><?= $course['status'] ? 'Действующий' : 'Закрытый';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/order?id=<?=$course['id'];?>">Заявки</a>
                                    </td>
                                    <td>
                                        <a href="<?=ADMIN?>/course/edit?id=<?=$course['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/course/delete?id=<?=$course['id'];?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
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
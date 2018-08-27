<section class="content-header">
    <h1>Отзывы</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/review"><i class="fa fa-dashboard"></i>Отзывы</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Пользователь</th>
                                <th>Дата создания</th>
                                <th>Техт</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($reviews as $review):?>
                                <tr>
                                    <td><?=$review['first_name']?> <?=$review['last_name']?></td>
                                    <td><?=$review['created_at']?></td>
                                    <td><?=$review['text']?></td>
                                    <td><?=$review['status'] ? 'Показать':'Не показывать';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/review/edit?id=<?=$review['id']?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/review/delete?id=<?=$review['id']?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-content">
                        <p><?=count($reviews);?> review(s) of <?=$count?></p>
                        <?php if ($pagination->getCountPages() > 1):?>
                            <?=$pagination?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

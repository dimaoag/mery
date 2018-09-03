<section class="content-header">
    <h5>Комментарии к статье "<?=$article->title;?>"</h5>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/article"><i class="fa fa-dashboard"></i>Статьи</a></li>
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
                                <th>Дата создания</th>
                                <th>ФИО</th>
                                <th>Текст</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($comments as $key => $comment):?>
                                <tr>
                                    <td><?=echoDate($comment['created_at'], true);?></td>
                                    <td><?=$comment['first_name'];?> <?=$comment['last_name'];?></td>
                                    <td><?=$comment['text'];?></td>
                                    <td><?=$comment['status'] ? 'Показывать' : 'Скрывать';?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/comment/edit?id=<?=$comment['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/comment/delete?id=<?=$comment['id'];?>">
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
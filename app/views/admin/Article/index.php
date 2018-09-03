<section class="content-header">
    <h1>Все статьи</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/article/add" class="btn btn-success">Добавить новую статью</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Фото</th>
                                <th>Название</th>
                                <th>Дата создания</th>
                                <th>На главном экране</th>
                                <th>Статус</th>
                                <th>Комментарии</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($articles as $key => $article):?>
                                <tr><td>
                                        <img style="max-width: 50px" src="/upload/<?=$article['img'];?>" alt="">
                                    </td>
                                    <td><?=$article['title'];?></td>
                                    <td><?=echoDate($article['created_at'], true);?></td>
                                    <td><?=$article['is_show'] ? 'Показывать' : 'Не показывать';?></td>
                                    <td><?=$article['status'] ? 'Показывать' : 'Скрывать';?></td>
                                    <td><a href="<?=ADMIN?>/comment/views?id=<?=$article['id'];?>">Комментарии</a></td>
                                    <td>
                                        <a href="<?=ADMIN?>/article/edit?id=<?=$article['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/article/delete?id=<?=$article['id'];?>">
                                            <i class="fa fa-fw fa-trash delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-content">
                        <p><?=count($articles);?> статьи(статей) с <?=$count?></p>
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
<section class="content-header">
    <h1>Меню</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li><a href="<?=ADMIN?>/menu"><i class="fa fa-dashboard"></i>Меню</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <a href="<?=ADMIN?>/menu/add" class="btn btn-success">Добавить новый пункт меню</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Алиас</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($menu as $item):?>
                                <tr>
                                    <td><?=$item->name?></td>
                                    <td><?=$item->alias?></td>
                                    <td><?=$item->status ? 'Показывать' : "Не показывать";?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/menu/edit?id=<?=$item->id?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/menu/delete?id=<?=$item->id?>">
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

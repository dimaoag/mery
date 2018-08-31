<section class="content-header">
    <h1>Мастера</h1>
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
                    <a href="<?=ADMIN?>/master/add" class="btn btn-success">Добавить нового мастера</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Категория</th>
                                <th>Посада</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($masters as $key => $master):?>
                                <tr>
                                    <td><?=$master['first_name'];?> <?=$master['last_name'];?></td>
                                    <td><?=$master['name'];?></td>
                                    <td><?=$master['position'];?></td>
                                    <td>
                                        <a href="<?=ADMIN?>/master/edit?id=<?=$master['id'];?>">
                                            <i class="fa fa-fw fa-edit"></i>
                                        </a>
                                        <a href="<?=ADMIN?>/master/delete?id=<?=$master['id'];?>">
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
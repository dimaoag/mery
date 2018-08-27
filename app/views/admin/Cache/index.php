<section class="content-header">
    <h1>Очистить кеш</h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN?>"><i class="fa fa-dashboard"></i>Главная</a></li>
        <li class="active">Очистить кеш</li>
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
                                <th>Название кеша</th>
                                <th>Описание</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Кеш меню</td>
                                    <td>Кеш меню на сайте установлен на 1 час</td>
                                    <td>
                                        <a href="<?=ADMIN?>/cache/delete?key=menu">
                                            <i class="fa fa-fw fa-trash-o delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Кеш категорий</td>
                                    <td>Кеш категорий на сайте установлен на 1 час</td>
                                    <td>
                                        <a href="<?=ADMIN?>/cache/delete?key=categories">
                                            <i class="fa fa-fw fa-trash-o delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
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

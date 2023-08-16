<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Gawe</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Data Gawe / Acara
                </h4>
            </div>
            <div class="table-responsive">
                <table class="card-body table table-striped table-md">
                    <tr>
                        <th>#</th>
                        <th>Nama Gawe</th>
                        <th>Tanggal Gawe</th>
                        <th>Info</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <?php foreach($gawe as $key => $value) : ?>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->name_gawe ?></td>
                            <td><?= $value->date_gawe ?></td>
                            <td><?= $value->info_gawe ?></td>
                            <td class="text-center" style="width: 15%;">
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>
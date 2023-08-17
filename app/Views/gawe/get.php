<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Gawe</h1>
        <div class="section-header-button">
            <a href="<?= site_url('gawe/add') ?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success !</b>
                <?= session()->getFlashdata('success'); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Error !</b>
                <?= session()->getFlashdata('error'); ?>
            </div>
        </div>
        <?php endif; ?>

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
                    <?php foreach($gawe as $key => $value) : ?>
                    <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->name_gawe ?></td>
                            <td><?= date('d/m/Y', strtotime($value->date_gawe)) ?></td>
                            <td><?= $value->info_gawe ?></td>
                            <td class="text-center" style="width: 15%;">
                                <a href="<?= site_url('gawe/edit/'. $value->id_gawe) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?= site_url('gawe/'.$value->id_gawe) ?>" class="btn btn-warning btn-sm" method="post" onsubmit="return confirm('Yakin hapus data?')">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                               
                            </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>
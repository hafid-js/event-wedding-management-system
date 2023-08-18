<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Contacts &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Contacts</h1>
        <div class="section-header-button">
            <a href="<?= site_url('contacts/new') ?>" class="btn btn-primary">Add New</a>
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
                    Data Kontak Saya
                </h4>
            </div>
            <div class="table-responsive">
                <table class="card-body table table-striped table-md">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kontak</th>
                        <th>Alias</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Info</th>
                        <th>Grup</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($contacts as $key => $value) : ?>
                    <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value->name_contact ?></td>
                            <td><?= $value->name_alias ?></td>
                            <td><?= $value->phone ?></td>
                            <td><?= $value->email ?></td>
                            <td><?= $value->address ?></td>
                            <td><?= $value->info_contact ?></td>
                            <td><?= $value->name_group ?></td>
                            <td class="text-center" style="width: 15%;">
                                <a href="<?= site_url('contacts/'. $value->id_contact.'/edit') ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?= site_url('contacts/delete/'.$value->id_contact) ?>" class="btn btn-warning btn-sm" method="post" onsubmit="return confirm('Yakin hapus data?')">
                                <?= csrf_field(); ?>
                                <button href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                               
                            </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>
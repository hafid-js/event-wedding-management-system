Tambah Data<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Contact &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
    <div class="section-header-back">
            <a href="<?= site_url('contacts') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Contact</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Buat Kontak Baru
                </h4>
            </div>
           <div class="card-body col-md-6">
            <form action="<?= site_url('contacts') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Group *</label>
                <select name="id_group" class="form-control" id="" required>
                    <option value="" hidden></option>
                    <?php foreach($groups as $key => $value) : ?>
                        <option value="<?= $value->id_group ?>"><?= $value->name_group ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
                <div class="form-group">
                    <label for="">Nama Kontak *</label>
                    <input type="text" name="name_contact" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="">Nama Alias</label>
                    <input type="text" name="name_alias" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Info (Kota / Instansi / dll</label>
                   <textarea name="info_contact" id="" class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
           </div>
        </div>
    </div>
</section>
<?php $this->endSection() ?>
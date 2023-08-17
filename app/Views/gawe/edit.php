Tambah Data<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Gawe &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
    <div class="section-header-back">
            <a href="<?= site_url('gawe') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Gawe</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Gawe / Acara
                </h4>
            </div>
           <div class="card-body col-md-6">
            <form action="<?= site_url('gawe/'.$gawe->id_gawe) ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="">Nama Gawe / Acara *</label>
                    <input type="text" name="name_gawe" value="<?= $gawe->name_gawe ?>" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="">Tanggal Acara *</label>
                    <input type="date" name="date_gawe" value="<?= $gawe->date_gawe ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Info</label>
                   <textarea name="info_gawe" value="<?= $gawe->info_gawe ?>" id="" class="form-control" cols="30" rows="10"></textarea>
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
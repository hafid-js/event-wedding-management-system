Tambah Data<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Group &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
    <div class="section-header-back">
            <a href="<?= site_url('groups') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Group</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Group Kontak
                </h4>
            </div>
           <div class="card-body col-md-6">
            <form action="<?= site_url('groups/update/'.$group->id_group) ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
                <div class="form-group">
                    <label for="">Nama Group Kontak *</label>
                    <input type="text" name="name_group" value="<?= $group->name_group ?>" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="">Info</label>
                   <textarea name="info_group" value="<?= $group->info_group ?>" id="" class="form-control" cols="30" rows="10"></textarea>
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
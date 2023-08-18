Tambah Data<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Update Contact &mdash; yukNikah</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
    <div class="section-header-back">
            <a href="<?= site_url('contacts') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Contact</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Contact
                </h4>
            </div>
           <div class="card-body col-md-6">
           <?php $errors = session()->getFlashdata('errors'); ?>
            <form action="<?= site_url('contacts/'. $contact->id_contact) ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Group *</label>
                <select name="id_group" class="form-control <?= isset($errors['id_group']) ? 'is-invalid' : null ?>">
                    <option value="" hidden></option>
                    <?php foreach($groups as $key => $value) : ?>
                        <option value="<?= $value->id_group ?>" <?= old('id_group',$contact->id_group) == $value->id_group ? 'selected' : null ?>><?= $value->name_group ?></option>
                        <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                <?= isset($errors['id_group']) ? $errors['id_group'] : null ?>"
                </div>
            </div>
            <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="">Nama Kontak *</label>
                    <input type="text" name="name_contact" value="<?= old('name_contact', $contact->name_contact) ?>" class="form-control <?= isset($errors['name_contact']) ? 'is-invalid' : null ?>">
                    <div class="invalid-feedback">
                <?= isset($errors['name_contact']) ? $errors['name_contact'] : null ?>"
                </div>
                </div>
                <div class="form-group">
                    <label for="">Nama Alias</label>
                    <input type="text" name="name_alias" value="<?= $contact->name_alias ?>"class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="phone" value="<?= $contact->phone ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?= $contact->email ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="address" value="<?= $contact->address ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Info (Kota / Instansi / dll</label>
                   <textarea name="info_contact" value="<?= $contact->info_contact ?>" id="" class="form-control" cols="30" rows="10"></textarea>
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
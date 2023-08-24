<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>KRS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">KRS</div>
            </div>
        </div>

        <div id="show_alert"></div>
        <div class="card col-md-7">
            <div class="card-header">
                <h4>Form Input KRS (Kartu Rencana Studi)</h4>
            </div>
            <form action="#" method="POST" id="add_form" name="check" onsubmit="return checkingUserName()">
                <table class="table table-bordered" id="table_field">
                    <thead>
                        <tr>
                            <th scope="col">MATA KULIAH</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php foreach ($user as $usr) : ?>
                                    <input type="hidden" name="id_user[]" value="<?php echo $usr->id ?>">
                                <?php endforeach; ?>
                                <select class="form-control" name="id_mk[]" required="required">
                                    <option value="">- Pilih Mata Kuliah -</option>
                                    <?php foreach ($matakuliah as $mk) : ?>
                                        <option value="<?php echo $mk->id ?>"><?php echo $mk->mk ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span id="mata_kuliah_error" class="text-danger"></span>
                            </td>
                            <td>
                                <div class="buttons">
                                    <input type="button" class="btn btn-icon btn-primary" name="add" id="add" value="Tambah">
                                </div>

                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="submit" id="add_btn" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>



        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row justify-content-center">
                        <div class="invoice-title">
                            <h4 style="font-family:'Times New Roman', Times, serif;">KARTU RENCANA STUDI</h4>
                        </div>
                        <div class="col-lg-12">
                            <hr>

                            <div class="row">
                                <div class="col-md-8">
                                    <?php foreach ($user as $usr) : ?>
                                        <div class="form-group row">
                                            <label class="col-sm-3">NIM</label>
                                            <div class="col-sm-9">
                                                <label for="">: <?php echo $usr->nim ?></label>
                                            </div>
                                            <label class="col-sm-3">NAMA </label>
                                            <div class="col-sm-9">
                                                <label for="">: <?php echo $usr->nama; ?></label>
                                            </div>
                                            <label class="col-sm-3">PROGRAM STUDI </label>
                                            <div class="col-sm-9">
                                                <label for="">: <?php echo $usr->program_studi ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="card">
                                <table class="table table-bordered">
                                    <thead>

                                        <tr>
                                            <th scope="col">KODE MK</th>
                                            <th scope="col">MATA KULIAH</th>
                                            <th scope="col">SKS</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($krs as $kr) : ?>
                                            <tr>
                                                <td><?php echo $kr->kd_mk ?></td>
                                                <td><?php echo $kr->mk ?></td>
                                                <td><?php echo $kr->sks ?></td>
                                                <td>
                                                    <div class="buttons">
                                                        <a href="<?php echo base_url('krs/hapus_data/' . $kr->id) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="<?php echo base_url('printtopdf/print') ?>" method="POST" class="text-md-left">
                    <?php foreach ($krs as $kr) : ?>
                        <input type="hidden" name="id_user" value="<?php echo $kr->id_user ?>">
                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                </form>

            </div>

        </div>
</div>
</div>
</section>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var html = `
		<tr class="append_item">


								<td>
							
							
								<?php foreach ($user as $usr) : ?>
								<input type="hidden" name="id_user[]" value="<?php echo $usr->id ?>">
								<?php endforeach; ?>
								<select class="form-control" required="required" name="id_mk[]">
								<option value="">- Pilih Mata Kuliah -</option>
								<?php foreach ($matakuliah as $mk) : ?>
								<option value="<?php echo $mk->id ?>"><?php echo $mk->mk ?></option>
								<?php endforeach; ?>
				
							</select>
					
								</td>
								<td>
									<div class="buttons">
									<input type="button" class="btn btn-icon btn-danger" name="remove" id="remove" value="Hapus">
									</div>
				
								</td>
					
							
							</tr>
				
							`;

        var max = 5;
        var x = 1;

        $("#add").click(function() {
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }
        });
        $("#table_field").on('click', '#remove', function() {
            $(this).closest('tr').remove();
            x--;
        });



        $("#add_form").submit(function(e) {

                e.preventDefault();
                $("#add_btn").val('Adding...');
                $.ajax({
                    url: '<?php echo base_url() ?>krs/tambah_data_krs_aksi',
                    method: 'post',
                    data: $(this).serialize(),
                    success: function(response) {

                        $("#add_btn").val('Add');
                        $("#add_form")[0].reset();
                        $(".append_item").remove();

                        $("#show_alert").html(`<div class="alert alert-success role="alert">${response}</div>`);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        // window.location.reload();


                    },
                })
            },

        )
    });
</script>
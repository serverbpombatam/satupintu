<section class="content-header">
  <h1>
    <div class="icon">
      <i class="glyphicon glyphicon-list-alt text-red"></i> Daftar CAPA Petugas
      <!-- <small>semua berawal dari sini</small> -->
    </div>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo base_url(); ?>Dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?= site_url('Admin/loglab') ?>"><i class="fa fa-user"></i> Feedback</a></li>

</section>

<section class="content">

  <div class="box">
    <div class="box-header with-border">
      <h4>Hai <b>Petugas!!</b> </h4>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <h5> Berikut daftar CAPA untuk Sarana. </h5>
      <?php if ($fileCapa > 0) {
      ?>


        <div class="alert alert-danger alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-exclamation"></i> Alert!</h4>
          Hallo Petugas ! Terdapat <strong><?php echo $fileCapa ?></strong> surat <?= $this->session->flashdata('flash_error'); ?> yang butuh upload soft file CAPA. Silahkan cek pada tabel!

        <?php  }; ?>

        </div>

        <div class="pull-right">
          <ul>
            <a class="btn btn-primary" href="<?php echo base_url('petugas/surat_capa/buatCapa') ?>">
              <i class="fa fa-plus"></i>&nbsp; Tambah Data
            </a> </span>
          </ul>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">
                <table id="tbl" data-sort-name="closed" class="table table-bordered table-striped" data-sort-order="asc">
                  <thead>
                    <tr>
                      <th>Nomor Surat Peringatan</th>
                      <th>Nama Sarana</th>
                      <th>Tgl CAPA </th>
                      <th>Hal</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (isset($capa)) {
                      foreach ($capa->result() as $row) {
                        echo "<tr>";
                        echo "<td>" . $row->noSuratPeringatan . "</td>";
                        echo "<td>" . $row->namaSarana . "</td>";
                        echo "<td>" . $row->tglSuratPeringatan . "</td>";
                        echo "<td>" . $row->jenisCapa . "</td>";


                        echo "</td>";

                        echo "<td class='dt-center'>" ?>
                        <a href="#" class="btn btn-success btn-sm" data-tooltip="tooltip" title="Edit" id="editFed" data-id="<?= $row->idFeedback ?>" data-nomor="<?= $row->noSuratFeedback ?>" data-isi="<?= $row->isiFeedback ?>" data-tgl="<?= $row->tglFeedback ?>" data-toggle="modal" data-target="#editFeedback"><i class="fa fa-edit"></i></a>

                        <a href="#" data-tooltip="tooltip" title="Hapus" class="btn btn-danger btn-sm" id="hapusFed" data-id="<?= $row->idFeedback ?>" data-toggle="modal" data-target="#hapusFeedback"><i class="fa fa-trash"></i></a>

                        <?php if ($row->file_feedback != 0) { ?>
                          <a href="../assets/uploads/files/feedback/feedback-<?php echo $row->noSuratFeedback ?>.pdf " data-tooltip="tooltip" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>

                        <?php  } else {
                        ?>
                          <a href="#" data-tooltip="tooltip" title="Lihat" class="btn btn-primary btn-sm" disabled><i class="fa fa-eye"></i></a>
                        <?php } ?>


                        </td>

                    <?php
                      }
                    } else {
                      echo "no record found";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Edit Feedback -->
        <div id="editFeedback" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="icon fa fa-edit"></i> Edit Data Surat Feedback</h4>
              </div>
              <div class="modal-body" id=editData>
                <form action="<?= base_url('admin/Feedback/ubahSuratFeedback') ?>" method="post" enctype="multipart/form-data">
                  <div class="box box-success">
                    <div class="box-body">

                      <div class="form-group">
                        <input type="hidden" class="form-control" name="idF" id="idF">
                      </div>

                      <!-- No Surat Feedback -->
                      <div class="form-group">
                        <label for="noEdit">No. Surat Feedback CAPA</label> <small class="text-danger">*</small>
                        <input type="text" class="form-control" name="noF" id="noF" required>
                      </div>

                      <!-- Isi Surat Feedback -->
                      <div class="form-group">
                        <label for="noEdit">Perihal Surat Feedback CAPA</label> <small class="text-danger">*</small>
                        <input type="text" class="form-control" name="isiF" id="isiF" required>
                      </div>

                      <!-- tanggal surat -->
                      <div class="form-group ">
                        <label for="noEdit"><i class="fa fa-calendar"></i> Tanggal Feedback</label> <small class="text-danger">*</small>
                        <input class="form-control" type="date" name="tglF" id="tglF" required>

                      </div>

                    </div><!-- /.box-body -->
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                      <button type="submit" name="update" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.10.0.min.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).on("click", "#editFed", function() {
            var idFed = $(this).data('id');
            var noFed = $(this).data('nomor');
            var isiFed = $(this).data('isi');
            var tglFed = $(this).data('tgl');

            $("#editData #idF").val(idFed);
            $("#editData #noF").val(noFed);
            $("#editData #isiF").val(isiFed);
            $("#editData #tglF").val(tglFed);
          });
        </script>
        <!-- /. Edit Feedback -->


        <!-- Hapus Peringatan -->
        <div id="hapusFeedback" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="icon fa fa-ban"></i> ALert !</h4>
              </div>
              <div class="modal-body" id="hapusData">
                <form role="form" method="post" action="<?= base_url('admin/Feedback/hapus_suratFeedback') ?>">
                  <div class="box-body">
                    <div class="form-group" style="text-align:center">Anda yakin akan menghapus Surat Feedback CAPA ini ?</label>
                      <input type="hidden" id="idFeedback" name="idFeedback">

                    </div>
                  </div><!-- /.box-body -->
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-check"></i> Hapus</button>
                  </div>
                </form>
                <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                  $(document).on("click", "#hapusFed", function() {
                    var id = $(this).data('id');
                    $("#hapusData #idFeedback").val(id);
                  });
                </script>
              </div>

            </div>
          </div>
        </div>


</section>
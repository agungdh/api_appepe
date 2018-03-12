<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>UBAH JENIS PELANGGARAN</font></strong></h4>
  </div><!-- /.box-header -->

  <!-- form start -->
  <form name="form" id="form" role="form" method="post" action="<?php echo base_url('jenis/aksi_ubah'); ?>">
    <div class="box-body">

      <input type="hidden" name="id" value="<?php echo $data['jenis']->id; ?>">

    <div class="form-group">
      <label for="jenis">Jenis Pelanggaran</label>
          <input required value="<?php echo $data['jenis']->jenis; ?>" type="text" class="form-control" id="jenis" placeholder="Isi Jenis Pelanggaran" name="jenis">          
    </div>

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('jenis'); ?>" class="btn btn-info">Batal</a>
    </div>
  </form>
</div><!-- /.box -->
<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>
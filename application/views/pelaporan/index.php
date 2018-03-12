<?php
$flashdata = $this->session->flashdata('pesan');
if ($flashdata != null) {
  ?>
  <script type="text/javascript">
    alert("<?php echo $flashdata; ?>");
  </script>
  <?php
}
?>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>PELAPORAN PELANGGARAN</font></strong></h4> </div><!-- /.box-header -->

  <!-- form start -->
  <form enctype="multipart/form-data" name="form" id="form" role="form" method="post" action="<?php echo base_url('pelaporan/aksi'); ?>"> <div class="box-body">

     <div class="form-group">
      <label for="tanggal">Tanggal</label>
          <input required type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="tanggal" placeholder="Isi Tanggal" name="tanggal">          
    </div>

    <div class="form-group">
      <label for="keterangan">Keterangan</label>
          <textarea required name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Isi Keterangan"></textarea>
    </div>

     <div class="form-group">
      <label for="file">File</label>
          <input required type="file" class="form-control" id="file" placeholder="Isi file" name="file">          
    </div>    

    </div><!-- /.box-body -->

    <div class="box-footer">
      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a class="btn btn-info" href="<?php echo base_url('pelaporan'); ?>">Reset</a>
    </div>
  </form>
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>
<?php 
// var_dump($data['versi_borang']);
// exit();
?>
<script type="text/javascript" language="javascript" >
  var dTable;
  $(document).ready(function() {
    dTable = $('#lookup').DataTable({
      responsive: true
    });
  });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA PELANGGARAN</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Pelanggaran</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['pelanggaran'] as $item) {
          ?>
          <tr>
            <td><?php echo $this->pustaka->tanggal_indo($this->m_universal->get_id('pelaporan', $item->pelaporan_id)->tanggal); ?></td>
            <td><?php echo $this->m_universal->get_id('jenis', $item->jenis_id)->jenis; ?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('limbah/aksi_hapus/'); ?>" + id;
  }
}
</script>

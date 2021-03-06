<?php 
// var_dump($data['versi_borang']);
// exit();
?>
<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
    $('#lookup').DataTable({
      responsive: true
    });
    $('#lookup2').DataTable({
      responsive: true
    });
  });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA LAPORAN PELANGGARAN (AKTIF)</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Keterangan</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['laporan_aktif'] as $item) {
          ?>
          <tr>
            <td><?php echo $this->pustaka->tanggal_indo($item->tanggal); ?></td>
            <td><?php echo $item->keterangan; ?></td>
            <td>
              <a class="btn btn-primary" href="<?php echo base_url('laporan/detail/'.$item->id) ?>"><i class="fa fa-share"></i>  Detail</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DATA LAPORAN PELANGGARAN (NONAKTIF)</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
    </div>

    <table id="lookup2" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Keterangan</th>
          <th>Proses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['laporan_nonaktif'] as $item) {
          ?>
          <tr>
            <td><?php echo $this->pustaka->tanggal_indo($item->tanggal); ?></td>
            <td><?php echo $item->keterangan; ?></td>
            <td>
              <a class="btn btn-primary" href="<?php echo base_url('laporan/detail/'.$item->id) ?>"><i class="fa fa-share"></i>  Detail</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

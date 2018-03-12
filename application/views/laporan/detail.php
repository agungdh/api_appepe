<?php 
// var_dump($data['versi_borang']);
// exit();
$status = $data['laporan']->status == 1 ? "AKTIF" : "NONAKTIF";
?>
<script type="text/javascript" language="javascript" >
  $(document).ready(function() {
    $('#lookup').DataTable({
      responsive: true
    });
  });
</script>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4><strong><font color=blue>DETAIL LAPORAN PELANGGARAN (<?php echo $status; ?>)</font></strong></h4>
  </div><!-- /.box-header -->

    <div class="box-body">

    <div class="form-group">
      <p><b>Tanggal:</b> <?php echo $this->pustaka->tanggal_indo($data['laporan']->tanggal); ?></p>
      <p><b>Keterangan:</b> <?php echo $data['laporan']->keterangan; ?></p>
      <p><b>Bukti:</b><a target="_blank" href="<?php echo base_url($data['laporan']->lokasi_file); ?>"> <?php echo $data['laporan']->mime; ?></a></p>
        <a href="<?php echo base_url('laporan'); ?>" class="btn btn-primary">Kembali</a>
      <?php
      if ($data['laporan']->status != 1) {
        ?>
        <a href="<?php echo base_url('laporan/status/' . $data['laporan']->id); ?>" class="btn btn-success">Aktif</a>
        <?php
      } else {
        ?>
        <a href="<?php echo base_url('laporan/status/' . $data['laporan']->id); ?>" class="btn btn-danger">Nonaktif</a>
        <?php
      }
      ?>
      <form name="form" id="form" role="form" method="post" action="<?php echo base_url('laporan/aksi_tambah'); ?>">
      <div class="box-body">

      <div class="form-group">
      <?php
      if ($data['laporan']->status == 1) {
        ?>
        <h3>TAMBAH PELANGGARAN</h3>
        <input type="hidden" name="pelaporan" value="<?php echo $data['laporan']->id; ?>">
      <label for="mahasiswa">Mahasiswa</label>
          <select id="mahasiswa" class="form-control select2" name="mahasiswa">
            <?php
            foreach ($data['mahasiswa'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->nama . ' (' . $item->nim . ')'; ?></option>
              <?php
            }
            ?>
          </select>          
      </div>

      <div class="form-group">
      <label for="jenis">Jenis</label>
          <select id="jenis" class="form-control select2" name="jenis">
            <?php
            foreach ($data['jenis'] as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->jenis; ?></option>
              <?php
            }
            ?>
          </select>          
      </div>

      <input class="btn btn-success" name="proses" type="submit" value="Simpan Data" />
      <a href="<?php echo base_url('laporan/detail/' . $data['laporan']->id); ?>" class="btn btn-info">Reset</a>
        <?php
      }
      ?>
        

      </div><!-- /.box-body -->

    </div>

    <table id="lookup" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Mahasiswa</th>
          <th>Jenis Pelanggaran</th>
          <?php
              if ($data['laporan']->status == 1) {
                ?>
                <th>Proses</th>
                <?php
              }
                ?>              
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['pelanggaran'] as $item) {
          ?>
          <tr>
            <td><?php echo $this->db->get_where('mahasiswa', array('id' => $item->mahasiswa_id))->row()->nama; ?></td>
            <td><?php echo $this->db->get_where('jenis', array('id' => $item->jenis_id))->row()->jenis; ?></td>
            <td>
              <?php
              if ($data['laporan']->status == 1) {
                ?>
                <a class="btn btn-danger" onclick="hapus('<?php echo $item->id; ?>')"><i class="fa fa-trash"></i> </a>
                <?php
              }
              ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
      
    </table>
  </div><!-- /.boxbody -->
</div><!-- /.box -->

<script type="text/javascript">
$(function () {
  $('.select2').select2()
});
</script>

<script type="text/javascript">
function hapus(id) {
  if (confirm("Yakin hapus ?")) {
    window.location = "<?php echo base_url('laporan/aksi_hapus/'); ?>" + id;
  }
}
</script>

<?php if(validation_errors()!=""){ ?>
<div class="alert alert-warning alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4>  <i class="icon fa fa-check"></i> Information!</h4>
  <?php echo validation_errors()?>
</div>
<?php } ?>

<?php if($this->session->flashdata('alert_form')!=""){ ?>
<div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4>  <i class="icon fa fa-check"></i> Information!</h4>
  <?php echo $this->session->flashdata('alert_form')?>
</div>
<?php } ?>
<div id="notification">
</div>
<div class="row" style="background:#FAFAFA">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="<?php if(!isset($_GET['tab'])) echo "active"; ?>"><a href="#tab_1" data-toggle="tab">1. Form Permohonan Rekomendasi TRUP</a></li>
      <li class="<?php if(isset($_GET['tab']) && $_GET['tab']=='tab_2') echo "active"; ?>"><a href="#tab_2" data-toggle="tab">2. Daftar Komoditi Pembibitan</a></li>
    </ul>
    <div class="tab-content">


      <div class="tab-pane <?php if(!isset($_GET['tab'])) echo "active"; ?>" id="tab_1">    
        <div class="row">
          <form action="<?php echo base_url()."users/trup_draft/".$kode_trup."/update"; ?>" method="post">
          <div class="col-md-6 ">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-info-circle"></i> Informasi Pemohon Rekomendasi TRUP</h3>
              </div>
              <div class="box-body">
                <strong>Nama : <?php echo $nama; ?></strong><br>
                Jabatan : <?php echo $jabatan; ?><br>
                Telepon : <?php echo $phone_number; ?><br>
                Email : <?php echo $email; ?><br>
                Alamat : <?php echo $address; ?><br>
                Desa  : <?php echo $nama_desa; ?><br>
                Kecamatan  : <?php echo $nama_kecamatan; ?><br>
                Kabupaten  : <?php echo $nama_kota; ?><br>
              </div>
            </div>

            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-check-circle-o"></i> Lokasi Pembibitan</h3>
              </div>
              <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon">
                  <div style="width:80px">Provinsi</div>
                </span>
                <select class="form-control" name="id_propinsi" />{provinsi_option}</select>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">
                  <div style="width:80px">Kota / Kab</div>
                </span>
                <select class="form-control" name="id_kota" /></select>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">
                  <div style="width:80px">Kecamatan</div>
                </span>
                <select class="form-control" name="id_kecamatan" /></select>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon">
                  <div style="width:80px">Desa</div>
                </span>
                <select class="form-control" name="id_desa" /></select>
              </div>
              <br>
              <div class="form-group">
                <button type="submit" id="btn-save" class="btn btn-warning btn-social"><i class="fa fa-folder-open"></i> Simpan Pendaftaran</button>
                <button type="button" id="btn-send" class="btn btn-danger btn-social"><i class="fa fa-external-link"></i> Kirim Pendaftaran</button>
                <button type="button" id="btn-back" class="btn btn-primary btn-social"><i class="fa fa-reply"></i> Kembali</button>
              </div>
              <br>
              <div class="row">
                  <p class="login-box-msg">
                    <ul>
                      <li>Untuk dapat memiliki sertifikat benih, anda diwajibkan memiliki TRUP Produsen Benih aktif.</li>
                      <li>Silahkan tentukan jenis TRUP yang anda butuhkan (Produsen Benih / Pengedar Benih).</li>
                      <li>Pengajuan nomor TRUP tidak dikenakan biaya.</li>
                      <li>Masa berlaku TRUP adalah 1 (satu) tahun, pastikan nomor TRUP anda tetap aktif.</li>
                    </ul>
                  </p>
              </div>
             </div>
            </div>

          </div>
          <div class="col-md-6">
              <div class="row">
              <div class="col-md-12">
                <div class="box box-success">
                  <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-check-circle-o"></i> Detail Rekomendasi TRUP</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label>Tanggal Pendaftaran TRUP :</label>
                      <input type="text" class="form-control" name="tgl_daftar" placeholder="Tanggal Pendaftaran"  id="datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php 
                      if(set_value('tgl_daftar')=="" && isset($tgl_daftar)){
                        echo $tgl_daftar;
                      }else{
                        echo set_value('tgl_daftar');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>Jenis TRUP :</label>
                      <select class="form-control" name="jenis"/>
                        <option value="produsen" <?php 
                        if(isset($jenis) && $jenis=="produsen")  echo "selected";
                        ?>>Produsen Benih</option>
                        <option value="pengedar" <?php 
                        if(isset($jenis) && $jenis=="pengedar")  echo "selected";
                        ?>>Pengedar Benih</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Pemohon :</label>
                      <input type="text" class="form-control" placeholder="Nama Pemohon" name="nama" value="<?php 
                      if(set_value('nama')=="" && isset($nama)){
                        echo $nama;
                      }else{
                        echo  set_value('nama');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>Nama Ketua / Penanggung Jawab:</label>
                      <input type="text" class="form-control" placeholder="Penanggung Jawab" name="penanggungjawab" value="<?php 
                      if(set_value('penanggungjawab')=="" && isset($penanggungjawab)){
                        echo $penanggungjawab;
                      }else{
                        echo  set_value('penanggungjawab');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>No KTP:</label>
                      <input type="text" class="form-control" placeholder="No KTP" name="ktp" value="<?php 
                      if(set_value('ktp')=="" && isset($ktp)){
                        echo $ktp;
                      }else{
                        echo  set_value('ktp');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>Pengalaman jadi penangkar (tahun) :</label>
                      <select class="form-control" name="pengalaman" />{pengalaman_option}</select>
                    </div>
                    <div class="form-group">
                      <label>Asal Modal Usaha :</label>
                      <input type="text" class="form-control" placeholder="Asal Modal" name="modal_asal" value="<?php 
                      if(set_value('modal_asal')=="" && isset($modal_asal)){
                        echo $modal_asal;
                      }else{
                        echo  set_value('modal_asal');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>Jumlah Modal Usaha (Rp) :</label>
                      <input type="text" class="form-control" placeholder="Jumlah Modal" name="modal_nilai" value="<?php 
                      if(set_value('modal_nilai')=="" && isset($modal_nilai)){
                        echo $modal_nilai;
                      }else{
                        echo  set_value('modal_nilai');
                      }
                      ?>" />
                    </div>
                    <div class="form-group">
                      <label>Kerjasama Kelompok :</label>
                      <select class="form-control" name="kerjasama" />
                        <option value="tidakada" <?php 
                        if(isset($kerjasama) && $kerjasama=="tidakada")  echo "selected";
                        ?>>Tidak Ada</option>
                        <option value="ada" <?php 
                        if(isset($kerjasama) && $kerjasama=="ada")  echo "selected";
                        ?>>Ada</option>
                      </select>
                    </div>
                  </div>
                </div>

                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
      <div class="tab-pane <?php if(isset($_GET['tab']) && $_GET['tab']=='tab_2') echo "active"; ?>" id="tab_2">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-check-circle-o"></i> a. Keadaan  Kegiatan Pembibitan ( Eksisting )</h3>
              </div>

              <form action="<?php echo base_url().'users/trup_eksisting_delete'."/".$kode_trup; ?>" method="POST">
              <div class="box-body">
                  <div class="col-md-12 col-md-offset-4">
                      <button type="button" id="btn-addeksisting" class="btn btn-primary ">Tambah Komoditi</button>
                      <button type="submit" id="btn-deleksisting" class="btn btn-danger " onClick="if(!confirm('Hapus semua data yang dipilih?')) return false;">Hapus Komoditi</button>
                  </div>
                  <br><br>
                  <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th>No</th>
                        <th>Komoditi</th>
                        <th>Varietas / Klon</th>
                        <th>Jumlah / Luas</th>
                        <th>Umur</th>
                        <th>Asal Benih</th>
                        <th>Rencana Penyaluran</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $start=1;
                      foreach($trup_eksisting as $row):?>
                        <tr>
                          <td><input type="checkbox" name="trup_eksisting[]" value="<?php echo $row->kode_trup;?>_<?php echo $row->kode_varietas;?>_<?php echo $row->kode_komoditi;?>" /></td>
                          <td><?php  echo $start++; ?>&nbsp;</td>
                          <td><?php echo $row->komoditi;?>&nbsp;</td>
                          <td><?php echo $row->varietas;?>&nbsp;</td>
                          <td><?php echo $row->jml." ".$row->kode_satuan;?>&nbsp;</td>
                          <td><?php echo $row->umur;?>&nbsp;</td>
                          <td><?php echo $row->asal;?>&nbsp;</td>
                          <td><?php echo $row->penyaluran;?>&nbsp;</td>
                          <td align="center"><a class="btn btn-primary btn-xs" href="<?php echo base_url()?>users/trup_detail_eksisting/<?php echo $row->kode_trup;?>/<?php echo $row->kode_varietas;?>/<?php echo $row->kode_komoditi;?>" title="Detail Account">Detail</a></td>                        </tr>
                      <?php endforeach;?> 
                    </tbody>
                  </table>
            </div>
            </form>
            </div>
          </div>

          <div class="col-md-12">
            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title"><i class="fa fa-check-circle-o"></i> b. Rencana Kegiatan Pembibitan</h3>
              </div>

              <form action="<?php echo base_url().'users/trup_rencana_delete'."/".$kode_trup; ?>" method="POST">
              <div class="box-body">
                  <div class="col-md-12 col-md-offset-4">
                      <button type="button" id="btn-addrencana" class="btn btn-primary ">Tambah Komoditi</button>
                      <button type="submit" id="btn-delrencana" class="btn btn-danger " onClick="if(!confirm('Hapus semua data yang dipilih?')) return false;">Hapus Komoditi</button>
                  </div>
                  <br><br>
                  <table id="dataTable" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>&nbsp;</th>
                        <th>No</th>
                        <th>Komoditi</th>
                        <th>Varietas / Klon</th>
                        <th>Jumlah / Luas</th>
                        <th>Umur</th>
                        <th>Asal Benih</th>
                        <th>Rencana Penyaluran</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $start=1;
                      foreach($trup_rencana as $row):?>
                        <tr>
                          <td><input type="checkbox" name="trup_rencana[]" value="<?php echo $row->kode_trup;?>_<?php echo $row->kode_varietas;?>_<?php echo $row->kode_komoditi;?>" /></td>
                          <td><?php  echo $start++; ?>&nbsp;</td>
                          <td><?php echo $row->komoditi;?>&nbsp;</td>
                          <td><?php echo $row->varietas;?>&nbsp;</td>
                          <td><?php echo $row->jml." ".$row->kode_satuan;?>&nbsp;</td>
                          <td><?php echo $row->umur;?>&nbsp;</td>
                          <td><?php echo $row->asal;?>&nbsp;</td>
                          <td><?php echo $row->penyaluran;?>&nbsp;</td>
                          <td align="center"><a class="btn btn-primary btn-xs" href="<?php echo base_url()?>users/trup_detail_rencana/<?php echo $row->kode_trup;?>/<?php echo $row->kode_varietas;?>/<?php echo $row->kode_komoditi;?>" title="Detail Account">Detail</a></td>                        </tr>
                      <?php endforeach;?>    
                    </tbody>
                  </table>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.form-box -->
</div><!-- /.register-box -->

<script src="<?php echo base_url()?>public/themes/disbun/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/themes/disbun/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>public/themes/disbun/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $("#menu_dashboard_trup").addClass("active");
    $("#menu_dashboard").addClass("active");

    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    $("#btn-back").click(function(){
      document.location.href="<?php echo base_url().'users/trup'; ?>";
    });

    $("#btn-send").click(function(){
      if (confirm('Anda yakin data telah lengkap? anda tidak dapat mengubah data yang telah dikirim.')) {
        document.location.href="<?php echo base_url()?>users/kirim_trup/{kode_trup}";
      };
    });

    $("#btn-addrencana").click(function(){
      document.location.href="<?php echo base_url().'users/trup_add_rencana/'.$kode_trup; ?>";
    });

    $("#btn-addeksisting").click(function(){
      document.location.href="<?php echo base_url().'users/trup_add_eksisting/'.$kode_trup; ?>";
    });

    $("select[name='id_propinsi']").change(function() {
      $("select[name='id_kota']").html("<option>-</option>");
      $("select[name='id_kecamatan']").html("<option>-</option>");
      $("select[name='id_desa']").html("<option>-</option>");
      $.get('<?php echo base_url()?>disbun/kota/' + $('select[name=id_propinsi]').val()+'/0', function(response) {
        var data = eval(response);
        $("select[name='id_kota']").html(data.kota);
      }, "json");
    });

    $("select[name='id_kota']").change(function() {
      $("select[name='id_kecamatan']").html("<option>-</option>");
      $("select[name='id_desa']").html("<option>-</option>");
      $.get('<?php echo base_url()?>disbun/kecamatan/' + $('select[name=id_kota]').val()+'/0', function(response) {
        var data = eval(response);
        $("select[name='id_kecamatan']").html(data.kecamatan);
      }, "json");
    });

    $("select[name='id_kecamatan']").change(function() {
      $("select[name='id_desa']").html("<option>-</option>");
      $.get('<?php echo base_url()?>disbun/desa/' + $('select[name=id_kecamatan]').val()+'/0', function(response) {
        var data = eval(response);
        $("select[name='id_desa']").html(data.desa);
      }, "json");
    });

    $.get('<?php echo base_url()?>disbun/kota/{id_propinsi}/{id_kota}', function(response) {
      var data = eval(response);
      $("select[name='id_kota']").html(data.kota);
    }, "json");

    $.get('<?php echo base_url()?>disbun/kecamatan/{id_kota}/{id_kecamatan}', function(response) {
      var data = eval(response);
      $("select[name='id_kecamatan']").html(data.kecamatan);
    }, "json");

    $.get('<?php echo base_url()?>disbun/desa/{id_kecamatan}/{id_desa}', function(response) {
      var data = eval(response);
      $("select[name='id_desa']").html(data.desa);
    }, "json");


  });
</script>
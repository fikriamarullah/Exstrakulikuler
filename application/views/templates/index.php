<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h1 class="m-0 font-weight-bold text-primary"><?php echo $title;?>
<button type="button" class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">
  Tambah Data
</button>
     </div>
<div class="card-body">
    <?php echo $this->session->flashdata('pesan'); ?>
 <div class="table-responsive">
 <table class="table table-bordered " 
 id="dataTable" width="100%" cellspacing="0">
 <thead>                  
    <tr>
    <td>No</td>
       <th>Nama Anggota</th>
       <th>Kelas</th>
       <th>Alamat</th>
       <th>Tanggal Lahir</th>
       <th>ekstrakulikuler</th>
       <th>Foto</th>
       <th style="width: 125px;">Action</th>
    </tr>
</thead>
   <tbody>
    <?php 
    $no = 1;
    foreach ($tbl_anggota as $agt) :  ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $agt['nama_anggota']; ?></td>
            <td><?php echo $agt['kelas']; ?></td>
            <td><?php echo $agt['alamat']; ?></td>
            <td><?php echo $agt['tgl_lahir']; ?></td>
            <td><?php echo $agt['kategori_id']; ?></td>
            <td><img src="<?php echo base_url() . '/gambar/' . $agt['gambar']; ?>" width="50"></td>
            <td>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editmodal<?php echo $agt['id_anggota'];?>">
 <i class="fa fa-edit"></i>
</button>
                <a href="<?php echo base_url() ?>Home/hapus_data/<?php echo $agt['id_anggota']; ?>" class=" btn btn-danger"> <i class="fa fa-trash"></i></a>
            </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>



</div>
    </div>
    </div>

</div>
<!-- Modal untuk tambah Data-->

<!-- Button trigger modal -->


<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM TAMBAH DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php echo form_open_multipart('home/proses_tambah_data'); ?>
        <div class="form-group">
            <label>Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="number" name="kelas" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control"
            required="">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" name="tgl_lahir" class="form-control"
            required="">
        </div>
        <div class="form-group">
        <label for="">Keterangan</label>
          <select name="kategori_id" id="kategori_id"required="">
                <option value="sepak bola">Sepak Bola</option>
                <option value="basket">Basket</option>
                <option value="pencak silat">Pencak Silat</option>
                <option value="voli">Voli</option>
         </select>  
    </div>
    </div>
    <div class="form-group">
           <label>foto</label>
            <input type="file" name="userfile" class="form-control"
            size="20" required="">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<!--Akhir Modal-->

<!--Modal Untuk Edit-->
<?php $no = 0;
foreach ($tbl_anggota as $agt) : $no++; ?>
<div class="modal fade" id="editmodal<?php echo $agt['id_anggota']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM EDIT DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php echo form_open_multipart('home/proses_edit_data'); ?>

         <input type="hidden" name="id_anggota" value="<?php echo $agt['id_anggota']; ?>">

        <div class="form-group">
            <label>Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control" value="<?php echo $agt['nama_anggota']; ?>">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <input type="number" name="kelas" class="form-control" value="<?php echo $agt['kelas']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $agt['alamat']; ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $agt['tgl_lahir']; ?>">
        </div>
        <div class="form-group">
        <label for="">Keterangan</label>
          <select name="kategori_id" id="kategori_id" value="<?php echo $agt['kategori_id']; ?>">
                 <option value="sepak bola">Sepak Bola</option>
                <option value="basket">Basket</option>
                <option value="pencak silat">Pencak Silat</option>
                <option value="voli">Voli</option>
             
         </select>  
    </div>
   <div class="form-group">
           <label>Foto</label>
            <input type="file" name="userfile"  size="20">
    </div>
    <img src="<?php echo base_url() . '/gambar/' . $agt['gambar']; ?>" width="100">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!--Akhir Edit-->

           
         

<div class="container mt-4">

<!--alert jika kosong-->
<?php if(empty($mahasiswa)) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Data </strong> tidak ada
    <?php endif; ?>
    <?php if( $this->session->flashdata('flash') ) : ?>

<!--alert jika berhasil execute-->
<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Mahasiswa 
<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
   <h5>Daftar Mahasiswa</h5>
  <!--button tambah data-->
<a href="<?= base_url('mahasiswa/insert');?>" class="btn outline-primary mt-3 ">Tambah data mahasiswa</a>
  
  </div>
  <ul class="list-group list-group-flush">

    <!--looping data dari database / menampilkan -->
      <?php foreach ($mahasiswa as $show) : ?>
    <li class="list-group-item d-flex justify-content-between align-items-center"> 
        <h6 class="position-relative top-0 start-0"> <?= $show['nama'] ?>  </h6>
    
    <div class="btn-group position-relative top-0 and-0" role="group" aria-label="Basic mixed styles example">
    <a href="<?php base_url() ?>mahasiswa/detail/<?= $show['id']; ?>" class="btn btn-primary ">Detail</a>
    <a href="<?php base_url() ?>mahasiswa/edit/<?= $show['id']; ?>" class="btn btn-success ">Edited</a>
    <a href="<?php base_url() ?>mahasiswa/delete/<?= $show['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin kau mau menghapus data')">Hapus</a>

    </div>  
 </li>
 <?php endforeach; ?>
  </ul>
</div>

      </div>
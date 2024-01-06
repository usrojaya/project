<div class="container mt-4">

<!--Pagination-->
<?= $this->pagination->create_links(); ?>


<!--alert jika kosong-->
<?php if(empty($peoples)) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Data </strong> tidak ada
<?php
$this->session->unset_userdata('keyword');
?>
    <?php endif; ?>
    <?php if( $this->session->flashdata('flash') ) : ?>
    
<!--alert jika berhasil execute-->
<div class="alert alert-success alert-dismissible fade show" role="alert">
    Data Peoples
    <?= $get; ?>
<strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!--search -->
<!-- <div class="row">
  <div class="col-md-4">
    <form action="" method="post">
<div class="input-group mb-3">
 
  <input type="text" class="form-control" name="keyword">
  <input class="input-group-text" type='submit' name="submit">
</div>
    </form>
  </div>
</div> -->



<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
   <h5>Daftar peoples</h5>

   <button type="button" class="btn outline-primary position-relative">
  Data
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
  <?= $total_rows; ?> 
    <span class="visually-hidden"></span>
  </span>
</button>
  
  </div>
  <ul class="list-group list-group-flush">

    <!--looping data dari database / menampilkan -->
      <?php
      foreach ($peoples as $show) : ?>
    <li class="list-group-item d-flex justify-content-between align-items-center"> 
    <?= ++$start; ?> <h6 class="position-relative top-0 start-0"> <?= $show['name'] ?>  </h6>
      
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
<div class="container">
    <div class="row mt-3">
<div class="col-md-6">
    <div class="card">
        <div class="card-header">

            <h3 class="m-4"> <?= $judul ?> </h3>
        </div>
        <div class="card-body">
          
    <form action="" method="post">
  <div class="mb-3">
    <label for="nama" class="form-label">nama</label>
    <input type="hidden" name="id" class="form-control hidden" id="id" aria-describedby="id" value="<?= $mahasiswa['id'] ?>">
   
    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="<?= $mahasiswa['nama'] ?>">
    <small class="form-text text-danger">
      <?= form_error('nama')?>
    </small>
   </div>
  <div class="mb-3">
    <label for="nrp" class="form-label">nrp</label>
    <input type="number" name="nrp" class="form-control" id="nrp" value="<?= $mahasiswa['nrp'] ?>">
    <small class="form-text text-danger">
      <?= form_error('nrp')?>
    </small>
  </div>
   <div class="mb-3">
    <label for="email">email</label>
    <input type="email" name="email" class="form-control" id="email" value="<?= $mahasiswa['email'] ?>">
      <small class="form-text text-danger">
      <?= form_error('email')?>
    </small>
  </div>
   <div class="mb-3">
    <label for="jurusan">jurusan</label>
    <select class="form-select" name="jurusan" aria-label="Default select example" id="jurusan">
        <?php foreach($jurusan as $j) : ?>
            <?php if($j == $mahasiswa['jurusan']) : ?>
 
  <option value="<?= $j; ?>" selected><?= $j; ?></option>
<?php else : ?>
    <option value="<?= $j; ?>"><?= $j; ?></option>
    <?php endif; ?>
 <?php endforeach; ?>

</select>
<small class="form-text text-danger">
      <?= form_error('jurusan')?>
    </small>
  </div>
  <button type="submit" class="btn btn-primary float-right mt-4">Edit Data</button>
</form>
</div>
    </div>
</div>
    </div>
            </div>
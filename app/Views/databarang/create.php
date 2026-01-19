<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-8 mx-auto ms-5">
      <h2 class="text-center text-white fw-bold my-3">
        Form Tambah Data Barang

        <form class="text-white" action="/databarang/save" method="post">
          <?= csrf_field(); ?>

        <div class="row mb-4 align-items-center mt-5">
          <label for="namabarang" class="col-sm-4 col-form-label">
            Nama Barang
          </label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" autofocus>
          </div>
        </div>

        <div class="row mb-4 align-items-center mt-1">
          <label for="stok" class="col-sm-4 col-form-label">
            Stok
          </label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="stok" name="stok">
          </div>
        </div>

        <div class="row mb-4 align-items-center mt-1">
          <label for="tempat" class="col-sm-4 col-form-label">
            Tempat
          </label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="tempat" name="tempat">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary px-4">
            Sign in
          </button>
        </div>

      </form>
      </h2>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
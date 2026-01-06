<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
<div class="container-fluid mt-4">
  <div class="card shadow-sm">
    <div class="card-header header-barang text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0 text-judul">Data Barang</h5>
      <a href="#" class="btn btn-light btn-sm">+ Tambah Data</a>
    </div>

    <div class="table-safe">
        <table class="table table-bordered table-striped">
          <thead class="table-light text-center">
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Stok</th>
              <th>Tempat</th>
              <th width="180">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Proyektor Epson</td>
              <td class="text-center">2</td>
              <td>Ruang Perlengkapan</td>
              <td class="text-center">
        <div class="d-grid gap-1">
        <a href="#" class="btn btn-success btn-sm">Pinjam</a>
        <a href="#" class="btn btn-primary btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
         </div>
</td>

            </tr>

            <tr>
              <td class="text-center">2</td>
              <td>Sound System</td>
              <td class="text-center">1</td>
              <td>Gudang BEM</td>
              <td class="text-center">
        <div class="d-grid gap-1">
        <a href="#" class="btn btn-success btn-sm">Pinjam</a>
        <a href="#" class="btn btn-primary btn-sm">Edit</a>
        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
         </div>
</td>
            </tr>

            <!-- data lainnya -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
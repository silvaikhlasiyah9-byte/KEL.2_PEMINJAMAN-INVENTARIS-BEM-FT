<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
<div class="container-fluid mt-4">
  <div class="card shadow-sm">
    <div class="card-header header-barang text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0 text-judul">Data Barang</h5>
      <a href="/databarang/create" class="btn btn-light btn-sm">+ Tambah Data</a>
    </div>

    <div class="table-safe ps-5 ms-2 mt-3">
        <table class="table table-bordered table-striped">
          <thead class="table-light text-center">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Tempat</th>
              <th scope="col" width="180">Aksi</th>
            </tr>
          </thead>

          <tbody>
          <?php $i = 1; ?>

            <?php foreach ($db as $d): ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td class="nama_barang"><?= $d['nama_barang']; ?></td>
              <td class="stok"><?= $d['stok']; ?></td>
              <td><?= $d['tempat']; ?></td>
              <td class="tempat">
        <div class="d-grid gap-1">
        <a href="#" class="btn btn-success btn-sm">Pinjam</a>
        <a href="/databarang/edit/<?= $d['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
        <a href="/databarang/delete/<?= $d['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
         </div>
</td>

            </tr>
            <?php endforeach; ?>

            <!-- data lainnya -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
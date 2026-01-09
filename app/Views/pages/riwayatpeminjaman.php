<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
  <div class="container-fluid">

    <div class="card shadow-sm">
      <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Riwayat Peminjaman Barang</h5>
        <input type="text" class="form-control w-25" placeholder="Cari...">
      </div>

      <div class="card-body">
        <div class="table-responsive riwayat-table">
          <table class="table table-bordered table-striped align-middle">
            <thead class="table-light text-center">
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Peminjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th width="120">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td>Proyektor Epson</td>
                <td>Andi</td>
                <td>01-01-2026</td>
                <td>-</td>
                <td class="text-center">
                  <span class="badge bg-warning">Dipinjam</span>
                </td>
                <td class="text-center">
                  <a href="#" class="btn btn-info btn-sm aksi-btn">Detail</a>
                </td>
              </tr>

              <tr>
                <td class="text-center">2</td>
                <td>Sound System</td>
                <td>Budi</td>
                <td>30-12-2025</td>
                <td>02-01-2026</td>
                <td class="text-center">
                  <span class="badge bg-success">Kembali</span>
                </td>
                <td class="text-center">
                  <a href="#" class="btn btn-info btn-sm aksi-btn">Detail</a>
                </td>
              </tr>

              <tr>
                <td class="text-center">3</td>
                <td>Kamera</td>
                <td>Sinta</td>
                <td>28-12-2025</td>
                <td>03-01-2026</td>
                <td class="text-center">
                  <span class="badge bg-danger">Terlambat</span>
                </td>
                <td class="text-center">
                  <a href="#" class="btn btn-info btn-sm aksi-btn">Detail</a>
                </td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->endSection(); ?>
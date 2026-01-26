<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pt-2" style="margin-left: 120px;">
    <div class="d-flex justify-content-center gap-3">

        <!-- FORM PEMINJAMAN -->
        <div class="card shadow-sm p-2" style="width: 700px;">
           <?php if(session()->getFlashdata('success')): ?>
<div class="position-fixed top-0 start-50 translate-middle-x mt-2" style="z-index: 1050; width: auto;">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<div class="position-fixed top-0 start-50 translate-middle-x mt-2" style="z-index: 1050; width: auto;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
<?php endif; ?>

<form action="<?= base_url('peminjaman/store_dynamic') ?>" method="post">
    <?= csrf_field() ?>

    <h4 class="text-center mb-1">Form Peminjaman</h4>

    <div class="d-flex gap-3" style="flex-wrap: nowrap; margin-left: 5px;">
        
        <!-- Kotak Form Peminjaman (kiri) -->
        <div class="card shadow-sm p-3" style="width: 400px;">
            <div class="mb-2">
                <label>Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control" required autofocus>
            </div>

            <div class="mb-2">
                <label>Ormawa</label>
                <input type="text" name="ormawa" class="form-control" required>
            </div>

            <div class="mb-2">
                <label>Petugas</label>
                <input type="text" name="petugas" class="form-control" required>
            </div>

            <div class="mb-2">
                <label>Tanggal Peminjaman</label>
                <input type="datetime-local" name="waktu_peminjaman" class="form-control" required value="<?= date('Y-m-d H:i') ?>">
            </div>

            <div class="mb-2">
                <label>Tanggal Pengembalian</label>
                <input type="datetime-local" name="waktu_pengembalian" class="form-control" required>
            </div>
        </div>

        <!-- Kotak Daftar Barang (kanan) -->
        <div class="card shadow-sm p-3" style="width: 400px; max-height: 400px; overflow-y:auto;">
            <table class="table table-bordered table-sm" id="barangTable">
                <thead class="table-light text-center">
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select name="barang_id[]" class="form-control form-control-sm" required>
                                <option value="">-- Pilih Barang --</option>
                                <?php foreach ($nama_barang as $b): ?>
                                    <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="jumlah[]" class="form-control form-control-sm" min="1" required>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-2 gap-2">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="<?= base_url('/peminjaman') ?>" class="btn btn-secondary btn-sm">Batal</a>
                </div>
                <button type="button" class="btn btn-primary btn-sm" id="addRow">Tambah Barang</button>
            </div>
        </div>

    </div>
</form>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const addRowBtn = document.getElementById('addRow');
    const tableBody = document.querySelector('#barangTable tbody');

    const barangOptions = `<?= implode('', array_map(function($b){
        return "<option value='{$b['id']}'>{$b['nama_barang']} (Stok: {$b['stok']})</option>";
    }, $nama_barang)) ?>`;

    // Tambah baris
    addRowBtn.addEventListener('click', function(){
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <select name="barang_id[]" class="form-control form-control-sm" required>
                    <option value="">-- Pilih Barang --</option>
                    ${barangOptions}
                </select>
            </td>
            <td>
                <input type="number" name="jumlah[]" class="form-control form-control-sm" min="1" required>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm removeRow">Hapus</button>
            </td>
        `;
        tableBody.appendChild(row);
    });

    // Hapus baris
    tableBody.addEventListener('click', function(e){
        if(e.target.classList.contains('removeRow')){
            e.target.closest('tr').remove();
        }
    });

    // Preview pesanan
    document.getElementById('previewBtn').addEventListener('click', function () {
        document.getElementById('prevNama').innerText =
            document.querySelector('[name="nama_peminjam"]').value;
        document.getElementById('prevOrmawa').innerText =
            document.querySelector('[name="ormawa"]').value;
        document.getElementById('prevPetugas').innerText =
            document.querySelector('[name="petugas"]').value;
        document.getElementById('prevTglPinjam').innerText =
            document.querySelector('[name="tanggal_pinjam"]').value;
        document.getElementById('prevTglKembali').innerText =
            document.querySelector('[name="tanggal_kembali"]').value;

        const tbody = document.getElementById('previewTable');
        tbody.innerHTML = '';

        document.querySelectorAll('#barangTable tbody tr').forEach(row => {
            const barang = row.querySelector('select option:checked').text;
            const jumlah = row.querySelector('input[name="jumlah[]"]').value;

            if (barang && jumlah) {
                tbody.innerHTML += `
                    <tr>
                        <td>${barang}</td>
                        <td>${jumlah}</td>
                    </tr>
                `;
            }
        });

        new bootstrap.Modal(document.getElementById('previewModal')).show();
    });
});
</script>

<?= $this->endSection() ?>

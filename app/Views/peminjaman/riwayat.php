<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">

    <div class="riwayat-box card shadow-sm">
        <div class="card-body p-2">

            <h6 class="text-center mb-2 fw-bold">
                Riwayat Peminjaman
            </h6>

            <?php foreach ($riwayat as $r): ?>
                <div class="border rounded p-2 mb-2 small">

                    <!-- JUDUL SETIAP RIWAYAT -->
                    <div class="d-flex justify-content-between">
                        <div class="mt-1">
                            • Nama Peminjam : <strong><?= esc($r['nama_peminjam']) ?></strong>
                            <div class="text-muted">• ORMAWA : <?= esc($r['ormawa']) ?></div>
                            <div class="text-muted">• Petugas : <?= esc($r['petugas']) ?></div>
                        </div>
                        <div class="text-end text-muted">
                            <div>Waktu Peminjaman : <?= date('d/m/Y H:i', strtotime($r['waktu_peminjaman'])) ?></div>
                            <div>Waktu Pengembalian : <?= date('d/m/Y H:i', strtotime($r['waktu_pengembalian'])) ?></div>
                        </div>
                    </div>

                    <table class="table table-sm table-bordered mt-1 mb-0">
    <thead class="table-light">
        <tr>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($r['barang'] as $b): ?>
            <tr>
                <td class="text-center"><?= esc($b['nama_barang']) ?></td>
                <td class="text-center"><?= esc($b['jumlah']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

                </div>
            <?php endforeach; ?>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
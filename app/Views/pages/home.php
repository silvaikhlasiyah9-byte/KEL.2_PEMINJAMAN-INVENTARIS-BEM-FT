<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="main-content">
    <div class="container py-5 text-center">
        <h1 class="display-4">WELCOME!!!</h1>
        <h1 class="display-4">INVENTARIS BEM FT UM</h1>
        <p class="lead">Kelola inventaris dan peminjaman barang dengan mudah.</p>

        <a href="/pages/databarang" class="btn btn-primary btn-lg mt-4">Pinjam Barang</a>
    </div>
</div>
<?= $this->endSection(); ?>
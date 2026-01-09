
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="main-content">
  <div class="container mt-5">
    <h4 class="text-center mb-5 contact-title">Hubungi Kami</h4>

    <div class="row justify-content-center">
      
      <!-- WhatsApp -->
      <div class="col-md-3 col-sm-6 mb-4 d-flex justify-content-center">
        <div class="contact-box whatsapp">
          <i class="fab fa-whatsapp"></i>
          <h6>WhatsApp</h6>
          <p>+62 856-5947-7095 </p>
          <a href="https://wa.me/6285659477095" target="_blank">Chat Sekarang</a>
        </div>
      </div>

      <!-- Instagram -->
      <div class="col-md-3 col-sm-6 mb-4 d-flex justify-content-center">
        <div class="contact-box instagram">
          <i class="fab fa-instagram"></i>
          <h6>Instagram</h6>
          <p>@bemft_official</p>
          <a href="https://www.instagram.com/bemft.um" target="_blank">Kunjungi</a>
        </div>
      </div>

      <!-- Email -->
      <div class="col-md-3 col-sm-6 mb-4 d-flex justify-content-center">
        <div class="contact-box email">
          <i class="fas fa-envelope"></i>
          <h6>Email</h6>
          <p>bemft@gmail.com</p>
          <a href="mailto:bemft@gmail.com">Kirim Email</a>
        </div>
      </div>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>

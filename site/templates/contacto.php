<?php snippet('header') ?>

<main id="contact" class="contact">

  <section class="section">
    <div class='row outter-row'>
      <div class='col col-lg-6 col-md-5 full'>
        <?php if ($image = $page->lateral()->toFile()): ?>
          <img src='<?= $image->url() ?>' alt='<?= $image->filename() ?>'>
        <?php endif; ?>
      </div>
      <div class='form-col col-lg-6 col-md-7 col-12'>

        <h3><?= $page->header() ?></h3>
        <div class="optional-text mb-3">
          <?= $page->text()->kt() ?>
        </div>

        <form class="contact-form form" method="POST">
          
          <div class="honey">
              <label for="website">Website <abbr title="required">*</abbr></label>
              <input type="website" id="website" name="website">
          </div>

          <input type="hidden" name="csrf" value="<?= csrf() ?>">

          <div class="form-element">
              <label for="name">Nombre</label>
              <input class="input" type="text" id="name" name="name" value="<?= $data['name'] ?? null ?>" required>
          </div>

          <div class='row'>
            <div class='col col-md-6 col-12'>
              <div class="form-element">
                <label for="email">Correo</label>
                <input class="input" type="email" id="email" name="email" value="<?= $data['email'] ?? null ?>">
              </div>
            </div>
            <div class='col col-md-6 col-12'>
              <div class="form-element">
                  <label for="phone">Teléfono</label>
                  <input class="input" type="tel" id="phone" name="phone" value="<?= $data['phone'] ?? null ?>">
              </div>
            </div>
          </div>

          <div class="form-element">
              <label for="message">Mensaje</label>
              <textarea class="input" id="message" name="message" rows="5"><?= $data['message']?? null ?></textarea>
          </div>

          <?php if ($alerts) : ?>
            <div class="alert">
              <p>Ha ocurrido un error. Intentalo nuevamente.</p>
                <ul class="error-logs">
                  <?php foreach ($alerts as $message): ?>
                    <li><?= $message ?></li>
                  <?php endforeach ?>
                </ul>
            </div>
          <?php endif ?>

          <div class="text-end">
            <input class="button primary" type="submit" name="submit" value="Enviar">
          </div>

        </form>
      </div>
    </div>
  </section>
  
</main>

<?php snippet('footer') ?>
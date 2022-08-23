<footer class="footer">

  <div class="footer-content">
    <nav class="footer-navigation !hidden md:!grid grid-cols-[70px_190px] gap-x-5 gap-y-2 !w-[300px]">
      <?php foreach ($site->footerMenu()->toStructure() as $item): ?>
        <?php
          $target = $item->page()->toPage();
          $url = $target ? $target->url() : $item->url();
        ?>
        <a class="max-w-[196px]" href="<?= $url ?>"><?= $item->title()->html() ?></a>
      <?php endforeach ?>
    </nav>

    <div class="footer-logo">
      <a href="<?= $site->url(); ?>" title="<?= $site->title() ?>">
        <?php if ($logo = $site->logoWhite()->toFile()): ?>
          <img src='<?= $logo->url() ?>' alt='Multiplika'>
        <?php endif; ?>
      </a>
    </div>

    <div class="footer-social">
      <?php foreach($site->socialMedia()->toStructure() as $item): ?>
        <a href="<?= $item->url() ?>" title="<?= $item->title() ?>" target="_blank" rel="noopener noreferrer">
          <img src="<?= $item->icon()->toFile()->url() ?>" alt="<?= $item->title() ?>">
        </a>
      <?php endforeach; ?>
      <div class="copyright"><?= $site->copyright() ?></div>
    </div>
  </div>

</footer>

<!-- JAVASCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="module" src="<?= $site->url() ?>/assets/js/main.min.js"></script>
<?= js('assets/js/plugins.min.js') ?>

</body>
</html>
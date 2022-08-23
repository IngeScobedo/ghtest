<div class="menu" role="menu" id="responsive-menu">

  <div class="menu-backdrop toggle-menu"></div>

    <div class="menu-container">

      <div class="menu-upper">
        <a href="" class="button w-100 secondary c-white">Ingresar</a>
        <a href="" class="button w-100 primary mt-2">Crear cuenta</a>
      </div>

      <nav class="menu-navigation">
        <?php foreach ($site->headerMenu()->toStructure() as $item): ?>
          <?php
            $page = $item->page()->toPage();
            $url = $page ? $page->url() : $item->url();
          ?>
          <a href="<?= $url ?>">
            <?php if ($icon = $item->icon()->toFile()): ?>
              <img src='<?= $icon->url() ?>'>
            <?php endif; ?>
            <?= $item->title()->html() ?>
          </a>
        <?php endforeach ?>
      </nav>

  </div>
    
</div>
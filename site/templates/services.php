<?php snippet('header') ?>

<main class="services" id="services">

    <?php if($banner = $page->banner()->toFile()): ?>
    <section class="services-banner" data-aos="fade-up">
        <?php if ($res = $page->resBanner()->toFile()): ?>
            <img src="<?= $res->url() ?>" class="resBlock" loading="lazy">
        <?php endif; ?>
        <img src="<?= $banner->url() ?>" class="full" loading="lazy">
        <div class="content-container align-<?= $page->positionY() ?> justify-<?= $page->positionX() ?>">
            <div class="content text-<?= $page->textAlign() ?> c-<?= $page->textColor() ?>">
            <?= $page->header()->kt() ?>
            </div>
        </div>
    </section>
    <?php endif ?>

    <section class="section services-list">
        <?php $i = 0; foreach($page->services()->toStructure() as $service): ?>
            <div class="service-container row">
                <div class="col col-md-6 col-12 <?= $service->order() ?>">
                    <?php $files = $service->media()->toFiles() ?>
                    <?php if($files->count() && $files->nth(0)->type() == 'video'): ?>
                        <video class="media-video" src="<?= $files->nth(0)->url() ?>" controls muted playsinline loading="lazy" loop autoplay></video>
                    <?php elseif($files->count()): ?>
                        <div id="services-carousel-<?= $i ?>" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <?php foreach($files as $image): ?>
                                        <?php if($image->type() == 'image'): ?>
                                            <li class="splide__slide">
                                                <img src="<?= $image->url() ?>">
                                            </li>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col col-md-6 col-12">
                    <div class="service-content <?= $service->order() ?>">
                        <?= $service->text()->kt() ?>
                        <?php if($service->useButton()->toBool()): ?>
                        <?php
                            $target = $service->buttonPage()->toPage();
                            $url = $target ? $target->url() : $service->buttonUrl();
                        ?>
                        <a href="<?= $url ?>" class="slide-button button primary"><?= $service->buttonText() ?></a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php $i++ ?>
        <?php endforeach; ?>
    </section>

    <section class="section services-memberships" id="Membresías_y_beneficios">
    <h3 class="mb-4" data-aos="fade-up"><?= $page->membershipsHeader() ?></h3>
    <div class='row justify-content-center'>
      <div class='col col-xl-4 col-lg-5 col-md-6 col-12' data-aos="fade-right" data-aos-anchor-placement="top-bottom">
        <div class="membership-plan">
          <h4 class="mb-1"><?= $page->freeName() ?></h4>
          <h2 class="c-text">Gratis</h2>
          <p class="fw-light mb-4"><?= $page->freeDescription() ?></p>
          <div class="text-center mb-3">
            <a href="" class="button bordered px-5"><?= $page->freeButtonText() ?></a>
          </div>
          <p class="fw-medium">Características incluídas:</p>
          <?= $page->freeFeatures()->kt() ?>
        </div>
      </div>
      <div class='col col-xl-4 col-lg-5 col-md-6 col-12' data-aos="fade-left" data-aos-anchor-placement="top-bottom">
        <div class="membership-plan highlight">
          <div class="highlight-block">Recomendado</div>
          <h4 class="mb-1 c-secondary"><?= $page->paidName() ?></h4>
          <h2 class="c-text"><span class="currency-pipe"><?= $page->paidPrice() ?></span><sup>/anual</sup></h2>
          <p class="fw-light mb-4"><?= $page->paidDescription() ?></p>
          <div class="text-center mb-3">
            <a href="" class="button primary px-5"><?= $page->paidButtonText() ?></a>
          </div>
          <p class="fw-medium">Todas las características de <?= $page->freeName() ?>, además de:</p>
          <?= $page->paidFeatures()->kt() ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php snippet('footer') ?>
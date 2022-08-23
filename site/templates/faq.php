<?php snippet('header') ?>

<main class="faq">
    <div class="section-header">
        <h3 class="c-white">Preguntas frecuentes</h3>
    </div>

    <section class="section">

        <div class="accordion" id="faq-accordion">

            <?php foreach($page->faq()->toStructure() as $item): ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-<?= $item->indexOf() ?>">
                    <button class="accordion-button <?= e(!$item->isFirst(), 'collapsed') ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq-<?= $item->indexOf() ?>" aria-expanded="true" aria-controls="faq-<?= $item->indexOf() ?>">
                        <?= $item->question() ?>
                    </button>
                </h2>
                <div id="faq-<?= $item->indexOf() ?>" class="accordion-collapse collapse <?= e($item->isFirst(), 'show') ?>" aria-labelledby="faq-heading-<?= $item->indexOf() ?>" data-bs-parent="#faq-accordion">
                    <div class="accordion-body">
                        <?= $item->answer()->kt() ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </section>

</main>

<?php snippet('footer') ?>
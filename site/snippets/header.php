<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?= $page->title() ?> - <?= $site->title() ?></title>
  <link rel="icon" type="image/png" href="<?= $site->favicon()->toFile()->url() ?>">

  <?php snippet('meta_information'); ?>
  <?php snippet('robots'); ?>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css">
  <?= css(['assets/css/main.min.css', '@auto']) ?>
  <?= css('assets/css/styles.css') ?>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>

</head>

<body>

  <header class="w-full h-[100px] absolute z-30">
    <div class="w-full h-full py-[25px] px-4 lg:px-10 xl:px-16 grid grid-cols-[203px_auto_115px]">
      <div class="flex justify-center items-center">
        <a href="<?= $site->url(); ?>" title="<?= $site->title(); ?>">
          <img src="<?= $site->logo()->toFile()->url(); ?>" alt="Logo">
        </a>
      </div>
      <nav class="navigation hidden md:flex justify-end items-center gap-4 text-white mr-8">
        <?php foreach ($site->headerMenu()->toStructure() as $item) : ?>
          <?php if ($item->showOnDesktop()->toBool()) : ?>
            <?php
            $target = $item->page()->toPage();
            $url = $target ? $target->url() : $item->url();
            ?>
            <a class="text-[16px] font-medium text-white hover:text-white" href="<?= $url ?>"><?= $item->title()->html() ?></a>
          <?php endif ?>
        <?php endforeach ?>
      </nav>
      <div class="login hidden md:flex justify-end items-center">
        <a href="" class="py-2 px-[25.2px] bg-[#66A836] rounded-md text-white">Ingresar</a>
      </div>
    </div>
    <div class="toggle-container absolute max-w-[87px] max-h-[72px] flex justify-center items-center right-[35px] top-[14px] rounded-[20px] px-[27px] py-[22px] backdrop-blur-sm bg-[#0e8dbf85]">
      <button class="toggle-menu resBlock">
        <?php snippet('icon', ['name' => 'bars', 'size' => 24]) ?>
      </button>
    </div>
  </header>

  <?php snippet('menu') ?>
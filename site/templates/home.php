<?php snippet('header') ?>

<div class="loader loader-container" id="loader" role="loader">
  <?php if ($logo = $site->logoWhite()->toFile()) : ?>
    <img src='<?= $logo->url() ?>' alt='Multiplika' class="logo">
  <?php endif; ?>
  <div class="spinner">
    <svg class="loader" viewBox="0 0 24 24">
      <circle class="loader__value" cx="12" cy="12" r="10" />
    </svg>
  </div>
</div>

<main class="home" id="home">

  <section class="filters-bg w-full h-[800px] md:h-[720px] z-20">
    <img class="absolute right-0" src='<?= $site->url() ?>/assets/png/icon-global.svg'>
    <div class="w-full flex justify-center md:w-auto md:block">
      <section class="absolute filters top-[233px] md:top-[138px] w-[85vw] md:w-auto md:max-w-[725px] md:left-[64px] glass px-5 py-6 rounded-[20px]" data-aos="fade-up">
        <h3 class="text-[33px] text-white font-bold mb-[30px]"><?= $page->searchHeader() ?></h3>
        <form class="w-full !shadow-none" action="<?= $page->advancedSearchUrl() ?>">
          <div class="w-full flex rounded-[16px] border border-white relative">
            <input class="w-full h-8 text-xs text-white placeholder:text-white pl-3 bg-transparent" type="text" name="q" placeholder="<?=$page->searchplaceholder()?>" autocomplete="off">
            <button type="submit" class="absolute right-2 top-[50%] -translate-y-[50%]">
              <?php snippet('icon', ['name' => 'searchwhite', 'size' => 20]) ?>
            </button>
          </div>

          <div class='w-full grid grid-cols-[36%_60%] mt-6 gap-3'>
            <div class="w-full flex flex-col">
              <label for="target"><?=$page->labelSwitch()?></label>
              <img class="w-full" src='<?= $site->url() ?>/assets/icons/icon-switch.svg'>
            </div>
            <div class="w-full flex flex-col">
              <label for="category"><?=$page->labelPrice()?></label>
              <select class="input" name="category" id="category">
                <option value="any"></option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['iCateProID'] ?>"><?= $category['cCateProDes'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class='w-full grid grid-cols-[36%_60%] mt-4 gap-3'>
            <div class="w-full flex flex-col">
              <label for="category"><?=$page->labelCategory()?></label>
              <select class="input" name="category" id="category">
                <option value="any"></option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['iCateProID'] ?>"><?= $category['cCateProDes'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="w-full flex flex-col">
              <label for="category"><?=$page->labelLocation()?></label>
              <input type="text" id="autoComplete" class="input">
            </div>
          </div>
          <div class="text-center py-2">
            <button class="primary btn-res"><?=$page->labelSubmit()?></button>
          </div>
        </form>
      </section>
    </div>
  </section>

  <section class="benefits w-full h-[987px] md:h-[787px] relative -top-[25px] mb-[400px] -z-10">
    <img class="hidden md:absolute md:block left-[43%] top-[200px]" src='<?= $site->url() ?>/assets/svg/dashed-line-icons.svg'>
    <div class="w-full flex justify-center">
      <div class="w-[90%] lg:w-10/12 flex flex-col md:flex-row gap-2">
        <div class="w-full flex justify-center md:w-auto md:block">
          <!-- <img class="relative top-10 w-[260px] md:w-[560px] md:top-[50px] md:-left-[20px] lg:left-[15px] xl:left-[115px]" src='<?= $site->url() ?>/assets/png/group-register.png'> -->
          <?php if ($image = $page->imageFirstFeature()->toFile()): ?>
            <img class="relative top-10 w-[260px] md:w-[560px] md:top-[50px] md:-left-[20px] lg:left-[15px] xl:left-[115px]" src='<?= $image->url() ?>' alt='Imagen del beneficio'>
          <?php endif; ?>
        </div>
        <div class="w-full flex flex-col relative top-[48px] md:top-[250px] md:left-[0px] lg:left-[40px] xl:left-[140px]">
          <div class="w-full flex justify-center md:hidden">
            <img class="mb-[10px] w-8 h-8" src='<?= $site->url() ?>/assets/svg/icon-social-green.svg'>
          </div>
          <h5 class="text-blue text-[21px] md:text-[28px] lg:text-[35px] text-center md:!text-left">
            <?=$page->firstText()?>
          </h5>
          <h6 class="text-blue text-[13px] md:text-[16px] lg:text-[22px] text-center md:!text-left">
          <?=$page->secondText()?>
          </h6>
          <p class="text-gray-text text-[11px] md:text-[12px] lg:text-sm text-center md:!text-left">
          <?=$page->thirdText()?>
          </p>
        </div>
      </div>
    </div>
    <div class="w-full relative top-[65px] md:top-0 flex justify-center text-center md:!text-right">
      <div class="w-10/12 flex flex-col-reverse md:flex-row gap-2">
        <div class="w-full flex flex-col relative md:top-[230px] lg:top-[195px] xl:top-[145px] md:left-[135px] lg:left-[130px] xl:left-[10px]">
          <div class="w-full flex justify-center md:hidden">
            <img class="mb-[10px] w-8 h-8" src='<?= $site->url() ?>/assets/svg/icon-maps-blue.svg'>
          </div>
          <h6 class="text-blue text-[13px] md:text-[18px] lg:text-[22px] uppercase">
          <?=$page->secondFirstText()?>
          </h6>
          <h5 class="text-blue text-[21px] md:text-[28px] lg:text-[35px] uppercase">
          <?=$page->secondSecondText()?>
          </h5>
          <p class="text-gray-text text-[11px] md:text-[12px] lg:text-sm text-center md:!text-right">
          <?=$page->secondThirdText()?>
          </p>
        </div>
        <div class="w-full flex justify-center md:w-auto md:block ">
          <!-- <img class="relative md:left-[120px] lg:left-[150px] xl:left-[40px] w-[354px] md:w-[670px] lg:w-[923px]" src='<?= $site->url() ?>/assets/png/boxes-second-step.png'> -->
          <?php if ($image = $page->imageSecondFeature()->toFile()): ?>
            <img class="relative md:left-[120px] lg:left-[150px] xl:left-[40px] w-[354px] md:w-[670px] lg:w-[923px]" src='<?= $image->url() ?>' alt='Imagen del beneficio'>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="w-full flex justify-center text-center md:!text-left">
      <div class="w-10/12 flex gap-2 flex-col md:flex-row">
        <div class="w-full flex justify-center md:w-auto md:block">
          <!-- <img class="relative top-[95px] md:top-[250px] lg:top-[120px] xl:top-[25px] md:left-[60px] lg:left-[100px] xl:left-[200px] w-[262px] md:w-[540px]" src='<?= $site->url() ?>/assets/svg/headphones-third-benefit.svg'> -->
          <?php if ($image = $page->imageThirdFeature()->toFile()): ?>
            <img class="relative top-[95px] md:top-[250px] lg:top-[120px] xl:top-[25px] md:left-[60px] lg:left-[100px] xl:left-[200px] w-[262px] md:w-[540px]" src='<?= $image->url() ?>' alt='Imagen del beneficio'>
          <?php endif; ?>
        </div>
        <div class="w-full flex flex-col relative top-[100px] md:top-[350px] lg:top-[235px] xl:top-[130px] md:left-[60px] lg:left-[110px] xl:left-[215px]">
          <div class="w-full flex justify-center md:hidden mb-4">
            <img class="w-8 h-8 md:hidden" src='<?= $site->url() ?>/assets/icons/icon-speaker-green.svg'>
          </div>
          <h6 class="text-blue text-[22px] uppercase">
          <?=$page->thirdFirstText()?>
          </h6>
          <h5 class="text-blue text-[35px] uppercase">
          <?=$page->thirdSecondText()?>
          </h5>
          <p class="text-gray-text text-sm text-center md:!text-left">
          <?=$page->thirdThirdText()?>
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="uniques w-full h-[663px] md:h-[787px] relative -top-[25px] z-10">
    <div class="w-full flex flex-col items-center relative top-[60px] md:top-[140px]">
      <div class="flex flex-col text-center mb-[59px] md:mb-10">
        <h5 class="uppercase text-[13px] md:text-[26px] text-white font-bold">
          <?=$page->benefitsHeader()?>
        </h5>
        <h4 class="uppercase text-[21px] md:text-[42px] text-white font-bold">
        <?=$page->benefitsSubheader()?>
        </h4>
      </div>
      <div class="w-full flex justify-center">
        <table class="w-[95%] max-w-[520px] md:w-[80%] mb-[53px] md:mb-4 block md:hidden">
          <tr>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(0)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(0)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(1)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(1)->title()?>
                </p>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(2)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(2)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(3)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(3)->title()?>
                </p>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(4)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(4)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[27px] px-[20px] md:py-[48px] md:px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(5)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(5)->title()?>
                </p>
              </div>
            </td>
          </tr>
        </table>
        <table class="w-[90%] mb-4 hidden md:block">
          <tr>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
                <!-- <img class="w-[61px]" src='<?= $site->url() ?>/assets/icons/icon-free-register-green.svg'> -->
                <?php if ($icon = $page->benefitsTable()->toStructure()->nth(0)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(0)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(1)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(1)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(2)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(2)->title()?>
                </p>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(3)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(3)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(4)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(4)->title()?>
                </p>
              </div>
            </td>
            <td>
              <div class="w-auto flex gap-[11px] items-center justify-center py-[48px] px-[38px]">
              <?php if ($icon = $page->benefitsTable()->toStructure()->nth(5)->image()->toFile()): ?>
                  <img src='<?= $icon->url() ?>' alt='icono descriptivo'>
                <?php endif; ?>
                <p class="text-white text-[18px] font-bold">
                <?=$page->benefitsTable()->toStructure()->nth(5)->title()?>
                </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <a href="#" class="btn-blue-dark hover:text-white">
        <?=$page->textBenefitsButton()?>
      </a>
    </div>
  </section>

  <section class="companies-section w-full h-[787px] relative -top-[55px]">
    <div class="w-full flex flex-col items-center relative top-[60px] md:top-[90px] lg:top-[140px]">
      <div class="flex flex-col text-center mb-10">
        <h5 class="uppercase text-[13px] lg:text-[26px] text-[#0E8EBF] font-bold">
          <?=$page->companiesHeader()?>
        </h5>
        <h4 class="uppercase text-[21px] lg:text-[42px] text-[#0E8EBF] font-bold">
          <?=$page->companiesSubheader()?>
        </h4>
      </div>

      <div class="w-[95%] md:w-[90%] flex flex-wrap justify-center gap-[11px] xl:gap-8">
        <?php foreach ($companies as $company) : ?>
          <div class="w-[221px] h-[205px] flex flex-col rounded-md bg-white">
            <div class="h-[100px] w-full bg-white rounded-t-md flex justify-center items-center">
              <?php if ($company['gcEmprLogRut'] && strlen($company['gcEmprLogRut'])) : ?>
                <object class="flex justify-center items-center" data="<?= $site->resourcesUrl() . $company['gcEmprLogRut'] ?>" type="image/*">
                  <img class="w-[70%] rounded-t-md max-h-[135px]" src="<?= asset('assets/png/logo-placeholder.png')->url() ?>" />
                </object>
              <?php else : ?>
                <img class="w-[70%] max-h-[135px] rounded-md" src="<?= asset('assets/png/logo-placeholder.png')->url() ?>">
              <?php endif ?>
            </div>
            <div class="company-body w-full h-[105px] flex flex-col bg-gray justify-center items-center">
              <h5><?= $company['cEmprNomCom'] ?></h5>
              <span class="location"><?= $company['location'] ?></span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- <div id="companies-carousel" class="splide">
        <div class="splide__track">
          <ul class="splide__list">
            <?php foreach ($companies as $company) : ?>
              <li class="splide__slide">
                <div class="company-item">
                  <div class="logo-container">
                    <?php if ($company['gcEmprLogRut'] && strlen($company['gcEmprLogRut'])) : ?>
                      <object data="<?= $site->resourcesUrl() . $company['gcEmprLogRut'] ?>" type="image/*">
                        <img src="<?= asset('assets/png/logo-placeholder.png')->url() ?>" />
                      </object>
                    <?php else : ?>
                      <img src="<?= asset('assets/png/logo-placeholder.png')->url() ?>">
                    <?php endif ?>
                  </div>
                  <div class="company-body">
                    <h5><?= $company['cEmprNomCom'] ?></h5>
                    <span class="location"><?= $company['location'] ?></span>
                  </div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div> -->

      <a href="<?=$page->companiesButtonHref()?>" class="btn-blue-dark bg-green mt-10 hover:text-white">
        <?=$page->textCompaniesButton()?>
      </a>
    </div>
  </section>

  <section class="products-section mb-20 md:mb-0 w-full h-[637px] md:h-[787px] relative -top-[85px]">
    <div class="w-full flex flex-col items-center relative top-[80px] lg:top-[140px]">
      <div class="flex flex-col text-center mb-10">
        <h5 class="uppercase text-[13px] lg:text-[26px] text-white font-bold">
          <?=$page->productsHeader()?>
        </h5>
        <h4 class="uppercase text-[21px] lg:text-[42px] text-white font-bold">
          <?=$page->productsSubheader()?>
        </h4>
      </div>

      <div class="w-[90%] lg:w-auto flex gap-4 flex-wrap justify-center lg:gap-8">
        <?php foreach ($products as $product) : ?>
          <div class="w-[202px] h-[204px] lg:w-[235px] lg:h-[297px] bg-blue-light rounded-[23px] flex flex-col">
            <div class="w-full h-[127px] lg:h-[185px] rounded-t-[23px] bg-blue flex justify-center items-center">
              <?php if ($product['gcFotoRut'] && strlen($product['gcFotoRut'])) : ?>
                <object class="h-full w-full object-cover" data="<?= $site->resourcesUrl() . $product['gcFotoRut'] ?>" type="image/*">
                  <img class="rounded-t-[23px] h-full w-full object-cover" src="<?= asset('assets/png/placeholder.png')->url() ?>" />
                </object>
              <?php else : ?>
                <img class="rounded-t-[23px] h-full w-full" src="<?= asset('assets/png/placeholder.png')->url() ?>">
              <?php endif ?>
            </div>
            <div class="product-body rounded-b-[23px] w-full h-[77px] lg:h-[112px] flex flex-col items-center justify-center">
              <h6 class="c-secondary text-center text-white text-[11px] lg:text-[16px]"><?= $product['cProdTit'] ?></h6>
              <p class="fw-light mb-1 text-white text-[8px] lg:text-[12px]"><?=$page->productsCodePrefix()?>: <?= $product['cSKU'] ?></p>
              <?php if ($product['lProdPrePubVis']) : ?>
                <span class="currency-pipe c-secondary fw-medium text-white text-[12px] lg:text-[18px]"><?= $product['dProdPrePub'] ?></span>
              <?php endif ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <a href="#" class="btn-blue-dark mt-10 hover:text-white">
        <?=$page->productsButtonText()?>
      </a>
    </div>
  </section>

  <section class="w-full h-[335px] md:mb-[115px] lg:mb-0 relative -top-[70px] z-10">
    <img class="absolute left-[53%] top-[55%]" src='<?= $site->url() ?>/assets/icons/elipse-gray.svg'>
    <img class="absolute left-[93%] top-[60%]" src='<?= $site->url() ?>/assets/icons/exclusion-blue.svg'>
    <div class="w-full flex flex-col items-center relative top-[0px]">
      <div class="flex flex-col text-center mb-[43px] md:mb-[77px]">
        <h5 class="uppercase text-[13px] md:text-[26px] text-blue font-bold">
          <?=$page->benefitsRegisterHeader()?>
        </h5>
        <h4 class="uppercase text-[21px] md:text-[42px] text-blue font-bold">
          <?=$page->benefitsRegisterSubheader()?>
        </h4>
      </div>
      <div class="w-auto flex flex-wrap gap-[20px] justify-center gap-y-9 md:gap-[70px] mb-[58px]">
        <?php foreach($page->benefitsRegisterTable()->toStructure() as $benefit): ?>
          <div class="w-[167px] md:w-[263px] h-[61px] md:h-[96px] bg-white rounded-[12px] flex items-center justify-center relative">
            <img class="w-[38px] md:w-[60px] absolute left-[50%] -top-[19px] md:-top-[33px] -translate-x-[50%]" src='<?= $site->url() ?>/assets/icons/icon-check-green.svg'>
            <p class="text-blue font-bold text-[9px] md:text-[16px] text-center">
              <?=$benefit->title()?>
            </p>
          </div>
        <?php endforeach; ?>
        <!-- <div class="w-[167px] md:w-[263px] h-[61px] md:h-[96px] bg-white rounded-[12px] flex items-center justify-center relative">
          <img class="w-[38px] md:w-[60px] absolute left-[50%] -top-[19px] md:-top-[33px] -translate-x-[50%]" src='<?= $site->url() ?>/assets/icons/icon-check-green.svg'>
          <p class="text-blue font-bold text-[9px] md:text-[16px] text-center">
            Solicita cotizaciones en volumen a tus proveedores
          </p>
        </div>
        <div class="w-[167px] md:w-[263px] h-[61px] md:h-[96px] bg-white rounded-[12px] flex items-center justify-center relative">
          <img class="w-[38px] md:w-[60px] absolute left-[50%] -top-[19px] md:-top-[33px] -translate-x-[50%]" src='<?= $site->url() ?>/assets/icons/icon-check-green.svg'>
          <p class="text-blue font-bold text-[9px] md:text-[16px] text-center">
            Envía promociones a tus listas de clientes
          </p>
        </div> -->
      </div>
      <a href="#" class="btn-blue-dark bg-green hover:text-white">
        <?=$page->textBenefitsRegisterButton()?>
      </a>
    </div>
  </section>

  <!-- <section class="section home-companies" data-aos="fade-up">
    <h3 class="mb-4"><?= $page->companiesHeader() ?></h3>
    <div id="companies-carousel" class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <?php foreach ($companies as $company) : ?>
            <li class="splide__slide">
              <div class="company-item">
                <div class="logo-container">
                  <?php if ($company['gcEmprLogRut'] && strlen($company['gcEmprLogRut'])) : ?>
                    <object data="<?= $site->resourcesUrl() . $company['gcEmprLogRut'] ?>" type=“image/*>
                      <img src="<?= asset('assets/png/logo-placeholder.png')->url() ?>" />
                    </object>
                  <?php else : ?>
                    <img src="<?= asset('assets/png/logo-placeholder.png')->url() ?>">
                  <?php endif ?>
                </div>
                <div class="company-body">
                  <h5><?= $company['cEmprNomCom'] ?></h5>
                  <span class="location"><?= $company['location'] ?></span>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="text-center py-3">
      <a href="<?= $page->companiesButtonUrl() ?>" class="button primary"><?= $page->companiesButtonText() ?></a>
    </div>
  </section> -->

  <!-- <section class="section home-products" data-aos="fade-up">
    <h3 class="mb-4"><?= $page->productsHeader() ?></h3>
    <div id="products-carousel" class="splide">
      <div class="splide__track">
        <ul class="splide__list">
          <?php foreach ($products as $product) : ?>
            <li class="splide__slide">
              <div class="product-item">
                <div class="image-container">
                  <?php if ($product['gcFotoRut'] && strlen($product['gcFotoRut'])) : ?>
                    <object data="<?= $site->resourcesUrl() . $product['gcFotoRut'] ?>" type=“image/*>
                      <img src="<?= asset('assets/png/placeholder.png')->url() ?>" />
                    </object>
                  <?php else : ?>
                    <img src="<?= asset('assets/png/placeholder.png')->url() ?>">
                  <?php endif ?>
                </div>
                <div class="product-body">
                  <h6 class="c-secondary"><?= $product['cProdTit'] ?></h6>
                  <p class="fw-light mb-1"><?= $product['cSKU'] ?></p>
                  <?php if ($product['lProdPrePubVis']) : ?>
                    <span class="currency-pipe c-secondary fw-medium"><?= $product['dProdPrePub'] ?></span>
                  <?php endif ?>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="text-center py-3">
      <a href="<?= $page->productsButtonUrl() ?>" class="button primary"><?= $page->productsButtonText() ?></a>
    </div>
  </section> -->

</main>

<?php snippet('footer') ?>
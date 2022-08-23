<?php
    $controls = $controls ?? null;
    $class = $class ?? '';
    $id = $id ?? '';
    $poster = $poster ?? null;
?>
<?php if ($media->type() == 'image'): ?>
    <img class="<?= $class ?>" id="<?= $id ?>" src='<?= $media->url() ?>' alt='<?= $media->filename() ?>' loading="lazy">
<?php elseif ($media->type() == 'video'): ?>
    <video class="media-video <?= $class ?>" id="<?= $id ?>" src="<?= $media->url() ?>" <?php if($controls): echo 'controls'; endif; ?> preload="none" muted playsinline loading="lazy" loop poster="<?= $poster && $poster->isNotEmpty() ? $poster->toFile()->url() : '' ?>"></video>
<?php endif; ?>
<?php $__env->startSection('head-meta'); ?>
<title><?php echo e($berita[0]->judul); ?></title>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/images/fav.png')); ?>">
<meta property="og:url"                content="<?php echo e($urlLink); ?>" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="<?php echo e($berita[0]->judul); ?>" />
<meta property="og:description"        content="<?php echo e($description); ?>" />
<meta property="og:image"              content="<?php echo e($gambarLink); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5866255bf1b2733b"></script>
    <berita-Detail :id="<?php echo e($id); ?>"></berita-Detail>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('imagine.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\inilahkepri_mobile\resources\views/berita/detail.blade.php ENDPATH**/ ?>
<h2>Добрый день!</h2>
<p>
    Уважаемый <?php echo e($data->user_name); ?>.
    Вышла новая статья от автора - <?php echo e($data->author); ?> под заголовком "<?php echo e($data->post_title); ?>". <br>
    Ознакомиться можете по этой <a href="<?php echo e($data->post_link); ?>">ссылке</a>.
</p>
<?php /**PATH /media/mrlexus/3CA2BF8DA2BF49E2/Projects/laravel/news/resources/views/emails/subscribe.blade.php ENDPATH**/ ?>
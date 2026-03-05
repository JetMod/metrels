<?php get_header(); ?>

    <div class="content">
        <div class="container page-404">
            <h1 class="title title_404">404</h1>
            <p class="text text_large mrgn30">Ошибка 404. К сожалению страница не найдена!</p>
            <div class="text mrgn35-bottom">Попробуйте найти информацию на главной странице сайта</div>
            <a class="button card__button" href="<?= get_home_url() ?>">На главную</a>
        </div>
    </div>

<?php get_footer(); ?>
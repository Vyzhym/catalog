<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [

                    (\Yii::$app->user->can('user'))? [
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'fa fa-user-plus', 'url' => ['/user']],
                            ['label' => 'Роли', 'icon' => 'fa fa-user-secret', 'url' => ['/role']],
                            //['label' => 'Права', 'icon' => 'fa fa-key', 'url' => ['/permission']],
                        ],
                    ]:"",

                    (\Yii::$app->user->can('static'))?  [
                        'label' => 'Статика',
                        'icon' => 'fa fa-folder-open',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Языковые сообщения', 'icon' => 'fa fa-comment', 'url' => ['/message']],
                            //['label' => 'Хранилище файлов', 'icon' => 'fa fa-file', 'url' => ['/file']],
                            ['label' => 'Статические ссылки', 'icon' => 'fa fa-link', 'url' => ['/service']],
                        ],
                    ]:"",

                    (\Yii::$app->user->can('main'))? [
                        'label' => 'Главная страница',
                        'icon' => 'fa fa-file-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Слайдер', 'icon' => 'fa fa-picture-o', 'url' => ['/slider']],
                            ['label' => 'Видео', 'icon' => 'fa fa-video-camera', 'url' => ['/video-index/update?id=1']],
                        ],
                    ]:"",


                    (\Yii::$app->user->can('product'))?['label' => 'Товары', 'icon' => 'fa fa-plus', 'url' => ['/product']]:"",
                    (\Yii::$app->user->can('dish'))?['label' => 'Блюда', 'icon' => 'fa fa-cutlery', 'url' => ['/dish']]:"",
                    ['label' => 'Преимущества', 'icon' => 'fa fa-cutlery', 'url' => ['/advantage']],
                    (\Yii::$app->user->can('store'))?['label' => 'Где купить', 'icon' => 'fa fa-shopping-cart', 'url' => ['/store']]:"",
                    (\Yii::$app->user->can('offers'))?['label' => 'Акции', 'icon' => 'fa fa-money', 'url' => ['/offers']]:"",
                    (\Yii::$app->user->can('settings'))?['label' => 'Настройки', 'icon' => 'fa fa-suitcase', 'url' => ['/settings']]:"",
                ],
            ]
        ) ?>

    </section>

</aside>

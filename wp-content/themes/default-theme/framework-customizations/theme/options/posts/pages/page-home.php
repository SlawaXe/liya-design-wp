<?php
$options = array(
    array(
        'type'    => 'box',
        'options' => array(
            'tab1' => array(
                'type' => 'tab',
                'title' => 'Начальный экран',
                'options' => array(
                    'intro_title'   => array(
                        'type'  => 'text',
                        'label' => __('Заголовок', 'fw')
                    ),
                    'intro_subtitle'   => array(
                        'type'  => 'text',
                        'label' => __('Подзаголовок', 'fw')
                    ),
                    'intro_btns' => array(
                        'type'          => 'addable-box',
                        'label'         => __( 'Кнопки', 'fw' ),
                        'add-button-text'   => __( 'Добавить', 'fw' ),
                        'box-options' => array(
                            'title' => array( 'label' => __('Заголовок', 'fw'), 'type' => 'text' ),
                            'text' => array( 'label' => __('Ссылка', 'fw'), 'type' => 'text' ),
                            'class' => array( 'label' => __('Класс', 'fw'), 'type' => 'text' ),
                        ),
                        'template' => '{{- title }}', // box title
                    ),
                    'intro_catalog' => array(
                        'type'          => 'addable-box',
                        'label'         => __( 'Блоки', 'fw' ),
                        'add-button-text'   => __( 'Добавить', 'fw' ),
                        'box-options' => array(
                            'title' => array( 'label' => __('Заголовок', 'fw'), 'type' => 'text' ),
                            'text' => array( 'label' => __('Ссылка', 'fw'), 'type' => 'text' ),
                            'image'   => array(
                                'type'  => 'upload',
                                'label' => __('Изображение', 'fw'),
                                'images_only' => true,
                            ),
                            'image2'   => array(
                                'type'  => 'upload',
                                'label' => __('Изображение при наведении', 'fw'),
                                'images_only' => true,
                            ),
                        ),
                        'template' => '{{- title }}', // box title
                    ),
                )
            ),
            'tab2' => array(
                'type' => 'tab',
                'title' => 'Новые проекты',
                'options' => array(
                    'block1_enable' => array(
                        'type'  => 'switch',
                        'label' => __('Включить блок', 'fw'),
                        'left-choice' => array(
                            'value' => 'yes',
                            'label' => __('Да', 'fw'),
                        ),
                        'right-choice' => array(
                            'value' => 'no',
                            'label' => __('Нет', 'fw'),
                        ),
                    ),
                    'block1_title'   => array(
                        'type'  => 'text',
                        'label' => __('Заголовок', 'fw')
                    ),
                    'block1_subtitle'   => array(
                        'type'  => 'text',
                        'label' => __('Подзаголовок', 'fw')
                    ),
                    'block1_link'   => array(
                        'type'  => 'text',
                        'label' => __('Ссылка на все проекты', 'fw')
                    ),
                )
            ),
        )
    )
);
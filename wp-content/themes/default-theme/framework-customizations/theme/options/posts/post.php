<?php if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    array(
        'type'    => 'box',
        'options' => array(
            'p_desc'   => array(
                'type'  => 'textarea',
                'label' => __('Краткое содержание', 'fw')
            ),
            'p_imgs' => array(
                'type'          => 'addable-option',
                'label'         => __( 'Изображения', 'fw' ),
                'option' => array( 'type' => 'upload' ),
                'add-button-text'   => __( 'Добавить', 'fw' ),
                'sortable' => true,
                // 'box-options' => array(
                //     'image'   => array(
                //         'type'  => 'upload',
                //         'label' => __('Изображение', 'fw'),
                //         'images_only' => true,
                //     ),
                // ),
            ),
        )
    )
);
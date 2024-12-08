<?php
/*
* This file is used to register the fields for the social menu svg
*/

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class SocialMenuSvg extends Field {
    /**
     * The field group.
     */
    public function fields(): array {
        $fields = Builder::make('social_menu_svg');

        $fields->setLocation('nav_menu_item', '==', 'location/social_navigation');

        $fields
            ->addImage('image_field', [
                'label' => 'Social Icon',
                'instructions' => '<p class="editor-instruction">only SVG Format Accepted</p>',
                'required' => 1,
                'return_format' => "array",
                'preview_size' => 'icon',
                'mime_types' => 'svg',
            ])
            ->addImage('mobile_image_field', [
                'label' => 'Mobile Social Icon',
                'instructions' => '<p class="editor-instruction">only SVG Format Accepted<br>Dark SVGs</p>',
                'required' => 1,
                'return_format' => "array",
                'preview_size' => 'icon',
                'mime_types' => 'svg',
            ]);

        return $fields->build();
    }
}

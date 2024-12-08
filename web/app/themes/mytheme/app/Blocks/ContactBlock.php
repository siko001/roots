<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class ContactBlock extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Contact Block';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = '2 Column Block with form selection';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'widgets';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = ['contact', 'form', '2 column'];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array {
        return [
            'section_heading' => $this->sectionHeading(),
            'section_description' => $this->sectionDescription(),
            'section_image' => $this->sectionImage(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array {
        $fields = Builder::make('contact_block');

        $fields
            ->addText('section_heading')
            ->addTextarea('section_description')
            ->addImage('section_image')
            ->addText('contact_form_title')
            ->addTextarea('contact_form_description')
            ->addTrueFalse('v', [
                'label' => 'Use Regular Form or Gravity Form',
                'ui' => 1,
                'ui_on_text' => 'Select',
                'ui_off_text' => 'None',
            ]);
        return $fields->build();
    }



    /**
     * Retrieve the section heading.
     *
     * @return string
     */
    public function sectionHeading() {
        return get_field('section_heading') ?: 'Default Section Heading';
    }

    /**
     * Retrieve the section description.
     *
     * @return string
     */
    public function sectionDescription() {
        return get_field('section_description') ?: 'Default section description.';
    }

    /**
     * Retrieve the section image.
     *
     * @return string
     */
    public function sectionImage() {
        return get_field('section_image') ?: 'default-image.jpg';
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void {
    }
}

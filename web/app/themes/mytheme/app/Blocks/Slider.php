<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class Slider extends Block {
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Slider';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A beautiful Slider block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'design';

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
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => false,
            'text' => false,
            'gradient' => false,
        ],
    ];

    /**
     * The block preview example data.
     *
     * @var array
     */

    public $example = [
        'slides' => [
            [
                'heading' => 'Item one',
                'subheading' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'image' => [
                    'url' => 'https://via.placeholder.com/150',
                    'alt' => 'Placeholder Image 1'
                ]
            ],
            [
                'heading' => 'Item two',
                'subheading' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => [
                    'url' => 'https://via.placeholder.com/150',
                    'alt' => 'Placeholder Image 2'
                ]
            ],
            [
                'heading' => 'Item three',
                'subheading' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.',
                'image' => [
                    'url' => 'https://via.placeholder.com/150',
                    'alt' => 'Placeholder Image 3'
                ]
            ],
        ],
    ];



    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array {
        return [
            'slides' => $this->items(),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array {
        $fields = Builder::make('slider_block');

        $fields
            ->addRepeater('slides', [
                'layout' => 'block',
                'button_label' => 'Add A Slide',
                'min' => 1,
            ])->addImage('image', [
                'required' => true,
                'mime_types' => 'jpeg,jpg,png,webp',
            ])
            ->addTrueFalse('gradient', [
                'label' => 'Add Gradient Overlay',
                'default_value' => 0,
                'ui' => 1,
            ])
            ->addColorPicker('gradient_color', [
                'required' => true,
                'enable_opacity' => 1,
                'label' => 'Gradient Color',
                'return_format' => 'string',
                'conditional_logic' => [
                    [
                        [
                            'field' => 'gradient',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],
            ])
            ->addText('heading', [
                'required' => true,
                'instructions' => '<p class="editor-instruction">Max length: 30 characters.<p>',
                'maxlength' => '30',
            ])
            ->addTextarea('subheading', [
                'required' => true,
                'instructions' => '<p class="editor-instruction">Max length: 100 characters.<p>',
                'maxlength' => '100',
            ])
            ->addTrueFalse('button', [
                'label' => 'Add a CTA Button',
                'default_value' => 0,
                'ui' => 1,
            ])
            ->addLink('link_field', [
                'label' => 'Link Field',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => [
                    [
                        [
                            'field' => 'button',
                            'operator' => '==',
                            'value' => '1',
                        ],
                    ],
                ],

                'return_format' => 'array',
            ])



            ->endRepeater();

        return $fields->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items() {
        return get_field('slides') ?: $this->example['slides'];
    }
    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void {
        //
    }
}

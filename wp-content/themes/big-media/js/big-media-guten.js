wp.blocks.registerBlockStyle('core/video', {
    name: 'bb-background',
    label: 'Featured',
});
wp.blocks.registerBlockStyle('core/image', {
    name: 'bb-block-bg-fit',
    label: 'Fit Background',
});
wp.blocks.registerBlockStyle('core/image', {
    name: 'bb-block-bg-full',
    label: 'Full Background',
});
wp.blocks.registerBlockStyle('core/post-featured-image', {
    name: 'bb-block-fi-fit',
    label: 'Fit Top',
});
wp.blocks.registerBlockStyle('core/post-featured-image', {
    name: 'bb-block-fi-full',
    label: 'Full Top',
});
wp.blocks.registerBlockVariation(
    'core/columns', {
    name: 'IC Triple',
    scope: ['inserter'],
    title: 'Information Columns Triple (BB)',
    innerBlocks: [
        ['core/column', {}, [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }],
        ]],
        ['core/column', {}, [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }],
        ]],
        ['core/column', {}, [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }],
        ]],
    ],
}
);
wp.blocks.registerBlockVariation(
    'core/columns', {
    name: 'IC Double',
    scope: ['inserter'],
    title: 'Information Columns Double (BB)',
    innerBlocks: [
        ['core/column', {}, [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }],
        ]],
        ['core/column', {}, [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }],
        ]],
    ],
}
);
wp.blocks.registerBlockVariation(
    'core/group',
    {
        name: 'IC Single',
        class: 'bb-menu-item',
        title: 'Information Block Single (BB)',
        attributes: {
            align: 'full'
        },
        innerBlocks: [
            ['core/heading', {
                placeholder: "Title",
                align: "center"
            }],
            ['core/image', {
                align: "center"
            }],
            ['core/paragraph', {
                placeholder: "Write your description here."
            }]
        ]
    }
);

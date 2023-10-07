<?php
	return [
		'theme' => env('THEME'),

		'length_alias' => 100,
		
		'sliders' => [
			'path' => [
				'width' => 1000,
				'height' => 338
			],
			'min' => [
				'width' => 150,
				'height' => 100
			]
		],

		'portfolios' => [
			'path_cat_max' => [
				'width' => 700,
				'height' => 295
			],
			'path' => [
				'width' => 700,
				'height' => 260
			],
			'max' => [
				'width' => 617,
				'height' => 260
			],
			'path_index' => [
				'width' => 208,
				'height' => 168
			],
			'path_cat' => [
				'width' => 205,
				'height' => 118
			],
			'min' => [
				'width' => 86,
				'height' => 86
			],
			'path_cat_min' => [
				'width' => 50,
				'height' => 50
			],	
		],

		'articles' => [
			'path' => [
				'width' => 720,
				'height' => 298
			],
			'min' => [
				'width' => 55,
				'height' => 55
			]
		],

		'comments' => [
			'path' => [
				'width' => 75,
				'height' => 75
			],
			'min' => [
				'width' => 55,
				'height' => 55
			]
		],

		'testimonials' => [
			'path' => [
				'width' => 94,
				'height' => 94
			],
		],
		
		'gallery' => [
			'path' => [
				'width' => 640,
				'height' => 426
			],
			'min' => [
				'width' => 65,
				'height' => 65
			]
		],

		// records per page - Admin Panel
		'recordsPerPage' => [
				'2' => 2,
				'5' => 5,
                '10' => 10,
                '25' => 25,
                '50' => 50,
                '100' => 100
        ],


        // settings on the site
        'site' => [
        	// footer
        	'footer_last_article' => 2,
        	'footer_nr_pages' => 14,
        	// Home page
        	'last_articles_in_index_page' => 3,
        	'projects_in_index_page' => 4,
        	'project_description_in_index_page' => 180,
        	// portfolios
        	'portfolio_description_in_category_page' => 165,
        	// portfolios category
        	'paginate_portfolio_per_category' => 6,
        	// portfolio
        	'last_projects_in_portfolio_page' => 8,
        	// paginate blog
        	'paginate_articles' => 3,
        	'article_description_in_blog_page' => 165,
        	'blog_last_article' => 3,
        	// Contact page
        	'contact_last_article' => 2,
        ],
	];
?>
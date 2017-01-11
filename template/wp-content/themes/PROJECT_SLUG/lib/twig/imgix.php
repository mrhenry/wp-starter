<?php

add_filter('get_twig', 'add_imgix_to_twig');

function add_imgix_to_twig ($twig) {
	$twig->addExtension(new Twig_Extension_StringLoader());

	$twig->addFilter(new Twig_SimpleFilter('imgix', function ($src, array $options = array()) {

		$attributes = array();
		$src = preg_replace("/(https?:)?\/\/(\w+).f.mrhenry.(eu|be).s3.amazonaws.com/i", "https://$2.imgix.net", $src);

		if (!empty($options[0])) {
			$attributes['class'] = $options[0];
		}

		if (!empty($options[1])) {
			$attributes['sizes'] = $options[1];

			// Sizes are set, generate srcset
			$crop_by = 'w';

			$srcset = array();
			// Generate the following breakpoints for the srcset
			$breakpoints = array(256, 384, 512, 640, 768, 1024, 1280, 1536, 1792, 2304);

			// Default options
			$append = '&auto=format%2Ccompress&ch=DPR%2CSave-Data&q=60';

			foreach ($breakpoints as $breakpoint) {
				array_push($srcset, $src . '?' . $crop_by . '=' . $breakpoint . '&fit=max' . $append . ' ' . $breakpoint . 'w');
			}

			$attributes['srcset'] = implode(', ', $srcset);
			$attributes['src'] = $src = $src . '?w=384&fit=max' . $append;
		} else {
			$attributes['src'] = $src . '?w=360&h=240&fit=crop&crop=faces,entropy&auto=format,compress&ch=DPR,Save-Data&q=60';
		}

		$string_attributes = array_reduce(array_keys($attributes), function ($string, $attr) use ($attributes) {
			return $attr . '="' . $attributes[$attr] . '" ' . $string;
		}, '');

    	return '<img ' . $string_attributes . ' />';
	}, array('is_variadic' => true)));

    return $twig;
}

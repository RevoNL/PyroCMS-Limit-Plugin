<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Limit Plugin
 *
 * Limit words
 *
 * @author		RevoNL
 * @package		PyroCMS\Addon\Plugins
 * @copyright	Copyright (c) 2014, RevoNL
 */
class Plugin_Limit extends Plugin
{
	public $version = '1.0.0';

	public $name = array(
		'en'	=> 'Limit'
	);

	public $description = array(
		'en'	=> 'Limit words.'
	);

	/**
	 * Returns a PluginDoc array that PyroCMS uses 
	 * to build the reference in the admin panel
	 *
	 * All options are listed here but refer 
	 * to the Blog plugin for a larger example
	 *
	 * @return array
	 */
	public function _self_doc()
	{
		$info = array(
			'words' => array(
				'description' => array(// a single sentence to explain the purpose of this method
					'en' => 'Limit words and add custom ending. Example: {{ limit:words words="25" ending="<a href=\'/read-more\'>Read more</a>" }}'
				),
				'single' => false,// will it work as a single tag?
				'double' => true,// how about as a double tag?
				'variables' => 'This is the text you want to limit.',// list all variables available inside the double tag. Separate them|like|this
				'attributes' => array(
					'words' => array(// this is the name="World" attribute
						'type' => 'number',// Can be: slug, number, flag, text, array, any.
						'flags' => '',// flags are predefined values like asc|desc|random.
						'default' => '',// this attribute defaults to this if no value is given
						'required' => false,// is this attribute required?
					),
					'ending' => array(// this is the name="World" attribute
						'type' => 'text',// Can be: slug, number, flag, text, array, any.
						'flags' => '',// flags are predefined values like asc|desc|random.
						'default' => '...',// this attribute defaults to this if no value is given
						'required' => false,// is this attribute required?
					),
					'strip' => array(// this is the name="World" attribute
						'type' => 'text',// Can be: slug, number, flag, text, array, any.
						'flags' => '',// flags are predefined values like asc|desc|random.
						'default' => 'no',// this attribute defaults to this if no value is given
						'required' => false,// is this attribute required?
					),
				),
			),
		);
	
		return $info;
	}
	
	
	
	/**
	 * Words
	 *
	 * Usage:
	 * {{ limit:words words="25" ending="<a href='/read-more'>Read more</a>"}}
	 *
	 * @return string
	 */

	function words($content = '')
	{
		$limit_count 	= $this->attribute('words', '');
		$ending 		= $this->attribute('ending', '...');
		$strip_html		= $this->attribute('strip', 'no');
		
		
		$content 		= $this->content();
		
		if($strip_html == 'yes')
		{
			$content	= strip_tags($content);
		}
		
		$new_content 	= word_limiter($content, $limit_count, $ending);
		
		
 		return $new_content;
	}
}

/* End of file example.php */
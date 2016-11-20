<?php

class qa_html_theme_layer extends qa_html_theme_base
{

	function post_tag_item($taghtml, $class)
	{
		require_once QA_INCLUDE_DIR.'qa-util-string.php';
			
		global $plugin_tag_desc_list, $plugin_tag_desc_map;
		
		if (count(@$plugin_tag_desc_list)) {
			$result=qa_db_query_sub(
				'SELECT tag, content FROM ^tagmetas WHERE tag IN ($) AND title="description"',
				array_keys($plugin_tag_desc_list)
			);
			
			$plugin_tag_desc_map=qa_db_read_all_assoc($result, 'tag', 'content');
			$plugin_tag_desc_list=null;
		}
		
		if (preg_match('/,TAG_DESC,([^,]*),/', $taghtml, $matches)) {
			$taglc=$matches[1];
			$description=@$plugin_tag_desc_map[$taglc];
			$description=qa_shorten_string_line($description, qa_opt('plugin_tag_desc_max_len'));
			$taghtml=str_replace($matches[0], qa_html($description), $taghtml);
		}
		
		qa_html_theme_base::post_tag_item($taghtml, $class);
	}	

}
/*
	post-formats.js

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html

	Copyright: (c) 2013 Jermaine Maree, http://jermainemaree.com
*/

jQuery(document).ready(function($) {
	// temporary workaround to make sure gutenberg elements have been rendered, see https://github.com/presscustomizr/hueman/issues/672#issuecomment-409481887
	setTimeout( function() {
		// Hide post format sections
		function hide_statuses() {
			$('#format-audio,#format-aside,#format-chat,#format-gallery,#format-image,#format-link,#format-quote,#format-status,#format-video').hide();
		}

		var _wpPostFormatsInputSelectorClassical    = '#post-formats-select input[name="post_format"]',
			_wpPostFormatsInputSelectorGutenberg    = '.editor-post-format select',
			_gutenbergEditorSelector                = '#editor.block-editor__container',
		    _isClassical                            = $(_wpPostFormatsInputSelectorClassical).length > 0,
			_isGutenberg                            = $(_gutenbergEditorSelector).length > 0;

		if ( !( _isClassical || _isGutenberg ) ) {
			return;
		}

		var _onChangePostFormatSelector = _isClassical ? _wpPostFormatsInputSelectorClassical + ':radio' : _wpPostFormatsInputSelectorGutenberg;

		// Post Formats

		// Hide post format sections
		hide_statuses();

		// Supported post formats
		var post_formats = ['audio','aside','chat','gallery','image','link','quote','status','video'];

		// Get selected post format
		var selected_post_format = HUPostFormatsParams.currentPostFormat;

		// Show post format meta box
		if($.inArray(selected_post_format,post_formats) != '-1') {
			$('#format-'+selected_post_format).show();
		}

		// Hide/show post format meta box when option changed
		$('body').on( 'change', _onChangePostFormatSelector, function() {
			// Hide post format sections
			hide_statuses();
			// Show selected section
			if(jQuery.inArray($(this).val(),post_formats) != '-1') {
				$('#format-'+$(this).val()).show();
			}
		});
	}, 300);
});
/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraAllowedContent = '*{*}';
	config.filebrowserBrowseUrl = '/testing/js/ckfinder/ckfinder.html';      
    config.filebrowserImageBrowseUrl = '/testing/js/ckfinder/ckfinder.html?type=Images';      
    config.filebrowserFlashBrowseUrl = '/testing/js/ckfinder/ckfinder.html?type=Flash';         
    config.filebrowserUploadUrl = '/testing/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';      
    config.filebrowserImageUploadUrl = '/testing/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';     
    config.filebrowserFlashUploadUrl = '/testing/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};

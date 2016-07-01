/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

    CKEDITOR.config.toolbar = [
        ['NewPage','Templates','-','Cut','Copy','-','Undo','Redo','-','Find','Replace'],
        ['Bold','Italic','Underline','-','StrikeThrough','Subscript','Superscript'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['NumberedList', 'BulletedList', '-','Blockquote','Link'],
        ['Image','-','Table','-','Smiley','-','TextColor','BGColor'],
        ['Styles','Format','FontSize']
    ] ;

    config.extraPlugins = 'image2';
    config.filebrowserBrowseUrl = 'assets/plugins/ckeditor/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = 'assets/plugins/ckeditor/plugins/kcfinder-3.12/browse.php?opener=ckeditor&type=images';
    config.filebrowserUploadUrl = 'assets/plugins/ckeditor/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = 'assets/plugins/ckeditor/plugins/kcfinder-3.12/upload.php?opener=ckeditor&type=images';
};

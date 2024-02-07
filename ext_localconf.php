<?php
if (!defined('TYPO3')) {
    die('Access denied.');
}

/*
 * Mark the delivered TypoScript templates as "content rendering template"
 */
$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = 'themes/Configuration/TypoScript/';

/*
 * Add RTE configuration for theme_bootstrap4
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:theme_bootstrap4/Configuration/RteCkeditor/Default.yaml';

/*
 * Register for hook to show preview of tt_content element of CType="themebootstrap4_xxx" in page module
 */
// @todo The TextImagePreviewRenderer does not exist anymore, there's now a TextMediaPreviewRenderer, this should be registered and the function should be tested
//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['themebootstrap4_text_image'] =
//\KayStrobach\ThemeBootstrap4\Hooks\PageLayoutView\TextImagePreviewRenderer::class;
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['themebootstrap4_image'] =
    \KayStrobach\ThemeBootstrap4\Hooks\PageLayoutView\ImagePreviewRenderer::class;

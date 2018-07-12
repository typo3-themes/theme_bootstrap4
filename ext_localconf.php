<?php
if (!defined('TYPO3_MODE')) {
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

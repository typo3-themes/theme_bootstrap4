<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/*
 * Add RTE configuration for theme_bootstrap4
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:theme_bootstrap4/Configuration/RteCkeditor/Default.yaml';

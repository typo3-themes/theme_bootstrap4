<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/*
 * Add default RTE configuration for theme_bootstrap4
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bootstrap'] = 'EXT:theme_bootstrap4/Resources/Private/Extensions/RteCkeditor/Configuration/Default.yaml';

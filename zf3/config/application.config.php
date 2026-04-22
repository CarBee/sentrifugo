<?php
/**
 * Zend Framework 3 / Laminas MVC bootstrap configuration.
 *
 * This is an incremental migration entrypoint so the legacy ZF1 runtime can
 * continue to operate while ZF3-compatible modules are introduced.
 */
return [
    'modules' => [
        // Add migrated modules here, e.g. 'Application'
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],
        'module_paths' => [
            './module',
            './vendor',
        ],
    ],
];

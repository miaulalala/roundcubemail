<?php

$finder = PhpCsFixer\Finder::create()
    ->in([__DIR__])
    ->exclude(['vendor'])
    ->ignoreDotFiles(false)
    ->name('*.php.dist')
    ->name('*.dist.php')
    ->name('*.sh');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,

        // required by PSR-12
        'concat_space' => [
            'spacing' => 'one',
        ],

        // disable some too strict rules
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'none',
        ],
        'single_line_throw' => false,
        'yoda_style' => [
            'equal' => false,
            'identical' => false,
        ],
        'native_constant_invocation' => true,
        'native_function_invocation' => false,
        'void_return' => false,
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'exit'],
        ],
        'combine_consecutive_issets' => false,
        'combine_consecutive_unsets' => false,
        'multiline_whitespace_before_semicolons' => false,
        'no_superfluous_elseif' => false,
        'ordered_class_elements' => false,
        'php_unit_internal_class' => false,
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_add_missing_param_annotation' => false,
        'return_assignment' => false,
        'comment_to_phpdoc' => false,
        'general_phpdoc_annotation_remove' => [
            'annotations' => ['author', 'copyright', 'throws'],
        ],
        'nullable_type_declaration_for_default_null_value' => [
            'use_nullable_type_declaration' => false,
        ],

        // fn => without curly brackets is less readable,
        // also prevent bounding of unwanted variables for GC
        'use_arrow_functions' => false,

        // disable too destructive formating for now
        'declare_strict_types' => false,
        'no_useless_else' => false,
        'phpdoc_no_empty_return' => false,
        'psr_autoloading' => false,
        'strict_comparison' => false,
        'string_length_to_empty' => false,

        // TODO
        'array_indentation' => false,
        'binary_operator_spaces' => ['default' => 'at_least_single_space'],
        'blank_line_before_statement' => false,
        'class_attributes_separation' => false,
        'control_structure_continuation_position' => false,
        'escape_implicit_backslashes' => false, // TODO fix after "single_quote" rule is fixed
        'explicit_string_variable' => false,
        'general_phpdoc_annotation_remove' => false,
        'increment_style' => false,
        'method_argument_space' => false,
        'modernize_types_casting' => false,
        'native_constant_invocation' => false,
        'new_with_parentheses' => false,
        'no_blank_lines_after_phpdoc' => false,
        'no_break_comment' => false,
        'no_extra_blank_lines' => false,
        'php_unit_method_casing' => false,
        'phpdoc_annotation_without_dot' => false,
        'phpdoc_summary' => false,
        'single_line_comment_spacing' => false,
        'single_quote' => false,
        'ternary_to_null_coalescing' => false,
        'visibility_required' => false,

        // TODO - risky
        'no_unset_on_property' => false,
        'php_unit_data_provider_name' => false,
        'php_unit_strict' => false,
        'php_unit_test_case_static_method_calls' => false,
        'random_api_migration' => false,
        'self_accessor' => false,
        'strict_param' => false,
    ])
    ->setFinder($finder)
    ->setCacheFile(sys_get_temp_dir() . '/php-cs-fixer.' . md5(__DIR__) . '.cache');

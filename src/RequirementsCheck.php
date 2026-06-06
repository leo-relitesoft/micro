<?php

namespace App;

class RequirementsCheck
{

    public static function run(): void
    {
        $required = ['sodium', 'zip'];
        $modules = get_loaded_extensions();
        $diff = array_diff($required, $modules);
        echo json_encode(array_values($diff));
    }
}
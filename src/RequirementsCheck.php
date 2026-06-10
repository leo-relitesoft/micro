<?php

namespace App;

class RequirementsCheck
{

    public static function getMissingModules(): array
    {
        $required = ['sodium', 'zip'];
        $modules = get_loaded_extensions();
        $diff = array_diff($required, $modules);
        return array_values($diff);
    }
}
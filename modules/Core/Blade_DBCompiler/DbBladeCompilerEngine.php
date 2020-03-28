<?php

namespace Modules\Core\Blade_DBCompiler;

use Illuminate\View\Engines\CompilerEngine;

class DbBladeCompilerEngine extends CompilerEngine
{
    /**
     * DbBladeCompilerEngine constructor.
     *
     * @param DbBladeCompiler $bladeCompiler
     */
    public function __construct(DbBladeCompiler $bladeCompiler)
    {
        parent::__construct($bladeCompiler);
    }
}

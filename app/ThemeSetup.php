<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\Core\TemplateWrapper;

class ThemeSetup extends BaseTheme
{
    protected function register(): void
    {
        add_filter('template_include', [TemplateWrapper::class, 'wrap'], 109);
    }
}

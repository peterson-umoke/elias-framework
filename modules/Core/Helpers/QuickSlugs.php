<?php


namespace Modules\Core\Helpers;


use Modules\Core\Sluggable\SlugOptions;

trait QuickSlugs
{
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->saveSlugsTo("name")
            ->generateSlugsFrom("title")
            ->doNotGenerateSlugsOnUpdate();
    }

}

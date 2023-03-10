<?php

declare(strict_types=1);

namespace Hyde\Testing;

use Hyde\Pages\Concerns\HydePage;
use Hyde\Pages\MarkdownPage;
use Hyde\Support\Facades\Render;
use Hyde\Support\Models\Route;

trait InteractsWithPages
{
    protected function mockRoute(?Route $route = null): void
    {
        Render::share('route', $route ?? (new Route(new MarkdownPage())));
    }

    protected function mockPage(?HydePage $page = null, ?string $currentPage = null): void
    {
        Render::share('page', $page ?? new MarkdownPage());
        Render::share('routeKey', $currentPage ?? 'PHPUnit');
    }

    protected function mockCurrentPage(string $currentPage): void
    {
        Render::share('routeKey', $currentPage);
    }
}

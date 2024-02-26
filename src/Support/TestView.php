<?php

declare(strict_types=1);

namespace Hyde\Testing\Support;

use Illuminate\Testing\Assert as PHPUnit;

class TestView extends \Illuminate\Testing\TestView
{
    /**
     * Assert that the given HTML is contained within the view.
     *
     * @return $this
     */
    public function assertSeeHtml(string $value, bool $ignoreFormatting = false): static
    {
        if ($ignoreFormatting) {
            return $this->assertSeeHtmlIgnoringFormatting($value);
        }

        return $this->assertSee($value, false);
    }

    /**
     * Assert that the given HTML is contained within the view text, ignoring whitespace and newlines.
     *
     * @return $this
     */
    public function assertSeeHtmlIgnoringFormatting(string $value): static
    {
        PHPUnit::assertStringContainsString($this->trimNewlinesAndIndentation($value), $this->trimNewlinesAndIndentation($this->rendered));

        return $this;
    }

    protected function trimNewlinesAndIndentation(string $value): string
    {
        return str_replace(['    ', "\t", "\n", "\r"], '', $value);
    }
}
<?php

namespace CodeWithDennis\FilamentTranslateField\Commands;

use Illuminate\Console\Command;

class FilamentTranslateFieldCommand extends Command
{
    public $signature = 'filament-translate-field';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}

<?php

namespace App\Console\Commands;

use App\Console\Commands\InstallLanguagesCommand;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'install';

    protected $description = 'Установить приложение';

    public function handle(): void
    {
        $this->call(InstallLanguagesCommand::class);
        $this->call(InstallTranslationsCommand::class);

        $this->info('Приложение установлено');
    }
}

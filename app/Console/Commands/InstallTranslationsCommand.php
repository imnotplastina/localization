<?php

namespace App\Console\Commands;

use App\Models\Translation;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class InstallTranslationsCommand extends Command
{
    protected $signature = 'translations:install';

    protected $description = 'Перенести переводы в базу данных';

    private array $ignore = ['http-statuses'];

    public function handle(): void
    {
        $this->installTranslations();

        $this->info('Переводы перенесены');
    }

    private function installTranslations(): void
    {
        $translations = $this->getTranslations();

        $this->createTranslations($translations);
    }

    private function getTranslations(): array
    {
        $storage = Storage::disk('base');

        $translations = [
            // 'navbar' => ['home' => ['ru' => 'Главная', 'en' => 'Home']],
            // 'validation' => ['required' => ['ru' => 'Обязательно', 'en' => 'Required']],
        ];

        foreach ($storage->directories('lang') as $folder) {
            $lang = pathinfo($folder, PATHINFO_FILENAME);

            foreach ($storage->files($folder) as $file) {
                $group = pathinfo($file, PATHINFO_FILENAME);

                if (in_array($group, $this->ignore)) {
                    continue;
                }

                $translations[$group] ??= [];

                $translated = Arr::dot(require $file);

                foreach ($translated as $key => $text) {
                    if (empty($text)) continue;

                    $translations[$group][$key] ??= [];
                    $translations[$group][$key][$lang] = $text;
                }
            }
        }

        return $translations;
    }

    private function createTranslations(array $translations): void
    {
        $models = Translation::query()->get();

        foreach ($translations as $group => $keys) {
            foreach ($keys as $key => $text) {
                $model = $models->where('group', $group)
                    ->where('key', $key)->first()
                    ?: new Translation;

                $text = ($model->text ?? []) + $text;

                $model->fill(compact('group', 'key', 'text'))->save();
            }
        }
    }
}

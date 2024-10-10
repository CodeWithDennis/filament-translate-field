<?php

namespace CodeWithDennis\FilamentTranslateField\Filament\Forms\Actions;

use Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'translateFormAction';
    }

    public function action(Closure | string | null $action): static
    {
        if ($action !== 'translate') {
            throw new \Exception('You\'re unable to override the action for this plugin');
        }

        $this->action = $this->translate();

        return $this;
    }

    private function translate(): Closure
    {
        return function (array $data, Set $set) {
            $column = $this->getComponent()->getStatePath(false);

            $set($column, $data['translated']);
        };
    }

    protected function getLanguages()
    {
        return config('filament-translate-field.languages');
    }

    protected function setUp(): void
    {
        parent::setUp();

        $columns = config('filament-translate-field.auto_detect') ? 1 : 2;

        $this->icon('heroicon-s-language')
            ->modalSubmitActionLabel(__('Save'))
            ->label(__('Translate'));

        $this->form([
            Grid::make()
                ->columns($columns)
                ->schema([
                    Select::make('original_language')
                        ->hidden(fn () => config('filament-translate-field.auto_detect'))
                        ->options($this->getLanguages())
                        ->required()
                        ->columns()
                        ->live(),
                    Select::make('language')
                        ->default(fn () => config('filament-translate-field.default_language'))
                        ->options($this->getLanguages())
                        ->required()
                        ->live(),
                ]),
            Placeholder::make('original')
                ->label(__('Original'))
                ->content(function () {
                    $component = $this->getComponent();

                    return $component->getRecord()->{$component->getStatePath(false)};
                })
                ->visible(fn (Get $get) => ! empty($get('language'))),
            Placeholder::make('translation')
                ->label(__('Translation'))
                ->live()
                ->visible(fn (Get $get) => ! empty($get('language')))
                ->content(function (Get $get, Set $set, GoogleTranslate $googleTranslate) {
                    $language = $get('language');

                    if (! empty($language)) {
                        $googleTranslate->setTarget($language);
                        $googleTranslate->setSource(! config('filament-translate-field.auto_detect') ? $get('original_language') : null);

                        $component = $this->getComponent();
                        $field = $component->getRecord()->{$component->getStatePath(false)};
                        $translation = $googleTranslate->translate($field);

                        $set('translated', $translation);

                        return $translation;
                    }

                    $set('translated', null);

                    return null;
                }),
            Hidden::make('translated'),
        ]);

        $this->action('translate');
    }
}

<?php

namespace CodeWithDennis\FilamentTranslateField\Filament\Forms\Actions;

use Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
        return function (array $data, Set $set, $livewire) {
            $field = $livewire->mountedFormComponentActionsComponents[0];
            $field = str($field)->afterLast('.')->value();

            $set($field, $data['translation']);
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
                        ->afterStateUpdated(function (Set $set, Get $get, $state, GoogleTranslate $googleTranslate, $livewire) {
                            if (! empty($state)) {
                                $googleTranslate->setTarget($state);
                                $googleTranslate->setSource(config('filament-translate-field.auto_detect') ? $get('original_language') : null);

                                $field = $livewire->mountedFormComponentActionsComponents[0];
                                $field = str($field)->afterLast('.')->value();
                                $field = $livewire->data[$field];

                                $set('original', $field);
                                $set('translation', $googleTranslate->translate($field));
                            } else {
                                $set('translation', null);
                            }
                        })
                        ->options($this->getLanguages())
                        ->required()
                        ->live(),
                ]),
            Textarea::make('original')
                ->label(__('Original'))
                ->dehydrated(false)
                ->disabled()
                ->visible(fn (Get $get) => ! empty($get('language')))
                ->rows(5)
                ->required(),
            Textarea::make('translation')
                ->label(__('Translation'))
                ->visible(fn (Get $get) => ! empty($get('language')))
                ->rows(5),
        ]);

        $this->action('translate');
    }
}

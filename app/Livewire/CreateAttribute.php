<?php

namespace App\Livewire;

use App\Models\Attribute;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class CreateAttribute extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Category Information')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TagsInput::make('values')
                            ->placeholder('add a value'),
                    ])
            ])
            ->statePath('data')
            ->model(Attribute::class);
    }

    public function render()
    {
        return view('livewire.create-attribute');
    }

    public function submit()
    {
        $data = $this->form->getState();
        $data['values'] = implode(',', $data['values']);
        Attribute::create($data);
        return redirect()->route('attributes.index')->with('success', 'attribute created with success');
    }
}

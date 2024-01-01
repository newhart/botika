<?php

namespace App\Livewire;

use App\Models\Attribute;
use Filament\Forms;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class EditAttribute extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Attribute $record;

    public function mount($id): void
    {
        $attribute = Attribute::where('id', (int) $id)->first();
        $attribute->values = explode(',', $attribute->values);
        $this->record = $attribute;
        $this->form->fill($this->record->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TagsInput::make('values'),
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $data['values'] = implode(',', $data['values']);
        $this->record->update($data);
    }

    public function render(): View
    {
        return view('livewire.edit-attribute');
    }
}

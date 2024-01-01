<?php

namespace App\Livewire\Role;

use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Role;

class EditRole extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Role $record;

    public function mount($id): void
    {
        $role  = Role::with('permissions')->where('id', (int)$id)->first();
        $this->record = $role;
        $this->form->fill(['roles' => [['name' => $role->name, 'permissions' => $role->permissions->pluck('name')->toArray()]]]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Repeater::make('roles')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->placeholder('add the name role'),
                        TagsInput::make('permissions')
                            ->required()
                            ->placeholder('add permission')
                    ])
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();
        // Assuming only one role is edited at a time
        $roleData = $data['roles'][0];
        $this->record->update(['name' => $roleData['name']]);
        // Sync the permissions for the role
        $this->record->syncPermissions($roleData['permissions']);
    }

    public function render(): View
    {
        return view('livewire.role.edit-role');
    }
}

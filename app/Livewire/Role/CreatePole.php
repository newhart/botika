<?php

namespace App\Livewire\Role;

use Spatie\Permission\Models\Role;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;

class CreatePole extends Component implements HasForms
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

    public function create(): void
    {
        $data = $this->form->getState();
        foreach ($data['roles'] as $role_item) {
            $role = Role::create(['name' => $role_item['name']]);
            foreach ($role_item['permissions'] as $permission_item) {
                $permission = Permission::create(['name' => $permission_item]);
                $role->givePermissionTo($permission);
            }
        }
    }

    public function render(): View
    {
        return view('livewire.role.create-pole');
    }
}

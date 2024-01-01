<div>
    <form wire:submit="save">
        {{ $this->form }}

        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>

    <x-filament-actions::modals />
</div>

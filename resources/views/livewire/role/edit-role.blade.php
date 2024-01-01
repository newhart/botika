<div>
    <form wire:submit="save">
        {{ $this->form }}
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>

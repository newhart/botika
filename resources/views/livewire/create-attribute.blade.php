<div class="container">
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>
    <x-filament-actions::modals />
</div>

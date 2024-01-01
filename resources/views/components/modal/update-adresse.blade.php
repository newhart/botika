<div class="modal fade theme-modal" id="add-address-{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <edit-adress user="{{ auth()->user() }}" datas="{{ $addres }}" />
    </div>
</div>

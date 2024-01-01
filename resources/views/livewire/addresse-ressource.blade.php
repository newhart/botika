  <!-- Add address modal box start -->
  <div class="modal fade theme-modal" id="add-address" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="false">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
          <form class="modal-content" wire:submit.prevent="save" method="POST">
              @csrf
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <i class="fa-solid fa-xmark"></i>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-floating mb-4 theme-form-floating">
                      <input type="text" class="form-control @if (isset($errors['author'])) 'is-invalid' @endif"
                          id="author" placeholder="Enter First Name" wire:model="author" name="author">
                      <label for="author">First Name</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                          wire:model="first_name">
                      <label for="lname">Last Name</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <input wire:model="email" type="email" class="form-control" id="email"
                          placeholder="Enter Email Address">
                      <label for="email">Email Address</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <textarea wire:model="address" class="form-control" placeholder="Leave a comment here" id="address"
                          style="height: 100px"></textarea>
                      <label for="address">Enter Address</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <input wire:model="phone" type="text" class="form-control" id="phpne"
                          placeholder="Enter your phone number">
                      <label for="phone">Phone Number</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <input type="text" class="form-control" id="type" placeholder="Example Home..."
                          wire:model="type">
                      <label for="type">Type</label>
                  </div>

                  <div class="form-floating mb-4 theme-form-floating">
                      <input type="text" class="form-control" id="pin_code" placeholder="Code pine"
                          wire:model="pin_code">
                      <label for="pin_code">Code Pine</label>
                  </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn theme-bg-color btn-md text-white">Save
                      changes</button>
              </div>
          </form>
      </div>
  </div>
  <!-- Add address modal box end -->

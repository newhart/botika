<template>
    <div
        class="modal fade theme-modal"
        id="editProfile"
        tabindex="-1"
        aria-labelledby="exampleModalLabel2"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">
                        Edit Profile
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-4">
                        <div class="col-xxl-12">
                            <div class="form-floating theme-form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="pname"
                                />
                                <label for="pname">Full Name</label>
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div class="form-floating theme-form-floating">
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email1"
                                />
                                <label for="email1">Email address</label>
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div class="form-floating theme-form-floating">
                                <input
                                    class="form-control"
                                    type="tel"
                                    value=""
                                    name="mobile"
                                    id="mobile"
                                    maxlength="10"
                                />
                                <label for="mobile">Phone number</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address1"
                                />
                                <label for="address1">Add Address</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address2"
                                />
                                <label for="address2">Add Address 2</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating theme-form-floating">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address3"
                                    value="94080"
                                />
                                <label for="address3">Pin Code</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn-animation bg-red-400 text-white px-3 py-3"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button
                        type="button"
                        data-bs-dismiss="modal"
                        class="btn theme-bg-color btn-md fw-bold text-light"
                    >
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

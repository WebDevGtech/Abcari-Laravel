<div>
    <div>
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel"> {{ __('add-admin.add-admin') }}</h4>
                            <div class="col-sm-3  ml-auto">

                            </div>

                            <a href="{{ route('country-admin') }}"><button class="btn btn-outline-primary ml-1 mb-1">View
                                    Admin</button></a>
                        </div>




                        <div class="form-row mb-4">
                            <div class="col-sm-4 p-3">
                                <label>{{ __('add-admin.admin-name') }}</label>
                                <input type="text" wire:model="name" placeholder="name" class="form-control">
                                @error('name')
                                    <span class='error text-danger'>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-4 p-3">
                                <label>{{ __('add-admin.email') }}</label>
                                <input type="email" wire:model="email"placeholder="email@mail.com"
                                    class="form-control">
                                @error('email')
                                    <span class='error text-danger'>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-4 p-3">
                                <label>{{ __('add-admin.password') }}</label>
                                <input type="password" wire:model="password" placeholder="password"
                                    class="form-control">
                                @error('password')
                                    <span class='error text-danger'>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-4  p-3">
                                <label>{{ __('add-admin.country') }}</label>
                                <select wire:model="countryid" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach ($countryview as $countryviews)
                                        <option value="{{ $countryviews->id }}">
                                            {{ $countryviews->name }}</option>
                                    @endforeach
                                </select>
                                @error('countryid')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10"></div>
                            <div class="col-2"><button class="btn btn-primary ml-1 mb-1" wire:click="submit">
                                {{ __('add-admin.save') }}</button></div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('deleted', event => {
        $('#').click()
    })

    window.addEventListener('true', event => {
        $('#').click()
    })

    window.addEventListener('false', event => {
        $('#').click()
    })

    window.addEventListener('updated', event => {
        $('#').click()
    })
    window.addEventListener('saved', event => {
        $('#').click()
    })
</script>

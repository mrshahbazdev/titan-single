<div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('swal', (event) => {
                const data = event
                swal.fire({
                    icon: data[0]['icon'],
                    title: data[0]['title'],
                    text: data[0]['text'],
                    timer: 3000,
                    showConfirmButton: false
                })
            });
        });
    </script>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="mb-3">Site Settings</h4>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="updateSettings">
                                <div class="row">
                                    <!-- Logo Upload Section -->
                                    <div class="col-md-12 mb-4">
                                        <div class="card border">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0"><i class="fa fa-image me-2"></i>Site Logo</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 text-center">
                                                        <label class="form-label fw-bold">Current Logo</label>
                                                        <div class="border rounded p-3 bg-dark" style="min-height: 120px; display: flex; align-items: center; justify-content: center;">
                                                            @if($currentLogo)
                                                                <img src="{{ $currentLogo }}" alt="Current Logo" style="max-width: 200px; max-height: 100px; object-fit: contain;">
                                                            @else
                                                                <span class="text-muted">No logo uploaded</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <label class="form-label fw-bold">Preview</label>
                                                        <div class="border rounded p-3 bg-dark" style="min-height: 120px; display: flex; align-items: center; justify-content: center;">
                                                            @if($siteLogo)
                                                                <img src="{{ $siteLogo->temporaryUrl() }}" alt="New Logo Preview" style="max-width: 200px; max-height: 100px; object-fit: contain;">
                                                            @else
                                                                <span class="text-muted">Upload to preview</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label fw-bold">Upload New Logo</label>
                                                        <input type="file" wire:model="siteLogo" class="form-control" accept="image/*">
                                                        <small class="text-muted">Recommended: PNG or JPG, max 2MB</small>
                                                        @error('siteLogo') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
                                                        <div wire:loading wire:target="siteLogo" class="mt-2">
                                                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                                <span class="visually-hidden">Uploading...</span>
                                                            </div>
                                                            <span class="text-primary ms-1">Uploading...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Site Info Section -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Site Title</label>
                                        <input type="text" wire:model="siteTitle" class="form-control" placeholder="Enter site title">
                                        @error('siteTitle') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Site URL</label>
                                        <input type="text" wire:model="siteUrl" class="form-control" placeholder="Enter site URL">
                                        @error('siteUrl') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Financial Settings -->
                                    <div class="col-md-12 mb-3">
                                        <hr>
                                        <h5><i class="fa fa-cog me-2"></i>Financial Settings</h5>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Min Withdrawal</label>
                                        <input type="number" step="0.01" wire:model="minWithdrawal" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Max Withdrawal</label>
                                        <input type="number" step="0.01" wire:model="maxWithdrawal" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Withdrawal Times</label>
                                        <input type="number" wire:model="withdrawalTimes" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Min Recharge</label>
                                        <input type="number" step="0.01" wire:model="minRecharge" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Max Recharge</label>
                                        <input type="number" step="0.01" wire:model="maxRecharge" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label fw-bold">Recharge Times</label>
                                        <input type="number" wire:model="rechargeTimes" class="form-control">
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <span wire:loading.remove wire:target="updateSettings">
                                                <i class="fa fa-save me-2"></i>Save Settings
                                            </span>
                                            <span wire:loading wire:target="updateSettings">
                                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>Saving...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

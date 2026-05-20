<div>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('swal', (event) => {
                const data = event;
                swal.fire({
                    icon: data[0]['icon'],
                    title: data[0]['title'],
                    text: data[0]['text'],
                    timer: 3000,
                    showConfirmButton: false
                });
            });
        });
    </script>

    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="mb-3"><i class="fa fa-terminal me-2"></i>Artisan Command Runner</h4>
                            <p class="text-muted">Run Laravel Artisan commands directly from the admin panel.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Quick Commands -->
                                <div class="col-md-8">
                                    <div class="card border">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0"><i class="fa fa-bolt me-2"></i>Quick Commands</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <!-- Migration Commands -->
                                                <div class="col-12">
                                                    <h6 class="text-primary"><i class="fa fa-database me-1"></i> Database</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('migrate')" class="btn btn-primary w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('migrate')"><i class="fa fa-play me-1"></i>Run Migrations</span>
                                                        <span wire:loading wire:target="runCommand('migrate')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('migrate:status')" class="btn btn-info w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('migrate:status')"><i class="fa fa-list me-1"></i>Migration Status</span>
                                                        <span wire:loading wire:target="runCommand('migrate:status')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('migrate:rollback')" class="btn btn-warning w-100" wire:loading.attr="disabled" onclick="return confirm('Are you sure you want to rollback?')">
                                                        <span wire:loading.remove wire:target="runCommand('migrate:rollback')"><i class="fa fa-undo me-1"></i>Rollback</span>
                                                        <span wire:loading wire:target="runCommand('migrate:rollback')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('db:seed')" class="btn btn-secondary w-100" wire:loading.attr="disabled" onclick="return confirm('Are you sure you want to run seeders?')">
                                                        <span wire:loading.remove wire:target="runCommand('db:seed')"><i class="fa fa-seedling me-1"></i>Run Seeders</span>
                                                        <span wire:loading wire:target="runCommand('db:seed')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>

                                                <!-- Storage & Config -->
                                                <div class="col-12 mt-3">
                                                    <h6 class="text-success"><i class="fa fa-cogs me-1"></i> Storage & Config</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('storage:link')" class="btn btn-success w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('storage:link')"><i class="fa fa-link me-1"></i>Storage Link</span>
                                                        <span wire:loading wire:target="runCommand('storage:link')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('key:generate')" class="btn btn-dark w-100" wire:loading.attr="disabled" onclick="return confirm('Generate new app key? This may invalidate existing sessions.')">
                                                        <span wire:loading.remove wire:target="runCommand('key:generate')"><i class="fa fa-key me-1"></i>Generate Key</span>
                                                        <span wire:loading wire:target="runCommand('key:generate')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('route:list')" class="btn btn-outline-primary w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('route:list')"><i class="fa fa-list me-1"></i>Route List</span>
                                                        <span wire:loading wire:target="runCommand('route:list')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>

                                                <!-- Cache Commands -->
                                                <div class="col-12 mt-3">
                                                    <h6 class="text-danger"><i class="fa fa-broom me-1"></i> Cache Management</h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <button wire:click="runCommand('cache:clear')" class="btn btn-outline-danger w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('cache:clear')"><i class="fa fa-trash me-1"></i>Cache</span>
                                                        <span wire:loading wire:target="runCommand('cache:clear')"><span class="spinner-border spinner-border-sm"></span></span>
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button wire:click="runCommand('config:clear')" class="btn btn-outline-danger w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('config:clear')"><i class="fa fa-trash me-1"></i>Config</span>
                                                        <span wire:loading wire:target="runCommand('config:clear')"><span class="spinner-border spinner-border-sm"></span></span>
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button wire:click="runCommand('route:clear')" class="btn btn-outline-danger w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('route:clear')"><i class="fa fa-trash me-1"></i>Routes</span>
                                                        <span wire:loading wire:target="runCommand('route:clear')"><span class="spinner-border spinner-border-sm"></span></span>
                                                    </button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button wire:click="runCommand('view:clear')" class="btn btn-outline-danger w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('view:clear')"><i class="fa fa-trash me-1"></i>Views</span>
                                                        <span wire:loading wire:target="runCommand('view:clear')"><span class="spinner-border spinner-border-sm"></span></span>
                                                    </button>
                                                </div>

                                                <!-- Optimize -->
                                                <div class="col-12 mt-3">
                                                    <h6 class="text-info"><i class="fa fa-rocket me-1"></i> Optimization</h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('optimize')" class="btn btn-info w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('optimize')"><i class="fa fa-rocket me-1"></i>Optimize</span>
                                                        <span wire:loading wire:target="runCommand('optimize')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('optimize:clear')" class="btn btn-outline-info w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('optimize:clear')"><i class="fa fa-broom me-1"></i>Clear All</span>
                                                        <span wire:loading wire:target="runCommand('optimize:clear')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click="runCommand('config:cache')" class="btn btn-outline-success w-100" wire:loading.attr="disabled">
                                                        <span wire:loading.remove wire:target="runCommand('config:cache')"><i class="fa fa-save me-1"></i>Cache Config</span>
                                                        <span wire:loading wire:target="runCommand('config:cache')"><span class="spinner-border spinner-border-sm me-1"></span>Running...</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Output Panel -->
                                <div class="col-md-4">
                                    <div class="card border">
                                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                            <h5 class="mb-0"><i class="fa fa-terminal me-2"></i>Output</h5>
                                            @if(count($commandHistory) > 0)
                                                <button wire:click="clearHistory" class="btn btn-sm btn-outline-light">Clear</button>
                                            @endif
                                        </div>
                                        <div class="card-body p-0">
                                            <div style="background: #1e1e1e; color: #d4d4d4; font-family: 'Courier New', monospace; font-size: 13px; padding: 15px; min-height: 300px; max-height: 500px; overflow-y: auto;">
                                                @if($output)
                                                    <pre style="margin: 0; white-space: pre-wrap; color: #d4d4d4;">{{ $output }}</pre>
                                                @else
                                                    <span style="color: #666;">Select a command to run...</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Command History -->
                                @if(count($commandHistory) > 0)
                                <div class="col-12 mt-3">
                                    <div class="card border">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0"><i class="fa fa-history me-2"></i>Command History</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Command</th>
                                                            <th>Status</th>
                                                            <th>Output</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($commandHistory as $entry)
                                                        <tr>
                                                            <td><code>{{ $entry['time'] }}</code></td>
                                                            <td><code>php artisan {{ $entry['command'] }}</code></td>
                                                            <td>
                                                                @if($entry['status'] === 'success')
                                                                    <span class="badge bg-success">Success</span>
                                                                @else
                                                                    <span class="badge bg-danger">Error</span>
                                                                @endif
                                                            </td>
                                                            <td><small>{{ \Illuminate\Support\Str::limit($entry['output'], 80) }}</small></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

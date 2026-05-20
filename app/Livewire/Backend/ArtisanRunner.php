<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

class ArtisanRunner extends Component
{
    public $user;
    public $output = '';
    public $selectedCommand = '';
    public $customCommand = '';
    public $commandHistory = [];

    protected $allowedCommands = [
        'migrate' => 'Run Database Migrations',
        'migrate:status' => 'Migration Status',
        'migrate:rollback' => 'Rollback Last Migration',
        'storage:link' => 'Create Storage Symlink',
        'cache:clear' => 'Clear Application Cache',
        'config:clear' => 'Clear Config Cache',
        'config:cache' => 'Cache Config',
        'route:clear' => 'Clear Route Cache',
        'route:cache' => 'Cache Routes',
        'route:list' => 'List All Routes',
        'view:clear' => 'Clear Compiled Views',
        'view:cache' => 'Cache Views',
        'optimize' => 'Optimize Application',
        'optimize:clear' => 'Clear All Caches',
        'key:generate' => 'Generate App Key',
        'db:seed' => 'Run Database Seeders',
    ];

    protected $allowedShellCommands = [
        'composer install' => 'Composer Install',
        'composer update' => 'Composer Update',
        'composer dump-autoload' => 'Composer Dump Autoload',
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function getAllowedCommands()
    {
        return $this->allowedCommands;
    }

    public function runCommand($command = null)
    {
        $cmd = $command ?? $this->selectedCommand;

        if (empty($cmd)) {
            $this->output = 'Please select a command to run.';
            return;
        }

        if (!array_key_exists($cmd, $this->allowedCommands)) {
            $this->output = 'Error: This command is not allowed.';
            return;
        }

        try {
            $exitCode = Artisan::call($cmd, [], new \Symfony\Component\Console\Output\BufferedOutput());
            $result = Artisan::output();

            if (empty(trim($result))) {
                $result = $exitCode === 0
                    ? "Command '{$cmd}' executed successfully."
                    : "Command '{$cmd}' finished with exit code: {$exitCode}";
            }

            $this->output = $result;

            array_unshift($this->commandHistory, [
                'command' => $cmd,
                'label' => $this->allowedCommands[$cmd],
                'output' => $result,
                'status' => $exitCode === 0 ? 'success' : 'error',
                'time' => now()->format('H:i:s'),
            ]);

            if (count($this->commandHistory) > 20) {
                array_pop($this->commandHistory);
            }

            $this->dispatch('swal', [
                'title' => $exitCode === 0 ? 'Success!' : 'Warning',
                'text' => "Command '{$this->allowedCommands[$cmd]}' executed.",
                'icon' => $exitCode === 0 ? 'success' : 'warning',
            ]);
        } catch (\Exception $e) {
            $this->output = 'Error: ' . $e->getMessage();

            array_unshift($this->commandHistory, [
                'command' => $cmd,
                'label' => $this->allowedCommands[$cmd],
                'output' => $e->getMessage(),
                'status' => 'error',
                'time' => now()->format('H:i:s'),
            ]);

            $this->dispatch('swal', [
                'title' => 'Error!',
                'text' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }

    public function runCustomCommand()
    {
        $cmd = trim($this->customCommand);

        if (empty($cmd)) {
            $this->output = 'Please enter a command.';
            return;
        }

        $parts = explode(' ', $cmd);
        $baseCmd = $parts[0];

        if (!array_key_exists($baseCmd, $this->allowedCommands)) {
            $this->output = "Error: '{$baseCmd}' is not in the allowed commands list.";
            return;
        }

        $this->selectedCommand = $baseCmd;
        $this->runCommand($baseCmd);
        $this->customCommand = '';
    }

    public function runShellCommand($command)
    {
        if (!array_key_exists($command, $this->allowedShellCommands)) {
            $this->output = 'Error: This shell command is not allowed.';
            return;
        }

        try {
            $basePath = base_path();
            $fullCommand = "cd {$basePath} && {$command} 2>&1";
            $result = shell_exec($fullCommand);

            if (empty(trim($result ?? ''))) {
                $result = "Command '{$command}' executed successfully.";
            }

            $this->output = $result;

            array_unshift($this->commandHistory, [
                'command' => $command,
                'label' => $this->allowedShellCommands[$command],
                'output' => $result,
                'status' => 'success',
                'time' => now()->format('H:i:s'),
            ]);

            if (count($this->commandHistory) > 20) {
                array_pop($this->commandHistory);
            }

            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => "Command '{$this->allowedShellCommands[$command]}' executed.",
                'icon' => 'success',
            ]);
        } catch (\Exception $e) {
            $this->output = 'Error: ' . $e->getMessage();

            array_unshift($this->commandHistory, [
                'command' => $command,
                'label' => $this->allowedShellCommands[$command],
                'output' => $e->getMessage(),
                'status' => 'error',
                'time' => now()->format('H:i:s'),
            ]);

            $this->dispatch('swal', [
                'title' => 'Error!',
                'text' => $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }

    public function clearHistory()
    {
        $this->commandHistory = [];
        $this->output = '';
    }

    public function render()
    {
        return view('livewire.backend.artisan-runner', [
            'commands' => $this->allowedCommands,
        ])->layout('components.layouts.admin', ['user' => $this->user]);
    }
}

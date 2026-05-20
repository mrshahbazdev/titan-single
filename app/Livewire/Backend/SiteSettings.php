<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\SystemSetting;

class SiteSettings extends Component
{
    public $user;
    public $siteTitle;
    public $siteUrl;
    public $siteLogoBase64 = '';
    public $currentLogo;
    public $minWithdrawal;
    public $maxWithdrawal;
    public $withdrawalTimes;
    public $minRecharge;
    public $maxRecharge;
    public $rechargeTimes;

    protected $rules = [
        'siteTitle' => 'nullable|string|max:255',
        'siteUrl' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $settings = SystemSetting::first();
        if ($settings) {
            $this->siteTitle = $settings->siteTitle;
            $this->siteUrl = $settings->siteUrl;
            $this->currentLogo = $settings->siteLogo;
            $this->minWithdrawal = $settings->minWithdrawal;
            $this->maxWithdrawal = $settings->maxWithdrawal;
            $this->withdrawalTimes = $settings->withdrawalTimes;
            $this->minRecharge = $settings->minRecharge;
            $this->maxRecharge = $settings->maxRecharge;
            $this->rechargeTimes = $settings->rechargeTimes;
        }
    }

    public function updateSettings()
    {
        $this->validate();

        $settings = SystemSetting::first();
        if (!$settings) {
            $settings = new SystemSetting();
        }

        if ($this->siteLogoBase64) {
            $imageInfo = explode(',', $this->siteLogoBase64);
            $decodedImage = base64_decode($imageInfo[1]);

            $extension = 'png';
            if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
                $extension = 'jpg';
            } elseif (strpos($imageInfo[0], 'gif') !== false) {
                $extension = 'gif';
            }

            $filename = 'site_logo_' . time() . '.' . $extension;

            $publicPath = public_path('assets/uploads/img');
            if (!FileSystem::exists($publicPath)) {
                FileSystem::makeDirectory($publicPath, 0755, true, true);
            }

            file_put_contents($publicPath . '/' . $filename, $decodedImage);

            $settings->siteLogo = asset('assets/uploads/img/' . $filename);
            $this->currentLogo = $settings->siteLogo;
            $this->siteLogoBase64 = '';
        }

        $settings->siteTitle = $this->siteTitle;
        $settings->siteUrl = $this->siteUrl;
        $settings->minWithdrawal = $this->minWithdrawal;
        $settings->maxWithdrawal = $this->maxWithdrawal;
        $settings->withdrawalTimes = $this->withdrawalTimes;
        $settings->minRecharge = $this->minRecharge;
        $settings->maxRecharge = $this->maxRecharge;
        $settings->rechargeTimes = $this->rechargeTimes;
        $settings->save();

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Site settings updated successfully',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        return view('livewire.backend.sitesettings')
            ->layout('components.layouts.admin', ['user' => $this->user]);
    }
}

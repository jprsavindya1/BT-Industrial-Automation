<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SoftwareDownload;

class SoftwareDownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Coolmay & FX3U PLC Software (GX Works2 Compatible)',
                'category' => 'PLC Software',
                'version' => 'v1.77F',
                'file_name' => 'GXW2-E-1.77F.zip',
                'file_size' => '142 MB',
                'os' => 'Windows 7 / 8 / 10 / 11',
                'url' => 'https://en.coolmay.com/webdown/GXW2-E-1.77F.zip',
                'description' => 'Official programming software for Coolmay & FX3U series PLCs. Supports Ladder Logic editing, online monitoring, PLC parameter configuration, and USB programming cable drivers.',
                'features' => [
                    'GX Works2 Programming Environment Compatibility',
                    'FX3U & Coolmay All-In-One Board Support',
                    'Ladder Diagram & SFC Programming Modes',
                    'USB/RS485 Communication Drivers Included'
                ],
                'badge' => 'PLC Essential',
                'icon_color' => 'amber',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Coolmay TK Series HMI Touchscreen Software',
                'category' => 'HMI Software',
                'version' => 'v2.1',
                'file_name' => 'Coolmay TK HMI Software.exe',
                'file_size' => '85 MB',
                'os' => 'Windows 7 / 8 / 10 / 11',
                'url' => 'https://en.coolmay.com/webdown/Coolmay%20TK%20HMI%20Software.exe',
                'description' => 'Official touchscreen screen editor for Coolmay TK series HMI panels (4.3", 7", 10" touchscreens). Create custom graphical interfaces, alarm logs, trending graphs, and Modbus communication configurations.',
                'features' => [
                    'Multi-page Screen Layout Editor & Element Library',
                    'Modbus RTU / Modbus ASCII Communication Setup',
                    'Real-Time Trend Graph & Alarm History Widgets',
                    'Offline Simulation & On-line Screen Download'
                ],
                'badge' => 'HMI Essential',
                'icon_color' => 'blue',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Coolmay & FX3U PLC USB Programming Cable Driver',
                'category' => 'USB Cable Driver',
                'version' => 'v2.0',
                'file_name' => 'PLC_USB_Driver_20161112.rar',
                'file_size' => '8.5 MB',
                'os' => 'Windows 7 / 8 / 10 / 11 (32/64-bit)',
                'url' => 'https://en.coolmay.com/kindeditor/attached/file/20161112/20161112172837_1460.rar',
                'description' => 'Official USB programming cable communication driver for Coolmay & FX3U PLCs. Resolves COM Port detection issues when connecting computer USB to PLC programming port.',
                'features' => [
                    'Enables Windows Virtual COM Port (CH340 / PL2303 / FTDI)',
                    'Fixes "Device Not Recognized" errors in GX Works2',
                    'Supports USB to RS232 / RS485 Programming Cables',
                    'Auto-Installer for 32-bit & 64-bit Windows OS'
                ],
                'badge' => 'Cable Driver',
                'icon_color' => 'emerald',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Coolmay HMI & All-In-One PLC USB Download Driver',
                'category' => 'USB Cable Driver',
                'version' => 'v1.8',
                'file_name' => 'HMI_USB_Upload_Driver_20160726.rar',
                'file_size' => '5.2 MB',
                'os' => 'Windows 7 / 8 / 10 / 11 (32/64-bit)',
                'url' => 'https://en.coolmay.com/kindeditor/attached/file/20160726/20160726102849_1048.rar',
                'description' => 'USB communication driver for downloading and uploading touchscreen layouts to Coolmay TK HMI panels and All-In-One HMI+PLC integrated controllers.',
                'features' => [
                    'USB-TTL & Micro-USB Download Cable Driver',
                    'Enables High-Speed HMI Screen Project Upload / Download',
                    'Compatible with Coolmay TK Series Touchscreens',
                    'Plug-and-Play Driver Installer Package'
                ],
                'badge' => 'Cable Driver',
                'icon_color' => 'purple',
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];

        foreach ($items as $item) {
            SoftwareDownload::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}

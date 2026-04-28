<?php

if (!function_exists('generate_id')) {
    function generate_id(string $prefix = ''): string
    {
        return $prefix . bin2hex(random_bytes(8));
    }
}

if (!function_exists('format_rupiah')) {
    function format_rupiah(float $amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('format_date_id')) {
    function format_date_id(string $date): string
    {
        $months = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $d = date('j', strtotime($date));
        $m = $months[(int)date('n', strtotime($date))];
        $y = date('Y', strtotime($date));
        return "$d $m $y";
    }
}

if (!function_exists('sanitize_input')) {
    function sanitize_input(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('upload_file')) {
    function upload_file($file, string $subdir = ''): string|false
    {
        if (!$file || !$file->isValid()) return false;

        $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'];
        if (!in_array($file->getMimeType(), $allowed)) return false;
        if ($file->getSize() > 10 * 1024 * 1024) return false;

        $publicPath = FCPATH . 'uploads/' . $subdir;
        if (!is_dir($publicPath)) mkdir($publicPath, 0755, true);

        $newName = time() . '_' . $file->getRandomName();

        try {
            $file->move($publicPath, $newName);
            return 'uploads/' . $subdir . $newName;
        } catch (\Exception $e) {
            return false;
        }
    }
}

if (!function_exists('delete_file')) {
    function delete_file(string $path): bool
    {
        $fullPath = FCPATH . $path;
        if (file_exists($fullPath) && is_file($fullPath)) {
            return unlink($fullPath);
        }
        return false;
    }
}

if (!function_exists('image_url')) {
    function image_url(?string $path, string $default = '/img/no-image.svg'): string
    {
        if (empty($path)) return $default;
        if (str_starts_with($path, 'http')) return $path;
        return '/' . ltrim($path, '/');
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        $security = \Config\Services::security();
        return '<input type="hidden" name="' . $security->getTokenName() . '" value="' . $security->getHash() . '">';
    }
}

if (!function_exists('old_input')) {
    function old_input(string $key, string $default = ''): string
    {
        $session = \Config\Services::session();
        return esc($session->getFlashdata('_ci_old_input.' . $key) ?? $default);
    }
}

if (!function_exists('alert_message')) {
    function alert_message(): string
    {
        $session = \Config\Services::session();
        $html = '';
        if ($session->getFlashdata('success')) {
            $html .= '<div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>'
                . $session->getFlashdata('success') . '</div>';
        }
        if ($session->getFlashdata('error')) {
            $html .= '<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>'
                . $session->getFlashdata('error') . '</div>';
        }
        return $html;
    }
}

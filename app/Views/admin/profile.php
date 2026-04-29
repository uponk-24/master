<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Profil Desa</h1>
</div>

<?= alert_message() ?>

<?php $p = $profile ?? []; ?>
<form action="<?= site_url('admin/profil/update') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
    <?= csrf_field() ?>

    <!-- Basic Info -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Informasi Dasar</h3>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nama Desa</label>
                <input type="text" name="name" value="<?= esc($p['name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Motto</label>
                <input type="text" name="motto" value="<?= esc($p['motto'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Luas Wilayah</label>
                <input type="text" name="area_size" value="<?= esc($p['area_size'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jumlah Dusun</label>
                <input type="text" name="hamlets" value="<?= esc($p['hamlets'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Penduduk</label>
                <input type="number" name="population" value="<?= esc($p['population'] ?? 0) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">KK</label>
                <input type="number" name="family_count" value="<?= esc($p['family_count'] ?? 0) ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Deskripsi & Sejarah</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['description'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Sejarah</label>
                <textarea name="history" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['history'] ?? '') ?></textarea>
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Visi & Misi</h3>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Visi</label>
                <textarea name="vision" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['vision'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Misi (satu per baris)</label>
                <textarea name="mission" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['mission'] ?? '') ?></textarea>
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg">Lokasi & Kontak</h3>
        <div class="grid sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium mb-1">Kecamatan</label>
                <input type="text" name="district" value="<?= esc($p['district'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kabupaten</label>
                <input type="text" name="regency" value="<?= esc($p['regency'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Provinsi</label>
                <input type="text" name="province" value="<?= esc($p['province'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Telepon</label>
                <input type="text" name="phone" value="<?= esc($p['phone'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" value="<?= esc($p['email'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Kode Pos</label>
                <input type="text" name="postal_code" value="<?= esc($p['postal_code'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-sm font-medium mb-1">Alamat</label>
                <textarea name="address" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm resize-none"><?= esc($p['address'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Jam Pelayanan</label>
                <input type="text" name="service_hours" value="<?= esc($p['service_hours'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Logo</label>
                <input type="file" name="logo" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                <?php if (!empty($p['logo_url'])): ?>
                    <p class="text-xs text-gray-400 mt-1">Logo saat ini: <?= esc($p['logo_url']) ?></p>
                <?php endif; ?>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Foto Background Beranda</label>
                <input type="file" name="hero_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                <?php if (!empty($p['hero_image'])): ?>
                    <div class="mt-2">
                        <img src="<?= image_url($p['hero_image']) ?>" alt="Hero" class="w-full h-32 object-cover rounded-lg border">
                        <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah</p>
                    </div>
                <?php else: ?>
                    <p class="text-xs text-gray-400 mt-1">Upload foto desa untuk background beranda (ukuran disarankan 1920x1080)</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Map & Location Picker -->
    <div class="bg-white rounded-2xl shadow-sm border p-6">
        <h3 class="font-bold mb-4 text-lg flex items-center gap-2">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Peta Lokasi Desa
        </h3>

        <!-- Village Search -->
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Cari Nama Desa</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" id="village-search" placeholder="Ketik nama desa, contoh: Taba Lagan..." autocomplete="off"
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
                <div id="search-loading" class="absolute inset-y-0 right-0 pr-3 flex items-center hidden">
                    <svg class="animate-spin h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/></svg>
                </div>
            </div>
            <!-- Search Results Dropdown -->
            <div id="search-results" class="mt-1 bg-white border border-gray-200 rounded-xl shadow-lg max-h-64 overflow-y-auto hidden"></div>
            <p class="text-xs text-gray-400 mt-1">Ketik nama desa lalu pilih dari hasil pencarian. Koordinat akan otomatis terisi.</p>
        </div>

        <!-- Lat/Lng inputs + Map -->
        <div class="grid sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium mb-1">Latitude</label>
                <input type="text" id="latitude" name="latitude" value="<?= esc($p['latitude'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Longitude</label>
                <input type="text" id="longitude" name="longitude" value="<?= esc($p['longitude'] ?? '') ?>" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-sm">
            </div>
        </div>

        <p class="text-xs text-gray-500 mb-3">
            <svg class="w-3.5 h-3.5 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Klik pada peta untuk menandai lokasi desa, atau geser marker ke posisi yang tepat.
        </p>

        <!-- Map Container -->
        <div class="rounded-xl overflow-hidden border border-gray-200" style="height: 400px;">
            <div id="admin-map" class="w-full h-full"></div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-semibold transition-colors shadow-lg shadow-primary/25">Simpan Perubahan</button>
    </div>
</form>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var latInput = document.getElementById('latitude');
    var lngInput = document.getElementById('longitude');
    var searchInput = document.getElementById('village-search');
    var searchResults = document.getElementById('search-results');
    var searchLoading = document.getElementById('search-loading');

    var initLat = parseFloat(latInput.value) || -3.8654;
    var initLng = parseFloat(lngInput.value) || 102.2568;

    // Initialize map
    var map = L.map('admin-map', {
        scrollWheelZoom: true,
        zoomControl: true
    }).setView([initLat, initLng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        maxZoom: 19
    }).addTo(map);

    // Custom marker icon
    var markerIcon = L.divIcon({
        html: '<div style="background:linear-gradient(135deg,#0d9488,#059669);width:40px;height:40px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(13,148,136,0.5);border:3px solid white;"><svg style="transform:rotate(45deg);width:20px;height:20px;" fill="white" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg></div>',
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -40],
        className: ''
    });

    // Draggable marker
    var marker = L.marker([initLat, initLng], {
        icon: markerIcon,
        draggable: true
    }).addTo(map);

    marker.bindPopup('<strong>Lokasi Desa</strong><br>Koordinat: ' + initLat.toFixed(6) + ', ' + initLng.toFixed(6));

    // Update inputs when marker is dragged
    marker.on('dragend', function(e) {
        var pos = e.target.getLatLng();
        latInput.value = pos.lat.toFixed(6);
        lngInput.value = pos.lng.toFixed(6);
        marker.setPopupContent('<strong>Lokasi Desa</strong><br>Koordinat: ' + pos.lat.toFixed(6) + ', ' + pos.lng.toFixed(6));
    });

    // Click on map to move marker
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        latInput.value = e.latlng.lat.toFixed(6);
        lngInput.value = e.latlng.lng.toFixed(6);
        marker.setPopupContent('<strong>Lokasi Desa</strong><br>Koordinat: ' + e.latlng.lat.toFixed(6) + ', ' + e.latlng.lng.toFixed(6));
        marker.openPopup();
    });

    // Update map when lat/lng inputs change manually
    function updateMapFromInputs() {
        var lat = parseFloat(latInput.value);
        var lng = parseFloat(lngInput.value);
        if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
            marker.setLatLng([lat, lng]);
            map.setView([lat, lng], 15);
            marker.setPopupContent('<strong>Lokasi Desa</strong><br>Koordinat: ' + lat.toFixed(6) + ', ' + lng.toFixed(6));
        }
    }
    latInput.addEventListener('change', updateMapFromInputs);
    lngInput.addEventListener('change', updateMapFromInputs);

    // ── Nominatim Village Search ──
    var searchTimeout = null;

    searchInput.addEventListener('input', function() {
        var query = this.value.trim();
        if (query.length < 3) {
            searchResults.classList.add('hidden');
            searchResults.innerHTML = '';
            return;
        }

        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            searchLoading.classList.remove('hidden');
            searchResults.classList.add('hidden');

            // Use Nominatim API to search for villages in Indonesia
            var url = 'https://nominatim.openstreetmap.org/search?' +
                'format=json' +
                '&q=' + encodeURIComponent(query) +
                '&countrycodes=id' +
                '&limit=8' +
                '&addressdetails=1' +
                '&accept-language=id';

            fetch(url, {
                headers: { 'User-Agent': 'DesaWebAdmin/1.0' }
            })
            .then(function(res) { return res.json(); })
            .then(function(data) {
                searchLoading.classList.add('hidden');

                if (data.length === 0) {
                    searchResults.innerHTML = '<div class="px-4 py-3 text-sm text-gray-500">Tidak ditemukan hasil untuk "' + escHtml(query) + '"</div>';
                    searchResults.classList.remove('hidden');
                    return;
                }

                var html = '';
                data.forEach(function(item) {
                    var displayName = item.display_name || '';
                    var shortName = item.name || item.display_name.split(',')[0];
                    var lat = item.lat;
                    var lon = item.lon;

                    // Build a nice label with type icon
                    var typeIcon = '📍';
                    var typeLabel = item.type || '';
                    if (typeLabel === 'village' || typeLabel === 'hamlet') typeIcon = '🏘️';
                    else if (typeLabel === 'town') typeIcon = '🏠';
                    else if (typeLabel === 'city') typeIcon = '🏙️';
                    else if (typeLabel === 'suburb') typeIcon = '🏡';
                    else if (typeLabel === 'administrative') typeIcon = '🏛️';

                    // Extract just the relevant parts
                    var parts = displayName.split(',').map(function(s) { return s.trim(); });
                    var areaInfo = parts.slice(1, 4).join(', ');

                    html += '<div class="px-4 py-3 hover:bg-primary/5 cursor-pointer border-b border-gray-100 last:border-0 transition-colors search-result-item" data-lat="' + lat + '" data-lng="' + lon + '" data-name="' + escHtml(shortName) + '">' +
                        '<div class="flex items-start gap-2">' +
                        '<span class="text-base mt-0.5">' + typeIcon + '</span>' +
                        '<div class="flex-1 min-w-0">' +
                        '<p class="text-sm font-medium text-gray-800 truncate">' + escHtml(shortName) + '</p>' +
                        '<p class="text-xs text-gray-500 truncate">' + escHtml(areaInfo) + '</p>' +
                        '<span class="inline-block mt-1 text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-500">' + escHtml(typeLabel) + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });

                searchResults.innerHTML = html;
                searchResults.classList.remove('hidden');

                // Attach click handlers to results
                searchResults.querySelectorAll('.search-result-item').forEach(function(item) {
                    item.addEventListener('click', function() {
                        var lat = parseFloat(this.dataset.lat);
                        var lng = parseFloat(this.dataset.lng);
                        var name = this.dataset.name;

                        // Update coordinate inputs
                        latInput.value = lat.toFixed(6);
                        lngInput.value = lng.toFixed(6);

                        // Move map and marker
                        marker.setLatLng([lat, lng]);
                        map.setView([lat, lng], 16);
                        marker.setPopupContent('<strong>' + escHtml(name) + '</strong><br>Koordinat: ' + lat.toFixed(6) + ', ' + lng.toFixed(6));
                        marker.openPopup();

                        // Update search input and close dropdown
                        searchInput.value = name;
                        searchResults.classList.add('hidden');
                    });
                });
            })
            .catch(function(err) {
                searchLoading.classList.add('hidden');
                searchResults.innerHTML = '<div class="px-4 py-3 text-sm text-red-500">Gagal mencari. Pastikan koneksi internet aktif.</div>';
                searchResults.classList.remove('hidden');
            });
        }, 500); // 500ms debounce
    });

    // Close search results when clicking outside
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.classList.add('hidden');
        }
    });

    // Escape HTML helper
    function escHtml(str) {
        var div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // Fix map rendering
    setTimeout(function() { map.invalidateSize(); }, 300);
});
</script>

<?= $this->endSection() ?>

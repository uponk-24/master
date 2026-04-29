<!-- Kontak & Lokasi -->
<section id="kontak" class="py-16 sm:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="inline-block px-4 py-1 rounded-full bg-primary/10 text-primary text-xs font-semibold tracking-wider uppercase mb-3">Hubungi Kami</span>
            <h2 class="text-3xl sm:text-4xl font-bold mb-4">Kontak & <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-cyan-600">Lokasi</span></h2>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Contact Info + Form -->
            <div class="space-y-6">
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold mb-4">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Alamat</p>
                                <p class="text-sm text-gray-500"><?= esc($village['address'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Telepon</p>
                                <p class="text-sm text-gray-500"><?= esc($village['phone'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Email</p>
                                <p class="text-sm text-gray-500"><?= esc($village['email'] ?? '-') ?></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Jam Pelayanan</p>
                                <p class="text-sm text-gray-500"><?= esc($village['service_hours'] ?? '-') ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <form action="<?= site_url('kontak/kirim') ?>" method="POST" class="bg-gray-50 rounded-2xl p-6">
                    <h3 class="font-bold mb-4">Kirim Pesan</h3>
                    <?= csrf_field() ?>
                    <?= alert_message() ?>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nama</label>
                            <input type="text" name="name" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-colors text-sm" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-colors text-sm" placeholder="email@contoh.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Pesan</label>
                            <textarea name="message" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-colors text-sm resize-none" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white py-2.5 rounded-xl font-medium transition-colors">Kirim Pesan</button>
                    </div>
                </form>
            </div>

            <!-- Map -->
            <?php
                $lat = !empty($village['latitude']) ? $village['latitude'] : '-3.8654';
                $lng = !empty($village['longitude']) ? $village['longitude'] : '102.2568';
                $villageName = esc($village['name'] ?? 'Desa');
            ?>
            <div class="space-y-3">
                <div class="rounded-2xl overflow-hidden shadow-md h-[400px] lg:h-[500px]">
                    <div id="village-map" class="w-full h-full" data-lat="<?= esc($lat) ?>" data-lng="<?= esc($lng) ?>" data-name="<?= $villageName ?>"></div>
                </div>
                <a href="https://www.google.com/maps/search/<?= urlencode($villageName) ?>/@<?= esc($lat) ?>,<?= esc($lng) ?>,15z" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 text-sm text-primary hover:text-primary-dark font-medium transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var mapEl = document.getElementById('village-map');
    if (!mapEl) return;

    var lat = parseFloat(mapEl.dataset.lat) || -3.8654;
    var lng = parseFloat(mapEl.dataset.lng) || 102.2568;
    var name = mapEl.dataset.name || 'Desa';

    var map = L.map('village-map', {
        scrollWheelZoom: false,
        zoomControl: true
    }).setView([lat, lng], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        maxZoom: 19
    }).addTo(map);

    // Custom marker icon
    var markerIcon = L.divIcon({
        html: '<div style="background:linear-gradient(135deg,#0d9488,#059669);width:36px;height:36px;border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(13,148,136,0.4);border:3px solid white;"><svg style="transform:rotate(45deg);width:18px;height:18px;" fill="white" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg></div>',
        iconSize: [36, 36],
        iconAnchor: [18, 36],
        popupAnchor: [0, -36],
        className: ''
    });

    var marker = L.marker([lat, lng], { icon: markerIcon }).addTo(map);
    marker.bindPopup(
        '<div style="text-align:center;padding:4px 8px;">' +
        '<strong style="font-size:14px;color:#0d9488;">' + name + '</strong><br>' +
        '<span style="font-size:12px;color:#666;">' + lat.toFixed(4) + ', ' + lng.toFixed(4) + '</span>' +
        '</div>'
    ).openPopup();

    // Fix map rendering after lazy load
    setTimeout(function() { map.invalidateSize(); }, 300);
});
</script>

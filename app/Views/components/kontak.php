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
                <form action="/kontak/kirim" method="POST" class="bg-gray-50 rounded-2xl p-6">
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
            <div class="rounded-2xl overflow-hidden shadow-md h-[400px] lg:h-auto">
                <?php $lat = $village['latitude'] ?? '-3.8654'; $lng = $village['longitude'] ?? '102.2568'; ?>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15000!2d<?= $lng ?>!3d<?= $lat ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwNTEnNTUuNSJTIDEwMsKwMTUnMjQuNSJF!5e0!3m2!1sid!2sid!4v1" width="100%" height="100%" style="border:0;min-height:400px" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

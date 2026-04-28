// Website Desa - JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const navTitle = document.getElementById('nav-title');
    const navSubtitle = document.getElementById('nav-subtitle');

    function handleScroll() {
        const scrolled = window.scrollY > 50;
        if (scrolled) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white/90', 'backdrop-blur-xl', 'shadow-sm', 'border-b', 'border-gray-100');
            if (navTitle) navTitle.classList.replace('text-white', 'text-gray-900');
            if (navSubtitle) navSubtitle.classList.replace('text-white/70', 'text-gray-500');
            document.querySelectorAll('.nav-link').forEach(l => {
                l.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                l.classList.add('text-gray-600', 'hover:text-primary', 'hover:bg-gray-100');
            });
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-white/90', 'backdrop-blur-xl', 'shadow-sm', 'border-b', 'border-gray-100');
            if (navTitle) navTitle.classList.replace('text-gray-900', 'text-white');
            if (navSubtitle) navSubtitle.classList.replace('text-gray-500', 'text-white/70');
            document.querySelectorAll('.nav-link').forEach(l => {
                l.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                l.classList.remove('text-gray-600', 'hover:text-primary', 'hover:bg-gray-100');
            });
        }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    // Mobile menu
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', function(e) {
            const id = this.getAttribute('href').substring(1);
            const el = document.getElementById(id);
            if (el) {
                e.preventDefault();
                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                if (mobileMenu) mobileMenu.classList.add('hidden');
            }
        });
    });

    // Scroll animations with staggered delay
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add staggered delay based on sibling position
                const parent = entry.target.parentElement;
                const siblings = parent ? Array.from(parent.querySelectorAll('[data-animate]')) : [];
                const siblingIndex = siblings.indexOf(entry.target);
                const delay = siblingIndex > 0 ? siblingIndex * 100 : 0;
                
                setTimeout(() => {
                    entry.target.classList.add('animate-in');
                }, delay);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.05, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

    // Counter animation for statistics
    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-target'));
        if (isNaN(target) || target === 0) return;
        
        const duration = 2000;
        const start = 0;
        const startTime = performance.now();
        
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            // Ease out cubic
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(start + (target - start) * eased);
            el.textContent = current.toLocaleString('id-ID');
            
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target.toLocaleString('id-ID');
            }
        }
        
        requestAnimationFrame(update);
    }

    // Observe counter elements
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));

    // Hero title subtle fade effect
    const heroTitle = document.getElementById('hero-title');
    if (heroTitle) {
        const gradientSpan = heroTitle.querySelector('span');
        if (gradientSpan) {
            gradientSpan.style.opacity = '0';
            gradientSpan.style.transform = 'translateY(15px)';
            gradientSpan.style.transition = 'opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1)';
            setTimeout(() => {
                gradientSpan.style.opacity = '1';
                gradientSpan.style.transform = 'translateY(0)';
            }, 200);
        }
    }
});

// Service modal
function openServiceModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) modal.classList.remove('hidden');
}

function closeServiceModal(id) {
    const modal = document.getElementById('modal-' + id);
    if (modal) modal.classList.add('hidden');
}

// Gallery lightbox
function openGallery(el) {
    const img = el.querySelector('img');
    if (img) {
        document.getElementById('lightbox-img').src = img.src;
        document.getElementById('gallery-lightbox').classList.remove('hidden');
    }
}

function closeGallery() {
    document.getElementById('gallery-lightbox').classList.add('hidden');
}

function closeMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    if (menu) menu.classList.add('hidden');
}

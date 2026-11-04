/* TANDS public site behaviour — header, mobile nav, sliders, counters, forms. */
(function () {
    'use strict';

    var csrfMeta = document.querySelector('meta[name="csrf-token"]');
    var csrfToken = csrfMeta ? csrfMeta.content : '';

    /* ---------- Header: compact shadow on scroll, tuck away on scroll down */
    var header = document.getElementById('siteHeader');
    if (header) {
        var lastY = window.pageYOffset;
        var ticking = false;
        var update = function () {
            var y = Math.max(window.pageYOffset, 0);
            header.classList.toggle('is-scrolled', y > 10);
            if (y < 140) {
                header.classList.remove('is-hidden');
            } else if (Math.abs(y - lastY) > 8) {
                header.classList.toggle('is-hidden', y > lastY && !document.body.classList.contains('nav-open'));
            }
            lastY = y;
            ticking = false;
        };
        window.addEventListener('scroll', function () {
            if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
        }, { passive: true });
        update();
    }

    /* ---------- WhatsApp widget: shows once the visitor has scrolled past
       the first screen, hides again when the footer comes into view. */
    var wa = document.getElementById('waWidget');
    var footer = document.getElementById('siteFooter');
    if (wa) {
        var waTicking = false;
        var updateWa = function () {
            var scrolledEnough = window.pageYOffset > Math.min(600, window.innerHeight * 0.7);
            var footerInView = footer ? footer.getBoundingClientRect().top < window.innerHeight - 40 : false;
            wa.classList.toggle('is-visible', scrolledEnough && !footerInView);
            waTicking = false;
        };
        window.addEventListener('scroll', function () {
            if (!waTicking) { window.requestAnimationFrame(updateWa); waTicking = true; }
        }, { passive: true });
        window.addEventListener('resize', updateWa);
        updateWa();
    }

    /* ---------- Mobile navigation */
    var mobileNav = document.getElementById('mobileNav');
    var navToggle = document.querySelector('.nav-toggle');
    function setNav(open) {
        if (!mobileNav) return;
        mobileNav.classList.toggle('is-open', open);
        mobileNav.setAttribute('aria-hidden', open ? 'false' : 'true');
        document.body.classList.toggle('nav-open', open);
        document.body.style.overflow = open ? 'hidden' : '';
        if (navToggle) navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) {
            var closeBtn = mobileNav.querySelector('.mobile-nav__close');
            if (closeBtn) closeBtn.focus();
        } else if (navToggle) {
            navToggle.focus();
        }
    }
    if (navToggle) navToggle.addEventListener('click', function () { setNav(true); });
    document.querySelectorAll('[data-close-nav]').forEach(function (el) {
        el.addEventListener('click', function () { setNav(false); });
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && mobileNav && mobileNav.classList.contains('is-open')) setNav(false);
    });
    document.querySelectorAll('.mobile-nav__acc').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var sub = document.getElementById(btn.getAttribute('aria-controls'));
            var open = btn.getAttribute('aria-expanded') !== 'true';
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            if (sub) sub.classList.toggle('is-open', open);
        });
    });
    window.addEventListener('resize', function () {
        if (window.innerWidth > 991 && mobileNav && mobileNav.classList.contains('is-open')) setNav(false);
    });

    /* ---------- Generic crossfade slider (hero + testimonials) */
    function initSlider(root, opts) {
        var slides = root.querySelectorAll(opts.slide);
        if (slides.length < 2) return;
        var extra = opts.extra ? root.querySelectorAll(opts.extra) : [];
        var current = root.querySelector('[data-current]');
        var bar = root.querySelector('[data-progress]');
        var index = 0;
        var timer = null;
        var pad = function (n) { return n < 10 ? '0' + n : String(n); };

        function show(i) {
            index = (i + slides.length) % slides.length;
            slides.forEach(function (s, k) { s.classList.toggle('is-active', k === index); });
            extra.forEach(function (s, k) { s.classList.toggle('is-active', k === index); });
            if (current) current.textContent = pad(index + 1);
            if (bar) {
                bar.classList.remove('is-running');
                void bar.offsetWidth; // restart the CSS transition
                bar.classList.add('is-running');
            }
        }
        function restart() {
            clearInterval(timer);
            timer = setInterval(function () { show(index + 1); }, opts.interval);
        }
        var prev = root.querySelector('[data-prev]');
        var next = root.querySelector('[data-next]');
        if (prev) prev.addEventListener('click', function () { show(index - 1); restart(); });
        if (next) next.addEventListener('click', function () { show(index + 1); restart(); });
        show(0);
        restart();
    }

    document.querySelectorAll('[data-hero]').forEach(function (root) {
        initSlider(root, { slide: '.hero__img', extra: '.hero__text', interval: 6000 });
    });
    document.querySelectorAll('[data-quotes]').forEach(function (root) {
        initSlider(root, { slide: '.quote', interval: 9000 });
    });

    /* ---------- Count-up stats. The real number is server-rendered, so it
       still reads correctly if the observer never fires. */
    var counters = document.querySelectorAll('[data-count]');
    if (counters.length && 'IntersectionObserver' in window) {
        var animate = function (el) {
            var target = parseInt(el.getAttribute('data-count'), 10) || 0;
            var suffix = el.getAttribute('data-suffix') || '';
            var start = null;
            var duration = 1400;
            var step = function (ts) {
                if (!start) start = ts;
                var p = Math.min((ts - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = Math.round(target * eased).toLocaleString('en-US') + suffix;
                if (p < 1) window.requestAnimationFrame(step);
            };
            window.requestAnimationFrame(step);
        };
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { animate(entry.target); io.unobserve(entry.target); }
            });
        }, { threshold: .4 });
        counters.forEach(function (el) { io.observe(el); });
    }

    /* ---------- AJAX forms: contact (page + footer), subscribe, event
       registration. Every one saves to the dashboard and emails both the
       sender and info@tands.or.tz on the server. */
    function errorElFor(field) {
        var id = field.getAttribute('aria-describedby');
        return id ? document.getElementById(id) : null;
    }
    function clearError(field) {
        field.classList.remove('is-invalid');
        field.setAttribute('aria-invalid', 'false');
        var el = errorElFor(field);
        if (el) el.textContent = '';
    }
    function showError(form, name, message) {
        var field = form.querySelector('[name="' + name + '"]');
        if (!field) return null;
        field.classList.add('is-invalid');
        field.setAttribute('aria-invalid', 'true');
        var el = errorElFor(field);
        if (el) el.textContent = message;
        return field;
    }
    function setStatus(el, state, text) {
        if (!el) return;
        el.className = 'form-status' + (state ? ' is-' + state : '');
        el.textContent = text || '';
    }

    document.querySelectorAll('form[data-ajax]').forEach(function (form) {
        var status = form.querySelector('.form-status');
        var button = form.querySelector('[type="submit"]');
        if (button && !button.querySelector('.btn-x__spinner')) {
            var spinner = document.createElement('span');
            spinner.className = 'btn-x__spinner';
            spinner.setAttribute('aria-hidden', 'true');
            button.insertBefore(spinner, button.firstChild);
        }

        form.querySelectorAll('input, select, textarea').forEach(function (field) {
            field.addEventListener('invalid', function (e) {
                if (!errorElFor(field)) return; // fall back to the native bubble
                e.preventDefault();
                showError(form, field.name, field.validationMessage);
            });
            ['input', 'change'].forEach(function (evt) {
                field.addEventListener(evt, function () {
                    if (field.classList.contains('is-invalid')) clearError(field);
                });
            });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            form.querySelectorAll('.is-invalid').forEach(clearError);

            if (!form.checkValidity()) {
                form.reportValidity();
                var firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) firstInvalid.focus();
                setStatus(status, 'error', 'Please fix the highlighted fields.');
                return;
            }

            if (button) { button.classList.add('is-loading'); button.disabled = true; }
            setStatus(status, 'pending', 'Sending…');

            fetch(form.getAttribute('action'), {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: new FormData(form)
            })
                .then(function (response) {
                    return response.json().catch(function () { return {}; }).then(function (data) {
                        return { ok: response.ok, status: response.status, data: data };
                    });
                })
                .then(function (result) {
                    if (result.ok) {
                        setStatus(status, 'success', form.getAttribute('data-success') || 'Thank you — received.');
                        form.reset();
                        return;
                    }
                    if (result.status === 422 && result.data.errors) {
                        var first = null;
                        Object.keys(result.data.errors).forEach(function (name) {
                            var msgs = result.data.errors[name];
                            var f = showError(form, name, Array.isArray(msgs) ? msgs[0] : msgs);
                            if (f && !first) first = f;
                        });
                        if (first) first.focus();
                        setStatus(status, 'error', result.data.message || 'Please fix the highlighted fields.');
                        return;
                    }
                    setStatus(status, 'error', (result.data && result.data.message) || 'Something went wrong. Please try again.');
                })
                .catch(function () {
                    setStatus(status, 'error', 'Network error — please check your connection and try again.');
                })
                .then(function () {
                    if (button) { button.classList.remove('is-loading'); button.disabled = false; }
                });
        });
    });

    /* ---------- Lightbox */
    if (window.jQuery && jQuery.fn.fancybox) {
        jQuery('[data-fancybox]').fancybox({
            buttons: ['slideShow', 'fullScreen', 'thumbs', 'close'],
            thumbs: { autoStart: false },
            hash: false
        });
    }

    /* ---------- Footer year */
    var year = document.getElementById('year');
    if (year) year.textContent = new Date().getFullYear();
})();

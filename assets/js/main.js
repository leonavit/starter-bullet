import '../css/main.css';

function openMobileMenu(overlay, panel, toggle) {
	overlay.classList.add('is-open');
	panel.classList.add('is-open');
	overlay.setAttribute('aria-hidden', 'false');
	toggle.setAttribute('aria-expanded', 'true');
	document.body.classList.add('mobile-menu-open');
}

function closeMobileMenu(overlay, panel, toggle) {
	overlay.classList.remove('is-open');
	panel.classList.remove('is-open');
	overlay.setAttribute('aria-hidden', 'true');
	toggle.setAttribute('aria-expanded', 'false');
	document.body.classList.remove('mobile-menu-open');
}

function initMobileMenu() {
	const toggle = document.getElementById('mobile-menu-toggle');
	const closeBtn = document.getElementById('mobile-menu-close');
	const overlay = document.getElementById('mobile-menu-overlay');
	const panel = document.getElementById('mobile-menu-panel');

	if (!toggle || !overlay || !panel) return;

	toggle.addEventListener('click', () => openMobileMenu(overlay, panel, toggle));

	if (closeBtn) {
		closeBtn.addEventListener('click', () => closeMobileMenu(overlay, panel, toggle));
	}

	overlay.addEventListener('click', (e) => {
		if (e.target === overlay) {
			closeMobileMenu(overlay, panel, toggle);
		}
	});

	document.addEventListener('keydown', (e) => {
		if (e.key === 'Escape' && overlay.classList.contains('is-open')) {
			closeMobileMenu(overlay, panel, toggle);
		}
	});
}

function initSkeletons() {
	document.querySelectorAll('[data-skeleton]').forEach((section) => {
		section.classList.add('is-loading');
		const children = [...section.children];

		children.forEach((child, index) => {
			child.style.setProperty('--sb-reveal-delay', `${index * 70}ms`);
		});

		const reveal = () => {
			section.classList.add('is-revealing');

			window.setTimeout(() => {
				section.classList.remove('is-loading', 'is-revealing');
				children.forEach((child) => child.style.removeProperty('--sb-reveal-delay'));
			}, 550);
		};

		if (document.readyState === 'complete') {
			window.requestAnimationFrame(() => window.requestAnimationFrame(reveal));
		} else {
			window.addEventListener('load', reveal, { once: true });
		}
	});
}

function initLazyImages() {
	document.querySelectorAll('.sb-lazy-img').forEach((img) => {
		const markLoaded = () => img.classList.add('is-loaded');
		if (img.complete) markLoaded();
		else img.addEventListener('load', markLoaded, { once: true });
	});
}

function initFaqAccordion() {
	document.querySelectorAll('[data-faq-accordion], #faq-accordion').forEach((root) => {
		const items = [...root.querySelectorAll('.faq-item')];
		if (!items.length) return;

		items.forEach((item) => {
			const trigger = item.querySelector('.faq-trigger');
			if (!trigger) return;

			trigger.addEventListener('click', () => {
				if (item.classList.contains('is-open')) return;

				items.forEach((other) => {
					other.classList.remove('is-open');
					other.querySelector('.faq-trigger')?.setAttribute('aria-expanded', 'false');
				});

				item.classList.add('is-open');
				trigger.setAttribute('aria-expanded', 'true');
			});
		});
	});
}

function initTransparentHeader() {
	const header = document.getElementById('site-header');
	if (!header?.classList.contains('site-header--transparent')) return;

	const syncHeaderHeight = () => {
		document.documentElement.style.setProperty('--sb-header-height', `${header.offsetHeight}px`);
	};

	const onScroll = () => {
		header.classList.toggle('is-scrolled', window.scrollY > 32);
	};

	syncHeaderHeight();
	onScroll();
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', syncHeaderHeight, { passive: true });
}

function initMobileSubmenus() {
	const mobileNav = document.querySelector('.mobile-nav-links');
	if (!mobileNav) return;

	mobileNav.querySelectorAll('.menu-item-has-children').forEach((item) => {
		const link = item.querySelector(':scope > a');
		if (!link || item.querySelector(':scope > .sb-sub-toggle')) return;

		// Parent link navigates to its page; a separate button toggles the submenu.
		const toggle = document.createElement('button');
		toggle.type = 'button';
		toggle.className = 'sb-sub-toggle';
		toggle.setAttribute('aria-expanded', 'false');
		toggle.setAttribute('aria-label', 'פתח תת-תפריט');
		toggle.innerHTML =
			'<svg class="sb-sub-toggle__icon" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		link.after(toggle);

		toggle.addEventListener('click', (event) => {
			event.preventDefault();
			event.stopPropagation();

			const isOpen = item.classList.contains('is-sub-open');
			mobileNav.querySelectorAll('.menu-item-has-children.is-sub-open').forEach((other) => {
				if (other === item) return;
				other.classList.remove('is-sub-open');
				other.querySelector(':scope > .sb-sub-toggle')?.setAttribute('aria-expanded', 'false');
			});

			item.classList.toggle('is-sub-open', !isOpen);
			toggle.setAttribute('aria-expanded', String(!isOpen));
		});
	});
}

function initCf7FormErrors() {
	document.querySelectorAll('.wpcf7').forEach((formRoot) => {
		const form = formRoot.querySelector('form');
		if (!form) return;

		const syncErrors = () => {
			formRoot.querySelectorAll('.wpcf7-not-valid-tip').forEach((tip) => {
				const wrap = tip.closest('.wpcf7-form-control-wrap');
				if (wrap && tip.parentElement !== wrap) {
					wrap.appendChild(tip);
				}
			});
		};

		['wpcf7invalid', 'wpcf7submit', 'wpcf7mailsent', 'wpcf7mailfailed'].forEach((eventName) => {
			form.addEventListener(eventName, syncErrors);
		});
	});
}

function initStatsCounter() {
	const numbers = document.querySelectorAll('.sb-stat-number');
	if (!numbers.length || !('IntersectionObserver' in window)) return;

	const animate = (el) => {
		const original = el.textContent.trim();
		// Split into prefix / numeric part / suffix, e.g. "25K+" -> "", "25", "K+".
		const match = original.match(/^([^\d]*)(\d+(?:[.,]\d+)?)(.*)$/);
		if (!match) return;

		const prefix = match[1];
		const raw = match[2];
		const suffix = match[3];
		const target = parseFloat(raw.replace(',', '.'));
		if (!isFinite(target) || target <= 0) return;

		const decimals = (raw.split(/[.,]/)[1] || '').length;
		const start = target * 2;
		const duration = 2000;
		let startTime = null;

		const step = (now) => {
			if (startTime === null) startTime = now;
			const progress = Math.min((now - startTime) / duration, 1);
			const eased = 1 - Math.pow(1 - progress, 3);
			const value = start - (start - target) * eased;

			el.textContent = prefix + value.toFixed(decimals) + suffix;

			if (progress < 1) {
				window.requestAnimationFrame(step);
			} else {
				el.textContent = original;
			}
		};

		window.requestAnimationFrame(step);
	};

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					animate(entry.target);
					observer.unobserve(entry.target);
				}
			});
		},
		{ threshold: 0.4 }
	);

	numbers.forEach((el) => observer.observe(el));
}

document.addEventListener('DOMContentLoaded', () => {
	initMobileMenu();
	initSkeletons();
	initLazyImages();
	initFaqAccordion();
	initTransparentHeader();
	initMobileSubmenus();
	initCf7FormErrors();
	initStatsCounter();
});

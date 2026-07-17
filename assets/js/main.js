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
	const root = document.getElementById('faq-accordion');
	if (!root) return;

	const items = [...root.querySelectorAll('.faq-item')];

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

	mobileNav.querySelectorAll('.menu-item-has-children > a').forEach((link) => {
		link.addEventListener('click', (event) => {
			if (window.matchMedia('(min-width: 1024px)').matches) return;

			const parentItem = link.parentElement;
			if (!parentItem?.classList.contains('menu-item-has-children')) return;

			event.preventDefault();

			const isOpen = parentItem.classList.contains('is-sub-open');
			mobileNav.querySelectorAll('.menu-item-has-children.is-sub-open').forEach((item) => {
				item.classList.remove('is-sub-open');
			});

			if (!isOpen) {
				parentItem.classList.add('is-sub-open');
			}
		});
	});
}

function initCf7FormErrors() {
	document.querySelectorAll('.wpcf7').forEach((formRoot) => {
		const form = formRoot.querySelector('form');
		if (!form) return;

		const syncErrors = () => {
			const outputs = [...formRoot.querySelectorAll('.wpcf7-response-output')].filter(
				(el) => !el.hasAttribute('aria-hidden')
			);

			outputs.forEach((output, index) => {
				output.hidden = index > 0;
			});

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

document.addEventListener('DOMContentLoaded', () => {
	initMobileMenu();
	initSkeletons();
	initLazyImages();
	initFaqAccordion();
	initTransparentHeader();
	initMobileSubmenus();
	initCf7FormErrors();
});

<?php if (! defined('ABSPATH')) {
  exit;
} ?>

<!-- ================= Footer ================= -->
<footer class="bg-[#121212] text-white/90 pt-16">
  <div class="container mx-auto max-w-7xl">
    <!-- Top: Contact block -->
    <div class="grid md:grid-cols-2 gap-8 items-start">
      <div>
        <p class="text-xs tracking-widest text-white/60 mb-3">
          ارتباط با ما
        </p>
        <div
          class="space-y-2 text-2xl sm:text-3xl font-semibold leading-relaxed">
          <p>021-0000-0000</p>
          <p>تهران، خیابان مثال، پلاک ۷۸۹، طبقه ۵</p>
          <p class="text-white/80">enquiries@spandrah.com</p>
        </div>
      </div>
      <div class="hidden md:block">
        <!-- Optional dotted world map -->
        <div
          class="aspect-[3/1] rounded-xl border border-white/10 bg-gradient-to-b from-white/5 to-transparent grid place-items-center text-white/40 text-sm">
          <span>شبکه‌ی فعال در مسیرهای بین‌المللی</span>
        </div>
      </div>
    </div>

    <hr class="my-10 border-white/10" />

    <!-- Middle: About + Links + Contact -->
    <div class="grid gap-10 md:grid-cols-4">
      <div class="md:col-span-1">
        <p class="text-sm leading-7 text-white/80">
          ارائه‌دهنده‌ی راهکارهای مطمئن و کارآمد در حمل‌ونقل بین‌المللی. از
          فورواردری تا ردیابی لحظه‌ای، کسب‌وکار شما را روان نگه می‌داریم.
        </p>
        <div class="flex gap-3 mt-5">
          <a
            class="w-9 h-9 grid place-items-center rounded-lg bg-white/10 hover:bg-white/15 transition"
            href="#"
            aria-label="LinkedIn">in</a>
          <a
            class="w-9 h-9 grid place-items-center rounded-lg bg-white/10 hover:bg-white/15 transition"
            href="#"
            aria-label="X">X</a>
          <a
            class="w-9 h-9 grid place-items-center rounded-lg bg-white/10 hover:bg-white/15 transition"
            href="#"
            aria-label="Facebook">f</a>
          <a
            class="w-9 h-9 grid place-items-center rounded-lg bg-white/10 hover:bg-white/15 transition"
            href="#"
            aria-label="Instagram">◦</a>
          <a
            class="w-9 h-9 grid place-items-center rounded-lg bg-white/10 hover:bg-white/15 transition"
            href="#"
            aria-label="YouTube">▶</a>
        </div>
      </div>

      <div>
        <p class="font-semibold mb-3">خدمات</p>
        <ul class="space-y-2 text-sm text-white/80">
          <li><a href="#" class="hover:text-white">فریت فورواردینگ</a></li>
          <li>
            <a href="#" class="hover:text-white">انبارداری و توزیع</a>
          </li>
          <li><a href="#" class="hover:text-white">ترخیص کالا</a></li>
          <li><a href="#" class="hover:text-white">ردیابی لحظه‌ای</a></li>
          <li>
            <a href="#" class="hover:text-white">مدیریت زنجیره تامین</a>
          </li>
          <li><a href="#" class="hover:text-white">حمل چندوجهی</a></li>
        </ul>
      </div>

      <div>
        <p class="font-semibold mb-3">شرکت</p>
        <ul class="space-y-2 text-sm text-white/80">
          <li><a href="#about" class="hover:text-white">درباره ما</a></li>
          <li><a href="#team" class="hover:text-white">تیم</a></li>
          <li><a href="#services" class="hover:text-white">خدمات</a></li>
          <li>
            <a href="#cases" class="hover:text-white">مطالعات موردی</a>
          </li>
          <li>
            <a href="#quote" class="hover:text-white">استعلام قیمت</a>
          </li>
          <li><a href="#blog" class="hover:text-white">بلاگ</a></li>
        </ul>
      </div>

      <div>
        <p class="font-semibold mb-3">تماس</p>
        <ul class="space-y-2 text-sm text-white/80">
          <li>تهران، خیابان مثال، پلاک ۷۸۹، طبقه ۵</li>
          <li>کد پستی ۱۰۰۱۸</li>
          <li>021-0000-0000</li>
          <li>enquiries@spandrah.com</li>
        </ul>
      </div>
    </div>

    <hr class="my-10 border-white/10" />

    <!-- Bottom bar -->
    <div
      class="flex flex-col md:flex-row items-center justify-between gap-4 py-6 text-xs text-white/60">
      <p>© 2025 Spand Rah Agrin. کلیه حقوق محفوظ است.</p>
      <div class="flex items-center gap-6">
        <a href="#" class="hover:text-white/80">حریم خصوصی</a>
        <a href="#" class="hover:text-white/80">شرایط استفاده</a>
        <a href="#" class="hover:text-white/80">تنظیمات کوکی</a>
      </div>
    </div>
  </div>
</footer>

<!-- =============== Scripts =============== -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollToPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/lenis@1.3.13/dist/lenis.min.js"></script>
<script>
  // Initialize Lenis
  const lenis = new Lenis({
    autoRaf: true,
  });

  // Listen for the scroll event and log the event data
  lenis.on("scroll", (e) => {
    console.log(e);
  });

  // Home Scroll
  // فرض: gsap از قبل لود شده
  gsap.registerPlugin(ScrollToPlugin);

  const headerOffset = 72; // اگر هدر ثابت داری، فاصله‌ی دلخواه از بالا
  const targetSelector = "#services"; // سکشنی که می‌خوای بهش اسکرول بشه

  const btn = document.getElementById("scrollDownBtn");
  if (btn) {
    const goDown = (e) => {
      e.preventDefault();
      gsap.to(window, {
        duration: 1,
        ease: "power2.out",
        scrollTo: {
          y: targetSelector,
          offsetY: headerOffset,
          autoKill: true,
        },
      });
    };

    btn.addEventListener("click", goDown);
    // دسترسی بهتر: با Enter/Space هم اسکرول کن
    btn.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") goDown(e);
    });
  }

  // Navbar entrance
  gsap.from(".topnav", {
    y: -24,
    opacity: 0,
    duration: 0.6,
    ease: "power3.out",
    delay: 0.2,
  });

  // فرض: gsap و Swiper قبلاً لود شده‌اند
  const progressCircle = document.querySelector(".autoplay-progress svg");
  const progressContent = document.querySelector(".autoplay-progress span");

  const swiper = new Swiper(".slider", {
    slidesPerView: 1,
    effect: "fade",
    speed: 900,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    rewind: true,
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: ".hero-next",
      prevEl: ".hero-prev",
    },
    on: {
      init(s) {
        // همه‌ی متن‌ها پنهان، متن اسلاید فعال نمایان
        const slides = s.slides;
        slides.forEach((sl) =>
          gsap.set(sl.querySelector(".slide-content"), {
            autoAlpha: 0,
            y: 15,
          })
        );
        gsap.set(slides[s.activeIndex].querySelector(".slide-content"), {
          autoAlpha: 1,
          y: 0,
        });

        // زوم اولیه‌ی مدیای اسلاید فعال
        const activeMedia =
          slides[s.activeIndex].querySelector(".hero-slide > *");
        gsap.set(activeMedia, {
          scale: 1
        });
        gsap.to(activeMedia, {
          scale: 1.06,
          duration: 4,
          ease: "power1.out",
        });
      },
      slideChangeTransitionStart(s) {
        const prev = s.slides[s.previousIndex];
        const next = s.slides[s.activeIndex];

        // متن قبلی مخفی
        if (prev) {
          gsap.to(prev.querySelector(".slide-content"), {
            autoAlpha: 0,
            y: 15,
            duration: 0.4,
            ease: "power2.out",
          });
          gsap.to(prev.querySelector(".hero-slide > *"), {
            scale: 1,
            duration: 0.8,
            ease: "power2.out",
          });
        }

        // متن بعدی با fade + slide-up
        gsap.fromTo(
          next.querySelector(".slide-content"), {
            autoAlpha: 0,
            y: 15
          }, {
            autoAlpha: 1,
            y: 0,
            duration: 0.7,
            ease: "power3.out",
            delay: 0.1,
          }
        );

        // زوم خیلی نرم روی تصویر/ویدئوی اسلاید فعال
        const media = next.querySelector(".hero-slide > *");
        gsap.fromTo(
          media, {
            scale: 1
          }, {
            scale: 1.02,
            duration: 4,
            ease: "power1.out"
          }
        );
      },
      autoplayTimeLeft(s, time, progress) {
        progressCircle.style.setProperty("--progress", 1 - progress);
        progressContent.textContent = `${Math.ceil(time / 1000)}s`;
      },
    },
  });
</script>

<script>
  const projSwiper = new Swiper(".projects-swiper", {
    speed: 700,
    spaceBetween: 24,
    slidesPerView: 1.1, // موبایل
    centeredSlides: false,
    navigation: {
      nextEl: ".proj-next",
      prevEl: ".proj-prev"
    },
    breakpoints: {
      640: {
        slidesPerView: 1.6,
        spaceBetween: 20
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 22
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 24
      }, // دسکتاپ: ۳ آیتم
    },
  });
</script>

<script>
  const servicesSwiper = new Swiper(".services-swiper", {
    loop: true,
    speed: 700,
    spaceBetween: 24,
    slidesPerView: 1.05, // موبایل: نزدیک به تمام عرض
    centeredSlides: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".service-next",
      prevEl: ".service-prev"
    },
    // اگر AutoPlay خواستی: autoplay: { delay: 4500, disableOnInteraction: false },
    breakpoints: {
      640: {
        slidesPerView: 1.5,
        spaceBetween: 24
      }, // موبایل بزرگ
      768: {
        slidesPerView: 2.5,
        spaceBetween: 28
      }, // تبلت
      1024: {
        slidesPerView: 3.5,
        spaceBetween: 32
      }, // دسکتاپ: حداقل ۳ کارت
      1440: {
        slidesPerView: 4.5,
        spaceBetween: 36
      }, // نمایش وسیع‌تر
    },
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const mobileBtn = document.querySelector(".mobile-menu-btn");
  const mobileNav = document.getElementById("mobileNav");
  const overlay   = mobileNav?.querySelector(".overlay");
  const panel     = document.getElementById("mobileNavPanel");
  const closeBtn  = document.querySelector(".close-mobile");
  const topnav    = document.querySelector(".topnav");

  // ---- GSAP guard
  const hasGSAP = typeof window.gsap !== 'undefined';
  if (hasGSAP) {
    gsap.set(panel, { x: "100%" });
    gsap.set(overlay, { opacity: 0, pointerEvents: "none" });
  } else {
    if (panel)   panel.style.transform = "translateX(100%)";
    if (overlay) { overlay.style.opacity = "0"; overlay.style.pointerEvents = "none"; }
  }

  function openMobile() {
    mobileNav.classList.remove("hidden");
    panel?.setAttribute("aria-hidden","false");
    mobileBtn?.setAttribute("aria-expanded","true");
    document.body.style.overflow = "hidden";
    if (hasGSAP) {
      const tl = gsap.timeline();
      tl.to(overlay, { duration:.28, opacity:.6, pointerEvents:"auto", ease:"power2.out" }, 0)
        .to(panel,   { duration:.38, x:"0%", ease:"power3.out" }, 0);
    } else {
      overlay.style.opacity = ".6";
      overlay.style.pointerEvents = "auto";
      panel.style.transform = "translateX(0%)";
    }
  }
  function closeMobile() {
    if (hasGSAP) {
      const tl = gsap.timeline({
        onComplete(){ mobileNav.classList.add("hidden"); panel?.setAttribute("aria-hidden","true"); }
      });
      tl.to(panel,   { duration:.28, x:"100%", ease:"power2.in" }, 0)
        .to(overlay, { duration:.28, opacity:0, pointerEvents:"none", ease:"power2.in" }, 0);
    } else {
      panel.style.transform = "translateX(100%)";
      overlay.style.opacity = "0";
      overlay.style.pointerEvents = "none";
      mobileNav.classList.add("hidden");
      panel?.setAttribute("aria-hidden","true");
    }
    mobileBtn?.setAttribute("aria-expanded","false");
    document.body.style.overflow = "";
  }
  mobileBtn?.addEventListener("click", openMobile);
  closeBtn?.addEventListener("click", closeMobile);
  overlay?.addEventListener("click", closeMobile);

  // Header scroll
  const onScroll = () => {
    if (window.scrollY > 20) topnav?.classList.add("scrolled");
    else topnav?.classList.remove("scrolled");
  };
  onScroll();
  window.addEventListener("scroll", onScroll);

  // =========== MOBILE: toggles ===========
  const mobileMenu = document.getElementById('mobile-primary');
  if (mobileMenu) {
    mobileMenu.querySelectorAll('li.menu-item-has-children').forEach((li) => {
      const a   = li.querySelector(':scope > a');
      const sub = li.querySelector(':scope > .sub-menu');
      if (!sub) return;

      sub.setAttribute('data-open', 'false');

      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'parent-toggle flex items-center justify-between w-full px-3 py-2 rounded-lg text-left text-slate-800 bg-slate-100';
      btn.setAttribute('aria-expanded', 'false');

      const id = li.id ? `sub-${li.id}` : `sub-${Math.random().toString(36).slice(2)}`;
      sub.id = sub.id || id;
      btn.setAttribute('aria-controls', sub.id);

      btn.innerHTML = `
        <span class="text-right flex-1">${a ? a.textContent : '—'}</span>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
      `;

      if (a) a.style.display = 'none';
      li.insertBefore(btn, sub);

      btn.addEventListener('click', () => {
        const isOpen = sub.getAttribute('data-open') === 'true';
        // close others
        mobileMenu.querySelectorAll('.sub-menu[data-open="true"]').forEach((other) => {
          if (other !== sub) {
            other.setAttribute('data-open', 'false');
            const otherBtn = other.previousElementSibling;
            if (otherBtn && otherBtn.matches('.parent-toggle')) {
              otherBtn.setAttribute('aria-expanded', 'false');
            }
          }
        });
        sub.setAttribute('data-open', String(!isOpen));
        btn.setAttribute('aria-expanded', String(!isOpen));
        // نمایش/مخفی ساده
        sub.style.display = isOpen ? 'none' : 'block';
      });
    });
  }

  // =========== DESKTOP: submenu prepare (two-columns + caret) ===========
  const desktopMenu = document.querySelector('.menu-desktop');
  if (desktopMenu) {
    // 1) والد‌ها relative
    desktopMenu.querySelectorAll('li.menu-item-has-children').forEach(li=>{
      li.classList.add('relative');
    });

    // 2) دو ستونه در صورت >6 آیتم + استایل لینک‌های داخلی
    desktopMenu.querySelectorAll('li.menu-item-has-children > .sub-menu').forEach((dd)=>{
      const items = dd.querySelectorAll(':scope > li');
      if (items.length > 6) dd.classList.add('two-cols'); else dd.classList.remove('two-cols');

      dd.querySelectorAll(':scope > li > a').forEach(a=>{
        a.classList.add('block','px-3','py-2','rounded-lg','hover:bg-slate-50','text-sm','text-slate-700');
      });
    });

    // 3) افزودن فلش به والد‌هایی که ندارند
    desktopMenu.querySelectorAll('li.menu-item-has-children > a').forEach((a)=>{
      if (!a.querySelector('.caret')) {
        const svg = document.createElementNS("http://www.w3.org/2000/svg","svg");
        svg.setAttribute("viewBox","0 0 24 24");
        svg.setAttribute("width","14");
        svg.setAttribute("height","14");
        svg.classList.add("caret");
        svg.innerHTML = '<path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
        a.appendChild(svg);
        a.classList.add('inline-flex','items-center','gap-1');
      }
    });

    // =========== DESKTOP: open/close ===========
    desktopMenu.querySelectorAll("li.menu-item-has-children").forEach((li) => {
      const trigger = li.querySelector(':scope > a');
      const dd = li.querySelector(':scope > .sub-menu');
      if (!trigger || !dd) return;

      trigger.setAttribute('aria-haspopup', 'true');
      trigger.setAttribute('aria-expanded', 'false');

      function closeAll() {
        desktopMenu.querySelectorAll(".sub-menu.open").forEach((other) => {
          if (other !== dd) {
            other.classList.remove('open');
            const ob = other.previousElementSibling;
            if (ob && ob.tagName === 'A') ob.setAttribute('aria-expanded', 'false');
          }
        });
      }

      trigger.addEventListener('click', (e) => {
        e.preventDefault(); // اگر می‌خوای لینک باشد، فلش جدا بساز
        const opening = !dd.classList.contains('open');
        closeAll();
        dd.classList.toggle('open', opening);       // این خط نمایش را کنترل می‌کند
        trigger.setAttribute('aria-expanded', String(opening));
      });

      trigger.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          trigger.click();
        }
        if (e.key === 'Escape') {
          dd.classList.remove('open');
          trigger.setAttribute('aria-expanded', 'false');
          trigger.focus();
        }
      });
    });

    // کلیک بیرون: بستن
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.menu-desktop li.menu-item-has-children')) {
        desktopMenu.querySelectorAll(".sub-menu.open").forEach((dd) => {
          dd.classList.remove('open');
          const t = dd.previousElementSibling;
          if (t && t.tagName === 'A') t.setAttribute('aria-expanded', 'false');
        });
      }
    });
    // ESC: بستن
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        desktopMenu.querySelectorAll(".sub-menu.open").forEach((dd) => {
          dd.classList.remove('open');
          const t = dd.previousElementSibling;
          if (t && t.tagName === 'A') t.setAttribute('aria-expanded', 'false');
        });
      }
    });

    // در صورت تغییر اندازه: دوباره چکِ ستون‌ها
    window.addEventListener('resize', ()=>{
      desktopMenu.querySelectorAll('li.menu-item-has-children > .sub-menu').forEach((dd)=>{
        const items = dd.querySelectorAll(':scope > li');
        if (items.length > 6) dd.classList.add('two-cols'); else dd.classList.remove('two-cols');
      });
    });
  }
});
</script>

</body>

</html>
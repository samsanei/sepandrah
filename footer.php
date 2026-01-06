<?php if (! defined('ABSPATH')) {
  exit;
} ?>

<!-- ================= Footer ================= -->

<footer class="bg-[#0B1221] text-white overflow-hidden border-t border-white/5 relative">
  
  <!-- ========================================== -->
  <!-- بخش ۱: CTA (بنر تصویری بالا) -->
  <!-- نکته: اگر طبق تصویر فقط بخش تیره را می‌خواهید، می‌توانید این div را حذف کنید -->
  <!-- ========================================== -->
  <div class="relative w-full h-[400px] md:h-[500px] overflow-hidden group">
    <!-- تصویر پس‌زمینه با افکت پارالاکس ملایم -->
    <div class="absolute inset-0 bg-[url('https://sepandrah.bamdad.studio/wp-content/themes/sepandrah/assets/images/bg_footer_4.jpg')] bg-cover bg-center md:bg-fixed scale-100 group-hover:scale-105 transition-transform duration-700 ease-out"></div>
    <!-- Overlay گرادینت برای اتصال نرم به فوتر تیره -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#0B1221] via-[#0B1221]/80 to-transparent"></div>

    <div class="relative z-10 h-full container mx-auto px-6 flex flex-col items-center justify-center text-center">
      <h3 class="text-white font-extrabold text-2xl md:text-4xl leading-tight mb-4 drop-shadow-lg">
        سپند راه آگرین؛ همراه مطمئن شما در تجارت بین‌الملل
      </h3>
      <p class="text-slate-300 text-sm md:text-md max-w-2xl mb-8 leading-relaxed">
        از تأمین تا حمل و ترخیص—تحویل به‌موقع، شفافیت کامل و کاهش ریسک در زنجیره تأمین شما.
      </p>
      
      <a href="https://www.sepandrah.com/%d8%aa%d9%85%d8%a7%d8%b3/" class="group inline-flex items-center gap-3 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white pl-2 pr-5 py-2 text-sm font-semibold transition-all duration-300 hover:bg-white hover:text-[#0B1221] hover:scale-105 shadow-[0_0_20px_rgba(255,255,255,0.1)]">
        <span>درخواست مشاوره رایگان</span>
        <span class="w-8 h-8 rounded-full bg-[#0B1221] text-white flex items-center justify-center transition-transform duration-300 group-hover:-rotate-45">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 19.5-15-15m0 0v11.25m0-11.25h11.25" />
          </svg>
        </span>
      </a>
    </div>
  </div>

  <!-- ========================================== -->
  <!-- بخش ۲: بدنه اصلی فوتر (مشابه تصویر ارسالی) -->
  <!-- ========================================== -->
  <div class="container mx-auto max-w-7xl px-6 pt-16 pb-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8">

      <!-- ستون ۱: برند و توضیحات (سمت راست در RTL) -->
      <!-- در دسکتاپ ۵ ستون از ۱۲ ستون را می‌گیرد -->
      <div class="lg:col-span-5 flex flex-col items-center lg:items-start text-center lg:text-right space-y-6">
        
        <!-- لوگو و تیتر -->
        <div class="flex flex-col lg:flex-row items-center gap-4">
          <!-- لوگو -->
          <div class="shrink-0">
             <img class="w-20 h-20 brightness-200 contrast-125 drop-shadow-[0_0_15px_rgba(255,255,255,0.3)]" src="https://sepandrah.bamdad.studio/wp-content/themes/sepandrah/assets/images/logo_sepand_rah_white.svg" alt="سپند راه آگرین">
          </div>
          <!-- متن کنار لوگو -->
          <div class="flex flex-col gap-1">
            <h2 class="text-xl font-bold tracking-tight text-white">
              حمل و نقل بین المللی سپند راه آگرین
            </h2>
            <span class="text-[10px] tracking-[0.1em] text-slate-400 uppercase font-sans">
              SEPAND RAH AGRIN INT TRANSPORT CO
            </span>
          </div>
        </div>

        <!-- توضیحات -->
        <p class="text-slate-400 text-sm leading-7 text-justify lg:text-right max-w-md">
          سپند راه آگرین؛ ارائه‌دهنده حمل‌ونقل بین‌المللی با بیش از ۲۳۰ کامیون چادری، نرخ‌های رقابتی کرکری و فورواردری، پوشش بیمه CMR و FBL، مطابق استانداردهای اروپا.
        </p>
      </div>

      <!-- ستون ۲: اطلاعات تماس (وسط) -->
      <!-- در دسکتاپ ۴ ستون را می‌گیرد -->
      <div class="lg:col-span-4 flex flex-col items-center lg:items-end lg:pr-8 space-y-6">
        
        <!-- آدرس -->
        <div class="flex items-start justify-center lg:justify-end gap-3 w-full text-center lg:text-right group">
          <div class="mt-1 text-slate-500 group-hover:text-blue-400 transition-colors">
            <!-- Icon: Map Pin -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
          </div>
          <p class="text-slate-300 text-sm leading-6 flex-1 order-2 lg:order-1">
           تهران، محله عباس آباد،اندیشه، خ قائم مقام فراهانی، خ شهید علی میرزا حسنی،پاسارگاد، پ 15، طبقه 6، واحد ۱۱
          </p>
          
        </div>

        <!-- تلفن‌ها و ایمیل -->
        <div class="flex flex-col gap-3 w-full items-center lg:items-start">
          
          <!-- شماره ۱ -->
          <a href="tel:+989122895673" class="flex items-center gap-3 text-slate-300 hover:text-white transition-colors group">
            
            <span class="text-slate-500 group-hover:text-blue-400 transition-colors ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
            </span>
            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۰۹۱۲۲۸۹۵۶۷۳</span>
          </a>
          <a href="tel:+982188703035" class="flex items-center gap-3 text-slate-300 hover:text-white transition-colors group">
            
            <span class="text-slate-500 group-hover:text-blue-400 transition-colors ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
            </span>
            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۸۸۷۰۳۰۳۵</span>
          </a>
          <a href="tel:+982188703036" class="flex items-center gap-3 text-slate-300 hover:text-white transition-colors group">
            
            <span class="text-slate-500 group-hover:text-blue-400 transition-colors ">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
              </svg>
            </span>
            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۸۸۷۰۳۰۳۶</span>
          </a>



          <!-- ایمیل -->
          <a href="mailto:info@sepandrah.com" class="flex items-center gap-3 text-slate-300 hover:text-white transition-colors group">
            
            <span class="text-slate-500 group-hover:text-blue-400 transition-colors ">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
              </svg>
            </span>
            <span class="text-sm font-sans tracking-wide order-2 lg:order-1">info@sepandrah.com</span>
          </a>

        </div>
      </div>

      <!-- ستون ۳: دسترسی سریع و سوشال (سمت چپ در RTL) -->
      <!-- در دسکتاپ ۳ ستون را می‌گیرد -->
      <div class="lg:col-span-3 flex flex-col items-center lg:items-end space-y-6">
        
        <!-- منوی دسترسی سریع -->
        <div class="text-center lg:text-right w-full">
           <h4 class="text-white font-bold mb-4 flex items-center justify-center lg:justify-start gap-2">
             <span>دسترسی سریع :</span>
           </h4>
           <ul class="flex flex-col gap-2 text-sm text-slate-400">
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">صفحه نخست</a></li>
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">خدمات</a></li>
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">پروژه ها</a></li>
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">دانشنامه</a></li>
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">درباره ما</a></li>
             <li><a href="#" class="hover:text-white hover:translate-x-1 transition-all inline-block">تماس با ما</a></li>
           </ul>
        </div>

        <!-- سوشال مدیا -->
        <div class="text-center lg:text-right w-full pt-4">
           <h4 class="text-white text-xs mb-4">
           در شبکه های اجتماعی دنبال کنید :
           </h4>
           <div class="flex items-center justify-center lg:justify-start gap-4">

             <!-- WhatsApp -->
             <a href="https://wa.me/+989122895673" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-white hover:bg-white hover:text-green-600 hover:-translate-y-1 transition-all duration-300">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21l1.65-3.8a9 9 0 1 1 3.4 2.9L3 21"/><path d="M9 10a.5.5 0 0 0 1 0V9a.5.5 0 0 0-1 0v1a5 5 0 0 0 5 5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0 0 1"/></svg>
             </a>

             <!-- Instagram -->
             <a href="https://www.instagram.com/sepand_rah_agrin/" target="_blank" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center text-white hover:bg-white hover:text-pink-600 hover:-translate-y-1 transition-all duration-300">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
             </a>

           </div>
        </div>

      </div>

    </div>
  </div>

  <!-- ========================================== -->
  <!-- بخش ۳: کپی‌رایت (پایین‌ترین بخش) -->
  <!-- ========================================== -->
  <div class="border-t border-white/10 bg-[#060a13]">
    <div class="container mx-auto max-w-7xl px-6 py-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-slate-500">
      <div class="text-center md:text-right">
        <p>تمام حقوق این وب‌سایت برای <a href="https://www.sepandrah.com/">شرکت سپند راه آگرین</a> است. برای استفاده از مطالب، داشتن «هدف غیرتجاری» و ذکر «منبع» کافیست.</p>
      </div>
      <div class="">
        <a href="https://www.sepandrah.com/" target="_blank" class="hover:text-white transition-colors tracking-widest font-sans uppercase">
         Sepand Rah Agrin
        </a>
      </div>

      

    </div>
  </div>

</footer>


<!-- دکمه بازگشت به بالا -->
<div id="scrollTopBtn"
  class="fixed bottom-6 right-6 z-50 opacity-0 pointer-events-none group cursor-pointer inline-flex items-center gap-3 rounded-full text-slate-900 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-[1px]">
  <span
    class="w-12 h-12 rounded-full bg-slate-900/40 text-white flex items-center justify-center transition-transform duration-300 group-hover:scale-110 group-hover:bg-slate-900">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor" class="size-3">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
    </svg>
  </span>
</div>

<?php wp_footer(  ); ?>
<!-- =============== Scripts =============== -->
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
const serviceSwiper = new Swiper(".services-swiper", {
  speed: 700,
  spaceBetween: 24,
  slidesPerView: 1.1,
  navigation: {
    nextEl: ".serv-next",
    prevEl: ".serv-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1.6,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileBtn = document.querySelector(".mobile-menu-btn");
    const mobileNav = document.getElementById("mobileNav");
    const overlay = mobileNav?.querySelector(".overlay");
    const panel = document.getElementById("mobileNavPanel");
    const closeBtn = document.querySelector(".close-mobile");
    const topnav = document.querySelector(".topnav");

    // ---- GSAP guard
    const hasGSAP = typeof window.gsap !== 'undefined';
    if (hasGSAP) {
      gsap.set(panel, {
        x: "100%"
      });
      gsap.set(overlay, {
        opacity: 0,
        pointerEvents: "none"
      });
    } else {
      if (panel) panel.style.transform = "translateX(100%)";
      if (overlay) {
        overlay.style.opacity = "0";
        overlay.style.pointerEvents = "none";
      }
    }

    function openMobile() {
      mobileNav.classList.remove("hidden");
      panel?.setAttribute("aria-hidden", "false");
      mobileBtn?.setAttribute("aria-expanded", "true");
      document.body.style.overflow = "hidden";
      if (hasGSAP) {
        const tl = gsap.timeline();
        tl.to(overlay, {
            duration: .28,
            opacity: .6,
            pointerEvents: "auto",
            ease: "power2.out"
          }, 0)
          .to(panel, {
            duration: .38,
            x: "0%",
            ease: "power3.out"
          }, 0);
      } else {
        overlay.style.opacity = ".6";
        overlay.style.pointerEvents = "auto";
        panel.style.transform = "translateX(0%)";
      }
    }

    function closeMobile() {
      if (hasGSAP) {
        const tl = gsap.timeline({
          onComplete() {
            mobileNav.classList.add("hidden");
            panel?.setAttribute("aria-hidden", "true");
          }
        });
        tl.to(panel, {
            duration: .28,
            x: "100%",
            ease: "power2.in"
          }, 0)
          .to(overlay, {
            duration: .28,
            opacity: 0,
            pointerEvents: "none",
            ease: "power2.in"
          }, 0);
      } else {
        panel.style.transform = "translateX(100%)";
        overlay.style.opacity = "0";
        overlay.style.pointerEvents = "none";
        mobileNav.classList.add("hidden");
        panel?.setAttribute("aria-hidden", "true");
      }
      mobileBtn?.setAttribute("aria-expanded", "false");
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
        const a = li.querySelector(':scope > a');
        const sub = li.querySelector(':scope > .sub-menu');
        if (!sub) return;

        sub.setAttribute('data-open', 'false');

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'parent-toggle flex items-center justify-between w-full';
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
      desktopMenu.querySelectorAll('li.menu-item-has-children').forEach(li => {
        li.classList.add('relative');
      });

      // 2) دو ستونه در صورت >6 آیتم + استایل لینک‌های داخلی
      desktopMenu.querySelectorAll('li.menu-item-has-children > .sub-menu').forEach((dd) => {
        const items = dd.querySelectorAll(':scope > li');
        if (items.length > 6) dd.classList.add('two-cols');
        else dd.classList.remove('two-cols');

        dd.querySelectorAll(':scope > li > a').forEach(a => {
          a.classList.add('block', 'px-3', 'py-2', 'rounded-lg', 'hover:bg-slate-50', 'text-sm', 'text-slate-700');
        });
      });

      // 3) افزودن فلش به والد‌هایی که ندارند
      desktopMenu.querySelectorAll('li.menu-item-has-children > a').forEach((a) => {
        if (!a.querySelector('.caret')) {
          const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
          svg.setAttribute("viewBox", "0 0 24 24");
          svg.setAttribute("width", "14");
          svg.setAttribute("height", "14");
          svg.classList.add("caret");
          svg.innerHTML = '<path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
          a.appendChild(svg);
          a.classList.add('inline-flex', 'items-center', 'gap-1');
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
          dd.classList.toggle('open', opening); // این خط نمایش را کنترل می‌کند
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
      window.addEventListener('resize', () => {
        desktopMenu.querySelectorAll('li.menu-item-has-children > .sub-menu').forEach((dd) => {
          const items = dd.querySelectorAll(':scope > li');
          if (items.length > 6) dd.classList.add('two-cols');
          else dd.classList.remove('two-cols');
        });
      });
    }
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("scrollTopBtn");
    let isVisible = false;

    window.addEventListener("scroll", () => {
      if (window.scrollY > 200 && !isVisible) {
        isVisible = true;
        gsap.to(btn, {
          duration: 0.6,
          opacity: 1,
          y: 0,
          pointerEvents: "auto",
          ease: "power1.out"
        });
      } else if (window.scrollY <= 200 && isVisible) {
        isVisible = false;
        gsap.to(btn, {
          duration: 0.6,
          opacity: 0,
          y: 50,
          pointerEvents: "none",
          ease: "power1.in"
        });
      }
    });

    btn.addEventListener("click", () => {
      gsap.to(window, {
        duration: 1.2,
        scrollTo: {
          y: 0
        },
        ease: "power2.inOut"
      });
    });
  });
</script>
<script>
  // assets/js/main.js
document.addEventListener("DOMContentLoaded", () => {
  if (window.__sitePreloaderInitialized) return;
  window.__sitePreloaderInitialized = true;

  const preloader = document.getElementById("site-preloader");
  if (!preloader) return;

  if (typeof gsap === "undefined") {
    preloader.style.display = "none";
    return;
  }

  const logo = document.querySelector(".js-preloader-logo");
  const text = document.querySelector(".js-preloader-text");

  document.documentElement.classList.add("is-preloading");

  const tl = gsap.timeline({
    paused: true,
    defaults: { ease: "power2.out" }
  });

  // حالت اولیه (هیچ delay حسی نداریم)
  gsap.set(preloader, { yPercent: 0 });
  gsap.set(logo, { autoAlpha: 1, y: 0 });
  gsap.set(text, { autoAlpha: 1, y: 0 });

  /* -------------------------
     ورود: لوگو → بلافاصله متن
  ------------------------- */

  tl.from(logo, {
    scale: 0.96,
    duration: 0.2
  });

  tl.from(
    text,
    {
      autoAlpha: 0,
      y: 100,
      duration: 0.7
    },
    "-=0.26" // خیلی سریع پشت سر لوگو
  );

  /* -------------------------
     خروج سریع و نرم
  ------------------------- */

  tl.to(
    preloader,
    {
      yPercent: -100,
      duration: 0.6,
      ease: "power3.inOut"
    },
    "-=0.08" // بدون مکث
  );

  tl.add(() => {
    preloader.style.display = "none";
    preloader.style.pointerEvents = "none";
    document.documentElement.classList.remove("is-preloading");
  });

  window.addEventListener("load", () => {
    tl.play();
  });

  window.addEventListener("pageshow", (event) => {
    if (event.persisted) {
      preloader.style.display = "none";
      document.documentElement.classList.remove("is-preloading");
    }
  });
});


</script>

</body>

</html>
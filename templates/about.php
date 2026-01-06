<?php
/**
 * Template Name: About Page TPL
 * Template Post Type: page
 *
 * Description: Home Page template
 * Author: Bamdad Studio
 * Author URI: https://www.bamdad.studio
 */
get_header(); 
?>

<main class="w-full bg-white font-modam overflow-x-hidden">

  <!-- ========================================== -->
  <!-- 1. Hero Section: عنوان و معرفی کوتاه -->
  <!-- ========================================== -->
  <section class="relative w-full h-[50vh] min-h-[500px] flex items-center justify-center overflow-hidden">
    <!-- پس‌زمینه با تصویر ناوگان (باید با عکس باکیفیت جایگزین شود) -->
    <div class="absolute inset-0 bg-slate-900">
      <img src="https://sepandrah.bamdad.studio/wp-content/themes/sepandrah/assets/images/bg_footer_4.jpg" 
           alt="Sepand Rah Fleet" 
           class="w-full h-full object-cover opacity-40 scale-105 animate-[pulse_10s_infinite_alternate]">
    </div>
    <!-- گرادینت روی تصویر -->
    <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-slate-900/80"></div>

    <div class="relative z-10 container mx-auto px-6 text-center pt-20">
      <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-slate-900 mb-6 drop-shadow-sm">
        فراتر از جابجایی بار<br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-slate-800">خلق مسیرهای مطمئن</span>
      </h1>
      <p class="text-white text-md max-w-2xl mx-auto leading-relaxed font-medium">
        ما در سپند راه آگرین، فاصله بین مبدأ و مقصد را با استانداردهای اروپایی، بیمه کامل و ناوگان اختصاصی کوتاه می‌کنیم.
      </p>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 2. The Story: داستان برند و تصویر -->
  <!-- ========================================== -->
  <section class="py-20 md:py-32 relative">
    <div class="container mx-auto px-6">
      <div class="items-center">
        
        <!-- متن داستان -->
        <div class="space-y-8 order-2 lg:order-1">
          <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight">
            پیشرو در حمل‌ونقل بین‌المللی<br>
            <span class="text-blue-700 relative inline-block">
              با هویت ایرانی و کیفیت جهانی
              <!-- خط تزئینی زیر متن -->
              <svg class="absolute w-full h-3 -bottom-1 left-0 text-yellow-400 opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none">
                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="3" fill="none" />
              </svg>
            </span>
          </h2>
          
          <div class="text-slate-600 space-y-4 text-justify leading-8 text-base">
            <p>
              شرکت حمل و نقل بین‌المللی <strong>سپند راه آگرین</strong> با تکیه بر سال‌ها تجربه و در اختیار داشتن بیش از <strong>۲۳۰ دستگاه کامیون چادری ملکی</strong>، یکی از بازیگران اصلی صنعت لجستیک در منطقه است.
            </p>
            <p>
              ما متخصص حمل کالاهای صادراتی و وارداتی به مقاصد اروپا و آسیا هستیم. تعهد ما تنها به رساندن بار خلاصه نمی‌شود؛ ما امنیت سرمایه شما را با پوشش‌های بیمه‌ای کامل (CMR و FBL) و رصد لحظه‌ای تضمین می‌کنیم.
            </p>
          </div>

          <!-- امضا یا ویژگی خاص -->
          <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
            <div class="flex -space-x-3 space-x-reverse">
               <!-- آواتارهای نمایشی تیم -->
               <div class="w-12 h-12 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-xs text-slate-500">CEO</div>
               <div class="w-12 h-12 rounded-full border-2 border-white bg-slate-300"></div>
               <div class="w-12 h-12 rounded-full border-2 border-white bg-blue-600 text-white flex items-center justify-center text-xs font-bold">+50</div>
            </div>
            <div>
              <p class="text-sm font-bold text-slate-900">تیم متخصص لجستیک</p>
              <p class="text-xs text-slate-500">پشتیبانی ۲۴/۷ در تمام مراحل حمل</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 3. Statistics: آمار و ارقام (Design Dark) -->
  <!-- ========================================== -->
  <section class="py-16 bg-[#0B1221] text-white relative overflow-hidden">
    <!-- پترن پس‌زمینه -->
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#3b82f6_1px,transparent_1px)] [background-size:16px_16px]"></div>
    
    <div class="container mx-auto px-6 relative z-10">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10 divide-x-reverse">
        
        <div class="p-4 group">
          <div class="text-4xl md:text-5xl font-black text-blue-500 mb-2 group-hover:scale-110 transition-transform duration-300">
            +230
          </div>
          <p class="text-sm md:text-base text-slate-300 font-medium">کامیون ملکی چادری</p>
        </div>

        <div class="p-4 group">
          <div class="text-4xl md:text-5xl font-black text-blue-500 mb-2 group-hover:scale-110 transition-transform duration-300">
            +20
          </div>
          <p class="text-sm md:text-base text-slate-300 font-medium">سال تجربه درخشان</p>
        </div>

        <div class="p-4 group">
          <div class="text-4xl md:text-5xl font-black text-blue-500 mb-2 group-hover:scale-110 transition-transform duration-300">
            +40
          </div>
          <p class="text-sm md:text-base text-slate-300 font-medium">مقصد اروپایی و آسیایی</p>
        </div>

        <div class="p-4 group">
          <div class="text-4xl md:text-5xl font-black text-blue-500 mb-2 group-hover:scale-110 transition-transform duration-300">
            CMR
          </div>
          <p class="text-sm md:text-base text-slate-300 font-medium">پوشش کامل بیمه</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 4. Why Us: ارزش‌های پیشنهادی -->
  <!-- ========================================== -->
  <section class="py-24 bg-slate-50">
    <div class="container mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <h2 class="text-3xl font-bold text-slate-900 mb-4">چرا سپند راه آگرین؟</h2>
        <p class="text-slate-500">تعهد ما به کیفیت، سرعت و شفافیت، ما را به انتخاب اول تجار و بازرگانان تبدیل کرده است.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Card 1 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100">
          <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-slate-800 mb-3">سرعت و دقت در زمان‌بندی</h3>
          <p class="text-slate-500 text-sm leading-6">
            زمان سرمایه شماست. ما با برنامه‌ریزی دقیق و رانندگان مجرب، محموله شما را در کوتاه‌ترین زمان ممکن به مقصد می‌رسانیم.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100 relative overflow-hidden">
          <div class="absolute top-0 left-0 w-1 h-full bg-[#0B1221]"></div> <!-- Accent Line -->
          <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-slate-800 mb-3">استانداردهای بین‌المللی</h3>
          <p class="text-slate-500 text-sm leading-6">
            رعایت تمامی پروتکل‌های حمل‌ونقل اروپا و آسیا، به همراه عضویت در کنوانسیون‌های تیر (TIR) و CMR برای تضمین امنیت بار.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-2xl p-8 shadow-lg shadow-slate-200/50 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border border-slate-100">
          <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6">
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
          </div>
          <h3 class="text-xl font-bold text-slate-800 mb-3">نرخ رقابتی و شفاف</h3>
          <p class="text-slate-500 text-sm leading-6">
            ارائه بهترین نرخ‌های کریر و فورواردری بدون واسطه‌های غیرضروری، با شفافیت کامل مالی از لحظه استعلام تا تسویه.
          </p>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================== -->
  <!-- 5. CTA: دعوت به همکاری -->
  <!-- ========================================== -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <div class="bg-[#0B1221] rounded-[2rem] p-10 md:p-16 text-center md:text-right flex flex-col md:flex-row items-center justify-between gap-10 shadow-2xl relative overflow-hidden">
        
        <!-- شکل‌های تزئینی پس‌زمینه -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute -bottom-8 left-0 w-64 h-64 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="relative z-10 max-w-2xl">
          <h2 class="text-xl font-bold text-white mb-4">آماده شروع همکاری هستید؟</h2>
          <p class="text-slate-300 text-base">
            برای دریافت مشاوره رایگان حمل و استعلام قیمت، همین حالا با کارشناسان ما تماس بگیرید.
          </p>
        </div>

        <div class="relative z-10 flex flex-col sm:flex-row gap-4">
           <a href="https://www.sepandrah.com/%d8%aa%d9%85%d8%a7%d8%b3/" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-[#0B1221] bg-white rounded-full hover:bg-slate-100 transition-all shadow-lg hover:shadow-white/20">
             استعلام قیمت
           </a>
           <a href="https://www.instagram.com/sepand_rah_agrin/" target="_blank" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white border border-white/20 bg-white/5 backdrop-blur-sm rounded-full hover:bg-white/10 transition-all">
             اینستاگرام ما
           </a>
        </div>

      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>

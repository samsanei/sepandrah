<?php
/**
 * Template Name: Contact Page TPL
 * Template Post Type: page
 *
 * Description: Home Page template
 * Author: Bamdad Studio
 * Author URI: https://www.bamdad.studio
 */

get_header();
?>

    <!-- Hero Section -->
    <section class="relative py-16 md:py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-gray-100"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="text-2xl md:text-4xl font-bold mb-4">
                    تماس با ما
                </h1>
                <p class="text-base text-gray-600">
                    برای هرگونه سؤال، پیشنهاد یا درخواست همکاری، خوشحال می‌شویم با ما در تماس باشید.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section (WHITE AREA) -->
    <section class="py-14 md:py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-xl font-semibold mb-6">اطلاعات تماس</h2>
                    <div class="space-y-6 text-sm text-gray-700">

                        <div>
                            <h3 class="font-medium mb-1">📍 آدرس</h3>
                            <p>تهران، خیابان ولیعصر، پلاک ۱۲۳۴</p>
                        </div>

                        <div>
                            <h3 class="font-medium mb-1">📞 تلفن</h3>
                            <p>۰۲۱‑۱۲۳۴۵۶۷۸</p>
                            <p>۰۹۱۲۳۴۵۶۷۸۹</p>
                        </div>

                        <div>
                            <h3 class="font-medium mb-1">✉️ ایمیل</h3>
                            <p>info@sepandrah.com</p>
                            <p>support@sepandrah.com</p>
                        </div>

                        <div>
                            <h3 class="font-medium mb-1">⏰ ساعت کاری</h3>
                            <p>شنبه تا چهارشنبه: ۸ تا ۱۷</p>
                            <p>پنجشنبه: ۸ تا ۱۳</p>
                        </div>

                    </div>
                </div>

                <!-- Contact Form -->
                <div>
                    <h2 class="text-xl font-semibold mb-6">ارسال پیام</h2>
                    <div class="bg-white border border-gray-200 rounded-xl p-6">
                        <?php
                        if (shortcode_exists('contact-form-7')) {
                            echo do_shortcode('[contact-form-7 id="123" title="Contact form 1"]');
                        } else {
                        ?>
                        <form class="space-y-5">
                            <div>
                                <label class="block text-sm mb-1">نام و نام خانوادگی</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-sm mb-1">ایمیل</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            </div>

                            <div>
                                <label class="block text-sm mb-1">موضوع</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">
                            </div>

                            <div>
                                <label class="block text-sm mb-1">پیام</label>
                                <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm"></textarea>
                            </div>

                            <button type="submit"
                                class="w-full py-2.5 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                ارسال پیام
                            </button>
                        </form>
                        <?php } ?>
                    </div>
                </div>

                

            </div>
        </div>
    </section>

    <!-- the_content (WHITE) -->
    <?php if (get_the_content()) : ?>
        <section class="py-14 bg-gray-50 border-t">
            <div class="container mx-auto px-4 max-w-4xl">
                <h2 class="text-xl font-semibold mb-6 text-center">
                    اطلاعات بیشتر
                </h2>
                <div class="bg-white border border-gray-200 rounded-xl p-6 prose max-w-none text-sm">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer(); ?>

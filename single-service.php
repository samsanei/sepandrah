<?php
get_header();
the_post();

// ACF helpers (نرمی در نبود ACF)
$has_acf = function_exists('get_field');
$hero_sub   = $has_acf ? get_field('hero_subtitle') : '';
$primary_cta = $has_acf ? get_field('primary_cta') : null;   // link array: url,title,target
$secondary_cta = $has_acf ? get_field('secondary_cta') : null;

// Intro: intro (acf) → excerpt → خالی
$intro = '';
if ($has_acf && ($v = get_field('intro'))) {
    $intro = $v;
} elseif (has_excerpt()) {
    $intro = get_the_excerpt();
}

// گالری و ویژگی‌ها و FAQ
$features = $has_acf ? (get_field('features') ?: []) : [];
$gallery  = $has_acf ? (get_field('gallery') ?: [])  : [];
$faq      = $has_acf ? (get_field('faq') ?: [])      : [];

// تصویر هیرو: شاخص سرویس
$hero_img_html = '';
if (has_post_thumbnail()) {
    $hero_img_html = get_the_post_thumbnail(
        get_the_ID(),
        'service-hero',
        [
            'class'         => 'w-full h-full object-cover',
            'alt'           => esc_attr(get_the_title()),
            'loading'       => 'eager',
            'decoding'      => 'async',
            'fetchpriority' => 'high',
        ]
    );
} else {
    // فالبک
    $fallback = get_template_directory_uri() . '/assets/banner.jpg';
    $hero_img_html = sprintf(
        '<img src="%s" class="w-full h-full object-cover" alt="%s" loading="eager" decoding="async" fetchpriority="high" />',
        esc_url($fallback),
        esc_attr(get_the_title())
    );
}

// لینک آرشیو سرویس‌ها
$svc_archive = get_post_type_archive_link('service');
?>
<!-- Hero -->
<section class="mx-auto relative">
    <div class="h-[55vh] w-full relative overflow-hidden">
        <div class="absolute inset-0 bg-linear-to-t from-slate-950/60 via-transparent to-transparent"></div>
        <?php echo $hero_img_html; ?>

        <div class="absolute inset-0 container mx-auto max-w-7xl flex items-end pt-16 px-5">
            <div class="text-right pb-8">
                <?php if ($hero_sub) : ?>
                    <p class="text-white/80 text-sm mb-2"><?php echo esc_html($hero_sub); ?></p>
                <?php else : ?>
                    <p class="text-white/80 text-sm mb-2"><?php echo esc_html__('خدمات تخصصی', 'bamdad-studio'); ?> — <?php echo esc_html(get_the_title()); ?></p>
                <?php endif; ?>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                    <?php the_title(); ?>
                </h1>

                <!-- Breadcrumb -->
                <nav class="mt-3 text-sm text-white/70" aria-label="<?php esc_attr_e('Breadcrumb', 'bamdad-studio'); ?>">
                    <ol class="flex items-center gap-2 text-xs">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="underline/offset hover:underline text-white/60"><?php esc_html_e('خانه', 'bamdad-studio'); ?></a></li>
                        <li class="text-white/40">›</li>
                        <?php if ($svc_archive) : ?>
                            <li><a href="<?php echo esc_url($svc_archive); ?>" class="hover:underline text-white/60"><?php esc_html_e('خدمات', 'bamdad-studio'); ?></a></li>
                            <li class="text-white/40">›</li>
                        <?php endif; ?>
                        <li class="font-medium text-white"><?php the_title(); ?></li>
                    </ol>
                </nav>

                <?php if ($intro) : ?>
                    <p class="mt-3 max-w-xl text-white/85 hidden sm:block"><?php echo esc_html(wp_strip_all_tags($intro)); ?></p>
                <?php endif; ?>

                <div class="mt-4 flex gap-3">
                    <?php if (is_array($primary_cta) && !empty($primary_cta['url'])) : ?>
                        <a href="<?php echo esc_url($primary_cta['url']); ?>"
                            target="<?php echo esc_attr($primary_cta['target'] ?: '_self'); ?>"
                            class="px-4 py-2 rounded-full bg-blue-600 text-white text-sm font-semibold">
                            <?php echo esc_html($primary_cta['title'] ?: __('درخواست پیش فاکتور', 'bamdad-studio')); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (is_array($secondary_cta) && !empty($secondary_cta['url'])) : ?>
                        <a href="<?php echo esc_url($secondary_cta['url']); ?>"
                            target="<?php echo esc_attr($secondary_cta['target'] ?: '_self'); ?>"
                            class="px-4 py-2 rounded-full border border-white/20 text-white text-sm">
                            <?php echo esc_html($secondary_cta['title'] ?: __('تماس با کارشناس', 'bamdad-studio')); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<main class="container mx-auto max-w-7xl px-5 pb-12">
    <div class="grid gap-8 md:grid-cols-3">
        <!-- Main column -->
        <article class="md:col-span-2 space-y-8 leading-8">

            <!-- معرفی سرویس -->
            <section>

                <?php if ($intro) : ?>
                    <p class="mt-3 text-slate-600 leading-relaxed"><?php echo wp_kses_post(wpautop($intro)); ?></p>
                <?php endif; ?>
            </section>

            <!-- محتوای کامل (ادیتور) -->
            <?php if (get_the_content()) : ?>
                <section>
                    <div class="wp-content-wrapper prose prose-slate prose-p:leading-7 max-w-none">
                        <?php the_content(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- ویژگی‌ها (ACF repeater: features[text]) -->
            <?php if (!empty($features)) : ?>
                <section>
                    <h3 class="text-xl font-semibold text-slate-900"><?php esc_html_e('ویژگی‌ها', 'bamdad-studio'); ?></h3>
                    <ul class="mt-3 list-inside list-disc text-slate-600 space-y-2">
                        <?php foreach ($features as $row) :
                            $txt = is_array($row) ? ($row['text'] ?? '') : $row;
                            if (! $txt) continue; ?>
                            <li><?php echo esc_html($txt); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <!-- گالری (ACF gallery: gallery[]) -->
            <?php if (!empty($gallery)) : ?>
                <section id="gallery">
                    <h3 class="text-xl font-semibold text-slate-900"><?php esc_html_e('گالری', 'bamdad-studio'); ?></h3>
                    <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <?php foreach ($gallery as $img) :
                            // $img می‌تواند ID یا آرایه باشد؛ هر دو را هندل می‌کنیم
                            if (is_array($img) && !empty($img['ID'])) {
                                echo wp_get_attachment_image($img['ID'], 'service-thumb', false, ['class' => 'w-full h-28 object-cover rounded-md', 'loading' => 'lazy', 'decoding' => 'async']);
                            } elseif (is_numeric($img)) {
                                echo wp_get_attachment_image(intval($img), 'service-thumb', false, ['class' => 'w-full h-28 object-cover rounded-md', 'loading' => 'lazy', 'decoding' => 'async']);
                            } elseif (is_array($img) && !empty($img['url'])) {
                                printf('<img src="%s" alt="" class="w-full h-28 object-cover rounded-md" loading="lazy" decoding="async" />', esc_url($img['url']));
                            }
                        endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- سؤالات متداول (ACF repeater: faq[q], faq[a]) -->
            <?php if (!empty($faq)) : ?>
                <section id="faq">
                    <h3 class="text-xl font-semibold text-slate-900"><?php esc_html_e('سؤالات متداول', 'bamdad-studio'); ?></h3>
                    <div class="mt-3 space-y-2 text-slate-600">
                        <?php foreach ($faq as $row) :
                            $q = $row['q'] ?? '';
                            $a = $row['a'] ?? '';
                            if (! $q && ! $a) continue; ?>
                            <div>
                                <?php if ($q): ?><p class="font-semibold"><?php echo esc_html($q); ?></p><?php endif; ?>
                                <?php if ($a): ?><p class="mt-1"><?php echo wp_kses_post(wpautop($a)); ?></p><?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

        </article>

        <!-- Sidebar (دست‌نخورده) -->
        <aside class="md:col-span-1 pt-12">
            <div class="sticky top-24 space-y-6 ">
                <div class="rounded-2xl p-5 bg-white shadow-sm">
                    <h4 class="font-semibold text-slate-900"><?php esc_html_e('درخواست سریع', 'bamdad-studio'); ?></h4>
                    <p class="mt-2 text-sm text-slate-600"><?php esc_html_e('اطلاعات پایه را وارد کنید تا کارشناسان ما تماس بگیرند.', 'bamdad-studio'); ?></p>
                    <div class="mt-4 space-y-3">
                        <?php echo do_shortcode('[gravityform id="1" title="false" ajax="true"]'); ?>
                    </div>
                </div>

                <div class="rounded-2xl p-5 bg-white shadow-sm text-sm text-slate-700">
                    <p class="font-semibold"><?php esc_html_e('تماس فوری', 'bamdad-studio'); ?></p>
                    <div class="flex flex-col gap-3 w-full items-center lg:items-start mt-5">

                        <!-- شماره ۱ -->
                        <a href="tel:+989122895673" class="flex items-center gap-3 text-slate-900 hover:text-slate-700 transition-colors group">

                            <span class="text-slate-900 group-hover:text-blue-400 transition-colors ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"></path>
                                </svg>
                            </span>
                            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۰۹۱۲۲۸۹۵۶۷۳</span>
                        </a>
                        <a href="tel:+982188703035" class="flex items-center gap-3 text-slate-900 hover:text-slate-700 transition-colors group">

                            <span class="text-slate-900 group-hover:text-blue-400 transition-colors ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"></path>
                                </svg>
                            </span>
                            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۸۸۷۰۳۰۳۵</span>
                        </a>
                        <a href="tel:+982188703036" class="flex items-center gap-3 text-slate-900 hover:text-slate-700 transition-colors group">

                            <span class="text-slate-900 group-hover:text-blue-400 transition-colors ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"></path>
                                </svg>
                            </span>
                            <span class="text-sm font-sans tracking-wider order-2 lg:order-1">۸۸۷۰۳۰۳۶</span>
                        </a>

                    </div>
                </div>
            </div>

        </aside>
    </div>
</main>
<?php get_footer(); ?>

    <!-- footer -->
    <footer class="bg-white mt-8 pt-12 border-t border-gray1">
        <div class="container">
            <div class="w-full flex flex-col lg:flex-row justify-between">

                <div class="w-full lg:w-5/12 lg:w-4/12 mb-6 lg:mb-0">
                    <img src="<?=get_template_directory_uri(); ?>/images/global/logo.png" alt="لندو" draggable="false" class="w-32 h-auto pb-6" />
                    <p class="text-black text-sm pb-6">
                        لندو در سال ۱۳۹۴ با نام ایران‌رنتر و با همکاری سه هم‌بنیانگذار تاسیس شد و در ابتدا به عنوان یک
                        استارتاپ در زمینه اجاره وسایل و تجهیزات نمایشگاه فعالیت می‌کرد.
                    </p>
                    <ul class="list-none flex items-center justify-center lg:justify-start gap-7">
                        <li>
                            <a href="<?=get_field("twitter","option"); ?>" class="flex">
                                <i class="icon-twitter w-6 h-6"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=get_field("telegram","option"); ?>" class="flex">
                                <i class="icon-telegram w-6 h-6"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=get_field("instagram","option"); ?>" class="flex">
                                <i class="icon-instagram w-6 h-6"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=get_field("aparat","option"); ?>" class="flex">
                                <i class="icon-aparat w-6 h-6"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="w-full lg:w-5/12 lg:w-4/12">
                    <p class="text-black text-xl font-extra pb-4">عضویت در خبرنامه</p>
                    <p class="text-black text-sm pb-3">
                        برای مطلع شدن از آخرین اخبار لندو پست الکترونیکی خود را در فرم زیر وارد نمایید
                    </p>
                    <form>
                        <div class="newsletter bg-light4 rounded-10 p-3 flex items-center justify-between">
                            <input type="text" placeholder="پست الکترونیکی" id="newsletter" name="newsletter"
                                class="bg-transparent border-0 px-3 w-9/12 placeholder-gray3 text-secondary">
                            <button type="submit"
                                class="font-extra text-base text-white bg-green3 rounded-10 w-3/12 py-3">عضویت</button>
                        </div>
                    </form>
                </div>

            </div>

            <hr class="mt-5 bg-light3" />

            <div id="copyright" class="py-5 text-center text-sm text-black">
                © 1402 - 1394 کپی از مطالب <b>لندو</b> تنها با کسب مجوز مکتوب امکان پذیر است.
            </div>

        </div>
    </footer>
    <!-- footer -->
    <?php wp_footer(); ?>
    <!-- imports -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="<?=get_template_directory_uri(); ?>/assets/js/custom.js"></script>
    <!-- imports  -->

</body>

</html>
<a name="help"></a>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-2"><span class="px-4">اینجا چه خبره؟</span></h2>
                <span class="subheading">شما می توانید یک تقویم اختصاصی به همراه اسم و آدرس اعضاء‌ جلسه خود ایجاد و با سایر اعضاء ‌به اشتراک بگذارید.</span>
                <span class="subheading">این تقویم قابل مشاهده بر روی گوشی موبایل، کامپیوتر، بهمراه نسخه قابل چاپ دیواری است.</span>
                <span class="subheading">همه امکانات این نرم افزار، متن باز بوده و هزینه آن صلوات است.</span>
            </div>

        </div>
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 text-center heading-section ftco-animate">
                <h2 class="mb-2"><span class="px-4">برای ساختن تقویم جلسه مذهبی خود آماده هستید؟</span></h2>
                <span class="subheading">هزینه این تقویم یک صلوات با نیت سلامتی و تعجیل در امر فرج مولایمان حضرت صاحب الزمان است. </span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-left">
                    <div class="icon order-lg-last d-flex align-items-center justify-content-center"><span>۱</span></div>
                    <div class="media-body pl-lg-5">
                        <h3 class="heading mb-3">عضویت</h3>
                        <p>اولین گام برای ایجاد تقویم
                            <a href="{{ route('register') }} ">
                                عضویت
                            </a>
                            است. البته این کار برای مشاهده تقویم از قبل ساخته شده ضروری نیست.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-right mb-lg-0 mt-lg-5 pt-lg-5">
                    <div class="icon d-flex align-items-center justify-content-center"><span>۲</span></div>
                    <div class="media-body pr-lg-5">
                        <h3 class="heading mb-3">ایجاد جلسه</h3>
                        <p>در مرحله دوم با کلیک بر روی «جلسه جدید» بایستی جلسه مذهبی خود را در سیستم تعریف نمایید. </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pb-0">
            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-left">
                    <div class="icon order-lg-last d-flex align-items-center justify-content-center"><span>۳</span></div>
                    <div class="media-body pl-lg-5">
                        <h3 class="heading mb-3">اعضاء</h3>
                        <p>ثبت مشخصات اعضاء‌ جلسه در سیستم گام سوم برای طراحی تقویم اختصاصی شما می باشد.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-right  mb-lg-0 mt-lg-5 pt-lg-5">
                    <div class="icon d-flex align-items-center justify-content-center"><span>۴</span></div>
                    <div class="media-body pr-lg-5">
                        <h3 class="heading mb-3">زمانبندی</h3>
                        <p>در این گام شما می توانید برای هر هفته نام فرد میزبان جلسه را مشخص نمایید.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-left">
                    <div class="icon order-lg-last d-flex align-items-center justify-content-center"><span>۵</span></div>
                    <div class="media-body pl-lg-5">
                        <h3 class="heading mb-3">مشاهده تقویم</h3>
                        <p>تبریک! تقویم شما آماده است. می توانید آنرا مشاهده نموده و با دیگران به اشتراک بگذارید.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="d-flex services ftco-animate text-lg-right mb-lg-0 mt-lg-5 pt-lg-5">
                    <div class="icon d-flex align-items-center justify-content-center"><span>۶</span></div>
                    <div class="media-body pr-lg-5">
                        <h3 class="heading mb-3">اشتراک گذاری</h3>
                        <p>آدرس اینترنتی تقویم شما: </p>
                        <p style="direction:ltr">
                            {{ route('meets.show',['']) }} / {نام یکتا}
                        </p>
                        <p>
                            اگر برای جلسه گذرواژه تعریف کرده باشید، سایرین برای مشاهده تقویم باید گذرواژه را بدانند.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

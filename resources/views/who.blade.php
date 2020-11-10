
@include('frontend.header')
@include('frontend.headerads')
@include('frontend.nav')

@yield('section')
<section class="about-as">
    <div class="container">
        <h1>من نحن</h1>
        <div class="row">
            <div class="col-lg-6">
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية،</p>
            </div>
            <div class="col-lg-6">
                <img style="    width: 403px;" src="img/AboutUs.png" alt="">
            </div>
        </div>
    </div>
    </section>
    @include('frontend.footer')

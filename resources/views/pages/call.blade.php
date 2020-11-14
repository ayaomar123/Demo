@include('frontend.header')
@include('frontend.headerads')
@include('frontend.nav')

@yield('section')
<section class="contact">
    <div class="container">
        <h1>اتصل بنا</h1>
        <div class="row">
            <div class="col-lg-6">
              <form  id="form-contact" action=""></form>
                 <div class="col-auto">
                         <label class="col-lg-12" for="inlineFormInputGroup">الأسم</label>
                         <div class="input-group mb-2">
                           <div class="input-group-prepend">
                             <div class="input-group-text"><i class="fas fa-user-alt" aria-hidden="true"></i></div>
                           </div>
                           <input type="text" class="form-control" id="inlineFormInputGroup" form="form-contact" placeholder="ادخل الاسم">
                         </div>
                         </div>
                         <!--=====================-->
                         <div class="col-auto">
                                 <label class="col-lg-12" for="inlineFormInputGroup">البريد الالكتروني</label>
                                 <div class="input-group mb-2">
                                   <div class="input-group-prepend">
                                     <div class="input-group-text"><i class="fas fa-at"></i></div>
                                   </div>
                                   <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ادخل البريد الالكتروني">
                                 </div>
                                 </div>
                         <!--=================================-->
                         <div class="col-auto">
                                 <label class="col-lg-12" for="inlineFormInputGroup">الجوال</label>
                                 <div class="input-group mb-2">
                                   <div class="input-group-prepend">
                                     <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                                   </div>
                                   <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="ادخل رقم الجوال">
                                 </div>
                                 </div>
                                 <div class="col-auto">
                                         <div class="form-group">
                                                 <label class="col-lg-12" for="exampleFormControlTextarea1">رسالتك</label>
                                                 <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="ادخل رسالتك" rows="3"></textarea>
                                               </div>
                                 </div>
                              <!--=================================-->

            </div>
            <div class="col-lg-6">
                <img style="width: 401px;" src="img/contactUs.png" alt="">
            </div>
            <img class="ads-s-contact" src="img/ADS 7.png" alt="">
        </div>
    </div>
</section>
@include('frontend.footer')

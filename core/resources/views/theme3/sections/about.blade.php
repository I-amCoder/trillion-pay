   @php
       $content = content('about.content');
   @endphp


   <!-- about section start -->
   <section class="about-section pt-120 pb-120 overflow-hidden">
      <div class="container">
        <div class="row gy-5 align-items-center justify-content-between">
          <div class="col-lg-6 col-md-10">
            <div class="about-thumb">
              <img src="{{ getFile('about', @$content->data->image) }}" alt="image">
              <div class="line one"></div>
              <div class="line two"></div>
              <div class="line three"></div>
            </div>
          </div>
          <div class="col-lg-6 ps-xl-5 p-lg-4 about-content wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <h2 class="section-title">{{ __(@$content->data->title) }}</h2>
            <p class="fs--18px mt-3">
                <?php
                    echo clean(@$content->data->description);
                ?>
            </p>
            <a href="{{ __(@$content->data->button_text_link) }}" class="btn main-btn mt-4">{{ __(@$content->data->button_text) }}</a>
          </div>
        </div>
      </div>
    </section>
    <!-- about section end -->
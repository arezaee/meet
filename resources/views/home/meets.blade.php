<a name="meets"></a>
<section class="ftco-section bg-light">

    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-12 text-center heading-section heading-section-light ftco-animate">
                <h2 class="mb-2"><span class="px-4"> جلسه ها</span></h2>
                <span class="subheading">آخرین جلسه های ثبت شده</span>
            </div>
        </div>

        <div class="row d-flex">
        @foreach($meets as $meet)
            <div class="col-lg-4 d-flex ftco-animate">
                <div class=" blog-entry justify-content-end container-fluid">

                    <a href="{{ route('meets.show',[$meet->id_name])}}" class="testimony-section block-20" style="background-image: url('images/{{$meet->pic}}.jpg');">
                        <div class="overlay"></div>
                    </a>

                    <div class="text d-flex float-right d-block">
                        <div class="topper text-center pt-4 px-3">
                            <span class="day">{{ Zaman::gToj($meet->start_at, 'yy') }}</span>
                        </div>
                        <div class="desc p-4">
                            <h3 class="heading mt-2"><a href="{{ route('meets.show',[$meet->id_name])}}">{{$meet->show_name}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

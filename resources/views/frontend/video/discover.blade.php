<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- content title -->
                    <!-- end content title -->
                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item " style="overflow:hidden;">
                            
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab"
                                aria-controls="tab-1" aria-selected="true">SIMILAIRES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#tab-2" role="tab"
                                aria-controls="tab-2" aria-selected="false">Commentaires</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
                                aria-selected="false">Remarques</a>
                        </li>
                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="Comments">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">

                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab"
                                        href="#tab-1" role="tab" aria-controls="tab-1"
                                        aria-selected="true">similaires</a></li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2"
                                        role="tab" aria-controls="tab-2" aria-selected="false">Commentaires</a></li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3"
                                        role="tab" aria-controls="tab-3" aria-selected="false">remarques</a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <!-- content tabs -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="row">
                            @include('frontend.video.partials._sidebar')
                        </div>
                    </div>

                    <div class="tab-pane fade show " id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                        <div class="row">
                            <!-- comments -->
                            @include('frontend.video.partials._comments')
                            <!-- end comments -->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                        <div class="row">
                            <!-- reviews -->
                            @include('frontend.video.partials._reviews')
                            <!-- end reviews -->
                        </div>
                    </div>
                </div>
                <!-- end content tabs -->
            </div>

            <!-- sidebar / videos you may like-->
            {{-- @include('frontend.video.partials._sidebar') --}}
            <!-- end sidebar / videos you may like-->
        </div>
    </div>
</section>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
@include('frontend.video.partials._photoswipe')
<!-- End Root element of PhotoSwipe. Must have class pswp. -->

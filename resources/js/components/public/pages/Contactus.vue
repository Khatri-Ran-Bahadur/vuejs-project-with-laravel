<template>

    <div>
    	<section class="inner-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="main-abt-area">
                    <div class="main-comon-title">
                        <h4>सम्पर्क</h4>
                    </div>
                    <div class="clearfix"></div>

                    <div class="content-area c-area">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="conta-inofrmation">
                                    <div class="contact-panel">
                                        <h3 class="sharp">हुलाक सेवा विभाग</h3>
                                        <p class="c-address">
                                            डिलीबाजार, काठमाडौं, नेपाल </p>
                                        <ul class="list-unstyled">
                                            <li class="c-phone">फोन: +९७७-१-४४१०२२४, ०१-४४१०५६९, ०१-४४११३५३, ०१-४४२१२८३, ०१-४४२१२८६</li>
                                            <li class="c-fax">फ्याक्स: +९७७-१-४४१४६८८, ०१-४४३८१३४</li>
                                            <li class="c-email">फ्याक्स:इमेल: info@postalservice.gov.np</li>
                                            <li class="c-website">वेबसाइट: www.postalservice.gov.np</li>
                                            <li class="c-audio">नोटिस बोर्डः&#2407;&#2412;&#2407;&#2414;&#2406;&#2407;&#2410;&#2410;&#2407;&#2410;&#2412;&#2414;&#2414; </li>
                                            <!-- <li class="c-schedule">Working Hour : </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="hex-row">
                                    <div class="hexagon x-f hex-twitter no-b-top">
                                        <div class="hex-area">
                                            <i class="mocit-hexgon"></i>
                                        </div>
                                        <a href="https://twitter.com/Nepal_Post" target="_blank" class="fa fa-twitter">
                                            <span class="title">Twitter</span>
                                            <span class="title-bold">@Nepal_Post</span>
                                        </a>
                                    </div>
                                    <div class="hexagon x-f hex-facebook no-b-top">
                                        <div class="hex-area">
                                            <i class="mocit-hexgon"></i>
                                        </div>
                                        <a href="https://facebook.com/neplpost" target="_blank" class="mocit-facebook2">
                                            <span class="title">Facebook</span>
                                            <span class="title-bold">@neplpost</span>
                                        </a>
                                    </div>
                                    <div class="hexagon x-f hex-email no-b-top">
                                        <div class="hex-area">
                                            <i class="mocit-hexgon"></i>
                                        </div>
                                        <a href="#" class="fa fa-volume-control-phone ">
                                            <span class="title">Toll Free</span>
                                            <span class="title-bold">1618014414688</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="hex-row l-2">
                                    <div class="hexagon x-f hex-phone- no-b-top">
                                        <div class="hex-area">
                                            <i class="mocit-hexgon"></i>
                                        </div>
                                        <a href="#" class="fa fa-phone">
                                            <span class="title">Phone</span>
                                            <span class="title-bold">+९७७-१-४४१०२२४, ०१-४४१०५६९, ०१-४४११३५३, ०१-४४२१२८३, ०१-४४२१२८६</span>
                                        </a>
                                    </div>
                                    <div class="hexagon x-f hex-fax no-b-top">
                                        <div class="hex-area">
                                            <i class="mocit-hexgon"></i>
                                        </div>
                                        <a href="#" class="fa fa-fax">
                                            <span class="title">Fax</span>
                                            <span class="title-bold">+९७७-१-४४१४६८८, ०१-४४३८१३४</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="map"></div>
</section>
<section class="contact-form">
    <div class="container">
        <div class="c-title-area">
            <h3 class="c-email">        <span>usually we need 1 working day to reply to the enquiries/complaints, depending on the enquiry/complaints type, it may take longer</span>
      </h3>
        </div>
        <form id="frmcontactus" action="#" method="POST">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="fullname">पुरा नाम</label>
                        <input type="text" name="fullname" id="fullname" class="form-control">
                        <span class="error help-inline fullname-error"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="email">इमेल </label>
                        <input type="email" name="email" id="email" class="form-control">
                        <span class="error help-inline email-error"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="telephone">टेलिफोन</label>
                        <input type="text" name="telephone" id="telephone" class="form-control">
                        <span class="error help-inline telephone-error"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <label for="fax">फ्याक्स </label>
                        <input type="text" name="fax" id="fax" class="form-control">
                        <span class="error help-inline fax-error"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <label for="subject">विषय </label>
                        <input type="text" name="subject" id="subject" class="form-control">
                        <span class="error help-inline subject-error"></span>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <label for="message">सन्देश </label>
                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                        <span class="error help-inline message-error"></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-12 col-lg-3">
                    <div class="btn-area">
                        <input type="hidden" name="checkprocess" value="true">
                        <input type="hidden" name="feedbacktype_id" value="1">
                        <input type="hidden" name="csrf_test_name" value="c5e47f7653837150ccfd83a3e07dbbb1">
                        <button class="btn btn-success btn-block" type="button" id="btnfrmcontactussubmit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    </div>


</template>

<script>
    export default {
        name: "Contactus"
    }
</script>
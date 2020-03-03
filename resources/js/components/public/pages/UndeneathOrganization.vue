<template>
     <section class="inner-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="main-abt-area">
                            <div class="main-comon-title">
                                <h4>विभाग अन्तर्गतका निकायहरू</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-12 col-lg-12" id="contentdetail">
                                      <div v-html="contentdata"></div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="s-news-area">
                            <div class="side-bar-title">
                                <div class="main-comon-title">
                                    <h4>सूचना तथा समाचार</h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="../categorydetail/right-to-information-2076-2nd.html">
                                        <div class="row">
                                            <div class="col">
                                                <div class="date-area">&#2408;&#2406;&#2413;&#2412;&#45;&#2407;&#2406;&#45;&#2414;</div>
                                            </div>
                                            <div class="col">
                                                <div class="pull-right">
                                                    <label class="label label-primary">समाचार</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="n-title-area">
                                            सूचनाको हक कार्तिक २०७६ देखि पुस मसान्तसम्म </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="../categorydetail/dank_thaila_2076-05-08.html">
                                        <div class="row">
                                            <div class="col">
                                                <div class="date-area">&#2408;&#2406;&#2413;&#2412;&#45;&#2411;&#45;&#2414;</div>
                                            </div>
                                            <div class="col">
                                                <div class="pull-right">
                                                    <label class="label label-primary">समाचार</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="n-title-area">
                                            नाइलन डाँक थैला खरिद गर्ने बारेको बोलपत्र आव्हानको सूचना </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="../categorydetail/the_hulak_2076_content.html">
                                        <div class="row">
                                            <div class="col">
                                                <div class="date-area">&#2408;&#2406;&#2413;&#2412;&#45;&#2411;&#45;&#2409;</div>
                                            </div>
                                            <div class="col">
                                                <div class="pull-right">
                                                    <label class="label label-primary">समाचार</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="n-title-area">
                                            हुलाक पत्रीकाको लागि लेख रचना उपलब्ध गराईदिने बारे जानकारी </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="../categorydetail/gosthi-related.html">
                                        <div class="row">
                                            <div class="col">
                                                <div class="date-area">&#2408;&#2406;&#2413;&#2412;&#45;&#2410;&#45;&#2407;&#2406;</div>
                                            </div>
                                            <div class="col">
                                                <div class="pull-right">
                                                    <label class="label label-primary">समाचार</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="n-title-area">
                                            कार्य सम्पादन करार सम्झौता र प्रगति समीक्षा सम्पन्न गरिएको बारे </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="../categorydetail/tendernotice-2076-03-26-1.html">
                                        <div class="row">
                                            <div class="col">
                                                <div class="date-area">&#2408;&#2406;&#2413;&#2412;&#45;&#2409;&#45;&#2409;&#2406;</div>
                                            </div>
                                            <div class="col">
                                                <div class="pull-right">
                                                    <label class="label label-primary">समाचार</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="n-title-area">
                                            बारकोड प्रिन्टर, बारकोड पेपर (स्टिकर), बारकोड रिवन र हुलाक टाँचा खरिद गर्ने बारेको सिलबन्दी बोलपत्र/दरभाउपत्र आव्हानको सूचना </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
</template>

<script>
    export default {
        data() {
            return {
                contentdata:'',             
            }
        },
        methods: {
            loadData(){
                axios.get(this.$public_API+'/underneath-organizations').then(({data})=>(this.contentdata=data.value));
                }
        },
        created() {
            this.loadData();       
        }
    }
</script>
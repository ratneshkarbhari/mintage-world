
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("/assets/images/history-banner.jpg")}}"></section>
<section class="breadcrumb-wraper">
    <div class="container-fluid px-lg-2 px-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
                <li class="breadcrumb-item me-2"><a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a></li>  
                <li class="breadcrumb-item me-2" aria-current="page">History</li>
            </ol>
        </nav>
    </div>
</section>
<section class="common-padding coing-list-wraper">
    <div class="container-fluid  px-lg-2 px-lg-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">History</h2>
        </div>
        <div class="row info-item-grid-row min-h-0">
            <div class="col-lg-3 col-md-12 left-filter-wrap ">
                <div id="InfoFilter" class="filter-wrap">
                    <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>Filters</b>
                    </div>
                </div>
                <div id="CategoryMenu" class="category-menu">
                    <nav class="nav" role="navigation">
                        <div class="cat-heading"><b><i class="fa fa-filter" aria-hidden="true"></i>Filters</b>
                            <div id="CatClose" class="categories-close">X</div>
                        </div>

                        <div class="accordion accordion-flush w-100" id="accordionFlushExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading1">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                        aria-expanded="false" aria-controls="flush-collapse1">
                                        Select by Periods
                                    </button>
                                </h2>
                                <div id="flush-collapse1" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <select name="periods" class="form-control" id="periods" required="required"><option value="">Select Period</option>
                                            <option value="150" selected="selected">All (150)</option>
                                            <option value="17">Ancient  (25)</option>
                                            <option value="4">Medieval  (19)</option>
                                            <option value="401">Indian Princely States  (59)</option>
                                            <option value="10">Colonial  (6)</option>
                                            <option value="30">Modern  (2)</option></select>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading2">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse2"
                                        aria-expanded="false" aria-controls="flush-collapse2">
                                        Select by History

                                    </button>
                                </h2>
                                <div id="flush-collapse2" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body filter-item-body">
                                        <select name="historyn" id="historyn" required="" class="form-control" onchange="detailHistory();"> 
                                            <option value="">Select History</option>
                                            <option value="44">Andhra Janapada</option>
                                            <option value="45">Ashmaka Janapada</option>
                                            <option value="46">Avanti Janapada</option>
                                            <option value="47">Ayodhya Janapada</option>
                                            <option value="57">Gandhara Janapada</option>
                                            <option value="91">Gupta</option>
                                            <option value="266">Indo - Parthian</option>
                                            <option value="125">Indo - Scythian</option>
                                            <option value="124">Indo-Greeks</option>
                                            <option value="169">Kadambas of Banavasi</option>
                                            <option value="49">Kalinga Janapada</option>
                                            <option value="59">Kashi Janapada</option>
                                            <option value="58">Kosala Janapada</option>
                                            <option value="51">Kuntala Janapada</option>
                                            <option value="50">Kuru Janapada</option>
                                            <option value="60">Magadha Janapada</option>
                                            <option value="36">Magadha-Mauryan</option>
                                            <option value="52">Malla Janapada</option>
                                            <option value="132">Pallava</option>
                                            option value="56">Panchala Janapada</option>
                                            <option value="53">Saurashtra Janapada</option>
                                            <option value="54">Vanga Janapada</option>
                                            <option value="55">Vatsa Janapada</option>
                                            <option value="23">Western Kshatrapas - Kardamaka </option>
                                            <option value="22">Western Kshatrapas - Kshaharata</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="history/detail/">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Andhra Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="/detail">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Ashmaka Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1284">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Avanti Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1285">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Ayodhya Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1286">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Gandhara Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1287">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Gupta</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1288">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Half Tanka">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Indo - Parthian</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1289">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Indo - Scythian</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/1290">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Half Falus">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Indo-Greeks</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/34396">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Kadambas of Banavasi</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                       <a href="http://localhost/mintage-world/coin/detail/57781">
                          <div class="info-item-grid-box">
                             <img src="https://www.mintageworld.com/public/images/dynasty/andhra.jpg" class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                             <div class="info-meta text-center">
                                <h2 class="info-item-grid-title">Kalinga Janapada</h2>
                             </div>
                          </div>
                       </a>
                    </div>
                 </div>
               
            </div>            
        </div>
    </div>
</section>
</main>
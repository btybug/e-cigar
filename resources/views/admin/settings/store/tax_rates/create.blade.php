@extends('layouts.admin')
@section('content')
    <div class="row dis-flex-wrap">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-7 pl-0">
                            <h2>Attribute</h2>
                        </div>
                        <div class="col-sm-5 p-0">
                            <div class="button-save  text-right">
                                <a class="btn btn-primary pull-right"
                                   href="http://core.bootydev.co.uk/admin/inventory/attributes">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-body">
                    <div>
                        <form method="POST" action="http://core.bootydev.co.uk/admin/settings/store/couriers/save/2"
                              accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden"
                                                                                    value="bymp1eWFtVcDmMfwYa0Rx6ony96bpWiaxTh7gdWs">
                            <ul class="nav nav-tabs">
                                <li class=" active "><a data-toggle="tab" href="#gb">
                                        <span class="flag-icon flag-icon-gb"></span> GB
                                    </a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="gb" class="tab-pane fade   in active ">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span data-toggle="tooltip" title=""
                                                                                    data-original-title="Couriers Name ">Couriers Name</span></label>
                                        <div class="col-sm-10">
                                            <input class="form-control" name="translatable[gb][name]" type="text"
                                                   value="Pick up">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><span data-toggle="tooltip" title=""
                                                                                    data-original-title="Couriers Name ">Description</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="translatable[gb][description]"
                                                      cols="50" rows="10">Quia omnis magnam vitae aliquid nemo vel. Numquam autem hic quaerat vel temporibus saepe id sit. Omnis ut nesciunt sed blanditiis assumenda delectus commodi.</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Icon Title">Icon</span></label>
                                <div class="col-sm-9 iconpicker-container">
                                    <input class="form-control icon-picker iconpicker-element iconpicker-input"
                                           name="icon" type="text" value="fas fa-car">
                                    <div class="iconpicker-popover popover fade">
                                        <div class="arrow"></div>
                                        <div class="popover-title"><input type="search"
                                                                          class="form-control iconpicker-search"
                                                                          placeholder="Type to filter"></div>
                                        <div class="popover-content">
                                            <div class="iconpicker">
                                                <div class="iconpicker-items"><a role="button" href="#"
                                                                                 class="iconpicker-item"
                                                                                 title=".fab fa-500px"><i
                                                                class="fab fa-500px"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-accessible-icon"
                                                                                                data-search-terms="accessibility handicap person wheelchair wheelchair-alt "><i
                                                                class="fab fa-accessible-icon"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-accusoft"><i
                                                                class="fab fa-accusoft"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-address-book"><i
                                                                class="fas fa-address-book"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-address-book"><i
                                                                class="far fa-address-book"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-address-card"><i
                                                                class="fas fa-address-card"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-address-card"><i
                                                                class="far fa-address-card"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-adjust"
                                                                                                       data-search-terms="contrast "><i
                                                                class="fas fa-adjust"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-adn"><i
                                                                class="fab fa-adn"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-adversal"><i
                                                                class="fab fa-adversal"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-affiliatetheme"><i
                                                                class="fab fa-affiliatetheme"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-algolia"><i
                                                                class="fab fa-algolia"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-align-center"
                                                                                                  data-search-terms="middle text "><i
                                                                class="fas fa-align-center"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-align-justify"
                                                                                                       data-search-terms="text "><i
                                                                class="fas fa-align-justify"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-align-left"
                                                                                                        data-search-terms="text "><i
                                                                class="fas fa-align-left"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-align-right"
                                                                                                     data-search-terms="text "><i
                                                                class="fas fa-align-right"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-allergies"
                                                                                                      data-search-terms="freckles hand intolerances pox spots "><i
                                                                class="fas fa-allergies"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-amazon"><i
                                                                class="fab fa-amazon"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-amazon-pay"><i
                                                                class="fab fa-amazon-pay"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-ambulance"
                                                                                                     data-search-terms="help machine support vehicle "><i
                                                                class="fas fa-ambulance"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-american-sign-language-interpreting"><i
                                                                class="fas fa-american-sign-language-interpreting"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-amilia"><i class="fab fa-amilia"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-anchor" data-search-terms="link "><i
                                                                class="fas fa-anchor"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-android"
                                                                                                 data-search-terms="robot "><i
                                                                class="fab fa-android"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-angellist"><i
                                                                class="fab fa-angellist"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-angle-double-down"
                                                                                                    data-search-terms="arrows "><i
                                                                class="fas fa-angle-double-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-angle-double-left"
                                                            data-search-terms="arrows back laquo previous quote "><i
                                                                class="fas fa-angle-double-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-angle-double-right"
                                                            data-search-terms="arrows forward next quote raquo "><i
                                                                class="fas fa-angle-double-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-angle-double-up" data-search-terms="arrows "><i
                                                                class="fas fa-angle-double-up"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-angle-down"
                                                                                                          data-search-terms="arrow "><i
                                                                class="fas fa-angle-down"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-angle-left"
                                                                                                     data-search-terms="arrow back previous "><i
                                                                class="fas fa-angle-left"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-angle-right"
                                                                                                     data-search-terms="arrow forward next "><i
                                                                class="fas fa-angle-right"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-angle-up"
                                                                                                      data-search-terms="arrow "><i
                                                                class="fas fa-angle-up"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-angry"
                                                                                                   data-search-terms="disapprove emoticon face mad upset "><i
                                                                class="fas fa-angry"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-angry"
                                                                                                data-search-terms="disapprove emoticon face mad upset "><i
                                                                class="far fa-angry"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-angrycreative"><i
                                                                class="fab fa-angrycreative"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-angular"><i
                                                                class="fab fa-angular"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-app-store"><i
                                                                class="fab fa-app-store"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-app-store-ios"><i
                                                                class="fab fa-app-store-ios"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-apper"><i
                                                                class="fab fa-apper"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-apple"
                                                                                                data-search-terms="food fruit osx "><i
                                                                class="fab fa-apple"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-apple-pay"><i
                                                                class="fab fa-apple-pay"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-archive"
                                                                                                    data-search-terms="box package storage "><i
                                                                class="fas fa-archive"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-archway"
                                                                                                  data-search-terms="arc monument road street "><i
                                                                class="fas fa-archway"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-arrow-alt-circle-down"
                                                                                                  data-search-terms="arrow-circle-o-down download "><i
                                                                class="fas fa-arrow-alt-circle-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-arrow-alt-circle-down"
                                                            data-search-terms="arrow-circle-o-down download "><i
                                                                class="far fa-arrow-alt-circle-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-alt-circle-left"
                                                            data-search-terms="arrow-circle-o-left back previous "><i
                                                                class="fas fa-arrow-alt-circle-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-arrow-alt-circle-left"
                                                            data-search-terms="arrow-circle-o-left back previous "><i
                                                                class="far fa-arrow-alt-circle-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-alt-circle-right"
                                                            data-search-terms="arrow-circle-o-right forward next "><i
                                                                class="fas fa-arrow-alt-circle-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-arrow-alt-circle-right"
                                                            data-search-terms="arrow-circle-o-right forward next "><i
                                                                class="far fa-arrow-alt-circle-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-alt-circle-up"
                                                            data-search-terms="arrow-circle-o-up "><i
                                                                class="fas fa-arrow-alt-circle-up"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-arrow-alt-circle-up"
                                                            data-search-terms="arrow-circle-o-up "><i
                                                                class="far fa-arrow-alt-circle-up"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-circle-down"
                                                            data-search-terms="download "><i
                                                                class="fas fa-arrow-circle-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-circle-left"
                                                            data-search-terms="back previous "><i
                                                                class="fas fa-arrow-circle-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-circle-right"
                                                            data-search-terms="forward next "><i
                                                                class="fas fa-arrow-circle-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-arrow-circle-up"><i
                                                                class="fas fa-arrow-circle-up"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-arrow-down"
                                                                                                          data-search-terms="download "><i
                                                                class="fas fa-arrow-down"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-arrow-left"
                                                                                                     data-search-terms="back previous "><i
                                                                class="fas fa-arrow-left"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-arrow-right"
                                                                                                     data-search-terms="forward next "><i
                                                                class="fas fa-arrow-right"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-arrow-up"><i
                                                                class="fas fa-arrow-up"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-arrows-alt"
                                                                                                   data-search-terms="arrow arrows bigger enlarge expand fullscreen move position reorder resize "><i
                                                                class="fas fa-arrows-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-arrows-alt-h"
                                                                                                     data-search-terms="arrows-h resize "><i
                                                                class="fas fa-arrows-alt-h"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-arrows-alt-v"
                                                                                                       data-search-terms="arrows-v resize "><i
                                                                class="fas fa-arrows-alt-v"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-assistive-listening-systems"><i
                                                                class="fas fa-assistive-listening-systems"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-asterisk" data-search-terms="details "><i
                                                                class="fas fa-asterisk"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-asymmetrik"><i
                                                                class="fab fa-asymmetrik"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-at"
                                                                                                     data-search-terms="e-mail email "><i
                                                                class="fas fa-at"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fas fa-atlas"
                                                                                             data-search-terms="book directions geography map wayfinding "><i
                                                                class="fas fa-atlas"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-audible"><i
                                                                class="fab fa-audible"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-audio-description"><i
                                                                class="fas fa-audio-description"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-autoprefixer"><i
                                                                class="fab fa-autoprefixer"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-avianex"><i
                                                                class="fab fa-avianex"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-aviato"><i
                                                                class="fab fa-aviato"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-award"
                                                                                                 data-search-terms="honor praise prize recognition ribbon "><i
                                                                class="fas fa-award"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-aws"><i
                                                                class="fab fa-aws"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-backspace"
                                                                                              data-search-terms="command delete keyboard undo "><i
                                                                class="fas fa-backspace"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-backward"
                                                                                                    data-search-terms="previous rewind "><i
                                                                class="fas fa-backward"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-balance-scale"
                                                                                                   data-search-terms="balanced justice legal measure weight "><i
                                                                class="fas fa-balance-scale"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-ban"
                                                                                                        data-search-terms="abort ban block cancel delete hide prohibit remove stop trash "><i
                                                                class="fas fa-ban"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-band-aid"
                                                                                              data-search-terms="bandage boo boo ouch "><i
                                                                class="fas fa-band-aid"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-bandcamp"><i
                                                                class="fab fa-bandcamp"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-barcode"
                                                                                                   data-search-terms="scan "><i
                                                                class="fas fa-barcode"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-bars"
                                                                                                  data-search-terms="checklist drag hamburger list menu nav navigation ol reorder settings todo ul "><i
                                                                class="fas fa-bars"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-baseball-ball"><i
                                                                class="fas fa-baseball-ball"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-basketball-ball"><i
                                                                class="fas fa-basketball-ball"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-bath"><i
                                                                class="fas fa-bath"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-battery-empty"
                                                                                               data-search-terms="power status "><i
                                                                class="fas fa-battery-empty"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-battery-full"
                                                                                                        data-search-terms="power status "><i
                                                                class="fas fa-battery-full"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-battery-half"
                                                                                                       data-search-terms="power status "><i
                                                                class="fas fa-battery-half"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-battery-quarter"
                                                                                                       data-search-terms="power status "><i
                                                                class="fas fa-battery-quarter"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-battery-three-quarters"
                                                                                                          data-search-terms="power status "><i
                                                                class="fas fa-battery-three-quarters"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-bed"
                                                            data-search-terms="lodging sleep travel "><i
                                                                class="fas fa-bed"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-beer"
                                                                                              data-search-terms="alcohol bar drink liquor mug stein "><i
                                                                class="fas fa-beer"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-behance"><i
                                                                class="fab fa-behance"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-behance-square"><i
                                                                class="fab fa-behance-square"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-bell"
                                                                                                         data-search-terms="alert notification reminder "><i
                                                                class="fas fa-bell"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-bell"
                                                                                               data-search-terms="alert notification reminder "><i
                                                                class="far fa-bell"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-bell-slash"><i
                                                                class="fas fa-bell-slash"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-bell-slash"><i
                                                                class="far fa-bell-slash"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-bezier-curve"
                                                                                                     data-search-terms="curves illustrator lines path vector "><i
                                                                class="fas fa-bezier-curve"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-bicycle"
                                                                                                       data-search-terms="bike gears transportation vehicle "><i
                                                                class="fas fa-bicycle"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-bimobject"><i
                                                                class="fab fa-bimobject"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-binoculars"><i
                                                                class="fas fa-binoculars"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-birthday-cake"><i
                                                                class="fas fa-birthday-cake"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-bitbucket"
                                                                                                        data-search-terms="bitbucket-square git "><i
                                                                class="fab fa-bitbucket"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-bitcoin"><i
                                                                class="fab fa-bitcoin"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-bity"><i
                                                                class="fab fa-bity"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-black-tie"><i
                                                                class="fab fa-black-tie"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-blackberry"><i
                                                                class="fab fa-blackberry"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-blender"><i
                                                                class="fas fa-blender"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-blind"><i
                                                                class="fas fa-blind"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-blogger"><i
                                                                class="fab fa-blogger"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-blogger-b"><i
                                                                class="fab fa-blogger-b"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-bluetooth"><i
                                                                class="fab fa-bluetooth"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-bluetooth-b"><i
                                                                class="fab fa-bluetooth-b"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-bold"><i
                                                                class="fas fa-bold"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-bolt"
                                                                                               data-search-terms="electricity lightning weather zap "><i
                                                                class="fas fa-bolt"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-bomb"><i
                                                                class="fas fa-bomb"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-bong"
                                                                                               data-search-terms="aparatus cannabis marijuana pipe smoke smoking "><i
                                                                class="fas fa-bong"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-book"
                                                                                               data-search-terms="documentation read "><i
                                                                class="fas fa-book"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-book-open"
                                                                                               data-search-terms="flyer notebook open book pamphlet reading "><i
                                                                class="fas fa-book-open"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-bookmark"
                                                                                                    data-search-terms="save "><i
                                                                class="fas fa-bookmark"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-bookmark"
                                                                                                   data-search-terms="save "><i
                                                                class="far fa-bookmark"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-bowling-ball"><i
                                                                class="fas fa-bowling-ball"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-box"
                                                                                                       data-search-terms="package "><i
                                                                class="fas fa-box"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-box-open"><i
                                                                class="fas fa-box-open"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-boxes"><i
                                                                class="fas fa-boxes"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-braille"><i
                                                                class="fas fa-braille"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-briefcase"
                                                                                                  data-search-terms="bag business luggage office work "><i
                                                                class="fas fa-briefcase"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-briefcase-medical"
                                                                                                    data-search-terms="health briefcase "><i
                                                                class="fas fa-briefcase-medical"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-broadcast-tower"
                                                            data-search-terms="airwaves radio waves "><i
                                                                class="fas fa-broadcast-tower"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-broom"><i
                                                                class="fas fa-broom"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-brush"
                                                                                                data-search-terms="bristles color handle painting "><i
                                                                class="fas fa-brush"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-btc"><i
                                                                class="fab fa-btc"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-bug"
                                                                                              data-search-terms="insect report "><i
                                                                class="fas fa-bug"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-building"
                                                                                              data-search-terms="apartment business company office work "><i
                                                                class="fas fa-building"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-building"
                                                                                                   data-search-terms="apartment business company office work "><i
                                                                class="far fa-building"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-bullhorn"
                                                                                                   data-search-terms="announcement broadcast louder megaphone share "><i
                                                                class="fas fa-bullhorn"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-bullseye"
                                                                                                   data-search-terms="target "><i
                                                                class="fas fa-bullseye"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-burn"
                                                                                                   data-search-terms="energy "><i
                                                                class="fas fa-burn"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-buromobelexperte"><i
                                                                class="fab fa-buromobelexperte"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-bus"
                                                                                                           data-search-terms="machine public transportation transportation vehicle "><i
                                                                class="fas fa-bus"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-bus-alt"
                                                                                              data-search-terms="machine public transportation transportation vehicle "><i
                                                                class="fas fa-bus-alt"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-buysellads"><i
                                                                class="fab fa-buysellads"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-calculator"><i
                                                                class="fas fa-calculator"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-calendar"
                                                                                                     data-search-terms="calendar-o date event schedule time when "><i
                                                                class="fas fa-calendar"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-calendar"
                                                                                                   data-search-terms="calendar-o date event schedule time when "><i
                                                                class="far fa-calendar"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-calendar-alt"
                                                                                                   data-search-terms="calendar date event schedule time when "><i
                                                                class="fas fa-calendar-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-calendar-alt"
                                                                                                       data-search-terms="calendar date event schedule time when "><i
                                                                class="far fa-calendar-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-calendar-check"
                                                                                                       data-search-terms="accept agree appointment confirm correct done ok select success todo "><i
                                                                class="fas fa-calendar-check"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-calendar-check"
                                                                                                         data-search-terms="accept agree appointment confirm correct done ok select success todo "><i
                                                                class="far fa-calendar-check"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-calendar-minus"><i
                                                                class="fas fa-calendar-minus"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-calendar-minus"><i
                                                                class="far fa-calendar-minus"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-calendar-plus"><i
                                                                class="fas fa-calendar-plus"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".far fa-calendar-plus"><i
                                                                class="far fa-calendar-plus"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-calendar-times"><i
                                                                class="fas fa-calendar-times"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-calendar-times"><i
                                                                class="far fa-calendar-times"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-camera"
                                                                                                         data-search-terms="photo picture record "><i
                                                                class="fas fa-camera"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-camera-retro"
                                                                                                 data-search-terms="photo picture record "><i
                                                                class="fas fa-camera-retro"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-cannabis"
                                                                                                       data-search-terms="bud chronic drugs endica endo ganja marijuana mary jane pot reefer sativa spliff weed whacky-tabacky "><i
                                                                class="fas fa-cannabis"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-capsules"
                                                                                                   data-search-terms="drugs medicine "><i
                                                                class="fas fa-capsules"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item iconpicker-selected bg-primary"
                                                                                                   title=".fas fa-car"
                                                                                                   data-search-terms="machine transportation vehicle "><i
                                                                class="fas fa-car"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-caret-down"
                                                                                              data-search-terms="arrow dropdown menu more triangle down "><i
                                                                class="fas fa-caret-down"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-caret-left"
                                                                                                     data-search-terms="arrow back previous triangle left "><i
                                                                class="fas fa-caret-left"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-caret-right"
                                                                                                     data-search-terms="arrow forward next triangle right "><i
                                                                class="fas fa-caret-right"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-caret-square-down"
                                                                                                      data-search-terms="caret-square-o-down dropdown menu more "><i
                                                                class="fas fa-caret-square-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-caret-square-down"
                                                            data-search-terms="caret-square-o-down dropdown menu more "><i
                                                                class="far fa-caret-square-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-caret-square-left"
                                                            data-search-terms="back caret-square-o-left previous "><i
                                                                class="fas fa-caret-square-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-caret-square-left"
                                                            data-search-terms="back caret-square-o-left previous "><i
                                                                class="far fa-caret-square-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-caret-square-right"
                                                            data-search-terms="caret-square-o-right forward next "><i
                                                                class="fas fa-caret-square-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-caret-square-right"
                                                            data-search-terms="caret-square-o-right forward next "><i
                                                                class="far fa-caret-square-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-caret-square-up"
                                                            data-search-terms="caret-square-o-up "><i
                                                                class="fas fa-caret-square-up"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-caret-square-up"
                                                                                                          data-search-terms="caret-square-o-up "><i
                                                                class="far fa-caret-square-up"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-caret-up"
                                                                                                          data-search-terms="arrow triangle up "><i
                                                                class="fas fa-caret-up"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-cart-arrow-down"
                                                                                                   data-search-terms="shopping "><i
                                                                class="fas fa-cart-arrow-down"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-cart-plus"
                                                                                                          data-search-terms="add shopping "><i
                                                                class="fas fa-cart-plus"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-cc-amazon-pay"><i
                                                                class="fab fa-cc-amazon-pay"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-cc-amex"
                                                                                                        data-search-terms="amex "><i
                                                                class="fab fa-cc-amex"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-cc-apple-pay"><i
                                                                class="fab fa-cc-apple-pay"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-cc-diners-club"><i
                                                                class="fab fa-cc-diners-club"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-cc-discover"><i
                                                                class="fab fa-cc-discover"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-cc-jcb"><i
                                                                class="fab fa-cc-jcb"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-cc-mastercard"><i
                                                                class="fab fa-cc-mastercard"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-cc-paypal"><i
                                                                class="fab fa-cc-paypal"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-cc-stripe"><i
                                                                class="fab fa-cc-stripe"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-cc-visa"><i
                                                                class="fab fa-cc-visa"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-centercode"><i
                                                                class="fab fa-centercode"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-certificate"
                                                                                                     data-search-terms="badge star "><i
                                                                class="fas fa-certificate"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-chalkboard"
                                                                                                      data-search-terms="blackboard learning school teaching whiteboard writing "><i
                                                                class="fas fa-chalkboard"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chalkboard-teacher"
                                                                                                     data-search-terms="blackboard instructor learning professor school whiteboard writing "><i
                                                                class="fas fa-chalkboard-teacher"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-chart-area"
                                                            data-search-terms="analytics area-chart graph "><i
                                                                class="fas fa-chart-area"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chart-bar"
                                                                                                     data-search-terms="analytics bar-chart graph "><i
                                                                class="fas fa-chart-bar"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-chart-bar"
                                                                                                    data-search-terms="analytics bar-chart graph "><i
                                                                class="far fa-chart-bar"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-chart-line"
                                                                                                    data-search-terms="activity analytics dashboard graph line-chart "><i
                                                                class="fas fa-chart-line"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chart-pie"
                                                                                                     data-search-terms="analytics graph pie-chart "><i
                                                                class="fas fa-chart-pie"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-check"
                                                                                                    data-search-terms="accept agree checkmark confirm correct done notice notification notify ok select success tick todo yes "><i
                                                                class="fas fa-check"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-check-circle"
                                                                                                data-search-terms="accept agree confirm correct done ok select success todo yes "><i
                                                                class="fas fa-check-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-check-circle"
                                                                                                       data-search-terms="accept agree confirm correct done ok select success todo yes "><i
                                                                class="far fa-check-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-check-double"
                                                                                                       data-search-terms="accept agree checkmark confirm correct done notice notification notify ok select success tick todo "><i
                                                                class="fas fa-check-double"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-check-square"
                                                                                                       data-search-terms="accept agree checkmark confirm correct done ok select success todo yes "><i
                                                                class="fas fa-check-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-check-square"
                                                                                                       data-search-terms="accept agree checkmark confirm correct done ok select success todo yes "><i
                                                                class="far fa-check-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-chess"><i
                                                                class="fas fa-chess"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-chess-bishop"><i
                                                                class="fas fa-chess-bishop"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-chess-board"><i
                                                                class="fas fa-chess-board"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-chess-king"><i
                                                                class="fas fa-chess-king"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chess-knight"><i
                                                                class="fas fa-chess-knight"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-chess-pawn"><i
                                                                class="fas fa-chess-pawn"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chess-queen"><i
                                                                class="fas fa-chess-queen"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-chess-rook"><i
                                                                class="fas fa-chess-rook"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-chevron-circle-down"
                                                                                                     data-search-terms="arrow dropdown menu more "><i
                                                                class="fas fa-chevron-circle-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-chevron-circle-left"
                                                            data-search-terms="arrow back previous "><i
                                                                class="fas fa-chevron-circle-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-chevron-circle-right"
                                                            data-search-terms="arrow forward next "><i
                                                                class="fas fa-chevron-circle-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-chevron-circle-up"
                                                            data-search-terms="arrow "><i
                                                                class="fas fa-chevron-circle-up"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-chevron-down"><i
                                                                class="fas fa-chevron-down"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-chevron-left"
                                                                                                       data-search-terms="back bracket previous "><i
                                                                class="fas fa-chevron-left"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-chevron-right"
                                                                                                       data-search-terms="bracket forward next "><i
                                                                class="fas fa-chevron-right"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-chevron-up"><i
                                                                class="fas fa-chevron-up"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-child"><i
                                                                class="fas fa-child"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-chrome"
                                                                                                data-search-terms="browser "><i
                                                                class="fab fa-chrome"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-church"
                                                                                                 data-search-terms="building community religion "><i
                                                                class="fas fa-church"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-circle"
                                                                                                 data-search-terms="circle-thin dot notification "><i
                                                                class="fas fa-circle"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".far fa-circle"
                                                                                                 data-search-terms="circle-thin dot notification "><i
                                                                class="far fa-circle"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-circle-notch"
                                                                                                 data-search-terms="circle-o-notch "><i
                                                                class="fas fa-circle-notch"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-clipboard"
                                                                                                       data-search-terms="paste "><i
                                                                class="fas fa-clipboard"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-clipboard"
                                                                                                    data-search-terms="paste "><i
                                                                class="far fa-clipboard"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-clipboard-check"
                                                                                                    data-search-terms="accept agree confirm done ok select success todo yes "><i
                                                                class="fas fa-clipboard-check"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-clipboard-list"
                                                                                                          data-search-terms="checklist completed done finished intinerary ol schedule todo ul "><i
                                                                class="fas fa-clipboard-list"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-clock"
                                                                                                         data-search-terms="date late schedule timer timestamp watch "><i
                                                                class="fas fa-clock"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-clock"
                                                                                                data-search-terms="date late schedule timer timestamp watch "><i
                                                                class="far fa-clock"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-clone"
                                                                                                data-search-terms="copy duplicate "><i
                                                                class="fas fa-clone"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-clone"
                                                                                                data-search-terms="copy duplicate "><i
                                                                class="far fa-clone"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-closed-captioning"
                                                                                                data-search-terms="cc "><i
                                                                class="fas fa-closed-captioning"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-closed-captioning" data-search-terms="cc "><i
                                                                class="far fa-closed-captioning"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-cloud" data-search-terms="save "><i
                                                                class="fas fa-cloud"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-cloud-download-alt"
                                                                                                data-search-terms="cloud-download "><i
                                                                class="fas fa-cloud-download-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-cloud-upload-alt"
                                                            data-search-terms="cloud-upload "><i
                                                                class="fas fa-cloud-upload-alt"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-cloudscale"><i
                                                                class="fab fa-cloudscale"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-cloudsmith"><i
                                                                class="fab fa-cloudsmith"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-cloudversify"><i
                                                                class="fab fa-cloudversify"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-cocktail"
                                                                                                       data-search-terms="alcohol drink "><i
                                                                class="fas fa-cocktail"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-code"
                                                                                                   data-search-terms="brackets html "><i
                                                                class="fas fa-code"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-code-branch"
                                                                                               data-search-terms="branch code-fork fork git github rebase svn vcs version "><i
                                                                class="fas fa-code-branch"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-codepen"><i
                                                                class="fab fa-codepen"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-codiepie"><i
                                                                class="fab fa-codiepie"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-coffee"
                                                                                                   data-search-terms="breakfast cafe drink morning mug tea "><i
                                                                class="fas fa-coffee"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-cog"
                                                                                                 data-search-terms="settings "><i
                                                                class="fas fa-cog"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-cogs"
                                                                                              data-search-terms="gears settings "><i
                                                                class="fas fa-cogs"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-coins"><i
                                                                class="fas fa-coins"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-columns"
                                                                                                data-search-terms="dashboard panes split "><i
                                                                class="fas fa-columns"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-comment"
                                                                                                  data-search-terms="bubble chat conversation feedback message note notification sms speech texting "><i
                                                                class="fas fa-comment"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-comment"
                                                                                                  data-search-terms="bubble chat conversation feedback message note notification sms speech texting "><i
                                                                class="far fa-comment"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-comment-alt"
                                                                                                  data-search-terms="bubble chat commenting commenting conversation feedback message note notification sms speech texting "><i
                                                                class="fas fa-comment-alt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-comment-alt"
                                                                                                      data-search-terms="bubble chat commenting commenting conversation feedback message note notification sms speech texting "><i
                                                                class="far fa-comment-alt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-comment-dots"><i
                                                                class="fas fa-comment-dots"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-comment-dots"><i
                                                                class="far fa-comment-dots"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-comment-slash"><i
                                                                class="fas fa-comment-slash"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-comments"
                                                                                                        data-search-terms="bubble chat conversation feedback message note notification sms speech texting "><i
                                                                class="fas fa-comments"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-comments"
                                                                                                   data-search-terms="bubble chat conversation feedback message note notification sms speech texting "><i
                                                                class="far fa-comments"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-compact-disc"
                                                                                                   data-search-terms="bluray cd disc media "><i
                                                                class="fas fa-compact-disc"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-compass"
                                                                                                       data-search-terms="directory location menu safari "><i
                                                                class="fas fa-compass"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-compass"
                                                                                                  data-search-terms="directory location menu safari "><i
                                                                class="far fa-compass"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-compress"
                                                                                                  data-search-terms="collapse combine contract merge smaller "><i
                                                                class="fas fa-compress"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-concierge-bell"
                                                                                                   data-search-terms="attention hotel service support "><i
                                                                class="fas fa-concierge-bell"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-connectdevelop"><i
                                                                class="fab fa-connectdevelop"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-contao"><i
                                                                class="fab fa-contao"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-cookie"
                                                                                                 data-search-terms="baked good chips food snack sweet treat "><i
                                                                class="fas fa-cookie"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-cookie-bite"
                                                                                                 data-search-terms="baked good bitten chips eating food snack sweet treat "><i
                                                                class="fas fa-cookie-bite"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-copy"
                                                                                                      data-search-terms="clone duplicate file files-o "><i
                                                                class="fas fa-copy"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-copy"
                                                                                               data-search-terms="clone duplicate file files-o "><i
                                                                class="far fa-copy"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-copyright"><i
                                                                class="fas fa-copyright"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-copyright"><i
                                                                class="far fa-copyright"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-couch"><i
                                                                class="fas fa-couch"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-cpanel"><i
                                                                class="fab fa-cpanel"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-creative-commons"><i
                                                                class="fab fa-creative-commons"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-creative-commons-by"><i
                                                                class="fab fa-creative-commons-by"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-nc"><i
                                                                class="fab fa-creative-commons-nc"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-nc-eu"><i
                                                                class="fab fa-creative-commons-nc-eu"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-nc-jp"><i
                                                                class="fab fa-creative-commons-nc-jp"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-nd"><i
                                                                class="fab fa-creative-commons-nd"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-pd"><i
                                                                class="fab fa-creative-commons-pd"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-pd-alt"><i
                                                                class="fab fa-creative-commons-pd-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-remix"><i
                                                                class="fab fa-creative-commons-remix"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-sa"><i
                                                                class="fab fa-creative-commons-sa"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-sampling"><i
                                                                class="fab fa-creative-commons-sampling"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-sampling-plus"><i
                                                                class="fab fa-creative-commons-sampling-plus"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-creative-commons-share"><i
                                                                class="fab fa-creative-commons-share"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-credit-card"
                                                            data-search-terms="buy checkout credit-card-alt debit money payment purchase "><i
                                                                class="fas fa-credit-card"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-credit-card"
                                                                                                      data-search-terms="buy checkout credit-card-alt debit money payment purchase "><i
                                                                class="far fa-credit-card"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-crop"
                                                                                                      data-search-terms="design "><i
                                                                class="fas fa-crop"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-crop-alt"><i
                                                                class="fas fa-crop-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-crosshairs"
                                                                                                   data-search-terms="gpd picker position "><i
                                                                class="fas fa-crosshairs"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-crow"
                                                                                                     data-search-terms="bird bullfrog toad "><i
                                                                class="fas fa-crow"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-crown"><i
                                                                class="fas fa-crown"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-css3"
                                                                                                data-search-terms="code "><i
                                                                class="fab fa-css3"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-css3-alt"><i
                                                                class="fab fa-css3-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-cube"
                                                                                                   data-search-terms="package "><i
                                                                class="fas fa-cube"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-cubes"
                                                                                               data-search-terms="packages "><i
                                                                class="fas fa-cubes"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-cut"
                                                                                                data-search-terms="scissors scissors "><i
                                                                class="fas fa-cut"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-cuttlefish"><i
                                                                class="fab fa-cuttlefish"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-d-and-d"><i
                                                                class="fab fa-d-and-d"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-dashcube"><i
                                                                class="fab fa-dashcube"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-database"><i
                                                                class="fas fa-database"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-deaf"><i
                                                                class="fas fa-deaf"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-delicious"><i
                                                                class="fab fa-delicious"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-deploydog"><i
                                                                class="fab fa-deploydog"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-deskpro"><i
                                                                class="fab fa-deskpro"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-desktop"
                                                                                                  data-search-terms="computer cpu demo desktop device machine monitor pc screen "><i
                                                                class="fas fa-desktop"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-deviantart"><i
                                                                class="fab fa-deviantart"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-diagnoses"><i
                                                                class="fas fa-diagnoses"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-dice"
                                                                                                    data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-dice-five"
                                                                                               data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-five"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-dice-four"
                                                                                                    data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-four"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-dice-one"
                                                                                                    data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-one"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-dice-six"
                                                                                                   data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-six"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-dice-three"
                                                                                                   data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-three"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-dice-two"
                                                                                                     data-search-terms="chance gambling game roll "><i
                                                                class="fas fa-dice-two"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-digg"><i
                                                                class="fab fa-digg"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-digital-ocean"><i
                                                                class="fab fa-digital-ocean"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-digital-tachograph"><i
                                                                class="fas fa-digital-tachograph"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-discord"><i class="fab fa-discord"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-discourse"><i
                                                                class="fab fa-discourse"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-divide"><i
                                                                class="fas fa-divide"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-dizzy"
                                                                                                 data-search-terms="dazed disapprove emoticon face "><i
                                                                class="fas fa-dizzy"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-dizzy"
                                                                                                data-search-terms="dazed disapprove emoticon face "><i
                                                                class="far fa-dizzy"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-dna"
                                                                                                data-search-terms="double helix helix "><i
                                                                class="fas fa-dna"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-dochub"><i
                                                                class="fab fa-dochub"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-docker"><i
                                                                class="fab fa-docker"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-dollar-sign"
                                                                                                 data-search-terms="$ dollar-sign money price usd "><i
                                                                class="fas fa-dollar-sign"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-dolly"><i
                                                                class="fas fa-dolly"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-dolly-flatbed"><i
                                                                class="fas fa-dolly-flatbed"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-donate"
                                                                                                        data-search-terms="generosity give "><i
                                                                class="fas fa-donate"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-door-closed"><i
                                                                class="fas fa-door-closed"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-door-open"><i
                                                                class="fas fa-door-open"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-dot-circle"
                                                                                                    data-search-terms="bullseye notification target "><i
                                                                class="fas fa-dot-circle"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-dot-circle"
                                                                                                     data-search-terms="bullseye notification target "><i
                                                                class="far fa-dot-circle"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-dove"><i
                                                                class="fas fa-dove"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-download"
                                                                                               data-search-terms="import "><i
                                                                class="fas fa-download"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-draft2digital"><i
                                                                class="fab fa-draft2digital"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-drafting-compass"
                                                                                                        data-search-terms="mechanical drawing plot plotting "><i
                                                                class="fas fa-drafting-compass"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-dribbble"><i
                                                                class="fab fa-dribbble"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-dribbble-square"><i
                                                                class="fab fa-dribbble-square"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-dropbox"><i
                                                                class="fab fa-dropbox"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-drum"
                                                                                                  data-search-terms="instrument music percussion snare sound "><i
                                                                class="fas fa-drum"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-drum-steelpan"
                                                                                               data-search-terms="calypso instrument music percussion reggae snare sound steel tropical "><i
                                                                class="fas fa-drum-steelpan"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-drupal"><i
                                                                class="fab fa-drupal"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-dumbbell"
                                                                                                 data-search-terms="exercise gym strength weight weight-lifting "><i
                                                                class="fas fa-dumbbell"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-dyalog"><i
                                                                class="fab fa-dyalog"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-earlybirds"><i
                                                                class="fab fa-earlybirds"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-ebay"><i
                                                                class="fab fa-ebay"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-edge"
                                                                                               data-search-terms="browser ie "><i
                                                                class="fab fa-edge"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-edit"
                                                                                               data-search-terms="edit pen pencil update write "><i
                                                                class="fas fa-edit"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-edit"
                                                                                               data-search-terms="edit pen pencil update write "><i
                                                                class="far fa-edit"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-eject"><i
                                                                class="fas fa-eject"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-elementor"><i
                                                                class="fab fa-elementor"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-ellipsis-h"
                                                                                                    data-search-terms="dots drag kebab list menu nav navigation ol reorder settings ul "><i
                                                                class="fas fa-ellipsis-h"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-ellipsis-v"
                                                                                                     data-search-terms="dots drag kebab list menu nav navigation ol reorder settings ul "><i
                                                                class="fas fa-ellipsis-v"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-ember"><i
                                                                class="fab fa-ember"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-empire"><i
                                                                class="fab fa-empire"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-envelope"
                                                                                                 data-search-terms="e-mail email letter mail message notification support "><i
                                                                class="fas fa-envelope"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-envelope"
                                                                                                   data-search-terms="e-mail email letter mail message notification support "><i
                                                                class="far fa-envelope"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-envelope-open"
                                                                                                   data-search-terms="e-mail email letter mail message notification support "><i
                                                                class="fas fa-envelope-open"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".far fa-envelope-open"
                                                                                                        data-search-terms="e-mail email letter mail message notification support "><i
                                                                class="far fa-envelope-open"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-envelope-square"
                                                                                                        data-search-terms="e-mail email letter mail message notification support "><i
                                                                class="fas fa-envelope-square"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-envira"
                                                                                                          data-search-terms="leaf "><i
                                                                class="fab fa-envira"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-equals"><i
                                                                class="fas fa-equals"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-eraser"
                                                                                                 data-search-terms="delete remove "><i
                                                                class="fas fa-eraser"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-erlang"><i
                                                                class="fab fa-erlang"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-ethereum"><i
                                                                class="fab fa-ethereum"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-etsy"><i
                                                                class="fab fa-etsy"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-euro-sign"
                                                                                               data-search-terms="eur eur "><i
                                                                class="fas fa-euro-sign"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-exchange-alt"
                                                                                                    data-search-terms="arrow arrows exchange reciprocate return swap transfer "><i
                                                                class="fas fa-exchange-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-exclamation"
                                                                                                       data-search-terms="alert danger error important notice notification notify problem warning "><i
                                                                class="fas fa-exclamation"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-exclamation-circle"
                                                                                                      data-search-terms="alert danger error important notice notification notify problem warning "><i
                                                                class="fas fa-exclamation-circle"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-exclamation-triangle"
                                                            data-search-terms="alert danger error important notice notification notify problem warning "><i
                                                                class="fas fa-exclamation-triangle"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-expand"
                                                            data-search-terms="bigger enlarge resize "><i
                                                                class="fas fa-expand"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-expand-arrows-alt"
                                                                                                 data-search-terms="arrows-alt bigger enlarge move resize "><i
                                                                class="fas fa-expand-arrows-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-expeditedssl"><i
                                                                class="fab fa-expeditedssl"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-external-link-alt"
                                                                                                       data-search-terms="external-link new open "><i
                                                                class="fas fa-external-link-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-external-link-square-alt"
                                                            data-search-terms="external-link-square new open "><i
                                                                class="fas fa-external-link-square-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-eye"
                                                            data-search-terms="optic see seen show sight views visible "><i
                                                                class="fas fa-eye"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-eye"
                                                                                              data-search-terms="optic see seen show sight views visible "><i
                                                                class="far fa-eye"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-eye-dropper"
                                                                                              data-search-terms="eyedropper "><i
                                                                class="fas fa-eye-dropper"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-eye-slash"
                                                                                                      data-search-terms="blind hide show toggle unseen views visible visiblity "><i
                                                                class="fas fa-eye-slash"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-eye-slash"
                                                                                                    data-search-terms="blind hide show toggle unseen views visible visiblity "><i
                                                                class="far fa-eye-slash"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-facebook"
                                                                                                    data-search-terms="facebook-official social network "><i
                                                                class="fab fa-facebook"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-facebook-f"
                                                                                                   data-search-terms="facebook "><i
                                                                class="fab fa-facebook-f"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-facebook-messenger"><i
                                                                class="fab fa-facebook-messenger"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-facebook-square"
                                                            data-search-terms="social network "><i
                                                                class="fab fa-facebook-square"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-fast-backward"
                                                                                                          data-search-terms="beginning first previous rewind start "><i
                                                                class="fas fa-fast-backward"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-fast-forward"
                                                                                                        data-search-terms="end last next "><i
                                                                class="fas fa-fast-forward"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-fax"><i
                                                                class="fas fa-fax"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-feather"
                                                                                              data-search-terms="bird light plucked quill "><i
                                                                class="fas fa-feather"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-feather-alt"
                                                                                                  data-search-terms="bird light plucked quill "><i
                                                                class="fas fa-feather-alt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-female"
                                                                                                      data-search-terms="human person profile user woman "><i
                                                                class="fas fa-female"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-fighter-jet"
                                                                                                 data-search-terms="airplane fast fly goose maverick plane quick top gun transportation travel "><i
                                                                class="fas fa-fighter-jet"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-file"
                                                                                                      data-search-terms="document new page pdf resume "><i
                                                                class="fas fa-file"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-file"
                                                                                               data-search-terms="document new page pdf resume "><i
                                                                class="far fa-file"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-file-alt"
                                                                                               data-search-terms="document file-text invoice new page pdf "><i
                                                                class="fas fa-file-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-file-alt"
                                                                                                   data-search-terms="document file-text invoice new page pdf "><i
                                                                class="far fa-file-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-file-archive"
                                                                                                   data-search-terms=".zip bundle compress compression download zip "><i
                                                                class="fas fa-file-archive"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-file-archive"
                                                                                                       data-search-terms=".zip bundle compress compression download zip "><i
                                                                class="far fa-file-archive"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-file-audio"><i
                                                                class="fas fa-file-audio"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-file-audio"><i
                                                                class="far fa-file-audio"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-file-code"><i
                                                                class="fas fa-file-code"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-file-code"><i
                                                                class="far fa-file-code"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-file-contract"
                                                                                                    data-search-terms="agreement binding document legal signature "><i
                                                                class="fas fa-file-contract"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-file-download"><i
                                                                class="fas fa-file-download"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-file-excel"><i
                                                                class="fas fa-file-excel"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-file-excel"><i
                                                                class="far fa-file-excel"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-file-export"><i
                                                                class="fas fa-file-export"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-file-image"><i
                                                                class="fas fa-file-image"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-file-image"><i
                                                                class="far fa-file-image"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-file-import"><i
                                                                class="fas fa-file-import"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-file-invoice"
                                                                                                      data-search-terms="bill document receipt "><i
                                                                class="fas fa-file-invoice"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-file-invoice-dollar"
                                                                                                       data-search-terms="$ bill document dollar-sign money receipt usd "><i
                                                                class="fas fa-file-invoice-dollar"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-file-medical"><i
                                                                class="fas fa-file-medical"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-file-medical-alt"><i
                                                                class="fas fa-file-medical-alt"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-file-pdf"><i
                                                                class="fas fa-file-pdf"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-file-pdf"><i
                                                                class="far fa-file-pdf"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-file-powerpoint"><i
                                                                class="fas fa-file-powerpoint"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-file-powerpoint"><i
                                                                class="far fa-file-powerpoint"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-file-prescription"
                                                                                                          data-search-terms="drugs medical medicine rx "><i
                                                                class="fas fa-file-prescription"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-file-signature"
                                                            data-search-terms="John Hancock contract document name "><i
                                                                class="fas fa-file-signature"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-file-upload"><i
                                                                class="fas fa-file-upload"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-file-video"><i
                                                                class="fas fa-file-video"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-file-video"><i
                                                                class="far fa-file-video"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-file-word"><i
                                                                class="fas fa-file-word"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-file-word"><i
                                                                class="far fa-file-word"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-fill"
                                                                                                    data-search-terms="bucket color paint paint bucket "><i
                                                                class="fas fa-fill"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-fill-drip"
                                                                                               data-search-terms="bucket color drop paint paint bucket spill "><i
                                                                class="fas fa-fill-drip"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-film"
                                                                                                    data-search-terms="movie "><i
                                                                class="fas fa-film"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-filter"
                                                                                               data-search-terms="funnel options "><i
                                                                class="fas fa-filter"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-fingerprint"
                                                                                                 data-search-terms="human id identification lock smudge touch unique unlock "><i
                                                                class="fas fa-fingerprint"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-fire"
                                                                                                      data-search-terms="flame hot popular "><i
                                                                class="fas fa-fire"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-fire-extinguisher"><i
                                                                class="fas fa-fire-extinguisher"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-firefox" data-search-terms="browser "><i
                                                                class="fab fa-firefox"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-first-aid"><i
                                                                class="fas fa-first-aid"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-first-order"><i
                                                                class="fab fa-first-order"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-first-order-alt"><i
                                                                class="fab fa-first-order-alt"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-firstdraft"><i
                                                                class="fab fa-firstdraft"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-fish"><i
                                                                class="fas fa-fish"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-flag"
                                                                                               data-search-terms="notice notification notify report "><i
                                                                class="fas fa-flag"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-flag"
                                                                                               data-search-terms="notice notification notify report "><i
                                                                class="far fa-flag"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-flag-checkered"
                                                                                               data-search-terms="notice notification notify report "><i
                                                                class="fas fa-flag-checkered"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-flask"
                                                                                                         data-search-terms="beaker experimental labs science "><i
                                                                class="fas fa-flask"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-flickr"><i
                                                                class="fab fa-flickr"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-flipboard"><i
                                                                class="fab fa-flipboard"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-flushed"
                                                                                                    data-search-terms="embarrassed emoticon face "><i
                                                                class="fas fa-flushed"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-flushed"
                                                                                                  data-search-terms="embarrassed emoticon face "><i
                                                                class="far fa-flushed"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-fly"><i
                                                                class="fab fa-fly"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-folder"><i
                                                                class="fas fa-folder"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".far fa-folder"><i
                                                                class="far fa-folder"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-folder-open"><i
                                                                class="fas fa-folder-open"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-folder-open"><i
                                                                class="far fa-folder-open"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-font"
                                                                                                      data-search-terms="text "><i
                                                                class="fas fa-font"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-font-awesome"
                                                                                               data-search-terms="meanpath "><i
                                                                class="fab fa-font-awesome"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-font-awesome-alt"><i
                                                                class="fab fa-font-awesome-alt"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-font-awesome-flag"><i
                                                                class="fab fa-font-awesome-flag"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-font-awesome-logo-full"><i
                                                                class="far fa-font-awesome-logo-full"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-font-awesome-logo-full"><i
                                                                class="fas fa-font-awesome-logo-full"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-font-awesome-logo-full"><i
                                                                class="fab fa-font-awesome-logo-full"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-fonticons"><i
                                                                class="fab fa-fonticons"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-fonticons-fi"><i
                                                                class="fab fa-fonticons-fi"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-football-ball"><i
                                                                class="fas fa-football-ball"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-fort-awesome"
                                                                                                        data-search-terms="castle "><i
                                                                class="fab fa-fort-awesome"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-fort-awesome-alt"
                                                                                                       data-search-terms="castle "><i
                                                                class="fab fa-fort-awesome-alt"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-forumbee"><i
                                                                class="fab fa-forumbee"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-forward"
                                                                                                   data-search-terms="forward next "><i
                                                                class="fas fa-forward"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-foursquare"><i
                                                                class="fab fa-foursquare"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-free-code-camp"><i
                                                                class="fab fa-free-code-camp"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-freebsd"><i
                                                                class="fab fa-freebsd"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-frog"
                                                                                                  data-search-terms="bullfrog kermit kiss prince toad wart "><i
                                                                class="fas fa-frog"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-frown"
                                                                                               data-search-terms="disapprove emoticon face rating sad "><i
                                                                class="fas fa-frown"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-frown"
                                                                                                data-search-terms="disapprove emoticon face rating sad "><i
                                                                class="far fa-frown"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-frown-open"
                                                                                                data-search-terms="disapprove emoticon face rating sad "><i
                                                                class="fas fa-frown-open"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-frown-open"
                                                                                                     data-search-terms="disapprove emoticon face rating sad "><i
                                                                class="far fa-frown-open"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-fulcrum"><i
                                                                class="fab fa-fulcrum"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-futbol"
                                                                                                  data-search-terms="ball football soccer "><i
                                                                class="fas fa-futbol"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".far fa-futbol"
                                                                                                 data-search-terms="ball football soccer "><i
                                                                class="far fa-futbol"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-galactic-republic"><i
                                                                class="fab fa-galactic-republic"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-galactic-senate"><i
                                                                class="fab fa-galactic-senate"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-gamepad"
                                                                                                          data-search-terms="controller "><i
                                                                class="fas fa-gamepad"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-gas-pump"><i
                                                                class="fas fa-gas-pump"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-gavel"
                                                                                                   data-search-terms="hammer judge lawyer opinion "><i
                                                                class="fas fa-gavel"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-gem"
                                                                                                data-search-terms="diamond "><i
                                                                class="fas fa-gem"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-gem"
                                                                                              data-search-terms="diamond "><i
                                                                class="far fa-gem"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-genderless"><i
                                                                class="fas fa-genderless"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-get-pocket"><i
                                                                class="fab fa-get-pocket"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-gg"><i
                                                                class="fab fa-gg"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fab fa-gg-circle"><i
                                                                class="fab fa-gg-circle"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-gift"
                                                                                                    data-search-terms="generosity giving party present wrapped "><i
                                                                class="fas fa-gift"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-git"><i
                                                                class="fab fa-git"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-git-square"><i
                                                                class="fab fa-git-square"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-github"
                                                                                                     data-search-terms="octocat "><i
                                                                class="fab fa-github"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-github-alt"
                                                                                                 data-search-terms="octocat "><i
                                                                class="fab fa-github-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-github-square"
                                                                                                     data-search-terms="octocat "><i
                                                                class="fab fa-github-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-gitkraken"><i
                                                                class="fab fa-gitkraken"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-gitlab"
                                                                                                    data-search-terms="Axosoft "><i
                                                                class="fab fa-gitlab"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-gitter"><i
                                                                class="fab fa-gitter"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-glass-martini"
                                                                                                 data-search-terms="alcohol bar drink glass liquor martini "><i
                                                                class="fas fa-glass-martini"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-glass-martini-alt"><i
                                                                class="fas fa-glass-martini-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-glasses"
                                                            data-search-terms="foureyes hipster nerd reading sight spectacles "><i
                                                                class="fas fa-glasses"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-glide"><i
                                                                class="fab fa-glide"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-glide-g"><i
                                                                class="fab fa-glide-g"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-globe"
                                                                                                  data-search-terms="all coordinates country earth global gps language localize location map online place planet translate travel world "><i
                                                                class="fas fa-globe"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-globe-africa"
                                                                                                data-search-terms="all country earth global gps language localize location map online place planet translate travel world "><i
                                                                class="fas fa-globe-africa"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-globe-americas"
                                                                                                       data-search-terms="all country earth global gps language localize location map online place planet translate travel world "><i
                                                                class="fas fa-globe-americas"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-globe-asia"
                                                                                                         data-search-terms="all country earth global gps language localize location map online place planet translate travel world "><i
                                                                class="fas fa-globe-asia"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-gofore"><i
                                                                class="fab fa-gofore"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-golf-ball"><i
                                                                class="fas fa-golf-ball"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-goodreads"><i
                                                                class="fab fa-goodreads"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-goodreads-g"><i
                                                                class="fab fa-goodreads-g"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-google"><i
                                                                class="fab fa-google"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-google-drive"><i
                                                                class="fab fa-google-drive"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-google-play"><i
                                                                class="fab fa-google-play"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-google-plus"
                                                                                                      data-search-terms="google-plus-circle google-plus-official "><i
                                                                class="fab fa-google-plus"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-google-plus-g"
                                                                                                      data-search-terms="google-plus social network "><i
                                                                class="fab fa-google-plus-g"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-google-plus-square"
                                                                                                        data-search-terms="social network "><i
                                                                class="fab fa-google-plus-square"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-google-wallet"><i
                                                                class="fab fa-google-wallet"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-graduation-cap"
                                                                                                        data-search-terms="learning school student "><i
                                                                class="fas fa-graduation-cap"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-gratipay"
                                                                                                         data-search-terms="favorite heart like love "><i
                                                                class="fab fa-gratipay"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-grav"><i
                                                                class="fab fa-grav"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-greater-than"><i
                                                                class="fas fa-greater-than"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-greater-than-equal"><i
                                                                class="fas fa-greater-than-equal"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-grimace"
                                                            data-search-terms="cringe emoticon face "><i
                                                                class="fas fa-grimace"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-grimace"
                                                                                                  data-search-terms="cringe emoticon face "><i
                                                                class="far fa-grimace"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-grin"
                                                                                                  data-search-terms="emoticon face laugh smile "><i
                                                                class="fas fa-grin"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-grin"
                                                                                               data-search-terms="emoticon face laugh smile "><i
                                                                class="far fa-grin"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-grin-alt"
                                                                                               data-search-terms="emoticon face laugh smile "><i
                                                                class="fas fa-grin-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-grin-alt"
                                                                                                   data-search-terms="emoticon face laugh smile "><i
                                                                class="far fa-grin-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-grin-beam"
                                                                                                   data-search-terms="emoticon face laugh smile "><i
                                                                class="fas fa-grin-beam"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-grin-beam"
                                                                                                    data-search-terms="emoticon face laugh smile "><i
                                                                class="far fa-grin-beam"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-grin-beam-sweat"
                                                                                                    data-search-terms="emoticon face smile "><i
                                                                class="fas fa-grin-beam-sweat"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-grin-beam-sweat"
                                                                                                          data-search-terms="emoticon face smile "><i
                                                                class="far fa-grin-beam-sweat"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-grin-hearts"
                                                                                                          data-search-terms="emoticon face love smile "><i
                                                                class="fas fa-grin-hearts"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-grin-hearts"
                                                                                                      data-search-terms="emoticon face love smile "><i
                                                                class="far fa-grin-hearts"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-grin-squint"
                                                                                                      data-search-terms="emoticon face laugh smile "><i
                                                                class="fas fa-grin-squint"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-grin-squint"
                                                                                                      data-search-terms="emoticon face laugh smile "><i
                                                                class="far fa-grin-squint"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-grin-squint-tears"
                                                                                                      data-search-terms="emoticon face happy smile "><i
                                                                class="fas fa-grin-squint-tears"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-grin-squint-tears"
                                                            data-search-terms="emoticon face happy smile "><i
                                                                class="far fa-grin-squint-tears"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-grin-stars"
                                                            data-search-terms="emoticon face star-struck "><i
                                                                class="fas fa-grin-stars"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-grin-stars"
                                                                                                     data-search-terms="emoticon face star-struck "><i
                                                                class="far fa-grin-stars"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-grin-tears"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-grin-tears"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-grin-tears"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="far fa-grin-tears"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-grin-tongue"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-grin-tongue"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-grin-tongue"
                                                                                                      data-search-terms="LOL emoticon face "><i
                                                                class="far fa-grin-tongue"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-grin-tongue-squint"
                                                                                                      data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-grin-tongue-squint"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".far fa-grin-tongue-squint"
                                                            data-search-terms="LOL emoticon face "><i
                                                                class="far fa-grin-tongue-squint"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-grin-tongue-wink"
                                                            data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-grin-tongue-wink"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".far fa-grin-tongue-wink"
                                                                                                           data-search-terms="LOL emoticon face "><i
                                                                class="far fa-grin-tongue-wink"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-grin-wink"
                                                                                                           data-search-terms="emoticon face flirt laugh smile "><i
                                                                class="fas fa-grin-wink"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-grin-wink"
                                                                                                    data-search-terms="emoticon face flirt laugh smile "><i
                                                                class="far fa-grin-wink"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-grip-horizontal"
                                                                                                    data-search-terms="affordance drag drop grab handle "><i
                                                                class="fas fa-grip-horizontal"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-grip-vertical"
                                                                                                          data-search-terms="affordance drag drop grab handle "><i
                                                                class="fas fa-grip-vertical"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-gripfire"><i
                                                                class="fab fa-gripfire"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-grunt"><i
                                                                class="fab fa-grunt"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-gulp"><i
                                                                class="fab fa-gulp"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-h-square"
                                                                                               data-search-terms="hospital hotel "><i
                                                                class="fas fa-h-square"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-hacker-news"><i
                                                                class="fab fa-hacker-news"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-hacker-news-square"><i
                                                                class="fab fa-hacker-news-square"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-hand-holding"><i
                                                                class="fas fa-hand-holding"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-hand-holding-heart"><i
                                                                class="fas fa-hand-holding-heart"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-hand-holding-usd"
                                                            data-search-terms="$ dollar sign donation giving money price "><i
                                                                class="fas fa-hand-holding-usd"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-hand-lizard"><i
                                                                class="fas fa-hand-lizard"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-hand-lizard"><i
                                                                class="far fa-hand-lizard"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-hand-paper"
                                                                                                      data-search-terms="stop "><i
                                                                class="fas fa-hand-paper"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-hand-paper"
                                                                                                     data-search-terms="stop "><i
                                                                class="far fa-hand-paper"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-hand-peace"><i
                                                                class="fas fa-hand-peace"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-hand-peace"><i
                                                                class="far fa-hand-peace"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-hand-point-down"
                                                                                                     data-search-terms="finger hand-o-down point "><i
                                                                class="fas fa-hand-point-down"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-hand-point-down"
                                                                                                          data-search-terms="finger hand-o-down point "><i
                                                                class="far fa-hand-point-down"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-hand-point-left"
                                                                                                          data-search-terms="back finger hand-o-left left point previous "><i
                                                                class="fas fa-hand-point-left"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-hand-point-left"
                                                                                                          data-search-terms="back finger hand-o-left left point previous "><i
                                                                class="far fa-hand-point-left"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-hand-point-right"
                                                                                                          data-search-terms="finger forward hand-o-right next point right "><i
                                                                class="fas fa-hand-point-right"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".far fa-hand-point-right"
                                                                                                           data-search-terms="finger forward hand-o-right next point right "><i
                                                                class="far fa-hand-point-right"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-hand-point-up"
                                                                                                           data-search-terms="finger hand-o-up point "><i
                                                                class="fas fa-hand-point-up"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".far fa-hand-point-up"
                                                                                                        data-search-terms="finger hand-o-up point "><i
                                                                class="far fa-hand-point-up"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-hand-pointer"
                                                                                                        data-search-terms="select "><i
                                                                class="fas fa-hand-pointer"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-hand-pointer"
                                                                                                       data-search-terms="select "><i
                                                                class="far fa-hand-pointer"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-hand-rock"><i
                                                                class="fas fa-hand-rock"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-hand-rock"><i
                                                                class="far fa-hand-rock"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-hand-scissors"><i
                                                                class="fas fa-hand-scissors"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".far fa-hand-scissors"><i
                                                                class="far fa-hand-scissors"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-hand-spock"><i
                                                                class="fas fa-hand-spock"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-hand-spock"><i
                                                                class="far fa-hand-spock"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-hands"><i
                                                                class="fas fa-hands"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-hands-helping"
                                                                                                data-search-terms="aid assistance partnership volunteering "><i
                                                                class="fas fa-hands-helping"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-handshake"
                                                                                                        data-search-terms="greeting partnership "><i
                                                                class="fas fa-handshake"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-handshake"
                                                                                                    data-search-terms="greeting partnership "><i
                                                                class="far fa-handshake"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-hashtag"><i
                                                                class="fas fa-hashtag"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-hdd"
                                                                                                  data-search-terms="cpu hard drive harddrive machine save storage "><i
                                                                class="fas fa-hdd"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-hdd"
                                                                                              data-search-terms="cpu hard drive harddrive machine save storage "><i
                                                                class="far fa-hdd"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-heading"
                                                                                              data-search-terms="header header "><i
                                                                class="fas fa-heading"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-headphones"
                                                                                                  data-search-terms="audio listen music sound speaker "><i
                                                                class="fas fa-headphones"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-headphones-alt"
                                                                                                     data-search-terms="audio listen music sound speaker "><i
                                                                class="fas fa-headphones-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-headset"
                                                                                                         data-search-terms="audio gamer gaming listen live chat microphone shot caller sound support telemarketer "><i
                                                                class="fas fa-headset"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-heart"
                                                                                                  data-search-terms="favorite like love "><i
                                                                class="fas fa-heart"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-heart"
                                                                                                data-search-terms="favorite like love "><i
                                                                class="far fa-heart"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-heartbeat"
                                                                                                data-search-terms="ekg lifeline vital signs "><i
                                                                class="fas fa-heartbeat"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-helicopter"
                                                                                                    data-search-terms="airwolf apache chopper flight fly "><i
                                                                class="fas fa-helicopter"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-highlighter"
                                                                                                     data-search-terms="edit marker sharpie update write "><i
                                                                class="fas fa-highlighter"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-hips"><i
                                                                class="fab fa-hips"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-hire-a-helper"><i
                                                                class="fab fa-hire-a-helper"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-history"><i
                                                                class="fas fa-history"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-hockey-puck"><i
                                                                class="fas fa-hockey-puck"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-home"
                                                                                                      data-search-terms="house main "><i
                                                                class="fas fa-home"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-hooli"><i
                                                                class="fab fa-hooli"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-hornbill"><i
                                                                class="fab fa-hornbill"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-hospital"
                                                                                                   data-search-terms="building emergency room medical center "><i
                                                                class="fas fa-hospital"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-hospital"
                                                                                                   data-search-terms="building emergency room medical center "><i
                                                                class="far fa-hospital"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-hospital-alt"
                                                                                                   data-search-terms="building emergency room medical center "><i
                                                                class="fas fa-hospital-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-hospital-symbol"><i
                                                                class="fas fa-hospital-symbol"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-hot-tub"><i
                                                                class="fas fa-hot-tub"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-hotel"
                                                                                                  data-search-terms="building lodging "><i
                                                                class="fas fa-hotel"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-hotjar"><i
                                                                class="fab fa-hotjar"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-hourglass"><i
                                                                class="fas fa-hourglass"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-hourglass"><i
                                                                class="far fa-hourglass"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-hourglass-end"><i
                                                                class="fas fa-hourglass-end"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-hourglass-half"><i
                                                                class="fas fa-hourglass-half"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-hourglass-start"><i
                                                                class="fas fa-hourglass-start"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-houzz"><i
                                                                class="fab fa-houzz"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-html5"><i
                                                                class="fab fa-html5"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-hubspot"><i
                                                                class="fab fa-hubspot"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-i-cursor"><i
                                                                class="fas fa-i-cursor"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-id-badge"><i
                                                                class="fas fa-id-badge"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-id-badge"><i
                                                                class="far fa-id-badge"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-id-card"
                                                                                                   data-search-terms="document identification issued "><i
                                                                class="fas fa-id-card"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-id-card"
                                                                                                  data-search-terms="document identification issued "><i
                                                                class="far fa-id-card"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-id-card-alt"
                                                                                                  data-search-terms="demographics "><i
                                                                class="fas fa-id-card-alt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-image"
                                                                                                      data-search-terms="album photo picture picture "><i
                                                                class="fas fa-image"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-image"
                                                                                                data-search-terms="album photo picture picture "><i
                                                                class="far fa-image"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-images"
                                                                                                data-search-terms="album photo picture "><i
                                                                class="fas fa-images"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".far fa-images"
                                                                                                 data-search-terms="album photo picture "><i
                                                                class="far fa-images"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-imdb"><i
                                                                class="fab fa-imdb"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-inbox"><i
                                                                class="fas fa-inbox"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-indent"><i
                                                                class="fas fa-indent"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-industry"
                                                                                                 data-search-terms="factory manufacturing "><i
                                                                class="fas fa-industry"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-infinity"><i
                                                                class="fas fa-infinity"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-info"
                                                                                                   data-search-terms="details help information more "><i
                                                                class="fas fa-info"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-info-circle"
                                                                                               data-search-terms="details help information more "><i
                                                                class="fas fa-info-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-instagram"><i
                                                                class="fab fa-instagram"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-internet-explorer"
                                                                                                    data-search-terms="browser ie "><i
                                                                class="fab fa-internet-explorer"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-ioxhost"><i class="fab fa-ioxhost"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-italic" data-search-terms="italics "><i
                                                                class="fas fa-italic"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-itunes"><i
                                                                class="fab fa-itunes"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-itunes-note"><i
                                                                class="fab fa-itunes-note"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-java"><i
                                                                class="fab fa-java"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-jedi-order"><i
                                                                class="fab fa-jedi-order"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-jenkins"><i
                                                                class="fab fa-jenkins"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-joget"><i
                                                                class="fab fa-joget"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-joint"
                                                                                                data-search-terms="blunt cannabis doobie drugs marijuana roach smoke smoking spliff "><i
                                                                class="fas fa-joint"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-joomla"><i
                                                                class="fab fa-joomla"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-js"><i
                                                                class="fab fa-js"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fab fa-js-square"><i
                                                                class="fab fa-js-square"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-jsfiddle"><i
                                                                class="fab fa-jsfiddle"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-key"
                                                                                                   data-search-terms="password unlock "><i
                                                                class="fas fa-key"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-keybase"><i
                                                                class="fab fa-keybase"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-keyboard"
                                                                                                  data-search-terms="input type "><i
                                                                class="fas fa-keyboard"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-keyboard"
                                                                                                   data-search-terms="input type "><i
                                                                class="far fa-keyboard"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-keycdn"><i
                                                                class="fab fa-keycdn"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-kickstarter"><i
                                                                class="fab fa-kickstarter"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-kickstarter-k"><i
                                                                class="fab fa-kickstarter-k"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-kiss"
                                                                                                        data-search-terms="beso emoticon face love smooch "><i
                                                                class="fas fa-kiss"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-kiss"
                                                                                               data-search-terms="beso emoticon face love smooch "><i
                                                                class="far fa-kiss"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-kiss-beam"
                                                                                               data-search-terms="beso emoticon face love smooch "><i
                                                                class="fas fa-kiss-beam"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-kiss-beam"
                                                                                                    data-search-terms="beso emoticon face love smooch "><i
                                                                class="far fa-kiss-beam"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-kiss-wink-heart"
                                                                                                    data-search-terms="beso emoticon face love smooch "><i
                                                                class="fas fa-kiss-wink-heart"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-kiss-wink-heart"
                                                                                                          data-search-terms="beso emoticon face love smooch "><i
                                                                class="far fa-kiss-wink-heart"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-kiwi-bird"><i
                                                                class="fas fa-kiwi-bird"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-korvue"><i
                                                                class="fab fa-korvue"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-language"
                                                                                                 data-search-terms="dialect idiom localize speech translate vernacular "><i
                                                                class="fas fa-language"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-laptop"
                                                                                                   data-search-terms="computer cpu dell demo device dude you're getting mac macbook machine pc pc "><i
                                                                class="fas fa-laptop"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-laravel"><i
                                                                class="fab fa-laravel"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-lastfm"><i
                                                                class="fab fa-lastfm"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-lastfm-square"><i
                                                                class="fab fa-lastfm-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-laugh"
                                                                                                        data-search-terms="LOL emoticon face laugh "><i
                                                                class="fas fa-laugh"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-laugh"
                                                                                                data-search-terms="LOL emoticon face laugh "><i
                                                                class="far fa-laugh"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-laugh-beam"
                                                                                                data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-laugh-beam"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-laugh-beam"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="far fa-laugh-beam"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-laugh-squint"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-laugh-squint"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-laugh-squint"
                                                                                                       data-search-terms="LOL emoticon face "><i
                                                                class="far fa-laugh-squint"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-laugh-wink"
                                                                                                       data-search-terms="LOL emoticon face "><i
                                                                class="fas fa-laugh-wink"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-laugh-wink"
                                                                                                     data-search-terms="LOL emoticon face "><i
                                                                class="far fa-laugh-wink"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-leaf"
                                                                                                     data-search-terms="eco nature plant "><i
                                                                class="fas fa-leaf"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-leanpub"><i
                                                                class="fab fa-leanpub"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-lemon"
                                                                                                  data-search-terms="food "><i
                                                                class="fas fa-lemon"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-lemon"
                                                                                                data-search-terms="food "><i
                                                                class="far fa-lemon"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-less"><i
                                                                class="fab fa-less"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-less-than"><i
                                                                class="fas fa-less-than"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-less-than-equal"><i
                                                                class="fas fa-less-than-equal"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-level-down-alt"
                                                                                                          data-search-terms="level-down "><i
                                                                class="fas fa-level-down-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-level-up-alt"
                                                                                                         data-search-terms="level-up "><i
                                                                class="fas fa-level-up-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-life-ring"
                                                                                                       data-search-terms="support "><i
                                                                class="fas fa-life-ring"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-life-ring"
                                                                                                    data-search-terms="support "><i
                                                                class="far fa-life-ring"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-lightbulb"
                                                                                                    data-search-terms="idea inspiration "><i
                                                                class="fas fa-lightbulb"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-lightbulb"
                                                                                                    data-search-terms="idea inspiration "><i
                                                                class="far fa-lightbulb"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-line"><i
                                                                class="fab fa-line"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-link"
                                                                                               data-search-terms="chain "><i
                                                                class="fas fa-link"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-linkedin"
                                                                                               data-search-terms="linkedin-square "><i
                                                                class="fab fa-linkedin"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-linkedin-in"
                                                                                                   data-search-terms="linkedin "><i
                                                                class="fab fa-linkedin-in"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-linode"><i
                                                                class="fab fa-linode"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-linux"
                                                                                                 data-search-terms="tux "><i
                                                                class="fab fa-linux"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-lira-sign"
                                                                                                data-search-terms="try try turkish "><i
                                                                class="fas fa-lira-sign"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-list"
                                                                                                    data-search-terms="checklist completed done finished ol todo ul "><i
                                                                class="fas fa-list"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-list-alt"
                                                                                               data-search-terms="checklist completed done finished ol todo ul "><i
                                                                class="fas fa-list-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-list-alt"
                                                                                                   data-search-terms="checklist completed done finished ol todo ul "><i
                                                                class="far fa-list-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-list-ol"
                                                                                                   data-search-terms="checklist list list numbers ol todo ul "><i
                                                                class="fas fa-list-ol"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-list-ul"
                                                                                                  data-search-terms="checklist list ol todo ul "><i
                                                                class="fas fa-list-ul"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-location-arrow"
                                                                                                  data-search-terms="address coordinates gps location map place where "><i
                                                                class="fas fa-location-arrow"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-lock"
                                                                                                         data-search-terms="admin protect security "><i
                                                                class="fas fa-lock"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-lock-open"
                                                                                               data-search-terms="admin lock open password protect "><i
                                                                class="fas fa-lock-open"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-long-arrow-alt-down"
                                                                                                    data-search-terms="long-arrow-down "><i
                                                                class="fas fa-long-arrow-alt-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-long-arrow-alt-left"
                                                            data-search-terms="back long-arrow-left previous "><i
                                                                class="fas fa-long-arrow-alt-left"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-long-arrow-alt-right"
                                                            data-search-terms="long-arrow-right "><i
                                                                class="fas fa-long-arrow-alt-right"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-long-arrow-alt-up"
                                                            data-search-terms="long-arrow-up "><i
                                                                class="fas fa-long-arrow-alt-up"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-low-vision"><i class="fas fa-low-vision"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-luggage-cart"><i
                                                                class="fas fa-luggage-cart"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-lyft"><i
                                                                class="fab fa-lyft"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-magento"><i
                                                                class="fab fa-magento"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-magic"
                                                                                                  data-search-terms="autocomplete automatic wizard "><i
                                                                class="fas fa-magic"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-magnet"><i
                                                                class="fas fa-magnet"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-mailchimp"><i
                                                                class="fab fa-mailchimp"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-male"
                                                                                                    data-search-terms="human man person profile user "><i
                                                                class="fas fa-male"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-mandalorian"><i
                                                                class="fab fa-mandalorian"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-map"
                                                                                                      data-search-terms="coordinates location paper place travel "><i
                                                                class="fas fa-map"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-map"
                                                                                              data-search-terms="coordinates location paper place travel "><i
                                                                class="far fa-map"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-map-marked"
                                                                                              data-search-terms="address coordinates destination gps localize location map paper pin place point of interest position route travel where "><i
                                                                class="fas fa-map-marked"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-map-marked-alt"
                                                                                                     data-search-terms="address coordinates destination gps localize location map paper pin place point of interest position route travel where "><i
                                                                class="fas fa-map-marked-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-map-marker"
                                                                                                         data-search-terms="address coordinates gps localize location map pin place position travel where "><i
                                                                class="fas fa-map-marker"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-map-marker-alt"
                                                                                                     data-search-terms="address coordinates gps localize location map pin place position travel where "><i
                                                                class="fas fa-map-marker-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-map-pin"
                                                                                                         data-search-terms="address coordinates gps localize location map marker place position travel where "><i
                                                                class="fas fa-map-pin"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-map-signs"><i
                                                                class="fas fa-map-signs"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-marker"
                                                                                                    data-search-terms="edit sharpie update write "><i
                                                                class="fas fa-marker"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-mars"
                                                                                                 data-search-terms="male "><i
                                                                class="fas fa-mars"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-mars-double"><i
                                                                class="fas fa-mars-double"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-mars-stroke"><i
                                                                class="fas fa-mars-stroke"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-mars-stroke-h"><i
                                                                class="fas fa-mars-stroke-h"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-mars-stroke-v"><i
                                                                class="fas fa-mars-stroke-v"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-mastodon"><i
                                                                class="fab fa-mastodon"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-maxcdn"><i
                                                                class="fab fa-maxcdn"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-medal"><i
                                                                class="fas fa-medal"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-medapps"><i
                                                                class="fab fa-medapps"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-medium"><i
                                                                class="fab fa-medium"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-medium-m"><i
                                                                class="fab fa-medium-m"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-medkit"
                                                                                                   data-search-terms="first aid firstaid health help support "><i
                                                                class="fas fa-medkit"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-medrt"><i
                                                                class="fab fa-medrt"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-meetup"><i
                                                                class="fab fa-meetup"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-megaport"><i
                                                                class="fab fa-megaport"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-meh"
                                                                                                   data-search-terms="emoticon face neutral rating "><i
                                                                class="fas fa-meh"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-meh"
                                                                                              data-search-terms="emoticon face neutral rating "><i
                                                                class="far fa-meh"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-meh-blank"
                                                                                              data-search-terms="emoticon face neutral rating "><i
                                                                class="fas fa-meh-blank"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-meh-blank"
                                                                                                    data-search-terms="emoticon face neutral rating "><i
                                                                class="far fa-meh-blank"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-meh-rolling-eyes"
                                                                                                    data-search-terms="emoticon face neutral rating "><i
                                                                class="fas fa-meh-rolling-eyes"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".far fa-meh-rolling-eyes"
                                                                                                           data-search-terms="emoticon face neutral rating "><i
                                                                class="far fa-meh-rolling-eyes"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-memory"
                                                                                                           data-search-terms="DIMM RAM "><i
                                                                class="fas fa-memory"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-mercury"
                                                                                                 data-search-terms="transgender "><i
                                                                class="fas fa-mercury"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-microchip"
                                                                                                  data-search-terms="cpu processor "><i
                                                                class="fas fa-microchip"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-microphone"
                                                                                                    data-search-terms="record sound voice "><i
                                                                class="fas fa-microphone"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-microphone-alt"
                                                                                                     data-search-terms="record sound voice "><i
                                                                class="fas fa-microphone-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-microphone-alt-slash"
                                                                                                         data-search-terms="disable mute record sound voice "><i
                                                                class="fas fa-microphone-alt-slash"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-microphone-slash"
                                                            data-search-terms="disable mute record sound voice "><i
                                                                class="fas fa-microphone-slash"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-microsoft"><i
                                                                class="fab fa-microsoft"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-minus"
                                                                                                    data-search-terms="collapse delete hide hide minify remove trash "><i
                                                                class="fas fa-minus"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-minus-circle"
                                                                                                data-search-terms="delete hide remove trash "><i
                                                                class="fas fa-minus-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-minus-square"
                                                                                                       data-search-terms="collapse delete hide hide minify remove trash "><i
                                                                class="fas fa-minus-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-minus-square"
                                                                                                       data-search-terms="collapse delete hide hide minify remove trash "><i
                                                                class="far fa-minus-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-mix"><i
                                                                class="fab fa-mix"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-mixcloud"><i
                                                                class="fab fa-mixcloud"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-mizuni"><i
                                                                class="fab fa-mizuni"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-mobile"
                                                                                                 data-search-terms="apple call cell phone cellphone device iphone number screen telephone text "><i
                                                                class="fas fa-mobile"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-mobile-alt"
                                                                                                 data-search-terms="apple call cell phone cellphone device iphone number screen telephone text "><i
                                                                class="fas fa-mobile-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-modx"><i
                                                                class="fab fa-modx"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-monero"><i
                                                                class="fab fa-monero"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-money-bill"
                                                                                                 data-search-terms="buy cash checkout money payment price purchase "><i
                                                                class="fas fa-money-bill"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-money-bill-alt"
                                                                                                     data-search-terms="buy cash checkout money payment price purchase "><i
                                                                class="fas fa-money-bill-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-money-bill-alt"
                                                                                                         data-search-terms="buy cash checkout money payment price purchase "><i
                                                                class="far fa-money-bill-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-money-bill-wave"><i
                                                                class="fas fa-money-bill-wave"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-money-bill-wave-alt"><i
                                                                class="fas fa-money-bill-wave-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-money-check"
                                                            data-search-terms="bank check cheque "><i
                                                                class="fas fa-money-check"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-money-check-alt"
                                                                                                      data-search-terms="bank check cheque "><i
                                                                class="fas fa-money-check-alt"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-monument"
                                                                                                          data-search-terms="building historic memoroable "><i
                                                                class="fas fa-monument"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-moon"
                                                                                                   data-search-terms="contrast darker night "><i
                                                                class="fas fa-moon"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-moon"
                                                                                               data-search-terms="contrast darker night "><i
                                                                class="far fa-moon"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-mortar-pestle"
                                                                                               data-search-terms="crush culinary grind medical mix spices "><i
                                                                class="fas fa-mortar-pestle"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-motorcycle"
                                                                                                        data-search-terms="bike machine transportation vehicle "><i
                                                                class="fas fa-motorcycle"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-mouse-pointer"
                                                                                                     data-search-terms="select "><i
                                                                class="fas fa-mouse-pointer"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-music"
                                                                                                        data-search-terms="note sound "><i
                                                                class="fas fa-music"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-napster"><i
                                                                class="fab fa-napster"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-neuter"><i
                                                                class="fas fa-neuter"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-newspaper"
                                                                                                 data-search-terms="article press "><i
                                                                class="fas fa-newspaper"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-newspaper"
                                                                                                    data-search-terms="article press "><i
                                                                class="far fa-newspaper"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-nimblr"><i
                                                                class="fab fa-nimblr"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-nintendo-switch"><i
                                                                class="fab fa-nintendo-switch"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-node"><i
                                                                class="fab fa-node"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-node-js"><i
                                                                class="fab fa-node-js"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-not-equal"><i
                                                                class="fas fa-not-equal"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-notes-medical"><i
                                                                class="fas fa-notes-medical"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-npm"><i
                                                                class="fab fa-npm"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-ns8"><i
                                                                class="fab fa-ns8"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-nutritionix"><i
                                                                class="fab fa-nutritionix"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-object-group"
                                                                                                      data-search-terms="design "><i
                                                                class="fas fa-object-group"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-object-group"
                                                                                                       data-search-terms="design "><i
                                                                class="far fa-object-group"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-object-ungroup"
                                                                                                       data-search-terms="design "><i
                                                                class="fas fa-object-ungroup"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-object-ungroup"
                                                                                                         data-search-terms="design "><i
                                                                class="far fa-object-ungroup"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-odnoklassniki"><i
                                                                class="fab fa-odnoklassniki"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-odnoklassniki-square"><i
                                                                class="fab fa-odnoklassniki-square"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-old-republic"><i
                                                                class="fab fa-old-republic"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-opencart"><i
                                                                class="fab fa-opencart"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-openid"><i
                                                                class="fab fa-openid"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-opera"><i
                                                                class="fab fa-opera"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-optin-monster"><i
                                                                class="fab fa-optin-monster"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-osi"><i
                                                                class="fab fa-osi"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-outdent"><i
                                                                class="fas fa-outdent"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-page4"><i
                                                                class="fab fa-page4"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-pagelines"
                                                                                                data-search-terms="eco leaf leaves nature plant tree "><i
                                                                class="fab fa-pagelines"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-paint-brush"><i
                                                                class="fas fa-paint-brush"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-paint-roller"
                                                                                                      data-search-terms="brush painting tool "><i
                                                                class="fas fa-paint-roller"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-palette"
                                                                                                       data-search-terms="colors painting "><i
                                                                class="fas fa-palette"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-palfed"><i
                                                                class="fab fa-palfed"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-pallet"><i
                                                                class="fas fa-pallet"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-paper-plane"><i
                                                                class="fas fa-paper-plane"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-paper-plane"><i
                                                                class="far fa-paper-plane"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-paperclip"
                                                                                                      data-search-terms="attachment "><i
                                                                class="fas fa-paperclip"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-parachute-box"
                                                                                                    data-search-terms="aid assistance rescue supplies "><i
                                                                class="fas fa-parachute-box"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-paragraph"><i
                                                                class="fas fa-paragraph"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-parking"><i
                                                                class="fas fa-parking"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-passport"
                                                                                                  data-search-terms="document identification issued "><i
                                                                class="fas fa-passport"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-paste"
                                                                                                   data-search-terms="clipboard copy "><i
                                                                class="fas fa-paste"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-patreon"><i
                                                                class="fab fa-patreon"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-pause"
                                                                                                  data-search-terms="wait "><i
                                                                class="fas fa-pause"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-pause-circle"><i
                                                                class="fas fa-pause-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-pause-circle"><i
                                                                class="far fa-pause-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-paw"
                                                                                                       data-search-terms="pet "><i
                                                                class="fas fa-paw"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-paypal"><i
                                                                class="fab fa-paypal"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-pen"
                                                                                                 data-search-terms="design edit update write "><i
                                                                class="fas fa-pen"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-pen-alt"
                                                                                              data-search-terms="design edit update write "><i
                                                                class="fas fa-pen-alt"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-pen-fancy"
                                                                                                  data-search-terms="design edit fountain pen update write "><i
                                                                class="fas fa-pen-fancy"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-pen-nib"
                                                                                                    data-search-terms="design edit fountain pen update write "><i
                                                                class="fas fa-pen-nib"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-pen-square"
                                                                                                  data-search-terms="edit pencil-square update write "><i
                                                                class="fas fa-pen-square"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-pencil-alt"
                                                                                                     data-search-terms="design edit pencil update write "><i
                                                                class="fas fa-pencil-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-pencil-ruler"><i
                                                                class="fas fa-pencil-ruler"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-people-carry"
                                                                                                       data-search-terms="movers "><i
                                                                class="fas fa-people-carry"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-percent"><i
                                                                class="fas fa-percent"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-percentage"><i
                                                                class="fas fa-percentage"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-periscope"><i
                                                                class="fab fa-periscope"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-phabricator"><i
                                                                class="fab fa-phabricator"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-phoenix-framework"><i
                                                                class="fab fa-phoenix-framework"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-phoenix-squadron"><i
                                                                class="fab fa-phoenix-squadron"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-phone"
                                                                                                           data-search-terms="call earphone number support telephone voice "><i
                                                                class="fas fa-phone"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-phone-slash"><i
                                                                class="fas fa-phone-slash"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-phone-square"
                                                                                                      data-search-terms="call number support telephone voice "><i
                                                                class="fas fa-phone-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-phone-volume"
                                                                                                       data-search-terms="telephone volume-control-phone "><i
                                                                class="fas fa-phone-volume"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-php"><i
                                                                class="fab fa-php"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-pied-piper"><i
                                                                class="fab fa-pied-piper"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-pied-piper-alt"><i
                                                                class="fab fa-pied-piper-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-pied-piper-hat"
                                                                                                         data-search-terms="clothing "><i
                                                                class="fab fa-pied-piper-hat"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-pied-piper-pp"><i
                                                                class="fab fa-pied-piper-pp"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-piggy-bank"
                                                                                                        data-search-terms="save savings "><i
                                                                class="fas fa-piggy-bank"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-pills"
                                                                                                     data-search-terms="drugs medicine "><i
                                                                class="fas fa-pills"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-pinterest"><i
                                                                class="fab fa-pinterest"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-pinterest-p"><i
                                                                class="fab fa-pinterest-p"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-pinterest-square"><i
                                                                class="fab fa-pinterest-square"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-plane"
                                                                                                           data-search-terms="airplane destination fly location mode travel trip "><i
                                                                class="fas fa-plane"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-plane-arrival"
                                                                                                data-search-terms="airplane arriving destination fly land landing location mode travel trip "><i
                                                                class="fas fa-plane-arrival"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-plane-departure"
                                                                                                        data-search-terms="airplane departing destination fly location mode take off taking off travel trip "><i
                                                                class="fas fa-plane-departure"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-play"
                                                                                                          data-search-terms="music playing sound start "><i
                                                                class="fas fa-play"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-play-circle"
                                                                                               data-search-terms="playing start "><i
                                                                class="fas fa-play-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-play-circle"
                                                                                                      data-search-terms="playing start "><i
                                                                class="far fa-play-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-playstation"><i
                                                                class="fab fa-playstation"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-plug"
                                                                                                      data-search-terms="connect online power "><i
                                                                class="fas fa-plug"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-plus"
                                                                                               data-search-terms="add create expand new "><i
                                                                class="fas fa-plus"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-plus-circle"
                                                                                               data-search-terms="add create expand new "><i
                                                                class="fas fa-plus-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-plus-square"
                                                                                                      data-search-terms="add create expand new "><i
                                                                class="fas fa-plus-square"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-plus-square"
                                                                                                      data-search-terms="add create expand new "><i
                                                                class="far fa-plus-square"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-podcast"><i
                                                                class="fas fa-podcast"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-poo"><i
                                                                class="fas fa-poo"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-portrait"><i
                                                                class="fas fa-portrait"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-pound-sign"
                                                                                                   data-search-terms="gbp gbp "><i
                                                                class="fas fa-pound-sign"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-power-off"
                                                                                                     data-search-terms="on reboot restart "><i
                                                                class="fas fa-power-off"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-prescription"
                                                                                                    data-search-terms="drugs medical medicine rx "><i
                                                                class="fas fa-prescription"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-prescription-bottle"
                                                                                                       data-search-terms="drugs medical medicine rx "><i
                                                                class="fas fa-prescription-bottle"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-prescription-bottle-alt"
                                                            data-search-terms="drugs medical medicine rx "><i
                                                                class="fas fa-prescription-bottle-alt"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-print"><i class="fas fa-print"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-procedures"><i class="fas fa-procedures"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-product-hunt"><i
                                                                class="fab fa-product-hunt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-project-diagram"><i
                                                                class="fas fa-project-diagram"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fab fa-pushed"><i
                                                                class="fab fa-pushed"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-puzzle-piece"
                                                                                                 data-search-terms="add-on addon section "><i
                                                                class="fas fa-puzzle-piece"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-python"><i
                                                                class="fab fa-python"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-qq"><i
                                                                class="fab fa-qq"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fas fa-qrcode"
                                                                                             data-search-terms="scan "><i
                                                                class="fas fa-qrcode"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-question"
                                                                                                 data-search-terms="help information support unknown "><i
                                                                class="fas fa-question"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-question-circle"
                                                                                                   data-search-terms="help information support unknown "><i
                                                                class="fas fa-question-circle"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-question-circle"
                                                                                                          data-search-terms="help information support unknown "><i
                                                                class="far fa-question-circle"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-quidditch"><i
                                                                class="fas fa-quidditch"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-quinscape"><i
                                                                class="fab fa-quinscape"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-quora"><i
                                                                class="fab fa-quora"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-quote-left"><i
                                                                class="fas fa-quote-left"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-quote-right"><i
                                                                class="fas fa-quote-right"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-r-project"><i
                                                                class="fab fa-r-project"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-random"
                                                                                                    data-search-terms="shuffle sort "><i
                                                                class="fas fa-random"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-ravelry"><i
                                                                class="fab fa-ravelry"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-react"><i
                                                                class="fab fa-react"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-readme"><i
                                                                class="fab fa-readme"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-rebel"><i
                                                                class="fab fa-rebel"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-receipt"
                                                                                                data-search-terms="check invoice table "><i
                                                                class="fas fa-receipt"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-recycle"><i
                                                                class="fas fa-recycle"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-red-river"><i
                                                                class="fab fa-red-river"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-reddit"><i
                                                                class="fab fa-reddit"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-reddit-alien"><i
                                                                class="fab fa-reddit-alien"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-reddit-square"><i
                                                                class="fab fa-reddit-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-redo"
                                                                                                        data-search-terms="forward repeat repeat "><i
                                                                class="fas fa-redo"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-redo-alt"
                                                                                               data-search-terms="forward repeat "><i
                                                                class="fas fa-redo-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-registered"><i
                                                                class="fas fa-registered"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-registered"><i
                                                                class="far fa-registered"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-rendact"><i
                                                                class="fab fa-rendact"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-renren"><i
                                                                class="fab fa-renren"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-reply"><i
                                                                class="fas fa-reply"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-reply-all"><i
                                                                class="fas fa-reply-all"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-replyd"><i
                                                                class="fab fa-replyd"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-researchgate"><i
                                                                class="fab fa-researchgate"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-resolving"><i
                                                                class="fab fa-resolving"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-retweet"
                                                                                                    data-search-terms="refresh reload share swap "><i
                                                                class="fas fa-retweet"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-rev"><i
                                                                class="fab fa-rev"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-ribbon"
                                                                                              data-search-terms="badge cause lapel pin "><i
                                                                class="fas fa-ribbon"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-road"
                                                                                                 data-search-terms="street "><i
                                                                class="fas fa-road"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-robot"><i
                                                                class="fas fa-robot"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-rocket"
                                                                                                data-search-terms="app "><i
                                                                class="fas fa-rocket"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-rocketchat"><i
                                                                class="fab fa-rocketchat"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-rockrms"><i
                                                                class="fab fa-rockrms"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-rss"
                                                                                                  data-search-terms="blog "><i
                                                                class="fas fa-rss"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-rss-square"
                                                                                              data-search-terms="blog feed "><i
                                                                class="fas fa-rss-square"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-ruble-sign"
                                                                                                     data-search-terms="rub rub "><i
                                                                class="fas fa-ruble-sign"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-ruler"><i
                                                                class="fas fa-ruler"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-ruler-combined"><i
                                                                class="fas fa-ruler-combined"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-ruler-horizontal"><i
                                                                class="fas fa-ruler-horizontal"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-ruler-vertical"><i
                                                                class="fas fa-ruler-vertical"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-rupee-sign"
                                                                                                         data-search-terms="indian inr "><i
                                                                class="fas fa-rupee-sign"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-sad-cry"
                                                                                                     data-search-terms="emoticon face tear tears "><i
                                                                class="fas fa-sad-cry"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".far fa-sad-cry"
                                                                                                  data-search-terms="emoticon face tear tears "><i
                                                                class="far fa-sad-cry"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-sad-tear"
                                                                                                  data-search-terms="emoticon face tear tears "><i
                                                                class="fas fa-sad-tear"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-sad-tear"
                                                                                                   data-search-terms="emoticon face tear tears "><i
                                                                class="far fa-sad-tear"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-safari"
                                                                                                   data-search-terms="browser "><i
                                                                class="fab fa-safari"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-sass"><i
                                                                class="fab fa-sass"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-save"
                                                                                               data-search-terms="floppy floppy-o "><i
                                                                class="fas fa-save"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-save"
                                                                                               data-search-terms="floppy floppy-o "><i
                                                                class="far fa-save"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-schlix"><i
                                                                class="fab fa-schlix"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-school"><i
                                                                class="fas fa-school"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-screwdriver"
                                                                                                 data-search-terms="admin container fix repair settings tool "><i
                                                                class="fas fa-screwdriver"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-scribd"><i
                                                                class="fab fa-scribd"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-search"
                                                                                                 data-search-terms="bigger enlarge magnify preview zoom "><i
                                                                class="fas fa-search"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-search-minus"
                                                                                                 data-search-terms="magnify minify smaller zoom zoom out "><i
                                                                class="fas fa-search-minus"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-search-plus"
                                                                                                       data-search-terms="bigger enlarge magnify zoom zoom in "><i
                                                                class="fas fa-search-plus"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-searchengin"><i
                                                                class="fab fa-searchengin"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-seedling"><i
                                                                class="fas fa-seedling"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-sellcast"
                                                                                                   data-search-terms="eercast "><i
                                                                class="fab fa-sellcast"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-sellsy"><i
                                                                class="fab fa-sellsy"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-server"
                                                                                                 data-search-terms="cpu "><i
                                                                class="fas fa-server"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-servicestack"><i
                                                                class="fab fa-servicestack"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-share"><i
                                                                class="fas fa-share"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-share-alt"><i
                                                                class="fas fa-share-alt"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-share-alt-square"><i
                                                                class="fas fa-share-alt-square"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-share-square"
                                                                                                           data-search-terms="send social "><i
                                                                class="fas fa-share-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-share-square"
                                                                                                       data-search-terms="send social "><i
                                                                class="far fa-share-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-shekel-sign"
                                                                                                       data-search-terms="ils ils "><i
                                                                class="fas fa-shekel-sign"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-shield-alt"
                                                                                                      data-search-terms="shield "><i
                                                                class="fas fa-shield-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-ship"
                                                                                                     data-search-terms="boat sea "><i
                                                                class="fas fa-ship"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-shipping-fast"><i
                                                                class="fas fa-shipping-fast"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-shirtsinbulk"><i
                                                                class="fab fa-shirtsinbulk"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-shoe-prints"
                                                                                                       data-search-terms="feet footprints steps "><i
                                                                class="fas fa-shoe-prints"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-shopping-bag"><i
                                                                class="fas fa-shopping-bag"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-shopping-basket"><i
                                                                class="fas fa-shopping-basket"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-shopping-cart"
                                                                                                          data-search-terms="buy checkout payment purchase "><i
                                                                class="fas fa-shopping-cart"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-shopware"><i
                                                                class="fab fa-shopware"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-shower"><i
                                                                class="fas fa-shower"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-shuttle-van"
                                                                                                 data-search-terms="machine public-transportation transportation vehicle "><i
                                                                class="fas fa-shuttle-van"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-sign"><i
                                                                class="fas fa-sign"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-sign-in-alt"
                                                                                               data-search-terms="arrow enter join log in login sign in sign up sign-in signin signup "><i
                                                                class="fas fa-sign-in-alt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-sign-language"><i
                                                                class="fas fa-sign-language"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-sign-out-alt"
                                                                                                        data-search-terms="arrow exit leave log out logout sign-out "><i
                                                                class="fas fa-sign-out-alt"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-signal"
                                                                                                       data-search-terms="bars graph online status "><i
                                                                class="fas fa-signal"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-signature"
                                                                                                 data-search-terms="John Hancock cursive name writing "><i
                                                                class="fas fa-signature"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-simplybuilt"><i
                                                                class="fab fa-simplybuilt"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-sistrix"><i
                                                                class="fab fa-sistrix"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-sitemap"
                                                                                                  data-search-terms="directory hierarchy ia information architecture organization "><i
                                                                class="fas fa-sitemap"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-sith"><i
                                                                class="fab fa-sith"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-skull"
                                                                                               data-search-terms="bones skeleton yorick "><i
                                                                class="fas fa-skull"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-skyatlas"><i
                                                                class="fab fa-skyatlas"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-skype"><i
                                                                class="fab fa-skype"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-slack"
                                                                                                data-search-terms="anchor hash hashtag "><i
                                                                class="fab fa-slack"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-slack-hash"
                                                                                                data-search-terms="anchor hash hashtag "><i
                                                                class="fab fa-slack-hash"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-sliders-h"
                                                                                                     data-search-terms="settings sliders "><i
                                                                class="fas fa-sliders-h"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-slideshare"><i
                                                                class="fab fa-slideshare"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-smile"
                                                                                                     data-search-terms="approve emoticon face happy rating satisfied "><i
                                                                class="fas fa-smile"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-smile"
                                                                                                data-search-terms="approve emoticon face happy rating satisfied "><i
                                                                class="far fa-smile"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-smile-beam"
                                                                                                data-search-terms="emoticon face happy "><i
                                                                class="fas fa-smile-beam"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-smile-beam"
                                                                                                     data-search-terms="emoticon face happy "><i
                                                                class="far fa-smile-beam"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-smile-wink"
                                                                                                     data-search-terms="emoticon face happy "><i
                                                                class="fas fa-smile-wink"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".far fa-smile-wink"
                                                                                                     data-search-terms="emoticon face happy "><i
                                                                class="far fa-smile-wink"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-smoking"
                                                                                                     data-search-terms="cigarette nicotine smoking status "><i
                                                                class="fas fa-smoking"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-smoking-ban"
                                                                                                  data-search-terms="no smoking non-smoking "><i
                                                                class="fas fa-smoking-ban"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-snapchat"><i
                                                                class="fab fa-snapchat"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-snapchat-ghost"><i
                                                                class="fab fa-snapchat-ghost"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-snapchat-square"><i
                                                                class="fab fa-snapchat-square"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-snowflake"><i
                                                                class="fas fa-snowflake"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-snowflake"><i
                                                                class="far fa-snowflake"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-solar-panel"
                                                                                                    data-search-terms="clean eco-friendly energy green sun "><i
                                                                class="fas fa-solar-panel"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-sort"
                                                                                                      data-search-terms="order "><i
                                                                class="fas fa-sort"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-sort-alpha-down"
                                                                                               data-search-terms="sort-alpha-asc "><i
                                                                class="fas fa-sort-alpha-down"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-sort-alpha-up"
                                                                                                          data-search-terms="sort-alpha-desc "><i
                                                                class="fas fa-sort-alpha-up"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-sort-amount-down"
                                                                                                        data-search-terms="sort-amount-asc "><i
                                                                class="fas fa-sort-amount-down"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-sort-amount-up"
                                                                                                           data-search-terms="sort-amount-desc "><i
                                                                class="fas fa-sort-amount-up"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-sort-down"
                                                                                                         data-search-terms="arrow descending sort-desc "><i
                                                                class="fas fa-sort-down"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-sort-numeric-down"
                                                                                                    data-search-terms="numbers sort-numeric-asc "><i
                                                                class="fas fa-sort-numeric-down"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-sort-numeric-up"
                                                            data-search-terms="numbers sort-numeric-desc "><i
                                                                class="fas fa-sort-numeric-up"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-sort-up"
                                                                                                          data-search-terms="arrow ascending sort-asc "><i
                                                                class="fas fa-sort-up"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-soundcloud"><i
                                                                class="fab fa-soundcloud"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-spa"
                                                                                                     data-search-terms="mindfullness plant wellness "><i
                                                                class="fas fa-spa"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-space-shuttle"
                                                                                              data-search-terms="astronaut machine nasa rocket transportation "><i
                                                                class="fas fa-space-shuttle"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-speakap"><i
                                                                class="fab fa-speakap"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-spinner"
                                                                                                  data-search-terms="loading progress "><i
                                                                class="fas fa-spinner"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-splotch"><i
                                                                class="fas fa-splotch"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-spotify"><i
                                                                class="fab fa-spotify"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-spray-can"><i
                                                                class="fas fa-spray-can"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-square"
                                                                                                    data-search-terms="block box "><i
                                                                class="fas fa-square"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".far fa-square"
                                                                                                 data-search-terms="block box "><i
                                                                class="far fa-square"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-square-full"><i
                                                                class="fas fa-square-full"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-squarespace"><i
                                                                class="fab fa-squarespace"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-stack-exchange"><i
                                                                class="fab fa-stack-exchange"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-stack-overflow"><i
                                                                class="fab fa-stack-overflow"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-stamp"><i
                                                                class="fas fa-stamp"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-star"
                                                                                                data-search-terms="achievement award favorite important night rating score "><i
                                                                class="fas fa-star"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-star"
                                                                                               data-search-terms="achievement award favorite important night rating score "><i
                                                                class="far fa-star"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-star-half"
                                                                                               data-search-terms="achievement award rating score star-half-empty star-half-full "><i
                                                                class="fas fa-star-half"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-star-half"
                                                                                                    data-search-terms="achievement award rating score star-half-empty star-half-full "><i
                                                                class="far fa-star-half"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-star-half-alt"
                                                                                                    data-search-terms="achievement award rating score star-half-empty star-half-full "><i
                                                                class="fas fa-star-half-alt"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-staylinked"><i
                                                                class="fab fa-staylinked"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-steam"><i
                                                                class="fab fa-steam"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-steam-square"><i
                                                                class="fab fa-steam-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-steam-symbol"><i
                                                                class="fab fa-steam-symbol"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-step-backward"
                                                                                                       data-search-terms="beginning first previous rewind start "><i
                                                                class="fas fa-step-backward"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-step-forward"
                                                                                                        data-search-terms="end last next "><i
                                                                class="fas fa-step-forward"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-stethoscope"><i
                                                                class="fas fa-stethoscope"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-sticker-mule"><i
                                                                class="fab fa-sticker-mule"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-sticky-note"><i
                                                                class="fas fa-sticky-note"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-sticky-note"><i
                                                                class="far fa-sticky-note"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-stop"
                                                                                                      data-search-terms="block box square "><i
                                                                class="fas fa-stop"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-stop-circle"><i
                                                                class="fas fa-stop-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-stop-circle"><i
                                                                class="far fa-stop-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-stopwatch"
                                                                                                      data-search-terms="time "><i
                                                                class="fas fa-stopwatch"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-store"><i
                                                                class="fas fa-store"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-store-alt"><i
                                                                class="fas fa-store-alt"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-strava"><i
                                                                class="fab fa-strava"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-stream"><i
                                                                class="fas fa-stream"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-street-view"
                                                                                                 data-search-terms="map "><i
                                                                class="fas fa-street-view"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-strikethrough"><i
                                                                class="fas fa-strikethrough"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fab fa-stripe"><i
                                                                class="fab fa-stripe"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-stripe-s"><i
                                                                class="fab fa-stripe-s"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-stroopwafel"
                                                                                                   data-search-terms="dessert food sweets waffle "><i
                                                                class="fas fa-stroopwafel"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-studiovinari"><i
                                                                class="fab fa-studiovinari"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-stumbleupon"><i
                                                                class="fab fa-stumbleupon"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-stumbleupon-circle"><i
                                                                class="fab fa-stumbleupon-circle"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-subscript"><i
                                                                class="fas fa-subscript"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-subway"
                                                                                                    data-search-terms="machine railway train transportation vehicle "><i
                                                                class="fas fa-subway"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-suitcase"
                                                                                                 data-search-terms="baggage luggage move suitcase travel trip "><i
                                                                class="fas fa-suitcase"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-suitcase-rolling"><i
                                                                class="fas fa-suitcase-rolling"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-sun"
                                                                                                           data-search-terms="brighten contrast day lighter weather "><i
                                                                class="fas fa-sun"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".far fa-sun"
                                                                                              data-search-terms="brighten contrast day lighter weather "><i
                                                                class="far fa-sun"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-superpowers"><i
                                                                class="fab fa-superpowers"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-superscript"
                                                                                                      data-search-terms="exponential "><i
                                                                class="fas fa-superscript"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-supple"><i
                                                                class="fab fa-supple"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-surprise"
                                                                                                 data-search-terms="emoticon face shocked "><i
                                                                class="fas fa-surprise"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".far fa-surprise"
                                                                                                   data-search-terms="emoticon face shocked "><i
                                                                class="far fa-surprise"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-swatchbook"><i
                                                                class="fas fa-swatchbook"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-swimmer"
                                                                                                     data-search-terms="athlete head man person water "><i
                                                                class="fas fa-swimmer"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-swimming-pool"
                                                                                                  data-search-terms="ladder recreation water "><i
                                                                class="fas fa-swimming-pool"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-sync"
                                                                                                        data-search-terms="exchange refresh reload rotate swap "><i
                                                                class="fas fa-sync"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-sync-alt"
                                                                                               data-search-terms="refresh reload rotate "><i
                                                                class="fas fa-sync-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-syringe"
                                                                                                   data-search-terms="immunizations needle "><i
                                                                class="fas fa-syringe"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-table"
                                                                                                  data-search-terms="data excel spreadsheet "><i
                                                                class="fas fa-table"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-table-tennis"><i
                                                                class="fas fa-table-tennis"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-tablet"
                                                                                                       data-search-terms="apple device ipad kindle screen "><i
                                                                class="fas fa-tablet"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-tablet-alt"
                                                                                                 data-search-terms="apple device ipad kindle screen "><i
                                                                class="fas fa-tablet-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-tablets"
                                                                                                     data-search-terms="drugs medicine "><i
                                                                class="fas fa-tablets"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-tachometer-alt"
                                                                                                  data-search-terms="dashboard tachometer "><i
                                                                class="fas fa-tachometer-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-tag"
                                                                                                         data-search-terms="label "><i
                                                                class="fas fa-tag"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-tags"
                                                                                              data-search-terms="labels "><i
                                                                class="fas fa-tags"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-tape"><i
                                                                class="fas fa-tape"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-tasks"
                                                                                               data-search-terms="downloading downloads loading progress settings "><i
                                                                class="fas fa-tasks"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-taxi"
                                                                                                data-search-terms="cab cabbie car car service lyft machine transportation uber vehicle "><i
                                                                class="fas fa-taxi"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-teamspeak"><i
                                                                class="fab fa-teamspeak"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-telegram"><i
                                                                class="fab fa-telegram"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-telegram-plane"><i
                                                                class="fab fa-telegram-plane"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-tencent-weibo"><i
                                                                class="fab fa-tencent-weibo"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-terminal"
                                                                                                        data-search-terms="code command console prompt "><i
                                                                class="fas fa-terminal"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-text-height"><i
                                                                class="fas fa-text-height"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-text-width"><i
                                                                class="fas fa-text-width"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-th"
                                                                                                     data-search-terms="blocks boxes grid squares "><i
                                                                class="fas fa-th"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fas fa-th-large"
                                                                                             data-search-terms="blocks boxes grid squares "><i
                                                                class="fas fa-th-large"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-th-list"
                                                                                                   data-search-terms="checklist completed done finished ol todo ul "><i
                                                                class="fas fa-th-list"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-themeco"><i
                                                                class="fab fa-themeco"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-themeisle"><i
                                                                class="fab fa-themeisle"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-thermometer"
                                                                                                    data-search-terms="fever temperature "><i
                                                                class="fas fa-thermometer"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-thermometer-empty"
                                                                                                      data-search-terms="status "><i
                                                                class="fas fa-thermometer-empty"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-thermometer-full"
                                                            data-search-terms="status "><i
                                                                class="fas fa-thermometer-full"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-thermometer-half"
                                                                                                           data-search-terms="status "><i
                                                                class="fas fa-thermometer-half"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-thermometer-quarter"
                                                                                                           data-search-terms="status "><i
                                                                class="fas fa-thermometer-quarter"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-thermometer-three-quarters"
                                                            data-search-terms="status "><i
                                                                class="fas fa-thermometer-three-quarters"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-thumbs-down"
                                                            data-search-terms="disagree disapprove dislike hand thumbs-o-down "><i
                                                                class="fas fa-thumbs-down"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-thumbs-down"
                                                                                                      data-search-terms="disagree disapprove dislike hand thumbs-o-down "><i
                                                                class="far fa-thumbs-down"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-thumbs-up"
                                                                                                      data-search-terms="agree approve favorite hand like ok okay success thumbs-o-up yes you got it dude "><i
                                                                class="fas fa-thumbs-up"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-thumbs-up"
                                                                                                    data-search-terms="agree approve favorite hand like ok okay success thumbs-o-up yes you got it dude "><i
                                                                class="far fa-thumbs-up"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-thumbtack"
                                                                                                    data-search-terms="coordinates location marker pin thumb-tack "><i
                                                                class="fas fa-thumbtack"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-ticket-alt"
                                                                                                    data-search-terms="ticket "><i
                                                                class="fas fa-ticket-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-times"
                                                                                                     data-search-terms="close cross error exit incorrect notice notification notify problem wrong x "><i
                                                                class="fas fa-times"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-times-circle"
                                                                                                data-search-terms="close cross exit incorrect notice notification notify problem wrong x "><i
                                                                class="fas fa-times-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-times-circle"
                                                                                                       data-search-terms="close cross exit incorrect notice notification notify problem wrong x "><i
                                                                class="far fa-times-circle"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-tint"
                                                                                                       data-search-terms="drop droplet raindrop waterdrop "><i
                                                                class="fas fa-tint"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-tint-slash"><i
                                                                class="fas fa-tint-slash"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-tired"
                                                                                                     data-search-terms="emoticon face grumpy "><i
                                                                class="fas fa-tired"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".far fa-tired"
                                                                                                data-search-terms="emoticon face grumpy "><i
                                                                class="far fa-tired"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-toggle-off"
                                                                                                data-search-terms="switch "><i
                                                                class="fas fa-toggle-off"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-toggle-on"
                                                                                                     data-search-terms="switch "><i
                                                                class="fas fa-toggle-on"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-toolbox"
                                                                                                    data-search-terms="admin container fix repair settings tools "><i
                                                                class="fas fa-toolbox"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-tooth"
                                                                                                  data-search-terms="bicuspid dental molar mouth teeth "><i
                                                                class="fas fa-tooth"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-trade-federation"><i
                                                                class="fab fa-trade-federation"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-trademark"><i
                                                                class="fas fa-trademark"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-train"
                                                                                                    data-search-terms="bullet locomotive railway "><i
                                                                class="fas fa-train"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-transgender"
                                                                                                data-search-terms="intersex "><i
                                                                class="fas fa-transgender"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-transgender-alt"><i
                                                                class="fas fa-transgender-alt"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-trash"
                                                                                                          data-search-terms="delete garbage hide remove "><i
                                                                class="fas fa-trash"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-trash-alt"
                                                                                                data-search-terms="delete garbage hide remove trash trash-o "><i
                                                                class="fas fa-trash-alt"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".far fa-trash-alt"
                                                                                                    data-search-terms="delete garbage hide remove trash trash-o "><i
                                                                class="far fa-trash-alt"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-tree"><i
                                                                class="fas fa-tree"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-trello"><i
                                                                class="fab fa-trello"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-tripadvisor"><i
                                                                class="fab fa-tripadvisor"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-trophy"
                                                                                                      data-search-terms="achievement award cup game winner "><i
                                                                class="fas fa-trophy"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-truck"
                                                                                                 data-search-terms="delivery shipping "><i
                                                                class="fas fa-truck"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-truck-loading"><i
                                                                class="fas fa-truck-loading"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-truck-moving"><i
                                                                class="fas fa-truck-moving"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-tshirt"
                                                                                                       data-search-terms="cloth clothing "><i
                                                                class="fas fa-tshirt"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-tty"><i
                                                                class="fas fa-tty"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-tumblr"><i
                                                                class="fab fa-tumblr"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-tumblr-square"><i
                                                                class="fab fa-tumblr-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-tv"
                                                                                                        data-search-terms="computer display monitor television "><i
                                                                class="fas fa-tv"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fab fa-twitch"><i
                                                                class="fab fa-twitch"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-twitter"
                                                                                                 data-search-terms="social network tweet "><i
                                                                class="fab fa-twitter"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-twitter-square"
                                                                                                  data-search-terms="social network tweet "><i
                                                                class="fab fa-twitter-square"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-typo3"><i
                                                                class="fab fa-typo3"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-uber"><i
                                                                class="fab fa-uber"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-uikit"><i
                                                                class="fab fa-uikit"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-umbrella"
                                                                                                data-search-terms="protection rain "><i
                                                                class="fas fa-umbrella"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-umbrella-beach"
                                                                                                   data-search-terms="protection recreation sun "><i
                                                                class="fas fa-umbrella-beach"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-underline"><i
                                                                class="fas fa-underline"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-undo"
                                                                                                    data-search-terms="back control z exchange oops return rotate swap "><i
                                                                class="fas fa-undo"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-undo-alt"
                                                                                               data-search-terms="back control z exchange oops return swap "><i
                                                                class="fas fa-undo-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-uniregistry"><i
                                                                class="fab fa-uniregistry"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-universal-access"><i
                                                                class="fas fa-universal-access"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fas fa-university"
                                                                                                           data-search-terms="bank institution "><i
                                                                class="fas fa-university"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-unlink"
                                                                                                     data-search-terms="chain chain-broken remove "><i
                                                                class="fas fa-unlink"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-unlock"
                                                                                                 data-search-terms="admin lock password protect "><i
                                                                class="fas fa-unlock"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-unlock-alt"
                                                                                                 data-search-terms="admin lock password protect "><i
                                                                class="fas fa-unlock-alt"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-untappd"><i
                                                                class="fab fa-untappd"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-upload"
                                                                                                  data-search-terms="export publish "><i
                                                                class="fas fa-upload"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-usb"><i
                                                                class="fab fa-usb"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-user"
                                                                                              data-search-terms="account avatar head man person profile "><i
                                                                class="fas fa-user"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".far fa-user"
                                                                                               data-search-terms="account avatar head man person profile "><i
                                                                class="far fa-user"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-user-alt"
                                                                                               data-search-terms="account avatar head man person profile "><i
                                                                class="fas fa-user-alt"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-user-alt-slash"><i
                                                                class="fas fa-user-alt-slash"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-user-astronaut"
                                                                                                         data-search-terms="avatar clothing cosmonaut space suit "><i
                                                                class="fas fa-user-astronaut"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fas fa-user-check"><i
                                                                class="fas fa-user-check"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-user-circle"
                                                                                                     data-search-terms="account avatar head man person profile "><i
                                                                class="fas fa-user-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".far fa-user-circle"
                                                                                                      data-search-terms="account avatar head man person profile "><i
                                                                class="far fa-user-circle"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-user-clock"><i
                                                                class="fas fa-user-clock"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-user-cog"><i
                                                                class="fas fa-user-cog"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-user-edit"><i
                                                                class="fas fa-user-edit"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-user-friends"><i
                                                                class="fas fa-user-friends"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-user-graduate"
                                                                                                       data-search-terms="cap clothing commencement gown graduation student "><i
                                                                class="fas fa-user-graduate"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-user-lock"><i
                                                                class="fas fa-user-lock"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-user-md"
                                                                                                    data-search-terms="doctor job medical nurse occupation profile "><i
                                                                class="fas fa-user-md"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-user-minus"><i
                                                                class="fas fa-user-minus"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-user-ninja"
                                                                                                     data-search-terms="assassin avatar dangerous sneaky "><i
                                                                class="fas fa-user-ninja"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-user-plus"
                                                                                                     data-search-terms="sign up signup "><i
                                                                class="fas fa-user-plus"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fas fa-user-secret"
                                                                                                    data-search-terms="clothing coat hat incognito privacy spy whisper "><i
                                                                class="fas fa-user-secret"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-user-shield"><i
                                                                class="fas fa-user-shield"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-user-slash"><i
                                                                class="fas fa-user-slash"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-user-tag"><i
                                                                class="fas fa-user-tag"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-user-tie"
                                                                                                   data-search-terms="avatar business clothing formal "><i
                                                                class="fas fa-user-tie"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-user-times"><i
                                                                class="fas fa-user-times"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-users"
                                                                                                     data-search-terms="people persons profiles "><i
                                                                class="fas fa-users"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-users-cog"><i
                                                                class="fas fa-users-cog"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-ussunnah"><i
                                                                class="fab fa-ussunnah"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fas fa-utensil-spoon"
                                                                                                   data-search-terms="spoon "><i
                                                                class="fas fa-utensil-spoon"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-utensils"
                                                                                                        data-search-terms="cutlery dinner eat food knife restaurant spoon "><i
                                                                class="fas fa-utensils"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-vaadin"><i
                                                                class="fab fa-vaadin"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-vector-square"
                                                                                                 data-search-terms="anchors lines object "><i
                                                                class="fas fa-vector-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-venus"
                                                                                                        data-search-terms="female "><i
                                                                class="fas fa-venus"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-venus-double"><i
                                                                class="fas fa-venus-double"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-venus-mars"><i
                                                                class="fas fa-venus-mars"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-viacoin"><i
                                                                class="fab fa-viacoin"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-viadeo"><i
                                                                class="fab fa-viadeo"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-viadeo-square"><i
                                                                class="fab fa-viadeo-square"></i></a><a role="button"
                                                                                                        href="#"
                                                                                                        class="iconpicker-item"
                                                                                                        title=".fas fa-vial"
                                                                                                        data-search-terms="test tube "><i
                                                                class="fas fa-vial"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fas fa-vials"
                                                                                               data-search-terms="lab results test tubes "><i
                                                                class="fas fa-vials"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-viber"><i
                                                                class="fab fa-viber"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-video"
                                                                                                data-search-terms="camera film movie record video-camera "><i
                                                                class="fas fa-video"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-video-slash"><i
                                                                class="fas fa-video-slash"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-vimeo"><i
                                                                class="fab fa-vimeo"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-vimeo-square"><i
                                                                class="fab fa-vimeo-square"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-vimeo-v"
                                                                                                       data-search-terms="vimeo "><i
                                                                class="fab fa-vimeo-v"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-vine"><i
                                                                class="fab fa-vine"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-vk"><i
                                                                class="fab fa-vk"></i></a><a role="button" href="#"
                                                                                             class="iconpicker-item"
                                                                                             title=".fab fa-vnv"><i
                                                                class="fab fa-vnv"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fas fa-volleyball-ball"><i
                                                                class="fas fa-volleyball-ball"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-volume-down"
                                                                                                          data-search-terms="audio lower music quieter sound speaker "><i
                                                                class="fas fa-volume-down"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-volume-off"
                                                                                                      data-search-terms="audio music mute sound "><i
                                                                class="fas fa-volume-off"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-volume-up"
                                                                                                     data-search-terms="audio higher louder music sound speaker "><i
                                                                class="fas fa-volume-up"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-vuejs"><i
                                                                class="fab fa-vuejs"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-walking"><i
                                                                class="fas fa-walking"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-wallet"><i
                                                                class="fas fa-wallet"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-warehouse"><i
                                                                class="fas fa-warehouse"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-weebly"><i
                                                                class="fab fa-weebly"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-weibo"><i
                                                                class="fab fa-weibo"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-weight"
                                                                                                data-search-terms="measurement scale weight "><i
                                                                class="fas fa-weight"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-weight-hanging"
                                                                                                 data-search-terms="anvil heavy measurement "><i
                                                                class="fas fa-weight-hanging"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-weixin"><i
                                                                class="fab fa-weixin"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-whatsapp"><i
                                                                class="fab fa-whatsapp"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-whatsapp-square"><i
                                                                class="fab fa-whatsapp-square"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-wheelchair"
                                                                                                          data-search-terms="handicap person "><i
                                                                class="fas fa-wheelchair"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-whmcs"><i
                                                                class="fab fa-whmcs"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fas fa-wifi"><i
                                                                class="fas fa-wifi"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-wikipedia-w"><i
                                                                class="fab fa-wikipedia-w"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fas fa-window-close"><i
                                                                class="fas fa-window-close"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".far fa-window-close"><i
                                                                class="far fa-window-close"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fas fa-window-maximize"><i
                                                                class="fas fa-window-maximize"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-window-maximize"><i
                                                                class="far fa-window-maximize"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-window-minimize"><i
                                                                class="fas fa-window-minimize"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".far fa-window-minimize"><i
                                                                class="far fa-window-minimize"></i></a><a role="button"
                                                                                                          href="#"
                                                                                                          class="iconpicker-item"
                                                                                                          title=".fas fa-window-restore"><i
                                                                class="fas fa-window-restore"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".far fa-window-restore"><i
                                                                class="far fa-window-restore"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-windows"
                                                                                                         data-search-terms="microsoft "><i
                                                                class="fab fa-windows"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-wine-glass"><i
                                                                class="fas fa-wine-glass"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fas fa-wine-glass-alt"><i
                                                                class="fas fa-wine-glass-alt"></i></a><a role="button"
                                                                                                         href="#"
                                                                                                         class="iconpicker-item"
                                                                                                         title=".fab fa-wix"><i
                                                                class="fab fa-wix"></i></a><a role="button" href="#"
                                                                                              class="iconpicker-item"
                                                                                              title=".fab fa-wolf-pack-battalion"><i
                                                                class="fab fa-wolf-pack-battalion"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-won-sign" data-search-terms="krw krw "><i
                                                                class="fas fa-won-sign"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-wordpress"><i
                                                                class="fab fa-wordpress"></i></a><a role="button"
                                                                                                    href="#"
                                                                                                    class="iconpicker-item"
                                                                                                    title=".fab fa-wordpress-simple"><i
                                                                class="fab fa-wordpress-simple"></i></a><a role="button"
                                                                                                           href="#"
                                                                                                           class="iconpicker-item"
                                                                                                           title=".fab fa-wpbeginner"><i
                                                                class="fab fa-wpbeginner"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-wpexplorer"><i
                                                                class="fab fa-wpexplorer"></i></a><a role="button"
                                                                                                     href="#"
                                                                                                     class="iconpicker-item"
                                                                                                     title=".fab fa-wpforms"><i
                                                                class="fab fa-wpforms"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fas fa-wrench"
                                                                                                  data-search-terms="fix settings spanner tool update "><i
                                                                class="fas fa-wrench"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fas fa-x-ray"
                                                                                                 data-search-terms="radiological images radiology "><i
                                                                class="fas fa-x-ray"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-xbox"><i
                                                                class="fab fa-xbox"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-xing"><i
                                                                class="fab fa-xing"></i></a><a role="button" href="#"
                                                                                               class="iconpicker-item"
                                                                                               title=".fab fa-xing-square"><i
                                                                class="fab fa-xing-square"></i></a><a role="button"
                                                                                                      href="#"
                                                                                                      class="iconpicker-item"
                                                                                                      title=".fab fa-y-combinator"><i
                                                                class="fab fa-y-combinator"></i></a><a role="button"
                                                                                                       href="#"
                                                                                                       class="iconpicker-item"
                                                                                                       title=".fab fa-yahoo"><i
                                                                class="fab fa-yahoo"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-yandex"><i
                                                                class="fab fa-yandex"></i></a><a role="button" href="#"
                                                                                                 class="iconpicker-item"
                                                                                                 title=".fab fa-yandex-international"><i
                                                                class="fab fa-yandex-international"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fab fa-yelp"><i class="fab fa-yelp"></i></a><a
                                                            role="button" href="#" class="iconpicker-item"
                                                            title=".fas fa-yen-sign" data-search-terms="jpy jpy "><i
                                                                class="fas fa-yen-sign"></i></a><a role="button"
                                                                                                   href="#"
                                                                                                   class="iconpicker-item"
                                                                                                   title=".fab fa-yoast"><i
                                                                class="fab fa-yoast"></i></a><a role="button" href="#"
                                                                                                class="iconpicker-item"
                                                                                                title=".fab fa-youtube"
                                                                                                data-search-terms="film video youtube-play youtube-square "><i
                                                                class="fab fa-youtube"></i></a><a role="button" href="#"
                                                                                                  class="iconpicker-item"
                                                                                                  title=".fab fa-youtube-square"><i
                                                                class="fab fa-youtube-square"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1 text-center font-icon-added">
                                    <i id="font-show-area"></i>
                                </div>
                            </div>
                            <div class="form-group bord-top">
                                <label class="col-sm-2 control-label" for="input-total"><span data-toggle="tooltip"
                                                                                              title=""
                                                                                              data-original-title="Image Title">Image</span></label>
                                <div class="col-sm-10">
                                    <div class="bestbetter-modal">
                                        <!-- Trigger the modal with a button -->
                                        <div class="bestbetter-modal-open">
                                            <input type="text" name="image"
                                                   value="https://lorempixel.com/640/480/?83858" placeholder="file name"
                                                   class="modal-input-path media_5bcdf56ca016a" readonly="">
                                            <button type="button" data-multiple="false" id="media_5bcdf56ca016a"
                                                    class="btn btn-lg " data-toggle="modal" data-target="#myModal">Open
                                                Modal
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <input class="btn btn-info button_save" type="submit" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop()
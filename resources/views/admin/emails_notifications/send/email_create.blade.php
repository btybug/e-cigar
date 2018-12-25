@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="pull-left">
                <h3></h3>
                <form method="POST" action="http://core.bootydev.co.uk/admin/emails-notifications/edit-template/1" accept-charset="UTF-8"><input name="_token" type="hidden" value="WvhiiJekhAQ769WfjUlxZuBC761WdW80g2vSROjw">
                </form></div>
            <div class="pull-right">
                <div class="text-right btn-save">
                    <button type="submit" class="btn btn-success btn-view">View Template</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </div>

        <div class="panel-body">

            <div class="tab-content tabs_content col-md-8">

                <div id="home" class="tab-pane tab_info fade in active">

                    <div class="sortable-panels">
                        <div class="form-group">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link" id="tab1-tab" data-toggle="tab" href="#tab1">To User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2">To Admin</a>
                                </li>
                            </ul>
                            <div class="tab-content tab-content-store-settings">
                                <div class="tab-pane fade active in" id="tab1" aria-labelledby="tab1-tab">
                                    <div class="form-group row">
                                        <label for="from" class="col-sm-3">From</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="from" name="from"><option value="hakobyan.sahak88@gmail.com">hakobyan.sahak88@gmail.com</option><option value="hr@hook.am" selected="selected">hr@hook.am</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="to" class="col-sm-3">To</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="from" readonly="" disabled="" type="text" value="{user}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul class="nav nav-tabs">
                                            <li class=" active "><a data-toggle="tab" href="#gb">
                                                    <span class="flag-icon flag-icon-gb"></span> gb
                                                </a></li>
                                        </ul>
                                        <div class="tab-content pt-25">
                                            <div id="gb" class="tab-pane fade   in active ">
                                                <div class="form-group row">
                                                    <label for="subject_gb" class="col-sm-3">Subject</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="subject_am" placeholder="Subject" name="translatable[gb][subject]" type="text" value="please confirm">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="content_gb" class="col-sm-3">Content</label>
                                                    <div class="col-sm-9">
                                                        <div id="mceu_16" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_16-body" class="mce-container-body mce-stack-layout"><div id="mceu_17" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_17-body" class="mce-container-body"><div id="mceu_18" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_18-body" class="mce-container-body mce-flow-layout"><div id="mceu_19" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_19" role="menuitem" aria-haspopup="true"><button id="mceu_19-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div><div id="mceu_20" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_20" role="menuitem" aria-haspopup="true"><button id="mceu_20-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div><div id="mceu_21" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_21" role="menuitem" aria-haspopup="true"><button id="mceu_21-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div><div id="mceu_22" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_22" role="menuitem" aria-haspopup="true"><button id="mceu_22-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Insert</span> <i class="mce-caret"></i></button></div><div id="mceu_23" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_23" role="menuitem" aria-haspopup="true"><button id="mceu_23-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div><div id="mceu_24" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_24" role="menuitem" aria-haspopup="true"><button id="mceu_24-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Table</span> <i class="mce-caret"></i></button></div><div id="mceu_25" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_25" role="menuitem" aria-haspopup="true"><button id="mceu_25-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Help</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_26" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_26-body" class="mce-container-body mce-stack-layout"><div id="mceu_27" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_27-body" class="mce-container-body mce-flow-layout"><div id="mceu_28" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_28-body"><div id="mceu_0" class="mce-widget mce-btn mce-menubtn mce-fixed-width mce-listbox mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_0" role="button" aria-haspopup="true"><button id="mceu_0-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Paragraph</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_29" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_29-body"><div id="mceu_1" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_1-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_2" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_2-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div><div id="mceu_3" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Strikethrough"><button id="mceu_3-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-strikethrough"></i></button></div><div id="mceu_4" class="mce-widget mce-btn mce-splitbtn mce-colorbutton" role="button" tabindex="-1" aria-haspopup="true" aria-label="Text color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-forecolor"></i><span id="mceu_4-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_5" class="mce-widget mce-btn mce-splitbtn mce-colorbutton mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Background color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-backcolor"></i><span id="mceu_5-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div></div></div><div id="mceu_30" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_30-body"><div id="mceu_6" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit link"><button id="mceu_6-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div></div></div><div id="mceu_31" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_31-body"><div id="mceu_7" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_7-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_8" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_8-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_9" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_9-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_10" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_10-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_32" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_32-body"><div id="mceu_11" class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first" role="button" aria-pressed="false" tabindex="-1" aria-label="Numbered list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_12" class="mce-widget mce-btn mce-splitbtn mce-menubtn" role="button" aria-pressed="false" tabindex="-1" aria-label="Bullet list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_13" class="mce-widget mce-btn" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_13-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_14" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_14-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_33" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_33-body"><div id="mceu_15" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" role="button" aria-label="Clear formatting"><button id="mceu_15-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-removeformat"></i></button></div></div></div></div></div></div></div></div></div><div id="mceu_34" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="translatable[gb][content]_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 500px; display: block;"></iframe></div><div id="mceu_35" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_35-body" class="mce-container-body mce-flow-layout"><div id="mceu_36" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><span id="mceu_78" class="mce-wordcount mce-widget mce-label mce-flow-layout-item">8 words</span><div id="mceu_37" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_38" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tinymce.com/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank" role="presentation" tabindex="-1">tinymce</a></span></div></div></div></div><textarea class="form-control content_editor" cols="30" rows="2" placeholder="Content" name="translatable[gb][content]" id="translatable[gb][content]" aria-hidden="true" style="display: none;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;Hi&nbsp;&lt;span style="background-color: #ecf0f5; color: #333333; font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif; font-weight: bold;"&gt;[receiver_name]&nbsp; &lt;a href="[confirmation_link]"&gt;click here&lt;/a&gt;&nbsp; to confirm your email&lt;/span&gt;&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div class="form-group row">
                                        <label for="admin_from" class="col-sm-3">From</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="admin_from" name="admin[from]"><option value="hakobyan.sahak88@gmail.com">hakobyan.sahak88@gmail.com</option><option value="hr@hook.am" selected="selected">hr@hook.am</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="to_admin" class="col-sm-3">To</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="to_admin" name="admin[to]"><option value="hakobyan.sahak88@gmail.com" selected="selected">hakobyan.sahak88@gmail.com</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul class="nav nav-tabs">
                                            <li class=" active "><a data-toggle="tab" href="#gb">
                                                    <span class="flag-icon flag-icon-gb"></span> gb
                                                </a></li>
                                        </ul>
                                        <div class="tab-content pt-25">
                                            <div id="gb" class="tab-pane fade   in active ">
                                                <div class="form-group row">
                                                    <label for="subject_gb" class="col-sm-3">Subject</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="admin_subject_am" placeholder="Subject" name="admin[translatable][gb][subject]" type="text" value="xascsdcsd">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="content_gb" class="col-sm-3">Content</label>
                                                    <div class="col-sm-9">
                                                        <div id="mceu_55" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px; width: 100%;"><div id="mceu_55-body" class="mce-container-body mce-stack-layout"><div id="mceu_56" class="mce-top-part mce-container mce-stack-layout-item mce-first"><div id="mceu_56-body" class="mce-container-body"><div id="mceu_57" class="mce-container mce-menubar mce-toolbar mce-first" role="menubar" style="border-width: 0px 0px 1px;"><div id="mceu_57-body" class="mce-container-body mce-flow-layout"><div id="mceu_58" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-first mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_58" role="menuitem" aria-haspopup="true"><button id="mceu_58-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">File</span> <i class="mce-caret"></i></button></div><div id="mceu_59" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_59" role="menuitem" aria-haspopup="true"><button id="mceu_59-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Edit</span> <i class="mce-caret"></i></button></div><div id="mceu_60" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_60" role="menuitem" aria-haspopup="true"><button id="mceu_60-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">View</span> <i class="mce-caret"></i></button></div><div id="mceu_61" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_61" role="menuitem" aria-haspopup="true"><button id="mceu_61-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Insert</span> <i class="mce-caret"></i></button></div><div id="mceu_62" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_62" role="menuitem" aria-haspopup="true"><button id="mceu_62-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Format</span> <i class="mce-caret"></i></button></div><div id="mceu_63" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_63" role="menuitem" aria-haspopup="true"><button id="mceu_63-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Table</span> <i class="mce-caret"></i></button></div><div id="mceu_64" class="mce-widget mce-btn mce-menubtn mce-flow-layout-item mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_64" role="menuitem" aria-haspopup="true"><button id="mceu_64-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Help</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_65" class="mce-toolbar-grp mce-container mce-panel mce-last" hidefocus="1" tabindex="-1" role="group"><div id="mceu_65-body" class="mce-container-body mce-stack-layout"><div id="mceu_66" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_66-body" class="mce-container-body mce-flow-layout"><div id="mceu_67" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_67-body"><div id="mceu_39" class="mce-widget mce-btn mce-menubtn mce-fixed-width mce-listbox mce-first mce-last mce-btn-has-text" tabindex="-1" aria-labelledby="mceu_39" role="button" aria-haspopup="true"><button id="mceu_39-open" role="presentation" type="button" tabindex="-1"><span class="mce-txt">Paragraph</span> <i class="mce-caret"></i></button></div></div></div><div id="mceu_68" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_68-body"><div id="mceu_40" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Bold"><button id="mceu_40-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_41" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Italic"><button id="mceu_41-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div><div id="mceu_42" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Strikethrough"><button id="mceu_42-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-strikethrough"></i></button></div><div id="mceu_43" class="mce-widget mce-btn mce-splitbtn mce-colorbutton" role="button" tabindex="-1" aria-haspopup="true" aria-label="Text color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-forecolor"></i><span id="mceu_43-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_44" class="mce-widget mce-btn mce-splitbtn mce-colorbutton mce-last" role="button" tabindex="-1" aria-haspopup="true" aria-label="Background color"><button role="presentation" hidefocus="1" type="button" tabindex="-1"><i class="mce-ico mce-i-backcolor"></i><span id="mceu_44-preview" class="mce-preview"></span></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div></div></div><div id="mceu_69" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_69-body"><div id="mceu_45" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Insert/edit link"><button id="mceu_45-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></div></div></div><div id="mceu_70" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_70-body"><div id="mceu_46" class="mce-widget mce-btn mce-first" tabindex="-1" aria-pressed="false" role="button" aria-label="Align left"><button id="mceu_46-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_47" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align center"><button id="mceu_47-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_48" class="mce-widget mce-btn" tabindex="-1" aria-pressed="false" role="button" aria-label="Align right"><button id="mceu_48-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_49" class="mce-widget mce-btn mce-last" tabindex="-1" aria-pressed="false" role="button" aria-label="Justify"><button id="mceu_49-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_71" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_71-body"><div id="mceu_50" class="mce-widget mce-btn mce-splitbtn mce-menubtn mce-first" role="button" aria-pressed="false" tabindex="-1" aria-label="Numbered list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_51" class="mce-widget mce-btn mce-splitbtn mce-menubtn" role="button" aria-pressed="false" tabindex="-1" aria-label="Bullet list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_52" class="mce-widget mce-btn" tabindex="-1" role="button" aria-label="Decrease indent"><button id="mceu_52-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-outdent"></i></button></div><div id="mceu_53" class="mce-widget mce-btn mce-last" tabindex="-1" role="button" aria-label="Increase indent"><button id="mceu_53-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-indent"></i></button></div></div></div><div id="mceu_72" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_72-body"><div id="mceu_54" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" role="button" aria-label="Clear formatting"><button id="mceu_54-button" role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-removeformat"></i></button></div></div></div></div></div></div></div></div></div><div id="mceu_73" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="admin[translatable][gb][content]_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 500px; display: block;"></iframe></div><div id="mceu_74" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_74-body" class="mce-container-body mce-flow-layout"><div id="mceu_75" class="mce-path mce-flow-layout-item mce-first"><div class="mce-path-item">&nbsp;</div></div><span id="mceu_79" class="mce-wordcount mce-widget mce-label mce-flow-layout-item">1 words</span><div id="mceu_76" class="mce-flow-layout-item mce-resizehandle"><i class="mce-ico mce-i-resize"></i></div><span id="mceu_77" class="mce-branding mce-widget mce-label mce-flow-layout-item mce-last"> Powered by <a href="https://www.tinymce.com/?utm_campaign=editor_referral&amp;utm_medium=poweredby&amp;utm_source=tinymce" rel="noopener" target="_blank" role="presentation" tabindex="-1">tinymce</a></span></div></div></div></div><textarea class="form-control content_editor" cols="30" rows="2" placeholder="Content" name="admin[translatable][gb][content]" id="admin[translatable][gb][content]" aria-hidden="true" style="display: none;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;zdfgsfgsd&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <table class="table table-striped table--email-temp mb-50">
                    <thead>
                    <tr class="table--email-temp_top">
                        <th colspan="3">Specific shortcodes for this type</th>
                    </tr>
                    <tr class="table--email-temp_bottom">
                        <th></th>
                        <th>Code</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[confirmation_link]</b></td>
                        <td>url witch will confirm user email</td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-striped table--email-temp">
                    <thead>
                    <tr class="table--email-temp_top">
                        <th colspan="3">Common Shortcodes</th>
                    </tr>
                    <tr class="table--email-temp_bottom">
                        <th></th>
                        <th>Property</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_name]</b></td>
                        <td>your site name </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_name]</b></td>
                        <td>your site url </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[app_blog_url]</b></td>
                        <td>your site blog url </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_name]</b></td>
                        <td>email receiver user name</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_last_name]</b></td>
                        <td>email receiver user last name</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-file-text-o table--email-temp_icon" aria-hidden="true"></i></td>
                        <td><b>[receiver_last_phone]</b></td>
                        <td>email receiver user last name</td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group row border-top">
                    <label for="is_active" class="col-sm-3">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="to_admin" name="is_active"><option value="1" selected="selected">Active</option><option value="0">Inactive</option></select>
                    </div>
                </div>
            </div>


        </div>


    </div>
@stop
@section('js')
    <script src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        function initTinyMce(e) {
            tinymce.init({
                selector: e,
                height: 500,
                theme: 'modern',
                plugins: 'print preview fullpage  searchreplace autolink directionality  visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern help',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                image_advtab: true,
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ],
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                ]
            });
        }
        initTinyMce(".content_editor")
        $('#form').submit(function () {
            tinyMCE.triggerSave()
            // DO STUFF...
            return true; // return false to cancel form action
        });
    </script>
@stop
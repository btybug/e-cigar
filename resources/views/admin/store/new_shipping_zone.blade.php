@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="pull-right">
                    <button type="submit" form="form-geo-zone" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button>
                    <a href="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                <h1>Geo Zones</h1>
                <ul class="breadcrumb">
                    <li><a href="https://demo.opencart.com/admin/index.php?route=common/dashboard&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo">Home</a></li>
                    <li><a href="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo">Geo Zones</a></li>
                </ul>
            </div>
        </div>
        <div class="container-fluid"> <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Geo Zone</h3>
                </div>
                <div class="panel-body">
                    <form action="https://demo.opencart.com/admin/index.php?route=localisation/geo_zone/add&amp;user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo" method="post" enctype="multipart/form-data" id="form-geo-zone" class="form-horizontal">
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-name">Geo Zone Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="" placeholder="Geo Zone Name" id="input-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-description">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" value="" placeholder="Description" id="input-description" class="form-control">
                            </div>
                        </div>
                        <fieldset>
                            <legend>Geo Zones</legend>
                            <table id="zone-to-geo-zone" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-left">Country</td>
                                    <td class="text-left">Category</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        <select id="country" class="form-control">
                                    @if(isset($countries) && count($countries))
                                                <option selected="">Choose...</option>
                                            @foreach($countries as $country)
                                                <option>{!! $country !!}</option>
                                            @endforeach
                                    @endif
                                        </select>
                                    </td>
                                    <td class="text-left">
                                        <select id="category" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                            <option>...</option>
                                            <option>...</option>
                                        </select>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript"><!--
            var zone_to_geo_zone_row = 0;

            $('#button-geo-zone').on('click', function() {
                html  = '<tr id="zone-to-geo-zone-row' + zone_to_geo_zone_row + '">';
                html += '  <td class="text-left"><select name="zone_to_geo_zone[' + zone_to_geo_zone_row + '][country_id]" class="form-control" data-index="' + zone_to_geo_zone_row + '">';
                html += '    <option value="244">Aaland\x20Islands</option>';
                html += '    <option value="1">Afghanistan</option>';
                html += '    <option value="2">Albania</option>';
                html += '    <option value="3">Algeria</option>';
                html += '    <option value="4">American\x20Samoa</option>';
                html += '    <option value="5">Andorra</option>';
                html += '    <option value="6">Angola</option>';
                html += '    <option value="7">Anguilla</option>';
                html += '    <option value="8">Antarctica</option>';
                html += '    <option value="9">Antigua\x20and\x20Barbuda</option>';
                html += '    <option value="10">Argentina</option>';
                html += '    <option value="11">Armenia</option>';
                html += '    <option value="12">Aruba</option>';
                html += '    <option value="252">Ascension\x20Island\x20\x28British\x29</option>';
                html += '    <option value="13">Australia</option>';
                html += '    <option value="14">Austria</option>';
                html += '    <option value="15">Azerbaijan</option>';
                html += '    <option value="16">Bahamas</option>';
                html += '    <option value="17">Bahrain</option>';
                html += '    <option value="18">Bangladesh</option>';
                html += '    <option value="19">Barbados</option>';
                html += '    <option value="20">Belarus</option>';
                html += '    <option value="21">Belgium</option>';
                html += '    <option value="22">Belize</option>';
                html += '    <option value="23">Benin</option>';
                html += '    <option value="24">Bermuda</option>';
                html += '    <option value="25">Bhutan</option>';
                html += '    <option value="26">Bolivia</option>';
                html += '    <option value="245">Bonaire,\x20Sint\x20Eustatius\x20and\x20Saba</option>';
                html += '    <option value="27">Bosnia\x20and\x20Herzegovina</option>';
                html += '    <option value="28">Botswana</option>';
                html += '    <option value="29">Bouvet\x20Island</option>';
                html += '    <option value="30">Brazil</option>';
                html += '    <option value="31">British\x20Indian\x20Ocean\x20Territory</option>';
                html += '    <option value="32">Brunei\x20Darussalam</option>';
                html += '    <option value="33">Bulgaria</option>';
                html += '    <option value="34">Burkina\x20Faso</option>';
                html += '    <option value="35">Burundi</option>';
                html += '    <option value="36">Cambodia</option>';
                html += '    <option value="37">Cameroon</option>';
                html += '    <option value="38">Canada</option>';
                html += '    <option value="251">Canary\x20Islands</option>';
                html += '    <option value="39">Cape\x20Verde</option>';
                html += '    <option value="40">Cayman\x20Islands</option>';
                html += '    <option value="41">Central\x20African\x20Republic</option>';
                html += '    <option value="42">Chad</option>';
                html += '    <option value="43">Chile</option>';
                html += '    <option value="44">China</option>';
                html += '    <option value="45">Christmas\x20Island</option>';
                html += '    <option value="46">Cocos\x20\x28Keeling\x29\x20Islands</option>';
                html += '    <option value="47">Colombia</option>';
                html += '    <option value="48">Comoros</option>';
                html += '    <option value="49">Congo</option>';
                html += '    <option value="50">Cook\x20Islands</option>';
                html += '    <option value="51">Costa\x20Rica</option>';
                html += '    <option value="52">Cote\x20D\x27Ivoire</option>';
                html += '    <option value="53">Croatia</option>';
                html += '    <option value="54">Cuba</option>';
                html += '    <option value="246">Curacao</option>';
                html += '    <option value="55">Cyprus</option>';
                html += '    <option value="56">Czech\x20Republic</option>';
                html += '    <option value="237">Democratic\x20Republic\x20of\x20Congo</option>';
                html += '    <option value="57">Denmark</option>';
                html += '    <option value="58">Djibouti</option>';
                html += '    <option value="59">Dominica</option>';
                html += '    <option value="60">Dominican\x20Republic</option>';
                html += '    <option value="61">East\x20Timor</option>';
                html += '    <option value="62">Ecuador</option>';
                html += '    <option value="63">Egypt</option>';
                html += '    <option value="64">El\x20Salvador</option>';
                html += '    <option value="65">Equatorial\x20Guinea</option>';
                html += '    <option value="66">Eritrea</option>';
                html += '    <option value="67">Estonia</option>';
                html += '    <option value="68">Ethiopia</option>';
                html += '    <option value="69">Falkland\x20Islands\x20\x28Malvinas\x29</option>';
                html += '    <option value="70">Faroe\x20Islands</option>';
                html += '    <option value="71">Fiji</option>';
                html += '    <option value="72">Finland</option>';
                html += '    <option value="74">France,\x20Metropolitan</option>';
                html += '    <option value="75">French\x20Guiana</option>';
                html += '    <option value="76">French\x20Polynesia</option>';
                html += '    <option value="77">French\x20Southern\x20Territories</option>';
                html += '    <option value="126">FYROM</option>';
                html += '    <option value="78">Gabon</option>';
                html += '    <option value="79">Gambia</option>';
                html += '    <option value="80">Georgia</option>';
                html += '    <option value="81">Germany</option>';
                html += '    <option value="82">Ghana</option>';
                html += '    <option value="83">Gibraltar</option>';
                html += '    <option value="84">Greece</option>';
                html += '    <option value="85">Greenland</option>';
                html += '    <option value="86">Grenada</option>';
                html += '    <option value="87">Guadeloupe</option>';
                html += '    <option value="88">Guam</option>';
                html += '    <option value="89">Guatemala</option>';
                html += '    <option value="256">Guernsey</option>';
                html += '    <option value="90">Guinea</option>';
                html += '    <option value="91">Guinea\x2DBissau</option>';
                html += '    <option value="92">Guyana</option>';
                html += '    <option value="93">Haiti</option>';
                html += '    <option value="94">Heard\x20and\x20Mc\x20Donald\x20Islands</option>';
                html += '    <option value="95">Honduras</option>';
                html += '    <option value="96">Hong\x20Kong</option>';
                html += '    <option value="97">Hungary</option>';
                html += '    <option value="98">Iceland</option>';
                html += '    <option value="99">India</option>';
                html += '    <option value="100">Indonesia</option>';
                html += '    <option value="101">Iran\x20\x28Islamic\x20Republic\x20of\x29</option>';
                html += '    <option value="102">Iraq</option>';
                html += '    <option value="103">Ireland</option>';
                html += '    <option value="254">Isle\x20of\x20Man</option>';
                html += '    <option value="104">Israel</option>';
                html += '    <option value="105">Italy</option>';
                html += '    <option value="106">Jamaica</option>';
                html += '    <option value="107">Japan</option>';
                html += '    <option value="257">Jersey</option>';
                html += '    <option value="108">Jordan</option>';
                html += '    <option value="109">Kazakhstan</option>';
                html += '    <option value="110">Kenya</option>';
                html += '    <option value="111">Kiribati</option>';
                html += '    <option value="253">Kosovo,\x20Republic\x20of</option>';
                html += '    <option value="114">Kuwait</option>';
                html += '    <option value="115">Kyrgyzstan</option>';
                html += '    <option value="116">Lao\x20People\x27s\x20Democratic\x20Republic</option>';
                html += '    <option value="117">Latvia</option>';
                html += '    <option value="118">Lebanon</option>';
                html += '    <option value="119">Lesotho</option>';
                html += '    <option value="120">Liberia</option>';
                html += '    <option value="121">Libyan\x20Arab\x20Jamahiriya</option>';
                html += '    <option value="122">Liechtenstein</option>';
                html += '    <option value="123">Lithuania</option>';
                html += '    <option value="124">Luxembourg</option>';
                html += '    <option value="125">Macau</option>';
                html += '    <option value="127">Madagascar</option>';
                html += '    <option value="128">Malawi</option>';
                html += '    <option value="129">Malaysia</option>';
                html += '    <option value="130">Maldives</option>';
                html += '    <option value="131">Mali</option>';
                html += '    <option value="132">Malta</option>';
                html += '    <option value="133">Marshall\x20Islands</option>';
                html += '    <option value="134">Martinique</option>';
                html += '    <option value="135">Mauritania</option>';
                html += '    <option value="136">Mauritius</option>';
                html += '    <option value="137">Mayotte</option>';
                html += '    <option value="138">Mexico</option>';
                html += '    <option value="139">Micronesia,\x20Federated\x20States\x20of</option>';
                html += '    <option value="140">Moldova,\x20Republic\x20of</option>';
                html += '    <option value="141">Monaco</option>';
                html += '    <option value="142">Mongolia</option>';
                html += '    <option value="242">Montenegro</option>';
                html += '    <option value="143">Montserrat</option>';
                html += '    <option value="144">Morocco</option>';
                html += '    <option value="145">Mozambique</option>';
                html += '    <option value="146">Myanmar</option>';
                html += '    <option value="147">Namibia</option>';
                html += '    <option value="148">Nauru</option>';
                html += '    <option value="149">Nepal</option>';
                html += '    <option value="150">Netherlands</option>';
                html += '    <option value="151">Netherlands\x20Antilles</option>';
                html += '    <option value="152">New\x20Caledonia</option>';
                html += '    <option value="153">New\x20Zealand</option>';
                html += '    <option value="154">Nicaragua</option>';
                html += '    <option value="155">Niger</option>';
                html += '    <option value="156">Nigeria</option>';
                html += '    <option value="157">Niue</option>';
                html += '    <option value="158">Norfolk\x20Island</option>';
                html += '    <option value="112">North\x20Korea</option>';
                html += '    <option value="159">Northern\x20Mariana\x20Islands</option>';
                html += '    <option value="160">Norway</option>';
                html += '    <option value="161">Oman</option>';
                html += '    <option value="162">Pakistan</option>';
                html += '    <option value="163">Palau</option>';
                html += '    <option value="247">Palestinian\x20Territory,\x20Occupied</option>';
                html += '    <option value="164">Panama</option>';
                html += '    <option value="165">Papua\x20New\x20Guinea</option>';
                html += '    <option value="166">Paraguay</option>';
                html += '    <option value="167">Peru</option>';
                html += '    <option value="168">Philippines</option>';
                html += '    <option value="169">Pitcairn</option>';
                html += '    <option value="170">Poland</option>';
                html += '    <option value="171">Portugal</option>';
                html += '    <option value="172">Puerto\x20Rico</option>';
                html += '    <option value="173">Qatar</option>';
                html += '    <option value="174">Reunion</option>';
                html += '    <option value="175">Romania</option>';
                html += '    <option value="176">Russian\x20Federation</option>';
                html += '    <option value="177">Rwanda</option>';
                html += '    <option value="178">Saint\x20Kitts\x20and\x20Nevis</option>';
                html += '    <option value="179">Saint\x20Lucia</option>';
                html += '    <option value="180">Saint\x20Vincent\x20and\x20the\x20Grenadines</option>';
                html += '    <option value="181">Samoa</option>';
                html += '    <option value="182">San\x20Marino</option>';
                html += '    <option value="183">Sao\x20Tome\x20and\x20Principe</option>';
                html += '    <option value="184">Saudi\x20Arabia</option>';
                html += '    <option value="185">Senegal</option>';
                html += '    <option value="243">Serbia</option>';
                html += '    <option value="186">Seychelles</option>';
                html += '    <option value="187">Sierra\x20Leone</option>';
                html += '    <option value="188">Singapore</option>';
                html += '    <option value="189">Slovak\x20Republic</option>';
                html += '    <option value="190">Slovenia</option>';
                html += '    <option value="191">Solomon\x20Islands</option>';
                html += '    <option value="192">Somalia</option>';
                html += '    <option value="193">South\x20Africa</option>';
                html += '    <option value="194">South\x20Georgia\x20\x26amp\x3B\x20South\x20Sandwich\x20Islands</option>';
                html += '    <option value="113">South\x20Korea</option>';
                html += '    <option value="248">South\x20Sudan</option>';
                html += '    <option value="195">Spain</option>';
                html += '    <option value="196">Sri\x20Lanka</option>';
                html += '    <option value="249">St.\x20Barthelemy</option>';
                html += '    <option value="197">St.\x20Helena</option>';
                html += '    <option value="250">St.\x20Martin\x20\x28French\x20part\x29</option>';
                html += '    <option value="198">St.\x20Pierre\x20and\x20Miquelon</option>';
                html += '    <option value="199">Sudan</option>';
                html += '    <option value="200">Suriname</option>';
                html += '    <option value="201">Svalbard\x20and\x20Jan\x20Mayen\x20Islands</option>';
                html += '    <option value="202">Swaziland</option>';
                html += '    <option value="203">Sweden</option>';
                html += '    <option value="204">Switzerland</option>';
                html += '    <option value="205">Syrian\x20Arab\x20Republic</option>';
                html += '    <option value="206">Taiwan</option>';
                html += '    <option value="207">Tajikistan</option>';
                html += '    <option value="208">Tanzania,\x20United\x20Republic\x20of</option>';
                html += '    <option value="209">Thailand</option>';
                html += '    <option value="210">Togo</option>';
                html += '    <option value="211">Tokelau</option>';
                html += '    <option value="212">Tonga</option>';
                html += '    <option value="213">Trinidad\x20and\x20Tobago</option>';
                html += '    <option value="255">Tristan\x20da\x20Cunha</option>';
                html += '    <option value="214">Tunisia</option>';
                html += '    <option value="215">Turkey</option>';
                html += '    <option value="216">Turkmenistan</option>';
                html += '    <option value="217">Turks\x20and\x20Caicos\x20Islands</option>';
                html += '    <option value="218">Tuvalu</option>';
                html += '    <option value="219">Uganda</option>';
                html += '    <option value="220">Ukraine</option>';
                html += '    <option value="221">United\x20Arab\x20Emirates</option>';
                html += '    <option value="222">United\x20Kingdom</option>';
                html += '    <option value="223">United\x20States</option>';
                html += '    <option value="224">United\x20States\x20Minor\x20Outlying\x20Islands</option>';
                html += '    <option value="225">Uruguay</option>';
                html += '    <option value="226">Uzbekistan</option>';
                html += '    <option value="227">Vanuatu</option>';
                html += '    <option value="228">Vatican\x20City\x20State\x20\x28Holy\x20See\x29</option>';
                html += '    <option value="229">Venezuela</option>';
                html += '    <option value="230">Viet\x20Nam</option>';
                html += '    <option value="231">Virgin\x20Islands\x20\x28British\x29</option>';
                html += '    <option value="232">Virgin\x20Islands\x20\x28U.S.\x29</option>';
                html += '    <option value="233">Wallis\x20and\x20Futuna\x20Islands</option>';
                html += '    <option value="234">Western\x20Sahara</option>';
                html += '    <option value="235">Yemen</option>';
                html += '    <option value="238">Zambia</option>';
                html += '    <option value="239">Zimbabwe</option>';

                html += '</select></td>';
                html += '  <td class="text-left"><select name="zone_to_geo_zone[' + zone_to_geo_zone_row + '][zone_id]" class="form-control"><option value="0">All Zones</option></select></td>';
                html += '  <td class="text-left"><button type="button" onclick="$(\'#zone-to-geo-zone-row' + zone_to_geo_zone_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
                html += '</tr>';

                $('#zone-to-geo-zone tbody').append(html);

                $('zone_to_geo_zone[' + zone_to_geo_zone_row + '][country_id]').trigger();

                zone_to_geo_zone_row++;
            });

            $('#zone-to-geo-zone').on('change', 'select[name$=\'[country_id]\']', function() {
                var element = this;

                if (element.value) {
                    $.ajax({
                        url: 'index.php?route=localisation/country/country&user_token=5ZIhyLUuRBv9guwPRjMVyzvQT7RwHXEo&country_id=' + element.value,
                        dataType: 'json',
                        beforeSend: function() {
                            $(element).prop('disabled', true);
                            $('button[form=\'form-geo-zone\']').prop('disabled', true);
                        },
                        complete: function() {
                            $(element).prop('disabled', false);
                            $('button[form=\'form-geo-zone\']').prop('disabled', false);
                        },
                        success: function(json) {
                            html = '<option value="0">All Zones</option>';

                            if (json['zone'] && json['zone'] != '') {
                                for (i = 0; i < json['zone'].length; i++) {
                                    html += '<option value="' + json['zone'][i]['zone_id'] + '"';

                                    if (json['zone'][i]['zone_id'] == $(element).attr('data-zone-id')) {
                                        html += ' selected="selected"';
                                    }

                                    html += '>' + json['zone'][i]['name'] + '</option>';
                                }
                            }

                            $('select[name=\'zone_to_geo_zone[' + $(element).attr('data-index') + '][zone_id]\']').html(html);

                            $('select[name=\'zone_to_geo_zone[' + $(element).attr('data-index') + '][zone_id]\']').prop('disabled', false);

                            $('select[name$=\'[country_id]\']:disabled:first').trigger('change');
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                }
            });

            $('select[name$=\'[country_id]\']:disabled:first').trigger('change');
            //--></script></div>
@stop
@section('js')

@stop
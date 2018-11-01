@extends('layouts.frontend')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_address'])
            </div>
            <div class="col-md-9">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address active" id="billingAddress-tab" data-toggle="tab" href="#billingAddress" role="tab" aria-controls="billingAddress" aria-selected="true" aria-expanded="true">Billing Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="shippingAddress-tab" data-toggle="tab" href="#shippingAddress" role="tab" aria-controls="shippingAddress">Shipping Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="addressBook-tab" data-toggle="tab" href="#addressBook" role="tab" aria-controls="addressBook">Address Book</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in show p-4" id="billingAddress" role="tabpanel" aria-labelledby="billingAddress-tab">
                            <form method="POST" action="http://e-cigar.loc/my-account/address" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="onAcmHXgLYmmgLs8AJs7r5N7tVrctAHZeFXYmA3k">
                                <h2 class="mb-3">Billing Address</h2>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Name</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="first_name" type="text">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="last_name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="company" type="text" value="dfbdhsth">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="first_line_address" type="text" value="56 lolol">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="second_line_address" type="text" value="ss">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2-hidden-accessible" id="country" name="country" data-select2-id="country" tabindex="-1" aria-hidden="true"><option value="">SELECT</option><option value="Aruba">Aruba</option><option value="Afghanistan">Afghanistan</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Åland Islands">Åland Islands</option><option value="Albania">Albania</option><option value="Andorra">Andorra</option><option value="United Arab Emirates">United Arab Emirates</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="American Samoa">American Samoa</option><option value="Antarctica">Antarctica</option><option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Burundi">Burundi</option><option value="Belgium">Belgium</option><option value="Benin">Benin</option><option value="Burkina Faso">Burkina Faso</option><option value="Bangladesh">Bangladesh</option><option value="Bulgaria">Bulgaria</option><option value="Bahrain">Bahrain</option><option value="Bahamas">Bahamas</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Saint Barthélemy">Saint Barthélemy</option><option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option><option value="Belarus">Belarus</option><option value="Belize">Belize</option><option value="Bermuda">Bermuda</option><option value="Bolivia">Bolivia</option><option value="Caribbean Netherlands">Caribbean Netherlands</option><option value="Brazil">Brazil</option><option value="Barbados">Barbados</option><option value="Brunei">Brunei</option><option value="Bhutan">Bhutan</option><option value="Bouvet Island">Bouvet Island</option><option value="Botswana">Botswana</option><option value="Central African Republic">Central African Republic</option><option value="Canada">Canada</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Switzerland">Switzerland</option><option value="Chile">Chile</option><option value="China">China</option><option value="Ivory Coast">Ivory Coast</option><option value="Cameroon">Cameroon</option><option value="DR Congo">DR Congo</option><option value="Republic of the Congo">Republic of the Congo</option><option value="Cook Islands">Cook Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Cape Verde">Cape Verde</option><option value="Costa Rica">Costa Rica</option><option value="Cuba">Cuba</option><option value="Curaçao">Curaçao</option><option value="Christmas Island">Christmas Island</option><option value="Cayman Islands">Cayman Islands</option><option value="Cyprus">Cyprus</option><option value="Czechia">Czechia</option><option value="Germany">Germany</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Denmark">Denmark</option><option value="Dominican Republic">Dominican Republic</option><option value="Algeria">Algeria</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="Eritrea">Eritrea</option><option value="Western Sahara">Western Sahara</option><option value="Spain">Spain</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Finland">Finland</option><option value="Fiji">Fiji</option><option value="Falkland Islands">Falkland Islands</option><option value="France">France</option><option value="Faroe Islands">Faroe Islands</option><option value="Micronesia">Micronesia</option><option value="Gabon">Gabon</option><option value="United Kingdom" selected="selected" data-select2-id="2">United Kingdom</option><option value="Georgia">Georgia</option><option value="Guernsey">Guernsey</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Guinea">Guinea</option><option value="Guadeloupe">Guadeloupe</option><option value="Gambia">Gambia</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Greece">Greece</option><option value="Grenada">Grenada</option><option value="Greenland">Greenland</option><option value="Guatemala">Guatemala</option><option value="French Guiana">French Guiana</option><option value="Guam">Guam</option><option value="Guyana">Guyana</option><option value="Hong Kong">Hong Kong</option><option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option><option value="Honduras">Honduras</option><option value="Croatia">Croatia</option><option value="Haiti">Haiti</option><option value="Hungary">Hungary</option><option value="Indonesia">Indonesia</option><option value="Isle of Man">Isle of Man</option><option value="India">India</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Ireland">Ireland</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Iceland">Iceland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Japan">Japan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Cambodia">Cambodia</option><option value="Kiribati">Kiribati</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="South Korea">South Korea</option><option value="Kosovo">Kosovo</option><option value="Kuwait">Kuwait</option><option value="Laos">Laos</option><option value="Lebanon">Lebanon</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Saint Lucia">Saint Lucia</option><option value="Liechtenstein">Liechtenstein</option><option value="Sri Lanka">Sri Lanka</option><option value="Lesotho">Lesotho</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Latvia">Latvia</option><option value="Macau">Macau</option><option value="Saint Martin">Saint Martin</option><option value="Morocco">Morocco</option><option value="Monaco">Monaco</option><option value="Moldova">Moldova</option><option value="Madagascar">Madagascar</option><option value="Maldives">Maldives</option><option value="Mexico">Mexico</option><option value="Marshall Islands">Marshall Islands</option><option value="Macedonia">Macedonia</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Myanmar">Myanmar</option><option value="Montenegro">Montenegro</option><option value="Mongolia">Mongolia</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Mozambique">Mozambique</option><option value="Mauritania">Mauritania</option><option value="Montserrat">Montserrat</option><option value="Martinique">Martinique</option><option value="Mauritius">Mauritius</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Mayotte">Mayotte</option><option value="Namibia">Namibia</option><option value="New Caledonia">New Caledonia</option><option value="Niger">Niger</option><option value="Norfolk Island">Norfolk Island</option><option value="Nigeria">Nigeria</option><option value="Nicaragua">Nicaragua</option><option value="Niue">Niue</option><option value="Netherlands">Netherlands</option><option value="Norway">Norway</option><option value="Nepal">Nepal</option><option value="Nauru">Nauru</option><option value="New Zealand">New Zealand</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Panama">Panama</option><option value="Pitcairn Islands">Pitcairn Islands</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Palau">Palau</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Poland">Poland</option><option value="Puerto Rico">Puerto Rico</option><option value="North Korea">North Korea</option><option value="Portugal">Portugal</option><option value="Paraguay">Paraguay</option><option value="Palestine">Palestine</option><option value="French Polynesia">French Polynesia</option><option value="Qatar">Qatar</option><option value="Réunion">Réunion</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Sudan">Sudan</option><option value="Senegal">Senegal</option><option value="Singapore">Singapore</option><option value="South Georgia">South Georgia</option><option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option><option value="Solomon Islands">Solomon Islands</option><option value="Sierra Leone">Sierra Leone</option><option value="El Salvador">El Salvador</option><option value="San Marino">San Marino</option><option value="Somalia">Somalia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Serbia">Serbia</option><option value="South Sudan">South Sudan</option><option value="São Tomé and Príncipe">São Tomé and Príncipe</option><option value="Suriname">Suriname</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Sweden">Sweden</option><option value="Swaziland">Swaziland</option><option value="Sint Maarten">Sint Maarten</option><option value="Seychelles">Seychelles</option><option value="Syria">Syria</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Chad">Chad</option><option value="Togo">Togo</option><option value="Thailand">Thailand</option><option value="Tajikistan">Tajikistan</option><option value="Tokelau">Tokelau</option><option value="Turkmenistan">Turkmenistan</option><option value="Timor-Leste">Timor-Leste</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Tuvalu">Tuvalu</option><option value="Taiwan">Taiwan</option><option value="Tanzania">Tanzania</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="United States">United States</option><option value="Uzbekistan">Uzbekistan</option><option value="Vatican City">Vatican City</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Venezuela">Venezuela</option><option value="British Virgin Islands">British Virgin Islands</option><option value="United States Virgin Islands">United States Virgin Islands</option><option value="Vietnam">Vietnam</option><option value="Vanuatu">Vanuatu</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Samoa">Samoa</option><option value="Yemen">Yemen</option><option value="South Africa">South Africa</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value="Dhekelia">Dhekelia</option><option value="Somaliland">Somaliland</option><option value="USNB Guantanamo Bay">USNB Guantanamo Bay</option><option value="N. Cyprus">N. Cyprus</option><option value="Cyprus U.N. Buffer Zone">Cyprus U.N. Buffer Zone</option><option value="Siachen Glacier">Siachen Glacier</option><option value="Baikonur">Baikonur</option><option value="Akrotiri">Akrotiri</option><option value="Indian Ocean Ter.">Indian Ocean Ter.</option><option value="Coral Sea Is.">Coral Sea Is.</option><option value="Spratly Is.">Spratly Is.</option><option value="Clipperton I.">Clipperton I.</option><option value="Ashmore and Cartier Is.">Ashmore and Cartier Is.</option><option value="Bajo Nuevo Bank">Bajo Nuevo Bank</option><option value="Serranilla Bank">Serranilla Bank</option><option value="Scarborough Reef">Scarborough Reef</option><option value="Europe Union">Europe Union</option></select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 245.547px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true" title="United Kingdom">United Kingdom</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Regions</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="regions" name="region"><option value="Aberdeenshire">Aberdeenshire</option><option value="Aberdeen City">Aberdeen City</option><option value="Argyll and Bute">Argyll and Bute</option><option value="Isle of Anglesey [Sir Ynys Môn GB-YNM]">Isle of Anglesey [Sir Ynys Môn GB-YNM]</option><option value="Angus">Angus</option><option value="Antrim">Antrim</option><option value="Ards">Ards</option><option value="Armagh">Armagh</option><option value="Bath and North East Somerset">Bath and North East Somerset</option><option value="Blackburn with Darwen">Blackburn with Darwen</option><option value="Bedfordshire">Bedfordshire</option><option value="Barking and Dagenham">Barking and Dagenham</option><option value="Brent">Brent</option><option value="Bexley">Bexley</option><option value="Belfast">Belfast</option><option value="Bridgend [Pen-y-bont ar Ogwr GB-POG]">Bridgend [Pen-y-bont ar Ogwr GB-POG]</option><option value="Blaenau Gwent">Blaenau Gwent</option><option value="Birmingham">Birmingham</option><option value="Buckinghamshire">Buckinghamshire</option><option value="Ballymena">Ballymena</option><option value="Ballymoney">Ballymoney</option><option value="Bournemouth">Bournemouth</option><option value="Banbridge">Banbridge</option><option value="Barnet">Barnet</option><option value="Brighton and Hove">Brighton and Hove</option><option value="Barnsley">Barnsley</option><option value="Bolton">Bolton</option><option value="Blackpool">Blackpool</option><option value="Bracknell Forest">Bracknell Forest</option><option value="Bradford">Bradford</option><option value="Bromley">Bromley</option><option value="Bristol, City of">Bristol, City of</option><option value="Bury">Bury</option><option value="Cambridgeshire">Cambridgeshire</option><option value="Caerphilly [Caerffili GB-CAF]">Caerphilly [Caerffili GB-CAF]</option><option value="Central Bedfordshire">Central Bedfordshire</option><option value="Ceredigion [Sir Ceredigion]">Ceredigion [Sir Ceredigion]</option><option value="Craigavon">Craigavon</option><option value="Cheshire East">Cheshire East</option><option value="Cheshire West and Chester">Cheshire West and Chester</option><option value="Carrickfergus">Carrickfergus</option><option value="Cookstown">Cookstown</option><option value="Calderdale">Calderdale</option><option value="Clackmannanshire">Clackmannanshire</option><option value="Coleraine">Coleraine</option><option value="Cumbria">Cumbria</option><option value="Camden">Camden</option><option value="Carmarthenshire [Sir Gaerfyrddin GB-GFY]">Carmarthenshire [Sir Gaerfyrddin GB-GFY]</option><option value="Cornwall">Cornwall</option><option value="Coventry">Coventry</option><option value="Cardiff [Caerdydd GB-CRD]">Cardiff [Caerdydd GB-CRD]</option><option value="Croydon">Croydon</option><option value="Castlereagh">Castlereagh</option><option value="Conwy">Conwy</option><option value="Darlington">Darlington</option><option value="Derbyshire">Derbyshire</option><option value="Denbighshire [Sir Ddinbych GB-DDB]">Denbighshire [Sir Ddinbych GB-DDB]</option><option value="Derby">Derby</option><option value="Devon">Devon</option><option value="Dungannon">Dungannon</option><option value="Dumfries and Galloway">Dumfries and Galloway</option><option value="Doncaster">Doncaster</option><option value="Dundee City">Dundee City</option><option value="Dorset">Dorset</option><option value="Down">Down</option><option value="Derry">Derry</option><option value="Dudley">Dudley</option><option value="Durham">Durham</option><option value="Ealing">Ealing</option><option value="East Ayrshire">East Ayrshire</option><option value="Edinburgh, City of">Edinburgh, City of</option><option value="East Dunbartonshire">East Dunbartonshire</option><option value="East Lothian">East Lothian</option><option value="Eilean Siar">Eilean Siar</option><option value="Enfield">Enfield</option><option value="East Renfrewshire">East Renfrewshire</option><option value="East Riding of Yorkshire">East Riding of Yorkshire</option><option value="Essex">Essex</option><option value="East Sussex">East Sussex</option><option value="Falkirk">Falkirk</option><option value="Fermanagh">Fermanagh</option><option value="Fife">Fife</option><option value="Flintshire [Sir y Fflint GB-FFL]">Flintshire [Sir y Fflint GB-FFL]</option><option value="Gateshead">Gateshead</option><option value="Glasgow City">Glasgow City</option><option value="Gloucestershire">Gloucestershire</option><option value="Greenwich">Greenwich</option><option value="Gwynedd">Gwynedd</option><option value="Halton">Halton</option><option value="Hampshire">Hampshire</option><option value="Havering">Havering</option><option value="Hackney">Hackney</option><option value="Herefordshire, County of">Herefordshire, County of</option><option value="Hillingdon">Hillingdon</option><option value="Highland">Highland</option><option value="Hammersmith and Fulham">Hammersmith and Fulham</option><option value="Hounslow">Hounslow</option><option value="Hartlepool">Hartlepool</option><option value="Hertfordshire">Hertfordshire</option><option value="Harrow">Harrow</option><option value="Haringey">Haringey</option><option value="Isles of Scilly">Isles of Scilly</option><option value="Isle of Wight">Isle of Wight</option><option value="Islington">Islington</option><option value="Inverclyde">Inverclyde</option><option value="Kensington and Chelsea">Kensington and Chelsea</option><option value="Kent">Kent</option><option value="Kingston upon Hull, City of">Kingston upon Hull, City of</option><option value="Kirklees">Kirklees</option><option value="Kingston upon Thames">Kingston upon Thames</option><option value="Knowsley">Knowsley</option><option value="Lancashire">Lancashire</option><option value="Lambeth">Lambeth</option><option value="Leicester">Leicester</option><option value="Leeds">Leeds</option><option value="Leicestershire">Leicestershire</option><option value="Lewisham">Lewisham</option><option value="Lincolnshire">Lincolnshire</option><option value="Liverpool">Liverpool</option><option value="Limavady">Limavady</option><option value="London, City of">London, City of</option><option value="Larne">Larne</option><option value="Lisburn">Lisburn</option><option value="Luton">Luton</option><option value="Manchester">Manchester</option><option value="Middlesbrough">Middlesbrough</option><option value="Medway">Medway</option><option value="Magherafelt">Magherafelt</option><option value="Milton Keynes">Milton Keynes</option><option value="Midlothian">Midlothian</option><option value="Monmouthshire [Sir Fynwy GB-FYN]">Monmouthshire [Sir Fynwy GB-FYN]</option><option value="Merton">Merton</option><option value="Moray">Moray</option><option value="Merthyr Tydfil [Merthyr Tudful GB-MTU]">Merthyr Tydfil [Merthyr Tudful GB-MTU]</option><option value="Moyle">Moyle</option><option value="North Ayrshire">North Ayrshire</option><option value="Northumberland">Northumberland</option><option value="North Down">North Down</option><option value="North East Lincolnshire">North East Lincolnshire</option><option value="Newcastle upon Tyne">Newcastle upon Tyne</option><option value="Norfolk">Norfolk</option><option value="Nottingham">Nottingham</option><option value="North Lanarkshire">North Lanarkshire</option><option value="North Lincolnshire">North Lincolnshire</option><option value="North Somerset">North Somerset</option><option value="Newtownabbey">Newtownabbey</option><option value="Northamptonshire">Northamptonshire</option><option value="Neath Port Talbot [Castell-nedd Port Talbot GB-CTL]">Neath Port Talbot [Castell-nedd Port Talbot GB-CTL]</option><option value="Nottinghamshire">Nottinghamshire</option><option value="North Tyneside">North Tyneside</option><option value="Newham">Newham</option><option value="Newport [Casnewydd GB-CNW]">Newport [Casnewydd GB-CNW]</option><option value="North Yorkshire">North Yorkshire</option><option value="Newry and Mourne">Newry and Mourne</option><option value="Oldham">Oldham</option><option value="Omagh">Omagh</option><option value="Orkney Islands">Orkney Islands</option><option value="Oxfordshire">Oxfordshire</option><option value="Pembrokeshire [Sir Benfro GB-BNF]">Pembrokeshire [Sir Benfro GB-BNF]</option><option value="Perth and Kinross">Perth and Kinross</option><option value="Plymouth">Plymouth</option><option value="Poole">Poole</option><option value="Portsmouth">Portsmouth</option><option value="Powys">Powys</option><option value="Peterborough">Peterborough</option><option value="Redcar and Cleveland">Redcar and Cleveland</option><option value="Rochdale">Rochdale</option><option value="Rhondda, Cynon, Taff [Rhondda, Cynon,Taf]">Rhondda, Cynon, Taff [Rhondda, Cynon,Taf]</option><option value="Redbridge">Redbridge</option><option value="Reading">Reading</option><option value="Renfrewshire">Renfrewshire</option><option value="Richmond upon Thames">Richmond upon Thames</option><option value="Rotherham">Rotherham</option><option value="Rutland">Rutland</option><option value="Sandwell">Sandwell</option><option value="South Ayrshire">South Ayrshire</option><option value="Scottish Borders, The">Scottish Borders, The</option><option value="Suffolk">Suffolk</option><option value="Sefton">Sefton</option><option value="South Gloucestershire">South Gloucestershire</option><option value="Sheffield">Sheffield</option><option value="St. Helens">St. Helens</option><option value="Shropshire">Shropshire</option><option value="Stockport">Stockport</option><option value="Salford">Salford</option><option value="Slough">Slough</option><option value="South Lanarkshire">South Lanarkshire</option><option value="Sunderland">Sunderland</option><option value="Solihull">Solihull</option><option value="Somerset">Somerset</option><option value="Southend-on-Sea">Southend-on-Sea</option><option value="Surrey">Surrey</option><option value="Strabane">Strabane</option><option value="Stoke-on-Trent">Stoke-on-Trent</option><option value="Stirling">Stirling</option><option value="Southampton">Southampton</option><option value="Sutton">Sutton</option><option value="Staffordshire">Staffordshire</option><option value="Stockton-on-Tees">Stockton-on-Tees</option><option value="South Tyneside">South Tyneside</option><option value="Swansea [Abertawe GB-ATA]">Swansea [Abertawe GB-ATA]</option><option value="Swindon">Swindon</option><option value="Southwark">Southwark</option><option value="Tameside">Tameside</option><option value="Telford and Wrekin">Telford and Wrekin</option><option value="Thurrock">Thurrock</option><option value="Torbay">Torbay</option><option value="Torfaen [Tor-faen]">Torfaen [Tor-faen]</option><option value="Trafford">Trafford</option><option value="Tower Hamlets">Tower Hamlets</option><option value="Vale of Glamorgan, The [Bro Morgannwg GB-BMG]">Vale of Glamorgan, The [Bro Morgannwg GB-BMG]</option><option value="Warwickshire">Warwickshire</option><option value="West Berkshire">West Berkshire</option><option value="West Dunbartonshire">West Dunbartonshire</option><option value="Waltham Forest">Waltham Forest</option><option value="Wigan">Wigan</option><option value="Wiltshire">Wiltshire</option><option value="Wakefield">Wakefield</option><option value="Walsall">Walsall</option><option value="West Lothian">West Lothian</option><option value="Wolverhampton">Wolverhampton</option><option value="Wandsworth">Wandsworth</option><option value="Windsor and Maidenhead">Windsor and Maidenhead</option><option value="Wokingham">Wokingham</option><option value="Worcestershire">Worcestershire</option><option value="Warrington">Warrington</option><option value="Wrexham [Wrecsam GB-WRC]">Wrexham [Wrecsam GB-WRC]</option><option value="Westminster">Westminster</option><option value="West Sussex">West Sussex</option><option value="York">York</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="city" type="text" value="london">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="post_code" type="text" value="nw26uj">
                                        </div>
                                    </div>
                                </div>
                                <input name="type" type="hidden" value="billing_address">
                                <input name="id" type="hidden" value="1">
                                <div class="form-group row">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade p-4" id="shippingAddress" role="tabpanel" aria-labelledby="shippingAddress-tab">
                            <h2 class="mb-3">Default Shipping</h2>
                            <form method="POST" action="http://e-cigar.loc/my-account/address" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="onAcmHXgLYmmgLs8AJs7r5N7tVrctAHZeFXYmA3k">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Name</label>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="first_name" type="text">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control" name="last_name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="company" type="text" value="vrfvrfvrfv">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="first_line_address" type="text" value="sth">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="second_line_address" type="text" value="eeeee">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Country</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2-hidden-accessible" id="geo_country" name="country" data-select2-id="geo_country" tabindex="-1" aria-hidden="true"><option value="">Select Country</option><option value="13" selected="selected" data-select2-id="4">Armenia</option></select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 245.547px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-geo_country-container"><span class="select2-selection__rendered" id="select2-geo_country-container" role="textbox" aria-readonly="true" title="Armenia">Armenia</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Regions</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="geo_region" name="region"><option value="26">Erevan</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group hide">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">City</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="city" type="text" value="wsrth">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="post_code" type="text" value="wsrth">
                                        </div>
                                    </div>
                                </div>
                                <input name="type" type="hidden" value="default_shipping">
                                <input name="id" type="hidden" value="2">
                                <div class="form-group row">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade p-4" id="addressBook" role="tabpanel" aria-labelledby="addressBook-tab">
                            <h2 class="mb-3">Address Book</h2>
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    {{--Inner Tab links --}}
                                    <ul class="nav nav-pills nav-fill" role="tablist">
                                        <li>
                                            <a class="btn btn-info nav-link nav-link--new-address active" id="address1-tab" data-toggle="tab" href="#address-1" role="tab" aria-controls="address-1" aria-selected="true" aria-expanded="true">Billing Address</a>
                                        </li>
                                        <li>
                                            <a class="btn btn-info nav-link nav-link--new-address" id="address2-tab" data-toggle="tab" href="#address-2" role="tab" aria-controls="address-2">Shipping Address</a>
                                        </li>
                                        <li>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="nav-link nav-link--new-address btn btn-info add-new" data-toggle="modal" data-target="#newAddressModal">+ Add New</button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="newAddressModal" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add New Address</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form class="form-horizontal">

                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">Name</label>
                                                                        <div class="col-sm-8">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">Company name</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">1st Line address</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">2nd line address</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">City</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">Country</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label for="text" class="control-label col-sm-4">Post Code</label>
                                                                        <div class="col-sm-8">
                                                                            <input id="text" name="text" type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-check">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 offset-sm-4">
                                                                            <input class="form-check-input" type="checkbox" name="newAddressCheck" id="newAddressCheck" value="option1">
                                                                            <label class="form-check-label text-muted" for="newAddressCheck">
                                                                                Mark this shipping address as default
                                                                            </label>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Save Address</button>
                                                                <button type="button" class="btn btn-secondary">Discard</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--End Inner Tab links--}}
                                        </li>
                                    </ul>


                                    {{--Inner Tab Content--}}
                                    <div class="tab-content">
                                        <div class="p-5 tab-pane fade active in show" id="address-1" role="tabpanel" aria-labelledby="address1-tab">

                                            <form class="form-horizontal">
                                                <div class="form-group row mb-5">
                                                    <div class="col-md-5">
                                                        <h5>
                                                            <label for="selectAddress" class="control-label text-muted">Select your billing address</label>
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select name="" id="selectAddress" class="form-control">
                                                            <option value="address1">address1</option>
                                                            <option value="address2">address2</option>
                                                            <option value="address3">address3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <h3>Billing Address</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="p-5 tab-pane fade" id="address-2" role="tabpanel" aria-labelledby="address2-tab">
                                            <form class="form-horizontal">
                                                <div class="form-group row mb-5">
                                                    <div class="col-md-5">
                                                        <h5>
                                                            <label for="selectAddress2" class="control-label text-muted">Select your shipping address</label>
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <select name="" id="selectAddress2" class="form-control">
                                                            <option value="address1">address1</option>
                                                            <option value="address2">address2</option>
                                                            <option value="address3">address3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <h3>Shipping Address</h3>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    {{--Inner Tab Content--}}
                                </div>
                            </div>

                        </div>
                    </div>


            </div>
        </div>

    </div>

@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        /*.btn-group-vertical .btn {*/
            /*width: 135px;*/
            /*border: 1px solid;*/
            /*margin-bottom: 3px;*/
        /*}*/

        /*.add-new {*/
            /*width: 135px;*/
        /*}*/
    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#country").select2();
            $("#geo_country").select2();
            function getRegionsPackage(){
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    { country: value},
                    res => {
                        let select = document.getElementById('regions');
                        select.innerText = null;
                        if (!res.error) {
                            $.each(res.data,function (index,value) {
                                var opt = document.createElement('option');
                                opt.value = res.data[value];
                                opt.innerHTML = res.data[value];
                                select.appendChild(opt);
                            })

                        }
                    }
                );
            }

            function getRegions(){
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    { country: value},
                    res => {
                        let select = document.getElementById('geo_region');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            opt.value = res.data.id;
                            opt.innerHTML = res.data.name;
                            select.appendChild(opt);
                        }
                    }
                );
            }

            $("body").on("change", "#country", function() {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function() {
                getRegions();
            });
        })
    </script>
@endsection
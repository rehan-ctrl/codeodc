<?php include("includes/css.php")?>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include("includes/header.php")?>
		<?php include("includes/sidebar.php")?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title"> Add Company</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form action="<?= base_url('admin/admin_add_company') ?>" method="post">
									<div class="form-group">
										<div class="col-sm-6 mb-5">
											<label>Company Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="company_name" class="form-control" placeholder="Company Name">
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-xs-6 mb-5">
											<label for="address" class="required">Company Address <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea type="text" placeholder="Company Address" rowspan="1" class="form-control" name="street_address" required></textarea>
											</div>
										</div>

										<div class="col-xs-6 mb-5">
											<label for="address" class="required">Company Address 2 <span class="reqs"></span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<textarea type="text" name="street_address_2" placeholder="Company Address 2" rowspan="1" class="form-control"></textarea>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="city" class="required">Town / City <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="city" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="postal_code" class="required">Zip / Postal Code <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="postal_code" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label class="required">State/Province <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="state" required>
													<option value="State">Select State</option>
													<optgroup id="stateofresidence-optgroup-India" label="India">
														<option value="Andaman &amp; Nicobar" label="Andaman &amp; Nicobar">Andaman &amp; Nicobar</option>
														<option value="Andhra Pradesh" label="Andhra Pradesh">Andhra Pradesh</option>
														<option value="Arunachal Pradesh" label="Arunachal Pradesh">Arunachal Pradesh</option>
														<option value="Assam" label="Assam">Assam</option>
														<option value="Bihar" label="Bihar">Bihar</option>
														<option value="Chandigarh" label="Chandigarh">Chandigarh</option>
														<option value="Chhattisgarh" label="Chhattisgarh">Chhattisgarh</option>
														<option value="Dadra &amp; Nagar Haveli" label="Dadra &amp; Nagar Haveli">Dadra &amp; Nagar Haveli</option>
														<option value="Daman &amp; Diu" label="Daman &amp; Diu">Daman &amp; Diu</option>
														<option value="Delhi-NCR" label="Delhi-NCR">Delhi-NCR</option>
														<option value="Goa" label="Goa">Goa</option>
														<option value="Gujarat" label="Gujarat">Gujarat</option>
														<option value="Haryana" label="Haryana">Haryana</option>
														<option value="Himachal Pradesh" label="Himachal Pradesh">Himachal Pradesh</option>
														<option value="Jammu &amp; Kashmir" label="Jammu &amp; Kashmir">Jammu &amp; Kashmir</option>
														<option value="Jharkhand" label="Jharkhand">Jharkhand</option>
														<option value="Karnataka" label="Karnataka">Karnataka</option>
														<option value="Kerala" label="Kerala">Kerala</option>
														<option value="Lakshadweep" label="Lakshadweep">Lakshadweep</option>
														<option value="Madhya Pradesh" label="Madhya Pradesh">Madhya Pradesh</option>
														<option value="Maharashtra" label="Maharashtra">Maharashtra</option>
														<option value="Manipur" label="Manipur">Manipur</option>
														<option value="Meghalaya" label="Meghalaya">Meghalaya</option>
														<option value="Mizoram" label="Mizoram">Mizoram</option>
														<option value="Nagaland" label="Nagaland">Nagaland</option>
														<option value="Orissa" label="Orissa">Orissa</option>
														<option value="Pondicherry" label="Pondicherry">Pondicherry</option>
														<option value="Punjab" label="Punjab">Punjab</option>
														<option value="Rajasthan" label="Rajasthan">Rajasthan</option>
														<option value="Sikkim" label="Sikkim">Sikkim</option>
														<option value="Tamil Nadu" label="Tamil Nadu">Tamil Nadu</option>
														<option value="Telangana" label="Telangana">Telangana</option>
														<option value="Tripura" label="Tripura">Tripura</option>
														<option value="Uttar Pradesh" label="Uttar Pradesh">Uttar Pradesh</option>
														<option value="Uttaranchal" label="Uttaranchal">Uttaranchal</option>
														<option value="West Bengal" label="West Bengal">West Bengal</option>
														<option value="Other" label="Other">Other</option>
												</select>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label class="required">Country <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<select class="form-control" name="country">
													<optgroup id="countryofresidence-optgroup-Frequently Used" label="Frequently Used" required>
														<option value="India" label="India" selected="selected">India</option>
														<option value="USA" label="USA">USA</option>
														<option value="United Kingdom" label="UK">UK</option>
														<option value="United Arab Emirates" label="UAE">UAE</option>
														<option value="Canada" label="Canada">Canada</option>
														<option value="Australia" label="Australia">Australia</option>
														<option value="New Zealand" label="New Zealand">New Zealand</option>
														<option value="Pakistan" label="Pakistan">Pakistan</option>
														<option value="Saudi Arabia" label="Saudi Arabia">Saudi Arabia</option>
														<option value="Kuwait" label="Kuwait">Kuwait</option>
														<option value="South Africa" label="South Africa">South Africa</option>
														<option value="Afghanistan" label="Afghanistan">Afghanistan</option>
														<option value="Albania" label="Albania">Albania</option>
														<option value="Algeria" label="Algeria">Algeria</option>
														<option value="American Samoa" label="American Samoa">American Samoa</option>
														<option value="Andorra" label="Andorra">Andorra</option>
														<option value="Angola" label="Angola">Angola</option>
														<option value="Anguilla" label="Anguilla">Anguilla</option>
														<option value="Antigua &amp; Barbuda" label="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
														<option value="Argentina" label="Argentina">Argentina</option>
														<option value="Armenia" label="Armenia">Armenia</option>
														<option value="Austria" label="Austria">Austria</option>
														<option value="Azerbaijan" label="Azerbaijan">Azerbaijan</option>
														<option value="Bahamas" label="Bahamas">Bahamas</option>
														<option value="Bahrain" label="Bahrain">Bahrain</option>
														<option value="Bangladesh" label="Bangladesh">Bangladesh</option>
														<option value="Barbados" label="Barbados">Barbados</option>
														<option value="Belarus" label="Belarus">Belarus</option>
														<option value="Belgium" label="Belgium">Belgium</option>
														<option value="Belize" label="Belize">Belize</option>
														<option value="Bermuda" label="Bermuda">Bermuda</option>
														<option value="Bhutan" label="Bhutan">Bhutan</option>
														<option value="Bolivia" label="Bolivia">Bolivia</option>
														<option value="Bosnia and Herzegovina" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
														<option value="Botswana" label="Botswana">Botswana</option>
														<option value="Brazil" label="Brazil">Brazil</option>
														<option value="Brunei" label="Brunei">Brunei</option>
														<option value="Bulgaria" label="Bulgaria">Bulgaria</option>
														<option value="Burkina Faso" label="Burkina Faso">Burkina Faso</option>
														<option value="Burundi" label="Burundi">Burundi</option>
														<option value="Cambodia" label="Cambodia">Cambodia</option>
														<option value="Cameroon" label="Cameroon">Cameroon</option>
														<option value="Cape Verde" label="Cape Verde">Cape Verde</option>
														<option value="Cayman Islands" label="Cayman Islands">Cayman Islands</option>
														<option value="Central African Republic" label="Central African Republic">Central African Republic</option>
														<option value="Chad" label="Chad">Chad</option>
														<option value="Chile" label="Chile">Chile</option>
														<option value="China" label="China">China</option>
														<option value="Colombia" label="Colombia">Colombia</option>
														<option value="Comoros" label="Comoros">Comoros</option>
														<option value="Congo (DRC)" label="Congo (DRC)">Congo (DRC)</option>
														<option value="Congo" label="Congo">Congo</option>
														<option value="Cook Islands" label="Cook Islands">Cook Islands</option>
														<option value="Costa Rica" label="Costa Rica">Costa Rica</option>
														<option value="Cote d'Ivoire" label="Cote d'Ivoire">Cote d'Ivoire</option>
														<option value="Croatia (Hrvatska)" label="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
														<option value="Cuba" label="Cuba">Cuba</option>
														<option value="Cyprus" label="Cyprus">Cyprus</option>
														<option value="Czech Republic" label="Czech Republic">Czech Republic</option>
														<option value="Denmark" label="Denmark">Denmark</option>
														<option value="Djibouti" label="Djibouti">Djibouti</option>
														<option value="Dominica" label="Dominica">Dominica</option>
														<option value="Dominican Republic" label="Dominican Republic">Dominican Republic</option>
														<option value="East Timor" label="East Timor">East Timor</option>
														<option value="Ecuador" label="Ecuador">Ecuador</option>
														<option value="Egypt" label="Egypt">Egypt</option>
														<option value="El Salvador" label="El Salvador">El Salvador</option>
														<option value="Equatorial Guinea" label="Equatorial Guinea">Equatorial Guinea</option>
														<option value="Eritrea" label="Eritrea">Eritrea</option>
														<option value="Estonia" label="Estonia">Estonia</option>
														<option value="Ethiopia" label="Ethiopia">Ethiopia</option>
														<option value="Falkland Islands" label="Falkland Islands">Falkland Islands</option>
														<option value="Faroe Islands" label="Faroe Islands">Faroe Islands</option>
														<option value="Fiji Islands" label="Fiji Islands">Fiji Islands</option>
														<option value="Finland" label="Finland">Finland</option>
														<option value="France" label="France">France</option>
														<option value="French Guiana" label="French Guiana">French Guiana</option>
														<option value="French Polynesia" label="French Polynesia">French Polynesia</option>
														<option value="Gabon" label="Gabon">Gabon</option>
														<option value="Gambia" label="Gambia">Gambia</option>
														<option value="Georgia" label="Georgia">Georgia</option>
														<option value="Germany" label="Germany">Germany</option>
														<option value="Ghana" label="Ghana">Ghana</option>
														<option value="Gibraltar" label="Gibraltar">Gibraltar</option>
														<option value="Greece" label="Greece">Greece</option>
														<option value="Greenland" label="Greenland">Greenland</option>
														<option value="Grenada" label="Grenada">Grenada</option>
														<option value="Guadeloupe" label="Guadeloupe">Guadeloupe</option>
														<option value="Guam" label="Guam">Guam</option>
														<option value="Guatemala" label="Guatemala">Guatemala</option>
														<option value="Guinea" label="Guinea">Guinea</option>
														<option value="Guinea-Bissau" label="Guinea-Bissau">Guinea-Bissau</option>
														<option value="Guyana" label="Guyana">Guyana</option>
														<option value="Haiti" label="Haiti">Haiti</option>
														<option value="Honduras" label="Honduras">Honduras</option>
														<option value="Hong Kong SAR" label="Hong Kong SAR">Hong Kong SAR</option>
														<option value="Hungary" label="Hungary">Hungary</option>
														<option value="Iceland" label="Iceland">Iceland</option>
														<option value="Indonesia" label="Indonesia">Indonesia</option>
														<option value="Iran" label="Iran">Iran</option>
														<option value="Iraq" label="Iraq">Iraq</option>
														<option value="Ireland" label="Ireland">Ireland</option>
														<option value="Israel" label="Israel">Israel</option>
														<option value="Italy" label="Italy">Italy</option>
														<option value="Jamaica" label="Jamaica">Jamaica</option>
														<option value="Japan" label="Japan">Japan</option>
														<option value="Jordan" label="Jordan">Jordan</option>
														<option value="Kazakhstan" label="Kazakhstan">Kazakhstan</option>
														<option value="Kenya" label="Kenya">Kenya</option>
														<option value="Kiribati" label="Kiribati">Kiribati</option>
														<option value="Korea" label="Korea">Korea</option>
														<option value="Kyrgyzstan" label="Kyrgyzstan">Kyrgyzstan</option>
														<option value="Laos" label="Laos">Laos</option>
														<option value="Latvia" label="Latvia">Latvia</option>
														<option value="Lebanon" label="Lebanon">Lebanon</option>
														<option value="Lesotho" label="Lesotho">Lesotho</option>
														<option value="Liberia" label="Liberia">Liberia</option>
														<option value="Libya" label="Libya">Libya</option>
														<option value="Liechtenstein" label="Liechtenstein">Liechtenstein</option>
														<option value="Lithuania" label="Lithuania">Lithuania</option>
														<option value="Luxembourg" label="Luxembourg">Luxembourg</option>
														<option value="Macao SAR" label="Macao SAR">Macao SAR</option>
														<option value="Macedonia" label="Macedonia">Macedonia</option>
														<option value="Madagascar" label="Madagascar">Madagascar</option>
														<option value="Malawi" label="Malawi">Malawi</option>
														<option value="Malaysia" label="Malaysia">Malaysia</option>
														<option value="Maldives" label="Maldives">Maldives</option>
														<option value="Mali" label="Mali">Mali</option>
														<option value="Malta" label="Malta">Malta</option>
														<option value="Martinique" label="Martinique">Martinique</option>
														<option value="Mauritania" label="Mauritania">Mauritania</option>
														<option value="Mauritius" label="Mauritius">Mauritius</option>
														<option value="Mayotte" label="Mayotte">Mayotte</option>
														<option value="Mexico" label="Mexico">Mexico</option>
														<option value="Micronesia" label="Micronesia">Micronesia</option>
														<option value="Moldova" label="Moldova">Moldova</option>
														<option value="Monaco" label="Monaco">Monaco</option>
														<option value="Mongolia" label="Mongolia">Mongolia</option>
														<option value="Montserrat" label="Montserrat">Montserrat</option>
														<option value="Morocco" label="Morocco">Morocco</option>
														<option value="Mozambique" label="Mozambique">Mozambique</option>
														<option value="Myanmar" label="Myanmar">Myanmar</option>
														<option value="Namibia" label="Namibia">Namibia</option>
														<option value="Nauru" label="Nauru">Nauru</option>
														<option value="Nepal" label="Nepal">Nepal</option>
														<option value="Netherlands Antilles" label="Netherlands Antilles">Netherlands Antilles</option>
														<option value="Netherlands" label="Netherlands">Netherlands</option>
														<option value="New Caledonia" label="New Caledonia">New Caledonia</option>
														<option value="Nicaragua" label="Nicaragua">Nicaragua</option>
														<option value="Niger" label="Niger">Niger</option>
														<option value="Nigeria" label="Nigeria">Nigeria</option>
														<option value="Niue" label="Niue">Niue</option>
														<option value="Norfolk Island" label="Norfolk Island">Norfolk Island</option>
														<option value="North Korea" label="North Korea">North Korea</option>
														<option value="Norway" label="Norway">Norway</option>
														<option value="Oman" label="Oman">Oman</option>
														<option value="Panama" label="Panama">Panama</option>
														<option value="Papua New Guinea" label="Papua New Guinea">Papua New Guinea</option>
														<option value="Paraguay" label="Paraguay">Paraguay</option>
														<option value="Peru" label="Peru">Peru</option>
														<option value="Philippines" label="Philippines">Philippines</option>
														<option value="Pitcairn Islands" label="Pitcairn Islands">Pitcairn Islands</option>
														<option value="Poland" label="Poland">Poland</option>
														<option value="Portugal" label="Portugal">Portugal</option>
														<option value="Puerto Rico" label="Puerto Rico">Puerto Rico</option>
														<option value="Qatar" label="Qatar">Qatar</option>
														<option value="Reunion" label="Reunion">Reunion</option>
														<option value="Romania" label="Romania">Romania</option>
														<option value="Russia" label="Russia">Russia</option>
														<option value="Rwanda" label="Rwanda">Rwanda</option>
														<option value="Samoa" label="Samoa">Samoa</option>
														<option value="San Marino" label="San Marino">San Marino</option>
														<option value="Sao Tome and Principe" label="Sao Tome and Principe">Sao Tome and Principe</option>
														<option value="Senegal" label="Senegal">Senegal</option>
														<option value="Serbia and Montenegro" label="Serbia and Montenegro">Serbia and Montenegro</option>
														<option value="Seychelles" label="Seychelles">Seychelles</option>
														<option value="Sierra Leone" label="Sierra Leone">Sierra Leone</option>
														<option value="Singapore" label="Singapore">Singapore</option>
														<option value="Slovakia" label="Slovakia">Slovakia</option>
														<option value="Slovenia" label="Slovenia">Slovenia</option>
														<option value="Solomon Islands" label="Solomon Islands">Solomon Islands</option>
														<option value="Somalia" label="Somalia">Somalia</option>
														<option value="Spain" label="Spain">Spain</option>
														<option value="Sri Lanka" label="Sri Lanka">Sri Lanka</option>
														<option value="St. Helena" label="St. Helena">St. Helena</option>
														<option value="St. Kitts and Nevis" label="St. Kitts and Nevis">St. Kitts and Nevis</option>
														<option value="St. Lucia" label="St. Lucia">St. Lucia</option>
														<option value="St. Pierre and Miquelon" label="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
														<option value="St. Vincent &amp; Grenadines" label="St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option>
														<option value="Sudan" label="Sudan">Sudan</option>
														<option value="Suriname" label="Suriname">Suriname</option>
														<option value="Swaziland" label="Swaziland">Swaziland</option>
														<option value="Sweden" label="Sweden">Sweden</option>
														<option value="Switzerland" label="Switzerland">Switzerland</option>
														<option value="Syria" label="Syria">Syria</option>
														<option value="Taiwan" label="Taiwan">Taiwan</option>
														<option value="Tajikistan" label="Tajikistan">Tajikistan</option>
														<option value="Tanzania" label="Tanzania">Tanzania</option>
														<option value="Thailand" label="Thailand">Thailand</option>
														<option value="Togo" label="Togo">Togo</option>
														<option value="Tokelau" label="Tokelau">Tokelau</option>
														<option value="Tonga" label="Tonga">Tonga</option>
														<option value="Trinidad and Tobago" label="Trinidad and Tobago">Trinidad and Tobago</option>
														<option value="Tunisia" label="Tunisia">Tunisia</option>
														<option value="Turkey" label="Turkey">Turkey</option>
														<option value="Turkmenistan" label="Turkmenistan">Turkmenistan</option>
														<option value="Turks and Caicos Islands" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
														<option value="Tuvalu" label="Tuvalu">Tuvalu</option>
														<option value="Uganda" label="Uganda">Uganda</option>
														<option value="Ukraine" label="Ukraine">Ukraine</option>
														<option value="Uruguay" label="Uruguay">Uruguay</option>
														<option value="Uzbekistan" label="Uzbekistan">Uzbekistan</option>
														<option value="Vanuatu" label="Vanuatu">Vanuatu</option>
														<option value="Venezuela" label="Venezuela">Venezuela</option>
														<option value="Vietnam" label="Vietnam">Vietnam</option>
														<option value="Virgin Islands (British)" label="Virgin Islands (British)">Virgin Islands (British)</option>
														<option value="Virgin Islands" label="Virgin Islands">Virgin Islands</option>
														<option value="Wallis and Futuna" label="Wallis and Futuna">Wallis and Futuna</option>
														<option value="Yemen" label="Yemen">Yemen</option>
														<option value="Yugoslavia" label="Yugoslavia">Yugoslavia</option>
														<option value="Zambia" label="Zambia">Zambia</option>
														<option value="Zimbabwe" label="Zimbabwe">Zimbabwe</option>
													</optgroup>
												</select>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>First Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="first_name" class="form-control" placeholder="First Name">
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label>Last Name:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="last_name" class="form-control" placeholder="Last Name">
											</div>
										</div>
										

										
										<div class="clearfix"></div>
										
										<div class="col-sm-6 mb-5">
											<label for="telephone" class="required">Mobile <span class="reqs"> *</span></label>
											<div class="row">
												<div class="col-md-2">
												<input type="text" name="phone1" placeholder="Country code" class="form-control" value="+91">
											</div>
											<div class="col-md-10">
												<input type="text" name="phone" placeholder="Number" class="form-control">
											</div>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="telephone" class="required">Landline </label>
											<div class="row">
												<div class="col-md-2">
												<input type="text" name="landline1" placeholder="Area code" class="form-control" value="040">
											</div>
											<div class="col-md-10">
												<input type="text" name="landline" placeholder="Number" class="form-control">
											</div>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Company Email Address <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="company_email_address" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="email_address" class="required">Admin Login Email Address <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="text" name="email_address" class="form-control" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="telephone" class="required">Enter Password <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="password" name="password" placeholder="Enter Password" class="form-control password" required>
											</div>
										</div>
										<div class="col-sm-6 mb-5">
											<label for="telephone" class="required">Re-enter Password <span class="reqs"> *</span></label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-suitcase"></i>
												</div>
												<input type="password" name="conpassword" placeholder="Re-enter Password" class="form-control conpassword" required>
											</div>
										</div>
										<div class="col-sm-12 mt-20">
											<button type="submit" class="btn btn-primary btn-lg">Create An Company &nbsp; <i class="fa fa-forward" aria-hidden="true"></i></button>

										</div>
									</div>
								</form>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include("includes/footer.php")?>
	</div>
	<?php include("includes/js.php")?>
	<script>
		$('form').submit(function(){
					password=$('.password').val();
					conpassword=$('.conpassword').val();
					if(password!=conpassword)
					{
						$('.error').html(`<div class="alert alert-danger">Both password doesn't match.</div>`).show();
						return false;
					}
				})
	</script>
</body>

</html>

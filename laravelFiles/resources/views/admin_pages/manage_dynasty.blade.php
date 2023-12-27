<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
   <div class="container-fluid">
      <div class="mb-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
             <li class="breadcrumb-item"><a href="#">Category Management</a></li>
             <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
         </nav>
      </div>
      <div class="d-flex justify-content-between">
       <h2 class="title heading-3">{{$title}} </h2>
       <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddDynasty"><i class="fa fa-plus"></i> Add Dynasty</button>
    </div>
      
      <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
           <thead><tr>
                <th>Sr. No.</th>
                <th>Dynasty Title</th> 
                <th>Period</th> 
                <th>Image</th> 
                <th>Posted Dated</th> 
                <th>Action</th> 
             </tr>
           </thead>
           <tbody>
             <tr>
                <td>1</td>
                <td>Commemorative</td>
                <td>Independent India</td>
                <td><img src="http://www.mintageworld.com/images/period/medieval.jpg" width="100"></td>
                <td>2023-10-03 11:46:39</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>      
             </tr>
             <tr>
                <td>2</td>
                <td>Banka Kombetare E Shqipnis	</td>
                <td>People's Socialist Republic of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/british_colonial.jpg" width="100"></td>
                <td>2020-01-31 05:45:05</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>
             </tr>
             <tr>
                <td>3</td>
                <td>Banka Kombetare E Shqipnis	</td>
                <td>Kingdom of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/ancient.jpg" width="100"></td>
                <td>2020-01-31 05:45:04</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>
             </tr>
             <tr>
                <td>4</td>
                <td>Banka Kombetare E Shqipnis Banca Nazionale D'Albania	</td>
                <td>Kingdom of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/republic_india.jpg" width="100"></td>
                <td>2020-01-31 05:45:02</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>
             </tr>
             <tr>
                <td>5</td>
                <td>Banka Kombetare E Shqipnis Banca Nazionale D'Albania	</td>
                <td>Albanian Republic	</td>
                <td><img src="http://www.mintageworld.com/images/period/Hellenistic.jpg" width="100"></td>
                <td>2020-01-31 05:45:01</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>
             </tr>
             <tr>
                <td>6</td>
                <td>Sigurim Arke - Shkodres Permbe	</td>
                <td>Principality of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/arcahic-greece.jpg" width="100"></td>
                <td>2019-10-04 08:57:06</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>      
             </tr>
             <tr>
                <td>7</td>
                <td>Banka E Shtetit Shqiptar	</td>
                <td>People's Socialist Republic of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/classical1.jpg" width="100"></td>
                <td>2019-10-04 08:57:10</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>      
             </tr>
             <tr>
                <td>8</td>
                <td>Bashkia E Vlores	</td>
                <td>Principality of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/united-states-of-america-periods.jpg" width="100"></td>
                <td>2019-10-04 08:57:08</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>     
             </tr>
             <tr>
                <td>9</td>
                <td>Bashkija E Korces	</td>
                <td>Principality of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/Modern.jpg" width="100"></td>
                <td>2019-10-04 08:57:06</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>      
             </tr>
             <tr>
                <td>10</td>
                <td>Katundari E Korces	</td>
                <td>Principality of Albania	</td>
                <td><img src="http://www.mintageworld.com/images/period/Medieval.jpg" width="100"></td>
                <td>2019-10-04 08:57:04</td>
                <td>
                   <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditDynasty" title="Edit"><i class="fa fa-edit"></i></button>
                </td>
             </tr>
          </tbody>           
       </table>
   </div>     
      
   </div>
 </div>
   
 <div class="modal fade" id="AddDynasty" tabindex="-1" aria-labelledby="AddDynastyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddDynastyLabel">Add Dynasty</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Enter Title</label> 
                <div class="col-md-9"> <textarea name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title"></textarea> </div>
             </div>
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Period</label> 
                <div class="col-md-9">
                  <select name="type" class="form-control" required="required">
                     <option value="">Select Period</option>
                     <option value="4">Medieval</option>
                     <option value="10">Colonial</option>
                     <option value="17">Ancient</option>
                     <option value="20">Independent India</option>
                     <option value="22">Republic</option>
                     <option value="30">Modern</option>
                     <option value="32">Early bank Notes</option>
                     <option value="33">British India</option>
                     <option value="34">British india</option>
                     <option value="38">Princely State</option>
                     <option value="42">British India - Convention State</option>
                     <option value="49">Colonial</option>
                     <option value="52">Hellenistic</option>
                     <option value="56">Archaic</option>
                     <option value="63">Classical</option>
                     <option value="71">United States of America</option>
                     <option value="72">Modern</option>
                     <option value="77">Medieval</option>
                     <option value="78">Colonial</option>
                     <option value="80">Pre-decimal</option>
                     <option value="81">Decimal</option>
                     <option value="83">Modern</option>
                     <option value="88">Republic</option>
                     <option value="89">Republic</option>
                     <option value="90">Colonial</option>
                     <option value="91">Colonial</option>
                     <option value="93">Republic</option>
                     <option value="97">Commemorative Coinage</option>
                     <option value="147">Edo Period - Kan'ei Era</option>
                     <option value="148">Edo Period - Shotoku-Kyoho Era</option>
                     <option value="149">Edo Period - Kanbun Era</option>
                     <option value="150">Edo Period - Genbun Era</option>
                     <option value="151">Edo Period - Kanpo Era</option>
                     <option value="152">Edo Period - Meiwa Era</option>
                     <option value="153">Edo Period - Koka Era</option>
                     <option value="154">Edo Period - An'ei Era</option>
                     <option value="155">Edo Period - Keio Era</option>
                     <option value="156">Edo Period - Bunkyu Era</option>
                     <option value="157">Edo Period - Tenpo Era</option>
                     <option value="158">Edo Period - Bunsei Era</option>
                     <option value="159">Edo Period - Ansei Era</option>
                     <option value="160">Edo Period - Kaei Era</option>
                     <option value="161">Modern Japan</option>
                     <option value="162">Edo Period - Man'en Era</option>
                     <option value="163">Edo Period - Kyoho Era</option>
                     <option value="164">Edo Period - Genroku Era</option>
                     <option value="165">Azuchi Momoyama - Keicho Era</option>
                     <option value="166">Edo Period - Genna Era</option>
                     <option value="167">Edo Period - Hoei Era</option>
                     <option value="168">Edo Period</option>
                     <option value="169">Edo Period - Shotoku Era</option>
                     <option value="170">Azuchi Momoyama - Ansei Era</option>
                     <option value="171">Azuchi Momoyama - Tensho Era</option>
                     <option value="172">Azuchi Momoyama - Meireki Era</option>
                     <option value="173">Colonial</option>
                     <option value="174">Commonwealth</option>
                     <option value="175">Modern</option>
                     <option value="178">Brunei</option>
                     <option value="179">Period III</option>
                     <option value="180">Period II</option>
                     <option value="181">Period IV</option>
                     <option value="182">Period I</option>
                     <option value="183">Parliamentary Democracy</option>
                     <option value="184">Colonial</option>
                     <option value="185">Republic</option>
                     <option value="190">US State series</option>
                     <option value="191">Modern</option>
                     <option value="193">Colonial</option>
                     <option value="195">British North Borneo</option>
                     <option value="196">Early Colonial Period</option>
                     <option value="198">Principality</option>
                     <option value="199">British Caribbean Territories, Eastern Group</option>
                     <option value="200">Republic of Biafra</option>
                     <option value="201">Dutch Administration. </option>
                     <option value="202">Republic of South Sudan</option>
                     <option value="206">Early Modern</option>
                     <option value="207">Modern</option>
                     <option value="208">Modern</option>
                     <option value="209">Sultanate</option>
                     <option value="210">Colonial</option>
                     <option value="211">Modern</option>
                     <option value="212">Before Independence</option>
                     <option value="213">Confederation</option>
                     <option value="214">Republic</option>
                     <option value="215">Token Coinage</option>
                     <option value="216">COB Coinage</option>
                     <option value="217">British Mauritius</option>
                     <option value="218">Commonwealth Realm</option>
                     <option value="219">Republic</option>
                     <option value="220">Monarchy</option>
                     <option value="221">Republic</option>
                     <option value="222">Modern</option>
                     <option value="224">Ancient</option>
                     <option value="225">Medieval</option>
                     <option value="226">Modern</option>
                     <option value="227">Imperial Burma</option>
                     <option value="228">Early Modern</option>
                     <option value="229">Modern</option>
                     <option value="233">Early modern</option>
                     <option value="234">Modern</option>
                     <option value="235">Republic</option>
                     <option value="238">Modern</option>
                     <option value="239">Tibetan Authority</option>
                     <option value="240">Chinese Authority</option>
                     <option value="241">Joint Chinese and Tibetan Authority</option>
                     <option value="242">Early Modern</option>
                     <option value="243">Modern</option>
                     <option value="244">Medieval Thailand - Rattanakosin Period</option>
                     <option value="245">Medieval Thailand</option>
                     <option value="247">Ottoman Era</option>
                     <option value="248">Republic</option>
                     <option value="249">Modern</option>
                     <option value="250">Early Modern Period</option>
                     <option value="251">Colonial Period</option>
                     <option value="252">Dark Age of Cambodia (Middle Period)</option>
                     <option value="253">Contemporary Period</option>
                     <option value="254">Republic</option>
                     <option value="255">Modern</option>
                     <option value="256">Warlord Period- Thinh Duc</option>
                     <option value="257">Warlord Period- Vinh Duc</option>
                     <option value="258">Warlord Period- Vinh Tri</option>
                     <option value="259">Warlord Period- Chinh Hoa</option>
                     <option value="260">Warlord Period- Vinh Thinh</option>
                     <option value="261">Warlord Period- Bao Thai</option>
                     <option value="262">Warlord Period- Canh Hung</option>
                     <option value="263">Rebel Coinage</option>
                     <option value="264">Warlord Period- Chieu Thong</option>
                     <option value="265">Occupation Coinage</option>
                     <option value="266">United Period</option>
                     <option value="267">French Colonial Era</option>
                     <option value="268">Republican Period</option>
                     <option value=""></option>
                     <option value="270">Kingdom of Afghanistan-Post Rebellion.</option>
                     <option value="271">Republic of Afghanistan</option>
                     <option value="272">Khalq Democratic Republic of Afghanistan</option>
                     <option value="273">Islamic Republic of Afghanistan (2001)</option>
                     <option value="277">Ottoman Empire</option>
                     <option value="278">Sovereign Emirate</option>
                     <option value=""></option>
                     <option value="280">Korea</option>
                     <option value="281">North Korea</option>
                     <option value="282">South Korea</option>
                     <option value=""></option>
                     <option value="284">Sultanate of Muscat and Oman</option>
                     <option value="285">Sultanate of Oman</option>
                     <option value="286"> Imperial</option>
                     <option value="309">British India-Feudatory State</option>
                     <option value="312">Early Modern</option>
                     <option value="313">Modern</option>
                     <option value="314">Colonial</option>
                     <option value="315">Modern</option>
                     <option value="316">Ancient</option>
                     <option value="317">Medieval</option>
                     <option value="318">Early Modern Age</option>
                     <option value="319">Modern</option>
                     <option value="320">Modern</option>
                     <option value="321">Early Modern</option>
                     <option value="322">Modern</option>
                     <option value="323">Medieval</option>
                     <option value="324">Early Modern</option>
                     <option value="325">Modern</option>
                     <option value="326">Modern</option>
                     <option value="328">Middle Ages</option>
                     <option value="329">British Cyprus</option>
                     <option value="330">Modern Cyprus</option>
                     <option value="331">Modern</option>
                     <option value="334">Colonial</option>
                     <option value="356">Late modern/ Socialist Albania/Peoples Republic of Albania</option>
                     <option value="357">Late modern/ Socialist Albania/Peoples Socialist Republic of Albania</option>
                     <option value="358">Republic of Albania</option>
                     <option value="359">Archaic period (pre-Hispanic era)</option>
                     <option value="360">Spanish Colonial</option>
                     <option value="361">United States Administration</option>
                     <option value="362">Republic</option>
                     <option value="363">Culion Leper Colony</option>
                     <option value=""></option>
                     <option value="365">Hejaz and Nejd</option>
                     <option value="366">Hejaz and Mecca</option>
                     <option value="367">Hejaz and Nejd Sultanate</option>
                     <option value="368">United Nations</option>
                     <option value="369">Modern</option>
                     <option value="370">Modern</option>
                     <option value=""></option>
                     <option value="374">Republic</option>
                     <option value=""></option>
                     <option value="376">Modern</option>
                     <option value="377">Republic</option>
                     <option value="380">Imperial China</option>
                     <option value="381">Modern</option>
                     <option value="385">Fujairah</option>
                     <option value="386">Ajman</option>
                     <option value="387">Ras al-Khaimah</option>
                     <option value="388">Sharjah</option>
                     <option value="389">Umm al Qaiwan</option>
                     <option value="390">United Arab Emirates</option>
                     <option value=""></option>
                     <option value="392">Ancient</option>
                     <option value="393">Medieval</option>
                     <option value=""></option>
                     <option value="395">Albanian Republic</option>
                     <option value="396">Principality of Albania</option>
                     <option value="397">NA</option>
                     <option value="398">People's Socialist Republic of Albania</option>
                     <option value="400">Kingdom of Albania</option>
                     <option value="401">Indian Princely States</option>
                     <option value="403">Independent India</option>
                </select>
                </div>
             </div>
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Upload Image</label> 
                <div class="col-md-9">
                   <input name="fileupload" type="file" class="form-control image-preview-filename">                      
                </div>
             </div>
             <div class="form-group row">
                <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
                <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" value=""> </div>
             </div> 
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
          <input type="reset" value="Reset" class="btn btn-warning btn-sm">
        </div>
      </div>
    </div>
  </div>
 
  <div class="modal fade" id="EditDynasty" tabindex="-1" aria-labelledby="EditDynastyLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditDynastyLabel">Edit Dynasty</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Title</label> 
                <div class="col-md-9"> <input name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title" /></div>
             </div>
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Period</label> 
                <div class="col-md-9">
                   <select name="type" class="form-control" required="required">
                        <option value="">Select Period</option>
                        <option value="4">Medieval</option>
                        <option value="10">Colonial</option>
                        <option value="17">Ancient</option>
                        <option value="20">Independent India</option>
                        <option value="22">Republic</option>
                        <option value="30">Modern</option>
                        <option value="32">Early bank Notes</option>
                        <option value="33">British India</option>
                        <option value="34">British india</option>
                        <option value="38">Princely State</option>
                        <option value="42">British India - Convention State</option>
                        <option value="49">Colonial</option>
                        <option value="52">Hellenistic</option>
                        <option value="56">Archaic</option>
                        <option value="63">Classical</option>
                        <option value="71">United States of America</option>
                        <option value="72">Modern</option>
                        <option value="77">Medieval</option>
                        <option value="78">Colonial</option>
                        <option value="80">Pre-decimal</option>
                        <option value="81">Decimal</option>
                        <option value="83">Modern</option>
                        <option value="88">Republic</option>
                        <option value="89">Republic</option>
                        <option value="90">Colonial</option>
                        <option value="91">Colonial</option>
                        <option value="93">Republic</option>
                        <option value="97">Commemorative Coinage</option>
                        <option value="147">Edo Period - Kan'ei Era</option>
                        <option value="148">Edo Period - Shotoku-Kyoho Era</option>
                        <option value="149">Edo Period - Kanbun Era</option>
                        <option value="150">Edo Period - Genbun Era</option>
                        <option value="151">Edo Period - Kanpo Era</option>
                        <option value="152">Edo Period - Meiwa Era</option>
                        <option value="153">Edo Period - Koka Era</option>
                        <option value="154">Edo Period - An'ei Era</option>
                        <option value="155">Edo Period - Keio Era</option>
                        <option value="156">Edo Period - Bunkyu Era</option>
                        <option value="157">Edo Period - Tenpo Era</option>
                        <option value="158">Edo Period - Bunsei Era</option>
                        <option value="159">Edo Period - Ansei Era</option>
                        <option value="160">Edo Period - Kaei Era</option>
                        <option value="161">Modern Japan</option>
                        <option value="162">Edo Period - Man'en Era</option>
                        <option value="163">Edo Period - Kyoho Era</option>
                        <option value="164">Edo Period - Genroku Era</option>
                        <option value="165">Azuchi Momoyama - Keicho Era</option>
                        <option value="166">Edo Period - Genna Era</option>
                        <option value="167">Edo Period - Hoei Era</option>
                        <option value="168">Edo Period</option>
                        <option value="169">Edo Period - Shotoku Era</option>
                        <option value="170">Azuchi Momoyama - Ansei Era</option>
                        <option value="171">Azuchi Momoyama - Tensho Era</option>
                        <option value="172">Azuchi Momoyama - Meireki Era</option>
                        <option value="173">Colonial</option>
                        <option value="174">Commonwealth</option>
                        <option value="175">Modern</option>
                        <option value="178">Brunei</option>
                        <option value="179">Period III</option>
                        <option value="180">Period II</option>
                        <option value="181">Period IV</option>
                        <option value="182">Period I</option>
                        <option value="183">Parliamentary Democracy</option>
                        <option value="184">Colonial</option>
                        <option value="185">Republic</option>
                        <option value="190">US State series</option>
                        <option value="191">Modern</option>
                        <option value="193">Colonial</option>
                        <option value="195">British North Borneo</option>
                        <option value="196">Early Colonial Period</option>
                        <option value="198">Principality</option>
                        <option value="199">British Caribbean Territories, Eastern Group</option>
                        <option value="200">Republic of Biafra</option>
                        <option value="201">Dutch Administration. </option>
                        <option value="202">Republic of South Sudan</option>
                        <option value="206">Early Modern</option>
                        <option value="207">Modern</option>
                        <option value="208">Modern</option>
                        <option value="209">Sultanate</option>
                        <option value="210">Colonial</option>
                        <option value="211">Modern</option>
                        <option value="212">Before Independence</option>
                        <option value="213">Confederation</option>
                        <option value="214">Republic</option>
                        <option value="215">Token Coinage</option>
                        <option value="216">COB Coinage</option>
                        <option value="217">British Mauritius</option>
                        <option value="218">Commonwealth Realm</option>
                        <option value="219">Republic</option>
                        <option value="220">Monarchy</option>
                        <option value="221">Republic</option>
                        <option value="222">Modern</option>
                        <option value="224">Ancient</option>
                        <option value="225">Medieval</option>
                        <option value="226">Modern</option>
                        <option value="227">Imperial Burma</option>
                        <option value="228">Early Modern</option>
                        <option value="229">Modern</option>
                        <option value="233">Early modern</option>
                        <option value="234">Modern</option>
                        <option value="235">Republic</option>
                        <option value="238">Modern</option>
                        <option value="239">Tibetan Authority</option>
                        <option value="240">Chinese Authority</option>
                        <option value="241">Joint Chinese and Tibetan Authority</option>
                        <option value="242">Early Modern</option>
                        <option value="243">Modern</option>
                        <option value="244">Medieval Thailand - Rattanakosin Period</option>
                        <option value="245">Medieval Thailand</option>
                        <option value="247">Ottoman Era</option>
                        <option value="248">Republic</option>
                        <option value="249">Modern</option>
                        <option value="250">Early Modern Period</option>
                        <option value="251">Colonial Period</option>
                        <option value="252">Dark Age of Cambodia (Middle Period)</option>
                        <option value="253">Contemporary Period</option>
                        <option value="254">Republic</option>
                        <option value="255">Modern</option>
                        <option value="256">Warlord Period- Thinh Duc</option>
                        <option value="257">Warlord Period- Vinh Duc</option>
                        <option value="258">Warlord Period- Vinh Tri</option>
                        <option value="259">Warlord Period- Chinh Hoa</option>
                        <option value="260">Warlord Period- Vinh Thinh</option>
                        <option value="261">Warlord Period- Bao Thai</option>
                        <option value="262">Warlord Period- Canh Hung</option>
                        <option value="263">Rebel Coinage</option>
                        <option value="264">Warlord Period- Chieu Thong</option>
                        <option value="265">Occupation Coinage</option>
                        <option value="266">United Period</option>
                        <option value="267">French Colonial Era</option>
                        <option value="268">Republican Period</option>
                        <option value=""></option>
                        <option value="270">Kingdom of Afghanistan-Post Rebellion.</option>
                        <option value="271">Republic of Afghanistan</option>
                        <option value="272">Khalq Democratic Republic of Afghanistan</option>
                        <option value="273">Islamic Republic of Afghanistan (2001)</option>
                        <option value="277">Ottoman Empire</option>
                        <option value="278">Sovereign Emirate</option>
                        <option value=""></option>
                        <option value="280">Korea</option>
                        <option value="281">North Korea</option>
                        <option value="282">South Korea</option>
                        <option value=""></option>
                        <option value="284">Sultanate of Muscat and Oman</option>
                        <option value="285">Sultanate of Oman</option>
                        <option value="286"> Imperial</option>
                        <option value="309">British India-Feudatory State</option>
                        <option value="312">Early Modern</option>
                        <option value="313">Modern</option>
                        <option value="314">Colonial</option>
                        <option value="315">Modern</option>
                        <option value="316">Ancient</option>
                        <option value="317">Medieval</option>
                        <option value="318">Early Modern Age</option>
                        <option value="319">Modern</option>
                        <option value="320">Modern</option>
                        <option value="321">Early Modern</option>
                        <option value="322">Modern</option>
                        <option value="323">Medieval</option>
                        <option value="324">Early Modern</option>
                        <option value="325">Modern</option>
                        <option value="326">Modern</option>
                        <option value="328">Middle Ages</option>
                        <option value="329">British Cyprus</option>
                        <option value="330">Modern Cyprus</option>
                        <option value="331">Modern</option>
                        <option value="334">Colonial</option>
                        <option value="356">Late modern/ Socialist Albania/Peoples Republic of Albania</option>
                        <option value="357">Late modern/ Socialist Albania/Peoples Socialist Republic of Albania</option>
                        <option value="358">Republic of Albania</option>
                        <option value="359">Archaic period (pre-Hispanic era)</option>
                        <option value="360">Spanish Colonial</option>
                        <option value="361">United States Administration</option>
                        <option value="362">Republic</option>
                        <option value="363">Culion Leper Colony</option>
                        <option value=""></option>
                        <option value="365">Hejaz and Nejd</option>
                        <option value="366">Hejaz and Mecca</option>
                        <option value="367">Hejaz and Nejd Sultanate</option>
                        <option value="368">United Nations</option>
                        <option value="369">Modern</option>
                        <option value="370">Modern</option>
                        <option value=""></option>
                        <option value="374">Republic</option>
                        <option value=""></option>
                        <option value="376">Modern</option>
                        <option value="377">Republic</option>
                        <option value="380">Imperial China</option>
                        <option value="381">Modern</option>
                        <option value="385">Fujairah</option>
                        <option value="386">Ajman</option>
                        <option value="387">Ras al-Khaimah</option>
                        <option value="388">Sharjah</option>
                        <option value="389">Umm al Qaiwan</option>
                        <option value="390">United Arab Emirates</option>
                        <option value=""></option>
                        <option value="392">Ancient</option>
                        <option value="393">Medieval</option>
                        <option value=""></option>
                        <option value="395">Albanian Republic</option>
                        <option value="396">Principality of Albania</option>
                        <option value="397">NA</option>
                        <option value="398">People's Socialist Republic of Albania</option>
                        <option value="400">Kingdom of Albania</option>
                        <option value="401">Indian Princely States</option>
                        <option value="403">Independent India</option>
                   </select>
                </div>
             </div>
            
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Current Image</label> 
                <div class="col-md-9">
                   <img src="https://www.mintageworld.com/public/images/period/medieval.jpg" alt="" class="img-fluid" />                 
                </div>
             </div>
             <div class="form-group row mb-3">
                <label class="col-md-3 control-label">Upload Image</label> 
                <div class="col-md-9">
                   <input name="fileupload" type="file" class="form-control image-preview-filename">                      
                </div>
             </div> 
             <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
               <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" disabled /> </div>
            </div>           
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit">
          <input type="reset" value="Reset" class="btn btn-warning btn-sm">
        </div>
      </div>
    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-success text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
           <small>Just Now</small>
           {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
       </div>
       <div class="toast-body">
           Saved Successfully
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-danger text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
           <small>Just Now</small>
           {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
       </div>
       <div class="toast-body">
         Something went wrong. Please contact to Administration
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
    $("#SubmitButton,#EditButton").click(function(e) {
     $('.update-success').toast('show');
     $('#EditDynasty').modal('hide');
     $('#AddDynasty').modal('hide');
    });  

</script>
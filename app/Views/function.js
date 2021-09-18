AddressForm.SIMPLE_SELECT = 1;
AddressForm.SIMPLE_SELECT_FULLFORM = 2;
AddressForm.SIMPLE_SUGGEST = 3;
AddressForm.SIMPLE_SUGGEST_FULLFORM = 4;
AddressForm.STANDARD = 5;
/**
 * An address form
 * @constructor
 * @param {string} div_id ID of form container
 * @param {JSON} options Options for form customization -- Optional --
 * <p>List of JSON attributes</p>
 * <ul>
 *   <li>language: {string} Display language (default: 'th')
 *     <ul>
 *       <li>'th': Thai</li>
 *       <li>'en': English</li>
 *     </ul>
 *   </li>
 *   <li>layout: {int} Layout format (default: AddressForm.SIMPLE_SELECT)
 *     <ul>
 *       <li>AddressForm.SIMPLE_SELECT = 1</li>
 *       <li>AddressForm.SIMPLE_SELECT_FULLFORM = 2</li>
 *       <li>AddressForm.SIMPLE_SUGGEST = 3</li>
 *       <li>AddressForm.SIMPLE_SUGGEST_FULLFORM = 4</li>
 *       <li>AddressForm.STANDARD = 5</li>
 *     </ul>
 *   </li>
 *   <li>style: {string} Name of css file including .css extension</li>
 *   <li>showLabels: {bool} Show form labels (default: true)</li>
 *   <li>required: {JSON}
 *     <ul>
 *       <li>key: {string} ID of an input field</li>
 *       <li>value: {bool} required if true, not required if false</li>
 *     </ul>
 *   </li>
 *   <li>label: {JSON}
 *     <ul>
 *       <li>key: {string} ID of an input field</li>
 *       <li>value: {string} Label display text</li>
 *     </ul>
 *   </li>
 *   <li>placeholder: {JSON}
 *     <ul>
 *       <li>key: {string} ID of an input field</li>
 *       <li>value: {string} Placeholder display text</li>
 *     </ul>
 *   </li>
 *   <li>bigLabelFont: {string} Font family for big labels</li>
 *   <li>smallLabelFont: {string} Font family for small labels</li>
 *   <li>errorLabelFont: {string} Font family for error labels</li>
 *   <li>map: {string} ID of map container</li>
 *   <li>debugDiv: {string} ID of a div to show form data</li>
 * </ul>
 */
function AddressForm(div_id,options){
	var self = this;
	var options = options || {} ;
	var mode = options['layout'] || null;
	var map_id = options['map'] || null;
	var directory = getScriptPath()+"/../";
	var marker = {};
	var map = {};
	var language,keys,required,debugDiv,valid,formData ;
	var changeTimer = false;
	var init = true;
	//temporary variable for searching
	var suggest_geocode,temp_searchtext,temp_searchtype,temp_postal_code ;
	suggest_geocode = {};
	temp_searchtext = {};
	temp_searchtype = {};
	temp_postal_code = [];
	switch(mode){
		case AddressForm.SIMPLE_SELECT:
		template = "form_simple_select.php";
		break;
		case AddressForm.SIMPLE_SELECT_FULLFORM:
		template = "form_simple_select_fullform.php";
		break;
		case AddressForm.SIMPLE_SUGGEST:
		template = "form_simple_suggest.php";
		break;
		case AddressForm.SIMPLE_SUGGEST_FULLFORM:
		template = "form_simple_suggest_fullform.php";
		break;
		case AddressForm.STANDARD:
		template = "form.php";
		break;
		default:
		template = "form_simple_select.php";
	}
	//initialze custom dropdown and events
	$("#"+div_id).load(directory + template,function(){
		$('head').append('<link rel="stylesheet" href="'+directory+'css/default.css" type="text/css" />');
		$('head').append('<link rel="stylesheet" href="'+directory+'css/jquery.dropdown.css" type="text/css" />');
		$('head').append('<script type="text/javascript" src="'+directory+'js/jquery.dropdown.js"></script>');
		// add keyboard support
		$("#addressform input").keydown(function(event){ 
		    switch(event.which){
		    	case 13: 	//enter
		    		$(".jq-dropdown a.hovered").first().trigger("click");
		    	break;
		    	case 38: 	//up
		    		if($(".jq-dropdown a.hovered").length > 0){
		    			var index = $(".jq-dropdown a").index($(".jq-dropdown a.hovered"));
		    			if(index > 0){
		    				$(".jq-dropdown a").eq(index).removeClass("hovered");
		    				$(".jq-dropdown a").eq(index-1).addClass("hovered");
		    			}
		    		}
		    		else{
		    			$(".jq-dropdown a").eq(0).addClass("hovered");
		    		}
		    	break;
		    	case 40: 	//down
		    		if($(".jq-dropdown a.hovered").length > 0){
		    			var index = $(".jq-dropdown a").index($(".jq-dropdown a.hovered"));
		    			if(index < $(".jq-dropdown a").length - 1){
		    				$(".jq-dropdown a").eq(index).removeClass("hovered");
		    				$(".jq-dropdown a").eq(index+1).addClass("hovered");
		    			}
		    		}
		    		else{
		    			$(".jq-dropdown a").eq(0).addClass("hovered");
		    		}
		    	break;
		    }
		});
		//add mouse support
		$('.jq-dropdown').on('mouseenter', '.jq-dropdown-menu li > a', function (event) {
			$(".jq-dropdown a.hovered").removeClass("hovered");
		    $(this).addClass("hovered");
		});
		$('.jq-dropdown').on('mouseleave', '.jq-dropdown-menu li > a', function (event) {
		    $(this).removeClass("hovered");
		});
		$("#addressform input[data-jq-dropdown='#jq-dropdown']").mousedown(function(){ 
		    $(this).jqDropdown('hide');
		});
		// input events
		$('#addressform input').on('click',function(){
			initsuggest($(this).attr('id'));
		});
		$('#addressform input').on('input',function(){
			var self = this;
			if(changeTimer !== false) clearTimeout(changeTimer);
				changeTimer = setTimeout(function(){
	            suggest($(self).attr('id'));
	            changeTimer = false;
	        },200);
			
		});
		$('#addressform input, #addressform textarea').on('blur',function(){
			validate($(this).attr('name'));
		});
		$('#addressform select').on('change',function(){
			validate($(this).attr('name'));
			onSelectChange($(this).attr('name'));
		});
		$('#addressform').delegate('a.choice','click',function(){
			onSuggestClick($(this));
		});
		$('#addressform').delegate('a.choice-auto','click',function(){
			autofill($(this).attr('type'),$(this).attr('data'));
		});
		initCountry();
		if(options['language'] && options['language'].toLowerCase() == 'en') language = 'en';
		else language = 'th';
		self.setLanguage(language);
	});
	keys = {"address1":["address1","house_number","building","floor","parent","soi","moo", "street","route"]
, "address2":["address2","subdistrict","district","province","postal_code","etc","geocode"]};
	required = {
		"postal_code": true,
		"poi": false,
		"address1": false,
		"address2": false,
		"house_number": false, 
		"building": false, 
		"floor": false, 
		"parent": false, 
		"soi": false, 
		"moo": false, 
		"street": false, 
		"route": false, 
		"subdistrict": true, 
		"district": true, 
		"province": true, 
		"country": true,
		"etc": true,
		"geocode": false
		 };
	// init map
	if(map_id){
		map = new longdo.Map({
		  placeholder: document.getElementById(map_id),
		  ui: longdo.UiComponent.Mobile
		});
		map.zoom(15);
		// map.Ui.Zoombar.visible(false);
		map.Ui.Geolocation.visible(false);
		map.Ui.Fullscreen.visible(false);
		initMarker(13.722642,100.529316);
	}
	else map = new longdo.Map();
	debugDiv = '';
	valid = false;
	formData = {};
	map.Search.language('th');
	//bind suggest
	map.Event.bind('suggest', handlesuggest);
	//bind search
	// map.Event.bind('search', handlesearch);
	//bind address
	// map.Event.bind('address', getAddressFromPostalCode);
	map.Event.bind('overlayDrop', function(overlay) {
	  if (overlay == marker) {
			map.Event.bind('address', getAddressFromLatLon);
			map.Search.address(marker.location());
	  }
	});
	/**
	  * Set language of the form using javascript
	  * @param {string} lang Language code ('th','en')
	  */
	this.setLanguage = function(lan){
		var self = this;
		language = lan = lan.toLowerCase();
		map.Search.language(lan);
		$.getScript(directory+"js/lang-"+lan+".js", function(){});
	    $.ajax({
	        url: directory+'languages.php',
	        success: function(xmlf) {
	        	xml = $.parseXML(xmlf);
	            $(xml).find('translation').each(function(){
	                var id = $(this).attr('id');
	                var text = $(this).find(lan).text();
	                if(id !== "country" && $("#" + id ).prop('tagName') === "SELECT") {
	                	$('#'+id).html('<option selected disabled>'+text+'</option>');
	                }
	                if($("#" + id +"_label").css('display') === "none") self.setPlaceholder(id,text);
	                $("#" + id +"_label").html(text);
	            });
	            $(xml).find('placeholder').each(function(){
	                var id = $(this).attr('id');
	                var text = $(this).find(lan).text();
	                if($("#" + id +"_label").css('display') !== "none") self.setPlaceholder(id,text);
	            });
	            // change "optional" text language
	            if(lan == "en") $('#addressform .small-label').addClass("en");
	            else $('#addressform .small-label').removeClass("en");
	            if(init){
	            	init = false;
	            	// customizeForm from options
								if(options['showLabels'] == false) self.hideLabels();
								if(options['debugDiv']) self.setDebugDiv(options['debugDiv']);
								if(options['style']) self.setStyle(options['style']);
								if(options['bigLabelFont']) self.setBigLabelFontFamily(options['bigLabelFont']);
								if(options['smallLabelFont']) self.setSmallLabelFontFamily(options['smallLabelFont']);
								if(options['errorLabelFont']) self.setErrorLabelFontFamily(options['errorLabelFont']);
								if(options['label']){
									$.each(options['label'], function( key, val ) {
									  self.setLabelText(key, val);
									});
								}
								if(options['placeholder']){
									$.each(options['placeholder'], function( key, val ) {
									  self.setPlaceholder(key, val);
									});
								}
								if(options['required']){
									$.each(options['required'], function( key, val ) {
									  self.setRequired(key, val);
									});
								}
	            }
	        }
	    });
	}
	/**
	  * Set style of the form using CSS
	  * @param {string} filename CSS file name (including .css)
	  */
	this.setStyle = function(filename){
		$('head').append('<link rel="stylesheet" href="'+filename+'" type="text/css" />');
	}
	/**
	  * Get form data in JSON format and show it in debug div if the div is set
	  * @returns {JSON} Form's JSON data
	  */
	this.getFormJSON = function(){
		return getFormData();
	}
	/**
	  * Set label text for an input field
	  * @param {string} type ID of the input field
	  * @param {string} text Label display text
	  */
	this.setLabelText = function(type,text){
	    $("#"+type+"_label").html(text);
	}
	/**
	  * Set placeholder text for an input field
	  * @param {string} type ID of the input field
	  * @param {string} text Placeholder display text
	  */
	this.setPlaceholder = function(type,text){
		if(text != "" && !$("#"+type+"_label").hasClass("required") && $("#"+type+"_label").css('display') === "none") text+=lang.not_required;
		if(type !== "country" && $("#" + type ).prop('tagName') === "SELECT") {
			$("#" + type + " option").eq(0).html(text);
		}
		else $("#"+type).attr("placeholder",text);
	}
	/**
	  * Hide form labels and move those labels to placeholders instead
	  */
	this.hideLabels = function(){
		var self = this;
		$('.small-label, .big-label').each(function(index, element){
			$(element).hide();
			var label_id = $(element).attr('id');
			var id = label_id.substring(0,label_id.length-6);
			self.setPlaceholder(id,$(element).html());
		});
	}
	/**
	  * Show form labels
	  */
	this.showLabels = function(){
		var self = this;
		$('.small-label, .big-label').each(function(index, element){
			$(element).show();
			var label_id = $(element).attr('id');
			var id = label_id.substring(0,label_id.length-6);
			self.setPlaceholder(id,'');
		});
	}
	/**
	  * Set an input field as required
	  * @param {string} type Name of the input field
	  * @param {bool} bool "required" value
	  */
	this.setRequired = function(type,bool){
		var self = this;
		required[type] = bool;
		if(bool) $("#"+type+"_label").addClass("required");
		else{
			$("#"+type+"_label").removeClass("required");
			hideerror(type);
		}
		if($("#"+type+"_label").css('display') === "none") self.setPlaceholder(type,$("#"+type+"_label").html());
	}
	/**
	  * Set div for showing form data
	  * @param {string} div_id ID of a div to show form data
	  */
	this.setDebugDiv = function(div_id){
		debugDiv = div_id;
	}
	/**
	  * Unbind and stop debug div from showing form data
	  */
	this.unbindDebugDiv = function(){
		if(debugDiv === '') return;
		else{
			$("#"+debugDiv).html('');
			debugDiv = '';
		}
	}
	/**
	  * Set font family for big labels
	  * @param {string} family Selected font family (Ex. "Times New Roman")
	  */
	this.setBigLabelFontFamily = function(family){
		$('.big-label').css("font-family", family);
	}
	/**
	  * Set font family for small labels
	  * @param {string} family Selected font family (Ex. "Times New Roman")
	  */
	this.setSmallLabelFontFamily = function(family){
		$('.small-label').css("font-family", family);
	}
	/**
	  * Set font family for error labels
	  * @param {string} family Selected font family (Ex. "Times New Roman")
	  */
	this.setErrorLabelFontFamily = function(family){
		$('.error').css("font-family", family);
	}
	/**
	  * Reset form values
	  */
	this.resetForm = function(){
		var resetType = ['province','district','subdistrict'];
		for(var i=0;i<resetType.length;i++){
			if($("#" + resetType[i] ).prop('tagName') === "SELECT"){
				$('#'+resetType[i]+' option:enabled').remove();
				$('#'+resetType[i]).addClass('notselected');
			}
		}
		$('#addressform')[0].reset();
		// $('#addressform input').val("");
	}
	function getScriptPath(){
		var scripts = document.getElementsByTagName('SCRIPT');
	    var path = '';
	    if(scripts && scripts.length>0) {
	        for(var i in scripts) {
	            if(scripts[i].src && scripts[i].src.match(/\/addressform\.js$/)) {
	                path = scripts[i].src.replace(/(.*)\/addressform\.js$/, '$1');
	                break;
	            }
	        }
	    }
	    return path;
	}
	function initCountry(){
		$.ajax({
		   type: 'GET',
		    url: directory+"js/country_dial_codes.json",
		    dataType: 'json',
		    success: function(data) {
		       var countryOptions = "";
				$.each( data, function( key, val ) {
				  countryOptions+= '<option value="'+val.code+'">'+val.name+'</option>';
				});
				$('#country').html(countryOptions);
		    },
		    error: function(e) {
		       console.log(e);
		    }
		});
	}
	function getAddressFromPostalCode(result){
		if(result === null){
			showerror('postal_code',lang.postal_code_invalid);
		}
		else{
			hideerror('postal_code');
			switch($('#province').prop('tagName')){
				case "SELECT": initSelectFromAddress(result.address);
				break;
				case "INPUT": initPostalDropdown(result.address);
				break;
			}
		}
		map.Event.unbind('address', getAddressFromPostalCode);
	}
	function getAddressFromLatLon(result){
		if(result === null) return;
		else {
			var str;
		  	if(language=='th') str = result.subdistrict+" "+result.district+" "+result.province ;
		  	else str = result.subdistrict+", "+result.district+", "+result.province ;
			autofill('subdistrict',str);
			autofill('postal_code',result.postcode);
		}
		map.Event.unbind('address', getAddressFromLatLon);
	}
	function getGeocodeFromLatLon(result){
		if(result === null){
			geocode = '';
		}
		else {
			geocode = result.geocode;
		}
		if($('#geocode').length) $('#geocode').val(geocode);
		map.Event.unbind('address', getGeocodeFromLatLon);
	}
	function initSelectFromAddress(items){
		var province_ar = {};
		var district_ar = {};
		var subdistrict_ar = {};
		$.each(items, function (index, val) {
			province_ar[val.geocode.substr(0,2)] = val;
			district_ar[val.geocode.substr(0,4)] = val;
			subdistrict_ar[val.geocode] = val;
		});
		// "SELECT"
		$('#province').html('<option selected disabled>'+$('#province_label').html()+($('#province_label').hasClass("required")?'':lang.not_required)+'</option>');
		$('#district').html('<option selected disabled>'+$('#district_label').html()+($('#district_label').hasClass("required")?'':lang.not_required)+'</option>');
		$('#subdistrict').html('<option selected disabled>'+$('#subdistrict_label').html()+($('#subdistrict_label').hasClass("required")?'':lang.not_required)+'</option>');
		$('#province, #district, #subdistrict').addClass('notselected');
		var selected_str ;
		// insert select options
		// TODO : add options to make it more flexible
		// province options
		selected_str = (numKeys(province_ar) > 0)?  "selected" : "" ;
		if(selected_str) $('#province').removeClass('notselected');
		$.each(province_ar, function (geocode, val) {
			$('#province').append('<option geocode="'+geocode+'" '+selected_str+' val="'+val.province+'">'+val.province+'</option>');
			selected_str = "";
		});
		// district options
		selected_str = (numKeys(district_ar) > 0)?  "selected" : "" ;
		if(selected_str) $('#district').removeClass('notselected');
		$.each(district_ar, function (geocode, val) {
			$('#district').append('<option geocode="'+geocode+'" '+selected_str+'>'+val.district+'</option>');
			selected_str = "";
		});
		$.each(province_ar, function (geocode, val) {
			map.Event.bind('search', appendSelectOption);
			map.Search.search("", {
		    	tag: "district",
		    	dataset: 'data2a',
		    	area: geocode,
		    	limit: 100
				});
		});
		// subdistrict options
		selected_str = (numKeys(subdistrict_ar) > 0)?  "selected" : "" ;
		if(selected_str) $('#subdistrict').removeClass('notselected');
		$.each(subdistrict_ar, function (geocode, val) {
			$('#subdistrict').append('<option geocode="'+geocode+'" '+selected_str+' val="'+val.subdistrict+'" lat="'+val.lat+'" lon="'+val.lon+'">'+val.subdistrict+'</option>');
			selected_str = "";
		});
	}
	function initPostalDropdown(items){
		var list = '<ul class="jq-dropdown-menu">';
		for (var i = 0, item; item = items[i]; ++i) {
			var str;
			var displayString = item.subdistrict+' → '+item.district+' → '+item.province ;
	  	if(language=='th') str = item.subdistrict+' '+item.district+' '+item.province ;
	  	else str = item.subdistrict+", "+item.district+", "+item.province ;
	  	list+='<li><a class="choice" type="postal_code" data="'+str+'" lat="'+item.lat+'" lon="'+item.lon+'" geocode="'+item.geocode+'">'+displayString+"</a></li>";
		}  
		list+="</ul>";
		initDropDown(list);
	}
	function initMarker(latitude,longitude){
		marker = new longdo.Marker({ lon: longitude, lat: latitude },
			{
				draggable: true,
	  			weight: longdo.OverlayWeight.Top
			});
		map.Overlays.clear();
		map.Overlays.add(marker);
		map.location(marker.location());
		
		map.resize();
	}
	function handlePOIsearch(result){
		// find first result with poi data type
		var poiIndex = 0;
		$.each(result.data, function (index, val) {
			if(val.type == "poi"){
				poiIndex = index;
				return false;
			}
		});
		var part = ["subdistrict","district","province","postal_code"];
		var address = splitlocationstring(result.data[poiIndex].address);
		var lat = result.data[poiIndex].lat ;
		var lon = result.data[poiIndex].lon ;
		var ar_index = address.length-1;
		for(var i=part.length-1; i>=0;i--){
			switch(part[i]){
				case 'province':
				  if(address[ar_index].substring(0,7) === 'กรุงเทพ') address[ar_index] = 'กรุงเทพมหานคร';
			    else if(address[ar_index].charAt(1) === '.') address[ar_index] = address[ar_index].substring(2);
				break;
				case 'district':
			    if(address[ar_index].substring(0,3) === 'เขต') address[ar_index] = address[ar_index].substring(3);
			    else if(address[ar_index].charAt(1) === '.') address[ar_index] = address[ar_index].substring(2);
				break;
				case 'subdistrict':
					if(address[ar_index].substring(0,3) === 'แขวง') address[ar_index] = address[ar_index].substring(3);
			    else if(address[ar_index].charAt(1) === '.') address[ar_index] = address[ar_index].substring(2);
				break;
			}
			$("#"+part[i]).val(address[ar_index--]);
			hideerror(part[i]);
	  }
  	var etc_ar = [];
  	for(var i=0; i<=ar_index;i++){
			etc_ar.push(address[i]);
  	}
  	if(etc_ar.length){
  		$("#etc").val(etc_ar.join(' '));
  		hideerror('etc');
  	}
	  if(map_id){
			initMarker(lat,lon);
		}
	  map.Event.unbind('search', handlePOIsearch);
	  // map.Event.bind('search', handlesearch);
	  //search geocode from lat/lon
	  map.Event.bind('address', getGeocodeFromLatLon);
		map.Search.address({lat:lat, lon:lon});
	  
	}
	function searchpostalcode(result){
		//console.log(result);
		temp_postal_code = [];
		var item = result.data[0];
		var lat = result.data[0].lat ;
		var lon = result.data[0].lon ;
		for(var j=0; j<item.tag.length;j++){
			if(item.tag[j].indexOf("__POST") === 0)
	  		temp_postal_code.push(item.tag[j].substring(6));
	  	}
	  	temp_postal_code = eliminateDuplicates(temp_postal_code);
	  	if(temp_postal_code[0]){
	  		$('#postal_code').val(temp_postal_code[0]);
	  		hideerror('postal_code');
	  	}
	  	if(map_id){
	  		initMarker(lat,lon);
	  	}
	  map.Event.unbind('search', searchpostalcode);
		
	}
	function geocodesearch(result){
		  
		  var item = result.data[0];
		  if (typeof item === "undefined") return;
		  var code = item.id;
		  //derive geocode from code "K00xxxxxx"
		  if(code.substring(5) === "0000") suggest_geocode = code.substring(3,5);
		  else if(code.substring(7) === "00") suggest_geocode = code.substring(3,7);
		  else suggest_geocode = code.substring(3);
		  map.Event.unbind('search', geocodesearch);
		  map.Event.bind('search', handlesearch);
		  map.Search.search(temp_searchtext, {
	    	tag: temp_searchtype,
	    	dataset: 'data2a',
	    	area: suggest_geocode,
	    	limit: 7
			});
	}
	function handlesearch(result){
		if ($('#'+temp_searchtype).val() !== result.meta.keyword) return;
		var list = '<ul class="jq-dropdown-menu">';
		var keyword = result.meta.keyword;
		  
		for (var i = 0, item; item = result.data[i]; ++i) {
		  var name = item.name;
		  var displayname = name.replace(new RegExp(keyword, 'g'), '<font color="blue">'+keyword+'</font>');
		  var geocode = item.id.substring(3);
		  list+='<li><a class="choice" type="'+temp_searchtype+'"  data="'+name+'") geocode="'+geocode+'">'+((language=='th') ? displayname.replace(/ /g,' → '):displayname)+'</a></li>';
		}
		
		list+='</ul>';
		initDropDown(list);
		map.Event.unbind('search', handlesearch);
	}
	function appendSelectOption(result){
		$.each(result.data, function (index, val) {
			//derive geocode from code "K00xxxxxx"
			var geocode;
			var code = val.id;
			if(code.substring(5) === "0000") geocode = code.substring(3,5);
			else if(code.substring(7) === "00") geocode = code.substring(3,7);
			else geocode = code.substring(3);
			var name;
			if(language === 'th') name = val.name.split(' ')[0];
			else if(language === 'en') name = val.name.split(', ')[0];
			if(!$('#'+val.tag[0]).find('option[geocode='+geocode+']').length)
				$('#'+val.tag[0]).append('<option geocode="'+geocode+'">'+name+'</option>');
		});
		map.Event.unbind('search', appendSelectOption);
	}
	function handlesuggest(result){
		if ($('#'+temp_searchtype).val() !== result.meta.keyword) return;
		var list = '<ul class="jq-dropdown-menu">';
		for (var i = 0, item; item = result.data[i]; ++i) {
			if( temp_searchtype=="subdistrict" || temp_searchtype=="district" || temp_searchtype=="province"){
				var st = splitlocationstring(item.w);
		  	if(st.length > 2)
		    	list+='<li><a class="choice" type="'+temp_searchtype+'" data="'+item.w+'")>'+item.d+'</a></li>';
			}
			else list+='<li><a class="choice" type="'+temp_searchtype+'" data="'+item.w+'")>'+item.d+'</a></li>';
		}
		list+="</ul>";
		initDropDown(list);
	}
	function initsuggest(searchtype){ //trigger by onfocus
		$("#"+searchtype).jqDropdown('show');
		$("#jq-dropdown").html('');
		$("#jq-dropdown").removeClass("jq-dropdown-tip");
		var list = '<ul class="jq-dropdown-menu">';
		if($('#addressform #country').val() == "TH"){
			switch(searchtype){
				case 'address1':
					showdetailedform(1);
					hidedetailedform(2);
				break;
				case 'route':
					list+="<span>"+lang.route_info+"</span>";
				break;
				case 'address2':
					suggest('address2');
					showdetailedform(2);
					hidedetailedform(1);
				break;
				case 'poi':
					suggest('poi');
					showdetailedform(2);
					hidedetailedform(1);
				break;
				case 'district':
					suggest('district');
				break;
				case 'subdistrict':
					suggest('subdistrict');
				break;
				case 'province':
					if($("#province").val() === ''){ //list province if empty
						for(var i=0; i < lang.provinces.length ;i++){
							list+='<li><a class="choice-auto" data="'+lang.provinces[i]+'" type="province2">'+lang.provinces[i]+'</a></li>';
						}	
					}
					else suggest('province');
				break;
				case 'postal_code':
					if(!isModeSelect()) suggest('postal_code');
				break;
			}
		}
		list += '</ul>';
		initDropDown(list);
	}
	function suggest(searchtype){ //trigger by oninput
		temp_searchtype = searchtype;
		var str = $('#'+searchtype).val();
		if($('#addressform #country').val() == "TH" && str.length > 0){
			
			switch(searchtype){
					case 'poi':
						// cut "ตำบล","แขวง"
						if(str.length > 4 && (str.substring(0,4) === "ตำบล" || str.substring(0,4) === "แขวง"))
							str = str.substring(4);
						map.Search.suggest(str, {
				    	// dataset: 'poi_a',
				    	dataset: 'poi,poi2',
				    	limit:7
				  		});
			  	break;
			  	// FIXME: Dataset poi_r also contains soi
			  	case 'street':
			  		map.Search.suggest(str, {
			    	dataset: 'poi_r',
			    	limit:5
			  		});
			  	break;
			  	case 'building':
			  		map.Search.suggest(str, {
			    	dataset: 'poi_p',
			    	limit:5
			  		});
			  	break;
			  	case 'parent':
			  		map.Search.suggest(str, {
			    	dataset: 'poi',
			    	limit:5
			  		});
			  	break;
			  	case 'address2':
			  	case 'subdistrict':
			  	case 'district':
			  	case 'province':
			  	 	var searchtext,hasparent;
			  	 	searchtext = str;
			  	 	hasparent = false;
			  	 	switch(searchtype){
			  	 		case 'address2':
			  	 		case 'subdistrict':
			  	 			if($('#district').val() !== '') hasparent=true;
			  	 			if($('#province').val() !== '') hasparent=true;
			  	 		break;
			  	 		case 'district':
			  	 			if($('#province').val() !== '') hasparent=true;
			  	 		break;
			  	 	}
			  	 	if(hasparent && searchtype !== 'address2'){	//If the parent is inserted, reverse search
			  	 		var parenttype = '';
			  	 		var parentsearchtext = '';
			  	 		switch(searchtype){
			  	 			case 'subdistrict':
			  	 				if($('#district').val() !== '' && $('#province').val() !== ''){
			  	 					parenttype = 'district';
			  	 					if(language === 'th'){
			  	 						if($('#province').val().substring(0,7) !== "กรุงเทพ"){
			  	 						parentsearchtext = $('#district').val()+" จ."+$('#province').val();
				  	 					}
				  	 					else parentsearchtext = $('#district').val()+" "+$('#province').val();
			  	 					}
			  	 					else if(language === 'en'){
			  	 						parentsearchtext = $('#district').val()+", "+$('#province').val();
			  	 					}
			  	 					
			  	 				}
			  	 				else if($('#district').val() !== ''){
			  	 					parenttype = 'district';
			  	 					parentsearchtext = $('#district').val();
			  	 				}
			  	 				else if($('#province').val() !== ''){
			  	 					parenttype = 'province';
			  	 					parentsearchtext = $('#province').val();
			  	 				}
			  	 			break;
			  	 			case 'district':
			  	 				if($('#province').val() !== ''){
			  	 					parenttype = 'province';
			  	 					parentsearchtext = $('#province').val();
			  	 				}
			  	 			break;
			  	 		}
			  	 		temp_searchtext = searchtext;
			  	 		temp_searchtype = searchtype;
						map.Event.bind('search', geocodesearch);
						map.Search.search(parentsearchtext, {
					    	tag: parenttype,
					    	dataset: 'data2a',
					    	limit: 5
				  		});			
			  	 	}
			  		else{	//direct search
			  			map.Event.bind('search', handlesearch);
			  			map.Search.search(searchtext, {
				    	tag: searchtype === 'address2' ? 'subdistrict' : searchtype,
				    	dataset: 'data2a',
				    	limit: 5
				  		});
			  		}
			  	break;
			  	case 'postal_code':
			  		if($("#postal_code").val().length === 5){
			  			map.Event.bind('address', getAddressFromPostalCode);
			  			map.Search.address($("#postal_code").val());
						}
					else{
						$("#jq-dropdown").hide();
						// $("#jq-dropdown").html('');
						// $("#jq-dropdown").removeClass("jq-dropdown-tip");
					}
				break;
			}
			
		}
		else{
			$("#jq-dropdown").hide();
			// $("#jq-dropdown").html('');
			// $("#jq-dropdown").removeClass("jq-dropdown-tip");
		}
	}
	function onSelectChange(searchtype){	// when <option> is clicked
		$('#'+searchtype).removeClass('notselected');
		switch(searchtype){
			case 'country':
				$('#addressform .thailand-exclusive input').val('');
				if($('#country').val() == "TH"){
					$('#addressform .thailand-exclusive input, #addressform .thailand-exclusive select').prop('disabled',false);
					$('#addressform input.thailand-exclusive').prop('disabled',false);
					$('#addressform .thailand-exclusive').show();
				} else {
					$('#addressform .thailand-exclusive input, #addressform .thailand-exclusive select').prop('disabled',true);
					$('#addressform input.thailand-exclusive').prop('disabled',true);
					$('#addressform .thailand-exclusive').hide();
				}
			break;
		  	case 'province':
		  		// หยอด district กับ sub
		  		var geo = $('#province option:selected').attr('geocode');
		  		$('#district option').hide();
		  		$('#district option[geocode^='+geo+'], #district option[disabled]').show();
		  		$('#subdistrict option').hide();
		  		$('#subdistrict option[geocode^='+geo+'], #subdistrict option[disabled]').show();
		  		$('#district option[disabled], #subdistrict option[disabled]').prop('selected',true);
		  		$('#district').addClass('notselected');
		  		$('#subdistrict').addClass('notselected');
				  map.Event.bind('search', appendSelectOption);
		  		// append option to select
		  		map.Search.search("", {
			    	tag: "district",
			    	dataset: 'data2a',
			    	area: geo,
			    	limit: 100
				});
		  	break;
		  	case 'district':
		  		// หยอด sub
		  		var geo = $('#district option:selected').attr('geocode');
		  		$('#subdistrict option').hide();
		  		$('#subdistrict option[geocode^='+geo+'], #subdistrict option[disabled]').show();
		  		$('#subdistrict option[disabled]').prop('selected',true);
		  		$('#subdistrict').addClass('notselected');
				  map.Event.bind('search', appendSelectOption);
		  		// append option to select
		  		map.Search.search("", {
			    	tag: "subdistrict",
			    	dataset: 'data2a',
			    	area: geo,
			    	limit: 100
				});
		  	break;
		  	case 'subdistrict':
		  		var geo = $('#subdistrict option:selected').attr('geocode');
		  		$('#district option[geocode="'+geo.substr(0,4)+'"]').prop('selected',true);
		  		$('#district').removeClass('notselected');
				if(map_id){
					var lat = $('#subdistrict option:selected').attr('lat');
					var lon = $('#subdistrict option:selected').attr('lon');
					initMarker(lat,lon);
				}
		  	break;
		}	
	}
	function onSuggestClick(element) {	//when suggestion from dropdown is clicked
		var searchtype = element.attr('type');
		var value = element.attr('data');
		switch(searchtype){
			case 'address1':
				autofill('address1',value);
			break;
			case 'poi':
				autofill('poi',value);
				map.Event.bind('search', handlePOIsearch);
				map.Search.search(value, {
		    	limit: 2
		  	});
			break;
			case 'address2':
			case 'subdistrict':
				if(element.attr('geocode')) $('#geocode').val(element.attr('geocode'));
				autofill('subdistrict',value);
				map.Event.bind('search', searchpostalcode);
				map.Search.search(value, {
			    	tag: 'subdistrict',
			    	dataset: 'data2a',
			    	limit: 5
			  		});
				if(searchtype == 'address2') autofill(searchtype,value);
			break;
			case 'district':
				if(element.attr('geocode')) $('#geocode').val(element.attr('geocode').substring(0,4));
				autofill('district',value);
			break;
			case 'province':
				if(element.attr('geocode')) $('#geocode').val(element.attr('geocode').substring(0,2));
				autofill('province',value);
			break;
			case 'postal_code':
			  if(element.attr('geocode')) $('#geocode').val(element.attr('geocode'));
				autofill('subdistrict',value);
				var lat = element.attr('lat');
				var lon = element.attr('lon');
				if(map_id){
					initMarker(lat,lon);
				}
			break;
			default:
			autofill(searchtype,value);
	    }
	}
	function autofill(searchtype,value){
		switch(searchtype){
			case 'address1':
				// updateform('address1');
			break;
			case 'subdistrict':
			case 'district':
			case 'province': //suggestion from typing
				var str = splitlocationstring(value);
				switch(str.length){
					case 3:
						$("#subdistrict").val(str[0]);
						$("#district").val(str[1]);
						$("#province").val(str[2]);
						hideerror('subdistrict');
						hideerror('district');
						hideerror('province');
					break;
					case 2:
						$("#district").val(str[0]);
						$("#province").val(str[1]);
						hideerror('district');
						hideerror('province');
					break;
					case 1:
						$("#province").val(str[0]);
						hideerror('province');
					break;
				}
				//updateform('address2');
				hideerror('province');
			break;
			case 'province2': //suggestion from clicking
				$("#province").val(value);
				//updateform('address2');
				hideerror('province');
			break;
			default:
				$("#"+searchtype).val(value);
				hideerror(searchtype);
		}
	}
	function splitlocationstring(value){
		var c = value.charCodeAt(0);
		if((c >= 65 && c <= 90)||(c >= 97 && c <= 122)){	// English
			var str = value.split(', ');
			return str;
		}
		else{	// Assumed Thai
			var str = value.split(' ');
			if(str[str.length-1].substring(0,7) !== "กรุงเทพ" && str[str.length-2].substring(0,7) !== "กรุงเทพ"){
				var j = 0;
				var str2 = [];
				for(var i=0;i<str.length;i++){	//check for ต. อ. จ. and cut it
					if(str[i].charAt(1) === '.'){
						str2[i] = str[i].substring(2);
					}
					else str2[i] = str[i];
				}
				return str2;
			}
			else {
				var j = 0;
				var str2 = [];
				for(var i=0;i<str.length;i++){	//check for เขต แขวง and cut it
					if(str[i].substring(0,3) === 'เขต'){
						str2[i] = str[i].substring(3);
					}
					else if(str[i].substring(0,4) === 'แขวง'){
						str2[i] = str[i].substring(4);
					}
					else str2[i] = str[i];
				}
				return str2;
			}
		}
	}
	function showdetailedform(num){
		$("#address"+num+"_expansion").show(300,function(){
			if(num == 2){
				$('#address2').jqDropdown('position');
			}
		});
	}
	function hidedetailedform(num){
		$("#address"+num+"_expansion").hide(300);
	}
	function getFormData(){
		var str;
		
		valid = true; //will be false when enter showerror() in validate()
		str = "Invalid form data";
			
		for(var key in required){
			if(required[key]){	//needs validation
				validate(key);
			}
		}
		if(valid && !$("#postal_code").hasClass("error-input")){
			var unindexed_array = $("#addressform").serializeArray();
			formData = {};
		    $.map(unindexed_array, function(n, i){
		        formData[n['name']] = n['value'];
		    });
		    // get geocode
		    if($("#subdistrict").prop('tagName') === "SELECT"){
		    	if(!$("#subdistrict option:selected").is(':disabled'))
		    		formData['geocode'] = $("#subdistrict option:selected").attr('geocode');
		    	else if(!$("#district option:selected").is(':disabled'))
		    		formData['geocode'] = $("#district option:selected").attr('geocode');
		    	else if(!$("#province option:selected").is(':disabled'))
		    		formData['geocode'] = $("#province option:selected").attr('geocode');
		    }
		    str = JSON.stringify(formData);
		    if(debugDiv !== ''){
		    	// console.log(formData);
		    	var str2 = JSON.stringify(formData,null,"<br>");
				$("#"+debugDiv).html("JSON Output:<br>"+str2);
		    }
		}
		else{
			if(debugDiv !== ''){
				$("#"+debugDiv).html(str);
				// $("#"+debugDiv).show();
		  }
		}
	    return (str == "Invalid form data" ? str : JSON.parse(str));	
	}
	function validateAddress1(){	//special condition
		var house_number = $("#house_number").val();
		var street = $("#street").val();
		var moo = $("#moo").val();
		var parent = $("#parent").val();
		var pass = false;
		if(house_number !== "" && street !== "") pass = true;
		else if(house_number !== "" && moo !== "") pass = true;
		else if(parent !== "") pass = true;
		return pass;
	}
	function validate(addresstype){
		if(!required[addresstype]) return;
		switch(addresstype){
			case 'postal_code':
				if($('#addressform #country').val() == "TH" && $("#postal_code").val().length !== 5){
					showerror("postal_code",lang.postal_code_not_5);
				}
				else if($("#postal_code").val() === ""){
					showerror("postal_code",lang.postal_code_empty);
				}
				else hideerror("postal_code");
			break;
			case 'address1':
			if(!validateAddress1())
				showerror("address1",lang.address1_info);
				else hideerror("address1");
			break;
			case 'house_number':
			if($("#house_number").val() === "")
					showerror("house_number",lang.house_number_empty);
				else hideerror("house_number");
			break;
			case 'building':
			if($("#building").val() === "")
					showerror("building",lang.building_empty);
				else hideerror("building");
			break;
			case 'floor':
			if($("#floor").val() === "")
					showerror("floor",lang.floor_empty);
				else hideerror("floor");
			break;
			case 'parent':
			if($("#parent").val() === "")
					showerror("parent",lang.parent_empty);
				else hideerror("parent");
			break;
			case 'soi':
			if($("#soi").val() === "")
					showerror("soi",lang.soi_empty);
				else hideerror("soi");
			break;
			case 'moo':
			if($("#moo").val() === "")
					showerror("moo",lang.moo_empty);
				else hideerror("moo");
			break;
			case 'street':
			if($("#street").val() === "")
					showerror("street",lang.street_empty);
				else hideerror("street");
			break;
			case 'route':
			if($("#route").val() === "")
					showerror("route",lang.route_empty);
				else hideerror("route");
			break;
			case 'subdistrict':
				if(!$("#subdistrict").prop('disabled') && ($("#subdistrict").val() === "" || $("#subdistrict").val() === null))
					showerror("subdistrict",lang.subdistrict_empty);
				else hideerror("subdistrict");
			break;
			case 'district':
				if(!$("#district").prop('disabled') && ($("#district").val() === "" || $("#district").val() === null))
					showerror("district",lang.district_empty);
				else hideerror("district");
			break;
			case 'province':
				if(!$("#province").prop('disabled') && ($("#province").val() === "" || $("#province").val() === null))
					showerror("province",lang.province_empty);
				else hideerror("province");
			break;
			case 'country':
				if($("#country").val() === "")
					showerror("country",lang.country_empty);
				else hideerror("country");
			break;
			case 'etc':
				if($("#etc").val() === "")
					showerror("etc",lang.etc_empty);
				else hideerror("etc");
			break;
			case 'poi':
				if($("#poi").val() === "")
					showerror("poi",lang.etc_empty);
				else hideerror("poi");
			break;
		}
	}
	function showerror(type,message){
		valid = false;
		$("#"+type).addClass("error-input");
		if(keys["address1"].indexOf(type) !== -1) $("#address1_expansion").show(500);
		if(keys["address2"].indexOf(type) !== -1) $("#address2_expansion").show(500);
		$("#"+type+"_error").html(message);
		$("#"+type+"_error").show(500);
	}
	function hideerror(type){
		$("#"+type+"_error").hide();
		$("#"+type).removeClass("error-input");
	}
	function eliminateDuplicates(arr) {
	  var i,
	      len=arr.length,
	      out=[],
	      obj={};
	  for (i=0;i<len;i++) {
	    obj[arr[i]]=0;
	  }
	  for (i in obj) {
	    out.push(i);
	  }
	  return out;
	}
	function initDropDown(list){
		if(list !== '<ul class="jq-dropdown-menu"></ul>'){
			$("#jq-dropdown").html(list);
			// $("#jq-dropdown").show();
			$("#"+temp_searchtype).jqDropdown('show');
			$("#jq-dropdown").addClass("jq-dropdown-tip");
		}
		else{
			$("#jq-dropdown").hide();
			// $("#jq-dropdown").html('');
			// $("#jq-dropdown").removeClass("jq-dropdown-tip");
		}
	}
	function isModeSelect(){
		return (mode == AddressForm.SIMPLE_SELECT || mode == AddressForm.SIMPLE_SELECT_FULLFORM);
	}
	function numKeys(o){
		var i=0;
		for(p in o) if(Object.prototype.hasOwnProperty.call(o,p)){ i++};
		return i;
	}
}
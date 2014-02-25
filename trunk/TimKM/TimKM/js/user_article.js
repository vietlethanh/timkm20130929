/*
 * This file was automatically generated By Code Smith 
 * Modifications will be overwritten when code smith is run
 *
 * PLEASE DO NOT MAKE MODIFICATIONS TO THIS FILE
 * Date Created 5/6/2012
 *
 */



/// <summary>
/// Implementations of slarticles represent a Article
///
/// </summary>
var article = {		   
	//region PRESERVE ExtraMethods For Article
	//endregion
    //region Contants	
    ACT_ADD : 10,
    ACT_UPDATE : 11,
    ACT_DELETE : 12,
    ACT_CHANGE_PAGE : 13,
    ACT_SHOW_EDIT : 14,
    ACT_GET : 15,
    Page : "bg_article.php",
    
   
    //endregion   
    
    //region Public Functions
    
    getArticleInfo: function() {
        core.util.disableControl("btnOK", true);
        var isValid = true;
		var controlID = 'txtCompanyName';		
		var companyName = core.util.getObjectValueByID(controlID);
		 core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(companyName)){
			 core.util.validateInputTextBox(controlID,'Tên đơn vị không được rỗng', isValid);
			isValid =  false;
		}else if (companyName.length > 255) {
			 core.util.validateInputTextBox(controlID,'Tên đơn vị phải ngắn hơn 255 ký tự', isValid);
			isValid =  false;
		}
		
		controlID = 'txtCompanyAddress';		
		var companyAddress = core.util.getObjectValueByID(controlID);
		 core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(companyAddress)){
			 core.util.validateInputTextBox(controlID,'Địa chỉ không được rỗng', isValid);
			isValid =  false;
		}else if (companyAddress.length > 255) {
			 core.util.validateInputTextBox(controlID,'Địa chỉ phải ngắn hơn 255 ký tự', isValid);
			isValid =  false;
		}
		
		controlID = 'txtCompanyPhone';		
		var companyPhone = core.util.getObjectValueByID(controlID);
		 core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(companyPhone)){
			core.util.validateInputTextBox(controlID,'Số điện thoại không được rỗng', isValid);
			isValid =  false;
		}else if (!core.util.isPhoneNumber(companyPhone)) {
			core.util.validateInputTextBox(controlID,'Số điện thoại không hợp lệ', isValid);
			isValid =  false;
		}else if (companyPhone.length > 50) {
			core.util.validateInputTextBox(controlID,'Số điện thoại phải ngắn hơn 50 ký tự', isValid);
			isValid =  false;
		}
		
		controlID = 'cmArea';		
		var areas = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(areas)){
			 core.util.validateInputTextBox(controlID,'Bạn chưa chọn lĩnh vực', isValid);
			isValid =  false;
		}
		
		controlID = 'cmCategory';		
		var categories = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(categories)){
			 core.util.validateInputTextBox(controlID,'Bạn chưa chọn danh mục', isValid);
			isValid =  false;
		}
		
		controlID = 'txtAdTypeValue';		
		var adType = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(adType)){
			core.util.validateInputTextBox(controlID,'Loại khuyến mãi không được rỗng', isValid);
			isValid =  false;
		}
		
		controlID = 'txtStartDate';		
		var startDate = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		
		if (core.util.isNull(startDate)) {
            core.util.validateInputTextBox(controlID, 'Ngày bắt đầu không được rỗng', isValid);
            isValid = false;
        } else if (core.util.validateDateTime(startDate) == false) {
			 core.util.validateInputTextBox(controlID, 'Ngày bắt đầu không hợp lệ', isValid);
			 isValid = false;
        }		
		
		controlID = 'txtEndDate';		
		var endDate = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		
		if (core.util.isNull(endDate)) {
            core.util.validateInputTextBox(controlID, 'Ngày kết thúc không được rỗng', isValid);
            isValid = false;
        } else if (core.util.validateDateTime(endDate) == false) {
			 core.util.validateInputTextBox(controlID, 'Ngày kết thúc không hợp lệ', isValid);
			 isValid = false;
        }else if (new Date(core.util.formatDateTimeVN(startDate)) >= new Date(core.util.formatDateTimeVN(endDate)) ) {
			 core.util.validateInputTextBox(controlID, 'Ngày kết thúc phải sau ngày bắt đầu', isValid);
			 isValid = false;
        }	
		
		controlID = 'txtHappyFrom';				
		var happyFrom = core.util.getObjectValueByID(controlID);
		var happyTo = core.util.getObjectValueByID('txtHappyTo');
		core.util.validateInputTextBox(controlID,'');
		if (!core.util.isNull(happyFrom) && !core.util.isNull(happyTo) && !core.util.compareTime(happyFrom,happyTo)) {
             core.util.validateInputTextBox(controlID, 'Thời gian hết thúc Happy Hours phải sau thời gian bắt đầu Happy Hours', isValid);
            isValid = false;
        }	
		
		controlID = 'txtName';		
		var adName = core.util.getObjectValueByID(controlID);
		core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(adName)){
			core.util.validateInputTextBox(controlID,'Tên khuyến mãi không được rỗng', isValid);
			isValid =  false;
		}else if (adName.length > 255) {
			 core.util.validateInputTextBox(controlID,'Tên khuyến mãi phải ngắn hơn 255', isValid);
			isValid =  false;
		}
		var btnAdd = core.util.getObjectByClass('address-article .btn-add');
		btnAdd.click();
		controlID = 'txtAddressArticle';
		core.util.validateInputTextBox(controlID,'');
		
		var addresses='';
		var districts = '';
		var cities = '';
		if(core.util.getObjectByClass('location-district').length >=1 )
		{
			core.util.getObjectByClass('location-address').each(function(){
				var text = ($(this).text()+"").replace(';',',');
				addresses += text + ";";
			})
			
			core.util.getObjectByClass('location-district').each(function(){
				var text = ($(this).text()+"").replace(';',',');
				districts += text + ";";
			})
			
			core.util.getObjectByClass('location-city').each(function(){
				var text = ($(this).text()+"").replace(';',',');
				cities += text + ";";
			})
		}
		
		controlID = 'txtContent';		
		var content = CKEDITOR.instances[controlID].getData()
		core.util.validateInputTextBox(controlID,'');
		if(core.util.isNull(controlID)){
			core.util.validateInputTextBox(controlID,'Nội dung khuyến mãi không được rỗng', isValid);
			isValid =  false;
		}

		if(!core.util.isChecked("chkTerm")){		 
            core.util.validateInputTextBox('chkTerm', 'Bạn cần phải đồng ý điều khoản sử dụng', isValid);
            isValid = false;
        }
		
        if (isValid == false) {
			core.util.disableControl("btnOK", false);
            return;
        }
		var articleInfo = 
		{
			 Title: adName,
			 Content: content,
			 Tags:core.util.getObjectValueByID('txtTags'),
			 CatalogueID:categories,
			 SectionID: areas,			 
			 CompanyName:companyName,
			 CompanyAddress:companyAddress,
			 CompanyWebsite:core.util.getObjectValueByID('txtCompanySite'),
			 CompanyPhone:companyPhone,
			 AdType:adType,
			 StartDate: startDate,
			 EndDate: endDate,
			 HappyDays:core.util.getObjectValueByID('cmHappyDays'),
			 StartHappyHour: happyFrom,
			 EndHappyHour: happyTo,
			 Addresses:addresses,
			 Dictricts:districts,
			 Cities: cities,
			 FileName: core.util.getObjectValueByID('txtImage'),
			 ArticleID: core.util.getObjectValueByID('ArticleID'),
			 Mode: core.util.getObjectValueByID('adddocmode')
		};
		return articleInfo;
    },
	
	postArticle: function() {  
		var articleInfo = this.getArticleInfo();
		
		if(core.util.isNull(articleInfo))
		{
			return false;
		}
		if(articleInfo.Mode=='1' || articleInfo.Mode==1)
		{
			articleInfo.act = this.ACT_UPDATE;
		}
		else
		{
			articleInfo.act = this.ACT_ADD;
		}
		//return false;;
		
        core.request.post(this.Page,articleInfo,
            function(respone, info){
				var strRespond = core.util.parserXML(respone);
				if (parseInt(strRespond[1]['rs']) == 1) {
					core.ui.showInfoBar(1, strRespond[1]["inf"]);	
					//core.util.goTo("PostSucess.php");
					article.clearForm();
					core.util.disableControl("btnOK", false);
					if(articleInfo.Mode=='1' || articleInfo.Mode==1)
					{
						core.util.redirect('profile_article.php')
					}
                }
                else{
                    core.ui.showInfoBar(2, strRespond[1]["inf"]);	
					core.util.disableControl("btnOK", false);
                }
            },
            function()
            {
				core.ui.showInfoBar(2, core.constant.MsgProcessError);	
				core.util.disableControl("btnOK", false);
            }
        );
    },
	
	clearForm: function()
	{
		var controlID = 'txtCompanyName';		
		core.util.clearValue(controlID);
		
		
		controlID = 'txtCompanyAddress';		
		core.util.clearValue(controlID);
		
		controlID = 'txtCompanySite';		
		core.util.clearValue(controlID);
		
		
		controlID = 'txtCompanyPhone';		
		core.util.clearValue(controlID);
		
		
		controlID = 'cmArea';	
		core.util.deSelectOption(controlID);
		
		
		controlID = 'cmCategory';	
		core.util.deSelectOption(controlID);		
		
		controlID = 'txtAdTypeValue';	
		core.util.clearValue(controlID);
		
		controlID = 'txtStartDate';	
		core.util.clearValue(controlID);		
					
		controlID = 'txtEndDate';		
		core.util.clearValue(controlID);			
		
		controlID = 'txtHappyFrom';		
		core.util.clearValue(controlID);			
		
		controlID = 'txtName';		
		core.util.clearValue(controlID);	
		
		controlID = 'txtImage';		
		core.util.clearValue(controlID);		
		
		controlID = 'cmHappyDays';	
		core.util.deSelectOption(controlID);		
		
		controlID = 'txtHappyFrom';		
		core.util.clearValue(controlID);			
		
		controlID = 'txtHappyTo';		
		core.util.clearValue(controlID);
		
		controlID = 'txtAddressArticle';		
		core.util.clearValue(controlID);		
		controlID = 'optCity';		
		core.util.deSelectOption(controlID);
		controlID = 'optDistrict';		
		core.util.deSelectOption(controlID);
		$('.row-item').remove();
					
		controlID = 'txtContent';		
		var content = CKEDITOR.instances[controlID].setData('');
		
		controlID = 'txtTags';		
		core.util.clearValue(controlID);		
	},
	
	addLocation: function(obj) {
		var root = $('div.address-article');
		var parent = $(obj).parent();
		var	address = core.util.getObjectValueByID('txtAddressArticle');
		address = core.util.removeAll(address,"'");
		address = core.util.removeAll(address,"\"");
		var	city =  core.util.getObjectValueByID('optCity');
		city = core.util.removeAll(city,"'");
		city = core.util.removeAll(city,"\"");
		var	district = core.util.getObjectValueByID('optDistrict');
		district = core.util.removeAll(district,"'");
		district = core.util.removeAll(district,"\"");
		core.util.validateInputTextBox('txtAddressArticle','');
		if (address == '') {
			core.util.validateInputTextBox('txtAddressArticle','Bạn chưa nhập địa chỉ');
			return;
		}
		var classNoborder ='';
		if(core.util.getObjectByClass('location-district').length <1)
		{
			classNoborder ='no-border';
		}
		var newRow = $('<div class="controls row-item '+classNoborder+'">'+
						'<label class="m-wrap inline span6 lbl-address">'+
							'<span class="location-address"> ' + address + '</span>, ' +
							'<span class="location-district">' + district + '</span>, ' +
							'<span class="location-city">' + city + '</span>' +
						' </label>' +
						'<a href="javascript:void(0);" class="btn btn-mini " onclick="article.clickEDIT(this);"><i class="icon-pencil"></i> Sửa</a> ' +
						'<a href="javascript:void(0);" class="btn btn-mini " onclick="article.clickDELETE(this);"><i class="icon-remove"></i> Xóa</a>'+
						'<a href="javascript:void(0);" class="btn btn-mini " onclick="article.showMap(this);"><i class="icon-eye-open"></i> Xem Trước</a>'+
					'</div>'	
		);
		root.append(newRow);
		core.util.focusControl('txtAddressArticle');
		this.clearInputLocation();
	},
	showMap: function(obj)
	{		
		/*
		$modal.on('click', '.update', function(){
		  $modal.modal('loading');
		  setTimeout(function(){
		    $modal
		      .modal('loading')
		      .find('.modal-body')
		        .prepend('<div class="alert alert-info fade in">' +
		          'Updated!<button type="button" class="close" data-dismiss="alert"></button>' +
		        '</div>');
		  }, 1000);
		}); 
		*/
		
		var parent = $(obj).parent();
		var address =  $.trim(parent.find('.location-address').html());
		var city =  $.trim(parent.find('.location-city').html());
		var district =  $.trim(parent.find('.location-district').html());
		var location = address + ', ' + district + ', ' + city;
		
		$('#popup-location').modal();
		$('#popup-location').on('shown', function () {
			var map = new GMaps({
				el: '#map',
				lat: core.constant.LatDefault,
				lng: core.constant.LongDefault
			});
			GMaps.geocode({
			  address: location,
			  callback: function(results, status){
				if(status=='OK'){
					var latlng = results[0].geometry.location;
					google.maps.event.trigger(map, "resize");
					map.setCenter(latlng.lat(), latlng.lng());
					map.addMarker({
						lat: latlng.lat(),
						lng: latlng.lng()
					});
					
				}
			  }
			});
			/*GMaps.geocode({
			  address: "1 Bui Thi Xuan, Quan 1, HCM",
			  callback: function(results, status){
				if(status=='OK'){
					var latlng = results[0].geometry.location;
					google.maps.event.trigger(map, "resize");
					map.setCenter(latlng.lat(), latlng.lng());
					map.addMarker({
						lat: latlng.lat(),
						lng: latlng.lng()
					});
					
				}
			  }
			});
			*/			
		})
		
	},
	clickDELETE: function (obj) {
		var parent = $(obj).parent();
		var address =  $.trim(parent.find('.location-address').html());
		var city =  $.trim(parent.find('.location-city').html());
		var district =  $.trim(parent.find('.location-district').html());
		var location = address + ', ' + district+ ', ' + city;
		$('<div></div>').appendTo('body')
		  .html('<div><span class="icon icon-warning-sign"></span><h6>Bạn đang xóa địa điểm '+ location +'?</h6></div>')
		  .dialog({
			  modal: true,
			  title: 'Thông báo', 
			  zIndex: 10000, 
			  autoOpen: true,
			  width: 'auto', 
			  resizable: false,
			  dialogClass: 'ui-dialog-yellow',
			  /*buttons: {
				  Yes: function () {
						
					  $(this).dialog("close");
				  },
				  No: function () {
					  $(this).dialog("close");
				  }
			  },
			  */
			  buttons: [
				{
					'class' : 'btn red',	
					"text" : "Xóa",
					click: function() {
						if($(obj).parent().hasClass('no-border') && !core.util.isNull($(obj).parent().next('.row-item')))
						{
							$(obj).parent().next('.row-item').addClass('no-border');
						}
						$(obj).parent().remove();
						$(this).dialog( "close" );
					}
				},
				{
					'class' : 'btn btn-gray',
					"text" : "Không",
					click: function() {
						$(this).dialog( "close" );
					}
				}
			  ],
			  open: function(event, ui) { 
					//hide close button.
					$(this).parent().children().children('.ui-dialog-titlebar-close').hide();
				},
			  close: function (event, ui) {
				  $(this).remove();
			  }
		});		
		
	},
	
	clearInputLocation: function()
	{
		core.util.clearValue('txtAddressArticle');
		core.util.deSelectOption('optCity');
		core.util.deSelectOption('optDistrict');
		core.util.hideOptions('optDistrict');		
	},
	
	showEditMode: function(isEdit)
	{
		var root = $('div.address-article');
		if(isEdit)
		{
			root.find('.btn-add').removeClass("display").addClass("no-display");
			root.find('.btn-update').removeClass("no-display").addClass("display");
			root.find('.btn-cancel').removeClass("no-display").addClass("display");
		}else
		{
			root.find('.btn-add').removeClass("no-display").addClass("display");
			root.find('.btn-update').removeClass("display").addClass("no-display");
			root.find('.btn-cancel').removeClass("display").addClass("no-display");
		}
	},
	
	cancelLocation: function (obj) {
		this.clearInputLocation();
		this.showEditMode(false);
		var parent = $(obj).parent();
		var root = $('div.address-article');
		root.find('.row-item').removeClass('updating');
	},
	clickEDIT: function (obj) {
		
		var root = $('div.address-article');
		var parent = $(obj).parent();
		root.find('.row-item').removeClass('updating');
		parent.addClass("updating");
		var address =  $.trim(parent.find('.location-address').html());
		var city =  $.trim(parent.find('.location-city').html());
		var district =  $.trim(parent.find('.location-district').html());
		
		core.util.getObjectByID('txtAddressArticle').val(address);
		optCity = core.util.getObjectByID('optCity').find('option');
		$("#optCity option[value='"+city+"']").attr("selected", "selected");
		$("#optCity").trigger("liszt:updated");
		$("#optCity").change();
		core.util.getObjectByID('optDistrict').val(district);		
		$("#optDistrict").trigger("liszt:updated");
		
		this.showEditMode(true);
	},

	updateLocation: function (obj) {
		var root = $('div.address-article');
		var parent = $(obj).parent();
		var	address = core.util.getObjectValueByID('txtAddressArticle');
		var	city =  core.util.getObjectValueByID('optCity');
		var	district = core.util.getObjectValueByID('optDistrict');
		core.util.validateInputTextBox('txtAddressArticle','');
		if (address == '') {
			core.util.validateInputTextBox('txtAddressArticle','Bạn chưa nhập địa chỉ');
			return;
		}
		
		var rowUpdate = root.find('.row-item.updating');
		rowUpdate.find('.location-address').html(address);
		rowUpdate.find('.location-district').html(district);
		rowUpdate.find('.location-city').html(city);
		
		this.clearInputLocation();		
		this.showEditMode(false);
		root.find('.row-item').removeClass('updating');
	},
	loadMap: function(addresses,districts, cities)
	{		
		var addresses = addresses.split(';');
		var districts = districts.split(';');
		var cities = cities.split(';');
		var map = new GMaps({
				el: '#map-article',
				lat: core.constant.LatDefault,
				lng: core.constant.LongDefault
			});
		for(i=0;i<addresses.length;i++)
		{
			if(addresses[i] != 'undefined' && addresses[i] != '')
			{
				var location = addresses[i] + ', ' + districts[i] + ', ' + cities[i];	
				
				GMaps.geocode({
				  address: location,
				  callback: function(results, status){
					if(status=='OK'){
						var latlng = results[0].geometry.location;
						google.maps.event.trigger(map, "resize");
						map.setCenter(latlng.lat(), latlng.lng());
						map.addMarker({
							lat: latlng.lat(),
							lng: latlng.lng()
						});
						
					}
				  }
				});
			}
		}
	},
	bindDistrict: function(obj)
	{
		me = this;
		var selectedCity = $(obj).find("option:selected");
		var cityID = selectedCity.attr("CityID");
		optDistrict = core.util.getObjectByID('optDistrict');
		optDistrict.val('');
		var districts = optDistrict.find("option");
		districts.each(function(index){
			if($(this).attr("CityID") == cityID)
			{
				$(this).show();
			}
			else
			{
				$(this).hide();
			}
		});
		/*var currentParent = core.util.getObjectValueByID('cmArea');
		$("#cmCategory").empty();
		for (var item in categories) {
			if( categories[item].ParentID == currentParent)
			{				
				key = categories[item].ArticleTypeID;
				val =  categories[item].ArticleTypeName;			
				$("#cmCategory").append("<option value=\"" + key + "\">" + val + "</option>");
			}
		}
		*/
		optDistrict.trigger("liszt:updated");
	},
    /*
    this.edit = edit;
    function edit() {

		var articleID = core.util.getObjectValueByID("txtArticleID");
		var prefix = core.util.getObjectValueByID("txtPrefix");
		var title = core.util.getObjectValueByID("txtTitle");
		var fileName = core.util.getObjectValueByID("txtFileName");
		var articleType = core.util.getObjectValueByID("txtArticleType");
		var content = core.util.getObjectValueByID("txtContent");
		var notificationType = core.util.getObjectValueByID("txtNotificationType");
		var tags = core.util.getObjectValueByID("txtTags");
		var catalogueID = core.util.getObjectValueByID("txtCatalogueID");
		var sectionID = core.util.getObjectValueByID("txtSectionID");
		var numView = core.util.getObjectValueByID("txtNumView");
		var numComment = core.util.getObjectValueByID("txtNumComment");
		var status = core.util.getObjectValueByID("txtStatus");
		var comments = core.util.getObjectValueByID("txtcomments");
		var renewedDate = core.util.getObjectValueByID("txtRenewedDate");
		var renewedNum = core.util.getObjectValueByID("txtRenewedNum");
	                
        strRequest = "?isAJ=1&act=" + ACT_UPDATE +  
            '&ArticleID='+ core.urlencode(articleID)+
			'&Prefix='+ core.urlencode(prefix)+
			'&Title='+ core.urlencode(title)+
			'&FileName='+ core.urlencode(fileName)+
			'&ArticleType='+ core.urlencode(articleType)+
			'&Content='+ core.urlencode(content)+
			'&NotificationType='+ core.urlencode(notificationType)+
			'&Tags='+ core.urlencode(tags)+
			'&CatalogueID='+ core.urlencode(catalogueID)+
			'&SectionID='+ core.urlencode(sectionID)+
			'&NumView='+ core.urlencode(numView)+
			'&NumComment='+ core.urlencode(numComment)+
			'&Status='+ core.urlencode(status)+
			'&comments='+ core.urlencode(comments)+
			'&RenewedDate='+ core.urlencode(renewedDate)+
			'&RenewedNum='+ core.urlencode(renewedNum)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, edit_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function edit_OnCallBack(xmlHTTPRequest) {
        core.util.disableControl("btnOK", false);
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    // ph?i kh?i t?o l?i d? tr?nh d?ng popdiv addFavourite
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', strRespond[1]["inf"]);
                    showAddMode();
                    changePage(_strPage, ACT_CHANGE_PAGE, core.getObject("txtPage");
                }
                else {
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    top.popDiv.childPop.alert(strRespond[1]["inf"], SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.insertNew = insertNew;
    function insertNew() {

		var articleID = core.util.getObjectValueByID("txtArticleID");
		var prefix = core.util.getObjectValueByID("txtPrefix");
		var title = core.util.getObjectValueByID("txtTitle");
		var fileName = core.util.getObjectValueByID("txtFileName");
		var articleType = core.util.getObjectValueByID("txtArticleType");
		var content = core.util.getObjectValueByID("txtContent");
		var notificationType = core.util.getObjectValueByID("txtNotificationType");
		var tags = core.util.getObjectValueByID("txtTags");
		var catalogueID = core.util.getObjectValueByID("txtCatalogueID");
		var sectionID = core.util.getObjectValueByID("txtSectionID");
		var numView = core.util.getObjectValueByID("txtNumView");
		var numComment = core.util.getObjectValueByID("txtNumComment");
		var status = core.util.getObjectValueByID("txtStatus");
		var comments = core.util.getObjectValueByID("txtcomments");
		var renewedDate = core.util.getObjectValueByID("txtRenewedDate");
		var renewedNum = core.util.getObjectValueByID("txtRenewedNum");
	        
        strRequest = "?isAJ=1&act=" + ACT_ADD +  
            '&ArticleID='+ core.urlencode(articleID)+
			'&Prefix='+ core.urlencode(prefix)+
			'&Title='+ core.urlencode(title)+
			'&FileName='+ core.urlencode(fileName)+
			'&ArticleType='+ core.urlencode(articleType)+
			'&Content='+ core.urlencode(content)+
			'&NotificationType='+ core.urlencode(notificationType)+
			'&Tags='+ core.urlencode(tags)+
			'&CatalogueID='+ core.urlencode(catalogueID)+
			'&SectionID='+ core.urlencode(sectionID)+
			'&NumView='+ core.urlencode(numView)+
			'&NumComment='+ core.urlencode(numComment)+
			'&Status='+ core.urlencode(status)+
			'&comments='+ core.urlencode(comments)+
			'&RenewedDate='+ core.urlencode(renewedDate)+
			'&RenewedNum='+ core.urlencode(renewedNum)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, insertNew_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function insertNew_OnCallBack(xmlHTTPRequest) {
        core.util.disableControl("btnOK", false);
        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    // ph?i kh?i t?o l?i d? tr?nh d?ng popdiv addFavourite
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', strRespond[1]["inf"]);
                    showAddMode();
                    changePage(_strPage, ACT_CHANGE_PAGE, 1);
                }
                else {
                    //var popDiv = new PopDiv();
                    //popDiv.init();
                    top.popDiv.childPop.alert(strRespond[1]["inf"], SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    var _cacheURL_pdoc;
    this.deleteObj = deleteObj;
    function deleteObj(id, name) {
        //curRow = currentRowId;
        popDiv.alert('Do you want to delete ' + name + ' ?', SYSTEM_TITLE_ERROR, 2, "_objArticle.delete_OK()", "_objArticle.delete_Cancel()");

        var keyword = '';
        if (typeof core.getObject("txtGet") != 'undefined') {
            keyword = core.getObject("txtGet").val();
        }
      
        _cacheURL_pdoc = _strPage + "?isAJ=1&act=" + ACT_DELETE + "&id=" + docid + "&p=" + core.getObject("txtPage")[0].value + "&kw=" + keyword;
    }
    this.delete_Cancel = delete_Cancel;
    function delete_Cancel() {
        //core.getObject("adddocmode")[0].value = ADD_MODE;
    }
    this.delete_OK = delete_OK;
    function delete_OK() {
        // Prepare AJAX to remove selected doc from favorite list
        var ajax = new Ajax(METHOD_GET);
        ajax.SendRequestToServerWithCustomMsg(_cacheURL_pdoc, null, delete_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }
    function delete_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);

                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    parent.window.showInfoBar('success', strRespond[1]["inf"]);
                    core.getObject("txtPage")[0].value = strRespond[1]["p"];
                    popDiv.hide();
                    core.getObject("list-content")[0].innerHTML = strRespond[1]['list'];
                }
                else //if(parseInt(strRespond[3]) == -1)
                {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.showEdit = showEdit;
    function showEdit(strID) {
        showAddMode();
        strRequest = "?isAJ=1&act=" + ACT_SHOW_EDIT + "&id=" + strID; ;
        var ajax = new Ajax(METHOD_GET);
        ajax.SendRequestToServerWithCustomMsg(_strPage + strRequest, null, showEdit_OnCallBack, true, MSG_AJAX_FETCHING_VN);

    }
    function showEdit_OnCallBack(xmlHTTPRequest) {

        if (xmlHTTPRequest.readyState == 4) {
            if (xmlHTTPRequest.status == 200) {
                var strRespond = core.parserXML(xmlHTTPRequest.responseText);
                if (!core.headerProcessingArr(strRespond[0], Array(true, true, false))) {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                    return;
                }
                if (parseInt(strRespond[1]['rs']) == 1) {
                    showInfoBar('success', MSG_RES_OPERATION_SUCCESS);
                    //alert(strRespond[1]['sens']);
                    // Add Doc && clear field
					core.getObject('txtArticleID').val(ArticleID);
					core.getObject('txtPrefix').val(Prefix);
					core.getObject('txtTitle').val(Title);
					core.getObject('txtFileName').val(FileName);
					core.getObject('txtArticleType').val(ArticleType);
					core.getObject('txtContent').val(Content);
					core.getObject('txtNotificationType').val(NotificationType);
					core.getObject('txtTags').val(Tags);
					core.getObject('txtCatalogueID').val(CatalogueID);
					core.getObject('txtSectionID').val(SectionID);
					core.getObject('txtNumView').val(NumView);
					core.getObject('txtNumComment').val(NumComment);
					core.getObject('txtStatus').val(Status);
					core.getObject('txtcomments').val(comments);
					core.getObject('txtRenewedDate').val(RenewedDate);
					core.getObject('txtRenewedNum').val(RenewedNum);
                    core.getObject("adddocmode")[0].value = EDIT_MODE;
                    core.getObject("status-add")[0].innerHTML = 'Edit mode';
                }
                else  // Duplicate
                {
                    popDiv.alert(MSG_RES_OPERATION_FAIL, SYSTEM_TITLE_ERROR, 1);
                }
            }
        }
    }
    
    this.showAddMode = showAddMode;
    function showAddMode() {
        core.getObject("adddocmode")[0].value = ADD_MODE;
        core.getObject("status-add")[0].innerHTML = 'Add mode';
		core.getObject('txtArticleID').val('');
		core.getObject('txtPrefix').val('');
		core.getObject('txtTitle').val('');
		core.getObject('txtFileName').val('');
		core.getObject('txtArticleType').val('');
		core.getObject('txtContent').val('');
		core.getObject('txtNotificationType').val('');
		core.getObject('txtTags').val('');
		core.getObject('txtCatalogueID').val('');
		core.getObject('txtSectionID').val('');
		core.getObject('txtNumView').val('');
		core.getObject('txtNumComment').val('');
		core.getObject('txtStatus').val('');
		core.getObject('txtcomments').val('');
		core.getObject('txtRenewedDate').val('');
		core.getObject('txtRenewedNum').val('');
    }
    //endregion   
	*/
}

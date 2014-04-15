//endregion   
    
    //region Public Functions
    
    this.btnSave_OnClick = btnSave_OnClick;
    function btnSave_OnClick() {
        core.disableControl("btnOK", true);
        var isValid = true;

		var advertisingID = core.trim(core.getObject("txtAdvertisingID").val());
		core.ValidateInputTextBox('txtAdvertisingID','');
		if(advertisingID == ''){
			core.ValidateInputTextBox('txtAdvertisingID','AdvertisingID is required', isValid);
			isValid =  false;
		}else if (advertisingID.length > 20) {
			core.ValidateInputTextBox('txtAdvertisingID','AdvertisingID must be less than 20', isValid);
			isValid =  false;
		}

		var advertisingName = core.trim(core.getObject("txtAdvertisingName").val());
		core.ValidateInputTextBox('txtAdvertisingName','');
		if(advertisingName == ''){
			core.ValidateInputTextBox('txtAdvertisingName','AdvertisingName is required', isValid);
			isValid =  false;
		}else if (advertisingName.length > 50) {
			core.ValidateInputTextBox('txtAdvertisingName','AdvertisingName must be less than 50', isValid);
			isValid =  false;
		}

		var partnerID = core.trim(core.getObject("txtPartnerID").val());
		core.ValidateInputTextBox('txtPartnerID','');
		if(partnerID == ''){
			core.ValidateInputTextBox('txtPartnerID','PartnerID is required', isValid);
			isValid =  false;
		}else if (partnerID.length > 20) {
			core.ValidateInputTextBox('txtPartnerID','PartnerID must be less than 20', isValid);
			isValid =  false;
		}

		var startDate = core.trim(core.getObject("txtStartDate").val());
		core.ValidateInputTextBox('txtStartDate','');
		if(startDate == ''){
			core.ValidateInputTextBox('txtStartDate','StartDate is required', isValid);
			isValid =  false;
		}else if (core.ValidateDateTime(startDate) == false) {
			core.getObject('txtStartDate')[0].focus();
			strError += '<p>StartDate is invalid!</p>';
		}

		var endDate = core.trim(core.getObject("txtEndDate").val());
		core.ValidateInputTextBox('txtEndDate','');
		if(endDate == ''){
			core.ValidateInputTextBox('txtEndDate','EndDate is required', isValid);
			isValid =  false;
		}else if (core.ValidateDateTime(endDate) == false) {
			core.getObject('txtEndDate')[0].focus();
			strError += '<p>EndDate is invalid!</p>';
		}

		var adTypeID = core.trim(core.getObject("txtAdTypeID").val());
		core.ValidateInputTextBox('txtAdTypeID','');
		if(adTypeID == ''){
			core.ValidateInputTextBox('txtAdTypeID','AdTypeID is required', isValid);
			isValid =  false;
		}else if (adTypeID.length > 20) {
			core.ValidateInputTextBox('txtAdTypeID','AdTypeID must be less than 20', isValid);
			isValid =  false;
		}

		var imageLink = core.trim(core.getObject("txtImageLink").val());
		core.ValidateInputTextBox('txtImageLink','');
		if(imageLink == ''){
			core.ValidateInputTextBox('txtImageLink','ImageLink is required', isValid);
			isValid =  false;
		}else if (imageLink.length > 255) {
			core.ValidateInputTextBox('txtImageLink','ImageLink must be less than 255', isValid);
			isValid =  false;
		}

		var status = core.trim(core.getObject("txtStatus").val());
		core.ValidateInputTextBox('txtStatus','');
		if(status == ''){
			core.ValidateInputTextBox('txtStatus','Status is required', isValid);
			isValid =  false;
		}else if (status.length > 20) {
			core.ValidateInputTextBox('txtStatus','Status must be less than 20', isValid);
			isValid =  false;
		}

	       
        if (isValid == false) {
         core.disableControl("btnOK", false);
            return;
        }
         
        if (core.getObject("adddocmode")[0].value == ADD_MODE) {
            insertNew();
        }
        else {
            edit();
        }
    }
    
    this.edit = edit;
    function edit() {

		var advertisingID = core.trim(core.getObject("txtAdvertisingID").val());
		var advertisingName = core.trim(core.getObject("txtAdvertisingName").val());
		var partnerID = core.trim(core.getObject("txtPartnerID").val());
		var startDate = core.trim(core.getObject("txtStartDate").val());
		var endDate = core.trim(core.getObject("txtEndDate").val());
		var adTypeID = core.trim(core.getObject("txtAdTypeID").val());
		var imageLink = core.trim(core.getObject("txtImageLink").val());
		var status = core.trim(core.getObject("txtStatus").val());
	                
        strRequest = "?isAJ=1&act=" + ACT_UPDATE +  
            '&AdvertisingID='+ core.urlencode(advertisingID)+
			'&AdvertisingName='+ core.urlencode(advertisingName)+
			'&PartnerID='+ core.urlencode(partnerID)+
			'&StartDate='+ core.urlencode(startDate)+
			'&EndDate='+ core.urlencode(endDate)+
			'&AdTypeID='+ core.urlencode(adTypeID)+
			'&ImageLink='+ core.urlencode(imageLink)+
			'&Status='+ core.urlencode(status)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, edit_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function edit_OnCallBack(xmlHTTPRequest) {
        core.disableControl("btnOK", false);
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
                    changePage(_strPage, ACT_CHANGE_PAGE, core.getObject("txtPage").val());
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

		var advertisingID = core.trim(core.getObject("txtAdvertisingID").val());
		var advertisingName = core.trim(core.getObject("txtAdvertisingName").val());
		var partnerID = core.trim(core.getObject("txtPartnerID").val());
		var startDate = core.trim(core.getObject("txtStartDate").val());
		var endDate = core.trim(core.getObject("txtEndDate").val());
		var adTypeID = core.trim(core.getObject("txtAdTypeID").val());
		var imageLink = core.trim(core.getObject("txtImageLink").val());
		var status = core.trim(core.getObject("txtStatus").val());
	        
        strRequest = "?isAJ=1&act=" + ACT_ADD +  
            '&AdvertisingID='+ core.urlencode(advertisingID)+
			'&AdvertisingName='+ core.urlencode(advertisingName)+
			'&PartnerID='+ core.urlencode(partnerID)+
			'&StartDate='+ core.urlencode(startDate)+
			'&EndDate='+ core.urlencode(endDate)+
			'&AdTypeID='+ core.urlencode(adTypeID)+
			'&ImageLink='+ core.urlencode(imageLink)+
			'&Status='+ core.urlencode(status)		;
        
        var ajax = new Ajax();
        ajax.SendRequestToServerWithCustomMsg(_strPage, strRequest, insertNew_OnCallBack, true, MSG_AJAX_FETCHING_VN);
    }

    function insertNew_OnCallBack(xmlHTTPRequest) {
        core.disableControl("btnOK", false);
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
        popDiv.alert('Do you want to delete ' + name + ' ?', SYSTEM_TITLE_ERROR, 2, "_objAdvertising.delete_OK()", "_objAdvertising.delete_Cancel()");

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
					core.getObject('txtAdvertisingID').val(AdvertisingID);
					core.getObject('txtAdvertisingName').val(AdvertisingName);
					core.getObject('txtPartnerID').val(PartnerID);
					core.getObject('txtStartDate').val(StartDate);
					core.getObject('txtEndDate').val(EndDate);
					core.getObject('txtAdTypeID').val(AdTypeID);
					core.getObject('txtImageLink').val(ImageLink);
					core.getObject('txtStatus').val(Status);
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
		core.getObject('txtAdvertisingID').val('');
		core.getObject('txtAdvertisingName').val('');
		core.getObject('txtPartnerID').val('');
		core.getObject('txtStartDate').val('');
		core.getObject('txtEndDate').val('');
		core.getObject('txtAdTypeID').val('');
		core.getObject('txtImageLink').val('');
		core.getObject('txtStatus').val('');
    }
    //endregion   
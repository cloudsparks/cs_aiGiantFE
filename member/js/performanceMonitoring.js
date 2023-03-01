// ============= Edit Profile =================
function sendToBackendRecord(timeDiffSeconds, event, params){
	var url = 'scripts/reqDefault.php';

	var formData = {
	                'command'       : 'recordPerformance',
	                'usedTime'		: timeDiffSeconds,
	                'eventSection'	: event,
		            };

    $.each( params, function(key, value){
    	formData[key] = value;
    });

	ajaxSend(url, formData, 'POST');
}

function startRecordTime(event){

	if(!event) {
		return false;
	}
	var currentTime = new Date().getTime();
	sessionStorage.removeItem(event);
	sessionStorage.setItem(event, currentTime);
}

function stopRecordTime(event, isSend = false, params){
	// console.log("stop record time");
	if(!event) {
		return false;
	}

	if(sessionStorage.getItem(event) != null) {
		var startTime = sessionStorage.getItem(event);
		var currentTime = new Date().getTime();

		var timeDiff = (currentTime - startTime) / 1000;
		var timeDiffSeconds = Math.abs(timeDiff);
		// console.log(timeDiffSeconds);
		if(isSend) sendToBackendRecord(timeDiffSeconds, event, params);
		sessionStorage.removeItem(event);
	}
	else{
		return false;
	}
}
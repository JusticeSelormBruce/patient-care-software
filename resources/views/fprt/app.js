var test = null;

var state = document.getElementById('content-capture');

var selectedDevice = ""; // Drop down selected value of reader
var disabled = true;
var startEnroll = false;
var setUpType = 'Enrollment'; //Enrollment or Verification

//var currentFormat = Fingerprint.SampleFormat.PngImage;
var currentFormat = Fingerprint.SampleFormat.Compressed;
var deviceTechn = {
    0: "Unknown",
    1: "Optical",
    2: "Capacitive",
    3: "Thermal",
    4: "Pressure"
}

var deviceModality = {
    0: "Unknown",
    1: "Swipe",
    2: "Area",
    3: "AreaMultifinger"
}

var deviceUidType = {
    0: "Persistent",
    1: "Volatile"
}

var FingerprintSdkTest = (function () {
    function FingerprintSdkTest() {
        var _instance = this;
        this.operationToRestart = null;
        this.acquisitionStarted = false;
        this.sdk = new Fingerprint.WebApi;
        this.sdk.onDeviceConnected = function (e) {
            // Detects if the deveice is connected for which acquisition started
            showMessage("Scan your finger");
        };
        this.sdk.onDeviceDisconnected = function (e) {
            // Detects if device gets disconnected - provides deviceUid of disconnected device
            showMessage("Device disconnected");
        };
        this.sdk.onCommunicationFailed = function (e) {
            // Detects if there is a failure in communicating with U.R.U web SDK
            showMessage("Communinication Failed")
        };
        this.sdk.onSamplesAcquired = function (s) {
            // Sample acquired event triggers this function
            sampleAcquired(s);
        };
        this.sdk.onQualityReported = function (e) {
            // Quality of sample aquired - Function triggered on every sample acquired
            document.getElementById("scanner_quality").innerHTML = Fingerprint.QualityCode[(e.quality)];
        }

    }

    FingerprintSdkTest.prototype.startCapture = function () {
        if (this.acquisitionStarted) // Monitoring if already started capturing
            return;
        var _instance = this;
        
        this.operationToRestart = this.startCapture;
        this.sdk.startAcquisition(currentFormat, selectedDevice).then(function () {
            _instance.acquisitionStarted = true;

        }, function (error) {
            showMessage(error.message);
        });
    };
    FingerprintSdkTest.prototype.stopCapture = function () {
        if (!this.acquisitionStarted) //Monitor if already stopped capturing
            return;
        var _instance = this;
       
        this.sdk.stopAcquisition().then(function () {
            _instance.acquisitionStarted = false;

            

        }, function (error) {
            showMessage(error.message);
        });
    };

    FingerprintSdkTest.prototype.getInfo = function () {
        var _instance = this;
        return this.sdk.enumerateDevices();
    };

    FingerprintSdkTest.prototype.getDeviceInfoWithID = function (uid) {
        var _instance = this;
        return  this.sdk.getDeviceInfo(uid);
    };


    return FingerprintSdkTest;
})();

function showMessage(message){
    var _instance = this;
    var statusWindow = document.getElementById("status");
    statusWindow.innerHTML = message;
    /*x = state.querySelectorAll("#status");
    if(x.length != 0){
        x[0].innerHTML = message;
    }*/
}

window.onload = function () {
    localStorage.clear();
    test = new FingerprintSdkTest();
    var allReaders = test.getInfo();
    allReaders.then(function (sucessObj) {
       
        if(sucessObj.length == 0){
            showMessage("No reader detected. Please insert a reader.");
        }else {
            //We pick the first one even if there are many
            selectedDevice = sucessObj[0];
            onDeviceInfo(selectedDevice);
            showMessage("Scanner available");
            if(setUpType=='Verification')
                startScan();
            
        }

    }, function (error){
        showMessage(error.message);
    });
    
       
};


function startScan() {
    document.getElementById('scanner_quality').innerHTML='';
    test.startCapture();
}

function onStop() {
    test.stopCapture();
}
function setUpForEnrollment() {
    setUpType = 'Enrollment';
    console.log('Ready for Enrollment');
}
function setUpForVerification(){
    setUpType = 'Verification';
    console.log('Ready for Verification');
    
}


function onDeviceInfo(id){
    var myDeviceVal = test.getDeviceInfoWithID(id);
    myDeviceVal.then(function (sucessObj) {
        var deviceId = sucessObj.DeviceID;
        var uidTyp = deviceUidType[sucessObj.eUidType];
        var modality = deviceModality[sucessObj.eDeviceModality];
        var deviceTech = deviceTechn[sucessObj.eDeviceTech];
        console.log(Fingerprint.DeviceTechnology[sucessObj.eDeviceTech]);
        console.log(Fingerprint.DeviceModality[sucessObj.eDeviceModality]);
        console.log(Fingerprint.DeviceUidType[sucessObj.eUidType]);
        var retutnVal = //"Device Info -"
            "Id : " +  deviceId
            +"<br> Uid Type : "+ uidTyp
            +"<br> Device Tech : " +  deviceTech
            +"<br> Device Modality : " +  modality;

        document.getElementById('deviceInfo').innerHTML = retutnVal;
        //console.log(retutnVal);
    }, function (error){
        showMessage(error.message);
        //console.log(error.message);
    });

}
function    onClear() {
    var dInfo = document.getElementById('deviceInfo"');
    dInfo.innerHTML = "";
    var status = document.getElementById('status');
    status.innerHTML = "";
    var vQualitybox = document.getElementById('scanner_quality');
    vQualitybox.innerHTML = "";
    localStorage.setItem("imageSrc", "");
    localStorage.setItem("wsq", "");
    localStorage.setItem("raw", "");
    localStorage.setItem("intermediate", "");
}

function sampleAcquired(s){
    
    if(currentFormat == Fingerprint.SampleFormat.Compressed){  
    
        localStorage.setItem("wsq", "");
        var samples = JSON.parse(s.samples);
        var sampleData = Fingerprint.b64UrlTo64(samples[0].Data);
        var decodedData = JSON.parse(Fingerprint.b64UrlToUtf8(sampleData));
        localStorage.setItem("wsq","data:application/octet-stream;base64," + Fingerprint.b64UrlTo64(decodedData.Data));
        onStop();//stop capture
        if(setUpType==='Enrollment'){
            document.getElementById("fingerprint_image").value = Fingerprint.b64UrlTo64(decodedData.Data);
        }
        else{
         var payload = {userId:"2",imgSrc:Fingerprint.b64UrlTo64(decodedData.Data),format:"wsq"};
         $.ajax({
            type: 'POST',
            url: 'http://localhost:8000/verify',
            data: JSON.stringify(payload),
            dataType: 'text'
        }).done(function(data) {
            console.log(data);
            var obj = JSON.parse(data);
            console.log(obj);
            if(obj.status=="0"){
                //verification complete get user id from obj.user_id
            }
            else
            {
                document.getElementById('status').innerHTML = '<div id="animateText" style="display:none;">'+obj.bmi+'</div>';
                setTimeout('delayAnimate("animateText","table-cell")',200);
            }



        });
        }

        
    }


    else{
        alert("Format Error");
       
    }
}



dataURItoBlob = function(dataURI, dataURIType) {
    var binary = atob(dataURI.split(',')[1]);
    var array = [];
    for(var i = 0; i < binary.length; i++) {
        array.push(binary.charCodeAt(i));
    }
    return new Blob([new Uint8Array(array)], {type: dataURIType});
}


function IeVersionInfo() {
    var sAgent = window.navigator.userAgent;
    var IEVersion = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (IEVersion > 0)
        return parseInt(sAgent.substring(IEVersion+ 5, sAgent.indexOf(".", IEVersion)));

    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;

    // Quick and dirty test for Microsoft Edge
    else if (document.documentMode || /Edge/.test(navigator.userAgent))
        return 12;

    else
        return 0; //If not IE return 0
}




function delayAnimate(id,visibility)
{
    document.getElementById(id).style.display = visibility;
}


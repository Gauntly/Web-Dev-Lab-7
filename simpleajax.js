var xhr = createRequest();
function getData(dataSource, divID, aName, aPwd)  {
    if(xhr){
        var obj = document.getElementById(divID);
        var requestbody = "namefield=" + encodeURIComponent(aName) + "&pwdfield=" + encodeURIComponent(aPwd);
        xhr.open("POST", dataSource, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 1) {
                obj.innerHTML = "<p>Connecting to the server...</p>";
                alert("Connected to the server!");
            }
            if (xhr.readyState == 2) {
                obj.innerHTML = "<p>Username and password are transferring to the server...</p>";
                alert("Username and password are transfered to the server!");
            }
            if (xhr.readyState == 3) {
                obj.innerHTML = "<p>Processing...</p>";
                alert("Processed!");
            }
            if (xhr.readyState == 4 && xhr.status == 200) {
                var result = xhr.responseText;
                obj.innerHTML = result;
		    }
	    }
	    xhr.send(requestbody);
	}
}
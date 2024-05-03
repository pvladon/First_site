var count = 0;
document.getElementById("myButton").onclick = function() {
	count++;
	if (count % 2 == 0) { 
        document.getElementById("demo").innerHTML = "" 
	} else {
        var img = document.createElement("img");
        img.src = "https://u.9111s.ru/uploads/202203/28/14f3eb7ac7e02a10e7314f70ede6ccbc.jpg"
        document.getElementById("demo").appendChild(img)
	}
}

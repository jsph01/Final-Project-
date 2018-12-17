var chosen="";
function setSrc(chosen)
{
	alert(chosen);
	var fileName=document.getElementById("myFile").value;
	document.getElementById("hiddenImage").src=""+fileName;
} 
function getImageName()
{
	alert("inside getImageName"); 
	getImage(1, setSrc);
}
function getImage(options, callback)
{
	
	var x = document.getElementById("myFile");
    var txt = "";
    if ('files' in x) 
	{
        if (x.files.length == 0) 
		{
            txt = "";
        } 
		else 
		{
            for (var i = 0; i < x.files.length; i++)
			{
                txt += "<br><strong>" + (i+1) + ". file</strong><br>";
                var file = x.files[i];
                if ('name' in file) 
				{
                    txt += "name: " + file.name + "<br>";
					chosen=file.name;
                }
                if ('size' in file) 
				{
                    txt += "size: " + file.size + " bytes <br>";
                }
            }
   			callback(chosen); 
		//document.getElementById("heading").innerHTML = x.value;
    	} 
	}
    else 
	{
        if (x.value == "") 
		{
            txt += "Select one or more files.";
        } else 
		{
            txt += "The files property is not supported by your browser!";
            txt  += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
        }
    }  

}// JavaScript Document







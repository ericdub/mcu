var globalParams ="location,alwaysRaised,scrollbars,top=200,left=520,screenX=0,screenY=0"
    function showDynamicPopup(strLocation, strWindowName, strParameters, iWidth, iHeight)
    	{
        	if (strWindowName.length == 0) {strWindowName = "_blank"}
            if (iWidth.toString().length == 0) {iWidth = 640}
            if (iHeight.toString().length == 0) {iHeight = 640}
            if (strParameters.length > 0)
            	strParameters = strParameters + ",width=" + iWidth + ",height=" + iHeight
            else
            	strParameters = "width=" + iWidth + ",height=" + iHeight
				popupWin = window.open(strLocation, strWindowName, strParameters)
       }

//Re$STRict numeric fields to be digits and prevent alphabet characters from being entered.
function intOnly(i)
       	{
       	if(i.value.length>0)
       		{
       			i.value = i.value.replace(/[^\d]+/g, '');
       		}
       	}

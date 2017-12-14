//this works around the new IE click-before-use problem that results from MS losing the patent lawsuit with Eolas.
//Question: why is Adobe's solution for doing the same thing two pages long? 

/* such a simple, elegant solution. And, while it _is_ perfectly valid, it's getting incorrectly picked up by the w3c validator, which doesn't correctly screen tags in a javascript string.  */
function sg_ie_no_click(str) 
{
  document.write(str);
}  

/* therefore, we use this slightly more complicated one. It's still valid, _passes_ the w3c validator, but isn't quite as elegant as the previous solution */
function transform_str(str)
{
	var openReg = new RegExp('{');
	var closeReg = new RegExp('}');
	var s2 = str.replace(openReg, '<').replace(closeReg, '>');
	while(s2 != str)
	{
		str = s2;
		s2 = str.replace(openReg, '<').replace(closeReg, '>');
	}
	return(s2);
}

function sg_ie_no_click_2(str)
{ 
   document.write(transform_str(str));
}
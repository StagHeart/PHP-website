
// Save the elements here to avoid DOM searching every footer_fix() call.
var footer = null;
var main = null;

function footer_fix()
{
	// Get the page footer
	if (footer == null)
	{
		var footers = document.getElementsByTagName("footer");
		footer = footers[footers.length - 1];
	}
	if (footer == null)
		return;
		
	// Get the page main
	if (main == null)
	{
		var mains = document.getElementsByTagName("main");
		main = mains[mains.length - 1];
	}
	if (main == null)
		return;
		
	// Make sure we never see past the footer
	var virtTop = main.getBoundingClientRect().bottom;
	if (virtTop + footer.getBoundingClientRect().height < window.innerHeight)
		footer.style.bottom = 0;
	else
		footer.style.bottom = null;
}

// Check the footer five times a second
setInterval(footer_fix, 200);

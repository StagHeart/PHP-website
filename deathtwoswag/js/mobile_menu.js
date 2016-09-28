
function isMobileMenuEnabled()
{
	var menu = document.getElementById("mobile_menu");
	if (menu.style.display == "none" ||
			menu.style.display == "")
		return false;
	return true;
}

function enableMobileMenu()
{
	var menu = document.getElementById("mobile_menu");
	menu.style.display = "block";
}

function disableMobileMenu()
{
	var menu = document.getElementById("mobile_menu");
	menu.style.display = "none";
}

function toggleMenu()
{
	if (isMobileMenuEnabled())
		disableMobileMenu();
	else
		enableMobileMenu();
}


// Since we enable the menu using javascript, the altered
//   css is inserted inline. Because of this, we can't
//   disable the menu using css, it must also be done
//   with javascript.
//   
// So, we monitor must monitor the window size and check 
//   if it gets larger than a mobile screen. If so, 
//   disable the menu!
//
// However, another function might already be monitoring
//   the window size, and we don't want to break that
//   script. So, we must be careful when hooking into the
//   window function.
// Hook into the window functions (but keep the old ones)
var mobileMenu_existingOnResize = window.onresize;
window.onresize = function() {
	if (mobileMenu_existingOnResize != null)
		mobileMenu_existingOnResize();
	if (window.innerWidth > 565)
		disableMobileMenu();
}


/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// This code is public domain. Feel free to use and modify
// it for your own purposes. It's just too small to bother
// with any other license. That said, improvements are
// most definitely welcome! - rm

/*** None of this gets called or used right away... ***/

// These are examples that in a real web application would be
// actual user data
var mainsite = 'http://apdidf.org/';	// where our app lives
var numMessages = 0;	// unread message count
var numClicks = 0;	// in-page clicks

function unityRedirect(strWhere)
{
// We will use this to redirect the user's current
// browser window to the appropriate page (e.g. when
// they follow a quicklink from the launcher or
// the inbox in the messaging menu).
window.location = mainsite + strWhere;
}

/*** Execution begins here ***/

// Instantiate the Unity integration object. This has to be
// done before we can actually do anything. The "1.0" is the
// version of the Unity object we want to use (as of the time
// of writing, 1.0 is the most up-to-date).
var Unity = external.getUnityObject(1.0);

// Now initialize the Unity object. We give a couple of values
// that are necessary to have a nice web app:
// name: the name that will be attached to the icon in the
// launcher and dash
// iconUrl: the URL of the image that will be used in the
// launcher and dash
// onInit: the function that will be called when the Unity
// object is ready to be used. (More on this later.)
Unity.init({
name: "APDIDF Web App",
iconUrl: "http://apdidf.org/wp-content/themes/apdidf/images/unity_icon.svg",
onInit: unityReady
});

function unityReady()
{
/***
* This is the function that was named as the "onInit"
* value when we initialized the Unity object above.
* It gets called when the object is ready to go.
* This is where you should put all of your setup code
* (such as adding a count to the launcher icon,
* integrating with menus, etc.)
*
* This is a bit of a 'gotcha': if you try to do any
* of this setup outside of this init function, it's
* likely to simply not work! Make sure all your setup
* code is in here and not floating around elsewhere.
***/

// Let's start by integrating with the messaging menu.
// In a real application you would want to call this
// with dynamic data that applies to the logged-in user
// (or not call it at all if the user is not logged in
// to your application). Here we're just giving it
// a static number.
// The "count" is simply the number that will show up
// in the messaging menu. The "callback" is a
// Javascript callback that will be executed when this
// item in the messaging menu is clicked. (A callback
// is basically a function that returns a function. It
// gets evaluated when this code is first run on init,
// so we can't simply put what we want to get executed
// here but instead create a function object that will
// get called. For this example, we'll use an instance
// of the unityRedirect() function we created above that
// directs the user to the "messages.html" page on the
// site.

// montr ele nombre de messages - pas encore pret
// Unity.MessagingIndicator.showIndicator(
//"Inbox",
// {
// count: numMessages,
// callback: function(){ unityRedirect("formation/"); }
// });

// Now let's set up the launcher icon. For this
// example, we will have a button on the page that
// increments a counter on the launcher when it is
// clicked.
// Unity.Launcher.setCount(numClicks);

// Now this makes me a sad panda: as near as I can
// tell, this *should* work. It does add a quicklink
// to the launcher, but clicking it does nothing.
// The only comfort I take here is that none of the
// included default webapps work either! (E.g. the
// Amazon integration included with Unity exhibits the
// same behavior.) I can only assume this is a bug in
// the Unity web integration.
// 
// ajoute la page formation
Unity.Launcher.addAction("Formations",
function(){ unityRedirect("formation/"); }
);
// ajoute la page mission
Unity.Launcher.addAction("Missions",
function(){ unityRedirect("mission/"); }
);

// ajoute les outils 
// ajoute Nuxeo
Unity.Launcher.addAction("Documents",
function(){ window.location = "http://apdidf.org:8080/nuxeo/"; }
);

// ajoute le calendrier
Unity.Launcher.addAction("Calendrier",
function(){ window.location = "http://calendrier.apdidf.org/"; }
);

// ajoute le calendrier
Unity.Launcher.addAction("Webmail",
function(){ window.location = "https://ssl0.ovh.net/roundcube/"; }
);

}


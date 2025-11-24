const mainLayer = document.querySelector('body');


// Проверка 
// var test = document.querySelector('#test');
// if(udid && udid !== '') test.innerHTML = 'Доступ разрешен!';
// else {
//     test.innerHTML = 'Иди нахуй далбаеб!';
//     openURL('/', 3);
// }

function openURL(url, seconds) {
    setTimeout(()=>{ location.href = url; }, seconds * 1000);
}

// Event of exit from account
function onExitEvent() {
    Cookies.deleteCookie('udid');
    Cookies.deleteCookie('userID');
    Cookies.deleteCookie('uname');
    Cookies.deleteCookie('email');
    console.log('exit');
    location.reload();
}

(function() {
    try {
        var $_console$$ = console;
        Object.defineProperty(window, "console", {
            get: function() {
                if ($_console$$._commandLineAPI)
                    throw "Sorry, for security reasons, the script console is deactivated on netflix.com";
                return $_console$$
            },
            set: function($val$$) {
                $_console$$ = $val$$
            }
        })
    } catch ($ignore$$) {
    }
})();

// function waitForElement(querySelector, timeout) {
//   return new Promise((resolve, reject)=>{
//     var timer = false;
//     if(document.querySelector(querySelector)) return resolve();
//     const observer = new MutationObserver(()=>{
//       if(document.querySelector(querySelector)){
//         observer.disconnect();
//         if(timer !== false) clearTimeout(timer);
//         return resolve();
//       }
//     });
//     observer.observe(document.body, {
//       childList: true,
//       subtree: true
//     });
//     if(timeout) timer = setTimeout(()=>{
//       observer.disconnect();
//       reject();
//     }, timeout);
//   });
// }
// waitForElement("#idOfElementToWaitFor", 3000).then(function(){
//     alert("element is loaded.. do stuff");
// }).catch(()=>{
//     alert("element did not load in 3 seconds");
// });

function getDevice() {
    let device = "Unknown";
    const ua = {
        "Generic Linux": /Linux/i,
        "Android": /Android/i,
        "BlackBerry": /BlackBerry/i,
        "Bluebird": /EF500/i,
        "Chrome OS": /CrOS/i,
        "Datalogic": /DL-AXIS/i,
        "Honeywell": /CT50/i,
        "iPad": /iPad/i,
        "iPhone": /iPhone/i,
        "iPod": /iPod/i,
        "macOS": /Macintosh/i,
        "Windows": /IEMobile|Windows/i,
        "Zebra": /TC70|TC55/i,
    }
    Object.keys(ua).map(v => navigator.userAgent.match(ua[v]) && (device = v));
    return device;
}
console.log(getDevice());
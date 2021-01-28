import 'alpinejs'
import 'focus-visible'

// Global cookie functions (used by cookie banner).
window.setCookie = function(name, value, days) {
    let expires = ''
    if (days) {
        const date = new Date()
        date.setTime(date.getTime() + (days*24*60*60*1000))
        expires = '; expires=' + date.toUTCString()
    }
    document.cookie = name + '=' + (value || '')  + expires + '; path=/'
}

window.eraseCookie = function(name) {
    document.cookie = name+'=; Max-Age=-99999999;'
}

window.getCookie = function(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

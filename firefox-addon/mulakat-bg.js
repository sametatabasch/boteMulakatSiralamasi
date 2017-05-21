"use strict";

function onError(error) {
    console.error(`Error: ${error}`);
}
/**
 * Anladığım kadarıyla uygun sekmedeise Sekmeye mesaj gönderiyor.
 * @link https://developer.mozilla.org/en-US/Add-ons/WebExtensions/API/Tabs/sendMessage
 * @param tabs
 */
function sendMessageToTabs(tabs) {
    for (let tab of tabs) {
        browser.tabs.sendMessage(
            tab.id,
            {greeting: "Hi from background script"}
        ).then(response => {
            console.log("Message from the content script:");
        console.log(response.response);
    }).catch(onError);
    }
}

browser.browserAction.onClicked.addListener(() => {
    browser.tabs.query({
    currentWindow: true,
    active: true
}).then(sendMessageToTabs).catch(onError);
});
/**
 * Puan listeye eklendiğinde sistem bildirimi çalıştırır.
 */
browser.runtime.onMessage.addListener(notify);

function notify(message) {
    browser.notifications.create({
        "type": "basic",
        "title": "BÖTE Mülakat Sıralaması",
        "message": message.puan + " olan Puanın Listeye eklendi "
    });
}
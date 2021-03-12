chrome.runtime.onMessage.addListener(
    function (request, sender, sendResponse) {
        if (request.wait) {
            var wait = request.wait;
            var tab = sender.tab.id;
            chrome.alarms.create('tab_' + tab, {
                delayInMinutes: wait
            });
            sendResponse({message: 'alarm has been created', tab: tab, wait: wait});
        } else if (request.bidder_data) {
            chrome.storage.sync.set({'bidder_data': request.bidder_data}, function () {

            });
            sendResponse({message: 'access token saved'});
        } else if (request.logout_user) {
            chrome.storage.sync.set({'bidder_data': null}, function () {

            });
            sendResponse({message: 'access token saved'});
        } else {
            chrome.storage.sync.get('bidder_data', function (data) {
                sendResponse(data.bidder_data);
            });
            return true;
        }

    });

chrome.alarms.onAlarm.addListener(function fireAlarm(alarm) {
    console.log(alarm)
    var tab = alarm.name;
    tab = parseInt(tab.split("_")[1]);
    chrome.storage.sync.get('bidder_data', function (data) {
        chrome.tabs.sendMessage(tab, {message: "Alarm Fired bid now!"}, function (response) {

        });
    });
    chrome.alarms.clear(alarm.name);
});
var staticCacheName = "pwa-v" + new Date().getTime();

var getUrl = location;
var baseurl = location.href;

var res = baseurl.replace("/serviceworker.js", "");
var filesToCache = [
    res+'/offline',
    res+'/image/icon/icon-72x72.png',
    res+'/image/icon/icon-96x96.png',
    res+'/image/icon/icon-128x128.png',
    res+'/image/icon/icon-144x144.png',
    res+'/image/icon/icon-152x152.png',
    res+'/image/icon/icon-192x192.png',
    res+'/image/icon/icon-384x384.png',
    res+'/image/icon/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
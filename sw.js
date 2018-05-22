//This is the service worker with the combined offline experience (Offline page + Offline copy of pages)

var CACHE = 'pwabuilder-precache';
var precacheFiles = [
        'assets/css/header.css',
  'assets/css/reset.css',
  'assets/css/screen.css',
    'assets/js/bootstrap.min.js',
      'images/Claudine.jpg',
    'images/Elien.jpg',
    'images/Jana.jpg',
    'images/Jonas.jpg',
    'images/Logo-Oana.png',
    'images/Matthias.jpg',
    'images/Sylke.jpg',
    'images/browserconfig.xml',
    'images/geschied/02.jpg',
    'images/geschied/04.jpg',
    'images/geschied/05.jpg',
    'images/oneindigeVerhaal.jpg',
    'images/ticketwinkel_logo.png',
    'sw.js',
    'manifest.json',
    'index.php',
    'Voor_Leden.php',
    'huidige_productie.php',
    'Over_Ons.php'
    ];

//Install stage sets up the cache-array to configure pre-cache content
self.addEventListener('install', function(evt) {

  evt.waitUntil(precache().then(function() {
    console.log('[ServiceWorker] Skip waiting on install');
      return self.skipWaiting();

  })
  );
});

var preLoad = function(){
  console.log('[PWA Builder] Install Event processing');
  return caches.open('pwabuilder-offline').then(function(cache) {
    console.log('[PWA Builder] Cached index and offline page during Install');
    return cache.addAll([

//allow sw to control of current page
self.addEventListener('activate', function(event) {
      return self.clients.claim();

});

self.addEventListener('fetch', function(evt) {
  evt.respondWith(fromCache(evt.request).catch(fromServer(evt.request)));
  evt.waitUntil(update(evt.request));
});


function precache() {
  
      return caches.open(CACHE).then(function (cache) {
        return Promise.all(
            precacheFiles.map(function (url) {
                return cache.add(url).catch(function (reason) {
                    return console.log(url + "failed: " + String(reason));
                })
            })
        );
    });
}

self.addEventListener('fetch', function(event) {
  console.log('The service worker is serving the asset.');
  event.respondWith(checkResponse(event.request).catch(function() {
    return returnFromCache(event.request)}
  ));
  event.waitUntil(addToCache(event.request));
});

var checkResponse = function(request){
  return new Promise(function(fulfill, reject) {
    fetch(request).then(function(response){
      if(response.status !== 404) {
        fulfill(response)
      } else {
        reject()
      }
    }, reject)
  });
};

var addToCache = function(request){
  return caches.open('pwabuilder-offline').then(function (cache) {
    return fetch(request).then(function (response) {
      console.log('[PWA Builder] add page to offline'+response.url)
      return cache.put(request, response);
    });
  });
};

var returnFromCache = function(request){
  return caches.open('pwabuilder-offline').then(function (cache) {
    return cache.match(request).then(function (matching) {
     if(!matching || matching.status == 404) {
       return cache.match('offline.html')
     } else {
       return matching
     }
    });
  });
};
var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = []; // kosongkan dulu, isi lagi setelah push notif berjalan

// // Cache on install
// self.addEventListener("install", (event) => {
//     self.skipWaiting();
//     event.waitUntil(
//         caches.open(staticCacheName).then((cache) => {
//             return cache.addAll(filesToCache);
//         }),
//     );
// });

// // Clear cache on activate
// self.addEventListener("activate", (event) => {
//     event.waitUntil(
//         caches.keys().then((cacheNames) => {
//             return Promise.all(
//                 cacheNames
//                     .filter((cacheName) => cacheName.startsWith("pwa-"))
//                     .filter((cacheName) => cacheName !== staticCacheName)
//                     .map((cacheName) => caches.delete(cacheName)),
//             );
//         }),
//     );
//     self.clients.claim();
// });

// // Serve from Cache
// self.addEventListener("fetch", (event) => {
//     event.respondWith(
//         caches
//             .match(event.request)
//             .then((response) => {
//                 return response || fetch(event.request);
//             })
//             .catch(() => {
//                 return caches.match("offline");
//             }),
//     );
// });

self.addEventListener("install", (event) => {
    self.skipWaiting();
});

self.addEventListener("activate", (event) => {
    self.clients.claim();
});

// =============================================
// PUSH NOTIFICATION
// =============================================
self.addEventListener("push", function (event) {
    let data = {};

    if (event.data) {
        try {
            data = event.data.json(); // coba parse JSON dulu
        } catch (e) {
            // Kalau bukan JSON (misal test dari DevTools), pakai sebagai plain text
            data = { title: event.data.text(), body: "" };
        }
    }

    const title = data.title ?? "Absensi MIS Fathul Iman";
    const options = {
        body: data.body ?? "",
        icon: "/images/icons/launchericon-192x192.png",
        badge: "/images/icons/launchericon-96x96.png",
        data: { url: data.url ?? "/admin" },
        vibrate: [200, 100, 200],
    };

    event.waitUntil(self.registration.showNotification(title, options));
});

// =============================================
// NOTIFICATION CLICK
// =============================================
self.addEventListener("notificationclick", function (event) {
    event.notification.close();

    const targetUrl = event.notification.data?.url ?? "/admin";

    event.waitUntil(
        clients
            .matchAll({ type: "window", includeUncontrolled: true })
            .then(function (clientList) {
                for (const client of clientList) {
                    if (client.url.includes(targetUrl) && "focus" in client) {
                        return client.focus();
                    }
                }
                if (clients.openWindow) {
                    return clients.openWindow(targetUrl);
                }
            }),
    );
});

<script>
    @auth
    // Hanya jalankan jika sudah login
    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
        const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
        const rawData = atob(base64);
        return Uint8Array.from([...rawData].map((c) => c.charCodeAt(0)));
    }

    async function subscribeWebPush() {
        if (!('serviceWorker' in navigator) || !('PushManager' in window)) return;

        const permission = await Notification.requestPermission();
        if (permission !== 'granted') return;

        await navigator.serviceWorker.register('/serviceworker.js');
        const registration = await navigator.serviceWorker.ready;

        const existing = await registration.pushManager.getSubscription();
        if (existing) await existing.unsubscribe();

        const vapidKey = document.querySelector('meta[name="vapid-public-key"]').content;
        const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0];

        const subscription = await registration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(vapidKey),
        });

        const {
            endpoint,
            keys: {
                p256dh,
                auth
            }
        } = subscription.toJSON();

        const res = await fetch('/webpush/subscribe', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                endpoint,
                key: p256dh,
                token: auth,
                encoding: contentEncoding
            }),
        });

        console.log('Subscription tersimpan:', res.status);
    }

    document.addEventListener('DOMContentLoaded', subscribeWebPush);
    @endauth
</script>

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.copyLink = function (link, btn) {
    navigator.clipboard.writeText(link)
        .then(() => {
            const originalText = btn.innerText;

            btn.innerText = 'Copied';

            setTimeout(() => {
                btn.innerText = originalText;
            }, 1500);
        })
        .catch(() => {
            btn.innerText = 'Failed';
            setTimeout(() => {
                btn.innerText = 'Copy Link';
            }, 1500);
        });
};
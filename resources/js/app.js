// import './bootstrap';
//
// const userID = document.body.dataset.id;
// var channel = Echo.private(`App.Models.Admin.${userID}`);
//
// channel.notification((notification) => {
//     let myspan = document.querySelector('.myspan');
//     myspan.classList.add('pulse');
//     let notification_count = document.querySelector('#notification-count').value();
//     ++notification_count;
//     // const audio = new Audio('public/assets/audio/Whatsapp Notification Tone.mp3');
//     // audio.play();
//     const dropdown = document.querySelector('.main-notification-list');
//     const notificationHTML = `
//         <a class="d-flex p-3 border-bottom" href="#">
//             <div class="notifyimg bg-warning">
//                 <i class="la la-envelope-open text-white"></i>
//             </div>
//             <div class="mr-3">
//                 <h5 class="notification-label mb-1">${notification.data.body}</h5>
//                 <div dir="ltr" class="notification-subtext">${notification.created_at}</div>
//             </div>
//             <div class="mr-auto">
//                 <i class="las la-angle-left text-left text-muted"></i>
//             </div>
//         </a>
//     `;
//     dropdown.insertAdjacentHTML('afterbegin', notificationHTML);
// });
import './bootstrap';

const userID = document.body.dataset.id;
var channel = Echo.private(`App.Models.Admin.${userID}`);

channel.notification((notification) => {
    let myspan = document.querySelector('.myspan');
    myspan.classList.add('pulse');
    let notification_count = parseInt(document.querySelector('#notification-count').textContent);
    notification_count++;
    document.querySelector('#notification-count').textContent = notification_count;
    const audio = new Audio('/assets/audio/notification.mp3');
    audio.play();
    const dropdown = document.querySelector('.main-notification-list');
    const notificationHTML = `
        <a class="d-flex p-3 border-bottom" href="/${notification.data.url}/?notification_id=${notification.id}">
            <div class="notifyimg bg-warning">
                <i class="la la-envelope-open text-white"></i>
            </div>
            <div class="mr-3">
                <h5 class="notification-label mb-1">${notification.data.body}</h5>
                <div dir="ltr" class="notification-subtext">${moment(notification.created_at).fromNow()}</div>
            </div>
            <div class="mr-auto">
                <i class="las la-angle-left text-left text-muted"></i>
            </div>
        </a>
    `;
    dropdown.insertAdjacentHTML('afterbegin', notificationHTML);
});

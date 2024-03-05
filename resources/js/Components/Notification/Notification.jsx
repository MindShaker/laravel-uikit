import './style.css';

class Notification {
    constructor(message, type) {
        this.message = message;
        this.type = type;
        const el = this.appendNotification();
        setTimeout(() => this.removeNotification(el), 5000);
    }

    appendNotification() {
        const notificationElement = document.createElement('div');
        notificationElement.classList.add('notification');
        notificationElement.classList.add(`notification-${this.type}`);
        notificationElement.innerHTML = this.message;

        const el = document.body.appendChild(notificationElement);
        setTimeout(() => { el.classList.add('notification-show'); }, 50);

        return el;
    }

    removeNotification(el) {
        el.classList.add('notification-hide');
        setTimeout(() => { el.remove(); }, 1000);
    }
}
export default Notification;

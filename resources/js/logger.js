export function logger(message, level) {
    if (import.meta.env.DEV) {
        switch (level) {
            case 'e':
                console.error(message);
                break;

            case 'w':
                console.warn(message);
                break;

            default:
                console.info(message);
                break;
        }
    }
}

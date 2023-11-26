import { computePosition, autoUpdate } from "https://cdn.jsdelivr.net/npm/@floating-ui/dom@1.5.3/+esm";

export const guestMessage = () => ({
    toggle: false,
    init() {
        console.log(window.floatingUIDOM);

    },
    messageBoxInit(anchor, tooltip) {

        computePosition(anchor, tooltip).then(({ x, y }) => {
            Object.assign(tooltip.style, {
                left: `${x}px`,
                top: `${y}px`,
            });
        });
    },
});

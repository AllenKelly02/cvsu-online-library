import "./bootstrap";
import Alpine from "alpinejs";
import { bookScanner } from "./modules/bookScanner";

window.Alpine = Alpine;

Alpine.data("editor", () => ({
    data: null,
    init() {
        this.spawnEditor();
    },
    spawnEditor() {
        new Quill("#editor", {
            theme: "snow",
        });
    },
    getContent() {
        const content = document
            .getElementById("editor")
            .querySelector(".ql-editor").innerHTML;
        this.data = content;
    },
}));

Alpine.data('removeModal', () => ({
    toggle : false,
    openToggle(){
        this.toggle = !this.toggle
    }
}));


Alpine.data('printBarcode', () => ({
    printElement(){
        const elementDiv = document.getElementById('barcode-print-data');

        window.html2pdf().from(elementDiv).save();
    }
}));


Alpine.data('bookScanner', bookScanner);

Alpine.start();

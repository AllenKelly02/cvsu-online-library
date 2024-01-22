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



    Alpine.data('printReturnedBooks', () => ({
        exportToExcel() {
            const table = document.getElementById('returnedbooks-print-data');
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            /* generate XLSX file and send to client */
            XLSX.writeFile(wb, 'Returned_Books.xlsx');
        }
    }));






Alpine.data('bookScanner', bookScanner);

Alpine.start();



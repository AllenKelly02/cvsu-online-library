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

        var options = {
            filename: 'Accession Number Barcodes.pdf',
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        html2pdf(elementDiv, options);
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
        },
        printTableData() {
            const table = document.getElementById('returnedbooks-print-data');
            var options = {
                filename: 'Monthly Borrowed Books.pdf',
                pagebreak: { avoid: ['tr', 'td'] },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape',
                    startY: 0.5, // Adjust as needed
                    margin: { left: 0.25, right: 0.25 }, // Adjust as needed
                    tableWidth: 'auto', // Use the calculated width
                    columnStyles: { 0: { cellWidth: 'auto' }, 1: { cellWidth: 'auto' }, /* Add more if needed */ }
                },

            };

            html2pdf(table, options);
        }
    }));

    Alpine.data('printReceipt', () => ({
        printTableData() {
            const table = document.getElementById('receipt-print-data');
            var options = {
                filename: 'Student Penalty Receipt.pdf',
                pagebreak: { avoid: ['tr', 'td'] },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'landscape',
                },

            };

            html2pdf(table, options);
        }
    }));


    Alpine.data('monthlyUser', () =>  ({
        monthLabels: [],
        totalUser: [],
        initUser(data) {
            data.forEach(item => {

                this.monthLabels.push(item.name)
                this.totalUser.push(item.users)

            });

            console.log(this.totalUser);
        },
        initBarGraph() {
           const  colors = [
                '#eb422f',
                '#742ad4',
                '#0c5c87'
            ];
            const element = this.$refs.monthlyUserGraph;

            console.log(element);

            var options = {
                series: [{
                    data: [...this.totalUser]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },
                colors: colors,
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: false
                },
                xaxis: {
                    categories: [
                       ...this.monthLabels
                    ],
                    labels: {
                        style: {
                            colors: colors,
                            fontSize: '12px'
                        }
                    }
                }
            };






            const barChart = new ApexCharts(element, options);
            barChart.render()
        }
    }))






Alpine.data('bookScanner', bookScanner);

Alpine.start();



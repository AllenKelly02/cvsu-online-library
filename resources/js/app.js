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
        isVisible: false, // Initial visibility state
        // exportToExcel() {
        //     const table = document.getElementById('returnedbooks-print-data');
        //     const ws = XLSX.utils.table_to_sheet(table);
        //     const wb = XLSX.utils.book_new();
        //     XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

        //     /* generate XLSX file and send to client */
        //     XLSX.writeFile(wb, 'Returned_Books.xlsx');
        // },
        printTableData() {
            const table = document.getElementById('returnedbooks-print-data');
            const printLogo = document.getElementById('print-logo');
            const prepared = document.getElementById('prepared-by');
            const opt = {
                margin: 0.5,
                filename: 'Monthly Borrowed Books.pdf',
                pagebreak: { avoid: ['tr', 'td'] },
                jsPDF: { unit: 'in', format: 'legal', orientation: 'landscape' },
            };

            this.isVisible = true; // Show the logo before generating the PDF
            printLogo.classList.remove("hidden");
            printLogo.classList.add("block");

            prepared.classList.remove("hidden");
            prepared.classList.add("block");

            html2pdf().set(opt).from(prepared, () => {
                html2pdf().from(printLogo).from(table).save();
              });

            setTimeout(()=>{printLogo.classList.replace("block", 'hidden');}, 10);
            setTimeout(()=>{prepared.classList.replace("block", 'hidden');}, 10);
            this.isVisible = false; // Hide the logo after generating the PDF
            },
    }));

    Alpine.data('printReceipt', () => ({
        printTableData() {
            const table = document.getElementById('receipt-print-data');
            var options = {
                filename: 'Student Penalty Receipt.pdf',
                pagebreak: { avoid: ['tr', 'td'] },
                jsPDF: {
                    unit: 'in',
                    format: 'a4 ',
                    orientation: 'portrait',
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



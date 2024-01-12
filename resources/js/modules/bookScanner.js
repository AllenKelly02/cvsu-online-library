import axios from "axios";

export const bookScanner = () => ({
    state: {
        bookId: "",
        bookData: null,
    },
    init() {
        this.$watch("state.bookId", () => {
            console.log("init function watch bookId");

            if (this.state.bookId !== "") {
                this.fetchBookData(this.state.bookId);
                this.state.bookId = "";
            }
        });
    },
    getScannerData(e) {
        const data = e.target.value;

        console.log(data);
    },
    async fetchBookData(bookID) {
        try {
            const config = {
                header: {
                    accept: "application/json",
                    "content-type": "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            };

            const response = await axios.get(
                `/admin/scan/book/show/${bookID}`,
                config
            );

            this.state.bookData = { ...response.data.book };

            console.log(this.state.bookData);
        } catch (error) {
            console.log("getfetch Data error function");

            window.Swal.fire({
                title: `${error.response.data.message} ${error.response.status}`,
                text: `${error.response.data.message}`,
                icon: "error",
            });

            this.state.bookData = null
        }
    },
});

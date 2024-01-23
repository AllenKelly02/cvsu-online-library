<x-app-layout>
    <section class="text-gray-600 body-font w-full bg-no-repeat bg-fixed"
        style="background-image: url('../img/blob-scene-haikei (9).svg');">
        <div class="px-1 py-5 mx-auto ml-10">
            <div class="lg:w-1/2 w-fulll lg:mb-5">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
                <div class="h-1 w-20 bg-bluemain rounded"></div>
            </div>
            <div class="flex flex-wrap -m-24 my-5 text-center w-full pl-3">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="card ml-20">
                        <div>
                            <a href="{{ route('admin.books.index') }}">
                                <div class="bg bg-white px-4 py-6 rounded-lg shadow-xl h-full w-full">
                                    <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block"
                                        src="{{ asset('img/book.png') }}" alt="content">
                                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ $books->count() }}</h2>
                                    <p class="leading-relaxed">Core Collection</p>
                                </div>
                            </a>
                        </div>
                        <div class="blob"></div>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="card ml-20">
                        <div>
                            <a href="{{ route('admin.verified-accounts') }}">
                                <div class="bg bg-white px-4 py-6 rounded-lg shadow-xl h-full w-full">
                                    <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block"
                                        src="{{ asset('img/users.png') }}" alt="content">
                                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ $user->count() }}</h2>
                                    <p class="leading-relaxed">Users</p>
                                </div>
                            </a>
                        </div>
                        <div class="blob"></div>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="card ml-20">
                        <div>
                            <a href="#">
                                <div class="bg bg-white px-4 py-6 rounded-lg shadow-xl h-full w-full">
                                    <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block"
                                        src="{{ asset('img/visit.png') }}" alt="content">
                                    <h2 class="title-font font-medium text-3xl text-gray-900">1</h2>
                                    <p class="leading-relaxed">Visits</p>
                                </div>
                            </a>
                        </div>
                        <div class="blob"></div>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="card ml-20">
                        <div>
                            <a href="{{ route('admin.getAllBorrowedBooks') }}">
                                <div class="bg bg-white px-4 py-6 rounded-lg shadow-xl h-full w-full">
                                    <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block"
                                        src="{{ asset('img/borrow.png') }}" alt="content">
                                    <h2 class="title-font font-medium text-3xl text-gray-900">
                                        {{ $bookIssuing->count() }}</h2>
                                    <p class="leading-relaxed">Borrowed Books</p>
                                </div>
                            </a>
                        </div>
                        <div class="blob"></div>
                    </div>
                </div>
            </div>
            <!-- Add the chart container element -->
            <div class="container px-1 py-1 mx-auto">
                <div class="flex flex-col text-center mb-2 mt-2">
                    <div class="w-50 mt-5 max-w-screen h-auto p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8">
                        <h2 class="text-xl font-bold">Monthly Borrowed Books</h2>
                        <span class="text-sm font-semibold text-gray-500">{{ date('Y') }}</span>
                        <div id="chartContainer" class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
                        </div>
                    </div>
                    <div class="grid grid-cols-2 h-84 w-full py-5 gap-5">
                        <div class="w-full bg-white rounded-lg shadow-xl sm:p-8 h-full flex flex-col gap-2">
                            <h2 class="text-xl font-bold w-full"> Book Category</h2>
                            <div id="pieChart" class="w-full h-full"></div>
                            {{-- <canvas id="myChart"></canvas> --}}
                        </div>
                        <div class="w-full bg-white rounded-lg shadow-xl sm:p-8 h-full">
                            <h2 class="text-xl font-bold"></h2>
                            <span class="text-sm font-semibold text-gray-500"></span>
                            <div class="w-full h-full flex flex-col gap-2">
                                <h1 class="text-lg font-bold p-2">
                                    Ranking
                                </h1>
                                <div class="overflow-x-auto h-full">
                                    <table class=" w-full">
                                        <!-- head -->
                                        <thead>
                                            <tr>
                                                <th class="w-16">Rank</th>
                                                <th>Title</th>
                                                <th>Borrowed</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- row 1 -->
                                            <?php
                                            $count = 1;
                                            ?>
                                            @foreach ($booksRanking as $book)
                                                <tr>
                                                    <th>{{ $count++ }}</th>
                                                    <td>{{ $book->title }}</td>
                                                    <td>{{ $book->bookIssuing()->count() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @if (Session::has('message'))
                <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
                    <p class="alert alert-success shadow-lg rounded-box w-auto text-center animate-bounce">
                        {{ Session::get('message') }}</p>
                </div>
            @endif
            <canvas id="userLineChart" width="400" height="200"></canvas>
            @push('js')
                <script>
                    var options = {
                        series: [{
                            name: "Borrowed Books",
                            data: [parseInt({{ $totalBorrowedBooksByMonths['Jan'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Feb'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Mar'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Apr'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['May'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Jun'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Jul'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Aug'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Sep'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Oct'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Nov'] }}),
                                parseInt({{ $totalBorrowedBooksByMonths['Dec'] }})
                            ]
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: [
                                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                            ],
                        }
                    };

                    var chart = new ApexCharts(document.querySelector("#chartContainer"), options);
                    chart.render();

                    const booksData = @json($booksTotalByCategory);

                    const books = {
                        type: Object.keys(booksData),
                        total: Object.values(booksData)
                    }




                    console.log(books)


                    var optionsOne = {
                        series: [...books.total],
                        chart: {
                            // width: 500,
                            type: 'pie',
                        },
                        labels: [...books.type],
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };


                    var chartPie = new ApexCharts(document.querySelector("#pieChart"), optionsOne);
                    chartPie.render();
                </script>
                <script>
                    // Remove the alert message after 5 seconds (adjust the timeout value as needed)
                    setTimeout(function() {
                        document.querySelector('.alert').remove();
                    }, 1000);
                </script>

                {{-- <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var ctx = document.getElementById('userLineChart').getContext('2d');
                        var usersPerMonth = @json($usersPerMonth);

                        var chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: usersPerMonth.map(entry => entry.month),
                                datasets: [{
                                    label: 'Users per Month',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    data: usersPerMonth.map(entry => entry.count),
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        type: 'category',
                                        labels: usersPerMonth.map(entry => entry.month),
                                    },
                                    y: {
                                        beginAtZero: true,
                                        precision: 0,
                                    }
                                }
                            }
                        });
                    });
                </script> --}}
            @endpush
        </div>
    </section>
</x-app-layout>

<x-app-layout>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-5 mx-auto ml-8">
            <div class="flex flex-col text-left w-full mb-2 mt-2">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard</h1>
            </div>
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="bg-white px-4 py-6 rounded-lg">
                        <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/book.png') }}"
                            alt="content">
                        <h2 class="title-font font-medium text-3xl text-gray-900">3,547</h2>
                        <p class="leading-relaxed">Core Collection</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="bg-white px-4 py-6 rounded-lg">
                        <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/users.png') }}"
                            alt="content">
                        <h2 class="title-font font-medium text-3xl text-gray-900">0</h2>
                        <p class="leading-relaxed">Users</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="bg-white px-4 py-6 rounded-lg">
                        <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/visit.png') }}"
                            alt="content">
                        <h2 class="title-font font-medium text-3xl text-gray-900">156</h2>
                        <p class="leading-relaxed">No. of Visits</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="bg-white px-4 py-6 rounded-lg">
                        <img class="object-center ml-15 mr-3 mb-3 py-2 inline-block" src="{{ asset('img/borrow.png') }}"
                            alt="content">
                        <h2 class="title-font font-medium text-3xl text-gray-900">6</h2>
                        <p class="leading-relaxed">Borrowed Books</p>
                    </div>
                </div>
            </div>

            <!-- Add the chart container element -->
            <div class="container px-1 py-1 mx-auto">
                <div class="flex flex-col text-center mb-2 mt-2">
                    <div class="w-50 mt-5 max-w-screen h-auto p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8">
                        <h2 class="text-xl font-bold">Monthly Visitors</h2>
                        <span class="text-sm font-semibold text-gray-500">2023</span>
                        <div id="chartContainer" class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
                        </div>
                    </div>

                    <div class="w-50 mt-5 max-w-screen h-auto p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8">
                        <h2 class="text-xl font-bold">Total Books</h2>
                        <span class="text-sm font-semibold text-gray-500">2023</span>
                        <canvas id="myChart"></canvas>
                    </div>

                </div>
            </div>
            <script>
                // Data for the pie chart
                const canvas = document.getElementById('myChart');

                // Chart data
                const data = {
                    labels: ['Label 1', 'Label 2', 'Label 3'],
                    datasets: [{
                        data: [30, 50, 20],
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                        hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }, ],
                };

                // Chart options
                const options = {
                    responsive: true,
                };

                // Create the pie chart
                const myChart = new Chart(canvas, {
                    type: 'pie',
                    data: data,
                    options: options,
                });
            </script>
            <script>
                // Data for the line chart
                const monthlyVisitors = [200, 78, 67, 88, 89, 45, 0, 0, 0, 0, 0, 0];
                const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                // Get the chart container element
                const chartContainer = document.getElementById('chartContainer');

                // Generate the chart elements based on the data
                for (let i = 0; i < monthlyVisitors.length; i++) {
                    const value = monthlyVisitors[i];
                    const label = monthLabels[i];

                    // Create the chart element
                    const chartElement = document.createElement('div');
                    chartElement.classList.add('relative', 'flex', 'flex-col', 'items-center', 'flex-grow', 'pb-5', 'group');

                    // Create the value label element
                    const valueLabel = document.createElement('span');
                    valueLabel.classList.add('absolute', 'top-0', 'hidden', '-mt-6', 'text-xs', 'font-bold', 'group-hover:block');
                    valueLabel.textContent = value.toString();

                    // Create the bar element
                    const barElement = document.createElement('div');
                    barElement.classList.add('relative', 'flex', 'justify-center', 'w-full', 'h-6', 'bg-green-300');
                    barElement.style.height = value + 'px';

                    // Create the label element
                    const labelElement = document.createElement('span');
                    labelElement.classList.add('absolute', 'bottom-0', 'text-xs', 'font-bold');
                    labelElement.textContent = label;

                    // Append the elements to the chart container
                    chartElement.appendChild(valueLabel);
                    chartElement.appendChild(barElement);
                    chartElement.appendChild(labelElement);
                    chartContainer.appendChild(chartElement);
                }
            </script>


            <script src="https://cdn.tailwindcss.com"></script>
            <script src="https://kit.fontawesome.com/290d4f0eb4.js" crossorigin="anonymous"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </section>
</x-app-layout>

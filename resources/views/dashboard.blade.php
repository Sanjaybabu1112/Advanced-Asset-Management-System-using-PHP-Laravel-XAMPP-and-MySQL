<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Asset Manager - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        .company-name {
            font-size: 1.2em;
        }
        .main-content {
            display: flex;
            flex: 1;
        }
        aside {
            background-color: #2c2f33;
            color: #ffffff;
            width: 200px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 80px; /* Adjust as needed based on your header height */
            height: calc(100vh - 80px); /* Adjust to account for header height */
            overflow-y: auto; /* Enable scrolling for the sidebar */
            z-index: 900;
        }
        aside nav ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }
        aside nav ul li {
            margin-bottom: 10px;
            width: 100%;
        }
        aside nav ul li button {
            color: #ffffff;
            background-color: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 15px;
            font-size: 1.1em;
            transition: background 0.3s, color 0.3s;
            display: flex;
            align-items: center;
        }
        aside nav ul li button i {
            margin-right: 10px;
        }
        aside nav ul li button:hover {
            background-color: #495057;
            color: #ffdd57;
        }
        section.content {
            flex: 1;
            padding: 20px;
            background-color: #ffffff;
        }
        .dashboard-content {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .dashboard-content h2 {
            margin-top: 0;
            font-size: 1.8em;
            color: #ffffff;
        }
        .stat-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Adjust spacing between buttons */
        }

        .stat-cards .row {
            width: 100%; /* Ensure each row takes full width */
            display: flex;
            justify-content: space-between; /* Adjust spacing between buttons in each row */
            margin-bottom: 10px; /* Adjust vertical spacing between rows */
        }
        .stat-card {
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            flex: 1 1 calc(33% - 20px);
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: #007bff;
        }
        .stat-card.total {
            background-image: linear-gradient(45deg, #4d807e, #2f5e5c); /* Darker teal gradient */
        }
        .stat-card.assigned {
            background-image: linear-gradient(45deg, #3b74c2, #28558a); /* Darker blue gradient */
        }
        .stat-card.available {
            background-image: linear-gradient(45deg, #784c7d, steelblue); /* Darker purple gradient */
        }
        .stat-card.deadline {
            background-image: linear-gradient(45deg, #4d807e, #28558a); /* Darker purple gradient */
        }
        .stat-card:hover {
            transform: translateY(-10px);
        }
        .stat-card h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .stat-card p {
            font-size: 1.2em;
        }
        button {
            font-size: 20px;
            color: white;
            border: none;
            background: none;
            cursor: pointer;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .chart-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .chart-item {
            width: 45%;
            text-align: center;
            margin-bottom: 20px;
        }
        @media (max-width: 768px) {
            .chart-item {
                width: 100%;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function loadFrame(url) {
            const ifr = document.getElementById('ifr');
            ifr.innerHTML = `<iframe src="${url}"></iframe>`;
        }

        function assetsframe() {
            loadFrame("{{ route('assets.create') }}");
        }

        function employeesframe() {
            loadFrame("{{ route('employees') }}");
        }

        function dash() {
            window.location.href = "{{ route('dashboard') }}";
        }

        function total() {
            // Implement your total assets functionality here
            loadFrame("{{ route('assets.index') }}");
        }

        function assigned() {
            // Implement your assigned assets functionality here
            loadFrame("{{ route('assigns.index') }}");
        }

        function available() {
            // Implement your available assets functionality here
            loadFrame("{{ route('assets.available') }}");
        }

        function deadline() {
            // Implement your available assets functionality here
            loadFrame("{{ route('assigns.deadline') }}");
        }

        function assignsframe() {
            // Implement your available assets functionality here
            loadFrame("{{ route('assigns.create') }}");
        }
        

        // Chart.js code for Total Assets (Pie Chart)
        document.addEventListener('DOMContentLoaded', function() {
                const totalAssetsCtx = document.getElementById('totalAssetsChart').getContext('2d');
                const totalAssetsData = {
                    labels: ['Assigned Assets', 'Available Assets'],
                    datasets: [{
                        label: 'Total Assets',
                        data: ['{{ $assignedAssets }}', '{{ $availableAssets }}'],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                const totalAssetsOptions = {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const label = tooltipItem.label || '';
                                    const value = tooltipItem.raw || 0;
                                    return '${label}: ${value}';
                                }
                            }
                        }
                    }
                };

                const totalAssetsChart = new Chart(totalAssetsCtx, {
                    type: 'pie',
                    data: totalAssetsData,
                    options: totalAssetsOptions
                });

                // Chart.js code for Asset Distribution (Bar Chart)
                const assetDistributionCtx = document.getElementById('assetDistributionChart').getContext('2d');
                const assetDistributionData = {
                    labels: ['Total Assets', 'Maintenance Due'],
                    datasets: [{
                        label: 'Asset Distribution',
                        data: ['{{ $totalAssets }}', '{{ $maintenance }}'],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                };
                const assetDistributionOptions = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };
                const assetDistributionChart = new Chart(assetDistributionCtx, {
                    type: 'bar',
                    data: assetDistributionData,
                    options: assetDistributionOptions
                });

                // Update stat cards with dynamic data
                updateStatCards();
            });

            // Function to update stat cards with dynamic data
            function updateStatCards() {
                const totalAssetsCard = document.querySelector('.stat-card.total');
                const assignedAssetsCard = document.querySelector('.stat-card.assigned');
                const availableAssetsCard = document.querySelector('.stat-card.available');

                totalAssetsCard.querySelector('p').textContent = '{{ $totalAssets }}'; // Total Assets count from PHP
                assignedAssetsCard.querySelector('p').textContent = '{{ $assignedAssets }}'; // Assigned Assets count from PHP
                availableAssetsCard.querySelector('p').textContent = '{{ $availableAssets }}'; // Available Assets count from PHP
            }

    </script>

    </head>
    <body>
    <div class="container">
        <header>
            <h1><a href="{{ route('dashboard') }}" style="color: white; text-decoration: none;">Assets Manager</a></h1>
            <div class="company-name">Company Name</div>
        </header>
        <div class="main-content">
            <aside>
                <nav>
                    <ul>
                        <li><button onclick="dash()"><i class="fas fa-tachometer-alt"></i> Dashboard</button></li>
                        <li><button onclick="assignsframe()"><i class="fas fa-cubes"></i> Assign Assets</button></li>
                        <li><button onclick="assetsframe()"><i class="fas fa-plus"></i> Add Assets</button></li>
                        <li><button onclick="employeesframe()"><i class="fas fa-users"></i> Employees</button></li>
                    </ul>
                </nav>
            </aside>
            <section class="content" id="ifr">
                <div class="dashboard-content">
                    <h2 style="color:black">General Asset Details</h2>
                    <div class="stat-cards">
                        <div class="row">
                            <button class="stat-card total" onclick="total()">
                                <h2>Total Assets</h2>
                                <p>{{ $totalAssets }}</p>
                            </button>
                            <button class="stat-card assigned" onclick="assigned()">
                                <h2>Assigned Assets</h2>
                                <p>{{ $assignedAssets }}</p>
                            </button>
                        </div>
                        <div class="row">
                            <button class="stat-card available" onclick="available()">
                                <h2>Available Assets</h2>
                                <p>{{ $availableAssets }}</p>
                            </button>
                            <button class="stat-card deadline" onclick="deadline()">
                                <h2>Assets - Assignment Deadline</h2>
                                <p>{{ $deadlineAssets }}</p>
                            </button>
                        </div>
                    </div>

                    <div class="chart-container">
                        <div class="chart-item">
                            <h3>Total Assets</h3>
                            <canvas id="totalAssetsChart"></canvas>
                        </div>
                        <div class="chart-item">
                            <h3>Asset Distribution</h3>
                            <canvas id="assetDistributionChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>

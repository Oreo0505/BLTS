

    const selectField = document.getElementById('select');
    const documentsChartField = document.getElementById('documents-chart');
    let chart;
    const currentYear = new Date().getFullYear();

    // Set the dropdown to the current year
    selectField.value = currentYear;

    function fetchData(year) {
        fetch('/get/documents?year=' + year)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    const documentData = data.documents;
                    const chartData = {
                        labels: Object.keys(documentData),
                        datasets: [{
                            label: ['Resolution', 'Ordinance', 'Code of Ordinance'],
                            data: Object.values(documentData),
                            backgroundColor: ['#F02525','#F8CF40', '#0090E7']
                        }]
                    };

                    if (chart) {
                        chart.destroy();
                    }

                    chart = new Chart(documentsChartField, {
                        type: 'pie',
                        data: chartData,
                        options: {
                            responsive: true
                        }
                    });
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch data for the current year on page load
    fetchData(currentYear);

    selectField.addEventListener('change', function() {
        const year = selectField.value;
        if (year) {
            fetchData(year);
        }
    });

const selectField = document.getElementById('select');
const annuallyField = document.getElementById('annually'); // Define annuallyField if it's not defined elsewhere
var selectedBy = 'monthly';
var selectedValue = moment().year() + '-M' + (moment().month() + 1);
var barangayStatisticsChart = null;

const getBarangayStatistics = async (by, value) => {
    const response = await fetch('/get/barangay/statistics?by=' + by + '&value=' + value);
    const data = await response.json();
    console.log(data);
    return data; // Return the entire response object
}



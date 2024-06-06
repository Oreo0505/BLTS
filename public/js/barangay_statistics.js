// const monthlyField = document.getElementById('monthly');
// const quarterlyField = document.getElementById('quarterly');
// const semiAnnuallyField = document.getElementById('semi-annually');
// const annuallyField = document.getElementById('annually');
// const titleField = document.getElementById('title');

// var currentParameter = 'Resolution';
// var barangayStatisticsChart = null;
// const municipality = 'Boac'; // Replace with the appropriate municipality

// async function getBarangayStatistics(parameter, municipality) {
//     const response = await fetch('/get/documents?parameter=' + parameter + '&municipality=' + municipality);
//     const data = await response.json();
//     // console.log(data);
//     return data['documents'];
// }

// function renderBarangayStatisticsChart() {
//     getBarangayStatistics(currentParameter, municipality).then((data) => {
//         // console.log(data);
//         var labels = ['Resolutions', 'Ordinances', 'Code of Ordinances'];
//         var documents = labels.map(label => data[label.toLowerCase()] || 0); // Ensure order and default to 0

//         // console.log(documents);
//         const barangayStatisticsData = {
//             labels: labels,
//             datasets: [{
//                 backgroundColor: ['#FFE34F', '#1BC222', '#F24242'],
//                 data: documents,
//             }]
//         };

//         const barangayStatisticsConfig = {
//             type: 'pie',
//             data: barangayStatisticsData,
//             options: {
//                 maintainAspectRatio: true,
//                 aspectRatio: 2,
//             },
//         };

//         if (barangayStatisticsChart != null) {
//             barangayStatisticsChart.destroy();
//         }
//         barangayStatisticsChart = new Chart(
//             document.getElementById('users-data'),
//             barangayStatisticsConfig
//         );
//     });
// }

// function deactivateAllFields() {
//     monthlyField.classList.remove('active');
//     quarterlyField.classList.remove('active');
//     semiAnnuallyField.classList.remove('active');
//     annuallyField.classList.remove('active');
// }

// monthlyField.addEventListener('click', function () {
//     currentParameter = 'Resolution';
//     renderBarangayStatisticsChart();
//     deactivateAllFields();
//     monthlyField.classList.add('active');
//     titleField.textContent = 'Resolution';
// });

// quarterlyField.addEventListener('click', function () {
//     currentParameter = 'Ordinance';
//     renderBarangayStatisticsChart();
//     deactivateAllFields();
//     quarterlyField.classList.add('active');
//     titleField.textContent = 'Ordinance';
// });

// semiAnnuallyField.addEventListener('click', function () {
//     currentParameter = 'Code of Ordinances';
//     renderBarangayStatisticsChart();
//     deactivateAllFields();
//     semiAnnuallyField.classList.add('active');
//     titleField.textContent = 'Code of Ordinances';
// });

// annuallyField.addEventListener('click', function () {
//     currentParameter = 'All';
//     renderBarangayStatisticsChart();
//     deactivateAllFields();
//     annuallyField.classList.add('active');
//     titleField.textContent = 'All Documents';
// });

// // Initial render
// renderBarangayStatisticsChart();

// const ratingField = document.getElementById('');
// var selectedBy = 'monthly';
// var selectedValue = moment().year() + '-M' + (moment().month() + 1);
// var barangayStatisticsChart = null;

// const getBarangayStatistics = async (parameter, by, value) => {
//     const response = await fetch('/get/documents?by=' + by + '&value=' + value );
//     const data = await response.json();
//     console.log(data);
//     return data['documents'];
   
// }

// function renderBarangayStatisticsChart() {
//     getBarangayStatistics(selectedBy, selectedValue).then((data) => {
//         console.log(data);

//         // Define the labels
//         const labels = ['Resolution', 'Ordinance', 'Code of Ordinance'];
//         // Initialize the documents array with zeros for each label
//         const documents = [0, 0, 0];

//         // Populate the documents array with the corresponding values from data
//         for (const [key, value] of Object.entries(data)) {
//             const index = labels.indexOf(key);
//             if (index !== -1) {
//                 documents[index] = value;
//             }
//         }

//         console.log(documents);

//         const barangayStatisticsData = {
//             labels: labels,
//             datasets: [{
//                 backgroundColor: ['#F8CF40', '#F02525', '#0090E7'],
//                 data: documents,
//             }]
//         };

//         const barangayStatisticsConfig = {
//             type: 'pie',
//             data: barangayStatisticsData,
//             options: {
//                 maintainAspectRatio: true,
//                 aspectRatio: 2,
//             },  

//         };

//         if (barangayStatisticsChart != null) {
//             barangayStatisticsChart.destroy();
//         }
//         barangayStatisticsChart = new Chart(
//             document.getElementById('documents-chart'),
//             barangayStatisticsConfig
//         );
//     })
// }

// const selectField = document.getElementById('select');
// const monthlyField = document.getElementById('monthly');
// const quarterlyField = document.getElementById('quarterly');
// const semiAnnuallyField = document.getElementById('semi-annually');
// const annuallyField = document.getElementById('annually');


// monthlyField.addEventListener('change', function () {
//     // Set the selectedValue to the first day of the selected month
//     selectedValue = monthlyField.value + '-01'; // Assuming monthlyField.value is in the format YYYY-MM
//     renderBarangayStatisticsChart();
// });

// quarterlyField.addEventListener('change', function () {
//     // Set the selectedValue to the first month of the selected quarter
//     const quarterStartMonth = parseInt(quarterlyField.value) * 3 - 2; // Calculate the first month of the quarter
//     selectedValue = moment().year() + '-' + quarterStartMonth + '-01'; // Assuming quarterlyField.value represents the quarter number
//     renderBarangayStatisticsChart();
// });

// semiAnnuallyField.addEventListener('change', function () {
//     // Set the selectedValue to the first month of the selected semi-annual period
//     const semiAnnualStartMonth = semiAnnuallyField.value === '1' ? '01' : '07'; // Assuming semiAnnuallyField.value represents the semi-annual period
//     selectedValue = moment().year() + '-' + semiAnnualStartMonth + '-01';
//     renderBarangayStatisticsChart();
// });

// annuallyField.addEventListener('change', function () {
//     // Set the selectedValue to the first day of the selected year
//     selectedValue = annuallyField.value + '-01-01'; // Assuming annuallyField.value is the selected year
//     renderBarangayStatisticsChart();
// });


// selectField.addEventListener('change', function () {
//     if (selectField.value == 'annually') {
//         annuallyField.classList.remove('hidden');
//         semiAnnuallyField.value = '';
//         quarterlyField.value = '';
//         monthlyField.value = '';
//         selectedBy = selectField.value;
//     }
//     else {
//         annuallyField.classList.add('hidden');
//     }

//     if (selectField.value == 'semi-annually') {
//         semiAnnuallyField.classList.remove('hidden');
//         annuallyField.value = '';
//         quarterlyField.value = '';
//         monthlyField.value = '';
//         selectedBy = selectField.value;
//     }
//     else {
//         semiAnnuallyField.classList.add('hidden');
//     }

//     if (selectField.value == 'quarterly') {
//         quarterlyField.classList.remove('hidden');
//         annuallyField.value = '';
//         semiAnnuallyField.value = '';
//         monthlyField.value = '';
//         selectedBy = selectField.value;
//     }
//     else {
//         quarterlyField.classList.add('hidden');
//     }
    
//     if (selectField.value == 'monthly') {
//         monthlyField.classList.remove('hidden');
//         annuallyField.value = '';
//         semiAnnuallyField.value = '';
//         quarterlyField.value = '';
//         selectedBy = selectField.value;
//     }
//     else {
//         monthlyField.classList.add('hidden');
//     }
// });
// const selectField = document.getElementById('select');
// const annuallyField = document.getElementById('annually'); // Define annuallyField if it's not defined elsewhere
// var selectedBy = 'monthly';
// var selectedValue = moment().year() + '-M' + (moment().month() + 1);
// var barangayStatisticsChart = null;

// const getBarangayStatistics = async (by, value) => {
//     const response = await fetch('/get/barangay/statistics?by=' + by + '&value=' + value);
//     const data = await response.json();
//     console.log(data);
//     return data; // Return the entire response object
// }

// function renderBarangayStatisticsChart() {
//     getBarangayStatistics(selectedBy, selectedValue).then((data) => {
//         console.log(data);

//         if (data.hasOwnProperty('error')) {
//             // Handle error response
//             console.error(data.error);
//             return;
//         }

//         // Define the labels
//         const labels = Object.keys(data.documents);

//         // Initialize the documents array with zeros for each label
//         const documents = Object.values(data.documents);

//         console.log(documents);

//         const barangayStatisticsData = {
//             labels: labels,
//             datasets: [{
//                 backgroundColor: ['#F8CF40', '#F02525', '#0090E7'], // You can add more colors if needed
//                 data: documents,
//             }]
//         };

//         const barangayStatisticsConfig = {
//             type: 'pie',
//             data: barangayStatisticsData,
//             options: {
//                 maintainAspectRatio: true,
//                 aspectRatio: 2,
//             },
//         };

//         if (barangayStatisticsChart != null) {
//             barangayStatisticsChart.destroy();
//         }
//         barangayStatisticsChart = new Chart(
//             document.getElementById('documents-chart'),
//             barangayStatisticsConfig
//         );
//     });
// }

// // Add event listener for field selection change
// selectField.addEventListener('change', function () {
//     if (selectField.value == 'monthly') {
//         selectedBy = 'monthly';
//     } else if (selectField.value == 'quarterly') {
//         selectedBy = 'quarterly';
//     } else if (selectField.value == 'semi-annually') {
//         selectedBy = 'semi-annually';
//     } else if (selectField.value == 'annually') {
//         selectedBy = 'annually';
//     }

//     renderBarangayStatisticsChart();
// });

// // Add event listener for the initial rendering of the chart
// document.addEventListener('DOMContentLoaded', function () {
//     renderBarangayStatisticsChart();
// });
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
            console.log('Fetched data:', data); // Log the fetched data for debugging

            if (data.error) {
                alert(data.error);
            } else {
                const documentData = data.documents;
                console.log('Document data:', documentData); // Log document data for debugging

                if (Object.keys(documentData).length === 0) {
                    // alert('No uploaded documents for this year');
                }

                const chartData = {
                    labels: Object.keys(documentData),
                    datasets: [{
                        label: 'Uploaded Document',
                        data: Object.values(documentData),
                        backgroundColor: ['#FF2941', '#D0154C', '#FF6F43']
                    }]
                };

                console.log('Chart data:', chartData); // Log chart data for debugging

                if (chart) {
                    chart.destroy();
                }

                chart = new Chart(documentsChartField, {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
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



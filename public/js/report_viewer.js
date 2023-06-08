const reportButton = document.getElementById('print-report');
const closeReportViewerButton = document.getElementById('close-viewer');
const reportViewerFrame = document.getElementById('report-viewer-frame');
const reportViewer = document.getElementById('report-viewer');

reportButton.addEventListener('click', function(){
    reportViewerFrame.src = '/storage/Reports/report.pdf';
    reportViewer.classList.remove('hidden');
    closeReportViewerButton.classList.remove('hidden');
});

closeReportViewerButton.addEventListener('click', function(){
    reportViewer.classList.add('hidden');
    closeReportViewerButton.classList.add('hidden');
})
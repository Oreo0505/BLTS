const reportButton = document.getElementById('print-report');
const closeReportViewerButton = document.getElementById('close-viewer');
const reportViewerFrame = document.getElementById('report-viewer-frame');
const reportViewer = document.getElementById('report-viewer');

reportButton.addEventListener('click', function(){
    viewerFrame.src = '/storage/Reports/report.pdf';
    viewer.classList.remove('hidden');
    closeViewerButton.classList.remove('hidden');
});

closeReportViewerButton.addEventListener('click', function(){
    viewer.classList.add('hidden');
    closeViewerButton.classList.add('hidden');
})
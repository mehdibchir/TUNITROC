function generatePDF(){
    const element = document.getElementById('invoice');
    alert(element.innerHTML);
    html2pdf().from(element).save();
    
}

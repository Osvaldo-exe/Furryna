var inputQuantity = document.getElementById('inputQuantity');
var inputPrice = document.getElementById('inputPrice');
var subtotalPrice = document.getElementById('subtotalPrice');

function addValue(){
    inputQuantity.value++
    var subtotal = inputQuantity.value * inputPrice.value

    subtotalPrice.textContent = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(subtotal)
}

function lessValue(){
    inputQuantity.value--
    var subtotal = inputQuantity.value * inputPrice.value

    subtotalPrice.textContent = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(subtotal)
}

function inputValue(){
    var subtotal = inputQuantity.value * inputPrice.value
    
    subtotalPrice.textContent = Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(subtotal)
}

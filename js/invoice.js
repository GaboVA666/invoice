// Iniciamos libreria jsPDF
const pdf = new jsPDF();

// Triggereamos el boton
let button = document.querySelector('button');
// Seleccionamos los inputs
let input = document.querySelector('input');

// añadimos evento
button.addEventListener('click', printPDF)

// Opcioines de pdf
function printPDF() {
    var doc = new jsPDF();
    var elementHTML = $('#content').html();
    var elementHeader = $('#head').html();
    var specialElementHandlers = {
        '#content': function (element, renderer) {
            return true;
        }
    };
    doc.fromHTML(elementHTML, 15, 15, {
        'width': 170,
        'elementHandlers': specialElementHandlers
    });
    
    // Save the PDF
    doc.save('sample-document.pdf');

}


(function (document) {
    var
    head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
    elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
    elementsLength = elements.length,
    elementsIndex = 0,
    element;

    while (elementsIndex < elementsLength) {
        element = document.createElement(elements[++elementsIndex]);
    }

    element.innerHTML = 'x<style>' +
        'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
        'audio[controls],canvas,video{display:inline-block}' +
        '[hidden],audio{display:none}' +
        'mark{background:#FF0;color:#000}' +
    '</style>';

    return head.insertBefore(element.lastChild, head.firstChild);
})(document);



(function (window, ElementPrototype, ArrayPrototype, polyfill) {
    function NodeList() { [polyfill] }
    NodeList.prototype.length = ArrayPrototype.length;

    ElementPrototype.matchesSelector = ElementPrototype.matchesSelector ||
    ElementPrototype.mozMatchesSelector ||
    ElementPrototype.msMatchesSelector ||
    ElementPrototype.oMatchesSelector ||
    ElementPrototype.webkitMatchesSelector ||
    function matchesSelector(selector) {
        return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
    };

    ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll ||
    ElementPrototype.mozAncestorQuerySelectorAll ||
    ElementPrototype.msAncestorQuerySelectorAll ||
    ElementPrototype.oAncestorQuerySelectorAll ||
    ElementPrototype.webkitAncestorQuerySelectorAll ||
    function ancestorQuerySelectorAll(selector) {
        for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
            if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
        }

        return newNodeList;
    };

    ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector ||
    ElementPrototype.mozAncestorQuerySelector ||
    ElementPrototype.msAncestorQuerySelector ||
    ElementPrototype.oAncestorQuerySelector ||
    ElementPrototype.webkitAncestorQuerySelector ||
    function ancestorQuerySelector(selector) {
        return this.ancestorQuerySelectorAll(selector)[0] || null;
    };
})(this, Element.prototype, Array.prototype);



function generateTableRow() {
    var emptyColumn = document.createElement('tr');

    emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable></span></td>' +
        '<td><span contenteditable></span></td>' +
        '<td><span data-prefix>$</span><span contenteditable>0.00</span></td>' +
        '<td><span contenteditable>0</span></td>' +
        '<td><span data-prefix>$</span><span>0.00</span></td>';

    return emptyColumn;
}

function parseFloatHTML(element) {
    return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
}

function parsePrice(number) {
    return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
}

/* Actualizar numeors
/* ========================================================================== */

function updateNumber(e) {
    var
    activeElement = document.activeElement,
    value = parseFloat(activeElement.innerHTML),
    wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

    if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
        e.preventDefault();

        value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
        value = Math.max(value, 0);

        activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
    }

    updateInvoice();
}

/* Actualizar INVOICE
/* ========================================================================== */

function updateInvoice() {
    var total = 0;
    var cells, price, total, a, i;

    // Actualizar celdas de inventario
    // ======================

    for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
        // Obtener celdas de inventario
        cells = a[i].querySelectorAll('span:last-child');

        // Asignar valores
        price = parseFloatHTML(cells[2]) * parseFloatHTML(cells[3]);

        // asignar valor a total
        total += price;

        // asignar campo a total
        cells[4].innerHTML = price;
    }

    // actualizar celdas
    // ====================

    // obtener celda de balance
    cells = document.querySelectorAll('table.balance td:last-child span:last-child');

    // asignar total
    cells[0].innerHTML = total;

    // AZsignar meta de balance
    cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = parsePrice(total - parseFloatHTML(cells[1]));

    // Actualizar el prefijo
    // ========================

    var prefix = document.querySelector('#prefix').innerHTML;
    for (a = document.querySelectorAll('[data-prefix]'), i = 0; a[i]; ++i) a[i].innerHTML = prefix;

    // Actualizar formato del precio
    // =======================

    for (a = document.querySelectorAll('span[data-prefix] + span'), i = 0; a[i]; ++i) if (document.activeElement != a[i]) a[i].innerHTML = parsePrice(parseFloatHTML(a[i]));
}

/* al cargar contenido
/* ========================================================================== */

function onContentLoad() {
    updateInvoice();

    var
    input = document.querySelector('input'),
    image = document.querySelector('img');

    function onClick(e) {
        var element = e.target.querySelector('[contenteditable]'), row;

        element && e.target != document.documentElement && e.target != document.body && element.focus();

        if (e.target.matchesSelector('.add')) {
            document.querySelector('table.inventory tbody').appendChild(generateTableRow());
        }
        else if (e.target.className == 'cut') {
            row = e.target.ancestorQuerySelector('tr');

            row.parentNode.removeChild(row);
        }

        updateInvoice();
    }

    function onEnterCancel(e) {
        e.preventDefault();

        image.classList.add('hover');
    }

    function onLeaveCancel(e) {
        e.preventDefault();

        image.classList.remove('hover');
    }

    function onFileInput(e) {
        image.classList.remove('hover');

        var
        reader = new FileReader(),
        files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
        i = 0;

        reader.onload = onFileLoad;

        while (files[i]) reader.readAsDataURL(files[i++]);
    }

    function onFileLoad(e) {
        var data = e.target.result;

        image.src = data;
    }

    if (window.addEventListener) {
        document.addEventListener('click', onClick);

        document.addEventListener('mousewheel', updateNumber);
        document.addEventListener('keydown', updateNumber);

        document.addEventListener('keydown', updateInvoice);
        document.addEventListener('keyup', updateInvoice);

        input.addEventListener('focus', onEnterCancel);
        input.addEventListener('mouseover', onEnterCancel);
        input.addEventListener('dragover', onEnterCancel);
        input.addEventListener('dragenter', onEnterCancel);

        input.addEventListener('blur', onLeaveCancel);
        input.addEventListener('dragleave', onLeaveCancel);
        input.addEventListener('mouseout', onLeaveCancel);

        input.addEventListener('drop', onFileInput);
        input.addEventListener('change', onFileInput);
    }
}

window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);


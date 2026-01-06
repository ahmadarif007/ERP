
const trimsData = [
    {po: "PO1", color: "Color1", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1200},
    {po: "PO1", color: "Color1", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1800},
    {po: "PO1", color: "Color1", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 2000},
    {po: "PO1", color: "Color1", size: "XL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1500},
    {po: "PO1", color: "Color1", size: "XXL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 800},
    {po: "PO1", color: "Color2", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1000},
    {po: "PO1", color: "Color2", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1600},
    {po: "PO1", color: "Color2", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1800},
    {po: "PO1", color: "Color2", size: "XL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1400},
    {po: "PO1", color: "Color2", size: "XXL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 700},
    {po: "PO1", color: "Color3", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 900},
    {po: "PO1", color: "Color3", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 1200},
    {po: "PO1", color: "Color3", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 1100},
    {po: "PO1", color: "Color4", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorD", itemSize: "Size4", pcs: 600},
    {po: "PO2", color: "Color1", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1100},
    {po: "PO2", color: "Color1", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1700},
    {po: "PO2", color: "Color1", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1900},
    {po: "PO2", color: "Color1", size: "XL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 1400},
    {po: "PO2", color: "Color1", size: "XXL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorA", itemSize: "Size1", pcs: 700},
    {po: "PO2", color: "Color2", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 900},
    {po: "PO2", color: "Color2", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1500},
    {po: "PO2", color: "Color2", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1700},
    {po: "PO2", color: "Color2", size: "XL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 1300},
    {po: "PO2", color: "Color2", size: "XXL", gmtsItem: "ItemX", country: "USA", itemColor: "ColorB", itemSize: "Size2", pcs: 600},
    {po: "PO2", color: "Color3", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 800},
    {po: "PO2", color: "Color3", size: "M", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 1100},
    {po: "PO2", color: "Color3", size: "L", gmtsItem: "ItemX", country: "USA", itemColor: "ColorC", itemSize: "Size3", pcs: 1000},
    {po: "PO2", color: "Color4", size: "S", gmtsItem: "ItemX", country: "USA", itemColor: "ColorD", itemSize: "Size4", pcs: 500},
];

let currentRowElement = null;
let rows = [];

function addNewRow() {
    const tbody = document.getElementById("mainTbody");
    const newRow = tbody.rows[0].cloneNode(true);
    tbody.appendChild(newRow);
    attachMainRowEvents(newRow);
}

function deleteRow(btn) {
    if (confirm("এই রো ডিলিট করতে চান?")) {
        btn.closest("tr").remove();
    }
}

function openConsumptionPopup(cell) {
    currentRowElement = cell;
    document.getElementById("modalOverlay").style.display = "flex";
    generateTable();
    populateFilters();
}

function closeModal() {
    document.getElementById("modalOverlay").style.display = "none";
}

function generateTable(filterPO = "", filterColor = "", filterSize = "") {
    const tbody = document.getElementById("tableBody");
    tbody.innerHTML = "";
    rows = [];
    let sl = 1;
    let poSpans = {}, colorSpans = {};

    // Calculate spans
    trimsData.forEach(item => {
        if ((filterPO && item.po !== filterPO) || (filterColor && item.color !== filterColor) || (filterSize && item.size !== filterSize)) return;
        poSpans[item.po] = (poSpans[item.po] || 0) + 1;
        const colorKey = `${item.po}-${item.color}`;
        colorSpans[colorKey] = (colorSpans[colorKey] || 0) + 1;
    });

    let prevPO = "", prevColor = "";
    trimsData.forEach((item, index) => {
        if ((filterPO && item.po !== filterPO) || (filterColor && item.color !== filterColor) || (filterSize && item.size !== filterSize)) return;
        const tr = document.createElement("tr");
        const poSpan = poSpans[item.po] > 1 && item.po === prevPO ? 'style="display:none"' : `rowspan="${poSpans[item.po]}"`;
        const colorSpan = colorSpans[`${item.po}-${item.color}`] > 1 && item.color === prevColor && item.po === prevPO ? 'style="display:none"' : `rowspan="${colorSpans[`${item.po}-${item.color}`]}"`;
        tr.innerHTML = `
            <td>${sl++}</td>
            <td class="merged" ${poSpan}>${item.po}</td>
            <td>${item.gmtsItem}</td>
            <td>${item.country}</td>
            <td class="merged" ${colorSpan}>${item.color}</td>
            <td>${item.size}</td>
            <td>${item.itemColor}</td>
            <td>${item.itemSize}</td>
            <td><input type="number" class="cons" step="0.01" value="0"></td>
            <td><input type="number" class="ex" step="0.01" value="0"></td>
            <td class="totalCons">0</td>
            <td><input type="number" class="rate" step="0.01" value="0.50"></td>
            <td class="amount">0</td>
            <td>${item.pcs}</td>
            <td class="totalQty">0</td>
            <td class="totalAmount">0</td>
            <td class="totalGmtsQty">${item.pcs * (parseFloat(tr.querySelector('.totalCons')?.textContent || 0) / 12)}</td>
        `;
        tbody.appendChild(tr);
        rows.push(tr);
        prevPO = item.po;
        prevColor = item.color;
    });
    attachEvents();
    calculateAll();
}

function populateFilters() {
    const poSet = new Set(trimsData.map(d => d.po));
    const colorSet = new Set(trimsData.map(d => d.color));
    const sizeSet = new Set(trimsData.map(d => d.size));

    const poSelect = document.getElementById('filterPO');
    poSelect.innerHTML = '<option value="">All PO</option>';
    poSet.forEach(p => poSelect.innerHTML += `<option value="${p}">${p}</option>`);

    const colorSelect = document.getElementById('filterColor');
    colorSelect.innerHTML = '<option value="">All Color</option>';
    colorSet.forEach(c => colorSelect.innerHTML += `<option value="${c}">${c}</option>`);

    const sizeSelect = document.getElementById('filterSize');
    sizeSelect.innerHTML = '<option value="">All Size</option>';
    sizeSet.forEach(s => sizeSelect.innerHTML += `<option value="${s}">${s}</option>`);

    [poSelect, colorSelect, sizeSelect].forEach(select => {
        select.addEventListener('change', () => generateTable(poSelect.value, colorSelect.value, sizeSelect.value));
    });
}

function attachEvents() {
    document.querySelectorAll('.cons, .ex, .rate').forEach(input => {
        input.addEventListener('input', () => {
            calculateRow(input.closest('tr'));
            calculateSummary();
        });
    });
}

function calculateRow(tr) {
    const cons = parseFloat(tr.querySelector('.cons').value) || 0;
    const ex = parseFloat(tr.querySelector('.ex').value) || 0;
    const rate = parseFloat(tr.querySelector('.rate').value) || 0;
    const pcs = parseFloat(tr.querySelector('td:nth-child(14)').textContent) || 0;

    const totalCons = cons * (1 + ex / 100);
    const amount = totalCons * rate;
    const totalQty = (totalCons / 12) * pcs;
    const totalAmount = totalQty * rate;
    const totalGmtsQty = pcs * (totalCons / 12);

    tr.querySelector('.totalCons').textContent = totalCons.toFixed(2);
    tr.querySelector('.amount').textContent = amount.toFixed(2);
    tr.querySelector('.totalQty').textContent = totalQty.toFixed(2);
    tr.querySelector('.totalAmount').textContent = totalAmount.toFixed(2);
    tr.querySelector('.totalGmtsQty').textContent = totalGmtsQty.toFixed(2);
}

function calculateAll() {
    rows.forEach(calculateRow);
    calculateSummary();
}

function calculateSummary() {
    let sums = {cons: 0, ex: 0, totalCons: 0, rate: 0, amount: 0, pcs: 0, totalQty: 0, totalAmount: 0, totalGmts: 0};
    let count = rows.length;

    rows.forEach(tr => {
        sums.cons += parseFloat(tr.querySelector('.cons').value) || 0;
        sums.ex += parseFloat(tr.querySelector('.ex').value) || 0;
        sums.totalCons += parseFloat(tr.querySelector('.totalCons').textContent) || 0;
        sums.rate += parseFloat(tr.querySelector('.rate').value) || 0;
        sums.amount += parseFloat(tr.querySelector('.amount').textContent) || 0;
        sums.pcs += parseFloat(tr.querySelector('td:nth-child(14)').textContent) || 0;
        sums.totalQty += parseFloat(tr.querySelector('.totalQty').textContent) || 0;
        sums.totalAmount += parseFloat(tr.querySelector('.totalAmount').textContent) || 0;
        sums.totalGmts += parseFloat(tr.querySelector('.totalGmtsQty').textContent) || 0;
    });

    document.getElementById('sumCons').textContent = sums.cons.toFixed(2);
    document.getElementById('sumEx').textContent = sums.ex.toFixed(2);
    document.getElementById('sumTotalCons').textContent = sums.totalCons.toFixed(2);
    document.getElementById('sumRate').textContent = sums.rate.toFixed(2);
    document.getElementById('sumAmount').textContent = sums.amount.toFixed(2);
    document.getElementById('sumPcs').textContent = sums.pcs.toFixed(0);
    document.getElementById('sumTotalQty').textContent = sums.totalQty.toFixed(2);
    document.getElementById('sumTotalAmount').textContent = sums.totalAmount.toFixed(2);
    document.getElementById('sumTotalGmts').textContent = sums.totalGmts.toFixed(2);

    document.getElementById('avgCons').textContent = (sums.cons / count).toFixed(2);
    document.getElementById('avgEx').textContent = (sums.ex / count).toFixed(2);
    document.getElementById('avgTotalCons').textContent = (sums.totalCons / count).toFixed(2);
    document.getElementById('avgRate').textContent = (sums.rate / count).toFixed(2);
    document.getElementById('avgAmount').textContent = (sums.amount / count).toFixed(2);
    document.getElementById('avgPcs').textContent = (sums.pcs / count).toFixed(0);
    document.getElementById('avgTotalQty').textContent = (sums.totalQty / count).toFixed(2);
    document.getElementById('avgTotalAmount').textContent = (sums.totalAmount / count).toFixed(2);
    document.getElementById('avgTotalGmts').textContent = (sums.totalGmts / count).toFixed(2);
}

function applyCopy() {
    const selectedCopies = Array.from(document.querySelectorAll('input[name="copy"]:checked')).map(c => c.value);
    if (selectedCopies.includes('no')) return; // No copy

    // Get value from first input field (assuming first cons field)
    const firstCons = document.querySelector('.cons')?.value || 0;
    const firstEx = document.querySelector('.ex')?.value || 0;
    const firstRate = document.querySelector('.rate')?.value || 0;

    rows.forEach(tr => {
        let copy = false;
        const po = tr.querySelector('td:nth-child(2)').textContent;
        const color = tr.querySelector('td:nth-child(5)').textContent;
        const size = tr.querySelector('td:nth-child(6)').textContent;

        if (selectedCopies.includes('all')) copy = true;
        else if (selectedCopies.includes('po') && po === trimsData[0].po) copy = true;
        else if (selectedCopies.includes('color') && color === trimsData[0].color) copy = true;
        else if (selectedCopies.includes('size') && size === trimsData[0].size) copy = true;
        else if (selectedCopies.includes('color_size') && color === trimsData[0].color && size === trimsData[0].size) copy = true;
        else if (selectedCopies.includes('po_color') && po === trimsData[0].po && color === trimsData[0].color) copy = true;
        else if (selectedCopies.includes('po_size') && po === trimsData[0].po && size === trimsData[0].size) copy = true;
        else if (selectedCopies.includes('gmts_item') && tr.querySelector('td:nth-child(3)').textContent === trimsData[0].gmtsItem) copy = true;

        if (copy) {
            tr.querySelector('.cons').value = firstCons;
            tr.querySelector('.ex').value = firstEx;
            tr.querySelector('.rate').value = firstRate;
            calculateRow(tr);
        }
    });
    calculateSummary();
}

function resetConsumption() {
    if (confirm("পপআপের সব ডাটা রিসেট করবেন?")) {
        document.querySelectorAll('.cons').forEach(i => i.value = 0);
        document.querySelectorAll('.ex').forEach(i => i.value = 0);
        document.querySelectorAll('.rate').forEach(i => i.value = 0.50);
        document.querySelectorAll('input[name="copy"]').forEach(c => c.checked = false);
        calculateAll();
    }
}

function saveConsumption() {
    const avgCons = document.getElementById('avgTotalCons').textContent;
    if (currentRowElement) {
        currentRowElement.textContent = avgCons;
    }
    closeModal();
}

function attachMainRowEvents(row) {
    const rateInput = row.querySelector('.rate');
    rateInput.addEventListener('input', () => calculateMainRow(row));
}

function calculateMainRow(row) {
    // Placeholder for main row calculations
    const consUnit = parseFloat(row.querySelector('.cons-unit').textContent) || 0;
    const rate = parseFloat(row.querySelector('.rate').value) || 0;
    const amount = consUnit * rate;
    const totalQty = consUnit * 1000; // Example
    const totalAmount = totalQty * rate;
    row.querySelector('.amount').textContent = amount.toFixed(2);
    row.querySelector('.total-qty').textContent = totalQty.toFixed(2);
    row.querySelector('.total-amount').textContent = totalAmount.toFixed(2);
}

// Initial setup
document.getElementById("modalOverlay").addEventListener("click", e => { if (e.target === document.getElementById("modalOverlay")) return; });

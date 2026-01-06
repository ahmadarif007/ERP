// PO Data
const poData = [
    {po:"PO-001", colors:{
        "White": {sizes:["S","M","L","XL","XXL"], qty:{S:1200,M:1800,L:2500,XL:1500,XXL:800}},
        "Black": {sizes:["S","M","L","XL","XXL"], qty:{S:1100,M:1700,L:2300,XL:1400,XXL:750}},
        "Navy":  {sizes:["M","L","XL"], qty:{M:1600,L:2200,XL:1300}},
        "Red":   {sizes:["L"], qty:{L:2800}}
    }},
    {po:"PO-002", colors:{
        "White": {sizes:["S","M","L","XL","XXL"], qty:{S:900,M:1400,L:2000,XL:1100,XXL:600}},
        "Black": {sizes:["S","M","L","XL","XXL"], qty:{S:1000,M:1500,L:2100,XL:1200,XXL:700}},
        "Navy":  {sizes:["S","M","L"], qty:{S:800,M:1300,L:1800}},
        "Grey":  {sizes:["XL"], qty:{XL:950}}
    }}
];

let fabricRows = [];
let currentRowIndex = 0;

function addFabricRow() {
    const idx = fabricRows.length;
    fabricRows.push({data: [], yarns: "DTF Organic Cotton, Elastine"});
    const tr = document.createElement("tr");
    tr.innerHTML = `
        <td><button class="delete" onclick="deleteFabricRow(${idx})">×</button></td>
        <td><input value="T-Shirt"></td>
        <td><input value="Body ${idx+1}" class="bp"></td>
        <td><select><option>Main</option><option>Collar</option></select></td>
        <td><select><option>Cotton</option></select></td>
        <td><select><option>Solid</option><option>Yarn Dyed</option></select></td>
        <td><input value="DTF Organic Cotton, Elastine" class="fab-desc" oninput="fabricRows[${idx}].yarns = this.value; generateYarn()"></td>
        <td><select><option>Knitting</option><option>Buying</option></select></td>
        <td><input value="58/60"></td>
        <td><input value="180"></td>
        <td><select><option>No</option><option>Yes</option></select></td>
        <td><select><option>Production</option><option>Purchase</option></select></td>
        <td><select><option>Kg</option></select></td>
        <td class="avg-cons" onclick="openModal(${idx})">0.000</td>
        <td><input type="number" step="0.01" class="rate" oninput="calcMain()"></td>
        <td class="amt">0.00</td>
        <td class="gmtsqty">0</td>
        <td class="totkg">0.000</td>
        <td class="totamt">0.00</td>
    `;
    document.getElementById("fabricBody").appendChild(tr);
}

function deleteFabricRow(i) {
    if(confirm("ডিলিট করবেন?")) {
        fabricRows.splice(i,1);
        document.querySelectorAll("#fabricBody tr")[i].remove();
        calcMain();
        generateYarn();
    }
}

function openModal(i) {
    currentRowIndex = i;
    document.getElementById("modalTitle").textContent = document.querySelectorAll(".bp")[i].value;
    const tbody = document.getElementById("consBody");
    tbody.innerHTML = "";
    let sl = 1;
    let totalPcs = 0;
    let totalAmt = 0;
    let totalRate = 0;
    let rateCount = 0;

    poData.forEach(po => {
        Object.keys(po.colors).forEach(color => {
            po.colors[color].sizes.forEach(size => {
                const pcs = po.colors[color].qty[size] || 0;
                totalPcs += pcs;
                const saved = fabricRows[i].data.find(x => x.po===po.po && x.color===color && x.size===size) || {};
                const tr = document.createElement("tr");
                tr.dataset.po = po.po; tr.dataset.color = color; tr.dataset.size = size;
                tr.innerHTML = `
                    <td>${sl++}</td>
                    <td class="po-cell">${po.po}</td>
                    <td class="color-cell">${color}</td>
                    <td>${size}</td>
                    <td><input type="number" step="0.01" value="58"></td>
                    <td><input type="number" step="0.01" value="58"></td>
                    <td><input type="number" step="0.001" class="fin" value="${saved.fin||''}" oninput="calcRow(this)"></td>
                    <td><input type="number" step="0.01" class="loss" value="${saved.loss||'10'}" oninput="calcRow(this)"></td>
                    <td class="grey">0.000</td>
                    <td><input type="number" step="0.01" class="rate" value="${saved.rate||''}" oninput="calcRow(this)"></td>
                    <td class="amt">0.00</td>
                    <td>${pcs}</td>
                    <td class="totqty">0.000</td>
                    <td class="totamt">0.00</td>
                `;
                tbody.appendChild(tr);
                if (saved.rate) {
                    totalRate += parseFloat(saved.rate);
                    rateCount++;
                }
            });
        });
    });

    const mainTr = document.querySelectorAll("#fabricBody tr")[i];
    mainTr.querySelector(".gmtsqty").textContent = totalPcs;
    mainTr.querySelector(".rate").value = rateCount ? (totalRate / rateCount).toFixed(2) : "";
    mainTr.querySelector(".totamt").textContent = totalAmt.toFixed(2);
    mergeCells();
    calcAllModal();
    document.getElementById("modal").style.display = "flex";
}

function mergeCells() {
    const rows = document.querySelectorAll("#consBody tr");
    if(rows.length===0) return;
    let poStart = 0, colorStart = 0;
    for(let i=0; i<=rows.length; i++) {
        const po = i<rows.length ? rows[i].dataset.po : null;
        const color = i<rows.length ? rows[i].dataset.color : null;
        const prevPO = i>0 ? rows[i-1].dataset.po : null;
        const prevColor = i>0 ? rows[i-1].dataset.color : null;

        if(i===rows.length || po !== prevPO) {
            if(i > poStart) {
                const span = i - poStart;
                if(span>1) { rows[poStart].querySelector(".po-cell").rowSpan = span;
                    for(let j=poStart+1; j<i; j++) rows[j].querySelector(".po-cell").style.display="none";
                }
            }
            poStart = i;
        }
        if(i===rows.length || color !== prevColor || po !== prevPO) {
            if(i > colorStart) {
                const span = i - colorStart;
                if(span>1) { rows[colorStart].querySelector(".color-cell").rowSpan = span;
                    for(let j=colorStart+1; j<i; j++) rows[j].querySelector(".color-cell").style.display="none";
                }
            }
            colorStart = i;
        }
    }
}

function calcRow(el) {
    const tr = el.closest("tr");
    const fin = parseFloat(tr.querySelector(".fin").value)||0;
    const loss = parseFloat(tr.querySelector(".loss").value)||0;
    const rate = parseFloat(tr.querySelector(".rate").value)||0;
    const pcs = parseFloat(tr.cells[11].textContent)||0;
    const grey = fin * (1 + loss/100);
    const totKg = (grey/12) * pcs;
    const amt = grey * rate;
    const totAmt = totKg * rate;
    tr.querySelector(".grey").textContent = grey.toFixed(3);
    tr.querySelector(".amt").textContent = amt.toFixed(2);
    tr.querySelector(".totqty").textContent = totKg.toFixed(3);
    tr.querySelector(".totamt").textContent = totAmt.toFixed(2);
    calcAllModal();
}

function calcAllModal() {
    let fin=0, grey=0, amt=0, qty=0, tamt=0, lossSum=0, count=0, rateSum=0, rateCount=0;
    document.querySelectorAll("#consBody tr").forEach(tr => {
        fin += parseFloat(tr.querySelector(".fin").value)||0;
        grey += parseFloat(tr.querySelector(".grey").textContent)||0;
        amt += parseFloat(tr.querySelector(".amt").textContent)||0;
        qty += parseFloat(tr.querySelector(".totqty").textContent)||0;
        tamt += parseFloat(tr.querySelector(".totamt").textContent)||0;
        const l = parseFloat(tr.querySelector(".loss").value)||0;
        if(l>0) { lossSum += l; count++; }
        const r = parseFloat(tr.querySelector(".rate").value)||0;
        if(r>0) { rateSum += r; rateCount++; }
    });
    const n = document.querySelectorAll("#consBody tr").length;
    document.getElementById("tFin").textContent = fin.toFixed(3);
    document.getElementById("tGrey").textContent = grey.toFixed(3);
    document.getElementById("tAmt").textContent = amt.toFixed(2);
    document.getElementById("tQty").textContent = qty.toFixed(3);
    document.getElementById("tTAmt").textContent = tamt.toFixed(2);
    document.getElementById("aFin").textContent = n ? (fin/n).toFixed(3) : "-";
    document.getElementById("aLoss").textContent = count ? (lossSum/count).toFixed(1) : "-";
    document.getElementById("aGrey").textContent = n ? (grey/n).toFixed(3) : "-";
    document.getElementById("aAmt").textContent = n ? (amt/n).toFixed(2) : "-";
    const mainTr = document.querySelectorAll("#fabricBody tr")[currentRowIndex];
    mainTr.querySelector(".rate").value = rateCount ? (rateSum / rateCount).toFixed(2) : "";
    mainTr.querySelector(".totamt").textContent = tamt.toFixed(2);
}

function applyCopy() {
    const first = document.querySelector("#consBody tr");
    if(!first) return;
    const fFin = first.querySelector(".fin").value;
    const fLoss = first.querySelector(".loss").value;
    const fRate = first.querySelector(".rate").value;

    document.querySelectorAll("#consBody tr").forEach(tr => {
        if(tr===first) return;
        const samePO = tr.dataset.po === first.dataset.po;
        const sameColor = tr.dataset.color === first.dataset.color;
        const sameSize = tr.dataset.size === first.dataset.size;

        let copy = false;
        if(document.getElementById("copyAll").checked) copy = true;
        if(document.getElementById("copyPO").checked && samePO) copy = true;
        if(document.getElementById("copyColor").checked && sameColor) copy = true;
        if(document.getElementById("copySize").checked && sameSize) copy = true;
        if(document.getElementById("copyPOColor").checked && samePO && sameColor) copy = true;
        if(document.getElementById("copyPOSize").checked && samePO && sameSize) copy = true;
        if(document.getElementById("copyColorSize").checked && sameColor && sameSize) copy = true;

        if(copy) {
            tr.querySelector(".fin").value = fFin;
            tr.querySelector(".loss").value = fLoss;
            tr.querySelector(".rate").value = fRate;
            calcRow(tr.querySelector(".fin"));
        }
    });
}

function filterModal() {
    const [p,c,s] = Array.from(document.querySelectorAll(".search-box input")).map(i=>i.value.toLowerCase());
    document.querySelectorAll("#consBody tr").forEach(tr => {
        tr.style.display = (tr.dataset.po.toLowerCase().includes(p) &&
                           tr.dataset.color.toLowerCase().includes(c) &&
                           tr.dataset.size.toLowerCase().includes(s)) ? "" : "none";
    });
    mergeCells();
}

function resetModal() {
    if(confirm("সব রিসেট?")) {
        document.querySelectorAll("#consBody input").forEach(i=>i.value="");
        calcAllModal();
    }
}

function saveModal() {
    const saved = [];
    document.querySelectorAll("#consBody tr").forEach(tr => {
        saved.push({
            po: tr.dataset.po,
            color: tr.dataset.color,
            size: tr.dataset.size,
            fin: tr.querySelector(".fin").value,
            loss: tr.querySelector(".loss").value,
            rate: tr.querySelector(".rate").value
        });
    });
    fabricRows[currentRowIndex].data = saved;
    const avgGrey = (parseFloat(document.getElementById("aGrey").textContent) || 0).toFixed(3);
    document.querySelectorAll(".avg-cons")[currentRowIndex].textContent = avgGrey;
    closeModal();
    calcMain();
    generateYarn();
}

function closeModal() { document.getElementById("modal").style.display = "none"; }

function calcMain() {
    let totalPcs = 0, totalKg = 0, totalAmt = 0;
    document.querySelectorAll("#fabricBody tr").forEach((tr, i) => {
        const avg = parseFloat(tr.querySelector(".avg-cons").textContent)||0;
        const rate = parseFloat(tr.querySelector(".rate").value)||0;
        const pcs = parseFloat(tr.querySelector(".gmtsqty").textContent)||0;
        const kg = (avg/12)*pcs;
        const amt = kg * rate;
        tr.querySelector(".amt").textContent = amt.toFixed(2);
        tr.querySelector(".totkg").textContent = kg.toFixed(3);
        tr.querySelector(".totamt").textContent = amt.toFixed(2);
        totalPcs += pcs;
        totalKg += kg;
        totalAmt += amt;
    });
    document.getElementById("grandQty").textContent = totalPcs;
    document.getElementById("grandKg").textContent = totalKg.toFixed(3);
    document.getElementById("grandAmt").textContent = totalAmt.toFixed(2);
}

function generateYarn() {
    const tbody = document.getElementById("yarnBody");
    tbody.innerHTML = "";
    let sl = 1;
    let totalKg = 0, totalAmt = 0;

    document.querySelectorAll("#fabricBody tr").forEach((tr, i) => {
        const seq = tr.querySelector(".bp").value;
        const yarnsStr = tr.querySelector(".fab-desc").value;
        const yarns = yarnsStr.split(',').map(y => y.trim());
        const totalFabKg = parseFloat(tr.querySelector(".totkg").textContent)||0;
        if(totalFabKg===0) return;

        yarns.forEach(yarn => {
            const yarnKg = totalFabKg * (95/100); // ডিফল্ট %, তোমার চাইলে চেঞ্জ করো
            totalKg += yarnKg;
            const trY = document.createElement("tr");
            trY.innerHTML = `
                <td>${sl++}</td>
                <td>${seq}</td>
                <td><select><option>30/1</option><option>34/1</option></select></td>
                <td>95%</td>
                <td>${yarnKg.toFixed(3)}</td>
                <td><input value="Natural"></td>
                <td><select><option>Combed</option></select></td>
                <td><select><option>Soft</option></select></td>
                <td><select><option>Ring</option></select></td>
                <td><select><option>GOTS</option></select></td>
                <td><input placeholder="Supplier"></td>
                <td><input type="number" step="0.01" class="yrate" oninput="calcYarn(this)"></td>
                <td class="yamt">0.00</td>
            `;
            tbody.appendChild(trY);
        });
    });
    document.getElementById("totalYarnKg").textContent = totalKg.toFixed(3);
}

function calcYarn(input) {
    const tr = input.closest("tr");
    const kg = parseFloat(tr.cells[4].textContent)||0;
    const rate = parseFloat(input.value)||0;
    const amt = kg * rate;
    tr.querySelector(".yamt").textContent = amt.toFixed(2);
    let total = 0;
    document.querySelectorAll(".yamt").forEach(td => total += parseFloat(td.textContent)||0);
    document.getElementById("totalYarnAmt").textContent = total.toFixed(2);
}

function saveAllFabric() {
    generateYarn();
    alert("সব সেভ হয়েছে! ইয়ার্ন টেবিল আপডেট করা হয়েছে।");
}

function clearAllFabric() {
    document.getElementById("fabricBody").innerHTML = "";
    fabricRows = [];
    document.getElementById("yarnBody").innerHTML = "";
    calcMain();
}

function saveYarn() {
    alert("ইয়ার্ন সেভ হয়েছে!");
}

function clearYarn() {
    document.getElementById("yarnBody").innerHTML = "";
    document.getElementById("totalYarnKg").textContent = "0.000";
    document.getElementById("totalYarnAmt").textContent = "0.00";
}

// ==========================================================================
// নতুন শক্তিশালী ফিল্টার ফাংশন
function applyFilters() {
    const poFilter = document.getElementById("filterPO").value.toLowerCase().trim();
    const colorFilter = document.getElementById("filterColor").value.toLowerCase().trim();
    const sizeFilter = document.getElementById("filterSize").value.toLowerCase().trim();

    let visibleRows = 0;

    document.querySelectorAll("#consBody tr").forEach(tr => {
        const po = tr.dataset.po.toLowerCase();
        const color = tr.dataset.color.toLowerCase();
        const size = tr.dataset.size.toLowerCase();

        const matchPO = !poFilter || po.includes(poFilter);
        const matchColor = !colorFilter || color.includes(colorFilter);
        const matchSize = !sizeFilter || size.includes(sizeFilter);

        if (matchPO && matchColor && matchSize) {
            tr.style.display = "";
            visibleRows++;
        } else {
            tr.style.display = "none";
        }
    });

    // মার্জ আবার ঠিক করো ফিল্টারের পর
    mergeCellsAfterFilter();

    // শুধু দৃশ্যমান রো-র হিসেবে Total + Average দেখাও
    recalcVisibleOnly();
}

function clearFilters() {
    document.getElementById("filterPO").value = "";
    document.getElementById("filterColor").value = "";
    document.getElementById("filterSize").value = "";
    applyFilters();
}

// ফিল্টারের পর মার্জ ঠিক রাখার জন্য
function mergeCellsAfterFilter() {
    // প্রথমে সব মার্জ রিসেট করো
    document.querySelectorAll("#consBody .po-cell, #consBody .color-cell").forEach(cell => {
        cell.rowSpan = 1;
        cell.style.display = "";
    });

    const rows = Array.from(document.querySelectorAll("#consBody tr")).filter(tr => tr.style.display !== "none");
    if (rows.length === 0) return;

    let poStart = 0, colorStart = 0;

    for (let i = 0; i <= rows.length; i++) {
        const currentPO = i < rows.length ? rows[i].dataset.po : null;
        const currentColor = i < rows.length ? rows[i].dataset.color : null;
        const prevPO = i > 0 ? rows[i-1].dataset.po : null;
        const prevColor = i > 0 ? rows[i-1].dataset.color : null;

        if (i === rows.length || currentPO !== prevPO) {
            if (i - poStart > 1) {
                rows[poStart].querySelector(".po-cell").rowSpan = i - poStart;
                for (let j = poStart + 1; j < i; j++) {
                    rows[j].querySelector(".po-cell").style.display = "none";
                }
            }
            poStart = i;
        }

        if (i === rows.length || currentColor !== prevColor || currentPO !== prevPO) {
            if (i - colorStart > 1) {
                rows[colorStart].querySelector(".color-cell").rowSpan = i - colorStart;
                for (let j = colorStart + 1; j < i; j++) {
                    rows[j].querySelector(".color-cell").style.display = "none";
                }
            }
            colorStart = i;
        }
    }
}

// শুধু দৃশ্যমান রো-র Total + Average দেখাবে
function recalcVisibleOnly() {
    let fin=0, grey=0, amt=0, qty=0, tamt=0, lossSum=0, count=0, rateSum=0, rateCount=0;

    document.querySelectorAll("#consBody tr").forEach(tr => {
        if (tr.style.display === "none") return;

        fin += parseFloat(tr.querySelector(".fin").value)||0;
        grey += parseFloat(tr.querySelector(".grey").textContent)||0;
        amt += parseFloat(tr.querySelector(".amt").textContent)||0;
        qty += parseFloat(tr.querySelector(".totqty").textContent)||0;
        tamt += parseFloat(tr.querySelector(".totamt").textContent)||0;

        const l = parseFloat(tr.querySelector(".loss").value)||0;
        if(l>0) { lossSum += l; count++; }

        const r = parseFloat(tr.querySelector(".rate").value)||0;
        if(r>0) { rateSum += r; rateCount++; }
    });

    const n = document.querySelectorAll("#consBody tr").length;
    const visibleCount = document.querySelectorAll("#consBody tr:not([style*='display: none'])").length;

    document.getElementById("tFin").textContent = fin.toFixed(3);
    document.getElementById("tGrey").textContent = grey.toFixed(3);
    document.getElementById("tAmt").textContent = amt.toFixed(2);
    document.getElementById("tQty").textContent = qty.toFixed(3);
    document.getElementById("tTAmt").textContent = tamt.toFixed(2);

    document.getElementById("aFin").textContent = visibleCount ? (fin/visibleCount).toFixed(3) : "-";
    document.getElementById("aLoss").textContent = count ? (lossSum/count).toFixed(1) : "-";
    document.getElementById("aGrey").textContent = visibleCount ? (grey/visibleCount).toFixed(3) : "-";
}

// Start
addFabricRow();

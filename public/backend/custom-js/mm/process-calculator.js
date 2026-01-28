// প্রি-ডিফাইনড অপশনস (আপনার লাইব্রেরি থেকে আসবে)
const processTypes = ["Dyeing", "Printing", "Embroidery", "Washing", "Finishing"];
const descriptions = ["Basic", "Medium", "Heavy", "Special"];
const conditions = ["Normal", "Critical", "High Tension", "Low Tension"];

let colorCounter = 0;

function addNewColorSection() {
  colorCounter++;
  const colorId = `color-${colorCounter}`;

  const section = document.createElement("div");
  section.className = "color-section";
  section.id = colorId;
  section.innerHTML = `
    <div class="header">
      <h5 style="margin-left:20px; margin-bottom:0px font-weight:bold;">
        COLOR: ${colorCounter}
        <input type="text" placeholder="Color Name" class="color-name" style="width:240px; margin-left:15px; padding:5px;">
      </h5>
      <button class="remove-btn" onclick="removeColorSection('${colorId}')">× Remove Color</button>
    </div>

    <div class="row" style="padding: 0px 20px">
      <!-- বাম পাশে → ইনপুট ফর্ম -->
      <div class="col-md-3" style="padding: 0px 0px 0px 15px">
        <div class="process-input-group">
          <div class="row">
            <div class="col-sm-6" style="margin-bottom: 5px">
              <select class="process-type" placeholder="Process Type">
                <option value="">Select</option>
                ${processTypes.map(t => `<option>${t}</option>`).join('')}
              </select>
            </div>
            <div class="col-sm-6" style="margin-bottom: 5px">
              <select class="condition" placeholder="Condition">
                <option value="">Select</option>
                ${conditions.map(c => `<option>${c}</option>`).join('')}
              </select>
            </div>
            <div class="col-sm-12" style="margin-bottom: 5px">
              <select class="description" placeholder="Description">
                <option value="">Select</option>
                ${descriptions.map(d => `<option>${d}</option>`).join('')}
              </select>
            </div>
            <div class="col-sm-6" style="margin-bottom: 5px">
              <input type="number" class="req-qty" min="0" step="1" placeholder="Req Qty">
            </div>
            <div class="col-sm-6" style="margin-bottom: 5px">
              <input type="number" class="order-qty" min="0" step="1" placeholder="Order Qty">
            </div>

            <div class="col-6" style="margin-left: 15px; margin-bottom:5px">
              <button class="process-add-btn" onclick="addRow('${colorId}')">+ Add Row</button>
              <button class="process-add-btn" onclick="calculateColor('${colorId}')">Calculate</button>
            </div>
          </div>
        </div>
      </div>

      <!-- ডান পাশে → টেবিল -->
      <div class="col-md-9">
        <div class="table-responsive">
          <table class="process-table">
            <thead>
              <tr>
                <th>Process Type</th>
                <th>Description</th>
                <th>Condition</th>
                <th>Req Qty</th>
                <th>Order Qty</th>
                <th>Process Loss (%)</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
              <tr class="total-row">
                <td colspan="5">Total Process Loss</td>
                <td class="total-loss">0.00%</td>
                <td></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  `;

  document.getElementById("colors-container").appendChild(section);
  updateFinalBreakdown();
}

function addRow(colorId) {
  const section = document.getElementById(colorId);
  const tbody = section.querySelector("tbody");

  const processType = section.querySelector(".process-type").value;
  const description = section.querySelector(".description").value;
  const condition = section.querySelector(".condition").value;
  const reqQty = parseFloat(section.querySelector(".req-qty").value) || 0;
  const orderQty = parseFloat(section.querySelector(".order-qty").value) || 0;

  if (!processType || !reqQty || !orderQty) {
    alert("Process Type, Req Qty এবং Order Qty পূরণ করুন!");
    return;
  }

  const loss = reqQty === 0 ? 0 : ((orderQty - reqQty) / reqQty) * 100;
  const lossRounded = loss.toFixed(2);

  const row = document.createElement("tr");
  row.innerHTML = `
    <td>${processType}</td>
    <td>${description || '-'}</td>
    <td>${condition || '-'}</td>
    <td>${reqQty}</td>
    <td>${orderQty}</td>
    <td>${lossRounded}%</td>
    <td><button class="remove-btn" onclick="this.parentElement.parentElement.remove(); updateTotal('${colorId}'); updateFinalBreakdown();">×</button></td>
  `;
  tbody.appendChild(row);

  // ইনপুট ফিল্ড ক্লিয়ার
  section.querySelector(".process-type").value = "";
  section.querySelector(".description").value = "";
  section.querySelector(".condition").value = "";
  section.querySelector(".req-qty").value = "";
  section.querySelector(".order-qty").value = "";

  calculateColor(colorId);
}

function calculateColor(colorId) {
  const section = document.getElementById(colorId);
  const rows = section.querySelectorAll("tbody tr");
  let totalLoss = 0;

  rows.forEach(row => {
    const lossText = row.cells[5].textContent;
    totalLoss += parseFloat(lossText) || 0;
  });

  section.querySelector(".total-loss").textContent = totalLoss.toFixed(2) + "%";
  updateFinalBreakdown();
}

function updateTotal(colorId) {
  calculateColor(colorId);
}

function removeColorSection(colorId) {
  if (confirm("এই কালার সেকশন মুছে ফেলতে চান?")) {
    document.getElementById(colorId).remove();
    updateFinalBreakdown();
  }
}

function updateFinalBreakdown() {
  const sections = document.querySelectorAll(".color-section");
  let html = "";

  sections.forEach(section => {
    const colorName = section.querySelector(".color-name").value.trim() || "Unnamed Color";
    const totalLoss = section.querySelector(".total-loss").textContent;

    if (totalLoss !== "0.00%") {
      html += `<div style="margin:8px 0; padding:10px; background:#f8f9fa; border-radius:6px;">
        <strong>${colorName}</strong> → Total Process Loss: <span style="color:#d32f2f; font-weight:bold;">${totalLoss}</span>
      </div>`;
    }
  });

  document.getElementById("final-breakdown").innerHTML = html || "<p style='color:#777;'>কোনো ক্যালকুলেশন এখনো হয়নি...</p>";
}

// প্রথম কালার সেকশন অটো লোড
addNewColorSection();
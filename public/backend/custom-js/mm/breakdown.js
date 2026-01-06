  
  let currentPO = "PO-2025-101";
  let data = {};

  // ডিফল্ট ডাটা (প্রতি PO এর জন্য)
  ["PO-2025-101", "PO-2025-102", "PO-2025-103", "PO-2025-104", "PO-2025-105"].forEach(po => {
    data[po] = { colors: [], sizes: [], matrix: {} };
  });

//   // PO ক্লিক
//   document.querySelectorAll('.po-btn').forEach(btn => {
//     btn.onclick = function() {
//       document.querySelectorAll('.po-btn').forEach(b => b.classList.remove('active'));
//       this.classList.add('active');
//       currentPO = this.getAttribute('data-po');
//       document.getElementById('selected-po').textContent = currentPO;

//       // রিসেট কালার ও সাইজ
//       document.getElementById('color-tags').innerHTML = '';
//       document.getElementById('size-tags').innerHTML = '';
//       document.getElementById('matrix-area').style.display = 'none';
//       data[currentPO].colors = [];
//       data[currentPO].sizes = [];
//       data[currentPO].matrix = {};
//     };
//   });

// Global data object (প্রয়োজনমতো adjust করতে পারেন)


    // PO button click - delegated binding (dynamic elements-এর জন্য)
    $(document).on('click', '.po-btn', function() {
        var po = $(this).data('po'); // button এ data-po attribute থেকে value নিন
        console.log('PO clicked:', po);

        // PO button active state toggle
        $('.po-btn').removeClass('active');
        $(this).addClass('active');

        // নির্বাচিত PO display করার জন্য field
        $('#selected-po').text(po);

        // Reset related fields
        $('#color-tags').empty();
        $('#size-tags').empty();
        $('#matrix-area').hide();

        // যদি এই PO এর data না থাকে তাহলে initialize করুন
        if (!data[po]) {
            data[po] = {
                colors: [],
                sizes: [],
                matrix: {}
            };
        } else {
            // আগের data থেকে reload করতে চাইলে এখানে handle করতে পারেন
            console.log('Existing PO data:', data[po]);
        }
    });

  // কালার যোগ
  function addColor() {
    const input = document.getElementById('color-input');
    const color = input.value.trim();
    if (!color || data[currentPO].colors.includes(color)) return;
    data[currentPO].colors.push(color);

    const tag = document.createElement('span');
    tag.className = 'tag';
    tag.innerHTML = `${color} <button onclick="this.parentElement.remove(); data[currentPO].colors = data[currentPO].colors.filter(c=>c!=='${color}');">×</button>`;
    document.getElementById('color-tags').appendChild(tag);
    input.value = '';
  }

  // সাইজ যোগ
  function addSize() {
    const input = document.getElementById('size-input');
    const size = input.value.trim().toUpperCase();
    if (!size || data[currentPO].sizes.includes(size)) return;
    data[currentPO].sizes.push(size);

    const tag = document.createElement('span');
    tag.className = 'tag';
    tag.innerHTML = `${size} <button onclick="this.parentElement.remove(); data[currentPO].sizes = data[currentPO].sizes.filter(s=>s!=='${size}');">×</button>`;
    document.getElementById('size-tags').appendChild(tag);
    input.value = '';
  }

  // ম্যাট্রিক্স তৈরি
  function generateMatrix() {
    if (data[currentPO].colors.length === 0 || data[currentPO].sizes.length === 0) {
      return alert("কমপক্ষে ১টি কালার ও ১টি সাইজ যোগ করুন!");
    }

    document.getElementById('matrix-area').style.display = 'block';
    let table = `<table><tr><th>কালার</th><th>#</th>`;
    data[currentPO].sizes.forEach(s => table += `<th>${s}</th>`);
    table += `<th>মোট Qty</th><th>মোট এমাউন্ট</th><th>Total Plancut Qty</th></tr>`;

    data[currentPO].colors.forEach(color => {
      table += `
      <tr>
        <td class="color-cell">${color}</td>
        <td>
          <div class="input-cell">
              <input style="width:70px; text-align: left" type="text" placeholder="Qty"><br>
              <input style="width:70px; text-align: left" type="text" step="0.01" placeholder="Rate"><br>
              <input style="width:70px; text-align: left" type="text" placeholder="Ex Cut%"><br>
              <input style="width:70px; text-align: left" type="text" placeholder="Plan Cut Qty.">
          </div>
        </td>
      `;
      let colorQty = 0, colorAmt = 0, colorPc = 0;

      data[currentPO].sizes.forEach(size => {
        const key = `${color}|${size}`;
        const cell = data[currentPO].matrix[key] || {q:0, r:0, e:5};

        const plancut = Math.ceil(cell.q * (100 + cell.e) / 100);

        table += `<td>
          <div class="input-cell">
            <input type="text" value="${cell.q}" onchange="update('${key}','q',this.value)" placeholder="Qty"><br>
            <input type="text" step="0.01" value="${cell.r}" onchange="update('${key}','r',this.value)" placeholder="Rate"><br>
            <input type="text" value="${cell.e}" onchange="update('${key}','e',this.value)" placeholder="Ex%"><br>
            <input class="plancut" type="text" value="${plancut}" placeholder="Plancut">
          </div>
        </td>`;

        colorQty += cell.q;
        colorAmt += cell.q * cell.r;
        colorPc += plancut;
      });

      table += `<td>${colorQty}</td><td>${colorAmt.toFixed(2)}</td><td>${colorPc}</td></tr>`;
    });

    // টোটাল রো
    let totalQty = 0, totalAmt = 0, totalPc = 0;
    data[currentPO].colors.forEach(c => {
      data[currentPO].sizes.forEach(s => {
        const cell = data[currentPO].matrix[`${c}|${s}`] || {q:0, r:0, e:5};
        totalQty += cell.q;
        totalAmt += cell.q * cell.r;
        totalPc += Math.ceil(cell.q * (100 + cell.e) / 100);
      });
    });

    table += `<tr class="total-row"><td></td><td>মোট</td><td colspan="${data[currentPO].sizes.length}">Total</td>
      <td>${totalQty}</td><td>৳${totalAmt.toFixed(0)}</td><td>${totalPc}</td></tr></table>`;

    document.getElementById('matrix-container').innerHTML = table;

    document.getElementById('summary').innerHTML = `
      ${currentPO} এর সামারি
      <div style="display: flex; flex-direction: row; justify-content: center;">
        <div style="color #f1f1f1; width: 150px; margin: 10px; padding: 10px; text-align: center; font-size: 30px; border-radius: 5px; color: white; background: #39C684;">
          <span>${totalQty} Pcs</span><br>
          <span>Total Order</span>
        </div>
        <div style="color #f1f1f1; width: 150px; margin: 10px; padding: 10px; text-align: center; font-size: 30px; border-radius: 5px; color: white; background: #5DD09A;">
          <span>$ ${totalAmt.toFixed(0)}</span><br>
          <span>Total Amount</span>
        </div>
        <div style="color #f1f1f1; width: 150px; margin: 10px; padding: 10px; text-align: center; font-size: 30px; border-radius: 5px; color: white; background: #81DAB0;">
          <span>${totalPc} Pcs</span><br>
          <span>Total Plancut</span>
        </div>
      </div>
    `;
  }

  function update(key, field, value) {
    const [color, size] = key.split('|');
    if (!data[currentPO].matrix[key]) data[currentPO].matrix[key] = {q:0, r:0, e:5};
    data[currentPO].matrix[key][field] = parseFloat(value) || 0;
    generateMatrix(); // রিয়েল-টাইম আপডেট
  }
